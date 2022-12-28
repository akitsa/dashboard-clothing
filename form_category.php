


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
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_category.php">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">User</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
            <!-- Title -->
            <div class="title">
                <h2><?= isset($_GET["id"])?"Edit" : "Add New" ?></h2>
                <p>Digunakan untuk menginputkan atau mengedit data kategori</p>
            </div>
            <!-- End Title -->

            <!-- Content -->
            <div class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box border">
                            <div class="box-content">
                                <?php
                                // mengambil data berdasarkan id
                                include"libs/config.php";
                                if (isset($_GET["id"])){
                                    $id_cat = $_GET["id"];
                                    $sql = "SELECT * FROM tb_category WHERE id_cat = $id_cat";
                                    $cmd = $conn->prepare($sql);
                                    $cmd -> execute();
                                    

                                    $rsCat = $cmd->fetch(); // single row
                                }
                                ?>
                                <form action="save_category.php" method="post">
                                    <div class="mb-3">
                                        <label for="nm_cat" class="form-label">Nama Kategori</label>
                                        <input type="hidden" name="id_cat" id="id_cat" value="<?= @$id_cat ?>" >
                                        <input type="text" class="form-control" name="nm_cat" id="nm_cat"
                                            placeholder="Nama Kategori" value="<?= @$rs_Cat ["nm_cat"] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="desc_cat" class="form-label">Descripsi</label>
                                        <textarea class="form-control" name="desc_cat" id="desc_cat"
                                            placeholder="Description"><?= @$rs_Cat ["desc_cat"] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-default me-auto">SAVE</button>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content -->

        </div>
    </section>
    <!-- End Main Content -->

   <!-- footer -->
    
    <!-- Bootstrap -->
  <?php include "footer.php"?>
</body>

</html>