<?php
session_start();
$obj = new mysqli("localhost", "root", "", "mylocify");
// print_r($obj);
if (!isset($_SESSION['u_id'])) {
  header('location:login.php');
  exit();
}

if ($obj->connect_errno != 0) { 
  echo $obj->connect_error;
  exit();
}
$viewid = $_GET['viewid'];


$uid = $_SESSION['u_id'];
$select = $obj->query("select * from user where username_id='$uid'");
$row = $select->fetch_object();

$webinfo = $obj->query("select * from user_password where username_id='$uid' and id='$viewid'");
$rowdata = $webinfo->fetch_object();




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Viwe Page</title>
    <link rel="stylesheet" href="vcss.css"> 
  
</head>

<body>

    <!-- Navbar with Dropdown -->
    <nav class="navbar">
        <div class="nav-logo">

            <span>Locify</span>
        </div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li class="dropdown">
                <a href="#">Welcome -- <?php echo $row->username; ?></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Email : <?php echo $row->email; ?></a></li>
                    <li><a href="#">Contact : <?php echo  $row->contact; ?></a></li>

                </ul>
            </li>
            <li><a href="reg.php">Register</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Registration Form -->


    <!-- Info Card -->
    <div class="info-card">
        <h3>Welcome to Locify!</h3> 

        <h4><?php echo $rowdata->website_name; ?></h4>
        <br>
        <p>Username : <?php echo $rowdata->username; ?> </p>
        <p>Password : <?php echo $rowdata->password; ?></p>
    </div>

</body>

</html>