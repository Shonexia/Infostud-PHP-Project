<!DOCTYPE html>
<html lang="en">

<!-- HEADER -->
<?php
include('header.php');
include('../dashboard/db_connect.php');
include('../dashboard/get_data.php');
include('../dashboard/delete_user.php');
if (!isset($_SESSION['zaposleni_email'])) {
    header('Location: index.php');
}
$zaposleni = getAllEmployees($connection);
// var_dump($zaposleni);
$svepozicije = getAllPositions($connection);
// var_dump($svepozicije);
?>




<!-- BODY -->
<div class="container main">

    <!-- Add new User -->
    <form action="add_page.php" method="POST">
        <br>
        <button name="add_new_user" value="add_new">Add new User</button>
    </form>

    <!-- Select option filter -->
    <form action="">
        <p>Choose a position:</p>

        <select name="" id="">
            <option value="">All</option>
            <?php
            foreach ($svepozicije as $pozicija) { ?>
                <option value="<?php $pozicija['pozicija_naziv'] ?>"><?php echo $pozicija['pozicija_naziv'] ?></option>
            <?php
            }
            ?>
        </select>
        <button name="applySearch" id="apply">APPLY</button>
    </form>
    <!-- Display all employees -->
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($zaposleni as $zaposlen) : ?>
                <tr>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <td><?php echo $zaposlen['zaposleni_ime'] ?></td>
                        <td><?php echo $zaposlen['zaposleni_prezime'] ?></td>
                        <td><?php echo $zaposlen['pozicija_naziv'] ?></td>
                        <td><?php echo $zaposlen['zaposleni_plata'] . '$' ?></td>
                        <td>
                            <input type="hidden" name="id_position" value="<?php echo $zaposlen['pozicija_naziv'] ?>">
                            <input type="hidden" name="id_to_deledit" value="<?php echo $zaposlen['zaposleni_id'] ?>">
                            <button type="text" name="editUser"><a href="edit_page.php?id=<?php echo $zaposlen['zaposleni_id'] ?>">EDIT</a></button>
                            <button type="text" name="deleteUser" value="delete">DELETE</button>

                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>


    <?php
    echo "<br>";

    ?>
    Stranica “Zaposleni” :
    -Ima navigaciju.
    Na ovoj stranici izlistavamo podatke o zaposlenima u kompaniji. Po defaultu izlistavamo sve
    zaposlene I sortiramo prema plati.
    Ime,prezime,pozicija,plata. Pored ovih podataka treba da stoji button za azuriranje I button za
    brisanje zaposlenog.
    Ima dropdown “Pozicija” , pretrazi I dodaj button. U dropdown “Pozicija” treba prikazati pozicije
    (programer,menadzer,dizajner,system administrator)
    Klikom na pretrazi button izlistavamo samo zaposlene koji pripadaju izabranoj poziciji.
    Klikom na dodaj button se otvara nova stranica, gde moze administrator da doda novog radnika u
    sistem.
    Klikom na azuriraj button se otvara nova stranica I administrator moze da azurira podatke
    zaposlenom.
    Klikom na brisanje button obrisemo zaposlenog.
    Potrebno je napraviti validaciju na input polja :
    ime I prezime ne moze da sadrzi broj I ne moze ostati prazna.
    Polje plata moze da bude samo broj I ne moze ostati prazna.
    Error poruke je potrebno prikazati ispod input polja, bez redirekacija.
</div>



<!-- FOOTER -->
<?php include('footer.php'); ?>

</html>