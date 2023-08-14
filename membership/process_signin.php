<?php

$email = $_POST['emailLogin'];
$password = $_POST['passwordLogin'];

require '../connect.php';

$sql = "select * 
from customers 
where email = '$email' and password = '$password'";
$result = mysqli_query($connect, $sql);

$num_rows = mysqli_num_rows($result);
mysqli_close($connect);
if ($num_rows == 1) {
	session_start();
	$each = mysqli_fetch_array($result);

	// $_SESSION['email'] = $each['email'];
	$_SESSION['id_customer'] = $each['id'];
	$_SESSION['name_customer'] = $each['name'];
	
	header('location: ../public/');
	exit;
}else{
	session_start();

	$_SESSION['error'] = 'Email và mật khẩu không đúng';
	header('location: signin.php');
}

