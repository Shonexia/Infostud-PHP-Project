<!DOCTYPE html>
<html lang="en">

<!-- HEADER -->
<?php include('header.php');

if (!isset($_SESSION['zaposleni_email'])) {
    header('Location: index.php');
}
?>

<!-- BOODY -->
<div class="container main">
    Druga sekcija: sluzi za statistiku , prikazujemo koliko imamo ukupno zaposlenih u kompaniju,
    koja je prosecna plata, I koliko imamo zaposlenih po poziciji (npr 3 programera,2 menadzera)
</div>


<!-- FOOTER -->
<?php include('footer.php'); ?>

</html>