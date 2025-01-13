<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'test-y';


    try{
    $connection = mysqli_connect($host, $user, $password, $database);
    }catch(mysqli_sql_exception){
        echo "Connection failed: " . mysqli_connect_error();
    }

    if($connection){
        echo "Connected to database";
    }


?>