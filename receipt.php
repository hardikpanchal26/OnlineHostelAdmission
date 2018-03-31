 
<?php

session_start();
$formid = $_SESSION['formid'];
include 'database/connect.php';
$sql = mysqli_query($connection,"select * from determining_factors where formid = '$formid' ");
$data1 = mysqli_fetch_array($sql,MYSQLI_ASSOC);
$college=$data1['college'];        
$sql = mysqli_query($connection,"select * from `college_hostels` WHERE `collegename`='$college'");
$data2 = mysqli_fetch_array($sql,MYSQLI_ASSOC);       
mysqli_close($connection);   

?>


<?php

require('fpdf/fpdf.php');

$fpdf = new FPDF('P','mm',array(150,150));
  $fpdf-> SetTopMargin(13);
  $fpdf -> AddPage();
  $fpdf->SetFont('Arial','B',16); 
 $fpdf->SetTextColor(255, 0, 0);
  $fpdf -> Cell(130,21,"RECIEPT",1,1,'C');
 $fpdf->SetTextColor(0, 0, 0);
$fpdf->SetFont('Arial','B',12); 
  $fpdf -> Cell(30,15,'Form No : ',1,0,'L');
  $fpdf->SetFont('Arial','',12);
  $fpdf -> Cell(50,15,$data1['formid'],1,0,'L');
  $fpdf->SetFont('Arial','B',12); 
  $fpdf -> Cell(20,15,"Date :",1,0,'L');
   $fpdf->SetFont('Arial','',12);
   $fpdf -> Cell(30,15,"dd/mm/yyyy",1,1,'L');
  $fpdf->SetFont('Arial','B',12); 
  $fpdf -> Cell(30,15,"Name :",1,0,'L');
   $fpdf->SetFont('Arial','',12);
$fpdf -> Cell(50,15,$data1['name'],1,0,'L');
  $fpdf->SetFont('Arial','B',10);
  $fpdf -> Cell(20,15,"Room no: ",1,0,'L');
  $fpdf->SetFont('Arial','',12);
  $fpdf -> Cell(30,15,$data1['room'],1,1,'L'); 
  $fpdf->SetFont('Arial','B',11); 
  $fpdf -> Cell(30,15,"College Name :",1,0,'L');
  $fpdf->SetFont('Arial','',12);
  $fpdf -> Cell(100,15,$data1['college'].','.$data2['location'],1,1,'C');
  $fpdf->SetFont('Arial','B',12);
  $fpdf -> Cell(90,15,"Details",1,0,'C');
  $fpdf->SetFont('Arial','B',12);
  $fpdf -> Cell(40,15,"Amount",1,1,'C');
  $fpdf->SetFont('Arial','',12);
  $fpdf -> Cell(90,20,"Hotel Fees Payment",1,0,'C');
  $fpdf -> Cell(40,20,"Rs 20,000/-",1,1,'C');
  $fpdf->SetFont('Arial','B',12);
  $fpdf -> Cell(90,15,"Rupees : Rs 20,000 only",1,0,'C');
 $fpdf->SetTextColor(0, 0, 255);

$fpdf -> Cell(40,15,"Authorized",1,1,'C');
  $fpdf->Output();

?>



<!DOCTYPE html>
<html>
 <body align="center" style="font-family:Arial; background-color:#aaa" >
 	<br /><br /><br />

 	<div align="center" >
 	<table border=2 width="60%" cellpadding="10" cellspacing="0" style="background-color:white; box-shadow: 0px 0px 10px 0px #fff">
 		<tr>
 			<td colspan="2" align="center" style="color:red"><h3>RECEIPT</h3></td>
 		</tr>
 		<tr>
 			<td><b>Form Number : </b><?php echo $data1['formid'];?></td>
 			<td><b>Date : </b><?php echo date("d/m/Y"); ?></td>
 		</tr>
 		<tr>
 			<td><b>Name : </b><?php echo $data1['name'];?></td>
 			<td><b>Room No : </b><?php echo $data1['room']; ?></td>
 		</tr>
 		<tr>
 			<td colspan="2"><b>College : </b><?php echo $data1['college'].','.$data2['location'];?></td>
 		</tr>
 		<tr>
 			<td width="70%" align="center"><b>Details</b></td>
 			<td align="center"><b>Rs</b></td>
 		</tr>
 		<tr>
 			<td align="center"><br />
 			Hostel Fees Payment
               <br /><br />
 		    </td>
 			<td ALIGN="center">20,000 /-</td>
 		</tr>
 		<tr>
 			<td valign="top"><b>Rupees : </b> Twenty Thousand only</td>
 			<td align="center" style="color:blue"><b>AUTHORIZED</b></td>
 		</tr>		
 	</table>
 	</div>
 	<br /><br />
 	<input type="button" class="btn" value="Print Receipt" style="padding:2px; display:inline-block; width:20%; cursor:pointer; font-size:20px; margin-right:2%"  onclick="window.print();"/>
    
 </body>
</html>

