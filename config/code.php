<?php

session_start();

include "db.php";


?>

<?php
///////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////// Update CATEGORY ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['updateCategory'])) {


    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }
    // collect value of input field

    $catName = validate($_POST['catName']);
    $section = validate($_POST['section']);
    $sort = validate($_POST['sort']);
    $id = $_POST['id'];

    $sql = "UPDATE categories SET cat_name='$catName', cat_type='$section', cat_sort='$sort' WHERE cat_id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin/index.php");
    } else {
        header("Location: ../admin/index.php");
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// NEW CATEGORY ///////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_POST['newCat'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }
    // collect value of input field

    $catName = validate($_POST['catName']);
    $catSection = validate($_POST['catSection']);
    $catSort = validate($_POST['catSort']);
    $sql = "INSERT INTO categories (cat_name, cat_type, cat_sort) VALUES ('$catName', '$catSection', '$catSort')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin/index.php");
    } else {
        header("Location: ../admin/index.php");
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// DELETE CATEGORY ////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_GET['idDelete'])) {

    $id = $_GET['idDelete'];

    $sql = "DELETE FROM categories WHERE cat_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin/index.php");
    } else {
        header("Location: ../admin/index.php");
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// NEW ITEM ////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_POST['newItem'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }
    // collect value of input field
    $itemName = validate($_POST['itemName']);
    $itemCategory = validate($_POST['itemCategory']);
    $itemSort = validate($_POST['itemSort']);
    $itemPrice = validate($_POST['itemPrice']);
    $itemPrice2 = $_POST['itemPrice2'];
    $multiPrice = $_POST['multiPrice'];
    $item_multi = "";
    if ($multiPrice == "yes") {
        $item_multi = "yes";
    } else {
        $item_multi = "no";
    }

    if ($itemPrice2 > 0) {

        $sql = "INSERT INTO item (item_name, item_category, item_sort, item_multi, item_price, item_price2) VALUES ('$itemName', '$itemCategory', '$itemSort', '$item_multi', '$itemPrice', '$itemPrice2')";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../products.php");
        } else {
            header("Location: ../products.php");
        }
    } else {

        $sql = "INSERT INTO item (item_name, item_category, item_sort, item_multi, item_price) VALUES ('$itemName', '$itemCategory', '$itemSort', '$item_multi', '$itemPrice')";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../products.php");
        } else {
            header("Location: ../products.php");
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// DELETE ITEM ////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_GET['productidDelete'])) {

    $id = $_GET['productidDelete'];

    $sql = "DELETE FROM item WHERE item_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin/products.php");
    } else {
        header("Location: ../admin/products.php");
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// EDIT ITEM ////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_POST['editItem'])) {

    function validate($data)
    {
        $data = str_replace("'", "\\'", $data);
        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }
    // collect value of input field
    $item_id = $_POST['itemId'];
    $itemName = validate($_POST['itemName']);
    $itemCategory = validate($_POST['itemCategory']);
    $itemSort = validate($_POST['itemSort']);
    $itemPrice = validate($_POST['itemPrice']);
    $itemPrice2 = $_POST['itemPrice2'];
    $multiPrice = $_POST['multiPrice'];
    $item_multi = "";
    if ($multiPrice == "yes") {
        $item_multi = "yes";
    } else {
        $item_multi = "no";
    }

    if ($itemPrice2 > 0) {

        $sql = "UPDATE item SET item_name=''$itemName'', item_category='$itemCategory', item_sort='$itemSort', item_multi='$item_multi', item_price='$itemPrice' WHERE item_id='$item_id'";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../products.php");
        } else {
            header("Location: ../products.php");
        }
    } else {

        $sql = "UPDATE item SET item_name=''$itemName'', item_category='$itemCategory', item_sort='$itemSort', item_multi='$item_multi', item_price='$itemPrice' WHERE item_id='$item_id'";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../products.php");
        } else {
            header("Location: ../products.php");
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// DELETE SPECIAL CAT ////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_GET['specialcatDelete'])) {

    $id = $_GET['specialcatDelete'];

    $sql = "DELETE FROM specialcategory WHERE cat_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../specialcat.php");
    } else {
        header("Location: ../specialcat.php");
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// EDIT SPECIAL CAT ////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_POST['editspecat'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }
    // collect value of input field
    $specId = $_POST['specId'];
    $catName = validate($_POST['catName']);





    $sql = "UPDATE specialcategory SET spec_catName='$catName' WHERE cat_id='$specId'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../specialcat.php");
    } else {
        header("Location: ../specialcat.php");
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// EDIT SPECIAL PRODUCT ////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_POST['editItemspec'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }
    // collect value of input field
    $item_id = $_POST['itemId'];
    $itemName = validate($_POST['itemName']);
    $itemCategory = validate($_POST['itemCategory']);
    $itemSort = validate($_POST['itemSort']);
    $itemPrice = validate($_POST['itemPrice']);



    $sql = "UPDATE specialitem SET special_itemName='$itemName', spec_itemCat ='$itemCategory', spec_itemSort='$itemSort', spec_itemPrice='$itemPrice' WHERE spec_itemId ='$item_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../specialpro.php");
    } else {
        header("Location: ../specialpro.php");
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// ADD SPECIAL PRODUCT ////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_POST['newItemspec'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }
    // collect value of input field
    $item_id = $_POST['itemId'];
    $itemName = validate($_POST['itemName']);
    $itemCategory = validate($_POST['itemCategory']);
    $itemSort = validate($_POST['itemSort']);
    $itemPrice = validate($_POST['itemPrice']);



    $sql = "INSERT INTO specialitem (special_itemName, spec_itemCat, spec_itemSort, spec_itemPrice) VALUES ('$itemName', '$itemCategory', '$itemSort', '$itemPrice')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../specialpro.php");
    } else {
        header("Location: ../specialpro.php");
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// DELETE SPECIAL PRODUCT ////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_GET['specialidDelete'])) {


    // collect value of input field
    $item_id = $_GET['specialidDelete'];

    $sql = "DELETE FROM specialitem WHERE spec_itemId = '$item_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../specialpro.php");
    } else {
        header("Location: ../specialpro.php");
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// NEW NEW ITEM ////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_POST['newItemNew'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }
    // collect value of input field


    $itemName = validate($_POST['itemName']);
    $itemPrice = validate($_POST['itemPrice']);

    // collect value of input file Photo
    if (isset($_FILES['itemPic'])) {

        $img_name = $_FILES['itemPic']['name'];
        $img_size = $_FILES['itemPic']['size'];
        $tmp_name = $_FILES['itemPic']['tmp_name'];
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png");
        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("$name", true) . '.' . $img_ex_lc;
            $img_upload_path = '../images/newitems/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
        } else {
            $new_img_name = "";
        }
    }


    $sql = "INSERT INTO newitems (new_name, new_price, new_url) VALUES ('$itemName', '$itemPrice', '$new_img_name')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../newitem.php");
    } else {
        header("Location: ../newitem.php");
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// DELETE NEW ITEM ////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_GET['newidDelete'])) {


    // collect value of input field
    $item_id = $_GET['newidDelete'];

    $sql = "DELETE FROM newitems WHERE new_id = '$item_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../newitem.php");
    } else {
        header("Location: ../newitem.php");
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// EDIT NEW ITEM ////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_POST['editItemNew'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }
    // collect value of input field
    $itemName = validate($_POST['itemName']);
    $itemPrice = validate($_POST['itemPrice']);
    $oldPic = $_POST['oldImage'];
    $item_id = $_POST['itemId'];

    // collect value of input file Photo
    if (isset($_FILES['itemPic'])) {

        $img_name = $_FILES['itemPic']['name'];
        $img_size = $_FILES['itemPic']['size'];
        $tmp_name = $_FILES['itemPic']['tmp_name'];
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png");
        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("$name", true) . '.' . $img_ex_lc;
            $img_upload_path = '../images/newitems/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
        } else {
            $new_img_name = $oldPic;
        }
    } else {
        $new_img_name = $oldPic;
    }





    $sql = "UPDATE newitems SET new_name='$itemName', new_price ='$itemPrice', new_url='$new_img_name' WHERE new_id='$item_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../newitem.php");
    } else {
        header("Location: ../newitem.php");
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// UPDATE WIFI ////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_POST['updatewifi'])) {
    // collect value of input field
    $wifiPass = $_POST['wifiPass'];

    $sql = "UPDATE othersetup SET value_setup='$wifiPass' WHERE otherid=1";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin1.php");
    } else {
        header("Location: ../admin1.php");
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// BACKGROUND IMAGE ////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
} elseif (isset($_POST['updatebg'])) {
    // collect value of input file Photo
    if (isset($_FILES['bgImage'])) {

        $img_name = $_FILES['bgImage']['name'];
        $img_size = $_FILES['bgImage']['size'];
        $tmp_name = $_FILES['bgImage']['tmp_name'];
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png");
        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("$name", true) . '.' . $img_ex_lc;
            $img_upload_path = '../images/background/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
        } else {
            $new_img_name = "";
        }
    }

    $sql = "UPDATE othersetup SET value_setup='$new_img_name' WHERE otherid=2";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin1.php");
    } else {
        header("Location: ../admin1.php");
    }
}
