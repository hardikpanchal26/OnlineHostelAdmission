
<?php
 	session_start();
	
	if(isset($_POST["student_login_submit"]))
	{	
	 	$login_acpcid = $_POST["login_acpcid"];
    $login_pass   = $_POST["login_pass"];
   	include 'connect.php';	
      $sql = "SELECT * FROM registered_student WHERE (acpcid='$login_acpcid' AND password='$login_pass')";

      if(mysqli_num_rows(mysqli_query($connection,$sql))==1)
      { 
       $_SESSION['logged_user']=$login_acpcid;
       header("location: ../user.php"); die();
      }
      else  
      { $_SESSION['student_login_status']=1;
        header("location: ../index.php");
      }
      
      mysqli_close($connection);
  }

?>