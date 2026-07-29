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
    echo "Please enter the customer's name!";
}
elseif(empty($_POST["customerSURNAME"])){
echo "Please enter the customer's surname!";
}
elseif(empty($_POST["companyNAME"])){
echo "Please enter the company's name!";
}
elseif(empty($_POST["customerEMAIL"])){
echo " Please enter the customer's email address!";
}
elseif(empty($_POST["customerPHONE"])){
echo "Please enter the customer's phone number!";
}
elseif(empty($_POST["customerCITY"])){
echo "Please enter the customer's city!";
}
elseif(empty($_POST["customerSTATUS"])){
echo "Please enter the customer's status!";
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
    echo "Customer adding is failed";
}



}


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
</head>
<body>


    <form action="" method="post">
     
  Customer Name: <br>
  <input type="text" name="customerNAME"><br>
  Customer Surname: <br>
  <input type="text" name="customerSURNAME"><br>
  Company Name: <br>
  <input type="text" name="companyNAME"><br>
   E-Mail: <br>
  <input type="email" name="customerEMAIL"><br>
   Phone Number: <br>
  <input type="text" name="customerPHONE"><br>
   City: <br>
  <input type="text" name="customerCITY"><br>
   Status: <br>
  <input type="text" name="customerSTATUS"><br>
  <input type="submit" value="submit">
 


    </form>
</body>
</html>


