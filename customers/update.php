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
    <title>Update Page</title>
</head>
<body>
    <form action="" method="post">

Customer Name: <br>
<input type="text" name="customerNAME" value="<?= $customer["customerNAME"] ?>"><br>

Customer Surname: <br>
<input type="text" name="customerSURNAME" value="<?= $customer["customerSURNAME"] ?>"><br>

Company Name: <br>
<input type="text" name="companyNAME" value="<?= $customer["companyNAME"] ?>"><br>

E-Mail: <br>
<input type="email" name="customerEMAIL" value="<?= $customer["customerEMAIL"] ?>"><br>

Phone Number: <br>
<input type="text" name="customerPHONE" value="<?= $customer["customerPHONE"] ?>"><br>

City: <br>
<input type="text" name="customerCITY" value="<?= $customer["customerCITY"] ?>"><br>

Status: <br>
<input type="text" name="customerSTATUS" value="<?= $customer["customerSTATUS"] ?>"><br>

<input type="submit" value="Update Customer">

    </form>
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
    echo "Customer update failed!";
}


}





?>