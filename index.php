
  <?php 
  include "header.php";
  include "libs/modul.php"
  ?>

        <!-- Page Content  -->
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
                    <a class="nav-link" href="index.php"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_product.php"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_category.php"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"></a>
                </li>
              
              </ul>
            </div>
          </div>
        </nav>

        <h2 class="mb-4">Panel - Dasboard</h2>
         <!-- Statistic -->
         <div class="row py-5">
                <div class="col-sm-4"><a href="data_product.php">
                    <div class="card border-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Product</div>
                                    <?= getCount ("tb_product")?>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-box fa-3x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div></a>
                </div>
                <div class="col-sm-4">
                    <div class="card border-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Kategori</div>
                                    <?= getCount ("tb_category")?>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-list fa-3x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card border-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Usser</div>
                                    <?= getCount ("tb_user")?>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-images fa-3x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Statistic -->
      </div>
		</div>
    

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>