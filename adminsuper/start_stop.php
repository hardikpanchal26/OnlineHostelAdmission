
<?php 
   session_start();
   $logged_admin = $_SESSION['logged_admin'];
    include '../database/connect.php';
   
   $sql = mysqli_query($connection,"select * from super where admin = '$logged_admin' ");
   $admin_data = mysqli_fetch_array($sql,MYSQLI_ASSOC);

   if($admin_data['status']==0)
   { 
   	 mysqli_query($connection,"UPDATE `super` SET `status` = '1' WHERE `super`.`admin` = '$logged_admin'");

   }
   else if ($admin_data['status']==1)
   {
   	 mysqli_query($connection,"UPDATE `super` SET `status` = '0' WHERE `super`.`admin` = '$logged_admin'");
   }

   header ("location: ../adminsuper.php");
 mysqli_close($connection); 
?>

