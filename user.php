<?php
 session_start();
 if(!isset($_SESSION['logged_user'])) {
    header("location: index.php");
 }
?>


<!DOCTYPE html>
<html>
<head>
    <?php include 'layout/include.php' ?>
</head>

<body> 
    <?php 
   
        $logged_user = $_SESSION['logged_user'];
        include 'database/connect.php';
        $sql = mysqli_query($connection,"select * from registered_student where acpcid = '$logged_user' ");
        $data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
        $_SESSION['formid']= $data['formid'];
        $step = $data['step'];
        mysqli_close($connection);
    ?>

    <?php include 'layout/header.php' ?>
    <?php include 'layout/navigation.php' ?>
    <?php include 'user/logout.php' ?>
    <?php
    if(isset($_SESSION['student_register_status'])) 
    {
       
        $status=$_SESSION['student_register_status'];
        
        if($status==1) { echo '<p id="status" class="status" style="color:#009900; background-color:#daf7a6;">Registration Successfull. Welcome, '.$data['firstname'] .' '.$data['surname'].'</p>';
        echo '<i id="close_status" class="fa fa-close" style="float:right; color:#31708f; display:block; cursor:pointer; margin-top:-35px; margin-right:35px; font-size:20px;" 
                onclick="document.getElementById(\'status\').style.display=\'none\'; document.getElementById(\'close_status\').style.display=\'none\';" 

                onmouseover="document.getElementById(\'close_status\').style.color=\'#2daedd\'"
                onmouseout="document.getElementById(\'close_status\').style.color=\'#31708f\'">
            </i>';
        }
        
        unset($_SESSION['student_register_status']);

    }

    ?>

     <?php
        include 'database/connect.php';
        $sql = mysqli_query($connection,"select * from super WHERE admin='super'");
        $admin_data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
        $status=$admin_data['status'];
        mysqli_close($connection);
    ?>
        
   <div style="margin:20px;  overflow:hidden;" >
        
        
        <?php include 'user/status.php'; ?>
    
        <div style="margin:20px 20px 20px 20px; width:75%; padding-left:11%; ">
            
            <?php
                
                
                if ($step==1)
                { if($status==1) include 'user/1_fill_form.php';
                  else   include 'user/application_disable.php';
                }
                else if ($step==2) 
                include 'user/2_check_status.php';
                else if ($step==3)
                include 'user/3_fees_payment.php';
                else if ($step==4)
                include 'user/4_print_receipt.php';
                
            ?>    
        </div>
    </div>

<?php include 'layout/footer.php' ?>
</body>
</html>