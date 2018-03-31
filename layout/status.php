<?php
    //session_start(); Already Started in Index
    if (isset($_SESSION['logged_user']))
    {header('location: user.php'); die();
    }
    else if(isset($_SESSION['student_register_status'])) 
    {
       
        $status=$_SESSION['student_register_status'];
        
        if($status==1) echo '<p id="status" class="status" style="color:#009900; background-color:#daf7a6;">Registration Successfull</p>';
                        
        if($status==2) echo '<p id="status" class="status">Registration Failed. Invalid combination of ACPC ID and PIN.</p>';
                    
        if($status==3) echo '<p id="status" class="status">Registration Failed. ACPC Id or PIN already used and registered.</p>';

        if($status==4) echo '<p id="status" class="status">Registration Failed. Server not responding.</p>'; 
        
        unset($_SESSION['student_register_status']);

        echo '<i id="close_status" class="fa fa-close" style="float:right; color:#31708f; cursor:pointer; margin-top:-35px; margin-right:35px; font-size:20px;" 
                onclick="document.getElementById(\'status\').style.display=\'none\'"      
                onmouseover="document.getElementById(\'close_status\').style.color=\'#2daedd\'"
                onmouseout="document.getElementById(\'close_status\').style.color=\'#31708f\'">
            </i>';
    }

    if (isset($_SESSION['logged_user']))
    {header('location: user.php'); die();
    }
    else if(isset($_SESSION['student_login_status'])) 
    {  
       
        $status=$_SESSION['student_login_status'];
        
        if($status==1) echo '<p id="status" class="status">Cannot Login. Incorrect ACPC Id or Password.</p>';
            
        unset($_SESSION['student_login_status']);
        echo '<i id="close_status" class="fa fa-close" style="float:right; color:#31708f; cursor:pointer; margin-top:-35px; margin-right:35px; font-size:20px;" 
                onclick="document.getElementById(\'status\').style.display=\'none\'"      
                onmouseover="document.getElementById(\'close_status\').style.color=\'#2daedd\'"
                onmouseout="document.getElementById(\'close_status\').style.color=\'#31708f\'">
            </i>';
    }

     if (isset($_SESSION['logged_admin']))
    {header('location: admin.php'); die();
    }
    else if(isset($_SESSION['admin_login_status'])) 
    {  
        $status=$_SESSION['admin_login_status'];
        
        if($status==1) echo '<p id="status" class="status" >Cannot Login. Incorrect Admin Id or Password.</p>';
            
        unset($_SESSION['admin_login_status']);
        echo '<i id="close_status" class="fa fa-close" style="float:right; color:#31708f; cursor:pointer; margin-top:-35px; margin-right:35px; font-size:20px;" 
                onclick="document.getElementById(\'status\').style.display=\'none\'"      
                onmouseover="document.getElementById(\'close_status\').style.color=\'#2daedd\'"
                onmouseout="document.getElementById(\'close_status\').style.color=\'#31708f\'">
            </i>';
    }

?>