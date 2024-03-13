<?php
$table = 'shecup_fsms_audit';
 
$primaryKey = 'id';
 
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'created', 'dt' => 1 ),
    array( 'db' => 'audit_type', 'dt' => 2 ),
    array( 'db' => 'name_audit',  'dt' => 3 ),
    array( 'db' => 'total_score',   'dt' => 4 ),
    array( 'db' => 'total_point',   'dt' => 5 ),
    array( 'db' => 'total_answer',   'dt' => 6 ),
    array( 'db' => 'total_na',   'dt' => 7 )
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