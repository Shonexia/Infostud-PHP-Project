<!DOCTYPE html>
<html lang="en">

<!-- HEADER -->
<?php include('header.php');

if (!isset($_SESSION['zaposleni_email'])) {
    header('Location: index.php');
}
// procedural
include('../classes/User.php');
?>

<!-- BOODY -->
<div class="container main">

    <form action="add_page.php" method="POST">
        <br>
        <button name="add_new_user" value="add_new">Add new User</button>
    </form>
    <?php

    ?>

    <h2>All Employees</h2>
    <?php
    // instanciranje objekta tj pozivanje blueprinta koji sadrzi recepte tj metode
    $user = new User();
    // pozivanje metode
    $allPositions = $user->getAllPositions();
    ?>
    <!-- Filter Employees by position -->
    <form action="">
        <p>Choose a position:</p>

        <select name="" id="">
            <option value="">All</option>
            <?php
            foreach ($allPositions as $position) { ?>
                <option value="<?php $position['pozicija_naziv'] ?>"><?php echo $position['pozicija_naziv'] ?></option>
            <?php
            }
            ?>
        </select>
        <button name="applySearch" id="apply">APPLY</button>
    </form>
    <br>
    <?php
    // pozivanje metode
    $employees = $user->getAllEmployees();
    ?>
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
            <?php foreach ($employees as $employee) : ?>
                <tr>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <td><?php echo $employee['zaposleni_ime'] ?></td>
                        <td><?php echo $employee['zaposleni_prezime'] ?></td>
                        <td><?php echo $employee['pozicija_naziv'] ?></td>
                        <td><?php echo $employee['zaposleni_plata'] . '$' ?></td>
                        <td>
                            <input type="hidden" name="id_position" value="<?php echo $employee['pozicija_naziv'] ?>">
                            <input type="hidden" name="id_to_deledit" value="<?php echo $employee['zaposleni_id'] ?>">
                            <button type="text" name="editUser"><a href="edit_page.php?id=<?php echo $employee['zaposleni_id'] ?>">EDIT</a></button>
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