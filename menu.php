<?php
include 'config/db.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>D24 Menu</title>

    <!-- METAS -->
    <meta name="description" content="Dstrkt 24 restaurant menu">
    <meta name="keywords" content="food, menu, dstrkt24, accra, 24, hours, shisha">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Curly App">

    <meta property="og:title" content="Dstrkt24 Menu">
    <meta property="og:description" content="Restaurant Menu">
    <meta property="og:image" content="assets/images/d24-removebg-preview.webp">
    <meta property="og:url" content="curlyapp.net/d24">
    <meta property="og:type" content="website">
    <link rel="icon" href="assets/images/d24-removebg-preview.webp" type="image/x-icon">


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
    <!-- CSS Files -->
    <!-- <link rel="stylesheet" href="/css/index.css" /> -->
    <!-- <link rel="stylesheet" href="css/menu.css" /> -->
    <link rel="stylesheet" href="css/menu.css" />


</head>

<body>
    <div class="top_bars">
        <header class="header" id="header">
            <!-- This is the header which has the arrow back icon, company logo and the search icon -->
            <div class="container-fluid">
                <div class="row align-items-center px-4 py-2">
                    <!-- When the screeen is small, the search icon takes the col size of 8 when hovered and dstrkt logo takes 2 and disappears
               but its size 2 and 8 respectively by default. It was done using bootstrap cols and js -->
                    <div class="col-2 d-flex justify-content-between px-2">
                        <a href="index.php" aria-label="Go back to menu">
                            <i class="fa-solid fa-angle-left arrow_back"></i>
                        </a>
                        <a href="tel:+233551506666" aria-label="Call"><i class="fa-solid fa-phone phone_icon"></i>
                        </a>
                    </div>
                    <div class="col-8 text-center district_col col-md-7 col-lg-8 " id="logoHead">
                        <p class="my-auto district-name">
                            <img src="assets/images/d24-removebg-preview.webp" width="80px" alt="" />
                        </p>
                    </div>
                    <div class="col-2 search_col col-md-3 col-lg-2">
                        <div class="search_container">
                            <!-- <input type="text" id="search-input" placeholder="Search..." /> -->
                            <!-- <div class="">
                                <span class="search_icon"><i class="fa-solid fa-magnifying-glass"
                                        id="search-icon"></i></span>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Menu Category Carousel -->
        <div class="container-fluid">
            <div class="row menuu">
                <div class="menu-category_container">
                    <div class="carousel-scroll_container menu-category_wrapper">
                        <div class="carousel-scroll_wrapper">
                            <div class="menu-category">
                                <a href="javascript:;" onclick="newtomenu()">
                                    <p class="menu-category_item active">NEW TO MENU</p>
                                </a>
                                <?php
                                $sql = 'SELECT * FROM categories WHERE cat_active=1 AND cat_type !="BEVERAGES" ORDER BY cat_sort ASC';
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <a href="javascript:;" class="cat-name" data-itemCat="<?php echo $row['cat_name'] ?>">
                                            <p class=" menu-category_item ">
                                                <?php echo strtoupper($row['cat_name']) ?></p>
                                        </a>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEVERAGES Category Carousel -->
        <div class="container-fluid mt-1">
            <div class="row menuu">
                <div class="menu-category_container">
                    <div class="carousel-scroll_container menu-category_wrapper">
                        <div class="carousel-scroll_wrapper">
                            <div class="menu-category">
                                <a href="javascript:;">
                                    <p class="menu-category_item position-relative">BEVERAGES <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill ">
                                            <span class="material-symbols-outlined fs-6 ms-4">
                                                chevron_right
                                            </span>
                                        </span>


                                    </p>

                                </a>
                                <?php
                                $sql = 'SELECT * FROM categories WHERE cat_active=1 AND cat_type="BEVERAGES" ORDER BY cat_sort ASC';
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <a href="javascript:;" class="cat-name" data-itemCat="<?php echo $row['cat_name'] ?>">
                                            <p class=" menu-category_item ">
                                                <?php echo strtoupper($row['cat_name']) ?></p>
                                        </a>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>

    <!-- Food Options -->

    <div class="container-fluid">
        <div class="row">
            <div class="bg-white mt-2 food-options_container">
                <div class="grid-container py-3">
                    <a href="javascript:;" class="food-options_item" data-itemCat="is_vegan">
                        <span>
                            <img src="assets/icons/vegan.svg" class="food-options_icon" id="vegan" alt="vegan" />
                        </span>
                        Vegan</a>
                    <a href="javascript:;" class="food-options_item" data-itemCat="is_egg_free">
                        <span><img src="assets/icons/noeggs.png" class="food-options_icon" id="egg-free" alt="" /></span>
                        Egg free</a>
                    <a href="javascript:;" class="food-options_item" data-itemCat="is_sugar_free"><span><img src="assets/icons/nosugar.png" class="food-options_icon" id="sugar-free" alt="sugar icon" /></span>
                        Sugar free</a>

                    <a href="javascript:;" class="food-options_item" data-itemCat="is_spicy">
                        <span><img class="food-options_icon" src="assets/icons/pepper.png" id="spicy" alt="" /></span>
                        Spicy</a>
                    <a href="javascript:;" class="food-options_item" data-itemCat="is_veg">
                        <span><img class="food-options_icon" src="assets/icons/vegetarian.png" id="vegetarian" alt="" /></span>
                        Vegetarian</a>

                    <a href="javascript:;" class=" shisha-item" data-itemCat="SHISHA">
                        <span><img class="food-options_icon" id="dairy-free" src="assets/icons/hookah.png" alt="" /></span>
                        Shisha</a>
                </div>
            </div>
        </div>
    </div>

    <!-- New Item on the Menu -->
    <!-- This was done using Swiper.js -->
    <div class="container-fluid">
        <div class="row">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">


                    <?php
                    $sqltop = "SELECT * from topmenu ORDER BY top_id DESC";
                    $resulttop = $conn->query($sqltop);
                    if ($resulttop->num_rows > 0) {
                        while ($rowtop = $resulttop->fetch_assoc()) { ?>

                            <div class="new-item_card swiper-slide position-relative">
                                <img src="assets/images/topimages/<?php echo $rowtop['top_url'] ?>" alt="" />
                                <div class="carousel_caption position-absolute">
                                    <div class="carousel-caption_title"><?php echo $rowtop['top_title'] ?></div>
                                    <div class="carousel-caption_subtitle">
                                        <?php echo $rowtop['top_sub'] ?>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>

                </div>



            </div>
        </div>
    </div>

    <!-- Active Page -->
    <div class="container mt-3">
        <p c class="menu-category_name">
            <img src="assets/images/vertical_bar-removebg-preview.webp" class="culture_icon" width="30px" height="40px" alt="" />
            <span id="catNamePar">New to Menu</span>

        </p>

        <!-- Preview Cards -->
        <!-- Js was used to show a few lines on the preview card... check menu.js -->
        <div class="row mb-1" id="itemsDiv">


        </div>


    </div>
    <!-- Food Suggestions -->
    <div class="container-fluid">
        <div class="row">
            <h5 class="mt-2 suggestions_subtitle">Chef's recommendations</h5>
            <div class="carousel-scroll_container">
                <div class="carousel-scroll_wrapper position-relative">
                    <div class="menu-category" id="recFood">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Detail Modal -->
    <div class="modal fade" id="cardDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content w-600">
                <div class="modal-header">
                    <h1 class="card-detail-modal_title" id="card-detail-title">
                        <img src="assets/images/vertical_bar-removebg-preview.webp" id="itemImgDiv" class="culture_icon" alt="" />
                        <span id="itemNameDiv">Mediteranean Quinoa</span>
                    </h1>
                </div>
                <div class="modal-body">
                    <div class="card mb-3" id="itemData">

                    </div>

                    <!-- Recommended -->
                    <div class="container-fluid">
                        <div class="row">
                            <h5 class="mt-2 suggestions_subtitle">Recommended Beverages</h5>
                            <div class="carousel-scroll_container">
                                <div class="carousel-scroll_wrapper position-relative">
                                    <div class="menu-category" id="recBevModal">




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Food Suggestions -->
                    <div class="container-fluid">
                        <div class="row">
                            <h5 class="mt-2 suggestions_subtitle">
                                Chef's recommendations
                            </h5>
                            <div class="carousel-scroll_container">
                                <div class="carousel-scroll_wrapper position-relative">
                                    <div class="menu-category" id="recFoodModal">





                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary submit_btn" id="modal-btn" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container-xxl flex-wrap py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0" style="font-size: 10px">
                © <span id="currentYear"></span>, Developed by
                <a href="https://www.curlyapp.net" target="_blank" class="footer-link fw-bolder">Curly App</a>, For
                <a href="http://districtmanagement.net/" target="_blank" class="footer-link fw-bolder">District
                    Management</a>
            </div>
        </div>

        <script>
            const currentYear = new Date().getFullYear();
            const yearElement = document.getElementById("currentYear");
            yearElement.textContent = currentYear.toString();
        </script>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="css/bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JS file -->
    <script src="js/menu.js"></script>
    <!-- <script src="js/menuphp.js"></script> -->
</body>

</html>

<script>
    // GET NEW ITEMS ON DOCUMENT LOAD
    $(document).ready(function() {
        // Send data to the PHP file using AJAX
        $.ajax({
            url: "config/getnewtomenu.php",
            method: "POST",
            success: function(response) {
                // Handle the response from the PHP file
                // alert(response);
                $("#itemsDiv").html(response);
                // You can perform further actions here, such as displaying a success message or updating the UI
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            },
        });
    });

    // GET FOOD RECOMM DOCUMENT LOAD
    $(document).ready(function() {
        // Send data to the PHP file using AJAX
        $.ajax({
            url: "config/getrecfood.php",
            method: "POST",
            success: function(response) {
                // Handle the response from the PHP file
                // alert(response);
                $("#recFood").html(response);
                $("#recFoodModal").html(response);
                // You can perform further actions here, such as displaying a success message or updating the UI
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            },
        });
    });
    // GET DRINKS RECOMM DOCUMENT LOAD
    $(document).ready(function() {
        // Send data to the PHP file using AJAX
        $.ajax({
            url: "config/getrecbev.php",
            method: "POST",
            success: function(response) {
                // Handle the response from the PHP file
                // alert(response);
                $("#recBevModal").html(response);
                // You can perform further actions here, such as displaying a success message or updating the UI
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            },
        });
    });


    function newtomenu() {

        // Remove active class from other links
        $(".menu-category .cat-name .active").removeClass("active");

        // Add active class to the clicked link
        $(".menu-category .menu-category_item:contains('NEW TO MENU')").addClass("active");

        // Send data to the PHP file using AJAX
        $.ajax({
            url: "config/getnewtomenu.php",
            method: "POST",
            success: function(response) {
                // Handle the response from the PHP file
                // alert(response);
                $("#itemsDiv").html(response);
                $("#catNamePar").html('NEW TO MENU');

                // You can perform further actions here, such as displaying a success message or updating the UI
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            },
        });
    }

    $(document).on("click", ".menu-category .cat-name", function() {
        // Remove active class from all links' <p> tags
        $(".menu-category_item").removeClass("active");

        // Add active class to the clicked link's <p> tag
        $(this).find("p.menu-category_item").addClass("active");

        // Get the category from the clicked link
        var itemCat = $(this).data("itemcat");

        // Send data to the PHP file using AJAX
        $.ajax({
            url: "config/getitems.php",
            method: "POST",
            data: {
                itemCat: itemCat,
            },
            success: function(response) {
                // Handle the response from the PHP file
                $("#itemsDiv").html(response);
                $("#catNamePar").html(itemCat);

                // You can perform further actions here, such as displaying a success message or updating the UI
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            },
        });
    });


    $(document).on("click", ".item-card", function() {
        var itemID = $(this).data("itemid");
        var itemName = $(this).data("itemname");
        var itemUrl = $(this).data("itemurl");

        // Send data to the PHP file using AJAX
        $.ajax({
            url: "config/getitemdetails.php",
            method: "POST",
            data: {
                itemID: itemID,
            },
            success: function(response) {
                // Handle the response from the PHP file
                // Update the modal with the fetched data
                // Example: $("#cardDetail .modal-body").html(response);

                // Open the modal
                $("#itemData").html(response);
                $("#itemNameDiv").html(itemName);
                // $("#itemImgDiv").attr("src", "assets/images/" + itemUrl);
                $("#cardDetail").modal("show");

                // You can perform further actions here, such as displaying a success message or updating the UI
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            },
        });
    });

    // GET SHISHA ITEMS
    $(document).on("click", ".shisha-item", function() {
        // Remove active class from all links' <p> tags
        $(".menu-category_item").removeClass("active");


        // Get the category from the clicked link
        var itemCat = $(this).data("itemcat");

        // Send data to the PHP file using AJAX
        $.ajax({
            url: "config/getitems.php",
            method: "POST",
            data: {
                itemCat: itemCat,
            },
            success: function(response) {
                // Handle the response from the PHP file
                $("#itemsDiv").html(response);
                $("#catNamePar").html(itemCat);

                // You can perform further actions here, such as displaying a success message or updating the UI
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            },
        });
    });

    // GET ITEMS FOOD OPTION ORTING

    $(document).on("click", ".food-options_item", function() {
        // Remove active class from all links' <p> tags
        $(".menu-category_item").removeClass("active");


        // Get the category from the clicked link
        var itemCat = $(this).data("itemcat");
        var itemCatName;

        // MAKE NAMING FOR TITLE

        switch (itemCat) {
            case 'is_vegan':
                itemCatName = 'Show Only: Vegan Items'
                break;
            case 'is_egg_free':
                itemCatName = 'Show Only: Egg Free Items'
                break;
            case 'is_sugar_free':
                itemCatName = 'Show Only: Sugar Free Items'
                break;
            case 'is_spicy':
                itemCatName = 'Show Only: Spicy Items'
                break;
            case 'is_veg':
                itemCatName = 'Show Only: Vegetarian Items'
                break;


            default:
                itemCatName = itemCat;
                break;
        }

        // Send data to the PHP file using AJAX
        $.ajax({
            url: "config/getitemsoptions.php",
            method: "POST",
            data: {
                itemCat: itemCat,
            },
            success: function(response) {
                // Handle the response from the PHP file
                $("#itemsDiv").html(response);
                $("#catNamePar").html(itemCatName);

                // You can perform further actions here, such as displaying a success message or updating the UI
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            },
        });
    });
</script>