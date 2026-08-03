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
$sorgu = $database->prepare("SELECT * FROM customers WHERE customerID=?");
$sorgu->execute([$id]);

$customer = $sorgu->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/create.css">
    <title>Update Page</title>
</head>
<body>
    <div class="create-container">
    <h1>Müşteri Güncelle</h1>
    <form action="" method="post">

<label>Müşteri İsmi:</label> <br>
<input type="text" name="customerNAME" value="<?= $customer["customerNAME"] ?>" required><br>

<label>Soyismi:</label> <br>
<input type="text" name="customerSURNAME" value="<?= $customer["customerSURNAME"] ?>" required><br>

<label>Şirket İsmi: </label><br>
<input type="text" name="companyNAME" value="<?= $customer["companyNAME"] ?>" required><br>

<label>E-Mail:</label><br>
<input type="email" name="customerEMAIL" value="<?= $customer["customerEMAIL"] ?>" required><br>

<label>Telefon:</label> <br>
<input type="text" name="customerPHONE" value="<?= $customer["customerPHONE"] ?>" required><br>

<label>Şehir:</label> <br>
<input type="text" name="customerCITY" value="<?= $customer["customerCITY"] ?>" required><br>

<label>Durum: (Aktif-Pasif)</label> <br>
<input type="text" name="customerSTATUS" value="<?= $customer["customerSTATUS"] ?>" required><br>

<input type="submit" value="Müşteriyi Güncelle" class="submit-button">

    </form>
    <a href="../dashboard.php">
    <button class="back-button">Dashboard'a Dön</button>
</a>
</div>


</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $customerNAME = $_POST["customerNAME"];
    $customerSURNAME = $_POST["customerSURNAME"];
    $companyNAME = $_POST["companyNAME"];
    $customerEMAIL = $_POST["customerEMAIL"];
    $customerPHONE = $_POST["customerPHONE"];
    $customerCITY = $_POST["customerCITY"];
    $customerSTATUS = $_POST["customerSTATUS"];


$sorgu = $database->prepare("UPDATE customers SET
                             customerNAME=?,
                             customerSURNAME=?,
                             companyNAME=?,
                             customerEMAIL=?,
                             customerPHONE=?,
                             customerCITY=?,
                             customerSTATUS=?
                             WHERE customerID=?");


$updateCustomer = $sorgu->execute([
$customerNAME,
$customerSURNAME,
$companyNAME,
$customerEMAIL,
$customerPHONE,
$customerCITY,
$customerSTATUS,
$id
]);
if($updateCustomer){
    header("Location: ../dashboard.php");
    exit();
}
else{
    echo "Müşteri güncellenemedi!";
}

}

?>