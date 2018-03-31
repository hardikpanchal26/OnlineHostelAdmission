

<?php
	session_start();	
	include 'connect.php';
    $formid = $_SESSION['formid'];
    $sql = mysqli_query($connection,"select * from hostel_application where formid = '$formid' ");
    $data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    
    $acpcid = $data['acpcid'];
    $name = $data['name'];
    $contact = $data['contact'];
    $gender = $data['gender'];
    $category = $data['category'];
    $distance = $_POST['location'];
    $merit = $data['merit'];

    $query = mysqli_query($connection,"select * from registered_student WHERE formid='$formid'"); 
    $college =  mysqli_fetch_array($query,MYSQLI_ASSOC); 
	$college =$college['college'];

    $sql = "INSERT INTO determining_factors (formid,acpcid,name,contact,gender,category,distance,merit,college) VALUES 
           ('$formid','$acpcid','$name','$contact','$gender','$category','$distance','$merit','$college')";
    mysqli_query($connection,$sql);

    mysqli_close($connection);   

    header ("location: ../user.php");
?>

