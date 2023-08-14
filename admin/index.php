<?php 
	include 'session_admin.php';
	if (isset($_SESSION['id_admin'])) {
		header('location:root/');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Đăng nhập</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrapper d-flex justify-content-center">
		<div style="width: 30%">
			<form id="signIn" class="form-signin my-form" action="process_login.php" method="post" name="myForm">
			<h2 class="form-signin-heading">
				Đăng nhập
			</h2>
			<span class="text-danger" id="noticeForm">
				<?php
					if (isset($_SESSION['error'])) {
						echo $_SESSION['error'];
						unset($_SESSION['error']);
					}
				?>
			</span>
			<input id="login_email" type="text" class="form-control" name="emailLogin" placeholder="Email" id="email">
			<span class="text-danger" id="noticeEmailLogin"></span>
			<input id="login_password" type="password" class="form-control" name="passwordLogin" placeholder="Password">
			<span class="text-danger" id="noticePasswordLogin"></span>
			
			<label class="checkbox">
				<input type="checkbox" name="rememberMe" id=""> Ghi nhớ tôi
			</label>
			<button class="btn btn-lg btn-primary btn-block" type="submit" onclick="return check_validate_signin()">
				Đăng nhập
			</button>
		</form>
		</div>
		
	</div>
</body>
<script type="text/javascript" src="../check_login.js"></script>
</html>