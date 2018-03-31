

<?php 
   
   $logged_admin = $_SESSION['logged_admin'];
    include 'database/connect.php';
   
   $sql = mysqli_query($connection,"select * from admin where adminid = '$logged_admin' ");
   $admin_data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
 mysqli_close($connection); 
?>

<!--
<div class="box">
    <div style="padding:1px 20px 1px 20px; margin:-20px; background-color:#e3f2fd">
                    <h3><i class="fa fa-file-text-o" style="font-weight:bold">&nbsp;</i>Setup New Hostel Details</h3>
    </div>
    <br />

    <div style="padding:20px; font-family:'Saira'; font-weight:bold">
        <form id="admin_hostel" action="database/admin_hostel.php" method="POST" style="color:#333333" >
            <h3 style="display:inline; text-align:center; color:red">Fill up details to setup Admin Panel</h3> 
            
                    <p style="color:#31708f;">Fill up Hostel Detalis</p>
                    <div style="margin-top:-10px;">
                        
                                <label for="college_name">College Name</label><br />
                                <input type="text" id="location" name="college_name" autofocus /><br /><br />

                                    <script src="user/state_city.js"></script>
                        <table width="80%">
                            <tr>
                                <td width="30%">
                                <label for="state">State</label><br />
                                <select  name="state" id="state" style="width:50%" onchange="setCities();">
                                </select>
                                </td>

                                <td width="30%">
                                <label for="city">City</label><br />
                                <select name="city"  id="city" style="width:50%" >
                                </select>
                                </td>

                                <td width="30%">
                               <label for="country">Country</label><br />
                                <select  name="country" style="width:50%" id="country" onchange="setStates();">
                                    <option value="India">India</option>
                                </select>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <table width="100%"><tr>
                        <td width="30%">

                            <p style="color:#31708f;">Boys Hostel Details</p>
                            <div style=" margin-top:-10px; margin-right:10px;" >
                              

                                <label for="boys_rooms">Number of Rooms to be Allocated (For Boys)</label><br />
                                <input type="text" name="boys_rooms"  autofocus pattern="[0-9]{1-3}" title="Max 999 Rooms" style="width:20%"><br /><br />
                                
                                <label for="boys_per_room">Number of Students per Room (For Boys)</label><br />
                                <input type="text" name="boys_per_room"  autofocus pattern="[1-5]{1}" title="Max 5 Students" style="width:20%">
                            </div>
                        </td >
                    
                        <td width="30%">
                        <p style="color:#31708f;">Girls Hostel Detalis</p>
                        <div style=" margin-top:-10px; margin-left:10px;" >
                        
                                <label for="girls_rooms">Number of Rooms to be Allocated (For Girls)</label><br />
                                <input type="text" name="girls_rooms"  autofocus pattern="[0-9]{1-3}" title="Max 999 Rooms" style="width:20%"><br /><br />
                                
                                <label for="girls_per_room">Number of Students per Room (For Girls)</label><br />
                                <input type="text" name="girls_per_room"  autofocus pattern="[1-5]{1}" title="Max 5 Students" style="width:20%">
                        </div>
                        </td>


                        <td align="center">
                        <p style="color:#31708f; ">Reset Admin Id and Password</p>
                        <div style=" margin-top:-10px; background-color:#e3f2fd; width:60%; padding:20px; border: 1px solid #31708f">
                        
                                <label for="new_adminid">New Admin Id</label><br />
                                <input type="text" name="new_adminid" autofocus pattern="[A-Za-z]{1-40}" title="Only Albhabet. Max Length 40."
                                style="width:80%" /><br /><br />
                                
                                <label for="new_adminpass">New Admin Password</label><br />
                                <input type="text" name="new_adminpass" autofocus pattern="[A-Za-z@]{1-40}" title="Letters Digits and @ allowed. Max Length 40."
                                style="width:80%" /><br /><br />
                        </div>
                        </td>

                        </tr>
                    </table>

                    <br /><br />

                    <div align="center">
                        <input type="submit" class="btn" value="Done" style="padding:5px; width:50%; font-size:20px"  /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                    </div>
        </form>
    </div>
</div>
-->