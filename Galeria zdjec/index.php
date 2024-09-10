<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="style.css">
</head>
<header>Galeria</header>
<form action="#" method="get">
    <select name="category" id="category">
        <option value="buildings">Zdjęcia budynków</option>
        <option value="computers">Zdjęcia komputerów</option>
        <option value="nature">Zdjęcia przyrody</option>
    </select>
    <input type="submit">
</form>
    <body>
    <?php
        @$category = $_GET['category'];
        GetAndShowImages($category);

        function GetAndShowImages($category){
            if(!$category){
                return 0;
            }
            // $foo = file_get_contents("./images/buildings");
            // echo $foo;
            $photosArray = scandir("./images/".$category);
            // print_r($photosArray);
            array_splice($photosArray, 0, 2);
            // echo print_r($photosArray)."<br>";

            echo "<table>";
            for($i = 0; $i < count($photosArray); $i++){
                if($i % 5 == 0){
                    echo "<tr>";
                }
                echo "<td><div style='height:400px;'>";
                echo "<img src='./images/".$category."/".$photosArray[$i]."' alt='$photosArray[$i]'>";
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