<?php
session_start();
require "connectionshop.php";

if(isset($_SESSION["shopply"])){
    if(isset($_GET["id"])){

        $email = $_SESSION["shopply"]["email"];
        $pid = $_GET["id"];

        $wishlist_rs = Shopply::search("SELECT * FROM `wishlist` WHERE `product_product_id`='".$pid."' 
        AND `user_email`='".$email."'");

        $wishlist_num = $wishlist_rs->num_rows;

        if($wishlist_num == 1){
            $wishlist_data = $wishlist_rs->fetch_assoc();
            $list_id = $wishlist_data["wishlist_id"];

            Shopply::iud("DELETE FROM `wishlist` WHERE `wishlist_id`='".$list_id."'");
            echo ("Product removed from watchlist successfully.");

        }else{
            Shopply::iud("INSERT INTO `wishlist`(`product_product_id`,`user_email`) VALUES 
            ('".$pid."','".$email."')");

            echo ("Product added to the watchlist successfully.");

        }

    }
}


?>