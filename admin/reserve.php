<?php
		include 'database/connect.php';
        $l_admin = $_SESSION['logged_admin']; 
    
    	$query = mysqli_query($connection,"select * from  admin WHERE adminid='$l_admin'"); 
    	$data =  mysqli_fetch_array($query,MYSQLI_ASSOC);
    	$college=$data['collegename'];
        $sql = mysqli_query($connection,"SELECT SUM(`boysrooms` * `boysperroom`) as 'total_boys', SUM(`girlsrooms` * `girlsperroom`) as 'total_girls' FROM `college_hostels` WHERE `collegename` = '$college'");

        $data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
        


       
 ?>

<div>
	<table border=1 width="100%">
		<tr>
		
<!-- =====================Boys ===================================-->
			<?php 
				$result=mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='male' AND allot=1 AND `college` = '$college'");
		      	$allot_boys=mysqli_num_rows($result);
		        $sql = mysqli_query($connection,"SELECT * FROM `reservation` WHERE `id` = 1");
		        $percent=mysqli_fetch_array($sql,MYSQLI_ASSOC);
		        
		        $boys_gen_seats= (int) ($percent['general']/100 * $data['total_boys']);
		        $boys_sebc_seats= (int) ($percent['sebc']/100 * $data['total_boys']);
		        $boys_scst_seats= (int) ($percent['scst']/100 * $data['total_boys']);
		        $boys_others_seats= (int) $data['total_boys'] - $boys_gen_seats - $boys_sebc_seats - $boys_scst_seats;

		        $sql = mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='male' AND allot=1 AND `college` = '$college' AND `category`='general'");
		   		$boys_gen_allot=mysqli_num_rows($sql);
		   		$sql = mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='male' AND allot=1 AND `college` = '$college' AND `category`='sebc'");
		        $boys_sebc_allot=mysqli_num_rows($sql);
		        $sql = mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='male' AND allot=1 AND `college` = '$college' AND (`category`='sc' OR `category`='st')");
		        $boys_scst_allot=mysqli_num_rows($sql);
		        $sql = mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='male' AND allot=1 AND `college` = '$college' AND `category`='other'");
		        $boys_others_allot=mysqli_num_rows($sql);
	
			?>
			<td width="50%" align="center">
				<div style="background-color:#adf442; border:1px solid black; margin:20px" >
					<h2 style="color:red" >Boys Data</h2>
					<h3>Total Seats / Alloted Seats</h3>
					<h1><?php echo $data['total_boys'].'/'.$allot_boys; ?></h1>
				</div>
				<div style="background-color:#8f5ff5; color:black; border:1px solid black; margin:20px" >
					<table width="100%">
						<tr align="Center">
							<td width=25%><h3>General</h3><h4 style="color:red">Total / Alloted</h4><h4><?php echo $boys_gen_seats.'/'.$boys_gen_allot; ?></h4></td>
							<td width=25%><h3>SEBC</h3><h4 style="color:red">Total / Alloted</h4><h4><?php echo $boys_sebc_seats.'/'.$boys_sebc_allot; ?></h4></td>
							<td width=25%><h3>SC/ST</h3><h4 style="color:red">Total / Alloted</h4><h4><?php echo $boys_scst_seats.'/'.$boys_scst_allot; ?></h4></td>
							<td width=25%><h3>OTHERS</h3><h4 style="color:red">Total / Alloted</h4><h4><?php echo $boys_others_seats.'/'.$boys_others_allot; ?></h4></td>
						</tr>
					</table>
				</div>
			</td>


<!-- =====================Girls ===================================-->
			<?php 
				$result=mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='female' AND allot=1 AND `college` = '$college'");
		      	$allot_girls=mysqli_num_rows($result);
		        $sql = mysqli_query($connection,"SELECT * FROM `reservation` WHERE `id` = 1");
		        $percent=mysqli_fetch_array($sql,MYSQLI_ASSOC);
		        
		        $girls_gen_seats= (int) ($percent['general']/100 * $data['total_girls']);
		        $girls_sebc_seats= (int) ($percent['sebc']/100 * $data['total_girls']);
		        $girls_scst_seats= (int) ($percent['scst']/100 * $data['total_girls']);
		        $girls_others_seats= (int) $data['total_girls'] - $girls_gen_seats - $girls_sebc_seats - $girls_scst_seats;

		        $sql = mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='female' AND allot=1 AND `college` = '$college' AND `category`='general'");
		   		$girls_gen_allot=mysqli_num_rows($sql);
		   		$sql = mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='female' AND allot=1 AND `college` = '$college' AND `category`='sebc'");
		        $girls_sebc_allot=mysqli_num_rows($sql);
		        $sql = mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='female' AND allot=1 AND `college` = '$college' AND (`category`='sc' OR `category`='st')");
		        $girls_scst_allot=mysqli_num_rows($sql);
		        $sql = mysqli_query($connection,"SELECT * FROM `determining_factors` WHERE gender='female' AND allot=1 AND `college` = '$college' AND `category`='other'");
		        $girls_others_allot=mysqli_num_rows($sql);
	
			?>
			<td width="50%" align="center">
				<div style="background-color:#adf442; border:1px solid black; margin:20px" >
					<h2 style="color:red" >Girls Data</h2>
					<h3>Total Seats / Alloted Seats</h3>
					<h1><?php echo $data['total_girls'].'/'.$allot_girls; ?></h1>
				</div>
				<div style="background-color:#8f55f5; color:black; border:1px solid black; margin:20px" >
					<table width="100%">
						<tr align="Center">
							<td width=25%><h3>General</h3><h4 style="color:red">Total / Alloted</h4><h4><?php echo $girls_gen_seats.'/'.$girls_gen_allot; ?></h4></td>
							<td width=25%><h3>SEBC</h3><h4 style="color:red">Total / Alloted</h4><h4><?php echo $girls_sebc_seats.'/'.$girls_sebc_allot; ?></h4></td>
							<td width=25%><h3>SC/ST</h3><h4 style="color:red">Total / Alloted</h4><h4><?php echo $girls_scst_seats.'/'.$girls_scst_allot; ?></h4></td>
							<td width=25%><h3>OTHERS</h3><h4 style="color:red">Total / Alloted</h4><h4><?php echo $girls_others_seats.'/'.$girls_others_allot; ?></h4></td>
						</tr>
					</table>
				</div>
			</td>

		</tr>
	</table>
</div>
