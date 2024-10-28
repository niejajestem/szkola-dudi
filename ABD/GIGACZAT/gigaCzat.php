<h3><a href="rejestracja.php">Zarejestruj</h3></a>
<h3><a href="logowanie.php">Zaloguj</h3></a>

<?php
if(isset($_GET['login'])){
    echo <<<HTML
        <form action="#" method="post">
            <label for="text">Co chcesz napisać?</label>
            <input name="wpis" type="text" max="77" name="text">
            <input type="submit">
        </form>
    HTML;
    }

    @$wpis = $_POST['wpis'];
    @$login = $_GET['login'];

    $con = mysqli_connect('localhost', 'root', '', 'dudigigaczat');
    $getUserId = mysqli_fetch_row(mysqli_query($con, "SELECT id_uzytkownika FROM uzytkownicy WHERE login = '$login';"))[0];
    echo $getUserId;
    $addEntry = mysqli_query($con,"INSERT INTO wpisy VALUES ('', '$getUserId', '$wpis', NOW(), '1')");
?>