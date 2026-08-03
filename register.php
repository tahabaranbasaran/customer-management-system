<?php

 require_once __DIR__ . "/database.php";

 if($_SERVER["REQUEST_METHOD"]=="POST"){

$username=$_POST["username"];
$password=$_POST["password"];
$passwordRepeat=$_POST["passwordRepeat"];

if($password != $passwordRepeat){
    echo "Şifreler eşleşmiyor";
}else{
$sorgu=$database->prepare("SELECT * FROM admins WHERE adminUSERNAME=?");
$sorgu->execute([$username]);
$admin=$sorgu->fetch(PDO::FETCH_ASSOC);
if($admin){
    echo "Bu kullanıcı adı alınmış!";
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

<h1 class="title">Admin Hesabı Oluştur</h1>
    <form action="" method="post">

    Kullanıcı Adı: <br>
    <input type="text" name="username" class="login-input"
    placeholder="Enter username"><br>

    Şifre: <br>
    <input type="password" name="password" class="login-input"
    placeholder="Enter password"><br>

    Şifre Tekrar:<br>
    <input type="password" name="passwordRepeat" class="login-input"
    placeholder="Confirm password"><br>
     
    <input type="submit" value="Register"  class="button register-button">

    </form>
    <p class="register-text">
    Zaten bir hesabın var mı?
    <a href="login.php">Giriş Yap</a>
    </p>
    </div>
</p>
</body>
</html>