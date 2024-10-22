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
    case 'userExists':
        echo '<h1>Podany użytkownik już istnieje</h1>';
        echo '<a href="rejestracja.php" style="text-decoration: none;"><h3>Wróć do rejestracji</h3></link>';
        break;
    case 'wrongPass':
        echo '<h1>Złe hasło</h1>';
        echo '<a href="logowanie.php" style="text-decoration: none;"><h3>Wróć do logowania</h3></link>';
        break;
    case 'userNotFound':
        echo '<h1>Podany użytkownik nie istnieje</h1>';
        echo '<a href="logowanie.php" style="text-decoration: none;"><h3>Wróć do logowania</h3></link>';
        break;
    default:
        Header("Location: error.php?err=index.php");
        break;
}

?>