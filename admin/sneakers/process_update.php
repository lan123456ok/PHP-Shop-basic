<?php

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$image_1 = $_POST['image_1'];
$image_2 = $_POST['image_2'];
$image_3 = $_POST['image_3'];
$image_4 = $_POST['image_4'];

require '../connect.php';

$sql = "update sneakers
set 
name = '$name',
price = '$price',
description = '$description',
image_1 = '$image_1',
image_2 = '$image_2',
image_3 = '$image_3',
image_4 = '$image_4'
where
id = '$id'";
mysqli_query($connect,$sql);

mysqli_close($connect);
header('location:index.php');

