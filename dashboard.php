<?php
session_start();
if (!isset($_SESSION["adminUSERNAME"])) {
    header("Location: login.php");
    exit();
}

 require_once __DIR__ . "/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    
   <h2 class="welcome">Hoşgeldin
    <span>
     <?php 
      $username=$_SESSION["adminUSERNAME"];
      echo $username?> !
      </span>
    </h2>

<form action="" method="get" class="search-form">

<input type="text" name="search" placeholder="Müşteri Ara" class="search-input">
<input type="submit" value="Search" class="search-button">
<a href="dashboard.php" class="clear-button">
    Tüm Müşterileri Göster
</a>
</form>
<?php


if(isset($_GET["search"])){
$search=isset($_GET["search"]) ? $_GET["search"] : "";
$search="%".$search."%";
$sorgu=$database->prepare("SELECT * FROM customers WHERE 
                                                         customerNAME LIKE ? OR
                                                         customerSURNAME LIKE ? OR
                                                         companyNAME LIKE ? OR
                                                         customerEMAIL LIKE ? OR
                                                         customerPHONE LIKE ? OR
                                                         customerCITY LIKE ? OR
                                                         customerSTATUS 
                                                          LIKE ?");
$sorgu->execute([
                $search,
                $search,
                $search,
                $search,
                $search,
                $search,
                $search]);

                

}else{

    $sorgu = $database->prepare("SELECT * FROM customers");
    $sorgu->execute();

}

$customers = $sorgu->fetchAll(PDO::FETCH_ASSOC);

?>


<table border="2px">
<thead>
<tr>
<th style="background-color: #5B8DEF; padding:1rem ">Müşteri İsmi</th>
<th style="background-color: #5B8DEF; padding:1rem ">Soyismi</th>
<th style="background-color: #5B8DEF; padding:1rem ">Şirket Adı</th>
<th style="background-color: #5B8DEF; padding:1rem ">E-Mail</th>
<th style="background-color: #5B8DEF; padding:1rem ">Telefon</th>
<th style="background-color: #5B8DEF; padding:1rem ">Şehir</th>
<th style="background-color: #5B8DEF; padding:1rem ">Durum</th>
<th style="background-color: green; padding:1rem ">Güncelle</th>
<th style="background-color: red; padding:1rem ">Sil</th>
</tr>
</thead>
<tbody>
<?php

foreach($customers as $customer){
?>

<tr>
<td><?php echo $customer["customerNAME"] ?></td>
<td><?php echo $customer["customerSURNAME"] ?></td>
<td><?php echo $customer["companyNAME"] ?></td>
<td><?php echo $customer["customerEMAIL"] ?></td>
<td><?php echo $customer["customerPHONE"] ?></td>
<td><?php echo $customer["customerCITY"] ?></td>
<td><?php echo $customer["customerSTATUS"] ?></td>

<td>
    <a href="customers/update.php?customerID=<?= $customer["customerID"] ?>">
        <button type="button" class="button update-button">Müşteriyi Güncelle</button>
    </a>

</td>
<td>
    <a href="customers/delete.php?customerID=<?= $customer["customerID"] ?>"class="button delete-button" 
    onclick="return confirm('Bu müşteriyi silmek istediğinize emin misiniz?');">
    Müşteriyi Sil</a>
</td>
</tr>

<?php
}
?>
</tbody>
</table>

 <form action="" method="post">
 <?php
         if(isset($_POST["logout"])){
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
         }    
        
        ?>

    <button class="button logout-button" name="logout" value="logout">Çıkış Yap</button>
    <button class="button add-button" name="veriekle" value="veriekle">Müşteri Ekle</button>

<?php
if(isset($_POST["veriekle"])){
header("Location: customers/create.php");
exit();
}

?>
</form>
</body>
</html>