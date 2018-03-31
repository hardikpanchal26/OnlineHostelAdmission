
<?php
 	session_start();
	$_SESSION['admin_login_status']=1;
	if(isset($_POST["admin_login_submit"]))
	{	
	 	$adminid = $_POST["adminid"];
    $adminpass   = $_POST["adminpass"];
    $adminstatus = 1;
   	


    include 'connect.php';	
      $sql = "SELECT * FROM super WHERE (admin='$adminid' AND password='$adminpass')";
      if(mysqli_num_rows(mysqli_query($connection,$sql))==1)
      { 
       $_SESSION['logged_admin']=$adminid;
       header("location: ../adminsuper.php"); die();
      }
      else  
      { 
         $sql = "SELECT * FROM admin WHERE (adminid='$adminid' AND adminpass='$adminpass')";
         if(mysqli_num_rows(mysqli_query($connection,$sql))==1)
          { 
            $_SESSION['logged_admin']=$adminid;
            header("location: ../admin.php"); die();
          }
          else  
          { $_SESSION['admin_login_status']=1;
            header("location: ../index.php");
          }
      }
      mysqli_close($connection);
  }

?>