<?php 
    include 'database/connect.php';
    $query = mysqli_query($connection,"select DISTINCT `collegename` from `college_hostels` order by `collegename` asc"); 
?>

<div>
          
            <form id="formofdetails" method="post" action="admin.php">
            <input type="hidden" id="form_details" name="form_details" value="none" />
            </form>
            

            <?php 
               
                while($val =  mysqli_fetch_array($query,MYSQLI_ASSOC)){
                    $college = $val['collegename'];
                    echo '<table border=1 width="80%" style="background-color:white">
                          <tr style="background-color:#efefef">
                          <td colspan="2" style="padding:5px"><b>College Name </b> : '.$val['collegename'].'</td>
                          </tr>';

                          include 'database/connect.php';
                          $query2 = mysqli_query($connection,"select DISTINCT `hostelname` from `college_hostels` WHERE `collegename`= '$college' order by `hostelname` asc"); 
                          
                          $adminquery = mysqli_query($connection,"select * from `admin` WHERE `collegename`= '$college'"); 
                          $adminvals = mysqli_fetch_array($adminquery,MYSQLI_ASSOC);
                          $_SESSION['logged_admin']=$adminvals['adminid'];
                          echo '<tr class="tab_data" style="color:#000000">
                                <td width="70%" align="center">';
                          
                          while($val2 =  mysqli_fetch_array($query2,MYSQLI_ASSOC)){
                              echo '
                                <p style="font-family:\'Saira\'; margin:0; padding:0; font-size:18px; color:blue">' .$val2['hostelname'].'</p>
                                '
                              ;
                          }

                    echo '</td>
                      <td align="center">
                      <input type="button" class="btn" id="formofDetails" value=" -> College Admin" onclick="localadmin(id)" />
                      </td>
                    </tr></table><br /><br />';
                  }
            ?>
</div>

<script>
  function localadmin(id)
  { 
    document.getElementById('form_details').value= id;
    document.getElementById('formofdetails').submit();
  }
</script>
