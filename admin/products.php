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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@200;300;400;500;600&family=Montserrat:wght@200;300;400;500;600&display=swap" rel="stylesheet" />

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
                        <img src="../assets/images/dstrkt24.png" alt="brandlogo" width="70" height="" class="d-inline-block align-text-top" />
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
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>

                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                        </ul>

                    </nav>
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
                                <form action="../config/code2.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <input type="text" name="itemName" class="form-control form-control-user" required id="productName" placeholder="Product Name" />
                                        </div>

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <select class="form-control form-select " name="itemCategory" required id="itemCategory" aria-label="">
                                                <option selected>Select Category</option>
                                                <?php
                                                $sql = "SELECT * from categories";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row['cat_name'] ?>">
                                                            <?php echo $row['cat_name'] ?>
                                                        </option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <select class="form-control form-select " name="itemType" required id="itemType" aria-label="">
                                                <option selected>Select Type</option>
                                                <?php
                                                $sql = "SELECT item_type from item GROUP BY item_type";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row['item_type'] ?>">
                                                            <?php echo $row['item_type'] ?>
                                                        </option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control form-control-user" name="itemId" id="itemID" value="" />
                                    <div class="form-group row">

                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Item Description</label>
                                            <textarea name="itemDes" class="form-control" id="itemDesc" cols="30" rows="2"></textarea>
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Alergy Information</label>
                                            <textarea name="alergyInfo" class="form-control" id="itemAlergy" cols="30" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Price</label>
                                            <input type="number" step="any" required class="form-control form-control-user" id="itemPrice" placeholder="Price" name="itemPrice" />
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Calories</label>
                                            <input type="number" step="any" class="form-control form-control-user" id="itemCal" placeholder="Calories" name="itemCal" />
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-4 mb-3 mb-sm-0 d-flex flex-column">
                                            <label for="">Food Options</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="isVegan" type="checkbox" value="1" id="isVegan">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    is vegan?
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="eggFree" type="checkbox" value="1" id="eggFree">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    is egg free?
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="sugarFree" type="checkbox" value="1" id="sugarFree">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    is sugar free?
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="isSpicy" type="checkbox" value="1" id="isSpicy">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    is spicy?
                                                </label>
                                            </div>
                                        </div>
                                        <!-- //////  -->
                                        <div class="col-sm-4 mb-3 mb-sm-0 d-flex flex-column">
                                            <label for="">Food Options</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="isVeg" type="checkbox" value="1" id="isVeg">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    is vegetarian?
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="diaryFree" type="checkbox" value="1" id="diaryFree">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    is diary free?
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="isNew" type="checkbox" value="1" id="isNew">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    is new? <small class="text-info">* add item to new to menu page</small>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="isRec" type="checkbox" value="1" id="isRec">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    is recommended? <small class="text-info">* add item to recommended
                                                        items</small>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" class="form-control form-control-user" name="oldImage" id="oldImage" value="0" />
                                    <div class="form-group row">
                                        <div class="mb-3">
                                            <label for="formFileSm" class="form-label">Upload item image <small class="text-info">* MAX 800 KB</small></label>
                                            <input class=" " name="itemImg" id="formFileSm" type="file">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-4 mb-3 mb-sm-0 d-none " id="oldImageDiv">
                                            <h6 for="" class="form-label">Old Image</h6>
                                            <img src="" id="oldImagePhoto" class="border border-success" alt="" srcset="" width="200px">
                                        </div>

                                    </div>


                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <button id="addBtn" type="submit" name="newItem" class="btn btn-success btn-user btn-block ">
                                                Add
                                            </button>
                                            <button id="editBtn" type="submit" name="editItem" class="btn btn-primary btn-user btn-block d-none">
                                                EDIT
                                            </button>
                                        </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Products List
                            </h6>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0 card-header py-3">
                            <label for="">Select Category</label>
                            <select class="form-control form-select " id="catSelect" aria-label="">
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

                        <div class="card-body">
                            <div class="">
                                <div id="" class=" ">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table " id="" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting sorting_asc" aria-controls="dataTable">Name
                                                        </th>
                                                        <th class="sorting sorting_asc" aria-controls="dataTable">Category
                                                        </th>


                                                        <th class="sorting sorting_asc" aria-controls="dataTable">Price
                                                        </th>

                                                        <th class="sorting sorting_asc" aria-controls="dataTable" style="width: 100px;">EDIT
                                                        </th>
                                                        <th class="sorting sorting_asc" aria-controls="dataTable" style="width: 100px;">DELETE
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Category</th>
                                                        <th>Price</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody id="tableBody">


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
        <script>
            $(document).ready(function() {
                // On refresh check if there are values selected
                if (localStorage.selectVal) {
                    // Select the value stored
                    $('#catSelect').val(localStorage.selectVal);

                    function ajaxCall() {
                        var catName = localStorage.selectVal;
                        $.ajax({
                            url: '../config/productcatselect.php',
                            type: 'post',
                            data: {
                                catName: catName
                            },
                            success: function(response) {
                                $("#tableBody").html(response);
                            }
                        });
                    };
                    ajaxCall();


                }
            });

            // On change store the value
            $('#catSelect').on('change', function() {
                var currentVal = $(this).val();
                localStorage.setItem('selectVal', currentVal);
            });
        </script>

        <!-- SELECT CATEGORY-->
        <script>
            $("#catSelect").change(function() {
                var catName = $(this).find("option:selected").val();
                $.ajax({
                    url: '../config/productcatselect.php',
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
            $(document).on('click', '.editPro', function() {

                $('#oldImageDiv').removeClass('d-none');

                $('#addBtn').addClass('d-none');
                $('#editBtn').removeClass('d-none');

                $('#productName').val($(this).data('productname'));
                $('#itemPrice').val($(this).data('productprice'));
                $('#itemID').val($(this).data('productid'));
                $('#itemCategory').val($(this).data('productcategory'));
                $('#itemType').val($(this).data('producttype'));
                $('#itemDesc').val($(this).data('productdescription'));
                $('#itemAlergy').val($(this).data('productalergy'));
                $('#itemCal').val($(this).data('productcal'));


                if ($(this).data('productvegan') == 1) {
                    $('#isVegan').prop('checked', true)
                }
                if ($(this).data('productegg') == 1) {
                    $('#eggFree').prop('checked', true)
                }
                if ($(this).data('productsugar') == 1) {
                    $('#sugarFree').prop('checked', true)
                }
                if ($(this).data('productspicy') == 1) {
                    $('#isSpicy').prop('checked', true)
                }

                if ($(this).data('productveg') == 1) {
                    $('#isVeg').prop('checked', true)
                }

                if ($(this).data('productdiary') == 1) {
                    $('#diaryFree').prop('checked', true)
                }

                if ($(this).data('productnew') == 1) {
                    $('#isNew').prop('checked', true)
                }

                if ($(this).data('productrecom') == 1) {
                    $('#isRec').prop('checked', true)
                }

                $('#oldImage').val($(this).data('producturl'));
                $('#oldImagePhoto').attr('src', '../assets/images/foodimages/' + $(this).data('producturl'));

                window.scrollTo(0, 0);

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