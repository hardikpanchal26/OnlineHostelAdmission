<?php
session_start();
$formid = $_SESSION['formid'];
include 'connect.php';
$sql = "UPDATE `registered_student` SET `step` = '4' WHERE `registered_student`.`formid` = '$formid'";
mysqli_query($connection,$sql);
$sql = "UPDATE `determining_factors` SET `allot` = '2' WHERE `formid` = '$formid'";
mysqli_query($connection,$sql);
mysqli_close($connection);   
header ("location: ../user.php"); 
?>
