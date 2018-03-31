<div id="login-yes" style="display:block;" align="center">
    <br />
    <h3 style="margin-bottom:5px">Log In</h3>
    <i id="back" class="fa fa-arrow-left" style="float:right; margin-top:-45px; margin-right:20px; color:#ffffff; cursor:pointer; font-size:20px"
        onclick="login_close()"
        onmouseover="document.getElementById('back').style.color='#2daedd'"
        onmouseout="document.getElementById('back').style.color='#ffffff'">
    </i>
    <form action="database/student_login.php" method="post" >
        <table cellspacing="10px">
            <tr>
                <td><input type=text class="inp" id="login_acpcid" name="login_acpcid" style="margin-top:10px; padding:5px; width:220px;" placeholder="ACPC Id"  required /><br />
                    <input type=password name="login_pass" class="inp" style="margin-top:10px; padding:5px; width:220px;" placeholder="Password" required/>
                </td>
                <td rowspan=2><input type=submit name="student_login_submit" class="btn fa fa-sign-in" value="&#xf090"  style="padding:20px; font-size:36px" /></td>
            </tr>
            <tr>
        </table>
    </form>

    <script> </script>

    <a class="link">Forgot password?</a>
    <br /><br /><br />
</div>