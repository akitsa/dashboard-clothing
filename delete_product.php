<?php

include "libs/config.php";

// get value from url
$id_product = $_GET["id"];

try {
    // proses hapus
    $sql = "DELETE FROM tb_product WHERE id_product=$id_product";
    $cmd = $conn->prepare($sql);
    $cmd->execute();

    $mess = "Data berhasil di hapus !";
    $type = "success";
}catch(PDOException $err) {
    $mess = "Failed : ".$err->getMessage();
    $type = "danger";
}


// redirect ke data category
header("location:data_product.php?mess=$mess&type=$type");