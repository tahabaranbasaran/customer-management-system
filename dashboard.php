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
    <span></span>
     <?php 
      $username=$_SESSION["adminUSERNAME"];
      echo $username?> !
      </span>
    </h2>






<form action="" method="get" class="search-form">

<input type="text" name="search" placeholder="Search Customer" class="search-input">
<input type="submit" value="Search" class="search-button">
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
<th style="background-color: #5B8DEF; padding:1rem ">Customer Name</th>
<th style="background-color: #5B8DEF; padding:1rem ">Customer Surname</th>
<th style="background-color: #5B8DEF; padding:1rem ">Company Name</th>
<th style="background-color: #5B8DEF; padding:1rem ">E-Mail</th>
<th style="background-color: #5B8DEF; padding:1rem ">Phone</th>
<th style="background-color: #5B8DEF; padding:1rem ">City</th>
<th style="background-color: #5B8DEF; padding:1rem ">Status</th>
<th style="background-color: green; padding:1rem ">Update Customer</th>
<th style="background-color: red; padding:1rem ">Delete Customer</th>
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
        <button type="button" class="button update-button">Update Customer</button>
    </a>

</td>
<td>
    <a href="customers/delete.php?customerID=<?= $customer["customerID"] ?>"class="button delete-button">Delete Customer</a>
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

    <button class="button logout-button" name="logout" value="logout">Log Out</button>
    <button class="button add-button" name="veriekle" value="veriekle">Add Customer</button>

<?php
if(isset($_POST["veriekle"])){
header("Location: customers/create.php");
exit();
}


?>

</form>

</body>
</html>