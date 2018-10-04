<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>
<?php 
$date_check=999999999;
$today = date("Y-m-d");
$price = null;
$connection = mysqli_connect('*', '*', '*', '*');
$result2 = mysqli_query($connection, 'SELECT * FROM temporaryprice');
while($row = mysqli_fetch_assoc($result2))
{
	if(($row['dateFrom']<$today)&&($row['dateTo']>$today)){ //Проверка подходит ли к сегодняшней дате
			$res = strtotime ($row["dateTo"]) - strtotime ($row["dateFrom"]);
		if($res<$date_check){//Проверва интервала, выбор наименьшего
			$date_check = $res;
			$price = $row["price"];
}
}
}
$result = mysqli_query($connection, 'SELECT * FROM PRODUCT');
 $row = $result->fetch_assoc(); //цикла нет, так как продукт только один
 if ($price === null) {//Если временная цена не установлена - будет показана дефолтная
 	$price = $row["price"];
 }
      printf ($row["name"]." - ".$price);
    
 ?>	</h1>
 <a href="admin.php">Chenge price</a><br><br>
    <a href="sortedByDate.php">Order by last change</a>
</body>
</html>
