<?php
include_once('../classes/Database.php');

class LoginHandle
{
    public function Login()
    {
        $errors = array('email' => '', 'password' => '');
        $email = mysqli_real_escape_string(Database::db_connection(), $_POST['email']);
        $password = mysqli_real_escape_string(Database::db_connection(), $_POST['password']);
        /////////////////////////////
        $errors = $this->validate($_POST['email'], $_POST['password']);
    }

    public function Logout()
    {
        session_destroy();
        header("Location: ../pages/index.php");
        exit;
    }

    public function validate($email, $password)
    {
        // check email
        if (empty($email)) {
            $errors['email'] = "An email is required" . "<br>";
        } else {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'must be a valid email address';
            }
        }
        // check password
        if (empty($password)) {
            $errors['password'] = "A password is required" . "<br>";
        } else {
            if (!preg_match('/^[0-9a-z\s]+$/', $_POST['password'])) {
                $errors['password'] = 'Must be a valid password';
            }
        }

        if (!empty($errors['email']) || !empty($errors['password'])) {
            return $errors;
        }

        $dblogin = $this->dbcheckLogin($email, $password);
    }

    public function dbcheckLogin($email, $password)
    {
        if ($email != "" && $password != "") {
            $sql_query = "SELECT count(*) as cntUser FROM zaposleni WHERE zaposleni_email='" . $email . "' and zaposleni_password='" . $password . "'";
            $result = mysqli_query(Database::db_connection(), $sql_query);
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
}
