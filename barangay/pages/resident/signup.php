<?php 

session_start();

include 'function.php';
include '../connection.php';
?>

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
                                    <input type="text" class="form-control" id="lname" name="txt_lname" placeholder="Enter your last name">
                                </div>
                                <div class="form-group">
                                    <label for="fname">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fname" name="txt_fname" placeholder="Enter your first name">
                                </div>
                                <div class="form-group">
                                    <label for="mname">Middle Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="mname" name="txt_mname" placeholder="Enter your middle name">
                                </div>
                                <div class="form-group">
                                    <label for="bdate">Birth Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control input-sm input-size" id="bdate" name="txt_bdate">
                                </div>
                                <div class="form-group">
                                    <label for="bplace">Birth Place <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="bplace" name="txt_bplace" placeholder="Enter your birth place">
                                </div>
                                <div class="form-group">
                                    <label for="age">Age<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="age" name="txt_age" placeholder="Enter your age">
                                </div>

                                <div class="form-group">
                                    <label for="street">Street <span class="text-danger">*</span></label>
                                    <select class="form-control" id="street" name="ddl_street" placeholder="Select your street">
                                    <option selected="" disabled="">Select your street
                                            <option value="r.domingo">R. Domingo</option>
                                            <option value="m.domingo">M. Domingo</option>
                                            <option value="a.cruz">A. Cruz</option>
                                            <option value="b.cruz">B. Cruz</option>
                                            <option value="oliveros">Oliveros</option>
                                        </select>   
                                </div>
                                <div class="form-group">
                                    <label for="totalhousehold">Total Household Member:<span class="text-danger">*</span></label>
                                    <input type="number" min="1" class="form-control" id="totalhousehold" name="txt_householdnum" placeholder="Enter the total household member">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Are you a person considered as PWD? <span class="text-danger">*</span></label>
                                    <select class="form-control" id="pwd" name="txt_pwd" placeholder="Are you a person considered as PWD?">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="relationtohead">Relation to Head <span class="text-danger">*</span></label>
                                    <select class="form-control" id="relationtohead" name="txt_rthead" placeholder="Enter your relation to head of the household">
                                    <option value="father">Father</option>
                                    <option value="mother">Mother</option>
                                    <option value="brother">Brother</option>
                                    <option value="sister">Sister</option>
                                    <option value="spouse">Spouse</option>
                                    <option value="relatives">Relatives</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="civilstatus">Civil Status <span class="text-danger">*</span></label>
                                    <select class="form-control" id="civilstatus" name="txt_cstatus" placeholder="Select Civil Status">
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                            <option value="widowed">Widowed</option>
                                            <option value="separated">Separated</option>
                                            <option value="divorced">Divorced</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="bloodtype">Blood Type <span class="text-danger">*</span></label>
                                    <select class="form-control" id="bloodtype" name="txt_btype" placeholder="Enter your blood type">
                                        <option value="">Select Blood Type</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="occupation">Occupation <span class="text-danger">*</span></label>
                                    <select class="form-control" id="occupation" name="txt_occp" placeholder="Enter your occupation">
                                    <option value="">Select Occupation</option>
                                            <option value="government_employee">Government Employee</option>
                                            <option value="private_employee">Private Employee</option>
                                            <option value="student">Student</option>
                                            <option value="self-employed">Self-employed</option>
                                            <option value="others">Others</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="monthlyincome">Monthly Income <span class="text-danger">*</span></label>
                                    <select class="form-control" id="monthlyincome" name="txt_income" placeholder="Enter your monthly income">
                                    <option value="">Select Monthly Income</option>
                                            <option value="10k">Php10,000 and below</option>
                                            <option value="21k">Php 21,000-Php 30,000</option>
                                            <option value="31k">Php 31,000-Php 40,000</option>
                                            <option value="41k">Php 41,000 - Php 50,000</option>
                                            <option value="51k">Php 51,000 and above</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="householdnum">Household Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="householdnum" name="txt_householdnum" placeholder="Enter your household number">
                                </div>
                                <div class="form-group">
                                    <label for="lengthofstay">Length of Stay: in Months<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" type="number" min="0" id="txt_length" name="lengthofstay" placeholder="Enter the length of stay">
                                </div>
                                <div class="form-group">
                                    <label for="religion">Religion <span class="text-danger">*</span></label>
                                    <select class="form-control" id="religion" name="txt_religion">
                                        <option value="">Select Religion</option>
                                            <option value="roman_catholic">Roman Catholic</option>
                                            <option value="iglesio">Iglesia ni Cristo</option>
                                            <option value="christian">Christian</option>
                                            <option value="saksi">Saksi ni Jehovah</option>
                                            <option value="islam">Islam</option>
                                            <option value="protestantism">Protestantism</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </select>
                                </div>
                                <div class="form-group">
                                        <label class="control-label">Nationality:</label>
                                        <input name="txt_national" class="form-control input-sm" type="text" placeholder="Nationality"/>
                                    </div>

                                <div class="form-group">
                                    <label for="gender">Sex <span class="text-danger">*</span></label>
                                    <select class="form-control" id="gender" name="ddl_gender">
                                        <option value="">Select Sex</option>
                                        <option value="MALE">Male</option>
                                        <option value="FEMALE">Female</option>
                                    </select>
                                </div>
            
                                <div class="form-group">
                                    <label for="philhealthNo">PhilHealth Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="philhealthNo" name="philhealthNo" placeholder="Enter your PhilHealth number">
                                </div>
                                <div class="form-group">
                                    <label for="highestEducationalAttainment">Highest Educational Attainment <span class="text-danger">*</span></label>
                                    <select class="form-control" id="highestEducationalAttainment" name="ddl_eattain">
                                            <option value="no_schooling">No schooling completed</option>
                                            <option value="elementary">Elementary</option>
                                            <option value="highschool-undergrad">High school, undergrad</option>
                                            <option value="highschool-graduate">High school graduate</option>
                                            <option value="college-undergrad">College, undergrad</option>
                                            <option value="vocational">Vocational</option>
                                            <option value="bachelors">Bachelor’s degree</option>
                                            <option value="masters">Master’s degree</option>
                                            <option value="doctorate">Doctorate degree</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="houseOwnershipStatus">House Ownership Status <span class="text-danger">*</span></label>
                                    <select class="form-control" id="houseOwnershipStatus" name="ddl_hos">
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
                                    <select class="form-control" id="landOwnershipStatus" name="ddl_los">
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
                                    <input type="text" class="form-control" id="waterUsage" name="txt_water" placeholder="Enter your water usage">
                                </div>
                                <div class="form-group">
                                    <label for="lightningFacilities">Lightning Facilities <span class="text-danger">*</span></label>
                                    <select class="form-control" id="lightningFacilities" name="txt_lightning" multiple></select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" id="image" name="txt_image">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="username" name="txt_uname" placeholder="Enter your username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="txt_upass" placeholder="Enter your password">
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
                            street: {
                                required: true
                            },
                            totalhousehold: {
                                required: true
                            },
                            pwd: {
                                required: true
                            },
                            civilstatus: {
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



                    Swal.fire({
                        title: 'Are you sure you want to submit?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Confirm',
                        denyButtonText: `Cancel`,
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
