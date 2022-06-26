<!DOCTYPE html>
<html lang="en">

<!-- HEADER -->
<?php
include('header.php');
include('../dashboard/db_connect.php');
include('../dashboard/get_data.php');
include('../dashboard/delete_user.php');
include('../classes/User.php');
if (!isset($_SESSION['zaposleni_email'])) {
    header('Location: index.php');
}
$zaposleni = getAllEmployees($connection);
// var_dump($zaposleni);
$svepozicije = getAllPositions($connection);
// var_dump($svepozicije);
// oop
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
        <h2>All Employees</h2>
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

</div>



<!-- FOOTER -->
<?php include('footer.php'); ?>

</html>