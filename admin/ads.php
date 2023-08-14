<?php

session_start();
include '../config/db.php';

// Check if the session variable is set and equal to "admin menu"
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin menu') {
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>D24 Menu - Admin</title>
    <link rel="icon" href="../assets/images/d24-removebg-preview.webp" type="image/x-icon">


    <meta name="author" content="Curly App">


    <!-- Fonts & Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Antonio:wght@200;300;400;500;600&family=Montserrat:wght@200;300;400;500;600&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a5c75161e7.js" crossorigin="anonymous"></script>

    <!-- bootstrap -->

    <link rel="stylesheet" href="css/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css" />

    <!-- Link Swiper js's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet" />
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
                    <img src="../assets/images/dstrkt24.png" alt="brandlogo" width="70" height=""
                        class="d-inline-block align-text-top" />
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
                <a class="nav-link" href="index.php">
                    <i class="fa fa-list"></i>
                    <span>Categories</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">
                    <i class="fa fa-coffee"></i>
                    <span>Items</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ads.php">
                    <i class="fa fa-star"></i>
                    <span>ADS Banners</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />
            <li class="nav-item">
                <a class="nav-link" href="../menu.php" target="_blank">
                    <i class="fa fa-eye"></i>
                    <span>Check Menu</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <!-- <button class="rounded-circle border-0" id="sidebarToggle"></button> -->
                <button href="#" class="btn btn-info btn-circle btn-sm " id="sidebarToggle">
                    <i class="fa fa-angle-left "></i>
                </button>
            </div>

            <!-- Sidebar Message -->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                    </ul>

                </nav>
                <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->

                <div class="container-fluid pt-4">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">ADS BANNER TOP MENU</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Add New
                            </h6>
                        </div>

                        <div class="card-body">
                            <form action="../config/code2.php" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control form-control-user" required
                                            id="title" placeholder="Main heading" />
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="">Sub <Title></Title></label>
                                        <input type="text" name="subtitle" class="form-control form-control-user"
                                            required id="subTitle" placeholder="Details .. Price ex: GHC 250" />
                                    </div>

                                </div>


                                <div class="form-group row">
                                    <div class="mb-3">
                                        <label for="formFileSm" class="form-label">Upload Banner image <small
                                                class="text-info">* MAX 800 KB</small></label>
                                        <input class=" " name="itemImg" id="formFileSm" type="file">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <button id="" type="submit" name="newBanner"
                                            class="btn btn-success btn-user btn-block ">
                                            Add
                                        </button>

                                    </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Active Banners List
                        </h6>
                    </div>


                    <div class="card-body">
                        <div class="">
                            <div id="" class=" ">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table " id="" width="100%" cellspacing="0" role="grid"
                                            aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" aria-controls="dataTable">Title
                                                    </th>
                                                    <th class="sorting sorting_asc" aria-controls="dataTable">Sub Title
                                                    </th>
                                                    <th class="sorting sorting_asc" aria-controls="dataTable">Image
                                                    </th>

                                                    <th class="sorting sorting_asc" aria-controls="dataTable"
                                                        style="width: 100px;">DELETE
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Sub Title</th>
                                                    <th>Image</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="">
                                                <?php
                                                $sql = "SELECT * from topmenu ORDER BY top_id DESC";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) { ?>
                                                <tr>

                                                    <td class="text-black" style="font-weight: bold;">
                                                        <?php echo $row['top_title'] ?></td>
                                                    <td><?php echo $row['top_sub'] ?></td>
                                                    <td><img src="../assets/images/topimages/<?php echo $row['top_url'] ?>"
                                                            alt="ads" srcset="" width="150px"></td>

                                                    <td><a href="../config/code2.php?topmenudelete=<?php echo $row['top_id'] ?>"
                                                            name="catDelete"
                                                            class="btn btn-danger btn-sm btn-block">DELETE</a>
                                                    </td>

                                                </tr>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ///////////////////////////////////////////////////////////////////////////////////////  -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Made with <i class="fa fa-heart text-danger"></i> by
                        <a class="text-danger fw-bold" href="http://www.curlyapp.net">Curly App</a>. For District
                        Management</span>
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
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="css/bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../js/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
<?php

} else {
    // Redirect to admin.php
    header('Location: admin.php');
}
?>