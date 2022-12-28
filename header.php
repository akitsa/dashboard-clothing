 <?php
include "libs/config.php";
include "libs/auth.php";
?> 

<!doctype html>
<html lang="en">
  <head>
  	<title>Panel-dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<!-- font awesome -->
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
		<link rel="stylesheet" href="stylee.css">
		<link rel="stylesheet" href="styleimg.css">
    <!-- data table -->
    <link rel="stylesheet" href="assets/vendor/datatable/datatables.min.css">
    <link rel="stylesheet" href="assets/vendor/datatable/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/vendor/datatable/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/vendor/datatable/css/searchBuilder.bootstrap5.min.css">
  </head>
  <body>
<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		    	<a href="/bimashop" class="img logo rounded-circle mb-5" style="background-image: url(images/game.gif);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="index.php">Home</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
	            </ul>
	          </li>
	          <li>
	              <a href="data_product.php">Product</a>
	          </li>
	          <li>
              <a href="data_category.php">Kategori</a>
	          </li>

	          <li>
              <a href="data_user.php">User</a>
	          </li>
	          <li>
              <a href="#">Setting</a>
	          </li>
			  <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Admin</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
					<?php
                    if(isset($_SESSION["login"])){
						echo $_SESSION["login"]["nm_user"];
					}
					?></a>
					<div class"dropdown-menu" aria-labelledby="dropdownId">
						<a class="dropdown-item" href="#" data-bs-toogle="modal"data-bs-target="#profile"<!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                        Profile
                        </button>

                            <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Data User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
		                            <?php 
		                            $rsProfile = $_SESSION["login"] 
		                            ?>
                            </div>
                <div class="row" >
		            <div class="col-md-4">
			        <img class="rounded-circle w-100 mt-4" src="" alt="">
		        </div>
		<div class="col-md-8">
			<table class="table">
				<tr>
					<td><strong>ID</strong></td>
					<td>:</td>
					<td><?= $rsProfile["id_user"]  ?></td>
				</tr>
				<tr>
					<td><strong>nama</strong></td>
					<td>:</td>
					<td><?= $rsProfile["nm_user"]  ?></td>
				</tr>
					<tr>
					<td><strong>Email</strong></td>
					<td>:</td>
					<td><?= $rsProfile["email"]  ?></td>
				</tr>
					<tr>
					<td><strong>username</strong></td>
					<td>:</td>
					<td><?= $rsProfile["username"]  ?></td>
				</tr>

			</table>
		</div>
	 </div>
</div></a>
						
					</div>
                </li>
                <li>
                    <a href="ganti_password.php">Ganti Pasword</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
				
              </ul>
	          </li>
	        </ul>
			
	        <div class="footer">
	        	<p>
			 Copyright &copy;<script>document.write(new Date().getFullYear());</script>Bima Prihartanto Made with all my heart</a>
					</p>
	        </div>
	      </div>
    	</nav>
	
</body>