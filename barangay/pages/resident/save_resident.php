<?php

require_once "./../connection.php";

extract($_POST);

$response = array("success" => false, "message" => "Resident failed to save.", "icon" => "error");
$uploadDirectory = "./../../img/uploaded-images/";

// Check if file was uploaded successfully
if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $timestamp = time();

    // Move the uploaded file to the destination directory
    $destination = $uploadDirectory . $timestamp . "_" . $image_name;
    if (move_uploaded_file($tmp_name, $destination)) {
        // File moved successfully
        $image = $destination;

        // Prepare the SQL statement
        $stmt = $con->prepare("INSERT INTO `db_barangay`.`tblresident` 
            (
                `lname`, `fname`, `mname`, `bdate`, `bplace`, 
                `zone`, `totalhousehold`, `differentlyabledperson`, `relationtohead`, 
                `maritalstatus`, `bloodtype`, `occupation`, `monthlyincome`, `householdnum`, 
                `lengthofstay`, `religion`, `nationality`, `gender`, `skills`, 
                `igpitID`, `philhealthNo`, `highestEducationalAttainment`, `houseOwnershipStatus`, `landOwnershipStatus`, 
                `dwellingtype`, `waterUsage`, `lightningFacilities`, `sanitaryToilet`, `formerAddress`, 
                `remarks`, `image`, `username`, `password`
            ) 
            VALUES (
                ?, ?, ?, ?, ?,
                ?, ?, ?, ?,
                ?, ?, ?, ?, ?,
                ?, ?, ?, ?, ?,
                ?, ?, ?, ?, ?,
                ?, ?, ?, ?, ?,
                ?, ?, ?, ?
            );
        ");

        // Join array elements with a string
        $skills = is_array($skills) ? implode(",", $skills) : $skills;
        $lightningFacilities = is_array($skills) ? implode(",", $lightningFacilities) : $lightningFacilities;

        // Bind parameters to the statement
        $stmt->bind_param("sssssssssssssssssssssssssssssssss", 
            $lname, $fname, $mname, $bdate, $bplace,
            $zone, $totalhousehold, $differentlyabledperson, $relationtohead,
            $maritalstatus, $bloodtype, $occupation, $monthlyincome, $householdnum,
            $lengthofstay, $religion, $nationality, $gender, $skills,
            $igpitID, $philhealthNo, $highestEducationalAttainment, $houseOwnershipStatus, $landOwnershipStatus,
            $dwellingtype, $waterUsage,  $lightningFacilities, $sanitaryToilet, $formerAddress,
            $remarks, $image, $username, $password
        );

        // Execute the statement
        if ($stmt->execute()) {
            $response["success"] = true;
            $response["message"] = "Resident saved successfully.";
            $response["icon"] = "success";
        }

        // Close the statement and the database connection
        $stmt->close();
        $con->close();

    } else {
        // Failed to move the file
        $response["success"] = true;
        $response["message"] = "Failed to move the file to the destination directory.";
        $response["icon"] = "error";
    }

} 

echo json_encode($response);
