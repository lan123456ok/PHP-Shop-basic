<?php

session_start();
$id = $_GET['id'];
$type = $_GET['type'];

if ($type === '0') {
	if ($_SESSION['cart_shop'][$id]['quantity'] > 1) {
		$_SESSION['cart_shop'][$id]['quantity']--;
	}else {
		unset($_SESSION['cart_shop'][$id]);
		echo 'Thành công xóa';
	}
}else{
	$_SESSION['cart_shop'][$id]['quantity']++;
}

