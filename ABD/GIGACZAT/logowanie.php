<h3><a href="rejestracja.php">Zarejestruj</h3></a>
<h3><a href="gigaCzat.php">Wejdź bez logowania</h3></a>

<form action="#" method="post">
    <label for="login">Wpisz login </label>
    <input type="text" id="login" name="login" min="8" max="50" required value="1234567890"><br>
    <label for="haslo">Wpisz hasło </label>
    <input type="text" id="haslo" name="haslo" min="8" max="50" required value="1234567890"><br><br>
    <input type="submit">
</form>
<?php
    @$login = $_POST['login'];
    @$haslo = $_POST['haslo'];
    
    $con = mysqli_connect('localhost', 'root', '', 'dudigigaczat');
    
    if(!isset($login) || !isset($haslo) || $login == '' || $haslo == ''){
        return;
    }else{
        $userExists = @mysqli_query($con, "SELECT COUNT(id_uzytkownika) FROM uzytkownicy WHERE login = '$login';");
        if(mysqli_fetch_row($userExists)[0] == 1){
            $checkPass = mysqli_query($con, "SELECT haslo FROM uzytkownicy WHERE login = '$login';");
            if(mysqli_fetch_row($checkPass)[0] == $haslo){
                Header("Location: gigaCzat.php?login=".$login);
            }else{
                Header("Location: error.php?err=wrongPass");
            }
        }else{
            Header("Location: error.php?err=userNotFound");
        }
    }


?>