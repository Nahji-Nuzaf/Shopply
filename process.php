<?php

// session_start();
// require "connectionshop.php";

// if(isset($_SESSION["shopply"])){

//     $proid = $_GET["id"];
//     $qty = $_GET["qty"];
//     $email = $_SESSION["shopply"]["email"];

//     $order_id = uniqid();

//     $product_rs = Shopply::search("SELECT * FROM `product` WHERE `product_id`='".$proid."'");
//     $product_data = $product_rs->fetch_assoc();

//     $price = $product_data["price"];
//     $delivery = $product_data["shipping_cost"];
//     $amount = ($price * $qty) + $delivery;

//     $address_rs = Shopply::search("SELECT * FROM `user_has_address` WHERE `user_email`='".$email."'");
//     $address_num = $address_rs->num_rows;

//     $userdetails_rs = Shopply::search("SELECT * FROM `user` WHERE `email`='".$email."'");
//     $user_data = $userdetails_rs->fetch_assoc();

//     if($address_num == 1 ){
//         $address_data = $address_rs->fetch_assoc();
    
//         $item = $product_data["title"];
//         $fname = $user_data["fname"];
//         $lname = $user_data["lname"];
//         $mobile = $user_data["mobile"];
//         $address = $address_data["address"];
//         $city = "Colombo";


//         $merchant_id = "1224190";
//         $merchant_secret = "MTUyOTc5ODI0NzI1MDk2NzgyMDE0MTkxOTEwMzUxMjY0MTA2MDY5MA==";
//         $currency = "LKR";

//         $hash = strtoupper(
//             md5(
//                 $merchant_id . 
//                 $order_id . 
//                 number_format($amount, 2, '.', '') . 
//                 $currency .  
//                 strtoupper(md5($merchant_secret)) 
//             ) 
//         );

//         $array = [];

//         $array["items"] = $item;
//         $array["first_name"] = $fname;
//         $array["last_name"] = $lname;
//         $array["email"] = $email;
//         $array["phone"] = $mobile;
//         $array["address"] = $address;
//         $array["city"] = $city;
//         $array["country"] = "Sri Lanka";
//         $array["delivery_address"] = $address;
//         $array["delivery_city"] = $city;
//         $array["delivery_country"] = "Sri Lanka";

//         $array["amount"] = $amount;
//         $array["merchant_id"] = $merchant_id;
//         $array["order_id"] = $order_id;
//         $array["currency"] = $currency;
//         $array["hash"] = $hash;

//         $jsonobj = json_encode($array);

//         echo $jsonobj;

//     }else{
//         echo ("address error, Please Update your User Profile !");
//     }

// }

    

?>