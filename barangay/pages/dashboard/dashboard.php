<!DOCTYPE html>
<html>

    <?php
    session_start();
    if(!isset($_SESSION['role']))
    {
        header("Location: ../../login.php"); 
    }
    else
    {
    ob_start();
    include('../head_css.php'); ?>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php 
        
        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('../sidebar-left.php'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                
                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../household/household.php"><span class="info-box-icon bg-green"><i class="fa fa-home"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">No. of Household</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblhousehold");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../resident/resident.php"><span class="info-box-icon bg-green"><i class="fa fa-users"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">No. of Residents</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblresident");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../clearance/clearance.php"><span class="info-box-icon bg-green"><i class="fa fa-file"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Clearance Requests</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblclearance where status = 'Approved' ");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../permit/permit.php"><span class="info-box-icon bg-green"><i class="fa fa-file"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Permit Requests</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblpermit where status = 'Approved' ");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../blotter/blotter.php"><span class="info-box-icon bg-green"><i class="fa fa-user"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Blotter Requests</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblblotter");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>
                                
                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../activity/activity.php"><span class="info-box-icon bg-green"><i class="fa fa-users"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Activity Logs</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblactivity");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../report/report.php"><span class="info-box-icon bg-green"><i class="fa fa-users"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Reports</span>
                                      <span class="info-box-number">
                                        <?php
                          
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>   
                            </div><!-- /.box -->
                    </div>   <!-- /.row -->
                                    <div class="col-md-4 col-sm-5 col-xs-5">                     
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                               Gender Pie Chart
                                            </div>
                                            <div class="panel-body">
                                                <div id="morris-donut-chart"></div>
                                            </div>
                                          <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>
                                    <div class="col-md-5 col-sm-8 col-xs-8">                     
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                               Registered Resident per Street
                                            </div>
                                            <div class="panel-body">
                                                <div id="morris-donut-chart1"></div>
                                            </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- jQuery 2.0.2 -->
        <?php }
         include "../footer.php";
         include "donut-chart.php";
         include "donut-chart1.php";
        ?>
    </body>
</html>