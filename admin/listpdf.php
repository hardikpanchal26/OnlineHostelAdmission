

<?php
session_start();
require_once('../fpdf/fpdf.php');
include '../database/connect.php';
    $l_admin = $_SESSION['logged_admin']; 
    $query = mysqli_query($connection,"select * from  admin WHERE adminid='$l_admin'"); 
    $data =  mysqli_fetch_array($query,MYSQLI_ASSOC);
    $college=$data['collegename'];
    $query = mysqli_query($connection,"select * from determining_factors where college='$college'  order by `formid` asc"); 


  $fpdf = new FPDF('P','mm','A3');
  $fpdf -> AddPage();
  $fpdf->SetFont('Arial','B',16);
  
  if ($query->num_rows > 0) {
    // output data of each row
  $fpdf->SetFillColor(0, 0, 0); // Set background colour to black
  $fpdf->SetTextColor(255, 255, 255); // Set text to the colour white.
    $fpdf -> Cell(50,6,"Acpc_ID",1,0,'C','TRUE');
     $fpdf -> Cell(70,6,"Name",1,0,'C','TRUE');
       $fpdf -> Cell(50,6,"Distance",1,0,'C','TRUE');
       $fpdf -> Cell(50,6,"Merit",1,0,'C','TRUE');
         $fpdf -> Cell(50,6,"Merit Rank",1,1,'C','TRUE');
         $fpdf->SetTextColor(0, 0, 0);

    while($row = $query->fetch_assoc()) {

    	$id = $row["acpcid"];
    	$name = $row["name"];
    	$distance = $row["distance"];
    	$alloted = $row["room"];
    	$merit = $row["merit"];
  
        //$string = "" . $row["acpcid"]. " " . $row["name"]. " " . $row["distance"]. " " . $row["allot"]. "";
        
        $fpdf -> Cell(50,6,$id,1,0,'C');
        $fpdf -> Cell(70,6,$name,1,0,'C');
        $fpdf -> Cell(50,6,$distance,1,0,'C');
        $fpdf -> Cell(50,6,$merit,1,0,'C');
        $fpdf -> Cell(50,6,$alloted,1,1,'C');

    }
} else {
    echo "0 results";
}
$fpdf -> Output();

?>
