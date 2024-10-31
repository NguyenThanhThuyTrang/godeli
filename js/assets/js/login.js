const form = document.querySelector("form")
const username = document.getElementById("username")
const fullname = document.getElementById("fullname")
const email = document.getElementById("email")
const password = document.getElementById("password")
const country = document.getElementById("country")
const password2 = document.getElementById("Confirm Password")
const phone = document.getElementById("phone")
const message = document.getElementById("message")

//--------------------------------------------------------------------SHOW-----------------------------
// Show Error
function showError(input, message) {
	const formControl = input.parentElement;
	formControl.className = "form-control error";
	const small = formControl.querySelector("small");
	small.innerText = message;
}

// Show success outline
function showSuccess(input, message) {
	const formControl = input.parentElement;
	formControl.className = "form-control success";
	const small = formControl.querySelector("small");
	small.innerText = message;
}

function getFieldName(input) {
	return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

//--------------------------------------------------------------------EVENT-----------------------------

form.addEventListener("submit", function (e) {
	e.preventDefault();
	// 	if (!checkRequiredField([username,fullname,email,phone,country,password,password2])) {
	// 		//Regular Expression
	// 		checkUserName(username);
	// 		checkFullName(fullname);
	// 		checkPhone(phone);
	// 		checkCountry(country);
	// 		checkPwd(password);
	// 		matchPassword(password,password2);
	//   	}
});
//------------------------------------------------------------------------------------------
$(document).ready(function () {
	//CheckUsername
	function checkUserName(input) {
		const regUsername = /^[a-zA-Z0-9]{1,20}$/;
		if (!regUsername.test(input.value.trim())) {
			showError(input, `${getFieldName(input)} required: Case-insensitive strings and numbers from 1 to 20 characters `);
			return false;
		} else {
			showSuccess(input, "");
			return true;
		}
	}
	//CheckEmail
	function checkEmail(input) {
		const regexEmail = /^\w+([\.-]?\w+)*@[a-z]+(\.[a-z]{2,3})+$/;
		if (!regexEmail.test(input.value.trim())) {
			showError(input, `${getFieldName(input)} is not valid`);
			return false;
		}
		else {
			showSuccess(input, "");
			return true;
		}

	}
	//CheckFullName
	function checkFullName(input) {
		const regFullName = /^[A-Za-za-zA-Z\s|À|Á|Â|Ã|È|É|Ê|Ì|Í|Ò|Ó|Ô|Õ|Ù|Ú|Ă|Đ|Ĩ|Ũ|Ơ|à|á|â|ã|è|é|ê|ì|í|ò|ó|ô|õ|ù|ú|ă|đ|ĩ|ũ|ơ|Ư|Ă|Ạ|Ả|Ấ|Ầ|Ẩ|Ẫ|Ậ|Ắ|Ằ|Ẳ|Ẵ|Ặ|Ẹ|Ẻ|Ẽ|Ề|Ề|Ể|Ế|ư|ă|ạ|ả|ấ|ầ|ẩ|ẫ|ậ|ắ|ằ|ẳ|ẵ|ặ|ẹ|ẻ|ẽ|ề|ề|ể|ế|Ễ|Ệ|Ỉ|Ị|Ọ|Ỏ|Ố|Ồ|Ổ|Ỗ|Ộ|Ớ|Ờ|Ở|Ỡ|Ợ|Ụ|Ủ|Ứ|Ừ|ễ|ệ|ỉ|ị|ọ|ỏ|ố|ồ|ổ|ỗ|ộ|ớ|ờ|ở|ỡ|ợ|ụ|ủ|ứ|ừ|Ử|Ữ|Ự|Ỳ|Ỵ|Ý|Ỷ|Ỹ|ử|ữ|ự|ỳ|ỵ|ỷ|ỹ|]+$/;
		if (!regFullName.test(input.value.trim())) {
			showError(input, `${getFieldName(input)} required: Only contain strings and don't contain number strings and special characters`);
			return false;
		} else {
			showSuccess(input, "");
			return true;
		}
	}
	//checkPhone
	function checkPhone(input) {
		const regPhone = /^0[2-9]\d{8}$/;
		if (!regPhone.test(input.value.trim())) {
			showError(input, `${getFieldName(input)} required: Only number and maximum 10 characters. Starting at 0, next is number from 2 to 9`);
			return false;
		} else {
			showSuccess(input, "");
			return true;
		}

	}
	//checkCountry
	function checkCountry(input) {
		const regCountry = /^[a-zA-Z\s]{2,20}$/i;
		if (!regCountry.test(input.value.trim())) {
			showError(input, `${getFieldName(input)} required: Only character strings from 10 to 20 characters`);
			return false;
		} else {
			showSuccess(input, "");
			return true;
		}

	}
	//checkPwd
	function checkPwd(input) {
		const regPwd = /^[\w@!#$%^&*]{5,20}$/;
		if (!regPwd.test(input.value.trim())) {
			showError(input, `${getFieldName(input)} required: Contain character strings from 5 to 20 characters and special characters`);
			return false;
		} else {
			showSuccess(input, "");
			return true;
		}

	}
	//matchPassword
	function matchPassword(input, input2) {
		if (input.value.trim() != input2.value.trim()) {
			showError(input2, `${getFieldName(input)} not match`);
			return false;
		} else {
			showSuccess(input2, ``);
			return true;
		}
	}

	// Test user
	var user = [
		{
			id: 0,
			username: 'ton',
			email: 'heohong0407@gmail.com',
			password: '12345'
		},
		{
			id: 1,
			username: 'nam',
			email: 'nam@gmail.com',
			password: '12345'
		}
	]
	//Result

	$('#signUp').click(function () {
		console.log(user);
		if (checkUserName(username) && checkEmail(email) && checkPwd(password) && matchPassword(password, password2)) {
			var data = {
				id: user.length + 1,
				username: $('#username').val().trim(),
				email: $('#email').val().trim(),
				password: $('#password').val().trim()
			}
			user.push(data);
			localStorage.setItem('user', JSON.stringify('user'));
			$('#signUpModal .modal-title').text('Successful registration');
			$('#signUpModal .modal-body').html(`<img src="../assets/img/tonton-yuta.gif" alt="" style="width: 150px;height: 150px;">
			<h2>Welcome <i>${data.username}</i> to our Website !!!</h2>
            <h2>Please go back to login to continue</h2>`);
			$('#goSignIn').css('display', 'block');
			$('#backHome').css('display', 'none');
			
		}
		else {
			$('#signUpModal .modal-title').text('Registration failed');
			$('#signUpModal .modal-body').html(`<img src="../assets/img/tonton-winnie-sad.gif" alt="" style="width: 150px;height: 150px;">
			<h2>Please fill in the information correctly and completely!</h2>`);
			$('#goSignIn').css('display', 'none');
			$('#backHome').css('display', 'none');
		}
	});
	//Login function
	$('#login').click(function () {
		localStorage.getItem('user', JSON.stringify('user'));
		console.log(user);

		var username_login = $('#username').val().trim();
		var password_login = $('#password').val().trim();
		var check = user.find(function (item) {
			return item.username == username_login && item.password == password_login;
		});
		if (check) {
			$('#signUpModal .modal-title').text('Successful login');
			$('#signUpModal .modal-body').html(`<img src="../assets/img/tonton-yuta.gif" alt="" style="width: 150px;height: 150px;">
				<h2>Welcome <i>${check.username}</i> to our Website !!!</h2>
            	<h2>Wish you have a happy experience</h2>`);
			$('#backHome').css('display', 'block');
			$('#goSignUp').css('display', 'none');
			console.log(check);
		} else {
			$('#signUpModal .modal-title').text('Login failed');
			$('#signUpModal .modal-body').html(`<img src="../assets/img/tonton-winnie-sad.gif" alt="" style="width: 150px;height: 150px;">
				<h2>Please fill in the information correctly and completely!</h2>`);
			$('#goSignUp').css('display', 'none');
			$('#backHome').css('display', 'none');
		}
	});

	$('#change').click(function () {
		
		console.log(user);
		if (checkUserName(username) && checkFullName(fullname) && checkEmail(email) && checkPhone(phone) && checkCountry(country) && checkPwd(password) && matchPassword(password, password2)) {
			$('#signUpModal .modal-title').text('Successful registration');
			$('#signUpModal .modal-body').html(`<img src="../assets/img/tonton-yuta.gif" alt="" style="width: 150px;height: 150px;">
				<h2>Membership registration complete!</h2>
           	 	<h2>See information below the form <i class="fa-solid fa-arrow-down"></h2>`);
			var addItem = "<tr><td>" + username.value + "</td><td>" + fullname.value + "</td><td>" + email.value + "</td><td>" + phone.value + "</td><td>"
			+ country.value + "</td><td>" + message.value + "</td></tr>"; 
			$("table tbody").append(addItem);
		}
		else {
			$('#signUpModal .modal-title').text('Registration failed');
			$('#signUpModal .modal-body').html(`<img src="../assets/img/tonton-winnie-sad.gif" alt="" style="width: 150px;height: 150px;">
				<h2>Please fill in the information correctly and completely!</h2>
				<h2>Press close to continue</h2>`);
		}
	});
});
var user = JSON.parse(localStorage.getItem('user'));

