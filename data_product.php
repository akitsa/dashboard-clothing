
<?php include "header.php";?>

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

            <!-- alert -->
            <?php 
            if(isset($_GET["mess"])){
            ?>
                <div class="alert alert-<?= $_GET["type"]; ?> role="alert">
                    <?= $_GET["mess"]; ?>
                </div>
            <!-- end alert  -->
            <?php
            }
            ?>
                <!--tool bar-->
                <div class="d-flex pb-2">
                    <a href="form_product.php" class="ms-auto btn btn-primary">add new</a>
                </div>
                <!-- content -->
                <div class="content">
                    <div class="box border">
                        <div class="box-content" >
                        <h3>Data Product</h3>
                        </div>                
                <div class="box-content">
                    <!-- php -->
                <?php
                include "libs/config.php";             
                // ambil data
                $sql = "SELECT prod.*,cat.nm_cat FROM tb_product as prod INNER JOIN tb_category AS cat ON prod.id_cat = cat.id_cat";
                $cmd = $conn-> prepare($sql);
                $cmd -> execute ();
                $result = $cmd->FetchAll();
                ?>
                
                <!-- end php -->
                <table class="table responsive nowrap table-bordered w-100">
                    <thead>
                    <tr>
                        <th>foto</th>
                        <th>SKU</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Diskon</th>
                        <th>Status</th>
                        <th>Rating</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($result as $rsProduct){
                        ?>
                    <tr>
                    <td><?= $rsProduct["photo"] ?>
                    <img class="thumb" src="<?=$rsProduct["photo"]==NULL ? "images/403.png" : "../upload/product/".$rsProduct["photo"] ?>" alt="">
                    </td>
                        <td><?= $rsProduct["sku"] ?></td>
                        <td><?= $rsProduct["nm_product"] ?></td>
                        <td><?= $rsProduct["nm_cat"] ?></td>
                        <td><?= number_format($rsProduct["harga"],0,",",",") ?></td>
                        <td><?= number_format($rsProduct["stock"],0,",",",") ?></td>
                        <td><?= $rsProduct["diskon"] ?></td>
                        <td><?= $rsProduct["status"]==1 ?"Available" : "Not Available" ?></td>                        
                        <td><?= $rsProduct["rating"] ?></td>
                        <td><?= $rsProduct["desc_product"] ?></td>

                        <td>
                            <a class="text-warning"href="form_product.php?id=<?= @$rsProduct["id_product"] ?>"><i class="fa-solid
                            fa-pen-to-square"></i></a>
                            <a class="text-danger"href="delete_product.php?id=<?= @$rsProduct["id_product"] ?>"><i class="fa-solid
                            fa-trash"></i></a>
                        </td>
                    </tr>   
                        <?php
                        }
                        ?>
                        </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- end content -->
    </div>
</section>
    <?php include "footer.php" ?>
</html>