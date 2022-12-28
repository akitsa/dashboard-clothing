<?php 
include "libs/acces.php";
include "libs/config.php";
include "libs/auth.php";

// get login info
$user_name = $_POST["username"];
$user_password = $_POST["password"];
$user_newpassword = $_POST["npassword"];

// cek login
try {
    $sql = "SELECT * FROM tb_user WHERE username = '$user_name'";
    $cmd = $conn->prepare($sql);
    $cmd->execute();
    $res_login = $cmd->fetch();

    $id_user = $res_login["id_user"];
    if($res_login){
          // jika data user ada maka
        if($res_login["password"]==md5($user_password)){
            $sql_npassword = "UPDATE tb_user set password = md5('$user_newpassword') WHERE id_user = '$id_user'";
            $cmd = $conn ->prepare($sql_npassword);
            $cmd->execute();
            $mess = "Password Berhasil Diganti";
            $type = "success";
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
header("location:ganti_password.php?mess=$mess&type=$type");