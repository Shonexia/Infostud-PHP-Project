<?php
include('db_connect.php');

if (isset($_POST['deleteUser'])) {


    $id_to_delete = mysqli_real_escape_string($connection, $_POST['id_to_deledit']);
    $employee_position = $_POST['id_position'];

    if ($employee_position === "System Administrator") {
        echo "Cant delete System Administrator";
    } else {
        $sql = "DELETE FROM zaposleni WHERE zaposleni_id = $id_to_delete";
    }


    if (mysqli_query($connection, $sql)) {
        header('Location: ../pages/zaposleni.php');
    } {
        echo 'query error: ' . mysqli_error($connection);
    }
}
