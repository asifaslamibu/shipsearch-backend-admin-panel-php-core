<?php
include("../config.php");
// session_start();
// $user_id = $_SESSION['userid'];
if (!empty($_POST)) {
    $output = '';
    $message = '';
    $country = mysqli_real_escape_string($db, $_POST["country"]);
    $ports = mysqli_real_escape_string($db, $_POST["ports"]);

    // $status = mysqli_real_escape_string($db, $_POST["status"]);
    // echo $fname;
    if ($_POST["employee_id"] != '') {
        $query = "UPDATE ss_setup_country   
           SET country_name='$country',no_of_ports='$ports',
           modified_at=CURRENT_TIMESTAMP()
           WHERE country_id='" . $_POST["employee_id"] . "'";
        $message = 'Data Updated  ';
        if (mysqli_query($db, $query)) {
            $output .= '200';
            //    $output .= $message;  

        } else {
            $output .= '424';
        }
    } else {
        $query = "  
           INSERT INTO `ss_setup_country`(`country_name`,`no_of_ports`,`created_at`) Value ('$country','$ports',CURRENT_TIMESTAMP()) ";
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
