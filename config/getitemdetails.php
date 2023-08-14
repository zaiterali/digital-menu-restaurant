<?php

include 'db.php';
$datatoshow = "";

$itemId = $_POST['itemID'];
$sql = "SELECT * FROM item WHERE item_id='$itemId'";

$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    // CHECK IF THERE IS IMG
    $row['item_url'] != '' ? $img = $row['item_url'] : $img = "noimg.jpg";

    // Food Options

    $row['is_vegan'] == 1 ? $itemVegan = "<li><img src='assets/icons/Vegan.svg' class='modal-food-options_icon' style='height: 20px;width: 20px;' alt='food' /></li>" : $itemVegan = "";
    $row['is_egg_free'] == 1 ? $itemEgg = "<li><img src='assets/icons/noeggs.png' class='modal-food-options_icon' style='height: 20px;width: 20px;' alt='food' /></li>" : $itemEgg = "";
    $row['is_sugar_free'] == 1 ? $itemSugar = "<li><img src='assets/icons/nosugar.png' class='modal-food-options_icon' style='height: 20px;width: 20px;' alt='food' /></li>" : $itemSugar = "";
    $row['is_spicy'] == 1 ? $itemSpicy = "<li><img src='assets/icons/pepper.png' class='modal-food-options_icon' style='height: 20px;width: 20px;' alt='food' /></li>" : $itemSpicy = "";
    $row['is_veg'] == 1 ? $itemVeg = "<li><img src='assets/icons/vegetarian.png' class='modal-food-options_icon' style='height: 20px;width: 20px;' alt='food' /></li>" : $itemVeg = "";
    $row['is_diary_free'] == 1 ? $itemDiary = "<li><img src='assets/icons/nomilk.png' class='modal-food-options_icon' style='height: 20px;width: 20px;' alt='food' /></li>" : $itemDiary = "";



    $datatoshow = '
    <div class="row g-0">
                            <div class="col-md-5 position-relative">
                                <img src="assets/images/foodimages/' . $img  . '" class="img-thumbnail rounded-start"
                                    alt="food img" />

                                <span class="food_badge position-absolute">
                                    <ul class="card-detail-modal_icons d-flex justify-content-center">
                                    ' . $itemVegan . $itemEgg . $itemSugar . $itemSpicy . $itemVeg . $itemDiary . '
                                    </ul>
                                </span>
                            </div>
                            <div class="col-md-7">
                                <div class="modal-body">
                                    <p class="card-detail-modal_text">
' . $row['item_description'] . '
                                    </p>


                                    <div class="card_footer d-flex justify-content-between">
                                        <div class="card-detail-modal_calories">
                                            <p class="calories">' . $row['item_cal'] . ' cal</p>
                                        </div>

                                        <div class="price">Ghc ' . $row['item_price'] . '</div>
                                    </div>

                                    <h5 class="mt-1 card-detail-modal_subtitle">
                                        Allergy Infromation
                                    </h5>
                                    <p id="read_more" class="additional_info" style="font-size: 0.8rem">
                                    ' . $row['item_alergy_informations'] . '
                                    </p>
                                    <div id="caution" style="display: none" class="card-detail-modal_text">
                                        Not all ingredients are listed in the menu. Before placing
                                        your order, please contact the restaurant if a person in
                                        your party has a food allergy or other food sensitivities
                                        <div id="read_less" class="additional_info pt-1"
                                            style="display: none; font-size: 0.8rem">
                                            Read Less
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    ';

    // Rest of your code for processing the data...
} else {
    // Handle the case when no rows or multiple rows are returned
    // For example, display an error message or redirect to an error page
    $datatoshow = "";
}


echo $datatoshow;
