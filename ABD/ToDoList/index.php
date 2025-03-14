<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>To Do List</title>
<style>
    table,td,th{
        border-collapse: collapse;
        border: 2px solid black;
    }

    td{
        text-align: center;
        width: 10em;
    }

    .zrobione{
        background-color: greenyellow;
    }

    .nieZrobione{
        background-color: orange;
    }

    .poTerminie{
        color: white;
        background-color: red;
    }
</style>
</head>
<body>
<?php
$c = mysqli_connect('localhost', 'root', '', 'dudiToDoList');
$query = mysqli_query($c, "SELECT * FROM zadania");
// echo $query;
echo '<table>';
echo '<tr>';
echo '<th>';
echo 'TERMIN';
echo '</th>';
echo '<th>';
echo 'ZADANIE';
echo '</th>';
echo '<th>';
echo 'AKCJA';
echo '</th>';
echo '<th>';
echo 'KOMENTARZ';
echo '</th>';
echo '</tr>';
while($zadania_table = mysqli_fetch_array($query)){
    if($zadania_table['czy_zrobione'] == 1){
        $class = 'zrobione';
    }else{
        $today = date("Y-m-d");
        if($zadania_table['termin'] > $today){
            $class = 'nieZrobione';
        }else{
            $class = 'poTerminie';
        }
    }
    // print_r($zadania_table);
    echo '<tr class="'.$class.'">';
    echo '<td>';
    echo $zadania_table['termin'];
    echo '</td>';
    echo '<td style="width: 20em;">';
    echo $zadania_table['zadanie'];
    echo '</td>';
    echo '<td>';
    echo '<a href="edytuj.php?id='.$zadania_table['id_zadania'].'&termin='.$zadania_table['termin'].'&zadanie='.$zadania_table['zadanie'].'&komentarz='.$zadania_table['komentarz'].'">[Edytuj]';
    echo '<a href="usun.php?id='.$zadania_table['id_zadania'].'">[Usuń]';
    echo '</td>';
    echo '<td>';
    echo $zadania_table['termin'];
    echo '</td>';
    echo '</tr>';
}
echo '<table>';

?>
</body>
</html>