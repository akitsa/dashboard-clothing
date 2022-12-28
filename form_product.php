

<body>
<?php include "header.php" ?>

    <!-- Main Content -->
    <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
           
            </div>
          </div>
        </nav>
            <!-- Title -->
            <div class="title">
                <h2><?= isset($_GET["id"])?"Edit" : "Add New" ?> Product</h2>
                <p>Digunakan untuk menginputkan atau mengedit data kategori</p>
            </div>
            <!-- End Title -->

            <!-- Content -->
            <div class="content">
                <form action="save_product.php" method="POST" enctype="multipart/form-data">
                    <?php
                        // mengambil data berdasarkan id
                        include"libs/config.php";
                        if (isset($_GET["id"])){
                            $id = $_GET["id"];
                            $sql = "SELECT * FROM tb_product WHERE id_product=$id ";
                            $cmd = $conn->prepare($sql);
                            $cmd -> execute();
                            
                            $rs_Product = $cmd->fetch(); // single row
                        }
                    ?>
                    <div class="row">
                        <!-- thumbnail -->
                        <div class="col-md-4">
                            <div class="box border">
                                <div class="box-content">
                                    <img class="big-thumb" src="<?= @$rs_Product["photo"] == NULL ? 'images/403.png' : '../upload/product/'.@$rs_Product['photo'] ?>" alt="">
                                    <div class="mb-3">
                                        <input class="form-control" type="file" name="photo" id="photo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end thumbnail -->
                    <!-- data mulai -->
                    <div class="col-md-8">
                        <div class="box border">
                            <div class="box-content">

                                <div class="mb-3">
                                    <label for="sku_product" class="form-label">SKU</label>
                                    <input type="hidden" name="id_product" value="<?= @$rs_Product ["id_product"] ?>" >
                                    <input type="hidden" name="old_foto"  value="<?= @$rs_Product ["photo"] ?>" >
                                    <input type="hidden" name="rating" value="5" >
                                    <input type="text" class="form-control" name="sku" id="sku"
                                        placeholder="SKU : 100837495" value="<?= @$rs_Product["sku"] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nm_product" class="form-label">Nama Product</label>
                                    <textarea class="form-control" name="nm_product" id="nm_product"
                                        placeholder="Nama Product : Sabun Mandi"><?= @$rs_Product ["nm_product"] ?></textarea>
                                </div>
                                <div class="mb-3">
                                <?php
                                    $sql_cat = "SELECT * FROM tb_category";
                                    $cmd = $conn->prepare($sql_cat);
                                    $cmd->execute();

                                    $result = $cmd->fetchAll();
                                    ?>
                                    <label for="id_cat" class="form-label">Kategori</label>
                                    <select type="text" class="form-control" name="id_cat" id="id_cat" required>
                                        <option value="">Pilih Kategori</option>
                                        <?php
                                        foreach($result as $rsCat){
                                        ?>
                                        <option value="<?= @$rsCat['id_cat'] ?>" <?= @$rsCat['id_cat'] == @$rs_Product['id_cat'] ? "selected" : "" ?>><?=@$rsCat['nm_cat']?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="harga_product" class="form-label">Harga</label>
                                    <input type="number" class="form-control" name="harga_product" id="harga_product"
                                        placeholder="ex : 2000" value="<?= @$rs_Product["harga_product"]?>">
                                </div>
                                <div class="mb-3">
                                    <label for="stok_product" class="form-label">Stock</label>
                                    <input type="number" class="form-control" name="stok_product" id="stok_product"
                                        placeholder="ex : 10" value="<?= @$rs_Product["stok_product"]?>">
                                </div>
                                <div class="mb-3">
                                    <label for="diskon" class="form-label">Diskon</label>
                                    <input type="number" class="form-control" name="diskon" id="diskon"
                                        placeholder="ex : 10%" value="<?= @$rs_Product["diskon"]?>">
                                </div>
                                <div class="mb-3">
                                    <label for="desc_product" class="form-label">deskripsi</label>
                                    <textarea class="form-control" name="desc_product" id="desc_product"
                                        placeholder="deskripsi"><?= @$rs_Product ["desc_product"] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input <?= @$rs_Product["status"]==1 ? "checked" : "" ?> type="radio" name="status" value="1" id="av"><label for="nav">avalaible</label> <br/>
                                    <input <?= @$rs_Product["status"]==1 ? "checked" : "" ?> type="radio" name="status" value="0" id="av"><label for="nav"> not avalaible</label>
                                </div>
                                <div class="mb-3">
                                    <!-- <button type="submit">Upload</button> -->
                                    <button type="submit" class="btn btn-primary me-auto">save</button>
                                </div>
                                
                            </div>
                        </div>
                    <!-- end data-->
                    </div>
                </form>
            </div>            
            <!-- End Content -->
        </div>
    </section>
    <!-- End Main Content -->

    <!-- footer -->
    
    <!-- Bootstrap -->
  <?php include "footer.php " ?>
</body>

</html>