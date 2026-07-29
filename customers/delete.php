<?php

session_start();
require_once __DIR__ . "/../database.php";

if(!isset($_SESSION["adminUSERNAME"])){
    header("Location: ../login.php");
    exit();
}

?>

<?php

$id=$_GET["customerID"];

$sorgu=$database->prepare("DELETE  FROM customers WHERE customerID=?");

$sorgu->execute([$id]);

header("Location: ../dashboard.php");
exit();


?>