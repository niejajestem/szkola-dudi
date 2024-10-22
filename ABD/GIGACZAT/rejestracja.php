<h3><a href="logowanie.php">Zaloguj</h3></a>
<h3><a href="gigaCzat.php">Wejdź bez logowania</h3></a>

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
    
    if(!isset($login) || !isset($haslo) || $login == '' || $haslo == ''){
        return;        
    }else if($haslo != $hasloPow){
        Header("Location: error.php?err=diffPass");
    }else if(strlen($haslo) < 8 || strlen($haslo) > 50 || strlen($login) < 8 || strlen($login) > 50){
        Header("Location: error.php?err=wrongLength");
    }else{
        $con = mysqli_connect('localhost', 'root', '', 'dudigigaczat');
        $userExists = mysqli_query($con, 'SELECT COUNT(id_uzytkownika) FROM uzytkownicy WHERE login = '.$login.';');
        if(mysqli_fetch_row($userExists)[0] == 0){
            $createUser = mysqli_query($con, 'INSERT INTO uzytkownicy VALUES ("", '.$login.', '.$haslo.');');
        }else{
            Header("Location: error.php?err=userExists");
        }
    }
?>
