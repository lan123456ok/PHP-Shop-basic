<?php
$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$photo = $_POST['photo'];

require '../connect.php';

$sql = "update manufacturers
set 
name = '$name',
address = '$address',
photo = '$photo'
where
id = '$id'";
mysqli_query($connect,$sql);

mysqli_close($connect);
header('location:index.php');

