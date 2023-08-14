<?php

$email = $_POST['emailLogin'];
$password = $_POST['passwordLogin'];

require 'connect.php';

$sql = "select * from admin 
where email = '$email' and password = '$password'";

$result = mysqli_query($connect,$sql);

if (mysqli_num_rows($result) == 1) {
	$each = mysqli_fetch_array($result);

	session_start();
	$_SESSION['id_admin'] = $each['id'];
	$_SESSION['name_admin'] = $each['name'];
	$_SESSION['level_admin'] = $each['level'];
	
	header('location:root/');
	exit();
}else{
	session_start();
	$_SESSION['error'] = 'Email và mật khẩu không đúng';
	header('location:index.php');
}

