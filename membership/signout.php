<?php 

session_start();
// unset($_SESSION['email']);
unset($_SESSION['id_customer']);
unset($_SESSION['name_customer']);
	
// setcookie('remember', null , -1);

header('location: ../public/');
