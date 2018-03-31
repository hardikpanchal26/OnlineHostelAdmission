
<?php 

    include '../database/connect.php';
    $general = $_POST['gen'];
    $sebc = $_POST['sebc'];
    $scst = $_POST['scst'];
    $others = $_POST['others'];

    
    $query = mysqli_query($connection,"UPDATE `reservation` SET `general` = '$general', `sebc` = '$sebc', `scst` = '$scst', `others` = '$others' WHERE `reservation`.`id` = 1;"); 

    header("location: ../adminsuper.php");
?>
    

   