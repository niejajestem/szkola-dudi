<?php
$err = $_GET['err'];

switch($err){
    case 'diffPass':
        echo '<h1>Hasła są różne</h1>';
        echo '<a href="rejestracja.php" style="text-decoration: none;"><h3>Wróć do rejestracji</h3></link>';
        break;
    case 'wrongLength':
        echo '<h1>Zła długość podanych danych</h1>';
        echo '<a href="rejestracja.php" style="text-decoration: none;"><h3>Wróć do rejestracji</h3></link>';
        break;
    default:
        echo 'default';
        break;
}

?>