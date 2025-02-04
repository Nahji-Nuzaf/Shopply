<?php

require "connectionshop.php";

if(isset($_GET["cat"])){

    $category_id = $_GET["cat"];

    $categoryrs = Shopply::search("SELECT * FROM `category_has_brand` WHERE 
                    `category_id`='".$category_id."'");

    $category_num = $categoryrs->num_rows;

    for($x = 0;$x < $category_num;$x++){

        $category_data = $categoryrs->fetch_assoc();

        $brand_rs = Shopply::search("SELECT * FROM `brand` WHERE 
                    `brand_id`='".$category_data["brand_brand_id"]."'");

        $brand_data = $brand_rs->fetch_assoc();

        ?>

<option value="<?php echo $brand_data["brand_id"]; ?>"><?php echo $brand_data["brand_name"]; ?></option>

        <?php

    }

}

?>