<?php
session_start();

$name_receiver = $_POST['name_receiver'];
$phone_receiver = $_POST['phone_receiver'];
$address_receiver = $_POST['address_receiver'];
$location = $_POST['location'];

require '../connect.php';

if (empty($_SESSION['cart_shop'])) {
	$_SESSION['error'] = 'Giỏ hàng đang trống';
	header('location: ../membership/cart.php');
	exit;
}
$cart = $_SESSION['cart_shop'];

$total_price = 0;
foreach ($cart as $each) {
	$total_price += $each['price'] * $each['quantity'];
}

if (!isset($_SESSION['id_customer'])) {
	$_SESSION['error'] = 'Bạn cần phải đăng nhập để đặt hàng';
	header('location: ../membership/signin.php');
	exit;
}else{
	$customer_id = $_SESSION['id_customer'];
}

$status = 0;

//insert into order
$sql = "insert into orders(customer_id,name_receiver,phone_receiver,address_receiver,location,status,total_price)
values('$customer_id','$name_receiver','$phone_receiver','$address_receiver','$location','$status','$total_price')";
mysqli_query($connect,$sql);


//insert into order_sneaker
$sql = "select max(id) from orders where customer_id = '$customer_id'";

$result = mysqli_query($connect,$sql);
$order_id = mysqli_fetch_array($result)['max(id)'];

foreach ($cart as $sneaker_id => $each) {
	$quantity = $each['quantity'];
	$sql = "insert into order_sneaker(order_id,product_id,quantity)
	values('$order_id','$sneaker_id','$quantity')";
	mysqli_query($connect,$sql);
}

mysqli_close($connect);
unset($_SESSION['cart_shop']);

header('location: ../index.php');