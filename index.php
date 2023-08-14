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

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Antonio:wght@200;300;400;500;600&family=Montserrat:wght@200;300;400;500;600&display=swap"
        rel="stylesheet" />

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <!-- bootstrap -->

    <link rel="stylesheet" href="css/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="css/landingPage.css" />
</head>

<body>
    <main>
        <div class="container">
            <div class="d-flex justify-content-end mt-4">

                <a id="shareIcon" href="#" onclick="openShareOptions()">
                    <i class="material-icons share_icon">ios_share</i>
                </a>

            </div>

            <!-- Logo  -->
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="mt-5">
                        <img src="" alt="" /><img src="assets/images/logo2.png" width="200px" alt="" />
                    </h2>
                </div>

                <!-- Social icons -->
                <div class="col-12 text-center social_icons_container">
                    <a href="http://instagram.com/dstrkt_24/">
                        <i class="fa-brands fa-instagram fa-xl mx-2 social_icon"></i>
                    </a>
                    <a href="https://g.page/r/CXpTNXOUvrSWEBE/review">
                        <i class="fa-brands fa-google fa-xl mx-2 social_icon"></i>
                    </a>
                    <a href="https://www.facebook.com/profile.php?id=100082990404328">
                        <i class="fa-brands fa-facebook fa-xl mx-2 social_icon"></i>

                    </a>
                    <a href="mailto:info@districtmanagement.net"> <i
                            class="fa-regular fa-envelope fa-xl mx-2 social_icon"></i>
                    </a>

                </div>


                <?php
                if (isset($_GET['messageSent'])) { ?>

                <div class="col-12 text-center">
                    <p class="mt-2 text-white">
                        Message Sent.
                    </p>

                </div>

                <?php

                } else {
                }
                ?>

                <!-- Main links -->

                <div class="col-md-12 col-sm-12 links_container mt-5">
                    <a href="menu.php" class="link mb-3">Menu</a>
                    <a href="https://curlyapp.net/dmfeedbackqr/contactpage.php?branch=Dstrkt%2024&manager=QRMENU"
                        target="_blank" class="link mb-3">Feedback</a>
                    <a data-bs-toggle="modal" data-bs-target="#contactUs" class="link mb-3">Contact Us</a>
                </div>
            </div>
        </div>

        <div class="footer"></div>
    </main>

    <!-- Contact Us Modal -->

    <div class="modal fade" id="contactUs" tabindex="-1" aria-labelledby="contactUs label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Contact Us</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal Form -->
                    <form action="config/contact.php" method="post" class="contact-form">
                        <div class="input_wrap">
                            <input type="text" class="contact_input" name="name" autocomplete="off" required />
                            <label for="name" class="label">Name</label>
                        </div>
                        <div class="input_wrap">
                            <input type="text" class="contact_input" name="email" autocomplete="off" required />
                            <label for="email">Email</label>
                        </div>
                        <div class="input_wrap textarea">
                            <textarea name="message" class="contact_input" autocomplete="off"></textarea>
                            <label for="message">Message</label>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="submit_btn btn px-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a5c75161e7.js" crossorigin="anonymous"></script>
    <!-- Bootstrap  -->
    <script src="css/bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js"></script>
    <!-- link to js file... contains js for contact form -->
    <script src="js/landingPage.js"></script>

    <script>
    function openShareOptions() {
        // Check if the user is using a mobile device
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            // Get the current page URL
            var pageUrl = window.location.href;

            // Create the WhatsApp share link
            var whatsappUrl = 'whatsapp://send?text=' + encodeURIComponent(pageUrl);

            // Open the share options using the WhatsApp link
            window.location.href = whatsappUrl;
        }
    }
    </script>
</body>

</html>