<?php

// $sql = "SELECT p.position_name as position_name, e.id as employee_id, e.firstname as firstname, e.lastname as lastname, e.salary as salary, e.email as email
//             FROM employees e
//          LEFT JOIN position p on e.position_id = p.id
//         WHERE e.email= :email AND e.password= :password AND position_name='Administrator';";

function getAllEmployees($connection)
{

    $array = [];

    $sql = "SELECT p.pozicija_naziv as pozicija_naziv,
    z.zaposleni_id as zaposleni_id,
    z.zaposleni_ime as zaposleni_ime,
    z.zaposleni_prezime as zaposleni_prezime,
    z.zaposleni_plata as zaposleni_plata,
    z.zaposleni_email as zaposleni_email
  FROM zaposleni z
    LEFT JOIN pozicija p on z.pozicija_id = p.pozicija_id
  ORDER BY z.zaposleni_plata DESC";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $array;
    } else {
        echo "0 results";
    }
}


function getAllPositions($connection)
{
    $array = [];
    $sql = "SELECT * FROM pozicija";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $array;
    } else {
        echo "0 results";
    }
}
