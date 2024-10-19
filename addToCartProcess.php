<?php
session_start();
require "connectionshop.php";

if(isset($_SESSION["shopply"])){
    if(isset($_GET["id"])){

        $email = $_SESSION["shopply"]["email"];
        $pid = $_GET["id"];

        $cart_rs = Shopply::search("SELECT * FROM `cart` WHERE `product_product_id`='".$pid."' AND 
                                        `user_email`='".$email."'");
        $cart_num = $cart_rs->num_rows;

        if($cart_num == 1){
            echo ("This Product Already Exists In The Cart");
        }else{
            Shopply::iud("INSERT INTO `cart`(`qty`,`product_product_id`,`user_email`) VALUES 
                        ('1','".$pid."','".$email."')");
            echo ("Product Added to the Cart");
        }

    }
}

?>