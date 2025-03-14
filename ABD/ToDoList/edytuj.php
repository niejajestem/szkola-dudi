<label for='termin'>Data</label>
<input type='date' name='termin' value='<?= $_GET['termin'] ?>'>
<br><br>
<label for='zadanie'>Zadanie</label>
<input type='text' name='zadanie' value='<?= $_GET['zadanie'] ?>'>
<br><br>
<label for='komentarz'>Komentarz</label>
<input type='text' name='komentarz' value='<?= $_GET['komentarz'] ?>'>
<br><br>
<label for='czyZrobione'>Czy zrobione</label>
<input type='checkbox' name='czyZrobione' value='<?= $_GET['czyZrobione'] ?>'>

<?php


$id = $_GET['id'];
$termin = $_GET['termin'];
$zadanie = $_GET['zadanie'];
$komentarz = $_GET['komentarz'];
$czyZrobione = ($_GET['czyZrobione'] == 1) ? 'true' : 'false';

echo $id;

$c = mysqli_connect('localhost', 'root', '', 'dudiToDoList');
$query = mysqli_query($c, 'UPDATE `zadania` SET `termin` = $termin, `zadanie` = $zadanie, `komentarz` = $komentarz, `czy_zrobione` = $czyZrobione WHERE `zadania`.`id_zadania` = $id;');

// Header('Location: index.php')

?>