<?php

session_start();
header('location:1-login-sahayak.php');

$con = mysqli_connect('localhost','root');
if($con){
	echo"Connect successfull";
}

mysqli_select_db($con, 'healthcare'); 

$id = $_POST['user'];
$pass = $_POST['password'];

$q = "SELECT F_name from aadhar where aadhar = '$id' && password = '$pass' ";

$result = mysqli_query($con, $q);
$data=mysqli_fetch_array($result);
$arr=$data['F_name'];
$num = mysqli_num_rows($result);

if($num == 1){
	$_SESSION['patient_name'] = $arr;
	$_SESSION['patient_id'] = $id;
	header('location:2-dashboard-sahayak.php');
}
else
{

		header('location:1-login-sahayak.php');
}
?>