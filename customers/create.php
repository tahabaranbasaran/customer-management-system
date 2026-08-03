<?php
require_once __DIR__ . "/../database.php";
?>  

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

  $customerNAME=isset($_POST["customerNAME"]) ? $_POST["customerNAME"] : null;
  $customerSURNAME=isset($_POST["customerSURNAME"]) ? $_POST["customerSURNAME"] : null;
  $companyNAME=isset($_POST["companyNAME"]) ? $_POST["companyNAME"] : null;
  $customerEMAIL=isset($_POST["customerEMAIL"]) ? $_POST["customerEMAIL"] : null;
  $customerPHONE=isset($_POST["customerPHONE"]) ? $_POST["customerPHONE"] : null;
  $customerCITY=isset($_POST["customerCITY"]) ? $_POST["customerCITY"] : null;
  $customerSTATUS=isset($_POST["customerSTATUS"]) ? $_POST["customerSTATUS"] : null;


if(empty($_POST["customerNAME"])){
    echo "Lütfen müşterinin ismini giriniz!";
}
elseif(empty($_POST["customerSURNAME"])){
echo "Lütfen müşterinin soyismini giriniz!";
}
elseif(empty($_POST["companyNAME"])){
echo "Lütfen müşterinin şirketinin ismini giriniz!";
}
elseif(empty($_POST["customerEMAIL"])){
echo " Lütfen müşterinin mail adresini giriniz!";
}
elseif(empty($_POST["customerPHONE"])){
echo "Lütfen müşterinin telefon numarasını giriniz!";
}
elseif(empty($_POST["customerCITY"])){
echo "Lütfen müşterinin şehrini giriniz!";
}
elseif(empty($_POST["customerSTATUS"])){
echo "Müşterinin durumunu giriniz: (Aktif/Pasif)!";
}

else{
$sorgu=$database->prepare("INSERT INTO customers SET 
                                                  customerNAME=?,
                                                  customerSURNAME=?,
                                                  companyNAME=?,
                                                  customerEMAIL=?,
                                                  customerPHONE=?,
                                                  customerCITY=?,
                                                  customerSTATUS=?
                                                                  ");


$addCustomer=$sorgu->execute([
$customerNAME,
$customerSURNAME,
$companyNAME,
$customerEMAIL,
$customerPHONE,
$customerCITY,
$customerSTATUS

]); 

if($addCustomer){
    
    header("Location: ../dashboard.php");

    exit();
}
else{
    echo "Müşteri Eklenemedi";
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/create.css">
    <title>Add Customer</title>
</head>
<body>

<div class="create-container">
<h1>Müşteri Ekle</h1>

    <form action="" method="post">
     
  <label>Müşteri Adı: <br></label><br>
  <input type="text" name="customerNAME" required><br>

  <label>Müşteri Soyadı:</label> <br>
  <input type="text" name="customerSURNAME" required><br>

  <label>Şirket İsmi: </label><br>
  <input type="text" name="companyNAME" required><br>

   <label>E-Mail:</label> <br>
  <input type="email" name="customerEMAIL" required><br>

   <label>Telefon:</label> <br>
  <input type="text" name="customerPHONE" required><br>

  <label> Şehir: </label><br>
  <input type="text" name="customerCITY" required><br>

   <label>Durum: (Aktif-Pasif)</label> <br>
  <input type="text" name="customerSTATUS" required><br>

  <input type="submit" value="submit" class="submit-button"><br>
 
    </form>
    <a href="../dashboard.php">
    <button class="back-button">Dashboard'a Dön</button>
</a>
</div>
</body>
</html>


