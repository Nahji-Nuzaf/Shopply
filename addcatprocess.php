<?php

include "connectionshop.php";

$nc = $_POST["newcat"];

//echo ($nc);


$rs = Shopply::search("SELECT * FROM `category` WHERE `category_name`='".$nc."'");
$cat = $rs->num_rows;

if ($cat > 0) {
    echo ("Category Already Exists");
}else{

    Shopply::iud("INSERT INTO `category` (`category_name`) VALUES ('".$nc."')");

    echo ("Success");


}


?>