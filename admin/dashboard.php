<?php 
    include 'database/connect.php';
    $l_admin = $_SESSION['logged_admin']; 
    $query = mysqli_query($connection,"select * from  admin WHERE adminid='$l_admin'"); 

    $college =  mysqli_fetch_array($query,MYSQLI_ASSOC);
    $college = $college['collegename'];
    $_SESSION['co']=$college;
    $sql = mysqli_query($connection,"SELECT SUM(`boysrooms` * `boysperroom`) as 'total_boys', SUM(`girlsrooms` * `girlsperroom`) as 'total_girls' FROM `college_hostels` WHERE `collegename` = '$college'");
                    $data = mysqli_fetch_array($sql,MYSQLI_ASSOC); 
?>

                <h1>Welcome, Admin of College : <span style="color:red; font-weight:bold"><?php echo $college ?></span> </h1>
                <br />
                
                <br />
                
                <div class="admin_tab" style="display:inline-block">    
                    <?php
                    include 'database/connect.php';
                	$college = $_SESSION['co'];
                    $sql = mysqli_query($connection,"SELECT SUM(`boysrooms` * `boysperroom`) as 'total_boys', SUM(`girlsrooms` * `girlsperroom`) as 'total_girls' FROM `college_hostels` WHERE `collegename` = '$college'");
                    $data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
                    mysqli_close($connection);
                    ?>
                   
                    <table width="100%" style="background-color:#8f5ff5; color:white; box-shadow: 0px 0px 3px 0px #333;" >
                        <tr>
                            <td align="center" colspan="2"><h2 style="margin:0; font-weight:bold">Total Seats</h2></td>
                            <td align="center"><h3 style="margin:0; font-weight:bold">Boys</h3><h3 style="margin:0; color:#000000"><?php echo $data['total_boys'];  ?> </h3></td>
                            <td align="center"><h3 style="margin:0; font-weight:bold">Girls</h3><h3 style="margin:0; color:#000000"><?php echo $data['total_girls'];  ?></h3></td>    
                        </tr>
                    </table>
               
                    <br />
                    <?php 
                        include 'database/connect.php';
                    	$result=mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='male' AND allot=2 AND `college` = '$college'");
      					$avaseats_b=mysqli_num_rows($result);
      					$result=mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='female' AND allot=2 AND `college` = '$college'");
      					$avaseats_g=mysqli_num_rows($result);
      					mysqli_close($connection);
                    ?>
                    <table width="100%" style="background-color:#4cb050; color:white; box-shadow: 0px 0px 3px 0px #333;">
                        <tr>
                            <td align="center" colspan="2"><h2 style="margin:0; font-weight:bold">Available Seats</h2></td>
                            <td align="center"><h3 style="margin:0; font-weight:bold">Boys</h3><h3 style="margin:0; color:#000000"><?php echo $data['total_boys']-$avaseats_b; ?></h3></td>
                            <td align="center"><h3 style="margin:0; font-weight:bold">Girls</h3><h3 style="margin:0; color:#000000"><?php echo $data['total_girls']-$avaseats_g; ?></h3></td>    
                        </tr>
                    </table>
                    <br />
                    <div style="background-color:#e3f2fd; padding:5px; box-shadow: 0px 0px 3px 0px #333;" align="left">
                         <button style="float:right">Edit</button>
                        <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-edit" style="font-weight:bold;"></i>  &nbsp; Instructions</h3>

                        <ul>
                            <li>Hostel allocation procedure will start on 31/12/2017.</li>
                            <li>Fresh Students who wish to take admissions in hostel must apply for new registration.</li>
                            <li>Registered users may Log In.</li>
                            <li>This portal is intended to be used by students who want to apply for hostels, others must refrain from using it.</li>
                            <li>Providing incorrect details may lead to legal action. Please provide correct details.</li>
                        </ul>
                    </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <?php 
                        include 'database/connect.php';
                        $result=mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='male' AND `college` = '$college'");
                        $applicants_b=mysqli_num_rows($result);
                        $result=mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='female' AND `college` = '$college'");
                        $applicants_g=mysqli_num_rows($result);
                        mysqli_close($connection);
                ?>
                <div class="admin_tab" style="display:inline-block">    
                    <table width="100%" style="background-color:#4cb050; color:white; box-shadow: 0px 0px 3px 0px #333;">
                        <tr>
                            <td align="center" colspan="2"><h2 style="margin:0; font-weight:bold">Total Applicants</h2></td>
                            <td align="center"><h3 style="margin:0; font-weight:bold">Boys</h3><h3 style="margin:0; color:#000000"><?php echo $applicants_b; ?></h3></td>
                            <td align="center"><h3 style="margin:0; font-weight:bold">Girls</h3><h3 style="margin:0; color:#000000"><?php echo $applicants_g; ?></h3></td>    
                        </tr>
                    </table>
                    <?php 
                        include 'database/connect.php';
                    	$result=mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='male' AND allot=2 AND `college` = '$college'");
      					$confseats_b=mysqli_num_rows($result);
      					$result=mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='female' AND allot=2 AND `college` = '$college'");
      					$confseats_g=mysqli_num_rows($result);
      					mysqli_close($connection);
                    ?>
                    <br />
                    <table width="100%" style="background-color:#8f5ff5; color:white; box-shadow: 0px 0px 3px 0px #333;" >
                        <tr>
                            <td align="center" colspan="2"><h2 style="margin:0; font-weight:bold">Confirmed Applicants</h2></td>
                            <td align="center"><h3 style="margin:0; font-weight:bold">Boys</h3><h3 style="margin:0; color:#000000"><?php echo $confseats_b;  ?> </h3></td>
                            <td align="center"><h3 style="margin:0; font-weight:bold">Girls</h3><h3 style="margin:0; color:#000000"><?php echo $confseats_g;  ?></h3></td>    
                        </tr>
                    </table>
                    <br />
                    <div style="background-color:#e3f2fd; padding:5px; box-shadow: 0px 0px 3px 0px #333;" align="left">
                         <button style="float:right">Edit</button>
                        <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bullhorn" style="font-weight:bold;"></i>  &nbsp; Announcements</h3>

                        <ul>
                            <li>Hostel allocation procedure will start on 31/12/2017.</li>
                            <br />
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <br />
                            <li>Fusce tempus massa in facilisis fringilla.</li>
                            <br /><br /><br />
                        </ul>
                    </div>
                </div>
                <br /><br />