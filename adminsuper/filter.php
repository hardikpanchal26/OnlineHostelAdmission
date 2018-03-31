<?php
  session_start();
  $name = $_POST['filter'];
  if($name=="a1")
  $_SESSION['action']="applicants";
  else if($name=="a2")
  $_SESSION['action']="applicants1";
  else if($name=="a3")
  $_SESSION['action']="applicants2";
 else if($name=="a4")
  $_SESSION['action']="applicants3";
else if($name=="a5")
  $_SESSION['action']="applicants4";
else if($name=="a6")
  $_SESSION['action']="applicants5";
else if($name=="a7")
  $_SESSION['action']="applicants6";

header ("location: ../adminsuper.php");
?>

