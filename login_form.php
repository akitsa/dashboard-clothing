<?php

include"libs/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    <!-- css -->
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
    <div class="form-container">

    <form action="proses-login.php" method="post">
        <h3>Login Now</h3>
        <!-- alert -->
        <?php
        if(isset($_GET["mess"])){
        ?>
        <div class"alert alert-<?= $_GET["type"];?>" role-"alert" <?= $_GET["mess"]; ?>>
        </div>
        <?php
        }
        ?>

        <input type="username " name="username" required placeholder="enter your username">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="submit" name="submit" value="login now" class="form-btn">
        <p>Dont have an account? <a href="register_form.php">register now</a></p>
    </form>

    </div>
</body>
</html>