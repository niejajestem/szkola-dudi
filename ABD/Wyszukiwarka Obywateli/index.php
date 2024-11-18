<form action="#" method="get">
    <input type="text" name="imie">
    <input type="text" name="nazwisko">
    <input type="number" name="pesel">
    <input type="date" name="data">
    <input type="text" name="plec">
    <input type="submit">
</form>

<?php

$con = mysqli_connect("localhost", "root", "", "dudiobywatele");

@$imie = $_GET["imie"];
@$nazwisko = $_GET["nazwisko"];
@$pesel = $_GET["pesel"];
@$data = $_GET["data"];
@$plec = $_GET["plec"];

if(isset($imie) && isset($nazwisko) && isset($pesel) && isset($data) && isset($plec) && $imie != "" && $nazwisko != "" && $pesel != "" && $data != "" && $plec != ""){
    if(strlen($pesel) != 11){
        echo "Zły pesel!!!!😡";
    }else if(strlen($imie) < 3 && strlen($nazwisko) < 3){
        echo "Za mało liter w imieniu/nazwisku";
    }else{
        $qAdd = mysqli_query($con, "INSERT INTO `obywatele` (`imie`, `nazwisko`, `pesel`, `data_urodzenia`, `plec`) VALUES ('$imie', '$nazwisko', '$pesel', '$data', '$plec');");
        Header("Location: index.php");
    }
}

echo "<br>";

$qSearch = mysqli_query($con, "SELECT * FROM obywatele");

echo "<table>";
echo "<td>".$imie."</td>";
echo "<td>".$nazwisko."</td>";
echo "<td>".$pesel."</td>";
echo "<td>".$data."</td>";
echo "<td>".$plec."</td>";
echo "<th>";

echo "</th>";
while($tabSearch = mysqli_fetch_array($qSearch)){
    echo "<tr>";
    echo "<td>".$tabSearch["imie"]."</td>";
    echo "<td>".$tabSearch["nazwisko"]."</td>";
    echo "<td>".$tabSearch["pesel"]."</td>";
    echo "<td>".$tabSearch["data_urodzenia"]."</td>";
    echo "<td>".$tabSearch["plec"]."</td>";
    echo "</tr>";
}
echo "</table>";

?>