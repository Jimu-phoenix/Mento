<?php

include("conn.php");
if(isset($_POST['username']) && isset($_POST['passw'])){
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

   

}


$username = validate($_POST['username']);
$passw = validate($_POST['passw']);

if(empty($username)){
    header ("Location: mento-login.html?error= User Name is required");
    exit();
}
else if(empty($passw)){
    header ("Location: mento-login.html?error= Password is required");
    exit();
}

$sql = "SELECT * FROM business WHERE bname = '$username' AND passw = '$passw'";
$result = mysqli_query($connection, $sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['bname'] === $username && $row['passw'] === $passw){
        echo "Logged In!";
        $_SESSION['bname'] = $row['bname'];
        $_SESSION['passw'] = $row['passw'];
        $_SESSION['id'] = $row['id'];
        header("Location: mgt.html");
        exit();
    }
    else{
        header("Location: mento-login.html?error=Incorrect Username or Password");
        exit();
    }
}
else{
    echo "Incorrect Username Or Password";
    header("Location: mento-login.html");
    exit();
}

?>