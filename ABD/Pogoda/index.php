<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pogoda</title>
</head>
<body>
    <form action="#" method="post">
        <input type="number" name="temperatura" value="0" pattern="[0-9]{1-2}[.][0-9]{1}">
        <input type="submit">
    </form>
    <?php
    $temperatura = $_POST["temperatura"];
    
    $connect = mysqli_connect("localhost", "root", "", "dudi");
    if(isset($temperatura) && $temperatura != 0){
        $query = mysqli_query($connect, "INSERT INTO pogoda VALUES ('', '".$temperatura."', NOW())");
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
</body>
</html>