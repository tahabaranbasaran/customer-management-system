<?php
session_start();
require_once __DIR__ . "/database.php";
if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $sorgu=$database->prepare("SELECT * FROM admins WHERE adminUSERNAME=? ");
    $sorgu->execute([

$username,

]);

$addAdmin=$sorgu->fetch(PDO::FETCH_ASSOC);

$password=$_POST["password"];

if($addAdmin){
    if(password_verify($password, $addAdmin["adminPASSWORD"])){

        $_SESSION["adminID"] = $addAdmin["adminID"];
        $_SESSION["adminUSERNAME"] = $addAdmin["adminUSERNAME"];

        header("Location: dashboard.php");
        exit();

    }else{
        echo "Kullanıcı adı veya şifre hatalı";
    }
}else{
    echo "Kullanıcı adı veya şifre hatalı";
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login Page</title>
</head>
<body>
    <div class="login-container">
    <h1 class="title">Customer Management System</h1>
  <form action="" method="post">

  Username: <br>
  <input type="text" name="username" class="login-input"><br>

  Password: <br>
  <input type="password" name="password" class="login-input"><br>

  <input type="submit" name="submit" value="submit" class="button login-button">

  </form>    
  <p class="register-text">
        Hesabın yok mu?
        <a href="register.php">Register</a>
    </p>

</div>
</body>
</html>

