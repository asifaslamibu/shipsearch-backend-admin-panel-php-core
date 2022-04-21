   <?php
    include("../config.php");


    $mode = mysqli_real_escape_string($db, $_POST['mode']);
    echo $mode;
    $productid = mysqli_real_escape_string($db, $_POST['id']);
    if ($mode == 'true') //mode simple is true when button is Open 
    {
        $str = $db->query("UPDATE `ss_setup_port` SET `is_active`='1' where port_id=$productid");
        $success = 'On';
        echo json_encode(array('response_result' => $response_result, '$success' => $success));
    } else if ($mode == 'false') {
        $str = $db->query("UPDATE `ss_setup_port` SET `is_active`='0' where port_id=$productid");
        $response_result = 'Hey my button is closed!!';
        $success = 'Off';
        echo json_encode(array('response_result' => $response_result, 'success' => $success));
    }
    ?>