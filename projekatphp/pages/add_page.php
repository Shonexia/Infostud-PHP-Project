<!DOCTYPE html>
<html lang="en">

<!-- HEADER -->
<?php
include('header.php');
include('../dashboard/db_connect.php');
include('../dashboard/get_data.php');
include('../dashboard/add_user.php');
if (!isset($_SESSION['zaposleni_email'])) {
    header('Location: index.php');
}

$svepozicije = getAllPositions($connection);
?>

<!-- BOODY -->
<div class="container main">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <h2>Add new User:</h2>
        <br>
        <label for="">Name:</label>
        <input type="text" name="user_name" placeholder="Name">
        <label for="">Surname:</label>
        <input type="text" name="user_surname" placeholder="Surname">
        <label for="">Position:</label>
        <select name="user_position" id="">
            <?php
            foreach ($svepozicije as $pozicija) { ?>
                <option value="<?php echo $pozicija['pozicija_id'] ?>"><?php echo $pozicija['pozicija_naziv'] ?></option>
            <?php } ?>
        </select>
        <label for="">Salary:</label>
        <input type="text" name="user_salary" placeholder="Salary">
        <label for="">Email:</label>
        <input type="text" name="user_email" placeholder="Email">
        <br>
        <button type="submit" name="addUser">ADD USER</button>
    </form>
</div>


<!-- FOOTER -->
<?php include('footer.php'); ?>

</html>