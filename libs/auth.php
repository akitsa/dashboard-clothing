<?php 
$uri = $_SERVER['REQUEST_URI'];

if(isset($_SESSION["login"])){
    // jika halaman login
    if(strpos($uri,'login') !== false) {
        header("location:index.php"); // dasboard
    }
} else {
    // jika sesion login tidak ada 
    if(strpos($uri,'login') === false) {
        header("location:login_form.php"); //login
    }
}