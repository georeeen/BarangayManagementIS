<?php
if(isset($_POST['btn_add'])){
    $txt_announcement = $_POST['txt_announcement'];
    $txt_about = $_POST['txt_about'];

    if(isset($_SESSION['role'])){
        $action = 'Added Announcement'.$txt_id;
        $iquery = mysqli_query($con,"INSERT INTO tblannounce (announcement, about, action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    $su = mysqli_query($con,"SELECT * from tblannounce where about = '".$txt_about."' ");
    $ct = mysqli_num_rows($su);
    
    if($ct == 0){
        $query = mysqli_query($con,"INSERT INTO tblannounce (announcement,about) 
            values ('$txt_title', '$txt_about')") or die('Error: ' . mysqli_error($con));
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        } 
    }
    else{
        $_SESSION['duplicateuser'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }   
}


if(isset($_POST['btn_save']))
{
    $txt_id = $_POST['hidden_id'];
    $txt_edit_title = $_POST['txt_edit_title'];
    $txt_edit_about = $_POST['txt_edit_about'];
    
    if(isset($_SESSION['role'])){
        $action = 'Update Successfully'.$txt_edit_title;
        $iquery = mysqli_query($con,"INSERT INTO tblannouncelogs (title,about,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    $su = mysqli_query($con,"SELECT * from tblannounce where about = '".$txt_edit_about."' ");
    $ct = mysqli_num_rows($su);
    
    if($ct == 0){
        $update_query = mysqli_query($con,"UPDATE tblannounce set name = '".$txt_edit_title."', about = '".$txt_edit_about."' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

        if($update_query == true){
            $_SESSION['edited'] = 1;
            header("location: ".$_SERVER['REQUEST_URI']);
        }
    }
    else{
        $_SESSION['duplicateuser'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    } 
}

if(isset($_POST['btn_delete']))
{
    if(isset($_POST['chk_delete']))
    {
        foreach($_POST['chk_delete'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblannounce where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}


?>