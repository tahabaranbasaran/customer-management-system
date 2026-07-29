<?php

 require_once __DIR__ . "/database.php";

 if($_SERVER["REQUEST_METHOD"]=="POST"){

$username=$_POST["username"];
$password=$_POST["password"];
$passwordRepeat=$_POST["passwordRepeat"];



if($password != $passwordRepeat){
    echo "Passwords do not match!";
}else{
$sorgu=$database->prepare("SELECT * FROM admins WHERE adminUSERNAME=?");
$sorgu->execute([$username]);
$admin=$sorgu->fetch(PDO::FETCH_ASSOC);
if($admin){
    echo "This username already taken!";
}
else{
    $hash=password_hash($password, PASSWORD_DEFAULT);
    $add=$database->prepare("INSERT INTO admins SET adminUSERNAME=?,
                                                    adminPASSWORD=?");
    $addadmin=$add->execute([$username,
                            $hash
                    
    ]);   
    if($addadmin){

    header("Location: login.php");
    exit();

        }                             
}
}

 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Register Page</title>
</head>
<body class="login-page">

<div class="login-container">

<h1 class="title">Create Admin Account</h1>
    <form action="" method="post">

    Username: <br>
    <input type="text" name="username" class="login-input"
    placeholder="Enter username"><br>

    Password: <br>
    <input type="password" name="password" class="login-input"
    placeholder="Enter password"><br>

    Confirm Password:<br>
    <input type="password" name="passwordRepeat" class="login-input"
    placeholder="Confirm password"><br>
     
    <input type="submit" value="Register"  class="button register-button">

    </form>
    <p class="register-text">
    Already have an account?
    <a href="login.php">Login</a>
    </p>
    </div>
</p>
</body>
</html>