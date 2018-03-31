<div style="overflow:hidden;" >


        
        <div id="sidebar" style=" width:15%; margin-top:5px; float:left;">    
            <div class="box"  style="background-color:#3f3f3f; color:#ffffff; font-family:'Saira'; text-align:center; height:490px" >
            <p  style=" padding:5px; margin:-15px; font-size:18px; color:#2daedd">Welcome, Admin</p><br />
            <p id="dashboard" class="sidelink" " onclick="admin_action(id)"><i class="fa fa-tachometer" style="font-size:28px"></i><br />Dashboard</p><br />
            <p id="applicants" class="sidelink" onclick="admin_action(id)"><i class="fa fa-users" style="font-size:28px;"></i><br />Applicants</p><br />
             <p id="reserve" class="sidelink" onclick="admin_action(id)"><i class="fa fa-pie-chart" style="font-size:28px;"></i><br />Reservation</p><br />
            <p id="allocate" class="sidelink"  onclick="admin_action(id)"><i class="fa fa-sitemap" style="font-size:28px;"></i><br />Allocate</p><br /> 
             <p id="vacate" class="sidelink" onclick="admin_action(id)"><i class="fa fa-th-large" style="font-size:28px;"></i><br />Vacate</p><br />  
                
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
       document.getElementById('applicants').removeAttribute("style");
       document.getElementById('allocate').removeAttribute("style");
       document.getElementById('vacate').removeAttribute("style");
       document.getElementById('reserve').removeAttribute("style");
       document.getElementById('action').value=id;
       document.getElementById('action_form').submit();
    }
    
</script>

