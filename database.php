<?php

try{
$database=new PDO("mysql:host=localhost; dbname=customers_database", "root", "");

}catch(PDOException $e){
    echo $e->getMessage();
}

?>