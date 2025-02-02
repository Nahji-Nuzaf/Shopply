<?php

include "connectionshop.php";
session_start();
$user = $_SESSION["shopply"];
$email = $_SESSION["shopply"]["email"];

if (isset($_POST["payment"])) {

    $payment = json_decode($_POST["payment"], true);

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("Asia/Colombo"));
    $time = $date->format("Y-m-d H-i-s");

    

    Shopply::iud("INSERT INTO `invoice`(`order_id`,`date`,`amount`,`qty`,`status`,`product_product_id`,`user_email`) 
    VALUES('" . $payment["order_id"] . "','" . $time . "','" . $payment["amount"] . "','" . $payment["qty"] . "','0','" . $payment["pro_id"] . "','" . $user["email"] . "')");

    

    $rs = Shopply::search("SELECT * FROM `product` WHERE `product_id`='" . $payment["pro_id"] . "'");
    $d = $rs->fetch_assoc();

    $newQty = $d["qty"] - $payment["qty"];
    Shopply::iud("UPDATE `product` SET `qty`='" . $newQty . "' WHERE `product_id`='" . $payment["pro_id"] . "'");

    echo ("success");

    // $order = array();
    // $order["resp"] = "Success";
    // $order["order_id"] = $orderHistoryId;

    //echo json_encode($order);
}
?>
