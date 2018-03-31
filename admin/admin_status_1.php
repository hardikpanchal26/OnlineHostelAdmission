
<?php 
   
   $logged_admin = $_SESSION['logged_admin'];
    include 'database/connect.php';
   
   $sql = mysqli_query($connection,"select * from admin where adminid = '$logged_admin' ");
   $admin_data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
 mysqli_close($connection); 
?>
<br />
<div class="box" style="margin:40px">
    <div style="padding:1px 20px 1px 20px; margin:-20px; background-color:#e3f2fd">
                    <h3><i class="fa fa-file-text-o" style="font-weight:bold">&nbsp;</i>Setup New Hostel Details</h3>
    </div>
    <br />

    <div style="padding:20px; font-family:'Saira'; font-weight:bold">
        <form id="admin_hostel" action="database/admin_hostel.php" method="POST" style="color:#333333" >
            <h3 style="display:inline; text-align:center; color:red">Fill up details to setup Admin Panel</h3> 
            
                    <p style="color:#31708f;">Fill up Hostel Detalis</p>
                    <div style="margin-top:-10px;">
                        
                                <label for="college_name">Enter College</label><br />
                                <input type="text" id="location" name="college_name" autofocus /><br /><br /><br />
                               <script>
                                    	function meritChange()
                                    	{  
                                    		x= document.getElementById('dist').value;

                                    		document.getElementById('merit').value=100-x;

                                    	}
                                </script>
                                <label>Percent of Distance</label>
                                	
                                	<select id="dist" name="factor"  style="width:100px" onchange="meritChange()" >
                                        	<?php
                                        	  for($i=0; $i<=100; $i++)
                                        	  	if($i==65)
                                        	    
                                        		echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                        		else
                                        	  	echo '<option value="'.$i.'">'.$i.'</option>';
                                        	?>
                                    </select>

                                    
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label>Percent of Merit</label>
                                <input type="text" id="merit" readonly value="35" style="width:60px" />
                                <br /><br /><br />

                                <script src="/wp-includes/js/addInput.js" language="Javascript" type="text/javascript"></script>
                                    <div id="dynamicInput">
                                        Hostel 1<br><input type="text" name="myInputs[]"><br /><br />
                                        <label>Boys Rooms</label>
                                        <input type='text' name='boysrooms[]' style="width:60px" />&nbsp;&nbsp;&nbsp;
                                        <label>Boys Per Rooms</label>
                                        <input type='text' name='boysperroom[]' style="width:60px" />&nbsp;&nbsp;&nbsp;
                                        <label>Girls Rooms</label>
                                        <input type='text' name='girlsrooms[]' style="width:60px" />&nbsp;&nbsp;&nbsp;
                                        <label>Girls Per Room</label>
                                        <input type='text' name='girlsperroom[]' style="width:60px" /><br />
                                        
                                    

                                    </div>
                                    <br /><br />
                                    <input type="button" value="Add another Hostel" class="btn" onClick="addInput('dynamicInput');">
                                
                                <script>
                                    var counter = 1;
                                    var limit = 5;


                                    function addInput(divName){

                                    if (counter == limit)  {alert("You have reached the limit of adding " + counter + " inputs");
                                    }

                                    else {
                                        var newdiv = document.createElement('div');
                                        newdiv.innerHTML = "<br /><br />Hostel " + (counter + 1) + " <br><input type='text' name='myInputs[]'><br><br>" +
                                         "<label>Boys Rooms</label>" +
                                        "<input type='text' name='boysrooms[]' style='width:60px' />&nbsp;&nbsp;&nbsp;"+
                                        "<label>Boys Per Rooms</label>"+
                                        "<input type='text' name='boysperroom[]' style='width:60px' />&nbsp;&nbsp;&nbsp;"+
                                        "<label>Girls Rooms</label>"+
                                        "<input type='text' name='girlsrooms[]' style='width:60px' />&nbsp;&nbsp;&nbsp;"+
                                        "<label>Girls Per Room</label>"+
                                        "<input type='text' name='girlsperroom[]' style='width:60px' />"
                                    
                                        ;
                                        document.getElementById(divName).appendChild(newdiv);
                                        counter++;
                                    }

                                    }
                                </script>
                                
                                <br /><br />               
                                <script src="user/state_city.js"></script>
                        <table width="80%">
                            <tr>
                                <td width="30%">
                                <label for="state">State</label><br />
                                <select  name="state" id="state" style="width:80%" onchange="setCities();">
                                </select>
                                </td>

                                <td width="30%">
                                <label for="city">City</label><br />
                                <select name="city"  id="city" style="width:80%" >
                                </select>
                                </td>

                                <td width="30%">
                               <label for="country">Country</label><br />
                                <select  name="country" style="width:80%" id="country" onchange="setStates();">
                                    <option value="India">India</option>
                                </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br />
                    <table align="center" width="60%"><tr>
                        <td align="center" >
                        <p style="color:#31708f; ">Reset Admin Id and Password</p>
                        <div style=" margin-top:-10px; background-color:#e3f2fd; width:60%; padding:20px; border: 1px solid #31708f">
                        
                                <label for="new_adminid">New Admin Id</label><br />
                                <input type="text" id="new_admin" name="new_adminid" autofocus pattern="[A-Za-z]{1-40}" title="Only Albhabet. Max Length 40."
                                style="width:80%" /><br /><br />
                                
                                <label for="new_adminpass">New Admin Password</label><br />
                                <input type="text" name="new_adminpass" autofocus pattern="[A-Za-z@]{1-40}" title="Letters Digits and @ allowed. Max Length 40."
                                style="width:80%" /><br /><br />
                        </div>
                        </td>

                        </tr>
                    </table>
                    <p align="center" id="stat" style="color:#ff0000"> </p>  

                    <br /><br />

                    <div align="center">
                        <input type="submit" class="btn" value="Done" style="padding:5px; width:50%; font-size:20px" onclick = "javascript:return check();" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                    </div>
        </form>
    </div>
</div>

<script>
    function check()
    {  

       if(document.getElementById('new_admin').value=="admin")
        {document.getElementById('stat').innerHTML='New admin id cannot be "admin"';
            return false;
        }

    }
</script>