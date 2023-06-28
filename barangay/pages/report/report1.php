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
    }
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
                        Reports
                    </h1>
                </section>
                <hr>
                
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" name="filter_value" class="form-control" placeholder="Search/Filter Record">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" name="filter_btn" class="btn btn-primary">Filter Data</button>
                                <form class="form-inline" method="post" action="export.php">
                                </form>
                            </div>
                        </div>
                        <button onclick="window.print()">Print Calendar</button>
                    </form>
                <br>
                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th scope="col">Last Name</th>
                                                <th scope="col">First Name</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">Sex</th>
                                                <th scope="col">Street</th>
                                                <th scope="col">Blood Type</th>
                                                <th scope="col">Relationship To Head</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(isset($_POST['filter_btn']))
                                        {
                                            $value_filter = $_POST['filter_value'];
                            

                                                if(!isset($_SESSION['staff']))
                                                {
                                                    $squery = mysqli_query($con, "SELECT * FROM tblresident WHERE CONCAT(id, lname, fname, age, mname, bdate, bplace, barangay, totalhousehold, relationtohead, bloodtype, civilstatus, occupation, monthlyincome, householdnum, lengthofstay, religion, gender, highestEducationalAttainment, houseOwnershipStatus, landOwnershipStatus, dwellingtype, waterUsage, lightningFacilities, street, pwd) LIKE '%$value_filter%' ");
                                                    while($row = mysqli_fetch_array($squery))
                                                    {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['id'];?></td>
                                                            <td><?php echo $row['lname'];?></td>
                                                            <td><?php echo $row['fname'];?></td>
                                                            <td><?php echo $row['age'];?></td>
                                                            <td><?php echo $row['gender'];?></td>
                                                            <td><?php echo $row['street'];?></td>
                                                            <td><?php echo $row['bloodtype'];?></td>
                                                            <td><?php echo $row['relationtohead'];?></td>
                                                            <td><?php echo $row['pwd'];?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }

                                        }
                                            else
                                            {
                                                ?>
                                                <tr>
                                                    <td>No Record Found!</td>
                                                </tr>
                                                <?php
                                            }
                                    
                                        ?>

</body>
</html>
