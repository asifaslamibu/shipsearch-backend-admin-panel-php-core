<?php
include("../config.php");
// session_start();
// $user_id = $_SESSION['userid'];
if (!empty($_POST)) {
    $output = '';
    $message = '';
    $email = mysqli_real_escape_string($db, $_POST["email"]);
    $password = mysqli_real_escape_string($db, md5($_POST["password"]));
    $fname = mysqli_real_escape_string($db, $_POST["fname"]);
    $lname = mysqli_real_escape_string($db, $_POST["lname"]);
    $dob = mysqli_real_escape_string($db, $_POST["dob"]);
    $address = mysqli_real_escape_string($db, $_POST["address"]);
    $cname = mysqli_real_escape_string($db, $_POST["cname"]);
    // $status = mysqli_real_escape_string($db, $_POST["status"]);
    // echo $fname;
    if ($_POST["employee_id"] != '') {
        $query = "UPDATE ss_user   
           SET email='$email',
           first_name='$fname',
           last_name='$lname',
           date_of_birth='$dob',
           permanent_address='$address',
           company_name='$cname',
           modified_at=CURRENT_TIMESTAMP()
           WHERE user_id='" . $_POST["employee_id"] . "'";
        $message = 'Data Updated  ';
        if (mysqli_query($db, $query)) {
            $output .= '200';
            //    $output .= $message;  

        } else {
            $output .= '424';
        }
    } else {
        $query = "  
           INSERT INTO `ss_user`(`email`,`password`,`first_name`,`last_name`,`date_of_birth`,`permanent_address`,`company_name`,`is_active`,`created_at`) Value ('$email','$password','$fname','$lname','$dob','$address','$cname',1,CURRENT_TIMESTAMP()) ";
        if (mysqli_query($db, $query)) {
            $output .= '200';
            //    $output .= $message;  

        } else {
            $output .= '424';
        }
        // if ($_POST["employee_id"] != '') {
        //     $query = "  
        //        UPDATE ss_user   
        //        SET first_name='$cname'
        //        WHERE id='" . $_POST["employee_id"] . "'";
        //     $message = 'Data Updated  ';
        // } else {



        //     $message = 'Data Inserted';
        // }
        // if (mysqli_query($db, $query)) {
        //     $output .= '<div class="alert alert-light-warning border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>' . $message . ' !</strong></div>';
        //     //    $output .= $message;  

        // } else {
        //     $output .= 'Error' . $query;
    }
    echo $output;
}
