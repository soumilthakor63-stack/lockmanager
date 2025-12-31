<?php
$obj = new mysqli("localhost", "root", "", "mylocify");
// print_r($obj);
if ($obj->connect_errno != 0) {
  echo $obj->connect_error;
  exit();
}
$eid = $_GET['eid'];

$selecdata = $obj->query("select * from user where username_id='$eid'");
$row = $selecdata->fetch_object();
if (isset($_POST['add'])) {
  $name = $_POST['username'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];


  $ins = $obj->query("update user set username='$name',email='$email',contact='$contact' where username_id='$eid'");
  if ($ins) {
    echo "<script>alert('data updated:)');
		window.location='logout.php';
	</script>";
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
    <h2> Update Now</h2>
    <form method="POST">
      <div class="form-group">
        <input type="text" required placeholder name="username" id="username" value="<?php echo $row->username; ?>">
        <label for="name">Full Name</label>
      </div>
      <div class="form-group">
        <input type="email" required placeholder name="email" id="email" value="<?php echo $row->email; ?>">
        <label for="email">Email</label>
      </div>
      <div class="form-group">
        <input type="tel" required placeholder=" " name="contact" id="contact" value="<?php echo $row->contact; ?>">
        <label for="phone">Phone Number</label>
      </div>


      <button type="submit" name="add" id="add" class="btn">Update</button>
    </form>
  </div>

</body>

</html>