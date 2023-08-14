<?php

include 'db.php';
$datatoshow = "";
$sql = 'SELECT item_name, item_type, item_price, item_url FROM item WHERE is_recom=1 AND item_type = "FOOD"';
// Food Options

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    // CHECK IF THERE IS IMG
    $row['item_url'] != '' ? $img = $row['item_url'] : $img = "noimg.jpg";

    $datatoshow .= '
      <a href="javascript:;">
      <div class="menu-category_item">
        <div class="card suggestion_card" style="width: 18rem">
          <img src="assets/images/foodimages/' . $img  . '" class="card-img" alt="..." style="width: 100%; height: 200px; object-fit: cover" />
          <div class="suggestion-card_body d-flex justify-content-between p p-1">
            <p class="suggestion-card_title">' . $row['item_name'] . '</p>
            <p class="suggestion-card_price">Ghc ' . $row['item_price'] . '</p>
          </div>
        </div>
      </div>
    </a>
';
  }
}


echo $datatoshow;
