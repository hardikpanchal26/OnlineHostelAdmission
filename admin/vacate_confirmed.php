<?php 
    session_start();
    $_SESSION['action']="allocate";
    include '../database/connect.php';
       $college=$_SESSION['co'];
      $query = mysqli_query($connection,"select * from determining_factors WHERE allot= 2 AND `college` = '$college'"); 
      
      
      while($val =  mysqli_fetch_array($query,MYSQLI_ASSOC)){
           $formid = $val['formid'];
           mysqli_query($connection,"UPDATE `determining_factors` SET `allot` = '0' WHERE `formid` = '$formid'"); 
           mysqli_query($connection,"UPDATE `registered_student` SET `step` = '2' WHERE `formid` = '$formid'"); 
           mysqli_query($connection,"UPDATE `determining_factors` SET `room` = '-' WHERE `formid` = '$formid'"); 
           
    
      }            
    mysqli_close($connection); 
    header("location: ../admin.php");
?>