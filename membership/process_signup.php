<?php 

$email = $_POST['newEmail'];
$password = $_POST['newPassword'];
$name = $_POST['name'];
$birthdate = $_POST['birthdate'];
$location = $_POST['location'];
$sex = $_POST['sex'];

require '../connect.php';

$sql = "select count(*) 
from customers 
where email = '$email'";
$result = mysqli_query($connect,$sql);
$num_rows = mysqli_fetch_array($result)['count(*)'];
// var_dump($num_rows);
if ($num_rows == 1) {
 	session_start();
 	$_SESSION['error'] = 'Email của bạn đã có người sử dụng';
 	header('location:signin.php');
 	exit;
 }

$sql = "insert into customers(name,email,password,b_date,sex,location)
values('$name','$email','$password','$birthdate','$sex','$location')";
mysqli_query($connect,$sql);

$sql = "select * from customers where email = '$email'";
$result = mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'];
session_start();
$_SESSION['id_customer'] = $id;
// $_SESSION['email'] = $email;
$_SESSION['name_customer'] = $name;


mysqli_close($connect);
header('location: ../public/');
