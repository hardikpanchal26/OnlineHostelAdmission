
<?php
 	session_start();

	$_SESSION['student_register_status']=4;

	if(isset($_POST["student_register_submit"]))
	{	
	 	$acpcid = $_POST["acpcid"];
    $pin = $_POST["pin"];
 		$firstname = $_POST["firstname"];
 		$surname = $_POST["surname"];
 		$email = $_POST["email"];
 		$pass= $_POST["password"];
    $course=$_POST["course"];
    $college=$_POST["college"];
    $hostel=$_POST["hostel"];
 		$step = 1;

//---------------CHECK IF ACPC ID AND PIN Exists and are related to each other ----------/
       
       function check_acpcid_pin() {
          //if correct 
       	  return 1;
       	  // else 
       	  //return 0;
       }

//---------------------------------------------------------------------------------------/
       
       if(check_acpcid_pin()==0)
       {
       $_SESSION['student_register_status']=2;
       }
   	   else 
   	   {
   	   	  include 'connect.php';

          $sql = "INSERT INTO registered_student (acpcid, pin, firstname, surname, email, password, course, college, hostel ,step) VALUES 
          ('".$acpcid."','".$pin."','".$firstname."','".$surname."','".$email."','".$pass."','".$course."','".$college."','".$hostel."', '".$step."')";
 			
 		     if(mysqli_query($connection,$sql)) {$_SESSION['student_register_status']=1; $_SESSION['logged_user']=$acpcid; }
 		     else  $_SESSION['student_register_status']=3;
   	   	   
   	   	   mysqli_close($connection);

   	   }

   	}
   
    header("location: ../index.php");
?>