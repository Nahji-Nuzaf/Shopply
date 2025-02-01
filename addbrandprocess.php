<?php

include "connectionshop.php";

$nb = $_POST["newbarnd"];

//echo ($nb);

$rs = Shopply::search("SELECT * FROM `brand` WHERE `brand_name`='".$nb."'");
$brand = $rs->num_rows;

if ($brand > 0) {
    echo ("Brand Already Exists");
}else{

    Shopply::iud("INSERT INTO `brand` (`brand_name`) VALUES ('".$nb."')");

    echo ("Success");

}


?>