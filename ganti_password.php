<?php
session_start ();
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
    <link rel="stylesheet" href="assets/vendor/datatable/datatables.min.css">
    <link rel="stylesheet" href="assets/vendor/datatable/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/vendor/datatable/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/vendor/datatable/css/searchBuilder.bootstrap5.min.css">
</head>
<body>
    <div class="form-container">
        <form action="proses_ganti.php" method="post">
        <h3>change-password </h3>
        <!-- alert -->
        <?php
        if(isset($_GET["mess"])){
        ?>
        <div class="alert alert-<?= $_GET["type"]?>" role="alert" ><?= $_GET["mess"] ?>
        </div>
        <?php
        }
        ?>

        <input type="username" name="username" required placeholder="enter your username">
        <input type="password" name="password" required placeholder="enter your password lama">
        <input type="password" name="npassword" required placeholder="enter your passwordbaru">
        <input type="submit" name="submit" value="Confirm New Password" class="form-btn">
        <p>Dont have an account? <a href="register_form.php">register now</a></p>
        </form>

    </div>
</body>
</html>