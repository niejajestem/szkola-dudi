<?php

$con = mysqli_connect("localhost", "root", "", "dudiobywatele");

$qSearch = mysqli_query($con, "SELECT id_obywatela FROM obywatele");

while($tSearch = mysqli_fetch_array($qSearch)){
    print_r($tSearch);
}

?>