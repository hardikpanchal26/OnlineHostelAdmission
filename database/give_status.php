<?php
session_start();
echo $_POST['form_id'];

$formid = $_POST['form_id'];
include 'connect.php';
$sql = "SELECT * FROM `determining_factors` WHERE `formid` = '$formid'";
$result = mysqli_query($connection,$sql);
$rows = mysqli_num_rows($result);

if ($rows != 0)
{
  $data = mysqli_fetch_array($result,MYSQLI_ASSOC); 	
  $_SESSION['form_status'] = $data['allot'];
}

else 
{
	$_SESSION['form_status'] = -3;
}

mysqli_close($connection);   


header ("location: ../index.php"); 

?>
