<?php

session_start();
$college_name    = $_POST['college_name'];
$location       = $_POST['city'].','.$_POST['state'].','.$_POST['country'];
$new_adminid    = $_POST['new_adminid'];
$new_adminpass    = $_POST['new_adminpass'];
$factor			= $_POST['factor'];



$myInputs= $_POST['myInputs'];
$boysrooms=$_POST['boysrooms'];
$girlsrooms=$_POST['girlsrooms'];
$boysperroom=$_POST['boysperroom'];
$girlsperroom=$_POST['girlsperroom'];
$i=0;
foreach ($myInputs as $eachInput) {
	$br=$boysrooms[$i];
	$gr=$girlsrooms[$i];
	$bpr=$boysperroom[$i];
	$gpr=$girlsperroom[$i];
	echo $br;
	include 'connect.php';
          $sql = "INSERT INTO `college_hostels` (hostelname,collegename,location,boysrooms,boysperroom,girlsrooms,girlsperroom,status) VALUES ('$eachInput','$college_name','$location','$br','$bpr','$gr','$gpr',0)";
          mysqli_query($connection,$sql);
          $i++;
}




$sql = "INSERT INTO `admin` (adminid,adminpass,collegename,factor,status) VALUES ('$new_adminid','$new_adminpass','$college_name','$factor',1)";
mysqli_query($connection,$sql);


$_SESSION['logged_admin']=$new_adminid;

header("location: ../admin.php");

?>

