<?php 
     include "libs/config.php";
    
$username = $_POST["username"];  
$nm_user = $_POST["nm_user"];  
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];

if ($username=="" || $password==""){
    echo "<script>
            alert('isi username atau password terlebih dahulu')
        </script>";
    exit;
}

try {
    $sql = "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'";
    $cmd = $conn->prepare($sql);
    $cmd->execute();

    $resuser = $cmd->fetch();

    if($username == $resuser['username']){
        echo "<script>
            alert('username sudah di gunakan')
        </script>";
    return false;
    }
    if($email == $resuser['email']){
        echo "<script>
            alert('email sudah di gunakan')
        </script>";
    return false;
    }
    if($password != $cpassword){
        echo "<script>
            alert('password tidak sama')
        </script>";
    return false;  
    } else {
        $sql_input = "INSERT INTO tb_user VALUES ('','$nm_user','$email','$username',MD5('$password'),'','1')";
        $cmd_input = $conn->prepare($sql_input);
        $cmd_input->execute();

        echo "<script>
            alert('id berhasil di simpan')
        </script>";
    }
} catch(PDOException $err) {
    $mess = "Failed : ".$err->getMessage();
}
        echo "<script>
            alert('$mess')
        </script>";

        header("location:login_form.php");