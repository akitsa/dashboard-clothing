<?php
include "libs/config.php";

// get value form category
$id_cat = $_POST["id_cat"];    
$nama_cat = $_POST["nm_cat"];
$desc_cat = $_POST["desc_cat"];

try {
    // proses simpan
    if($id_cat){
        // jika ada nilai id cat
        $sql = "UPDATE tb_category SET nm_cat ='$nama_cat',desc_cat ='$desc_cat' WHERE id_cat = $id_cat ";
    } else {
        // jika tidak ada nilai / kosong 
        $sql = "INSERT INTO tb_category VALUES(NULL,'$nama_cat','$desc_cat')";
    }
        $cmd = $conn->prepare($sql);
        $cmd -> execute();

    $mess = "Data berhasil disimpan";
    $type = "success";
}catch(PDOException $err) {
    $mess = "Failed : ".$err->getMessange();
    $type = "danger";
}


// header
header("location:data_category.php?mess=$mess&type=$type");
