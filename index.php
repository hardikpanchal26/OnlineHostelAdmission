<?php
 session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'layout/include.php' ?>
</head>

<body>
    <?php include 'layout/header.php' ?>
    <?php include 'layout/navigation.php' ?>
    
    <?php include 'admin/admin_login.php' ?>

    <div style=" overflow:hidden;">
        
        <?php include 'layout/status.php' ?>
        
        <div style="margin:20px 0px 20px 20px; width:70%; float:left;" >    
            <?php include 'layout/register_login.php' ?>        
        </div>

        <div style="margin:20px 20px 20px 0px;  width:25%; float:right;">
            <?php include 'layout/forms/check_status.php' ?>
            <?php include 'layout/announcement.php' ?>
        </div>
        
    </div>

<?php include 'layout/footer.php' ?>
</body>
</html>