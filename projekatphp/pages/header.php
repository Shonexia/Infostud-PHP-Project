<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Project</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body class="">
    <nav class="container header">
        <div><a href="dashboard.php" class="nav-item">Main Page</a></div>
        <div><a href="zaposleni.php" class="nav-item">Employees</a></div>
        <div class="item"><?php echo "Welcome: " . $_SESSION['zaposleni_email']; ?></div>
        <div class="item logout"><a href="index.php">Logout</a></div>
    </nav>