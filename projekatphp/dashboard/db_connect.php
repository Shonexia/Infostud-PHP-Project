<?php
$server_name = 'localhost';
$user = 'root';
$password = '';
$database = 'anubis';

$connection = mysqli_connect($server_name, $user, $password, $database);

if (!$connection) {

    echo "doslo je do greske";
    die();
} else {
    //echo 'connected..';
}
