<!DOCTYPE html>
<html>
<?php
session_start();
?>
    <head>
        <meta charset="UTF-8">
        <title>Barangay Tangos North</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    <style>
    body {
    background-color: #DFF0D8;
    }
    h3 {
    color: black;
      }
    </style>
    <body class="skin-black">
    <br>
    <br>
    <br>
    <h3> <center> <i>Hello Navoteño!</b>  </h3> 
        <div class="container" style="margin-top:70px; margin-bottom: 140px">
          <div class="col-sm-8 col-md-8 col-md-offset-2">
              <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center;">
                <img src="../../img/logo.png" style="height:150px;"/>
              <h3 class="panel-title">
                <strong>
                    Barangay Tangos North
                </strong>
              </h3>
            </div>
            <div class="panel-body">
              <form role="form" method="post">
                <div class="form-group">
                  <label for="txt_username">Username</label>
                  <input type="text" class="form-control" style="border-radius:0px" name="txt_username" placeholder="Enter Username">
                </div>
                <div class="form-group">
                  <label for="txt_password">Password</label>
                  <input type="password" class="form-control" style="border-radius:0px" name="txt_password" placeholder="Enter Password">
                </div>
                <button type="submit" class="btn btn-sm btn-primary pull-left" name="btn_login">Log in</button>
                <label id="error" class="label label-danger" ></label> 
                <a href="/pages/resident/signup.php" class="btn btn-sm btn-primary pull-right">Sign Up</a>
                <label id="error" class="label label-danger"></label> 
              </form>
            </div>
          </div>
          </div>
        </div>

      <?php
        include "../connection.php";
        if(isset($_POST['btn_login']))
        { 
            $username = $_POST['txt_username'];
            $password = $_POST['txt_password'];



            $user = mysqli_query($con, "SELECT * from tblresident where username = '$username' and password = '$password' ");
            $numrow_user = mysqli_num_rows($user);

            if($numrow_user > 0)
            {
                while($row = mysqli_fetch_array($user)){
                  $_SESSION['role'] = $row['fname'];
                  $_SESSION['resident'] = 1;
                  $_SESSION['userid'] = $row['id'];
                  $_SESSION['username'] = $row['username'];
                }    
                header ('location: ../dashboardresi/dashboardresi.php');
            }
            else
            {
              echo '<script type="text/javascript">document.getElementById("error").innerHTML = "Invalid Account";</script>';
               
            }
             
        }
        
      ?>

    </body>
</html>