<?php

session_start();
    include("conn.php");
    if(isset($_POST['sign-in'])){
        $b_name = $_POST['bname'];
        $email = $_POST['email'];
        $phn = $_POST['phn'];
        $city = $_POST['city'];
        $area = $_POST['area'];
        $pass = $_POST['pass'];

        $sql= "INSERT INTO  business (bname, email,	pnumber, city, area, passw) VALUES ('$b_name', '$email', '$phn', '$city', '$area', '$pass')";
        
        try{
            $result = mysqli_query($connection, $sql);
            if($result){
                header("location: mento-login.html");
                echo "WORKED!";
            }    
        }
        catch(mysqli_sql_exception){
            echo "An Unexpected Error Occurred";
        }
        mysqli_close($connection);
    }


?>