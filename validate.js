function validate_email(){
	let input_email = document.getElementById('CustomerEmail').value;
	
	if (input_email.length === 0) {
		document.getElementById('noticeEmail').innerHTML= "Email không được để trống";
		return false;
	}else{
		let regex_email = /^((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/;
		if (!regex_email.test(input_email)) {
			document.getElementById('noticeEmail').innerHTML= "Email không hợp lệ";
			return false;
		}
	}
	document.getElementById('noticeEmail').innerHTML="";
	return true;
}

function validate_password(){
	let input_password = document.getElementById('CustomerPassword').value;

	if(input_password.length === 0){
		document.getElementById('noticePassword').innerHTML= "Mật khẩu không được để trống";
		return false;
	}else if (input_password.length <= 6) {
		document.getElementById('noticePassword').innerHTML= "Mật khẩu không được ít hơn 6 ký tự";
		return false;
	}else{
		let regex_password = /^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=.*[!@#$%^&+=.\-_*|]).{6,})\S$/;
		
		if (!regex_password.test(input_password)) {
			document.getElementById('noticePassword').innerHTML = "Mật khẩu gồm ít nhất 1 chữ hoa, 1 số, 1 ký tự đặc biệt";
			return false
		}
	}
	document.getElementById('noticePassword').innerHTML="";
	return true;
}

function validate_name(){
	let input_name = document.myForm.name.value;

	if(input_name.length === 0){
		document.getElementById('noticeName').innerHTML= "Họ tên không được để trống";
		return false;
	}else{
		let regex_name = /^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]*(?:[ ][A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]*)*$/;
		if(!regex_name.test(input_name)){
			document.getElementById('noticeName').innerHTML = 'Tên không hợp lệ';
			return false;
		}
	}
	document.getElementById('noticeName').innerHTML="";
	return true;
}

function validate_date() {
	let input_date = new Date(document.myForm.birthdate.value).setHours(0, 0, 0, 0);
	const date = new Date().setHours(0, 0, 0, 0);

	if (isNaN(input_date)) {
		document.getElementById('noticeDate').innerHTML="Ngày sinh không được để trống";
		return false;
	}else if (input_date >= date) {
		document.getElementById('noticeDate').innerHTML="Ngày sinh không hợp lệ";
		return false;
	}
	document.getElementById('noticeDate').innerHTML="";
	return true;
}

function validate_sex(){
	let array_sex = document.getElementsByName('sex');

	if (!(array_sex[0].checked || array_sex[1].checked)) {
		document.getElementById('noticeSex').innerHTML="Hãy chọn giới tính của bạn";
		return false;
	}
	document.getElementById('noticeSex').innerHTML="";
	return true;

}

function check_validate_signup(){
	let check_error = true;

	check_error = validate_email() & validate_password() & validate_name() & validate_date() & validate_sex();

	if (!check_error) {
		return false;
	}
	return true;
}


