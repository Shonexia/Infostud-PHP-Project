<?php
/// ovde kod za logiku
include('db_connect.php');


if (isset($_POST['addUser'])) {

    $name = mysqli_real_escape_string($connection, $_POST['user_name']);
    $surname = mysqli_real_escape_string($connection, $_POST['user_surname']);
    $position = mysqli_real_escape_string($connection, $_POST['user_position']);
    $salary = mysqli_real_escape_string($connection, $_POST['user_salary']);
    $email = mysqli_real_escape_string($connection, $_POST['user_email']);
    var_dump($_POST);

    $query = "INSERT INTO zaposleni(zaposleni_ime, zaposleni_prezime, pozicija_id, zaposleni_plata, zaposleni_email) VALUES('$name', '$surname','$position','$salary','$email')";

    // $execute = mysqli_query($connection, $query);

    if (mysqli_query($connection, $query)) {
        header('location: ../pages/zaposleni.php');
    } else {
        'query error: ' . mysqli_error($connection);
    }
}
