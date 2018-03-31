
<?php
 session_start();
 if(!isset($_SESSION['logged_admin'])) {
    header("location: index.php");
 }
 else {

   $logged_admin=$_SESSION['logged_admin']; 
   include 'database/connect.php';
   $sql = mysqli_query($connection,"select * from admin where adminid = '$logged_admin' ");
   $data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
   $status=$data['status'];
   mysqli_close($connection);
 }

?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'layout/include.php' ?>
</head>

<body>
   <?php include 'layout/header.php' ?>
    <?php include 'user/logout.php' ?>
  <?php
     
    if($status==0)
      include 'admin/admin_status_1.php';
      else
      include '/admin/admin_panel.php';
  ?>
<?php include 'layout/footer.php' ?>
</body>
</html>