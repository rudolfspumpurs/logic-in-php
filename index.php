<?php

include 'vendor/autoload.php';

ORM::configure('mysql:host=localhost;dbname=logic_in_php');
ORM::configure('username', 'root');
ORM::configure('password', '');



$time_start = microtime(true);

$result = ORM::for_table('complicated_table')
    ->select('name')
    ->whereRaw('created > NOW() and is_set = 1')
    ->find_array();

$time_end = microtime(true);

$resultTimeSqlLogic = $time_end - $time_start;

//---------------------------------------------------------------------------

$time_start = microtime(true);

$rows = ORM::for_table('complicated_table')
    ->selectMany(['name', 'is_set'])
    ->whereRaw('created > NOW()')
    ->find_array();

$result2 = [];
foreach($rows as $row) {
    if ($row['is_set'] == 1) $result2[] = $row;
}

$time_end = microtime(true);

$resultTimePhpLogic = $time_end - $time_start;

echo 'Execution time (SQL) : '.$resultTimeSqlLogic.' seconds' . "\n";
echo 'Execution time (PHP) : '.$resultTimePhpLogic.' seconds' . "\n";
