<?php
$id = $_GET['id'];

echo $id;

$c = mysqli_connect('localhost', 'root', '', 'dudiToDoList');
$query = mysqli_query($c, "DELETE FROM zadania WHERE `id_zadania` = $id");

Header("Location: index.php")

?>