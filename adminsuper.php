
<?php
 session_start();
 if(!isset($_SESSION['logged_admin'])) {
    header("location: index.php");
 }
 else {

   $logged_admin=$_SESSION['logged_admin']; 
   
 }

?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'layout/include.php' ?>
</head>

<body>
   <?php include 'layout/header.php'; 
         include 'user/logout.php' ;
         include '/adminsuper/admin_panel.php';
         include 'layout/footer.php' 
    ?>
</body>
</html>