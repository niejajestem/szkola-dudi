<?php

    $now = date("Y-m-d H:i:s");

    $connect = mysqli_connect("localhost", "root", "", "dudi");
    if(isset($_GET["temperature"]) && isset($_GET["action"]) && $_GET["action"] == "add"){
        $temperature = $_GET["temperature"];
        if($now>date("Y-m-d H:i:s")){
            echo "Zły czas...";
        }else
        $query = mysqli_query($connect, "INSERT INTO pogoda VALUES ('', '".$temperature."', '".$now."')");
        Header("Location: index.php");
    }


    $max = mysqli_fetch_row(mysqli_query($connect, "SELECT MAX(odczyt) FROM pogoda"));
    $min = mysqli_fetch_row(mysqli_query($connect, "SELECT MIN(odczyt) FROM pogoda"));
    $avg = mysqli_fetch_row(mysqli_query($connect, "SELECT AVG(odczyt) FROM pogoda"));
    $count = mysqli_fetch_row(mysqli_query($connect, "SELECT COUNT(id_odczytu) FROM pogoda"));

    echo "<h1>Najwyższa temperatura</h1>";
    echo "<p>".$max[0]."</p>";
    echo "<h1>Najniższa temperatura</h1>";
    echo "<p>".$min[0]."</p>";
    echo "<h1>Średnia temperatura</h1>";
    echo "<p>".round($avg[0], 1)."</p>";
    echo "<h1>Ilość wprowadzonych odczytów</h1>";
    echo "<p>".$count[0]."</p>";

    ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pogoda</title>
</head>
<body>
    <form action="#" method="get">
        <input type="hidden" name="action" value="add">
        <input type="number" name="temperature" value="0">
        <input type="datetime-local" name="date" max="<?php echo $now; ?>">
        <input type="submit">
    </form>
</body>
</html>