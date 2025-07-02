<?php

session_start();
require "connectionshop.php";

if(isset($_SESSION["shopply"])){

    $o_id = $_POST["o"];
    $p_id = $_POST["i"];
    $email = $_POST["m"];
    $amount = $_POST["a"];
    $quantity = $_POST["q"];

    $product_rs = Shopply::search("SELECT * FROM `product` WHERE `product_id` = '".$p_id."'");
    $product_data = $product_rs->fetch_assoc();

    $old_qty = $product_data["qty"];
    $new_qty = $old_qty - $quantity;

    Shopply::iud("UPDATE `product` SET `qty` = '".$new_qty."' WHERE `product_id` = '".$p_id."'");

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Shopply::iud("INSERT INTO `invoice` (`order_id`,`date`,`amount`,`qty`,`status`,`product_product_id`,`user_email`)
                    VALUES ('".$o_id."','".$date."','".$amount."','".$quantity."','0','".$p_id."','".$email."')");

    echo "success";

}