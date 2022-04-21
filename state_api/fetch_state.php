<?php
//fetch.php  
include("../config.php");

if (isset($_POST["employee_id"])) {
    $query = "SELECT * FROM ss_setup_state where state_id='" . $_POST["employee_id"] . "' ";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
