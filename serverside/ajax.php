<?php
header('Content-Type: application/json; charset=utf-8');
// Include SQL query processing class 
require 'ssp.php';



if ($_GET['mode'] == 'binlerce') {
    $dbDetails = array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db'   => 'buyukveri'
    );
    $table = "veriler";

    // DB table to use 


    // Table's primary key 
    $primaryKey = 'ID';

    // Array of database columns which should be read and sent back to DataTables. 
    // The `db` parameter represents the column name in the database.  
    // The `dt` parameter represents the DataTables column identifier. 
    $columns = array(
        array('db' => 'ID', 'dt' => 0),
        array('db' => 'ad', 'dt' => 1),
        array('db' => 'soyad',  'dt' => 2),
        array('db' => 'mail',      'dt' => 3 , "formatter" =>function($mail){
            return "<a href= 'mailto:{$mail}'> {$mail} </a>";
        }),
        array('db' => 'yas',     'dt' => 4),
        array('db' => 'okul',    'dt' => 5),
        array('db' => 'ID',  'dt' => 6,'formatter' => function($data){
            return "<a href = 'duzenle.php?id={$data}' class = 'btn btn-primary'>Düzenle </a>";
        }),
        array('db' => 'ID',  'dt' => 7,'formatter' => function($d){
            return "<a href = 'sil?id={$d}' class = 'btn btn-danger'>Sil </a>";
        })
        
    );


    // Output data as json format 
    echo json_encode(
        SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
    );

} 
