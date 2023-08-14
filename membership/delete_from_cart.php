<?php
$id = $_GET['id'];
session_start();

unset($_SESSION['cart_shop'][$id]);