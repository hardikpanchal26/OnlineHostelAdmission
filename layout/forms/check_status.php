<div class="box"  style="background-color:#3f3f3f; margin-bottom:20px">
    <h3 style="color:white"><i class="fa fa-check-square-o" style="font-weight:bold"></i> &nbsp; Check Application Status</h3>
        <form method="post" action="database/give_status.php">
            <table cellspacing="10px" cellpadding="5px">
                <tr>
                    <td>
                        <input type="text" name="form_id" id="app-status" class="inp" style="padding:10px; width:95%" placeholder="Form Number" />
                    </td>
                    <td>
                        <input type="submit" name="check" class="btn fa fa-arrow-circle-right" value="&#xf0a9" style="padding:10px; font-size:21px;">
                    </td>
                </tr>
            </table>
            <?php 
                if(isset($_SESSION['form_status']))
                {   $fstatus = $_SESSION['form_status'];

                    if($fstatus==-2)
                        echo '<p style="color:#ff3333; margin:0px; font-weight:bold; display:block; text-align:center";>Application Rejected</p>';
                    else if($fstatus==-1)
                        echo '<p style="color:#cc6600; margin:0px; font-weight:bold; display:block; text-align:center";>Application Not Verified</p>';    
                    else if($fstatus==0)
                        echo '<p style="color:#0066cc; margin:0px; font-weight:bold; display:block; text-align:center";>Waiting for results</p>';
                    else if($fstatus==1)
                        echo '<p style="color:#33cc33; margin:0px; font-weight:bold; display:block; text-align:center";>Seat Alloted</p>';
                    else if($fstatus==2)
                        echo '<p style="color:#33cc33; margin:0px; font-weight:bold; display:block; text-align:center";>Seat Confirmed</p>';
                    else if($fstatus==-3)
                        echo '<p style="color:#ff3333; margin:0px; font-weight:bold; display:block; text-align:center";>Incorrect From Number</p>';
                    unset($_SESSION['form_status']);
                }   
                else 
                { 
                    echo '<p style="color:#3f3f3f; margin:0px; font-weight:bold; display:block; text-align:center";>.</p>';
                }
            ?>
        </form>
</div>

