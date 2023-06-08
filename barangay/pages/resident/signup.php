<?php session_start();?>

<?php require_once 'function.php';?>

<?php

$nationalities = getNationalities($con);
$religions = getReligions($con);
$dwelling_types = getDwellingTypes($con);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Barangay Tangos North | Signup</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Include Select2 CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

        <!-- Include Select2 JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

        <!-- Include JQuery Validate JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

        <!-- Include Sweet Alert JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <style>
            .center-block {
                float: none;
                margin-left: auto;
                margin-right: auto;
                margin-top: 75px;
            }

            .select2-container {
                z-index: 9999; /* Set a high z-index value */
                width: 100%; /* Set initial width to 100% */
            }

            @media (min-width: 768px) {
                .select2-container {
                    width: 200px; /* Adjust the width for larger screens */
                }
            }

            .is-invalid {
                color: red;
            }
        </style>
    </head>
    <body class="bg-success">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-8 col-md-offset-2">
                    <div class="panel panel-default center-block">
                        <div class="panel-heading">
                        <div class="text-center" style="display: flex; align-items: center; justify-content: center;">
                            <img src="../../img/logo.png" style="height: 150px;" />
                        </div>
                            <h4 class="text-center">Create your account</h4>
                        </div>
                        <div class="panel-body">
                            <form action="" method="post" id="resident-form">
                                <div class="form-group">
                                    <label for="lname">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name">
                                </div>
                                <div class="form-group">
                                    <label for="fname">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name">
                                </div>
                                <div class="form-group">
                                    <label for="mname">Middle Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter your middle name">
                                </div>
                                <div class="form-group">
                                    <label for="bdate">Birth Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="bdate" name="bdate">
                                </div>
                                <div class="form-group">
                                    <label for="bplace">Birth Place <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="bplace" name="bplace" placeholder="Enter your birth place">
                                </div>
                                <div class="form-group">
                                    <label for="zone">Zone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="zone" name="zone" placeholder="Enter your zone">
                                </div>
                                <div class="form-group">
                                    <label for="totalhousehold">Total Household <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="totalhousehold" name="totalhousehold" placeholder="Enter the total household count">
                                </div>
                                <div class="form-group">
                                    <label for="differentlyabledperson">Differently Abled Person <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="differentlyabledperson" name="differentlyabledperson" placeholder="Enter if differently abled">
                                </div>
                                <div class="form-group">
                                    <label for="relationtohead">Relation to Head <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="relationtohead" name="relationtohead" placeholder="Enter your relation to head of the household">
                                </div>
                                <div class="form-group">
                                    <label for="maritalstatus">Marital Status <span class="text-danger">*</span></label>
                                    <select class="form-control" id="maritalstatus" name="maritalstatus">
                                        <option value="">Select Marital Status</option>
                                        <option value="SINGLE">Single</option>
                                        <option value="MARRIED">Married</option>
                                        <option value="DIVORCED">Divorced</option>
                                        <option value="SEPARATED">Separated</option>
                                        <option value="WIDOWED">Widowed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bloodtype">Blood Type <span class="text-danger">*</span></label>
                                    <select class="form-control" id="bloodtype" name="bloodtype">
                                        <option value="">Select Blood Type</option>
                                        <option value="A+">A-positive (A+)</option>
                                        <option value="A-">A-negative (A-)</option>
                                        <option value="B+">B-positive (B+)</option>
                                        <option value="B-">B-negative (B-)</option>
                                        <option value="AB+">AB-positive (AB+)</option>
                                        <option value="AB-">AB-negative (AB-)</option>
                                        <option value="O+">O-positive (O+)</option>
                                        <option value="O-">O-negative (O-)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="occupation">Occupation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter your occupation">
                                </div>
                                <div class="form-group">
                                    <label for="monthlyincome">Monthly Income <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="monthlyincome" name="monthlyincome" placeholder="Enter your monthly income">
                                </div>
                                <div class="form-group">
                                    <label for="householdnum">Household Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="householdnum" name="householdnum" placeholder="Enter your household number">
                                </div>
                                <div class="form-group">
                                    <label for="lengthofstay">Length of Stay <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lengthofstay" name="lengthofstay" placeholder="Enter the length of stay">
                                </div>
                                <div class="form-group">
                                    <label for="religion">Religion <span class="text-danger">*</span></label>
                                    <select class="form-control" id="religion" name="religion">
                                        <option value="">Select Religion</option>
                                        <?php while ($row = mysqli_fetch_assoc($religions)): ?>
                                            <option value="<?php echo $row['religion_name'] ?>"><?php echo $row['religion_name'] ?></option>
                                        <?php endwhile;?>
                                        <?php mysqli_free_result($religions); // free result set ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nationality">Nationality <span class="text-danger">*</span></label>
                                    <select class="form-control select2" id="nationality" name="nationality">
                                        <option value="">Select Nationality</option>
                                        <?php while ($row = mysqli_fetch_assoc($nationalities)): ?>
                                            <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                                        <?php endwhile;?>
                                        <?php mysqli_free_result($nationalities); // free result set ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender <span class="text-danger">*</span></label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="MALE">Male</option>
                                        <option value="FEMALE">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="skills">Skills <span class="text-danger">*</span></label>
                                    <select class="form-control" id="skills" name="skills" multiple></select>
                                </div>
                                <div class="form-group">
                                    <label for="igpitID">Igpit ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="igpitID" name="igpitID" placeholder="Enter your Igpit ID">
                                </div>
                                <div class="form-group">
                                    <label for="philhealthNo">PhilHealth Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="philhealthNo" name="philhealthNo" placeholder="Enter your PhilHealth number">
                                </div>
                                <div class="form-group">
                                    <label for="highestEducationalAttainment">Highest Educational Attainment <span class="text-danger">*</span></label>
                                    <select class="form-control" id="highestEducationalAttainment" name="highestEducationalAttainment">
                                        <option value="">Select Highest Education Attainment</option>
                                        <option value="NO_FORMAL_EDUCATION">No Formal Education</option>
                                        <option value="ELEMENTARY_SCHOOL">Elementary School</option>
                                        <option value="HIGH_SCHOOL">High School</option>
                                        <option value="VOCATIONAL">Vocational/Trade School</option>
                                        <option value="COLLEGE">College/University</option>
                                        <option value="MASTERS_DEGREE">Postgraduate/Master's Degree</option>
                                        <option value="PHD">Doctorate/Ph.D.</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="houseOwnershipStatus">House Ownership Status <span class="text-danger">*</span></label>
                                    <select class="form-control" id="houseOwnershipStatus" name="houseOwnershipStatus">
                                        <option value="">Select House Ownership Status</option>
                                        <option value="OWNED">Owned</option>
                                        <option value="RENTED">Rented</option>
                                        <option value="MORTGAGED">Mortgaged</option>
                                        <option value="LEASED">Leased</option>
                                        <option value="CO-OWNED">Co-owned</option>
                                        <option value="INHERITED">Inherited</option>
                                        <option value="GOVERNMENT_OWNED">Government-owned</option>
                                        <option value="OCCUPIED_WITHOUT_OWNERSHIP">Occupied without ownership</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="landOwnershipStatus">Land Ownership Status <span class="text-danger">*</span></label>
                                    <select class="form-control" id="landOwnershipStatus" name="landOwnershipStatus">
                                        <option value="">Select Land Ownership Status</option>
                                        <option value="FREEHOLD">Freehold</option>
                                        <option value="LEASEHOLD">Leasehold</option>
                                        <option value="COMMONHOLD">Commonhold</option>
                                        <option value="JOINT_TENANCY">Joint Tenancy</option>
                                        <option value="TENANCY_IN_COMMON">Tenancy in Common</option>
                                        <option value="COMMUNITY_LAND_TRUST">Community Land Trust</option>
                                        <option value="INDEGENOUS">Indigenous</option>
                                        <option value="GOVERNMENT">Government</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dwellingtype">Dwelling Type <span class="text-danger">*</span></label>
                                    <select class="form-control" id="dwellingtype" name="dwellingtype">
                                        <option value="">Select Dwelling Type</option>
                                        <?php while ($row = mysqli_fetch_assoc($dwelling_types)): ?>
                                            <option value="<?php echo $row['dwelling_type'] ?>"><?php echo $row['dwelling_type'] ?></option>
                                        <?php endwhile;?>
                                        <?php mysqli_free_result($dwelling_types); // free result set ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="waterUsage">Water Usage <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="waterUsage" name="waterUsage" placeholder="Enter your water usage">
                                </div>
                                <div class="form-group">
                                    <label for="lightningFacilities">Lightning Facilities <span class="text-danger">*</span></label>
                                    <select class="form-control" id="lightningFacilities" name="lightningFacilities" multiple></select>
                                </div>
                                <div class="form-group">
                                    <label for="sanitaryToilet">Sanitary Toilet <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="sanitaryToilet" name="sanitaryToilet" placeholder="Enter your sanitary toilet">
                                </div>
                                <div class="form-group">
                                    <label for="formerAddress">Former Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="formerAddress" name="formerAddress" rows="4" cols="50"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="remarks">Remarks <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="remarks" name="remarks" rows="4" cols="50"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" id="image" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Enter your password">
                                </div>
                                <button type="submit" class="btn btn-primary center-block">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.select2').select2();

                $('#lightningFacilities').select2({
                    tags: true,
                    tokenSeparators: [','],
                    placeholder: 'Enter values',
                });

                $('#skills').select2({
                    tags: true,
                    tokenSeparators: [','],
                    placeholder: 'Enter values',
                });

                // save resident information
                $("#resident-form").submit(function(event) {
                    event.preventDefault();

                    var formData = new FormData(this);

                    // let inputData = {};
                    // let textareaData = {};
                    // let selectData = {};

                    // Get values of input type elements
                    $(this).find(":input").each(function() {
                        var fieldName = $(this).attr("name");
                        var fieldValue = $(this).val();

                        // Only include fields with non-empty values
                        if (fieldValue !== "") {
                            // inputData[fieldName] = fieldValue;
                            formData.append(fieldName, fieldValue);
                        }
                    });

                    // Get values of textarea elements
                    $(this).find("textarea").each(function() {
                        var fieldName = $(this).attr("name");
                        var fieldValue = $(this).val();

                        // Only include fields with non-empty values
                        if (fieldValue !== "") {
                            // textareaData[fieldName] = fieldValue;
                            formData.append(fieldName, fieldValue);
                        }
                    });

                    // Get values of select elements
                    $(this).find("select").each(function() {
                        var fieldName = $(this).attr("name");
                        var fieldValue = $(this).val();

                        // Only include fields with non-empty values
                        if (fieldValue !== "") {
                            // selectData[fieldName] = fieldValue;
                            formData.append(fieldName, fieldValue);
                        }
                    });

                    // merge all form fields
                    // const data = {
                    //     ...inputData,
                    //     ...textareaData,
                    //     ...selectData
                    // }

                    // jquery validate
                    var $validator = $('#resident-form').validate({
                        validClass: "is-valid",
                        errorClass: "is-invalid",
                        rules: {
                            lname: {
                                required: true
                            },
                            fname: {
                                required: true
                            },
                            mname: {
                                required: true
                            },
                            bdate: {
                                required: true
                            },
                            bplace: {
                                required: true
                            },
                            zone: {
                                required: true
                            },
                            totalhousehold: {
                                required: true
                            },
                            differentlyabledperson: {
                                required: true
                            },
                            maritalstatus: {
                                required: true
                            },
                            bloodtype: {
                                required: true
                            },
                            occupation: {
                                required: true
                            },
                            monthlyincome: {
                                required: true
                            },
                            householdnum: {
                                required: true
                            },
                            lengthofstay: {
                                required: true
                            },
                            religion: {
                                required: true
                            },
                            nationality: {
                                required: true
                            },
                            gender: {
                                required: true
                            },
                            skills: {
                                atleasteOneValue: true
                            },
                            igpitID: {
                                required: true
                            },
                            philhealthNo: {
                                required: true
                            },
                            highestEducationalAttainment: {
                                required: true
                            },
                            houseOwnershipStatus: {
                                required: true
                            },
                            landOwnershipStatus: {
                                required: true
                            },
                            dwellingtype: {
                                required: true
                            },
                            waterUsage: {
                                required: true
                            },
                            relationtohead: {
                                required: true
                            },
                            lightningFacilities: {
                                atleasteOneValue: true
                            },
                            formerAddress: {
                                required: true
                            },
                            remarks: {
                                required: true
                            },
                            sanitaryToilet: {
                                required: true
                            },
                            image: {
                                required: true,
                                imageExtension: true
                            },
                            username: {
                                required: true
                            },
                            password: {
                                required: true
                            },
                            confirmPassword: {
                                required: true,
                                equalTo: "#password"
                            },
                        },
                        messages: {
                            lightningFacilities: {
                                required: "Please add atleast one value.",
                                atleasteOneValue: "Please add atleast one value."
                            },
                            skills: {
                                required: "Please add atleast one value.",
                                atleasteOneValue: "Please add atleast one value."
                            },
                            image: {
                                required: "Please select an image file",
                                imageExtension: "Please select a valid image file (JPG, JPEG, PNG)"
                            },
                            password: {
                                required: "Please enter a password"
                            },
                            confirmPassword: {
                                required: "Please confirm your password",
                                equalTo: "Passwords do not match"
                            }
                        },
                        highlight: function (element, errorClass, validClass) {
                            var elem = $(element);
                            $('#element_type')
                            elem.addClass(errorClass).removeClass(validClass);
                        },
                        unhighlight: function (element, errorClass, validClass) {
                            var elem = $(element);
                            elem.removeClass(errorClass).addClass(validClass);
                        },
                        errorPlacement: function (error, element) {
                            var elem = $(element);
                            if (elem.hasClass("select2-hidden-accessible")) {
                                if (['skills', 'lightningFacilities'].includes(elem.attr("id"))) {
                                    var element = $("#" + elem.attr("id")).parent().find(".selection").parent();
                                    console.log("element", element);
                                } else {
                                    element = $("#select2-" + elem.attr("id") + "-container").parent().parent().parent();
                                }
                                error.insertAfter(element);
                            } else if (['nationality'].includes(elem.attr("id"))) {
                                element = $("#" + elem.attr("id")).parent()
                                error.insertAfter(element);
                            } else {
                                error.insertAfter(element);
                            }
                        }
                    });

                    $.validator.addMethod("atleasteOneValue", function(value, element) {
                        var selectedValues = $(element).val();
                        if (selectedValues !== null && selectedValues.length > 0) {
                            return true;
                        }
                        var enteredValue = $(element).next(".select2").find(".select2-search__field").val();
                        return enteredValue.trim() !== "";
                    }, "Please add at least one value.");


                    $.validator.addMethod("imageExtension", function(value, element) {
                        return this.optional(element) || /\.(jpe?g|png)$/i.test(value);
                    }, "Please select a valid image file (JPG, JPEG, PNG).");


                    $("#lightningFacilities").on("change input", function() {
                        $validator.element($(this));
                    });

                    $("#skills").on("change input", function() {
                        $validator.element($(this));
                    });


                    Swal.fire({
                        title: 'Do you want to save the changes?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Save',
                        denyButtonText: `Don't save`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // check if form is valid
                            var $valid = $('#resident-form').valid();
                                if (!$valid) {
                                $validator.focusInvalid();
                                return false;
                            }

                            // Make AJAX request
                            $.ajax({
                                url: "save_resident.php",
                                type: "POST",
                                data: formData,
                                dataType: "json",
                                contentType: false,
                                processData: false,
                                success: function(response) {

                                    Swal.fire({
                                        position: 'center',
                                        icon: response.icon,
                                        title: response.message,
                                        showConfirmButton: true,
                                    }).then((result) => {
                                        if (result.isConfirmed && response.success) {
                                            location.replace("/pages/resident/login.php");
                                        };
                                    });

                                },
                                error: function() {
                                    alert("An error occurred while saving the data.");
                                }
                            });
                        }
                    });

                    
                });
            });
        </script>
    </body>
</html>
