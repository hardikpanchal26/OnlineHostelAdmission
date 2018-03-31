<?php
 session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'layout/include.php' ?>
</head>

<body style="background-color:white">
    <br />
    <input type="button" id="print" class="btn" value="Print" style="padding:2px; display:block; width:10%; font-size:20px; float:right; margin-right:20%"  onclick="window.print();"/> 
   <?php
  include 'user/filled_form.php';
?>
</body>
</html>