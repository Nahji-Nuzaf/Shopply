<?php

require "connectionshop.php";

if(isset($_GET["c"])){

    $country_id = $_GET["c"];

    $countryrs = Shopply::search("SELECT * FROM `country_code_has_country` WHERE 
                    `country_country_id`='".$country_id."'");

    $country_num = $countryrs->num_rows;

    for($x = 0; $x < $country_num; $x++){

        $country_data = $countryrs->fetch_assoc();

        $country_coders = Shopply::search("SELECT * FROM `country_code` WHERE 
                    `cc_id`='".$country_data["country_code_cc_id"]."'");

        $ccode_data = $country_coders->fetch_assoc();

        ?>

        <option value="<?php echo $ccode_data["cc_id"]; ?>"><?php echo $ccode_data["c_code"]; ?></option>

        <?php
    }

}

?>