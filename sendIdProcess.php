<?php

session_start();
require "connectionshop.php";

$email = $_SESSION["shopply"]["email"];
$pid = $_GET["id"];

$product_rs = Shopply::search("SELECT * FROM `product` WHERE `product_id`='".$pid."' AND 
                                    `user_email`='".$email."'");

$product_num = $product_rs->num_rows;

if($product_num == 1){

    $product_data = $product_rs->fetch_assoc();
    $_SESSION["product"] = $product_data;
    echo ("success");

}else{
    echo ("Something went wrong");
}

?>