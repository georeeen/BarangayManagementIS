<?php 
include_once("connect.php");
include_once 'fpdf.php';

class PDF extends FPDF
{
	function Header()
	{ 	
		$this->SetFont('Arial','B',13);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(0,0,'Resident List',0,0,'C');
		// Line break
		$this->Ln(20);

	}
	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

$db = new dbObj();
$connString =$db->getConnstring();
$display_heading = array('id'=>'ID', 'lname'=> 'Last Name', 'fname'=> 'First Name', 'age'=> 'Age', 'gender'=> 'Sex', 'street'=> 'Street',  'bloodtype'=> 'Blood Type',  'relationtohead'=> 'Relation to the Head', 'pwd'=> 'PWD', 'mname' => 'Middle Name', 'bdate' => 'Birthday', 'bplace' => 'Birthplace', 'barangay' => 'Barangay', 'totalhousehold' => 'Total House Hold', 'civilstatus' => 'Civil Status', 'occupation' => 'Occupation', 'monthlyincome' => 'MOnthly Income', 'householdnum' => 'Household #', 'lengthofstay' => 'Length of Stay', 'religion' => 'Religion', 'highestEducationalAttainment' => 'Edducational Attainment', 'houseOwnershipStatus' => 'House Ownership Status', 'landOwnershipStatus' => 'Land Ownership Status', 'dwellingtype' => 'Dwelling TYpe', 'waterUsage' => 'Water Usage', 'lightningFacilities'=> 'LIghtning Facility', 'maritalstatus'=> ' ', 'householdmem'=> 'Household Member', 'nationality'=> 'Nationality', 'image'=> 'Image', 'username'=> 'Username', 'password'=> 'Password', 'created_dt'=> 'Created', 'updated_dt'=> 'Updated', 'phonenum'=> 'Phone Number', 'email'=> 'Email');

$result = mysqli_query($connString, "SELECT id, lname, fname, age, gender, street, bloodtype, relationtohead, pwd FROM tblresident") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM tblresident");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}
$pdf->Output();
?>