<?php

include "connectionshop.php";

$nm = $_POST["newmodel"];

//echo ($nm);

$rs = Shopply::search("SELECT * FROM `model` WHERE `model_name`='".$nm."'");
$model = $rs->num_rows;

if ($model > 0) {
    echo ("model Already Exists");
}else{

    Shopply::iud("INSERT INTO `model` (`model_name`) VALUES ('".$nm."')");

    echo ("Success");

}


?>