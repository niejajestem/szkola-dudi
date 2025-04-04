<form action="#" method="post">
    <label for="nazwa">Nazwa książki</label>
    <input type="text" name="nazwa">
    <br><br>
    <label for="autor">Autor</label>
    <input type="text" name="autor">
    <br><br>
    <input type="submit">
</form>

<?php
    @$nazwa = $_POST['nazwa'];
    @$autor = $_POST['autor'];
    echo $nazwa;
    echo $autor;
    if(@$_POST['nazwa'] != '' && @$_POST['autor'] != ''){
        $connect = mysqli_connect('localhost','root','','dudibiblioteka');
        $query = mysqli_query($connect, "INSERT INTO `ksiazki` (`tytul`, `autor`, `id_ucznia`) VALUES ('$nazwa', '$autor', '0');");
        Header("Location: ksiazkaPlus.php");
    }
?>