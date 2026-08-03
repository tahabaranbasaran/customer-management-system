<?php
session_start();

if(!isset($_SESSION["adminUSERNAME"])){
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . "/../database.php";
?>


<?php

$sorgu=$database->prepare("SELECT * FROM customers");

$sorgu->execute();
$sorgu=$sorgu->fetchAll(PDO::FETCH_ASSOC);

foreach($sorgu as $sorgulist){


echo $sorgulist["customerNAME"]."<br>";
echo $sorgulist["customerSURNAME"]."<br>";
echo $sorgulist["companyNAME"]."<br>";
echo $sorgulist["customerEMAIL"]."<br>";
echo $sorgulist["customerPHONE"]."<br>";
echo $sorgulist["customerCITY"]."<br>";
echo $sorgulist["customerSTATUS"]."<br>";


}




?>
