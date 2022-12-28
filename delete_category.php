<?php

include "libs/config.php";

// get value from url
$id_cat = $_GET["id"];

try {
    // proses hapus
    $sql = "DELETE FROM tb_category WHERE id_cat=$id_cat";
    $cmd = $conn->prepare($sql);
    $cmd->execute();

    $mess = "Data berhasil di hapus !";
    $type = "success";
}catch(PDOException $err) {
    $mess = "Failed : ".$err->getMessage();
    $type = "danger";
}


// redirect ke data category
header("location:data_category.php?mess=$mess&type=$type");