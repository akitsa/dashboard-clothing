<?php
 include "libs/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- css -->
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
    <div class="form-container">
    <form action="proses-regist.php" method="post">
        <h3>Register Now</h3>
        <input type="text" name="nm_user" required placeholder="enter your name" >
        <input type="text" name="email" required placeholder="enter your username">
        <input type="email" name="username" required placeholder="enter your email" >
        <input type="password" name="password" required placeholder="enter your password">
        <input type="password" name="cpassword" required placeholder="Confirm your password">
        <input type="submit" name="submit" value="register now" class="form-btn">
        <p>Already have an account?<a href="login_form.php">login now</a></p>
    </form>

    </div>
</body>
</html>