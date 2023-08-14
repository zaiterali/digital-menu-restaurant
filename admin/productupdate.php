<?php

session_start();
include '../config/db.php';

// Check if the session variable is set and equal to "admin menu"
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin menu') {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Coffee Shot Admin</title>
        <link rel="icon" href="images/logo1.png">

        <!-- Custom fonts for this template-->
        <link rel="stylesheet" href="css/font-awesome.css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet" />
    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">
                        <img src="images/logo2.png" alt="brandlogo" width="70" height="" class="d-inline-block align-text-top" />
                    </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0" />

                <!-- Divider -->
                <hr class="sidebar-divider" />

                <!-- Heading -->
                <div class="sidebar-heading"></div>

                <!-- Nav Item - FOR ADMIN -->
                <li class="nav-item">
                    <a class="nav-link" href="categories.php">
                        <i class="fa fa-list"></i>
                        <span>Categories</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">
                        <i class="fa fa-coffee"></i>
                        <span>Products</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="specialcat.php">
                        <i class="fa fa-star"></i>
                        <span>Special Category</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="specialpro.php">
                        <i class="fa fa-heart"></i>
                        <span>Special Products</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="newitem.php">
                        <i class="fa fa-beer"></i>
                        <span>New Items</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block" />

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

                <!-- Sidebar Message -->
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->

                    <div class="container-fluid pt-4">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Products</h1>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Add New
                                </h6>
                            </div>

                            <div class="card-body">
                                <form action="config/code.php" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <input type="text" name="itemName" class="form-control form-control-user" id="" placeholder="Product Name" />
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <select class="form-control form-select " name="itemCategory" aria-label="">
                                                <option selected>Select Category</option>
                                                <?php
                                                $sql = "SELECT * from categories";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row['cat_name'] ?>"><?php echo $row['cat_name'] ?>
                                                        </option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <input type="number" class="form-control form-control-user" id="" placeholder="Product Sort (1-20)" name="itemSort" />
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <input type="number" class="form-control form-control-user" id="" placeholder="Price" name="itemPrice" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <div class="form-check px-4 ">
                                                <input class=" form-check-input" type="checkbox" name="multiPrice" value="yes" id="secondCheck">
                                                <label class="form-check-label" for="">
                                                    Product with 2 sizes?
                                                </label>
                                            </div>
                                        </div>
                                        <div id="secondPrice" class="col-sm-4 mb-3 mb-sm-0 d-none">
                                            <input type="number" class="form-control form-control-user" id="" placeholder="Price 2" name="itemPrice2" value="0" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <button type="submit" name="editItem" class="btn btn-success btn-user btn-block">
                                                Edit
                                            </button>
                                        </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Made with <i class="fa fa-heart text-danger"></i> by
                            <a class="text-danger fw-bold" href="http://www.curlyapp.net">Curly App</a>. For Coffee
                            Shot</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="js/jquery/jquery.min.js"></script>
        <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="js/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <!-- SELECT CATEGORY-->
        <script>
            $("#catSelect").change(function() {
                var catName = $(this).find("option:selected").val();
                $.ajax({
                    url: 'config/productcatselect.php',
                    type: 'post',
                    data: {
                        catName: catName
                    },
                    success: function(response) {
                        $("#tableBody").html(response);
                    }
                });
            });
        </script>
        <script>
            $("#secondCheck").change(function() {
                if (this.checked) {
                    $('#secondPrice').removeClass("d-none")
                } else {
                    $('#secondPrice').addClass("d-none")
                }
            });
        </script>
    </body>

    </html>
<?php

} else {
    // Redirect to admin.php
    header('Location: admin.php');
}
?>