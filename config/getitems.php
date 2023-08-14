<?php

include 'db.php';
$datatoshow = "";

$itemCat = $_POST['itemCat'];
// Food Options
$itemCal = "";
$itemVegan = "";
$itemEgg = "";
$itemSugar = "";
$itemSpicy = "";
$itemVeg = "";
$itemDiary = "";
$itemNew = "";

$sql = "SELECT * FROM item WHERE item_category='$itemCat'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // CHECK IF THERE IS IMG
        $row['item_url'] != '' ? $img = $row['item_url'] : $img = "noimg.jpg";
        // Food Options
        $itemCal = $row['item_cal'];
        $row['is_vegan'] == 1 ? $itemVegan = "<img src='assets/icons/Vegan.svg' class='food-options_icon' alt='' />" : $itemVegan = "";
        $row['is_egg_free'] == 1 ? $itemEgg = "<img src='assets/icons/noeggs.png' class='food-options_icon' alt='' />" : $itemEgg = "";
        $row['is_sugar_free'] == 1 ? $itemSugar = "<img src='assets/icons/nosugar.png' class='food-options_icon' alt='' />" : $itemSugar = "";
        $row['is_spicy'] == 1 ? $itemSpicy = "<img src='assets/icons/pepper.png' class='food-options_icon' alt='' />" : $itemSpicy = "";
        $row['is_veg'] == 1 ? $itemVeg = "<img src='assets/icons/vegetarian.png' class='food-options_icon' alt='' />" : $itemVeg = "";
        $row['is_diary_free'] == 1 ? $itemDiary = "<img src='assets/icons/nomilk.png' class='food-options_icon' alt='' />" : $itemDiary = "";


        $datatoshow .= '
        <div class="col-lg-6 col-sm-12">
        <div class="card mb-3 item-card" style="max-width: 540px; max-width: 100%"  
        data-itemname="' . $row['item_name'] . '"
        data-itemurl="' . $row['item_url'] . '"
        data-itemid="' . $row['item_id'] . '">
<div class="row g-0 preview_card">
    <div class="col-md-4 col-4 preview-card-food_image">
        <img src="assets/images/foodimages/' . $img . '" class="img-fluid rounded-start w-100" alt="..." />
    </div>
    <div class="col-md-8 col-8">
        <div class="card-body">
            <h5 class="preview-card_title">' . $row['item_name'] . '</h5>
<p class="preview-card_text card_snippet overflow-scroll" style="max-height:100px; height: 70px;">
    ' . $row['item_description'] . '
</p>
<div class="card_footer d-flex justify-content-between">
    <div class="food_options">
        ' . $itemVegan . $itemEgg . $itemSugar . $itemSpicy . $itemVeg . $itemDiary . '
</div>
<div class="price">Ghc ' . $row['item_price'] . '</div>
</div>
</div>
</div>
</div>
</div>
</div>

';
    }
}


echo $datatoshow;
