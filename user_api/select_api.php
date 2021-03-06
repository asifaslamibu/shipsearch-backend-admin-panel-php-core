<?php
// Database connection info 
$dbDetails = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db'   => 'eqannet_shipsearch'
);

// DB table to use 
$table = 'ss_user';

// Table's primary key 
$primaryKey = 'user_id';

// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array(
    array('db' => 'first_name', 'dt' => 0),
    array('db' => 'last_name',  'dt' => 1),
    array('db' => 'email',      'dt' => 2), 
    array(
        'db'        => 'created',
        'dt'        => 5,
        'formatter' => function ($d, $row) {
            return date('jS M Y', strtotime($d));
        }
    ),
    array(
        'db'        => 'status',
        'dt'        => 6,
        'formatter' => function ($d, $row) {
            return ($d == 1) ? 'Active' : 'Inactive';
        }
    )
);

// Include SQL query processing class 
require 'ssp.class.php'; 
