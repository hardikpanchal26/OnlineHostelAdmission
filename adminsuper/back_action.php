
<?php 
    session_start();
    $_SESSION['action']="applicants";
    
    header("location: ../adminsuper.php");
?>