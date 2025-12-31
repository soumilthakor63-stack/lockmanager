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
$editid = $_GET['edid'];
$selectdata = $obj->query("select * from user_password where id='$editid'");
$row = $selectdata->fetch_object();

if (isset($_POST['add'])) {
  $webname = $_POST['websitename'];
  $name = $_POST['username'];
  $password = $_POST['password'];




  $update = $obj->query("update user_password set website_name='$webname',username='$name',password='$password',username_id='$uid' where id='$editid'");
  if ($update) {
  
    header('location:home.php');
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
  <title>Web Update Page</title>
  <link rel="stylesheet" type="text/css" href="mycss.css">

</head>

<body>
  <nav class="navbar">
    <div class="nav-logo">

      <span>Locify</span>
    </div>
    <ul class="nav-links">
      <!-- <!-- <li><a href="#">Home</a></li> -->
      <li><a href="#">Register</a></li> -->
      <!-- <li><a href="login.php">Login</a></li> -->
    </ul>
  </nav>

  <div class="container">
    <h2>Register Now</h2>
    <form method="POST">
      <div class="form-group">
        <input type="text" required placeholder name="websitename" id="websitename" value="<?php echo $row->website_name; ?>">
        <label for="name">Website Name:</label>
      </div>

      <div class="form-group">
        <input type="text" required placeholder=" " name="username" id="username" value="<?php echo $row->username; ?>">
        <label for="phone">username:</label>
      </div>
      <div class="form-group">
        <input type="text" required placeholder name="password" id="password" value="<?php echo $row->password; ?>">
        <label for="password">Password</label>
      </div>


      <button type="submit" name="add" id="add" class="btn" value="Update website">Register</button>
    </form>
  </div>

</body>

</html>