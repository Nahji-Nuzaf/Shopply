<?php


session_start();
include "connectionshop.php";
$email = $_SESSION["shopply"]["email"];

$prostockList = array();
$qtyList = array();

$address_rs = Shopply::search("SELECT * FROM `user_has_address` WHERE `user_email`='".$email."'");
//$address_num = $address_rs->num_rows;
$address_data = $address_rs->fetch_assoc();

$userdetails_rs = Shopply::search("SELECT * FROM `user` WHERE `email`='".$email."'");
$user = $userdetails_rs->fetch_assoc();

$city = "Colombo";

if (isset($_POST["cart"]) && $_POST["cart"] == "true") {
    // echo ("From Cart");

    $rs = Shopply::search("SELECT * FROM `cart` WHERE `user_email`='".$email."'");
    $num = $rs->num_rows;

    for ($i=0; $i < $num; $i++) { 
        $d = $rs->fetch_assoc();

        $prostockList[] = $d["product_product_id"];
        $qtyList[] = $d["qty"];
    }

} else {
    //From Buy Now
    
    $prostockList[] = $_POST["pid"];
    $qtyList[]= $_POST["qty"];

}

$merchantId = "....";
$merchantSecret = "....";
$items = "";
$netTotal = 0;
$currency = "LKR";
$orderId = uniqid();

for ($i=0; $i < sizeof($prostockList); $i++) {
    
    $rs2 = Shopply::search("SELECT * FROM `product` WHERE `product_id`='".$prostockList[$i]."'");

    $d2 = $rs2->fetch_assoc();
    $stockQty = $d2["qty"];
    
    if ($stockQty >= $qtyList[$i]) {
//         //Stock Available
        $items .= $d2["title"];

        if ($i != sizeof($prostockList) - 1) {
            $items .= ", ";
        }

        $netTotal += (intval($d2["price"]) * intval($qtyList[$i]));

    } else {
        echo("Product has no available stock.");
    }   
}

//Delivary Fee

$delivery = $d2["shipping_cost"];

$subTotal = $netTotal + $delivery;

$hash = strtoupper(
    md5(
        $merchantId . 
        $orderId . 
        number_format($subTotal, 2, '.', '') . 
        $currency .  
        strtoupper(md5($merchantSecret)) 
    ) 
);

$payment = array();
$payment["sandbox"] = true;
$payment["merchant_id"] = $merchantId;
$payment["first_name"] = $user["fname"];
$payment["last_name"] = $user["lname"];
$payment["email"] = $email;
$payment["phone"] = $user["mobile"];
$payment["address"] = $address_data["address"];
$payment["city"] = $city;
$payment["country"] = "Sri Lanka";
$payment["order_id"] = $orderId;
$payment["items"] = $items;
$payment["currency"] = $currency;
$payment["amount"] = number_format($subTotal, 2, '.', '');
$payment["hash"] = $hash;
$payment["return_url"] = "";
$payment["cancel_url"] = "";
$payment["notify_url"] = "";

echo json_encode($payment);


?>