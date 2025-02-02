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

    // Shopply::iud("INSERT INTO `invoice`(`order_id`,`date`,`amount`,`user_email`) 
    // VALUES('" . $payment["order_id"] . "','" . $time . "','" . $payment["amount"] . "','" . $email . "')");

    //$invoiceId = Shopply::$connection->insert_id;

    // // Log order history ID
    // error_log("Order History ID (checkout): " . $orderHistoryId);

    $rs = Shopply::search("SELECT * FROM `cart` WHERE `user_email`='" . $user["email"] . "'");
    $num = $rs->num_rows;

    for ($i = 0; $i < $num; $i++) {
        //Order Items Insert
        $d = $rs->fetch_assoc();

        Shopply::iud("INSERT INTO `invoice`(`order_id`,`date`,`amount`,`qty`,`status`,`product_product_id`,`user_email`) 
        VALUES('" . $payment["order_id"] . "','" . $time . "','" . $payment["amount"] . "','" . $d["qty"] . "','0','" . $d["product_product_id"] . "','" . $user["email"] . "')");

        $rs2 = Shopply::search("SELECT * FROM `product` WHERE `product_id`='" . $d["product_product_id"] . "'");
        $d2 = $rs2->fetch_assoc();

        $newQty = $d2["qty"] - $d["qty"];
        Shopply::iud("UPDATE `product` SET `qty`='" . $newQty . "' WHERE `product_id`='" . $d["product_product_id"] . "'");
    }

    Shopply::iud("DELETE FROM `cart` WHERE `user_email`='" . $user["email"] . "'");

    echo ("success");
   
    // $order = array();
    // $order["resp"] = "Success";
    // $order["order_id"] = $orderHistoryId;

    // echo json_encode($order);
}
?>

