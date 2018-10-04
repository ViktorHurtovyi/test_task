<?php 
$price = $_POST["price"];
$dateFrom = $_POST["dateFrom"];
$today = date("Y-m-d");
$dateTo = $_POST["dateTo"];
$connection = mysqli_connect('*', '*', '*', '*');
$sql = "INSERT INTO temporaryprice (dateFrom, dateTo, price, `change_at`) 
             VALUES('$dateFrom', '$dateTo', '$price', '$today')";
mysqli_query($connection, $sql);
header('Location: index.php');
 ?>
