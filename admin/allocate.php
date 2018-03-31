
    <table width="100%" style="font-family:Saira">    
        <tr>
            <td width="50%">
                    <div style="background-color:#8f5ff5; text-align:center; color:white; box-shadow: 0px 0px 3px 0px #333; cursor:pointer" onclick="location.href='admin/allocate_seat_boys.male.general.php';" >
                        <h2 style="font-weight:bold">Click to Allocate Seats to Boys</h2>
                    </div>
                    <div style="height:380px; overflow-y:scroll">
                        <?php 
                            include 'database/connect.php';
                            $l_admin = $_SESSION['logged_admin']; 
                            $query = mysqli_query($connection,"select * from  admin WHERE adminid='$l_admin'"); 

                            $college =  mysqli_fetch_array($query,MYSQLI_ASSOC);
                            $col = $college['collegename'];
    
                            $query = mysqli_query($connection,"select * from determining_factors where `gender` = 'male' and college='$col' order by `formid` asc"); 
                        ?>

                        <div>
                                    <table border=1 width="100%" style="background-color:white">
                                        <tr style="background-color:#efefef">
                                            <td align="center" width="15%"><b>Form No.</b></td>
                                            <td align="center" width="40%"><b>Name</b></td>
                                            <td align="center" width="30%"><b>Allocation Status</b></td>
                                            <td align="center" width="15%"><b>Room No</b></td>
                                            </tr>
                                   
                                    <?php 
                                       
                                        while($val =  mysqli_fetch_array($query,MYSQLI_ASSOC)){
                                            if ($val['allot']==1) $status='style="color:#e77817"><b>Seat Alloted </b>';
                                            else if ($val['allot']==2) $status='style="color:#86b300"><b>Seat Confirmed <i class="fa fa-check"></i></b>';
                                            else if ($val['allot']==0) $status='style="color:#0000bb"><b>Waiting <i class="fa fa-clock-o"></i></b>';
                                            else $status='style="color:#ff0000"><b>Rejected <i class="fa fa-close"></i></b>';
                                            
                                            echo '<tr class="tab_data" style="color:#000000">
                                              <td align="center" width="15%">' .$val['formid'].'</td>
                                              <td align="center" width="40%">' .strtoupper($val['name']).'</td>
                                              <td align="center" width="30%" ' .$status.'</td>
                                              <td align="center" width="15%">'.$val['room'].'</td>
                                              </tr>'
                                            ;
                                            }
                                            echo '</table>';
                                    ?>
                        </div>
                    </div>
            </td>

            <td>

                    <div style="background-color:#4cb050; text-align:center; color:white; box-shadow: 0px 0px 3px 0px #333; cursor:pointer" onclick="location.href='admin/allocate_seat_girls.female.general.php';">
                        <h2 style="font-weight:bold">Click to Allocate Seats to Girls</h2>
                    </div>
                    <div style="height:380px; overflow-y:scroll">
                        <?php 
                            include 'database/connect.php';
                            $query = mysqli_query($connection,"select * from determining_factors where `gender` = 'female' and college='$col' order by `formid` asc"); 
                        ?>

                        <div>
                                    <table border=1 width="100%" style="background-color:white">
                                        <tr style="background-color:#efefef">
                                        <td align="center" width="15%"><b>Form No.</b></td>
                                        <td align="center" width="40%"><b>Name</b></td>
                                        <td align="center" width="30%"><b>Allocation Status</b></td>
                                        <td align="center" width="15%"><b>Room No</b></td>
                                        </tr>
                                   
                                    <?php 
                                       
                                        while($val =  mysqli_fetch_array($query,MYSQLI_ASSOC)){
                                            if ($val['allot']==1) $status='style="color:#e77817"><b>Seat Alloted </b>';
                                            else if ($val['allot']==2) $status='style="color:#86b300"><b>Seat Confirmed <i class="fa fa-check"></i></b>';
                                            else if ($val['allot']==0) $status='style="color:#0000bb"><b>Waiting <i class="fa fa-clock-o"></i></b>';
                                            else $status='style="color:#ff0000"><b>Seat Not Alloted <i class="fa fa-close"></i></b>';
                                            
                                            echo '<tr class="tab_data" style="color:#000000">
                                              <td align="center" width="15%">' .$val['formid'].'</td>
                                              <td align="center" width="40%">' .strtoupper($val['name']).'</td>
                                              <td align="center" width="30%" ' .$status.'</td>
                                              <td align="center" width="15%">'.$val['room'].'</td>
                                              </tr>'
                                            ;
                                            }
                                            echo '</table>';
                                    ?>
                        </div>
                    </div>
            </td>
        </tr>
    </table>    
