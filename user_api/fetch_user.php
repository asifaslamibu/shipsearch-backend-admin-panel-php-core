<?php
//fetch.php  
include("../config.php");

if (isset($_POST["employee_id"])) {
    $query = "SELECT * FROM ss_user where user_id='" . $_POST["employee_id"] . "' ";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
    