<?php

session_start();
$formid    = $_SESSION['formid'];
$acpcid    = $_SESSION['logged_user'];
$name    = $_POST['name'];
$email     = $_POST['email'];
$contact   = "+91 ".$_POST['contact'];
$dob     = $_POST['dob'];
$aadhar    = $_POST['aadhar'];
$merit     = $_POST['merit'];
$photo     = $_POST['hide_photo'];
$gender    = $_POST['gender'];
$category    = $_POST['category'];
$address   = $_POST['address1'].", ".$_POST['address2'];
$city    = $_POST['city']; 
$state     = $_POST['state']; 
$country   = $_POST['country']; 
$distance  = $city . "," . $state . "," . $country;
$pincode   = $_POST['pincode'];
$parentname  = $_POST['parentname'];
$relation  = $_POST['relation'];
$occupation  = $_POST['occupation'];
$income    = $_POST['income'];
$hometelephone = $_POST['hometelephone'];
$parentmobile = $_POST['parentmobile'];
$localguname = $_POST['localguname'];
$localmobile = "+91 ".$_POST['localmobile'];
$localaddress = $_POST['localaddress'];


include 'connect.php';
$sql = "INSERT INTO hostel_application (formid,acpcid,name,email,contact,dob,aadhar,merit,photo,gender,category,address,distance,pincode,parentname,relation,occupation,income,hometelephone,parentmobile,localguname,localmobile,localaddress) VALUES ('$formid','$acpcid','$name','$email','$contact','$dob','$aadhar','$merit','$photo','$gender','$category','$address','$distance','$pincode','$parentname','$relation','$occupation','$income','$hometelephone','$parentmobile','$localguname','$localmobile','$localaddress')";   
mysqli_query($connection,$sql);


$sql = "UPDATE `registered_student` SET `step` = '2' WHERE `registered_student`.`formid` = '$formid'";
mysqli_query($connection,$sql);
mysqli_close($connection);   

header ("location: get_distance.php"); 

?>