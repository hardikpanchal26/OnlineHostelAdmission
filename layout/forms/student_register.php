
<form id="register_form" action="database/student_register.php" method="POST" autocomplete="off" style="padding-left:50px; font-family:'Saira'">

      <i id="back_reg" class="fa fa-arrow-left" style="float:right; color:#31708f; cursor:pointer; margin:15px; font-size:20px;" 
            onclick="register_close()"      
            onmouseover="document.getElementById('back_reg').style.color='#2daedd'"
            onmouseout="document.getElementById('back_reg').style.color='#31708f'">
            <span style="font-family:'Saira';">Back</span>
      </i>

      
      <br />
      <div id="course_sel" style="display:block">
      <br /><br /><br />
      <label for="course" align="center" style="font-size:20px">Which Course?</label>
       <select class="registration_select" required id="course" name="course"  >
            <option value="select">--SELECT--</option>
            <option value="be">B.E. / B.TECH</option>
            <option value="me">M.E. / M.TECH</option>
            <option value="be">B.Sc</option>
            <option value="me">M.Sc</option> 
            <option value="be">BCA / MCA</option>
            <option value="be">B.Pharm.</option>
            <option value="be">M.Pharm.</option> 
            <option value="me">M.E. / M.TECH</option>
                  
      </select>
      <?php /*include 'database/connect.php';
            $sql2 = mysqli_query($connection,"select * from admin where collegename != '' ");
            $status = mysqli_fetch_array($sql2,MYSQLI_ASSOC);
            mysqli_close($connection);*/
      ?>
      <script src=user/college.js ></script>
            <br /><br />
            <label for="course" align="center" style="font-size:20px">College</label>
                                <select class="registration_select"  name="college" id="college" style="width:87%" onchange="setHostel();">
                                </select>
                              <br /><br />        
                                <label for="course" align="center" style="font-size:20px">Hostel?</label>
                                <select class="registration_select" name="hostel"  id="hostel" style="width:87%" onchange="selectcourse()">
                                </select>

            <div style="display:none">
                                <label for="country">Country</label><br />
                                <select  name="country" style="width:87%" id="country" onchange="setCollege();">
                                    <option value="India">India</option>
                                </select>
            </div>
       </div>
      <script>
            function selectcourse()
            {  
                document.getElementById("course_sel").style.display="none";
                document.getElementById("after_course").style.display="block";
            }
      </script>
      
      <div id="after_course" style="display:none">
      <label for="acpcid" align="left">ACPC Id</label><br />
      
      <input type="text" name="acpcid" class="inp registration"  required  placeholder="Enter your ACPC Id/GUJCET Roll no."  title="Numeric 6-8 Digits"/>
      
      <span class="icon-validation fa"  data-icon="&#xf046"></span> <br />
            
      <label for="pin">Pin</label><br />
      <input type="text" name="pin" class="inp registration"  required  placeholder="Enter 14 digit PIN" title="Must contain 14 Characters" />
      <span class="icon-validation fa" data-icon="&#xf046"></span> <br />
    
      <label for="name">Name</label><br />
      <input type="text" name="firstname" class="inp registration" required  placeholder="Your Name" title="Only alphabet allowed" style="width:150px;"/>
      <input type="text" name="surname" class="inp registration" required placeholder="Your Surname" title="Only alphabet allowed" style="width:150px;"/>
      <span class="icon-validation fa" data-icon="&#xf046"></span> <br />
            
      <label for="email">Email</label><br />
      <input type="text" name="email" class="inp registration"  placeholder="Your Email address" required title="Enter valid email" />
      <span class="icon-validation fa" data-icon="&#xf046"></span> <br />

      <label for="password">Choose Password</label><br />
      <input id="chk_pass" type="password" name="password" class="inp registration" required title="Letters,Numbers and @ is allowed. Length Minimum 6 - Maximum 12" onchange="check_password();" />
      <span class="icon-validation fa" data-icon="&#xf046"></span> <br />
      
      <label for="repassword">Re-enter Password</label><br />
      <input id="rechk_pass" type="password" name="repassword" class="inp registration" required title="Must match the choosen password" readonly onfocus="$(this).removeAttr('readonly');" />
      <span class="icon-validation fa" data-icon="&#xf046"></span>
            <script>
                  function check_password() {
                        var pass = document.getElementById("chk_pass").value;                  
                        document.getElementById("rechk_pass").pattern="^" + pass + "$";
                  }
            </script>
       
      <p id="pass_status" style="margin:1px 0px 12px 0px; text-align:right; padding-right:100px">Passwords Match</p>


      
      <input type="submit" name="student_register_submit" class="btn" value="Submit" style="padding:3px; background-color:#31708f;  border:2px solid #31708f; font-size:18px; width:150px"> &nbsp;&nbsp;&nbsp;&nbsp;
      
      <input type="reset" class="btn" value="Reset" style="padding:3px; background-color:#31708f; border:2px solid #31708f; font-size:18px; width:150px">
      </div>
</form>

<script>
      $(document).ready(function(){
            $("#register").click(function(){
                  $("#register_form input[name=acpcid]").attr("pattern", "[0-9]{6,8}");
                  $("#register_form input[name=pin]").attr("pattern", "[A-Za-z0-9]{14}");
                  $("#register_form input[name=firstname]").attr("pattern", "[A-Za-z]{1,40}");
                  $("#register_form input[name=surname]").attr("pattern", "[A-Za-z]{1,40}");
                  $("#register_form input[name=email]").attr("pattern","[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{1,}[.]{1}[a-zA-Z]{2,}");
                  $("#register_form input[name=password]").attr("pattern", "[A-Za-z0-9@]{6,16}");
                  $("#register_form input[name=repassword]").attr("pattern", "[A-Za-z0-9@]{6,16}");
    });
});
</script>

