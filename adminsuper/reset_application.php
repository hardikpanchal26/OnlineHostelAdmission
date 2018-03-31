<?php
 include '../database/connect.php';
  
  mysqli_query($connection,"TRUNCATE table determining_factors");
  mysqli_query($connection,"TRUNCATE table hostel_application");
  mysqli_query($connection,"TRUNCATE table registered_student");
 
  mysqli_query($connection,"TRUNCATE table college_hostels");
  mysqli_query($connection,"TRUNCATE table admin");
  mysqli_query($connection,"TRUNCATE table super");

  mysqli_query($connection,"INSERT INTO `admin` (`adminid`, `adminpass`, `collegename`, `factor`, `status`) VALUES ('admin', 'admin', '', '65', '0');");
  mysqli_query($connection,"INSERT INTO `super` (`admin`, `password`, `status`) VALUES ('super', 'super',0);");
  include '../database/log_out.php';
 
?>
