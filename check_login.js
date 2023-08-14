function validate_email_login(){
	let input_email_login = document.getElementById('login_email').value;
	
	if (input_email_login.length === 0) {
		document.getElementById('noticeEmailLogin').innerHTML= "Email không được để trống";
		return false;
	}
	document.getElementById('noticeEmailLogin').innerHTML="";
	return true;
}

function validate_password_login(){
	let input_password_login = document.getElementById('login_password').value;

	if(input_password_login.length === 0){
		document.getElementById('noticePasswordLogin').innerHTML= "Mật khẩu không được để trống";
		return false;
	}
	document.getElementById('noticePasswordLogin').innerHTML="";
	return true;
}


function check_validate_signin(){
	let check_error = true;
	check_error = validate_email_login() & validate_password_login();

	if (!check_error) {
		return false;
	}
	return true;
}