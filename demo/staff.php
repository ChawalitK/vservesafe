<?php
$table = 'datatable_demo';
 
$primaryKey = 'id';
 
$columns = array(
    array( 'db' => 'first_name', 'dt' => 0 ),
    array( 'db' => 'last_name',  'dt' => 1 ),
    array( 'db' => 'email',   'dt' => 2 )
);
 
$sql_details = array(
    'user' => 'root',
    'pass' => '!QAZxsw2#',
    'db'   => 'vservesafe',
    'host' => 'localhost'
);
 
require('ssp.class.php' );
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>