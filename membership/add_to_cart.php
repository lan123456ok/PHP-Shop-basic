<?php

try{
	session_start();
	if (empty($_GET['id'])) {
		throw new Exception('Không tồn tại id sản phẩm');
	}
	$id = $_GET['id'];
	if (empty($_SESSION['cart_shop'][$id])) {
		require '../connect.php';
		$sql = "select * from sneakers where id = '$id'";
		$result = mysqli_query($connect,$sql);
		$each = mysqli_fetch_array($result);

		$_SESSION['cart_shop'][$id]['id'] = $each['id'];
		$_SESSION['cart_shop'][$id]['name'] = $each['name'];
		$_SESSION['cart_shop'][$id]['price'] = $each['price'];
		$_SESSION['cart_shop'][$id]['image_1'] = $each['image_1'];
		$_SESSION['cart_shop'][$id]['quantity'] = 1;
	}else{
		$_SESSION['cart_shop'][$id]['quantity'] ++;
	}
	echo 1;
} catch(Exception $e) {
	echo $e ->getMessage();
}

// test array session cart
// print_r($_SESSION['cart_shop']);