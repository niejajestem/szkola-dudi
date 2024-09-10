<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="style.css">
</head>
<header>Galeria</header>
<body>
    <?php
        GetAndShowImages();

        function GetAndShowImages(){
            // $foo = file_get_contents("./zdjecia/budynki");
            // echo $foo;
            $photosArray = scandir("./zdjecia/budynki");
            // print_r($photosArray);
            array_splice($photosArray, 0, 2);
            // echo print_r($photosArray)."<br>";

            echo "<table>";
            for($i = 0; $i < count($photosArray); $i++){
                if($i % 5 == 0){
                    echo "<tr>";
                }
                echo "<td><div style='height:400px;'>";
                echo "<img src='./zdjecia/budynki/".$photosArray[$i]."' alt='$photosArray[$i]' style='width:250px;'>";
                echo "</div></td>";
                if($i % 5 == 4){
                    echo "</tr>";
                }
            }    
            echo "</table>";
        }
    ?>
</body>
</html>