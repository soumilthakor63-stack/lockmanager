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


$uid = $_SESSION['u_id'];
$select = $obj->query("select * from user where username_id='$uid'");
$row = $select->fetch_object();

$webinfo = $obj->query("select * from user_password where username_id='$uid'");



?>
<!DOCTYPE html>
<html>

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="home.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
          
</head>

<body>
  <nav class="navbar navbar-expand-sm  bg-primary  back navbar-dark">
    <!-- Brand -->
    <h2><a class="navbar-brand font-italic" href="#">Locify</a></h2>

    <!-- Links -->
    <ul class="navbar-nav">


      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">Welcome :- <?php echo $row->username; ?></a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Email : <?php echo $row->email; ?></a>
          <a class="dropdown-item" href="#">Contact : <?php echo  $row->contact; ?></a>
          <a class="dropdown-item text-primary">Edit</a>
          <a class="dropdown-item text-danger" href="logout.php">Logout</a>
        </div>
      </li> 
    </ul>
  </nav>
  <br>
  <div class="container">

    <a href="webinfo.php" class="btn btn-add col-sm-2">Add</a>
    <h3 class="mt-5">Welcome to Locify- User password System</h3>
    <br>
    <div class="row">
      <?php
      while ($rowdata = $webinfo->fetch_object()) {

      ?>
        <div class="card col-sm-3 m-4">

          <div class="card-body">
            <h4 class="card-title"><?php echo $rowdata->website_name; ?></h4>
            <!-- <p class="card-text">This is the page where you can View and Update your Details.</p> -->
            <div class="row">
              <a href="profilepass.php?viewid=<?php echo $rowdata->id; ?> " class=" btn btn-success mr-2">View</a>
              <a href="profileedpass.php?edid=<?php echo $rowdata->id; ?>" class="btn btn-primary mr-2">Edit</a>
              <a href="deleteinfo.php?did=<?php echo $rowdata->id; ?>" class="btn btn-danger mr-2">Delete</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>

    </div>
  </div>




</body>

</html>