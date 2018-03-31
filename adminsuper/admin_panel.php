<?php

include 'database/connect.php';
   $sql = mysqli_query($connection,"select * from super where admin = '$logged_admin' ");
   $data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
   $status=$data['status'];
?>

<div style="overflow:hidden;" >


        
        <div id="sidebar" style=" width:15%; margin-top:5px; float:left;">    
            <div class="box"  style="background-color:#3f3f3f; color:#ffffff; font-family:'Saira'; text-align:center; height:490px" >
            <p  style=" padding:5px; margin:-15px; font-size:18px; color:#00ff00">Welcome, Admin</p><br />
            <p id="dashboard" class="sidelinkin" " onclick="admin_action(id)"><i class="fa fa-tachometer" style="font-size:24px"></i><br />Dashboard</p><br />
            <p id="colleges" class="sidelinkin" onclick="admin_action(id)"><i class="fa fa-building" style="font-size:24px;"></i><br />Colleges and Hostels</p><br />
            <p id="applicants" class="sidelinkin"  onclick="admin_action(id)"><i class="fa fa-users" style="font-size:24px;"></i><br />applicants</p><br /> 
             <p id="vacate" class="sidelinkin" onclick="admin_action(id)"><i class="fa fa-th-large" style="font-size:24px;"></i><br />Vacate</p><br />  
            <p id="reset_all" class="sidelinkin" onclick="admin_action(id)"><i class="fa fa-history" style="font-size:24px;"></i><br />Reset All</p><br />     
            </div>
        </div>

        <div style="width:85%; float:right;">
            <br />
            <form id="action_form" method="post">
            <input type="hidden" id="action" name="action" value="dashboard"/>
            </form>
            <div align="center" style="margin:30px; margin-bottom:0px; height:460px; box-shadow: 0px 0px 5px 0px #bbb; overflow-y:scroll;">
            
                <?php  
                if(isset($_POST['action']))
                $path = $_POST['action'];
                else if(isset($_SESSION['action']))
                {$path = $_SESSION['action'];
                  unset($_SESSION['action']);
                }
                else 
                $path = 'dashboard';

                include $path.'.php';
                 ?>    
            </div>

            </div>
        </div>
</div>

<script>
    
        var path = '<?php echo $path; ?>'; 
        document.getElementById(path).setAttribute("style", "color: #2daedd;");
        
    function admin_action(id)
    { 
       document.getElementById('dashboard').removeAttribute("style");
       document.getElementById('colleges').removeAttribute("style");
       document.getElementById('applicants').removeAttribute("style");
       document.getElementById('vacate').removeAttribute("style");
       document.getElementById('reset_all').removeAttribute("style");
       document.getElementById('action').value=id;
       document.getElementById('action_form').submit();
    }
    
</script>

