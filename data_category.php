

<body>
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
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    
              </ul>
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
                    <a href="form_category.php" class="ms-auto btn btn-primary">add new</a>
                </div>
                <!-- content -->
                <div class="content">
                    <div class="box border">
                        <div class="box-content" >
                        <h3>Data Kategori</h3>
                        </div>                
                <div class="box-content">
                    <!-- php -->
                <?php
                include "libs/config.php";             
                // ambil data
                $sql = "SELECT * FROM tb_category";
                $cmd = $conn-> prepare($sql);
                $cmd -> execute ();
                $result = $cmd->FetchAll();
                ?>
                
                <!-- end php -->
                <table class="table responsive nowrap table-bordered w-100">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Deskiprsi</th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($result as $rsCat){
                        ?>
                    <tr>
                        <td><?= $rsCat["id_cat"] ?></td>
                        <td><?= $rsCat["nm_cat"] ?></td>
                        <td><?= $rsCat["desc_cat"] ?></td>
                        <td>
                            <a class="text-warning"href="form_category.php?id=<?= $rsCat["id_cat"] ?>"><i class="fa-solid
                            fa-pen-to-square"></i></a>
                            <a class="text-danger"href="delete_category.php?id=<?= $rsCat["id_cat"] ?>"><i class="fa-solid
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
    <?php include "footer.php"; ?>
    

</body>

</html>