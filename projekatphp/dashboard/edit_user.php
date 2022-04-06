<?php
// ovde logika za obradu finalnog edita
include('db_connect.php');

if (isset($_POST['editUser'])) {
    $id = $_POST['id_to_edit'];
    $name = $_POST['user_name'];
    $surname = $_POST['user_surname'];
    $position = $_POST['user_position'];
    $salary = $_POST['user_salary'];
    $email = $_POST['user_email'];
    var_dump($_POST);


    var_dump($id);
    $sql = "UPDATE zaposleni SET zaposleni_ime='$name', zaposleni_prezime='$surname', pozicija_id='$position',zaposleni_plata='$salary' , zaposleni_email='$email' WHERE zaposleni_id = $id";

    $query = mysqli_query($connection, $sql);
    header('Location: ../pages/zaposleni.php');



    // var_dump($query);
    // if (isset($_POST['update'])) {
    //     header('Location: index.php');
    // }
}
