<?php

require 'BarangayClearanceReport.php';
require './../../connection.php';

// Create a new PDF instance
$pdf = new BarangayClearanceReport();

$resident_id = $_GET['resident_id'] ?? 0;

if ($resident_id > 0) {
    $query = "SELECT 
            CONCAT(r.fname, ' ', r.mname, ' ', r.lname) as name,
            r.formerAddress AS address,
            c.purpose,
            c.clearanceNo,
            c.orNo
        FROM tblclearance AS c
        JOIN tblresident AS r ON c.residentid = r.id
        WHERE residentid = ?";

    $stmt = mysqli_prepare($con, $query);
    
    mysqli_stmt_bind_param($stmt, "i", $resident_id);
    
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    $data = mysqli_fetch_assoc($result);

    // set data
    $pdf->setHeaderData($data);
    $pdf->GenerateReport($data);

    // Output the PDF
    $pdf->Output();
} else {
    echo "<h4>No record found for Resident Number: " . $resident_id . "</h4>";
}