<?php
session_start();
$obj = new mysqli("localhost", "root", "", "mylocify");
// print_r($obj);
if ($obj->connect_errno != 0) {
	echo $obj->connect_error;
	exit();
}
if (!isset($_SESSION['u_id'])) {
	header('location:login.php');
	exit();
}
$uid = $_SESSION['u_id'];

$viewid = $_GET['viewid'];

$selectdata = $obj->query("select * from user where username_id='$uid'");
$row = $selectdata->fetch_object();
$propass = $row->profile_pass;

if (isset($_POST['add'])) {

	$profile_pass = $_POST['profile_pass'];
	$enc_pass = md5($profile_pass);


	if ($propass == $enc_pass) {
		header('location:viewinfo.php?viewid=' . $viewid);
	}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="mycss.css">

</head>

<body>
	<nav class="navbar">
		<div class="nav-logo">

			<span>Locify</span>
		</div>
		<ul class="nav-links">
			<!-- <li><a href="#">Home</a></li> -->
			<li><a href="reg.php">Register</a></li>
			<!-- <li><a href="login.php">Login</a></li> -->
		</ul>
	</nav>


	<div class="container">
		<h2>Profile Verify</h2>
		<form method="POST">



			<div class="form-group">
				<input type="password" required placeholder name="profile_pass" id="pass">
				<label for="profile_password">Profile Password</label>
			</div>


			<button type="submit" name="add" id="add" class="btn">Submit</button>
		</form>
	</div>

</body>

</html>