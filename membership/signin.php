<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/paper-kit.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/demo.css">

	<!-- icon & font -->
	<link rel="stylesheet" href="../assets/css/nucleo-icons.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../style.css">
	
</head>
<body>
	<?php include '../menu.php'; ?>
	<div class="wrapper div-signup d-flex justify-content-center">
		<div style="width: 24%;">
			<header>
				<div class="d-flex justify-content-center">
					<img height="50px" src="../assets/img/icons/nike_logo_normal.png">
				</div>

			</header>

			<form class="form-unhidden my-form" id="signIn" action="process_signin.php" method="post" name="">
				<div class="d-flex justify-content-center p-2 f1">
					ALWAYS BY YOUR SIDE
				</div>
				<span class="text-danger">
					<?php
					if (isset($_SESSION['error'])) {
						echo $_SESSION['error'];
						unset($_SESSION['error']);
					}
					?>
				</span>
				<input id="login_email" type="text" class="form-control email" name="emailLogin" placeholder="Email">
				<span class="text-danger" id="noticeEmailLogin"></span>
				<input id="login_password" type="password" class="form-control password" name="passwordLogin" placeholder="Mật khẩu">
				<span class="text-danger" id="noticePasswordLogin"></span>
				<div style="float: left;" class="w-50">
					<input type="checkbox" name="remmeberMe">
					<label for="" class="checkbox">
						Ghi nhớ tôi
					</label>
				</div>
				<div style="float: left;" class="w-50 d-flex justify-content-end">
					<a class="form-link" href="">Quên mật khẩu</a>
				</div>
				<button class="btn btn-lg btn-dark btn-block mt-2" type="submit" onclick="return check_validate_signin()"> 
					Đăng nhập
				</button>
				<div class="d-flex justify-content-center mt-2">
					Chưa có tài khoàn?
					<a id="linkSignup" class="form-link" style="color: black; cursor: pointer;"> Đăng ký ngay</a>
				</div>
			</form>

			<form class="form-signup form-hidden my-form" id="signUp" action="process_signup.php" method="post" name="myForm">
				<div class="d-flex justify-content-center p-2 f1">
					BECOMING OUR MEMBER
				</div>
				<div class="d-flex justify-content-center">
					Create your Our's Shop Member profile and get first access to the very best of out products, inspiration and community.
				</div>

				<input id="CustomerEmail" type="text" class="form-control email" name="newEmail" placeholder="Email">
				<span class="text-danger" id="noticeEmail"></span>
				<input id="CustomerPassword" type="password" class="form-control password" name="newPassword" placeholder="Mật khẩu">
				<span class="text-danger" id="noticePassword"></span>
				<input type="text" class="form-control name" name="name" placeholder="Họ tên">
				<span class="text-danger" id="noticeName"></span>
				<input type="text" name="birthdate" class="form-control birthdate" placeholder="Ngày sinh" onfocus="(this.type='date')" onblur="if(this.value == ''){this.type='text'}">
				<span class="text-danger" id="noticeDate"></span>
				<select name="location" class="form-control location p-1">
					<!-- <option value="" disabled selected>--Chọn khu vực của bạn--</option> -->
					<option value="1">Việt Nam</option>
					<option value="2">Japan</option>
					<option value="3">USA</option>
					<option value="4">Thailand</option>
				</select>
				<div class="div-option row">
					<div class="col-6 ">
						<input class="sex-option" type="radio" name="sex" id="1" value="0">
						<div class=""><label class="lab-sex pt-2" for="1">Nam</label></div>
					</div>
					<div class="col-6 "> 
						<input class="sex-option" type="radio" name="sex" id="2" value="1">
						<div class=""><label class="lab-sex pt-2" for="2">Nữ</label></div>
					</div>
				</div>
				<span class="text-danger" id="noticeSex"></span>
				<button class="btn btn-lg btn-dark btn-block mt-2" type="submit" onclick="return check_validate_signup()"> 
					Đăng ký
				</button>
				<div class="d-flex justify-content-center mt-2">
					Đã có tài khoàn?
					<a id="linkSignin" class="form-link" style="color: black; cursor: pointer;"> Đăng nhập</a>
				</div>
			</form>
		</div>
	</div>
	<?php include '../footer.php'; ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="../validate.js"></script>
<script type="text/javascript" src="../check_login.js"></script>
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(){
		var createAccount = document.getElementById('linkSignup');
		var haveAccount = document.getElementById('linkSignin');
		var formSignin = document.getElementById("signIn");
		var formSignup = document.getElementById("signUp");
		// var formError = document.getElementsByTagName('span');

		createAccount.addEventListener("click", function(e){
			e.preventDefault();

			hide(formSignin);
			show(formSignup);
			$("span.text-danger").empty();
		});

		haveAccount.addEventListener("click", function(e){
			e.preventDefault();

			show(formSignin);
			hide(formSignup);
			$("span.text-danger").empty();
		});		
	});

	function hide(elem) {
		elem.classList.add('form-hidden');
		elem.classList.remove('form-unhidden');
	}

	function show(elem) {
		elem.classList.add('form-unhidden');
		elem.classList.remove('form-hidden');
	}	
</script>
</html>