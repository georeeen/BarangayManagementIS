<?php

require "../connection.php";

if (isset($_POST['btn_add'])) {
    $txt_lname = $_POST['txt_lname'];
    $txt_fname = $_POST['txt_fname'];
    $txt_mname = $_POST['txt_mname'];
    $ddl_gender = $_POST['ddl_gender'];
    $txt_bdate = $_POST['txt_bdate'];
    $txt_bplace = $_POST['txt_bplace'];
    $txt_email = $_POST['txt_email'];
    $txt_phonenum = $_POST['txt_phonenum'];

    $txt_age = $_POST['txt_age'];
    $dateOfBirth = $txt_bdate;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $txt_age = $diff->format('%y');

    $txt_brgy = $_POST['txt_brgy'];
    $txt_cstatus = $_POST['txt_cstatus'];
    $txt_street = $_POST['txt_street'];
    $txt_householdmem = $_POST['txt_householdmem'];
    $txt_rthead = $_POST['txt_rthead'];

    $txt_pwd = $_POST['txt_pwd'];
    $txt_btype = $_POST['txt_btype'];
    $txt_occp = $_POST['txt_occp'];
    $txt_income = $_POST['txt_income'];
    $txt_householdnum = $_POST['txt_householdnum'];
    $txt_length = $_POST['txt_length'];
    $txt_religion = $_POST['txt_religion'];
    $txt_national = $_POST['txt_national'];
    $ddl_eattain = $_POST['ddl_eattain'];
    $ddl_hos = $_POST['ddl_hos'];

    $ddl_los = $_POST['ddl_los'];
    $txt_water = $_POST['txt_water'];
    $txt_lightning = $_POST['txt_lightning'];
    $txt_uname = $_POST['txt_uname'];
    $txt_upass = $_POST['txt_upass'];

    $name = basename($_FILES['txt_image']['name']);
    $temp = $_FILES['txt_image']['tmp_name'];
    $imagetype = $_FILES['txt_image']['type'];
    $size = $_FILES['txt_image']['size'];

    $milliseconds = round(microtime(true) * 1000);
    $image = $milliseconds . '_' . $name;

    if (isset($_SESSION['role'])) {
        $action = 'Added Resident named ' . $txt_lname . ', ' . $txt_fname . ' ' . $txt_mname;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user,logdate,action) values ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
    }

    $su = mysqli_query($con, "SELECT * from tblresident where username = '" . $txt_uname . "' ");
    $ct = mysqli_num_rows($su);

    if ($ct == 0) {

        if ($name != "") {
            if (($imagetype == "image/jpeg" || $imagetype == "image/png" || $imagetype == "image/bmp") && $size <= 2048000) {
                if (move_uploaded_file($temp, 'image/' . $image)) {
                    $txt_image = $image;
                    $query = mysqli_query($con, "INSERT INTO tblresident (
                                        lname,
                                        fname,
                                        mname,
                                        bdate,
                                        bplace,
                                        email,
                                        phonenum,
                                        age,
                                        barangay,
                                        pwd,
                                        totalhousehold,
                                        relationtohead,
                                        street,
                                        bloodtype,
                                        occupation,
                                        monthlyincome,
                                        householdnum,
                                        lengthofstay,
                                        religion,
                                        nationality,
                                        gender,
                                        highestEducationalAttainment,
                                        houseOwnershipStatus,
                                        landOwnershipStatus,
                                        waterUsage,
                                        lightningFacilities,
                                        image,
                                        username,
                                        password
                                    )
                                    values (
                                        '$txt_lname',
                                        '$txt_fname',
                                        '$txt_mname',
                                        '$txt_bdate',
                                        '$txt_bplace',
                                        '$txt_age',
                                        '$txt_email'
                                        '$txt_phonenum'
                                        '$txt_brgy',
                                        '$txt_pwd',
                                        '$txt_householdmem',
                                        '$txt_rthead',
                                        '$txt_mstatus',
                                        '$ddl_street',
                                        '$txt_btype',
                                        '$txt_cstatus',
                                        '$txt_occp',
                                        '$txt_income',
                                        '$txt_householdnum',
                                        '$txt_length',
                                        '$txt_religion',
                                        '$txt_national',
                                        '$ddl_gender',
                                        '$ddl_eattain',
                                        '$ddl_hos',
                                        '$ddl_los',
                                        '$txt_water',
                                        '$txt_lightning',
                                        '$txt_image',
                                        '$txt_uname',
                                        '$txt_upass'
                                    )"
                    )
                    or die('Error: ' . mysqli_error($con));
                }
            } else {
                $_SESSION['filesize'] = 1;
                header("location: " . $_SERVER['REQUEST_URI']);
            }
        } else {
            $txt_image = 'default.png';

            $query = mysqli_query($con, "INSERT INTO tblresident (
                                        lname,
                                        fname,
                                        mname,
                                        bdate,
                                        bplace,
                                        email,
                                        phonenum,
                                        age,
                                        barangay,
                                        pwd,
                                        totalhousehold,
                                        relationtohead,
                                        street,
                                        bloodtype,
                                        civilstatus,
                                        occupation,
                                        monthlyincome,
                                        householdnum,
                                        householdmem,
                                        lengthofstay,
                                        religion,
                                        nationality,
                                        gender,
                                        highestEducationalAttainment,
                                        houseOwnershipStatus,
                                        landOwnershipStatus,
                                        waterUsage,
                                        lightningFacilities,
                                        image,
                                        username,
                                        password
                                    )
                                    values (
                                        '$txt_lname',
                                        '$txt_fname',
                                        '$txt_mname',
                                        '$txt_bdate',
                                        '$txt_bplace',
                                        '$txt_email',
                                        '$txt_phonenum',
                                        '$txt_age',
                                        '$txt_brgy',
                                        '$txt_pwd',
                                        '$txt_householdmem',
                                        '$txt_rthead',
                                        '$txt_cstatus',
                                        '$txt_street',
                                        '$txt_btype',
                                        '$txt_cstatus',
                                        '$txt_occp',
                                        '$txt_income',
                                        '$txt_householdnum',
                                        '$txt_length',
                                        '$txt_religion',
                                        '$txt_national',
                                        '$ddl_gender',
                                        '$ddl_eattain',
                                        '$ddl_hos',
                                        '$ddl_los',
                                        '$txt_water',
                                        '$txt_lightning',
                                        '$txt_image',
                                        '$txt_uname',
                                        '$txt_upass'
                                    )"
            )
            or die('Error: ' . mysqli_error($con));

        }

        if ($query == true) {
            $_SESSION['added'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
        }
    } else {
        $_SESSION['duplicateuser'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    }

}

if (isset($_POST['btn_save'])) {
    $txt_id = $_POST['hidden_id'];
    $txt_edit_lname = $_POST['txt_edit_lname'];
    $txt_edit_fname = $_POST['txt_edit_fname'];
    $txt_edit_mname = $_POST['txt_edit_mname'];
    $txt_edit_bdate = $_POST['txt_edit_bdate'];
    $txt_edit_bplace = $_POST['txt_edit_bplace'];
   
    $dateOfBirth = $txt_edit_bdate;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $txt_edit_age = $diff->format('%y');

    $txt_edit_brgy = $_POST['txt_edit_brgy'];
    $txt_edit_pwd = $_POST['txt_edit_pwd'];
    $txt_edit_mstatus = $_POST['txt_edit_mstatus'];
    $ddl_edit_street = $_POST['ddl_edit_street'];
    $txt_edit_householdmem = $_POST['txt_edit_householdmem'];
    $txt_edit_rthead = $_POST['txt_edit_rthead'];

    $txt_edit_btype = $_POST['txt_edit_btype'];
    $txt_edit_cstatus = $_POST['txt_edit_cstatus'];
    $txt_edit_occp = $_POST['txt_edit_occp'];
    $txt_edit_income = $_POST['txt_edit_income'];

    $txt_edit_householdnum = $_POST['txt_edit_householdnum'];
    $txt_edit_length = $_POST['txt_edit_length'];
    $txt_edit_religion = $_POST['txt_edit_religion'];
    $txt_edit_national = $_POST['txt_edit_national'];
    $ddl_edit_gender = $_POST['ddl_edit_gender'];
    $txt_edit_email = $_POST['txt_edit_email'];
    $txt_edit_phonenum = $_POST['txt_edit_phonenum'];
    $ddl_edit_eattain = $_POST['ddl_edit_eattain'];
    $ddl_edit_hos = $_POST['ddl_edit_hos'];

    $ddl_edit_los = $_POST['ddl_edit_los'];
    $txt_edit_water = $_POST['txt_edit_water'];
    $txt_edit_lightning = $_POST['txt_edit_lightning'];

    $txt_edit_uname = $_POST['txt_edit_uname'];
    $txt_edit_upass = $_POST['txt_edit_upass'];

    $name = basename($_FILES['txt_edit_image']['name']);
    $temp = $_FILES['txt_edit_image']['tmp_name'];
    $imagetype = $_FILES['txt_edit_image']['type'];
    $size = $_FILES['txt_edit_image']['size'];

    $milliseconds = round(microtime(true) * 1000);
    $image = $milliseconds . '_' . $name;

    if (isset($_SESSION['role'])) {
        $action = 'Update Resident named ' . $txt_edit_lname . ', ' . $txt_edit_fname . ' ' . $txt_edit_mname;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user,logdate,action) values ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
    }

    $su = mysqli_query($con, "SELECT * from tblresident where username = '" . $txt_edit_uname . "' and id not in (" . $txt_id . ") ");
    $ct = mysqli_num_rows($su);

    if ($ct == 0) {

        if ($name != "") {
            if (($imagetype == "image/jpeg" || $imagetype == "image/png" || $imagetype == "image/bmp") && $size <= 2048000) {
                if (move_uploaded_file($temp, 'image/' . $image)) {

                    $txt_edit_image = $image;
                    $update_query = mysqli_query($con, "UPDATE tblresident set
                                        lname = '" . $txt_edit_lname . "',
                                        fname = '" . $txt_edit_fname . "',
                                        mname = '" . $txt_edit_mname . "',
                                        bdate = '" . $txt_edit_bdate . "',
                                        bplace = '" . $txt_edit_bplace . "',
                                        age = '" . $txt_edit_age . "',
                                        barangay = '" . $txt_edit_brgy . "',
                                        pwd = '" . $txt_edit_pwd . "',
                                        totalhousehold = '" . $txt_edit_householdmem . "',
                                        differentlyabledperson = '" . $txt_edit_dperson . "',
                                        relationtohead = '" . $txt_edit_rthead . "',
                                        bloodtype = '" . $txt_edit_btype . "',
                                        civilstatus = '" . $txt_edit_cstatus . "',
                                        occupation = '" . $txt_edit_occp . "',
                                        monthlyincome = '" . $txt_edit_income . "',
                                        householdnum = '" . $txt_edit_householdnum . "',
                                        lengthofstay = '" . $txt_edit_length . "',
                                        religion = '" . $txt_edit_religion . "',
                                        nationality = '" . $txt_edit_national . "',
                                        gender = '" . $ddl_edit_gender . "',
                                        skills = '" . $txt_edit_skills . "',
                                        igpitID = '" . $txt_edit_igpit . "',
                                        philhealthNo = '" . $txt_edit_phno . "',
                                        highestEducationalAttainment = '" . $ddl_edit_eattain . "',
                                        houseOwnershipStatus = '" . $ddl_edit_hos . "',
                                        landOwnershipStatus = '" . $ddl_edit_los . "',
                                        dwellingtype = '" . $ddl_edit_dtype . "',
                                        waterUsage = '" . $txt_edit_water . "',
                                        lightningFacilities = '" . $txt_edit_lightning . "',
                                        sanitaryToilet = '" . $txt_edit_toilet . "',
                                        formerAddress = '" . $txt_edit_faddress . "',
                                        remarks = '" . $txt_edit_remarks . "',
                                        image = '" . $txt_edit_image . "',
                                        username = '" . $txt_edit_uname . "',
                                        password = '" . $txt_edit_upass . "'
                                        where id = '" . $txt_id . "'
                                ") or die('Error: ' . mysqli_error($con));
                }
            } else {
                $_SESSION['filesize'] = 1;
                header("location: " . $_SERVER['REQUEST_URI']);
            }
        } else {

            $chk_image = mysqli_query($con, "SELECT * from tblresident where id = '" . $_POST['hidden_id'] . "' ");
            $rowimg = mysqli_fetch_array($chk_image);

        $txt_edit_image = $rowimg['image'];
        $update_query = mysqli_query($con,"UPDATE tblresident set 
                                        lname = '".$txt_edit_lname."',
                                        fname = '".$txt_edit_fname."',
                                        mname = '".$txt_edit_mname."',
                                        bdate = '".$txt_edit_bdate."',
                                        bplace = '".$txt_edit_bplace."',
                                        age = '".$txt_edit_age."',
                                        barangay = '".$txt_edit_brgy."',
                                        pwd = '" . $txt_edit_pwd . "',
                                        totalhousehold = '".$txt_edit_householdmem."',
                                        relationtohead = '".$txt_edit_rthead."',
                                        bloodtype = '".$txt_edit_btype."',
                                        civilstatus = '".$txt_edit_cstatus."',
                                        occupation = '".$txt_edit_occp."',
                                        monthlyincome = '".$txt_edit_income."',
                                        householdnum = '".$txt_edit_householdnum."',
                                        lengthofstay = '".$txt_edit_length."',
                                        religion = '".$txt_edit_religion."',
                                        nationality = '".$txt_edit_national."',
                                        highestEducationalAttainment = '".$ddl_edit_eattain."',
                                        houseOwnershipStatus = '".$ddl_edit_hos."',
                                        landOwnershipStatus = '".$ddl_edit_los."',
                                        waterUsage = '".$txt_edit_water."',
                                        lightningFacilities = '".$txt_edit_lightning."',
                                        image = '".$txt_edit_image."',
                                        username = '".$txt_edit_uname."',
                                        password = '".$txt_edit_upass."'
                                        where id = '".$txt_id."'
                                ") or die('Error: ' . mysqli_error($con));
        }

        if ($update_query == true) {
            $_SESSION['edited'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
        }

    } else {
        $_SESSION['duplicateuser'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    }

}

if (isset($_POST['btn_delete'])) {
    if (isset($_POST['chk_delete'])) {
        foreach ($_POST['chk_delete'] as $value) {
            $delete_query = mysqli_query($con, "DELETE from tblresident where id = '$value' ") or die('Error: ' . mysqli_error($con));

            if ($delete_query == true) {
                $_SESSION['delete'] = 1;
                header("location: " . $_SERVER['REQUEST_URI']);
            }
        }
    }
}

/* GET DROPDOWN OPTIONS */
function getNationalities($con)
{
    $query = "SELECT * FROM ref_nationalities";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }

    return $result;
}

function getReligions($con)
{
    $query = "SELECT * FROM ref_religions";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }

    return $result;
}

function getDwellingTypes($con)
{
    $query = "SELECT * FROM ref_dwelling_types";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }

    return $result;
}

