<?php
include("../config.php");
// session_start();
// $user_id = $_SESSION['userid'];
if (!empty($_POST)) {
    $output = '';
    $message = '';
    $city_name = mysqli_real_escape_string($db, $_POST["city_name"]);
    $state_id = mysqli_real_escape_string($db, $_POST["state_id"]);

    // $status = mysqli_real_escape_string($db, $_POST["status"]);
    // echo $fname;
    if ($_POST["employee_id"] != '') {
        $query = "UPDATE ss_setup_city  SET city_name='$city_name',state_id='$state_id',
           modified_at=CURRENT_TIMESTAMP()
           WHERE city_id='" . $_POST["employee_id"] . "'";
        $message = 'Data Updated  ';
        if (mysqli_query($db, $query)) {
            $output .= '200';
            //    $output .= $message;  

        } else {
            $output .= '424';
        }
    } else {
        $query = "  
           INSERT INTO `ss_setup_city`(`city_name`,`state_id`,`is_active`,`created_at`) Value ('$city_name','$state_id',1,CURRENT_TIMESTAMP()) ";
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
