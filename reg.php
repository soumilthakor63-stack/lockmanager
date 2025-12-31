<?php
$obj = new mysqli("localhost", "root", "", "mylocify");
// print_r($obj);
if ($obj->connect_errno != 0) {
  echo $obj->connect_error;
  exit();
}

if (isset($_POST['add'])) {
  $name = $_POST['username'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $password = $_POST['password'];
  $profile_pass = $_POST['profile_pass'];
  $enc_pass = md5($profile_pass);

  $ins = $obj->query("insert into user(username,email,contact,password,profile_pass) values('$name','$email','$contact','$password','$enc_pass')");
  if ($ins) {
    echo "<script>alert('data inserted:)');</script>";
  } else {
    echo "<script>alert('Error in code:(');</script>";
  }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration Page</title>
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
    <h2>Register Now</h2>
    <form method="POST">
      <div class="form-group">
        <input type="text" required placeholder name="username" id="username">
        <label for="name">Full Name</label>
      </div>
      <div class="form-group">
        <input type="email" required placeholder name="email" id="email">
        <label for="email">Email</label>
      </div>
      <div class="form-group">
        <input type="tel" required placeholder=" " name="contact" id="contact">
        <label for="phone">Phone Number</label>
      </div>
      <div class="form-group">
        <input type="password" required placeholder name="password" id="password">
        <label for="password">Password</label>
      </div>
      <div class="form-group">
        <input type="password" required placeholder name="profile_pass" id="profile_pass">
        <label for="profile_pass"> Profile Password</label>
      </div>

      <button type="submit" name="add" id="add" class="btn">Register</button>
    </form>
  </div>

</body>

</html>