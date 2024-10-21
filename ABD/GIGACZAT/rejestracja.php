<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarejestruj</title>
</head>
<body>
    <form action="#" method="post">
        <label for="login">Wpisz login </label>
        <input type="text" id="login" name="login" min="8" max="50" required value="1234567890"><br>
        <label for="haslo">Wpisz hasło </label>
        <input type="text" id="haslo" name="haslo" min="8" max="50" required value="1234567890"><br>
        <label for="hasloPow">Powtórz hasło </label>
        <input type="text" id="hasloPow" name="hasloPow" min="8" max="50" required value="1234567890"><br><br>
        <input type="submit">
    </form>

<?php
    @$login = $_POST['login'];
    @$haslo = $_POST['haslo'];
    @$hasloPow = $_POST['hasloPow'];

    if($haslo != $hasloPow){
        Header("Location: error.php?err=diffPass");
    }
    if(strlen($haslo) < 8 || strlen($haslo) > 50 || strlen($login) < 8 || strlen($login) > 50){
        Header("Location: error.php?err=wrongLength");
    }
?>
</body>
</html>