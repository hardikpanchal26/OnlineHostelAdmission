<?php 
  include 'database/connect.php';
  $query = mysqli_query($connection,"select * from determining_factors order by `merit` asc"); 
?>
  
    <div style="display:inline-block">
      <br />
      <label style="font-weight:bold; font-size:20px">FILTERS : </label>
      <input type=button class="btn" id="a1" style="width:60px; padding:1px" value= "All" onclick="filter(id)"/>&nbsp;&nbsp;&nbsp;
      <input type=button class="btn" id="a2" style="width:60px; padding:1px" value= "Males" onclick="filter(id)"/>&nbsp;&nbsp;&nbsp;
      <input type=button class="btn" id="a3" style="width:60px; padding:1px" value= "Femals" onclick="filter(id)"/>&nbsp;&nbsp;&nbsp;
      <input type=button class="btn" id="a4" style="width:60px; padding:1px" value= "Distance" onclick="filter(id)"/>&nbsp;&nbsp;&nbsp;
      <input type=button class="btn" id="a5" style="width:60px; padding:1px" value= "Merit" onclick="filter(id)"/>&nbsp;&nbsp;&nbsp;
      <input type=button class="btn" id="a6" style="width:60px; padding:1px" value= "Category" onclick="filter(id)"/>&nbsp;&nbsp;&nbsp;
      <input type=button class="btn" id="a7" style="width:60px; padding:1px" value= "College" onclick="filter(id)"/>&nbsp;&nbsp;&nbsp;  
      <br /><br />
    </div>
    <form action="adminsuper/filter.php" id="filterform" method="post">
      <input type=hidden value="a1" id="filter" name=filter />
    </form>
    <script>
        function filter(id)
        {
          document.getElementById('filter').value=id;
          document.getElementById('filterform').submit();
        }
    </script>

<div>
            <form id="formofdetails" method="post" action="adminsuper/view_form.php">
            <input type="hidden" id="form_details" name="form_details" value="none" />
            </form>
            <table border=1 width="100%" style="background-color:white">
                <tr style="background-color:#efefef">
                    <td align="center" width="7%"><b>Form No.</b></td>
                    <td align="center" width="7%"><b>ACPC ID</b></td>
                    <td align="center" width="26%"><b>Name</b></td>
                    <td align="center" width="12%"><b>Mobile</b></td>
                    <td align="center" width="6%"><b>Distance</b></td>
                    <td align="center" width="6%"><b>Merit</b></td>
                    <td align="center" width="6%"><b>Gender</b></td>
                    <td align="center" width="6%"><b>Category</b></td>
                    <td align="center" width="12%"><b>Status</b></td>
                    <td align="center" width="12%"><b>View/Edit/Verify</b></td>
                </tr>
           

            <?php 
               
                while($val =  mysqli_fetch_array($query,MYSQLI_ASSOC)){
                    if ($val['allot']==-1) $status='style="color:#e77817"><b>Not Verified</b>';
                    else if ($val['allot']==-2) $status='style="color:#ff0000"><b>Rejected <i class="fa fa-close"></i></b>';
                    else if ($val['allot']==1) $status='style="color:#e77817"><b>Seat Alloted </b>';
                    else if ($val['allot']==2) $status='style="color:#86b300"><b>Seat Confirmed <i class="fa fa-check"></i></b>';                        
                    else $status='style="color:#86b300"><b>Verified <i class="fa fa-check"></i></b>';
                    
                    echo '<tr class="tab_data" style="color:#000000">
                      <td align="center" width="7%">' .$val['formid'].'</td>
                      <td align="center" width="7%">' .$val['acpcid'].'</td>
                      <td align="center" width="26%">' .strtoupper($val['name']).'</td>
                      <td align="center" width="12%">' .$val['contact'].'</td>
                      <td align="center" width="6%">' .$val['distance'].'</td>
                      <td align="center" width="6%">' .$val['merit'].'</td>
                      <td align="center" width="6%">' .$val['gender'].'</td>
                      <td align="center" width="6%">' .$val['category'].'</td>
                      <td align="center" width="12%" ' .$status.'</td>
                      <td align="center" width="12%"><a href="#" id="'.$val['formid'].'" onclick="view(id)">View Form</a></td>
                    </tr>
                    <tr ><td colspan="10"><b>College Name : </b> ' .$val['college']. '</td>
                    </tr>

                    '
                    ;
                    }
                    echo '</table>';
            ?>
</div>

<script>
  function view(id)
  { 
    document.getElementById('form_details').value= id;
    document.getElementById('formofdetails').submit();
  }
</script>