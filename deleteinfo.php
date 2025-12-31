<?php
$obj= new mysqli("localhost","root","","mylocify");
// print_r($obj);
if($obj->connect_errno!=0)
{
	echo $obj->connect_error;
	exit();
}

$id=$_GET['did'];
$del=$obj->query("delete from user_password where id='$id'");
if($del)
{
	header('location:home.php');
}
else
{
	echo "error in code";
}
?>