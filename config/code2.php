<?php
session_start();
include "db.php";

// Function to compress the image
function compressImage($source, $destination, $quality)
{
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);
    imagejpeg($image, $destination, $quality);
}

if (isset($_POST['newItem'])) {
    
    
    $itemName = $_POST['itemName'];
    $itemCategory = $_POST['itemCategory'];
    $itemType = $_POST['itemType'];
    $itemDes = $_POST['itemDes'];
    $alergyInfo = $_POST['alergyInfo'];
    $itemPrice = $_POST['itemPrice'];
    $itemCal = $_POST['itemCal'];
    $isVegan = isset($_POST['isVegan']) ? 1 : 0;
    $eggFree = isset($_POST['eggFree']) ? 1 : 0;
    $sugarFree = isset($_POST['sugarFree']) ? 1 : 0;
    $isSpicy = isset($_POST['isSpicy']) ? 1 : 0;
    $isVeg = isset($_POST['isVeg']) ? 1 : 0;
    $diaryFree = isset($_POST['diaryFree']) ? 1 : 0;
    $isNew = isset($_POST['isNew']) ? 1 : 0;
    $isRec = isset($_POST['isRec']) ? 1 : 0;

    // Image upload
    if (isset($_FILES['itemImg']) && $_FILES['itemImg']['error'] === UPLOAD_ERR_OK) {
        $imageTmp = $_FILES['itemImg']['tmp_name'];
        $imageName = $_FILES['itemImg']['name'];
        $imageSize = $_FILES['itemImg']['size'];
        $compressedPath = "../assets/images/foodimages/compressed_" . $imageName;
        $maxFileSize = 800 * 1024; // Maximum file size in bytes (450KB)

        // Check if image is within the size limit
        if ($imageSize <= $maxFileSize) {
            // Compress and save the image
            compressImage($imageTmp, $compressedPath, 75); // Adjust the quality as needed

            // Insert the image name into the database
            $sql = "INSERT INTO item (item_name, item_category, item_type, item_description, item_alergy_informations, item_price, item_cal, is_vegan, is_egg_free, is_sugar_free, is_spicy, is_veg, is_diary_free, is_new, is_recom, item_url)
                    VALUES ('$itemName', '$itemCategory', '$itemType', '$itemDes', '$alergyInfo', '$itemPrice', '$itemCal', '$isVegan', '$eggFree', '$sugarFree', '$isSpicy', '$isVeg', '$diaryFree', '$isNew', '$isRec', 'compressed_$imageName')";

            if ($conn->query($sql) === TRUE) {
                // echo "Item inserted successfully.";
                header("Location: ../admin/products.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: The image size exceeds the maximum limit of 450KB.";
        }
    } else {
        echo "Error: Failed to upload the image.";
    }
} elseif (isset($_POST['editItemOld'])) {



    $itemName = $_POST['itemName'];
    $itemCategory = $_POST['itemCategory'];
    $itemType = $_POST['itemType'];
    $itemDes = $_POST['itemDes'];
    $alergyInfo = $_POST['alergyInfo'];
    $itemPrice = $_POST['itemPrice'];
    $itemCal = $_POST['itemCal'];
    $isVegan = isset($_POST['isVegan']) ? 1 : 0;
    $eggFree = isset($_POST['eggFree']) ? 1 : 0;
    $sugarFree = isset($_POST['sugarFree']) ? 1 : 0;
    $isSpicy = isset($_POST['isSpicy']) ? 1 : 0;
    $isVeg = isset($_POST['isVeg']) ? 1 : 0;
    $diaryFree = isset($_POST['diaryFree']) ? 1 : 0;
    $isNew = isset($_POST['isNew']) ? 1 : 0;
    $isRec = isset($_POST['isRec']) ? 1 : 0;

    $oldPic = $_POST['oldImage'];
    $item_id = $_POST['itemId'];
    $fileName = '../assets/images/foodimages' . $oldPic;


    if ($oldPic != '0') {

        // Image upload
        if (isset($_FILES['itemImg'])) {
            $imageTmp = $_FILES['itemImg']['tmp_name'];
            $imageName = $_FILES['itemImg']['name'];
            $imageSize = $_FILES['itemImg']['size'];
            $compressedPath = "../assets/images/foodimages/compressed_" . $imageName;
            $maxFileSize = 800 * 1024; // Maximum file size in bytes (450KB)

            // Check if image is within the size limit
            if ($imageSize <= $maxFileSize) {
                // Compress and save the image
                compressImage($imageTmp, $compressedPath, 75); // Adjust the quality as needed

                // Insert the image name into the database
                $sql = "INSERT INTO item (item_name, item_category, item_type, item_description, item_alergy_informations, item_price, item_cal, is_vegan, is_egg_free, is_sugar_free, is_spicy, is_veg, is_diary_free, is_new, is_recom, item_url)
                    VALUES ('$itemName', '$itemCategory', '$itemType', '$itemDes', '$alergyInfo', '$itemPrice', '$itemCal', '$isVegan', '$eggFree', '$sugarFree', '$isSpicy', '$isVeg', '$diaryFree', '$isNew', '$isRec', 'compressed_$imageName')";

                if ($conn->query($sql) === TRUE) {
                    // echo "Item inserted successfully.";
                    header("Location: ../admin/products.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error: The image size exceeds the maximum limit of 450KB.";
            }
        } else {
            echo "Error: Failed to upload the image.";
        }
    } else {
        $sql = "UPDATE 
        item SET
        item_name='$itemName', 
        item_category='$itemCategory', 
        item_type='$itemType', 
        item_description='$itemDes', 
        item_alergy_informations='$alergyInfo', 
        item_price='$itemPrice', 
        item_cal='$itemCal', 
        is_vegan='$isVegan', 
        is_egg_free='$eggFree', 
        is_sugar_free='$sugarFree', 
        is_spicy='$isSpicy', 
        is_veg='$isVeg', 
        is_diary_free='$diaryFree', 
        is_new='$isNew', 
        is_recom='$isRec'
        WHERE item_id=$item_id";

        if ($conn->query($sql) === TRUE) {
            // echo "Item inserted successfully.";
            header("Location: ../admin/products.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} elseif (isset($_POST['editItem'])) {
    // Edit item form submission
    function validate($data)
    {
        $data = str_replace("'", "\\'", $data);

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Collect form data
    $itemName = validate($_POST['itemName']);
    $itemCategory = $_POST['itemCategory'];
    $itemType = $_POST['itemType'];
    $itemDes = validate($_POST['itemDes']);
    $alergyInfo = validate($_POST['alergyInfo']);
    $itemPrice = $_POST['itemPrice'];
    $itemCal = $_POST['itemCal'];
    $isVegan = isset($_POST['isVegan']) ? 1 : 0;
    $eggFree = isset($_POST['eggFree']) ? 1 : 0;
    $sugarFree = isset($_POST['sugarFree']) ? 1 : 0;
    $isSpicy = isset($_POST['isSpicy']) ? 1 : 0;
    $isVeg = isset($_POST['isVeg']) ? 1 : 0;
    $diaryFree = isset($_POST['diaryFree']) ? 1 : 0;
    $isNew = isset($_POST['isNew']) ? 1 : 0;
    $isRec = isset($_POST['isRec']) ? 1 : 0;

    $oldPic = $_POST['oldImage'];
    $item_id = $_POST['itemId'];
    $fileName = '../assets/images/foodimages' . $oldPic;

    // Check if a new image was uploaded
    if (isset($_FILES['itemImg']) && $_FILES['itemImg']['error'] === UPLOAD_ERR_OK) {
        $imageTmp = $_FILES['itemImg']['tmp_name'];
        $imageName = $_FILES['itemImg']['name'];
        $imageSize = $_FILES['itemImg']['size'];
        $compressedPath = "../assets/images/foodimages/compressed_" . $imageName;
        $maxFileSize = 800 * 1024; // Maximum file size in bytes (800KB)

        if ($imageSize <= $maxFileSize) {
            // Compress and save the image
            compressImage($imageTmp, $compressedPath, 75); // Adjust the quality as needed
            $new_img_name = "compressed_$imageName";
        } else {
            $new_img_name = $oldPic;
        }
    } else {
        $new_img_name = $oldPic;
    }

    // Update the item in the database
    $sql = "UPDATE item SET
                item_name='$itemName', 
                item_category='$itemCategory', 
                item_type='$itemType', 
                item_description='$itemDes', 
                item_alergy_informations='$alergyInfo', 
                item_price='$itemPrice', 
                item_cal='$itemCal', 
                is_vegan='$isVegan', 
                is_egg_free='$eggFree', 
                is_sugar_free='$sugarFree', 
                is_spicy='$isSpicy', 
                is_veg='$isVeg', 
                is_diary_free='$diaryFree', 
                is_new='$isNew', 
                is_recom='$isRec',
                item_url='$new_img_name'
            WHERE item_id=$item_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin/products.php");
    } else {
        header("Location: ../admin/products.php");
    }
} elseif (isset($_POST['newBanner'])) {
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];


    // Image upload
    if (isset($_FILES['itemImg']) && $_FILES['itemImg']['error'] === UPLOAD_ERR_OK) {
        $imageTmp = $_FILES['itemImg']['tmp_name'];
        $imageName = $_FILES['itemImg']['name'];
        $imageSize = $_FILES['itemImg']['size'];
        $compressedPath = "../assets/images/topimages/compressed_" . $imageName;
        $maxFileSize = 800 * 1024; // Maximum file size in bytes (450KB)

        // Check if image is within the size limit
        if ($imageSize <= $maxFileSize) {
            // Compress and save the image
            compressImage($imageTmp, $compressedPath, 75); // Adjust the quality as needed

            // Insert the image name into the database
            $sql = "INSERT INTO topmenu (top_title, top_sub, top_url)
                    VALUES ('$title', '$subtitle', 'compressed_$imageName')";

            if ($conn->query($sql) === TRUE) {
                // echo "Item inserted successfully.";
                header("Location: ../admin/ads.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: The image size exceeds the maximum limit of 450KB.";
        }
    } else {
        echo "Error: Failed to upload the image.";
    }
} elseif (isset($_GET['topmenudelete'])) {

    $id = $_GET['topmenudelete'];

    $sql = "DELETE FROM topmenu WHERE top_id =$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin/ads.php");
    } else {
        header("Location: ../admin/ads.php?error");
    }
}



$conn->close();
