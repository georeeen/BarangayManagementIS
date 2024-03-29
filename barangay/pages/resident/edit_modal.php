<?php echo '<div id="editModal'.$row['id'].'" class="modal fade">

<form class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Resident Information</h4>
        </div>
        <div class="modal-body">';

        $edit_query = mysqli_query($con,"SELECT * from tblresident where id = '".$row['id']."' ");
        $erow = mysqli_fetch_array($edit_query);

        echo '
            <div class="row">
                <div class="container-fluid">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">

                        <input type="hidden" value="'.$erow['id'].'" name="hidden_id" id="hidden_id"/>
                            <label class="control-label">Name:</label><br>
                            <div class="col-sm-4">
                                <input name="txt_edit_lname" class="form-control input-sm" type="text" value="'.$erow['lname'].'"/>
                            </div> 
                            <div class="col-sm-4">
                                <input name="txt_edit_fname" class="form-control input-sm" type="text" value="'.$erow['fname'].'"/>
                            </div> 
                            <div class="col-sm-4">
                                <input name="txt_edit_mname" class="form-control input-sm" type="text" value="'.$erow['mname'].'"/>
                            </div> <br>
                        </div>

                        <div class="form-group">
                            <label class="control-label" style="margin-top:10px;">Birthdate:</label>
                            <input name="txt_edit_bdate" class="form-control input-sm" type="date" value="'.$erow['bdate'].'"/> 
                        </div>

                        <div class="form-group">
                            <label class="control-label">Age:</label>
                            <input name="txt_edit_age" class="form-control input-sm input-size" type="text" value="'.$erow['age'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Phone Number:</label>
                            <input name="txt_edit_phonenum" class="form-control input-sm input-size" type="text" value="'.$erow['phonenum'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Household #:</label>
                            <input name="txt_edit_householdnum" class="form-control input-sm input-size" type="text" min="1"'.$erow['householdnum'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Barangay:</label>
                            <input name="txt_edit_brgy" class="form-control input-sm input-size" type="text" value="'.$erow['barangay'].'"/>
                        </div>

                        <div class="form-group">
                                        <label class="control-label">Are you a person considered as PWD?</label>
                                        <select name="ddl_pwd" class="form-control input-sm input-size" <option selected>'.$erow['pwd'].'</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>

                        <div class="form-group">
                            <label class="control-label">Blood Type:</label>
                            <select name="txt_edit_btype" class="form-control input-sm input-size" <option selected>'.$erow['bloodtype'].'</option>
                                            <option>AB-</option>
                                            <option>AB+</option>
                                            <option>A+</option>
                                            <option>A-</option>
                                            <option>B+</option>
                                            <option>B-</option>
                                            <option>O+</option>
                                            <option>O-</option>
                                        </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Civil Status:</label>
                            <select name="txt_edit_cstatus" class="form-control input-sm input-size" <option selected>'.$erow['civilstatus'].'</option>
                                            <option>Single</option>
                                            <option>Married</option>
                                            <option>Widowed</option>
                                            <option>Separated</option>
                                            <option>Divorced</option>
                                    </select>

                        </div>

                        <div class="form-group">
                            <label class="control-label">Length of Stay: (in Months)</label>
                            <input name="txt_edit_length" class="form-control input-sm" type="number" min="1" value="'.$erow['lengthofstay'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nationality:</label>
                            <input name="txt_edit_national" class="form-control input-sm" type="text" value="'.$erow['nationality'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Educational Attainment:</label>
                            <select name="ddl_edit_eattain" class="form-control input-sm">
                                <option selected>'.$erow['highestEducationalAttainment'].'</option>
                                <option>No schooling completed</option>
                                <option>Elementary</option>
                                <option>High school, undergrad</option>
                                <option>High school graduate</option>
                                <option>College, undergrad</option>
                                <option>Vocational</option>
                                <option>Bachelor’s degree</option>
                                <option>Master’s degree</option>
                                <option>Doctorate degree</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Land Ownership Status:</label>
                            <select name="ddl_edit_los" class="form-control input-sm">
                                <option value="'.$erow['landOwnershipStatus'].'">'.$erow['landOwnershipStatus'].'</option>
                                <option>Freehold</option>
                                <option>Commonhold</option>
                                <option>Joint Tenancy</option>
                                <option>Tenancy in Common</option>
                                <option>Community Land Trust</option>
                                <option>Indigenous</option>
                                <option>Government</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Image:</label>
                            <input name="txt_edit_image" class="form-control input-sm" type="file" />
                        </div>

                        <div class="form-group">
                            <label class="control-label">Username:</label>
                            <input name="txt_edit_uname" class="form-control input-sm" type="text" value="'.$erow['username'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Password:</label>
                            <input name="txt_edit_upass" class="form-control input-sm" type="password" value="'.$erow['password'].'"/>
                        </div>

                    </div>


                    <div class="col-md-6 col-sm-12">


                        <div class="form-group">
                            <label class="control-label">Sex:</label>
                            <select name="ddl_edit_gender" class="form-control input-sm">
                                <option value="'.$erow['gender'].'" selected="">'.$erow['gender'].'</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Birthplace:</label>
                            <input name="txt_edit_bplace" class="form-control input-sm" type="text" value="'.$erow['bplace'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Email:</label>
                            <input name="txt_edit_email" class="form-control input-sm" type="text" value="'.$erow['email'].'"/>
                         </div> 

                         <div class="form-group">
                            <label class="control-label">Street:</label>
                            <select name="ddl_edit_street" class="form-control input-sm">
                            <option value="'.$erow['street'].'" selected="">'.$erow['street'].'</option>
                                <option>R. Domingo</option>
                                <option>M. Domingo</option>
                                <option>A. Cruz</option>
                                <option>B. Cruz</option>
                                <option>Oliveros</option>
                            </select>
                         </div> 
                        
                        <div class="form-group">
                            <label class="control-label">Total Household Member:</label>
                            <input name="txt_edit_householdmem" class="form-control input-sm" type="number" min="1" value="'.$erow['totalhousehold'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Relationship to Head:</label>
                            <select name="txt_edit_rthead" class="form-control input-sm" <option selected>'.$erow['relationtohead'].'</option>
                                            5<option>Father</option>
                                            <option>Mother</option>
                                            <option>Brother</option>
                                            <option>Sister</option>
                                            <option>Spouse</option>
                                            <option>Relatives</option>
                                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Occupation:</label>
                            <select name="txt_edit_occp" class="form-control input-sm" <option selected>'.$erow['occupation'].'</option>
                                            <option>Government Employee</option>
                                            <option>Private Employee</option>
                                            <option>Student</option>
                                            <option>Self-employed</option>
                                            <option>Others</option>
                                        </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Monthly Income:</label>
                            <select name="txt_edit_income" class="form-control input-sm" <option selected>'.$erow['monthlyincome'].'</option>
                                         <option>Php10,000 and below</option>
                                            <option>Php 21,000-Php 30,000</option>
                                            <option>Php 31,000-Php 40,000</option>
                                            <option>Php 41,000 - Php 50,000</option>
                                            <option>Php 51,000 and above</option>
                                        </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Religion:</label>
                            <select name="txt_edit_religion" class="form-control input-sm" <option selected>'.$erow['religion'].'</option>
                                            <option>Roman Catholic</option>
                                            <option>Iglesia ni Cristo</option>
                                            <option>Christian</option>
                                            <option>Saksi ni Jehovah</option>
                                            <option>Islam</option>
                                            <option>Protestantism</option>
                                            <option>Others</option>
                                        </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">House Ownership Status:</label>
                            <select name="ddl_edit_hos" class="form-control input-sm">
                                <option value="'.$erow['houseOwnershipStatus'].'" selected>'.$erow['houseOwnershipStatus'].'</option>
                                <option value="Own Home">Own Home</option>
                                <option value="Rent">Rent</option>
                                <option value="Live with Parents/Relatives">Live with Parents/Relatives</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Water Usage:</label>
                        	<select name="txt_edit_water" class="form-control input-sm input-size">
                                <option>'.$erow['waterUsage'].'</option>
                                <option>Faucet</option>
                                <option>Deep Well</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Lightning Facilities:</label>
                        	<select name="txt_edit_lightning" class="form-control input-sm input-size">
                                <option>'.$erow['lightningFacilities'].'</option>
                                <option>Electric</option>
                                <option>Lamp</option>
                            </select>
                        </div>

                    </div>

                    </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>