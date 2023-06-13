<!-- ========================= MODAL ======================= -->
            <div id="addCourseModal" class="modal fade">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Manage Residents</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="container-fluid">
                                <div class="col-md-6 col-sm-12">

                                    <div class="form-group">
                                        <label class="control-label" >Name:</label><br>
                                        <div class="col-sm-4">
                                            <input name="txt_lname" class="form-control input-sm" type="text" placeholder="Lastname"/>
                                        </div>
                                        <div class="col-sm-4">
                                            <input name="txt_fname" class="form-control input-sm col-sm-4" type="text" placeholder="Firstname"/>
                                        </div>
                                        <div class="col-sm-4">
                                            <input name="txt_mname" class="form-control input-sm col-sm-4" type="text" placeholder="Middlename"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Birthdate:</label>
                                        <input name="txt_bdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate"/>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Age:</label>
                                        <input name="txt_age" class="form-control input-sm input-size" type="number" placeholder="Age"/>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Phone Number:</label>
                                        <input name="txt_phonenum" class="form-control input-sm input-size" type="text" placeholder="Phone Number"/>
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label">Household #:</label>
                                        <input name="txt_householdnum" class="form-control input-sm input-size" type="number" min="1" placeholder="Household #"/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label">Barangay:</label>
                                        <input name="txt_brgy" class="form-control input-sm input-size" type="text" placeholder="Barangay"/>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Are you a person considered as PWD?</label>
                                        <select name="txt_pwd" class="form-control input-sm input-size" placeholder="Are you a person considered as PWD?">
                                        <option selected="" disabled="">Please Select:
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Blood Type:</label>
                                        <select name="txt_btype" class="form-control input-sm input-size" placeholder="Blood Type">
                                        <option selected="" disabled="">Select Blood Type:
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
                                        <select name="txt_cstatus" class="form-control input-sm input-size" placeholder="Civil Status">
                                            <<option selected="" disabled="">Civil Status:
                                            <option>Single</option>
                                            <option>Married</option>
                                            <option>Widowed</option>
                                            <option>Separated</option>
                                            <option>Divorced</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Length of Stay: (in Months)</label><br>
                                        <input name="txt_length" class="form-control input-sm input-size" type="number" min="0" placeholder="Length of Stay"/>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Religion:</label>
                                        <select name="txt_religion" class="form-control input-sm input-size" placeholder="Religion">
                                        <option selected="" disabled="">Select Religion:
                                            <option>Roman Catholic</option>
                                            <option>Iglesia ni Cristo</option>
                                            <option>Christian</option>
                                            <option>Saksi ni Jehovah</option>
                                            <option>Islam</option>
                                            <option>Protestantism</option>
                                            <option>Others</option>
                                        </select>
                                        
                                    </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Educational Attainment:</label>
                                        <select name="ddl_eattain" class="form-control input-sm input-size">
                                        <option selected="" disabled="">Select Educational Attainment:
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
                                        <select name="ddl_los" class="form-control input-sm input-size">
                                        <option selected="" disabled="">Select Land Ownership Status:
                                            <option>Freehold</option>
                                            <option>Leasehold</option>
                                            <option>Commonhold</option>
                                            <option>Joint Tenancy</option>
                                            <option>Tenancy in Common</option>
                                            <option>Community Land Trust</option>
                                            <option>Indigenous</option>
                                            <option>Government</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">House Ownership Status:</label>
                                        <select name="ddl_hos" class="form-control input-sm input-size">
                                        <option selected="" disabled=""> Select House Ownership Status:
                                            <option>Owned</option>
                                            <option>Rented</option>
                                            <option>Mortgaged</option>
                                            <option>Leased</option>
                                            <option>Co-owned</option>
                                            <option>Inherited</option>
                                            <option>Govenrment-owned</option>
                                            <option>Occupied without ownership</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Image:</label>
                                        <input name="txt_image" class="form-control input-sm" type="file" />
                                    </div> 


                                    <div class="form-group">
                                        <label class="control-label">Username:</label>
                                        <input name="txt_uname" id="username" class="form-control input-sm input-size" type="text" placeholder="Username"/>
                                        <label id="user_msg" style="color:#CC0000;" ></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Password:</label>
                                        <input name="txt_upass" class="form-control input-sm" type="password" placeholder="Password"/>
                                    </div>

                            </div>

                                <div class="col-md-6 col-sm-12">
                                    

                                    <div class="form-group">     
                                        <label class="control-label">Sex:</label>
                                        <select name="ddl_gender" class="form-control input-sm">
                                            <option selected="" disabled="">Select Sex</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Birthplace:</label>
                                        <input name="txt_bplace" class="form-control input-sm" type="text" placeholder="Birthplace"/>
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label">Email:</label>
                                        <input name="txt_email" class="form-control input-sm" type="text" placeholder="Email"/>
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label">Street:</label>
                                        <select name="txt_street" class="form-control input-sm" type="text" placeholder="Street">
                                        <option selected="" disabled="">Select Street</option>
                                            <option>R. Domingo</option>
                                            <option>M. Domingo</option>
                                            <option>A. Cruz</option>
                                            <option>B. Cruz</option>
                                            <option>Oliveros</option>
                                        </select>   
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label">Total Household Member:</label>
                                        <input name="txt_householdnum" class="form-control input-sm" type="number" min="1" placeholder="Total Household Member"/>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Relationship to Head:</label>
                                        <select name="txt_rthead" class="form-control input-sm" type="text" placeholder="Relationship to Head">
                                        <option selected="" disabled="">Select Your Relationship to Head</option>
                                            <option>Father</option>
                                            <option>Mother</option>
                                            <option>Brother</option>
                                            <option>Sister</option>
                                            <option>Spouse</option>
                                            <option>Relatives</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Occupation:</label>
                                        <select name="txt_occp" class="form-control input-sm" type="text" placeholder="Occupation">
                                        <option selected="" disabled="">Select Your Occupation</option>
                                            <option>Government Employee</option>
                                            <option>Private Employee</option>
                                            <option>Student</option>
                                            <option>Self-employed</option>
                                            <option>Others</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Monthly Income:</label>
                                        <select name="txt_income" class="form-control input-sm" type="text" placeholder="Monthly Income">
                                        <option selected="" disabled=""> Select Monthly Income:
                                            <option>Php10,000 and below</option>
                                            <option>Php 21,000-Php 30,000</option>
                                            <option>Php 31,000-Php 40,000</option>
                                            <option>Php 41,000 - Php 50,000</option>
                                            <option>Php 51,000 and above</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Nationality:</label>
                                        <input name="txt_national" class="form-control input-sm" type="text" placeholder="Nationality"/>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Lightning Facilities:</label>
                                        <select name="txt_lightning" class="form-control input-sm input-size">
                                            <option>Electric</option>
                                            <option>Lamp</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label">Water Usage:</label>
                                        <select name="txt_water" class="form-control input-sm input-size">
                                            <option>Faucet</option>
                                            <option>Deep Well</option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_add" id="btn_add" value="Add Resident"/>
                    </div>
                </div>
              </div>
              </form>
            </div>

<script type="text/javascript">
    $(document).ready(function() {
 
        var timeOut = null; // this used for hold few seconds to made ajax request
 
        var loading_html = '<img src="../../img/ajax-loader.gif" style="height: 20px; width: 20px;"/>'; // just an loading image or we can put any texts here
 
        //when button is clicked
        $('#username').keyup(function(e){
 
            // when press the following key we need not to make any ajax request, you can customize it with your own way
            switch(e.keyCode)
            {
                //case 8:   //backspace
                case 9:     //tab
                case 13:    //enter
                case 16:    //shift
                case 17:    //ctrl
                case 18:    //alt
                case 19:    //pause/break
                case 20:    //caps lock
                case 27:    //escape
                case 33:    //page up
                case 34:    //page down
                case 35:    //end
                case 36:    //home
                case 37:    //left arrow
                case 38:    //up arrow
                case 39:    //right arrow
                case 40:    //down arrow
                case 45:    //insert
                //case 46:  //delete
                    return;
            }
            if (timeOut != null)
                clearTimeout(timeOut);
            timeOut = setTimeout(is_available, 500);  // delay delay ajax request for 1000 milliseconds
            $('#user_msg').html(loading_html); // adding the loading text or image
        });
  });
function is_available(){
    //get the username
    var username = $('#username').val();
 
    //make the ajax request to check is username available or not
    $.post("check_username.php", { username: username },
    function(result)
    {
        console.log(result);
        if(result != 0)
        {
            $('#user_msg').html('Not Available');
            document.getElementById("btn_add").disabled = true;
        }
        else
        {
            $('#user_msg').html('<span style="color:#006600;">Available</span>');
            document.getElementById("btn_add").disabled = false;
        }
    });
 
}
</script>