
<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="../css/css1.css" />
</head>

<body style="background-color:white">
    <br />
    <form action="edit_reject_verify.php" method="post">
    <input type="button" class="btn" value="Back" style="padding:2px; display:inline-block; background-color:#3f3f3f; width:10%; font-size:20px; float:right; margin-right:2%"  onclick="location.href = 'back_action.php'"/> 
    <input type="button" class="btn" value="Print" style="padding:2px; display:inline-block; width:10%; font-size:20px; float:right; margin-right:2%"  onclick="window.print();"/>
    <input type="submit" name="reject" class="btn" value="Reject" style="padding:2px; display:inline-block; width:10%; font-size:20px; float:right; margin-right:2%"/>
    <input type="submit" name="verify" class="btn" value="Verify" style="padding:2px; display:inline-block; width:10%; font-size:20px; float:right; margin-right:2%"  />
    <input type="submit" name="edit" class="btn" value="Edit" style="padding:2px; display:inline-block; width:10%; font-size:20px; float:right; margin-right:2%"  />
    
    <input type="hidden" name="formid" value="<?php echo $_POST['form_details']?>"/>
    
    </form>
   <?php 
   $formid = $_POST['form_details'];
    include '../database/connect.php';
   
   $sql = mysqli_query($connection,"select * from hostel_application where formid = '$formid' ");
   $data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
   mysqli_close($connection);
?>


<div  style=" margin-bottom:20px; font-family:'Arial'; color:black;">
    <div style="padding:20px;">
            <p style="display:inline;"><b>ACPC Id :</b> <span><?php echo $data['acpcid']; ?></span> </p> 
            <p style="display:inline; padding-left:10%"><b>Form Number :</b> <span><?php echo $data['formid']; ?></span> </p>
            
                    <p>Student Details </p>
                    <div class="filled_form" style="padding-left:20px; margin-top:-10px; border: 1px solid black;" >
                        <table width="100%" cellspacing="10">
                            <tr>
                                <td width="50%">
                                <label for="name">Name</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['name']; ?></p><br />
                                
                                <label for="email">Email Address </label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['email']; ?></p><br />
                                
                                <label for="contact">Contact number </label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['contact']; ?></p><br />
                                
                                <label for="dob">Date of Birth</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['dob']; ?></p><br /><br />
                                
                                <label for="aadhar">Aadhar Number</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['aadhar']; ?></p><br />
                                
                                <label for="merit">Merit Rank</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['merit']; ?></p><br />

                                 <label for="gender">Gender</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['gender']; ?></p><br />
                                
                                <label for="category">Category</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['category']; ?></p><br />
                                </td>

                                <td >
                                <br />
                                <div style="padding:0px;">
                                    <img id="photo" src="<?php echo $data['photo']; ?>" style="margin:16px; margin-left:110px; height:180px; width:132px; border: 1px solid #31708f;  box-shadow: 0px 0px 5px 0px #bbb;" /><br />
                                </div>                               
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label style="width:40%" for="address">Your Address</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['address']; ?></p><br />
                                    <label style="width:40%" for="distance"></label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['distance']; ?></p><br />
                                    <label style="width:40%" for="address">Pincode </label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['pincode']; ?></p><br />
                                </td>
                            </tr>
                        </table>
                    </div>
        
                    <br />
                    <table width="100%">
                        <tr>
                            <td style="padding-right:20px" width="50%">
                                <p>Parents Details </p>
                            </td>

                            <td style="padding-left:20px;" width="50%" >
                                <p>Guardian Details </p>
                            </td>
                            
                           
                        </tr>
                        
                        <tr>
                            
                             <td style="border: 1px solid black">
                                <div class="filled_form" style="padding:20px; margin-top:-10px;" >
                                <label for="parentname">Name</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['parentname']; ?></p><br />
                                
                                <label for="relation">Relation</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['relation']; ?></p><br />
                                
                                <label for="parentocc">Occupation</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['occupation']; ?></p><br />
                                
                                <label for="parentincome">Income </label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['income']; ?></p><br />
                                
                                <label for="tel">Telephone</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['hometelephone']; ?></p><br />
                                
                                <label for="pamob">Mobile No</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['parentmobile']; ?></p><br />
                                </div>
                            </td>  
                            <td style="border: 1px solid black">
                                <div class="filled_form" style="padding:20px; margin-top:-10px;  " >
                                <label for="localguname">Name</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['localguname']; ?></p><br />
                                
                                <label for="localmobile">Mobile No</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['localmobile']; ?></p><br />
                                
                                    
                                <label for="localaddress">Address</label><p style="color:#202020; margin:0px; display:inline-block"><?php echo $data['localaddress']; ?></p>
                                </div>                                
                                
                            </td>
                        </tr>
                    </table>               
    </div>
</div>
</body>
</html>