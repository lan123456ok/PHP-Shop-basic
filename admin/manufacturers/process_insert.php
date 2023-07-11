<?php
$name = $_POST['name'];
$address = $_POST['address'];
$photo = $_POST['photo'];

require '../connect.php';

$sql = "insert into manufacturers(name,address,photo)
values('$name','$address','$photo')";
mysqli_query($connect,$sql);

mysqli_close($connect);
header('location:index.php');


