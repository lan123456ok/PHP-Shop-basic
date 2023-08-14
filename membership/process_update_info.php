<?php 
$id = $_POST['id'];
$name = $_POST['name'];
$new_avatar = $_FILES['new_avatar'];
if ($new_avatar['size'] > 0) {
	$folder = "photos/";
	$avatar_extension = explode('.', $new_avatar['name'])[1];
	$avatar_name = time() . '.' . $avatar_extension;
	$path_avatar = $folder . $avatar_name;

	move_uploaded_file($new_avatar['tmp_name'], $path_avatar);
}else {
	$avatar_name = $_POST['old_avatar'];
}
$new_cover = $_FILES['cover'];
if ($new_cover['size'] > 0) {
	$folder = "photos/";
	$cover_extension = explode('.', $new_cover['name'])[1];
	$cover_name = time() . '.' . $cover_extension;
	$path_cover = $folder . $cover_name;

	move_uploaded_file($new_cover['tmp_name'], $path_cover);
}else {
	$cover_name = 'default_cover.png';
}
$birthdate = $_POST['birthdate'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];

require '../connect.php';
$sql = "update customers
set
name = '$name',
avatar = '$avatar_name',
cover = '$cover_name',
b_date = '$birthdate',
phone_number = '$phone_number',
address = '$address'
where id = '$id'";

mysqli_query($connect,$sql);
echo 'Thành công';
mysqli_close($connect);
