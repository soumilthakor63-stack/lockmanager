<?php
session_start();
$obj= new mysqli("localhost","root","","mylocify");
// print_r($obj);
if($obj->connect_errno!=0)
{
	echo $obj->connect_error;
	exit();
}
if(!isset($_SESSION['u_id']))
{
	header('location:login.php');
	exit();
}
$uid=$_SESSION['u_id'];

if(isset($_POST['add']))
{
	$webname=$_POST['websitename'];
	$name=$_POST['username'];
	$password=$_POST['password'];

	

$ins=$obj->query("insert into user_password(website_name,username,password,username_id) values('$webname','$name','$password','$uid')");
if($ins)
{
	header('location:home.php');
}
else
{
	echo "<script>alert('Error in code:(');</script>";
}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update Profile </title>
  <link rel="stylesheet" type="text/css" href="mycss.css">

</head>

<body>
  <nav class="navbar">
    <div class="nav-logo">

      <span>Locify</span>
    </div>
    <ul class="nav-links">
      <!-- <li><a href="#">Home</a></li>
    <li><a href="#">Register</a></li> -->
      <li><a href="login.php">Login</a></li>
    </ul>
  </nav>

  <div class="container">
    <h2> Password Manage form</h2>
    <form method="POST">
      <div class="form-group">
        <input type="text" required placeholder name="websitename" id="websitename">
        <label for="Name">Website Name:</label>
      </div>
      <div class="form-group">
        <input type="text" required placeholder id="username" name="username" >
        <label for="username">username:</label>
      </div>
      <div class="form-group">
        <input type="Password" required placeholder=" "name="password" id="password" >
        <label for="phone">Password:</label>
      </div>


      <button type="submit" name="add" id="add" value="Add website"  class="btn">Submit</button>
    </form>
  </div>

</body>

</html>