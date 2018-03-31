<?php 
    session_start();
    //var_dump($_SESSION);
    $_SESSION['action']="allocate";
    include '../database/connect.php';
      //$query = mysqli_query($connection,"select * from admin");
      //$data = mysqli_fetch_array($query,MYSQLI_ASSOC);
       $college=$_SESSION['co'];
      $query = mysqli_query($connection,"select * from determining_factors WHERE allot= 1 AND `college` = '$college'"); 
      
      
      while($val =  mysqli_fetch_array($query,MYSQLI_ASSOC)){
           $formid = $val['formid'];
           mysqli_query($connection,"UPDATE `determining_factors` SET `allot` = '0' WHERE `formid` = '$formid'"); 
           mysqli_query($connection,"UPDATE `registered_student` SET `step` = '2' WHERE `formid` = '$formid'"); 
           mysqli_query($connection,"UPDATE `determining_factors` SET `room` = '-' WHERE `formid` = '$formid'"); 
           
    
      }            
    mysqli_close($connection); 
    header("location: ../admin.php");
?>