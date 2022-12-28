<?php
include "libs/config.php";

// get value form category
$id_product = $_POST["id_product"];    
$sku_product = $_POST["sku"];
$nm_product = $_POST["nm_product"];
$id_cat = $_POST["id_cat"];
$harga_product = $_POST["harga"];
$stok_product = $_POST["stock"];
$desc_product = $_POST["desc_product"];
$diskon = $_POST["diskon"];
$status = $_POST["status"];
$rating = $_POST["rating"];

// upload file
    if($_FILES["photo"]["name"]!=""){
        $target_dir ="../upload/product/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
        // nama file yang di upload
        $photo = $_FILES["photo"]["name"];
    } else {
        // jika tidak memilih file 
        $photo = $_POST["old_photo"];
    }

    
try {
    
    // proses simpan
    if ($id_product) {
        $sql ="UPDATE tb_product SET sku = '$sku_product',nm_product ='$nm_product',id_cat = '$id_cat',harga= '$harga_product',stock = '$stok_product',desc_product = '$desc_product',diskon = '$diskon',status = '$status',rating = '$rating', photo = '$photo' WHERE id_product = $id_product ";
    } else {
        $sql = "INSERT INTO tb_product VALUES(NULL,'$sku_product','$nm_product','$id_cat','$harga_product','$stok_product','$desc_product','$diskon','$status','$rating','$photo')";
    }
        $cmd = $conn->prepare($sql);
        $cmd -> execute();

    $mess = "Data berhasil disimpan";
    $type = "success";
}catch(PDOException $err) {
    $mess = "Failed : " . $err->getMessage();
    $type = "danger";
}


// header
header("location:data_product.php?mess=$mess&type=$type");
