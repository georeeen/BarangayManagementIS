<?php

require 'BarangayIndigencyCertificate.php';
require './../../connection.php';

// Create a new PDF instance
$pdf = new BarangayIndigencyCertificate();

$resident_id = $_GET['resident_id'] ?? 0;

if ($resident_id > 0) {
    $query = "SELECT 
            r.id,
            CONCAT(r.fname, ' ', r.mname, ' ', r.lname) as name,
            r.formerAddress AS address,
            r.nationality,
            r.gender,
            r.maritalstatus,
            p.orNo
        FROM tblpermit AS p
        JOIN tblresident AS r ON p.residentid = r.id
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