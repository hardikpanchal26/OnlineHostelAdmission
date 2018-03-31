        <div style=" position: absolute; top:15%;  right:1%;">

            <p class="admin" id="adm" style="width:70px" onclick="toggle()" >Admin <i class="fa fa-lock" style="font-size:18px"></i></p>
            
            <script>  //For Admin Dropdown
                function toggle() {
                document.getElementById("open_admin").classList.toggle("show");
                document.getElementById("close_admin").classList.toggle("show");
                }
            </script>
        </div>

        
        <div class="box admin_content" id="open_admin">
            <i id="close-admin" class="fa fa-close" style="cursor:pointer; float:right; font-size:20px; margin:-8px -8px 0 0; color:#31708f;" onclick="toggle()"    onmouseover="document.getElementById('close-admin').style.color='#2daedd'"
            onmouseout="document.getElementById('close-admin').style.color='#31708f'"
            ></i>
            <p style="margin:0; font-size: 18px; font-family:'Saira'; font-weight: bold; color:#31708f; text-align:center" >College Administration</p>
            
            <form action="database/admin_login.php" method="POST">
                <table cellspacing="10px">
                    <tr>
                        <td><input name="adminid" type="text" class="inp" style=" padding:5px" placeholder="Admin ID" required/><br />
                            <input name="adminpass" type=password class="inp" style="margin-top:10px; padding:5px" placeholder="Password" required/>
                         </td>
                        <td rowspan=2><input type="submit" name="admin_login_submit" class="btn fa fa-sign-in" value="&#xf090"  style="padding:18px; font-size:38px" /></td>
                    </tr>
                </table>
            </form>
        </div>
