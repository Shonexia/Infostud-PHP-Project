<?php
include('../dashboard/loginhandle.php');
include_once('../dashboard/loginHandle.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>OOP Project</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <div class="new-user">
        <h2>Login to Dashboard</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">

            <label>Email:</label>
            <input type="text" name="email" value="">
            <span><?php echo !empty($errors['email']) ? $errors['email'] : ''; ?></span> <br>

            <label>Password:</label>
            <input type="password" name="password" value="">
            <span><?php echo !empty($errors['password']) ? $errors['password'] : ''; ?></span> <br>

            <input type="submit" value="Login" name="login-btn">
        </form>
    </div>


</body>

</html>