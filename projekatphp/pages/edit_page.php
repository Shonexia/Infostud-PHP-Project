<!DOCTYPE html>
<html lang="en">

<!-- HEADER -->
<?php
include('header.php');
include('../dashboard/db_connect.php');
include('../dashboard/get_data.php');
include('../dashboard/edit_user.php');
if (!isset($_SESSION['zaposleni_email'])) {
    header('Location: index.php');
}
$svepozicije = getAllPositions($connection);
// var_dump($svepozicije);

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    $singleQuery = "SELECT * FROM zaposleni WHERE zaposleni_id = $id";
    $singleResult = mysqli_query($connection, $singleQuery);
    $singleEmployee = mysqli_fetch_assoc($singleResult);
    var_dump($singleEmployee);
}

?>

<!-- BOODY -->
<div class="container main">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <h2>Add new User:</h2>
        <br>
        <label for="">Name:</label>
        <input type="text" name="user_name" value="<?php echo $singleEmployee['zaposleni_ime'] ?>">
        <label for="">Surname:</label>
        <input type="text" name="user_surname" value="<?php echo $singleEmployee['zaposleni_prezime'] ?>">
        <label for="">Position:</label>
        <select name="user_position" id="">
            <?php
            foreach ($svepozicije as $pozicija) { ?>
                <option value="<?php echo $pozicija['pozicija_id'] ?>"><?php echo $pozicija['pozicija_naziv'] ?></option>
            <?php } ?>
        </select>
        <label for="">Salary:</label>
        <input type="text" name="user_salary" value="<?php echo $singleEmployee['zaposleni_plata'] ?>">
        <label for="">Email:</label>
        <input type="text" name="user_email" value="<?php echo $singleEmployee['zaposleni_email'] ?>">
        <br>
        <input type="hidden" name="id_to_edit" value="<?php echo $singleEmployee['zaposleni_id'] ?>">
        <button type="text" name="editUser">EDIT USER</button>
    </form>
</div>


<!-- FOOTER -->
<?php include('footer.php'); ?>

</html>