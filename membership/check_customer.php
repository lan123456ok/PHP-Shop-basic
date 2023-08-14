<?php
session_start();

if (!isset($_SESSION['id_customer'])) {
	$_SESSION['error'] = 'Bạn cần phải đăng nhập để tiếp tục';
	header('location: ../membership/signin.php');
}