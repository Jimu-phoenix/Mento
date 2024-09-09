<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "mento_db";
    
    try{
    $connection = mysqli_connect($db_server, $db_user, $db_password, $db_name);  
    if($connection){
        echo "Connection Successful";
        }              
    }
    catch(mysqli_sql_exception){
        echo "Connection Failed";
    }
   
?>