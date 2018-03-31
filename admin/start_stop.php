
<?php 
   session_start();
   $logged_admin = $_SESSION['logged_admin'];
    include '../database/connect.php';
   
   $sql = mysqli_query($connection,"select * from admin where adminid = '$logged_admin' ");
   $admin_data = mysqli_fetch_array($sql,MYSQLI_ASSOC);

   if($admin_data['status']==1)
   { 
   	 mysqli_query($connection,"UPDATE `admin` SET `status` = '2' WHERE `admin`.`adminid` = '$logged_admin'");

   }
   else if ($admin_data['status']==2)
   {
   	 mysqli_query($connection,"UPDATE `admin` SET `status` = '1' WHERE `admin`.`adminid` = '$logged_admin'");
   }

   header ("location: ../admin.php");
 mysqli_close($connection); 
?>

