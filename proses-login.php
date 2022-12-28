<?php
include "libs/acces.php";
include "libs/config.php";
include "libs/auth.php";


 // get login info
$user_name = $_POST["username"];
$user_password = $_POST["password"];

// cek login
try {
    $sql = "SELECT * FROM tb_user WHERE username = '$user_name' OR email = '$user_name'";
    $cmd = $conn->prepare($sql);
    $cmd->execute();

    $res_login = $cmd->fetch();
    if($res_login){
          // jika data user ada maka
        if($res_login["password"]==md5($user_password)){
            $_SESSION["login"] = $res_login;
            header("location:index.php");
            exit;
        }else {
        // jika salah maka
        $mess = "maaf password salah";
        $type = "danger";
        }
    }else {
          $mess = "maaf password username salah";
        $type = "danger";
    }

}catch(PDOException $err) {
    $mess = "Failed : ".$err->getMessange();
}


// redirect
header("location:login_form.php?mess=$mess&type=$type");