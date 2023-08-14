<?php

include 'db.php';
$datatoshow = "0";

$catName = $_POST['catName'];


$sql = "SELECT * FROM item WHERE item_category='$catName'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $datatoshow .= '
        <tr>
            <td class="text-black" style="font-weight: bold;">' . $row['item_name'] . '</td>
            <td>' . $row['item_category'] . '</td>
            <td>' . $row['item_price'] . '</td>
            <td><button type="button" id="abc" 

            data-productid="' . $row['item_id'] . '"
            data-productname="' . $row['item_name'] . '"
            data-productcategory="' . $row['item_category'] . '"
            data-producttype="' . $row['item_type'] . '"
            data-productprice="' . $row['item_price'] . '"
            data-productdescription="' . $row['item_description'] . '"
            data-productalergy="' . $row['item_alergy_informations'] . '"
            data-productcal="' . $row['item_cal'] . '"
            data-productvegan="' . $row['is_vegan'] . '"
            data-productegg="' . $row['is_egg_free'] . '"
            data-productsugar="' . $row['is_sugar_free'] . '"
            data-productspicy="' . $row['is_spicy'] . '"
            data-productveg="' . $row['is_veg'] . '"
            data-productdiary="' . $row['is_diary_free'] . '"
            data-productnew="' . $row['is_new'] . '"
            data-productrecom="' . $row['is_recom'] . '"
            data-producturl="' . $row['item_url'] . '"

                    class="btn btn-primary btn-sm btn-block editPro">EDIT</button>
            </td>
            <td><a href="../config/code.php?productidDelete=' . $row['item_id'] . '"
                    name="catDelete"
                    class="btn btn-danger btn-sm btn-block">DELETE</a>
            </td>

        </tr>
        ';
    }
}

echo $datatoshow;
