<?php

include_once("Database.php");
// class User
class User
{
    // method get all
    public function getAllEmployees()
    {
        $result = [];

        $sql = "SELECT p.pozicija_naziv as pozicija_naziv,
    z.zaposleni_id as zaposleni_id,
    z.zaposleni_ime as zaposleni_ime,
    z.zaposleni_prezime as zaposleni_prezime,
    z.zaposleni_plata as zaposleni_plata,
    z.zaposleni_email as zaposleni_email
  FROM zaposleni z
    LEFT JOIN pozicija p on z.pozicija_id = p.pozicija_id
  ORDER BY z.zaposleni_plata DESC";
        // static se pise ovako umesto $this->
        $query = Database::db_connection()->query($sql);

        if ($query->num_rows > 0) {
            // output data of each row
            $result = $query->fetch_all(MYSQLI_ASSOC);
            return $result;
        } else {
            return "0 results";
        }
    }

    // method get all pos
    public function getAllPositions()
    {
        $array = [];
        $sql = "SELECT * FROM pozicija";

        $result = Database::db_connection()->query($sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $array;
        } else {
            echo "0 results";
        }
    }

    //method display single chosen position


    // method Create employee
    public function createEmployee()
    {
    }
}
