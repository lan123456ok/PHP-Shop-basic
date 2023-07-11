<?php

$name = addslashes($_POST['name']);
$price = $_POST['price'];
$description = addslashes($_POST['description']);
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo4'];
$manufacturer_id = $_POST['manufacturer_id'];

require "../connect.php";
$sql = "insert into sneakers(name,price,description,image_1,image_2,image_3,image_4,manufacturer_id)
values('$name','$price','$description','$photo1','$photo2','$photo3','$photo4','$manufacturer_id')";

mysqli_query($connect,$sql);

mysqli_close($connect);
header('location:index.php');