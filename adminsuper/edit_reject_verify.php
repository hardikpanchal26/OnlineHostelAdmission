
<?php 
    session_start();
    $_SESSION['action']='applicants';
    include '../database/connect.php';

    $formid = $_POST['formid'];
    
    if(isset($_POST['edit']))
    {  

        header("location: http://localhost/phpmyadmin/tbl_change.php?db=hostel&table=hostel_application&where_clause=%60hostel_application%60.%60formid%60+%3D+".$_POST['formid']."&clause_is_unique=1&sql_query=SELECT+%2A+FROM+%60hostel_application%60&goto=sql.php&default_action=update");
    }

    else if(isset($_POST['reject']))
    {
        mysqli_query($connection,"UPDATE `determining_factors` SET `allot` = '-2' WHERE `determining_factors`.`formid` = $formid;");
        header ("location: ../admin.php");
    }

    else if(isset($_POST['verify']))
    {
        mysqli_query($connection,"UPDATE `determining_factors` SET `allot` = '0' WHERE `determining_factors`.`formid` = $formid;");
        header ("location: ../admin.php");
    }


    mysqli_close($connection); 
?>