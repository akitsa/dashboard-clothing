<body>
<?php include "header.php";?>
<?php include "libs/auth.php"?>
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
                    <a href="register_form.php" class="ms-auto btn btn-primary">register</a>
                </div>
                <!-- content -->
                <div class="content">
                    <div class="box border">
                        <div class="box-content" >
                        <h3>Data User</h3>
                        </div>                
                <div class="box-content">
                    <!-- php -->
                <?php
                include "libs/config.php";             
                // ambil data
                $sql = "SELECT * FROM tb_user";
                $cmd = $conn-> prepare($sql);
                $cmd -> execute ();
                $result = $cmd->FetchAll();
                ?>
                
                <!-- end php -->
                <table class="table responsive nowrap table-bordered w-100">
                    <thead>
                    <tr>
                        <th>ID User</th>
                        <th>User</th>
                        <th>Password</th>
                        <th>level</th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($result as $rsUser){
                        ?>
                    <tr>
                        <td><?= $rsUser["id_user"] ?></td>
                        <td><?= $rsUser["nm_user"] ?></td>
                        <td><?= $rsUser["password"] ?></td>
                        <td><?= $rsUser["level"]     ?></td>
                        <td>
                            
                            
                            <a class="text-warning"href="form_user.php?id=<?=$rsUser["id_user"]  ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <?php if ($_SESSION["login"]["level"]=="SUPER ADMIN"){ ?> 
                                 <a class="text-danger"href="delete_user.php?id=<?= $rsUser["id_user"] ?>"><i class="fa-solid
                            fa-trash"></i></a>
                                <?php }?>
                           
                            
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