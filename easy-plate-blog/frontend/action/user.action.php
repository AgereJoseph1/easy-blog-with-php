<?php

$conn = mysqli_connect('localhost', 'root', '', 'easy_plate');


if (!$conn) {
	echo "Error connecting to db";
}else{
	if (isset($_POST['register'])) {
	$username = $_POST['username'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];
	$email = $_POST['email'];

	if (!isset($username) || empty($username)) {
		echo 'Please enter username';
		exit();
	}

	if (!isset($name) || empty($name)) {
		echo "Please enter your full name";
		exit();
	}

	if (!isset($email) || empty($email)) {
		echo "please enter email";
		exit();
	}

	if (!isset($password) || empty($password)) {
		echo "Please enter password";
		exit();
	}

	if (!isset($re_password) || empty($re_password)) {
		echo "Confirm password";
		exit();
	}

	if ($password != $re_password) {
		echo "Passwords do not match";
		exit();
	}

	// username exist
	$sql = "SELECT username FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo "Username already exist";
		exit();
	}


	// Email Exist
	$sql1 = "SELECT email FROM users WHERE email = '$email'";
	$result1 = mysqli_query($conn, $sql1);

	if (mysqli_num_rows($result1) > 0) {
		echo "Email already exist";
		exit();
	}

	$password = md5($password);
	$sql2 = "INSERT INTO users(name, username, password, email, phone, address, profile_pic, subscription_type, is_verified) VALUES ('$name','$username','$password','$email','','','','free','false')";
	if (mysqli_query($conn, $sql2) == True) {
		header("Location: ../front-end/register.php?Success=registrationSuccessful");
		exit();
	}else{
		echo "Unable to register";
		echo $password;
		exit();
	} 

}
}

$conn->close();


?>