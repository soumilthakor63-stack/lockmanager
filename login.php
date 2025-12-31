<?php
session_start();
$obj = new mysqli("localhost", "root", "", "mylocify");
// print_r($obj);
if ($obj->connect_errno != 0) {
	echo $obj->connect_error;
	exit();
}
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$select = $obj->query("select * from user where email='$email' and password='$password'");
	$row_count = $select->num_rows;
	if ($row_count == 1) {
		$row = $select->fetch_object();
		// print_r($row);
		$id = $row->username_id;
		$_SESSION['u_id'] = $id;
		header('location:home.php');
	} else {
		echo "<script>alert('missmatch password or Email');</script>";
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
			<!-- <li><a href="home.php">Home</a></li> -->
			<li><a href="reg.php">Register</a></li>
			<!-- <li><a href="login.php">Login</a></li> -->
		</ul>
	</nav>


	<div class="container">
		<h2>Login Page</h2>
		<form method="POST">

			<div class="form-group">
				<input type="email" required placeholder name="email" id="email">
				<label for="email">Email</label>
			</div>

			<div class="form-group">
				<input type="password" required placeholder name="pass" id="pass">
				<label for="password">Password</label>
			</div>


			<button type="submit" name="login" id="login" class="btn">Log In</button>
		</form>
	</div>

</body>

</html