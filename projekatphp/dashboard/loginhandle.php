<?php
session_start();
include('db_connect.php');

// LOG OUT
if (isset($_SESSION['logged_in']) && isset($_SESSION['zaposleni_email'])) {
    session_destroy();
    header("Location: ../pages/index.php");
    exit;
};
$errors = array('email' => '', 'password' => '');
// LOG IN
if (isset($_POST['login-btn']) && isset($_POST['email']) && isset($_POST['password'])) {

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    /////////////////////////////
    // check email
    if (empty($_POST['email'])) {
        $errors['email'] = "An email is required" . "<br>";
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'must be a valid email address';
        }
    }
    // check password
    if (empty($_POST['password'])) {
        $errors['password'] = "A password is required" . "<br>";
    } else {
        if (!preg_match('/^[0-9a-z\s]+$/', $_POST['password'])) {
            $errors['password'] = 'Must be a valid password';
        }
    }
    //////////////////////////////////////////////////
    if ($email != "" && $password != "") {
        $sql_query = "SELECT count(*) as cntUser FROM zaposleni WHERE zaposleni_email='" . $email . "' and zaposleni_password='" . $password . "'";
        $result = mysqli_query($connection, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if ($count > 0) {
            $_SESSION['zaposleni_email'] = $email;
            $_SESSION['logged_in'] = 'true';
            header('Location: ../pages/dashboard.php');
        } else {
            header('Location: ../pages/index.php');
        }
    }
}
