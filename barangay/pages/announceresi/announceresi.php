<!DOCTYPE html>
<html>

    <?php
    session_start();
    if(!isset($_SESSION['role']))
    {
        header("Location: ../../login.php"); 
    }
    else
    
    ob_start();
    include('../head_css.php'); ?>
    <body class="skin-black">
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
                    Announcements </h1>
                    
                </section>

                <!-- Main content -->
                <div class="wrapper row-offcanvas row-offcanvas-left">
<div class="container-fluid">
<table id="table" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>About</th>
            <th style="width: 5% !important;">Details</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../pages/connection.php";
        $squery = mysqli_query($con, "SELECT *,CONCAT(announcement, ', ', about, ' ',details) as home FROM tblannounce");
        while($row = mysqli_fetch_array($squery))
        {
            echo '
            <tr>
                <td style="width:70px;"><image src="../pages/resident/image/'.basename($row['image']).'" style="width:60px;height:60px;"/></td>
                <td>'.$row['announcement'].'</td>
                <td><button class="btn btn-primary btn-sm" data-target="#detailsModal'.$row['announcement'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Details</button></td>
            </tr>
            ';
            include "detailsModal.php";
        }
        ;
        ?>
    </tbody>
</table>

</div>
</div>

</body>


<script src="../js/alert.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>


<script src="../js/morris/raphael-2.1.0.min.js" type="text/javascript"></script>
<script src="../js/morris/morris.js" type="text/javascript"></script>
<script src="../js/select2.full.js" type="text/javascript"></script>

<script src="../js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="../js/buttons.print.min.js" type="text/javascript"></script>

<script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="../js/AdminLTE/app.js" type="text/javascript"></script></script>


</html>