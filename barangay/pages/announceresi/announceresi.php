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
                    Announcement </h1>
                    
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
        $squery = mysqli_query($con, "SELECT *,CONCAT(lname, ', ', fname, ' ', mname) as cname FROM tblresident");
        while($row = mysqli_fetch_array($squery))
        {
            echo '
            <tr>
                <td>'.$row['cname'].'</td>
                <td>'.$row['barangay'].'</td>
                <td><button class="btn btn-primary btn-sm" data-target="#detailsModal'.$row['id'].'" data-toggle="modal"><i class="fa fa-search" aria-hidden="true"></i> Details</button></td>
            </tr>
            ';
            include "detailsModal.php";
        }
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
<script src="../js/AdminLTE/app.js" type="text/javascript"></script>

<script type="text/javascript">
  $(function() {
      $("#table").dataTable({
         "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,5 ] } ],"aaSorting": [],
         "dom":' <"search"f><"top"l>rt<"bottom"ip><"clear">'
      });
  });

  $(document).ready(function () {             
  $('.dataTables_filterinput[type="search"]').css(
     {'width':'350px','display':'inline-block'}
  );
});
</script>


</html>