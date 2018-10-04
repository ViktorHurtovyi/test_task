<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h1>
    <?php
    $today = date("Y-m-d");
    $price = null;
    $connection = mysqli_connect('localhost', 'root', '', 'product');
    $result2 = mysqli_query($connection, 'SELECT * FROM temporaryprice ORDER BY `change_at`');
    while($row = mysqli_fetch_assoc($result2))
    {
        if(($row['dateFrom']<$today)&&($row['dateTo']>$today)){ //Проверка подходит ли к сегодняшней дате
            $price = $row['price'];
        }
    }
    $result = mysqli_query($connection, 'SELECT * FROM PRODUCT');
    $row = $result->fetch_assoc();
    if ($price === null) { //Если другая цена не установлена - будет показана дефолтная
        $price = $row["price"];
    }
    printf ($row["name"]." - ".$price);

    ?>	</h1>
<a href="admin.php">Chenge price</a><br><br>
<a href="index.php">Order by interval</a>
</body>
</html>