
<div class="box" style="color:#31708f; height:450px; padding:0px; background-color:#e3f2fd; overflow:hidden; display:block">
    
    <div id="register-no" style="display:block">
        <div style="background-color:#e3f2fd; padding:5px; height:200px;">
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-edit" style="font-weight:bold;"></i>  &nbsp; Instructions</h3>
	  	    <ul>
	  	    	<li>Hostel allocation procedure will start on 31/12/2017.</li>
                <li>Fresh Students who wish to take admissions in hostel must apply for new registration.</li>
                <li>Registered users may Log In.</li>
                <li>This portal is intended to be used by students who want to apply for hostels, others must refrain from using it.</li>
                <li>Providing incorrect details may lead to legal action. Please provide correct details.</li>
            </ul>
        </div>
                
        <div style="margin:0px 0px 0px 0px; width:100%; font-family:arial; display:inline-block;">
        
            <div  style=" float:left; width:50%; overflow:hidden; height:240px; background-color:#3f3f3f; color:white; text-align:center" >
                <br /><br /><br />
                <h3>New Applicant ?</h3>
                <button class="btn" id="register" style="padding:10px;  font-size:18px; width:50%">Register</button>           
                <br /><br /><br /><br /><br />
            </div>

            <div style="float:right; width:50%; display:block; height:240px; overflow:hidden; background-color:#1e457e; color:white; text-align:center">
                <div id="login-no" style="display:block;">
                <br /><br /><br />
                <h3>Already Registered ?</h3>
                <button class="btn" id="login" style="padding:10px; font-size:18px; width:50%">Log In</button>
        	    <br /><br /><br /><br /><br />
                </div>
                <?php include 'layout/forms/student_login.php' ?>
            </div> 
        </div>
    </div>
    <?php
        include 'database/connect.php';
        $sql = mysqli_query($connection,"select * from super");
        $admin_data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
        $status=$admin_data['status'];
        mysqli_close($connection);

        if($status==1)
        include 'register_enable.php';
        else 
        include 'register_disable.php';
    ?>
</div>

<script> 

   document.getElementById("register-yes").style.display="none";
   document.getElementById("login-yes").style.display="none";

    $(document).ready(function(){
        $("#register").click(function(){
            $("#register-yes").slideToggle("slow");
            $("#register-no").slideToggle("slow");
            
            
        });
    
        $("#back_reg").click(function(){
            $("#register-yes").slideToggle("slow");
            $("#register-no").slideToggle("slow");
        });
    });

    $(document).ready(function(){
        $("#login").click(function(){
            $("#login-yes").slideToggle("slow");
             $("#login-no").slideToggle("slow");
        });

    
        $("#back").click(function(){
            $("#login-yes").slideToggle("slow");
            $("#login-no").slideToggle("slow");
        });
    });

</script>