<?php

session_start();
include "connectionshop.php";

if(isset($_SESSION["shopply"])){

    $email = $_SESSION["shopply"]["email"];
    $rating = $_POST["or"];
    $id = $_POST["pid"];
    $feedback = $_POST["f"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Shopply::iud("INSERT INTO `feedback` (`rating`,`feedback`,`date`,`user_email`,`product_product_id`) 
    VALUES ('".$rating."','".$feedback."','".$date."','".$email."','".$id."')");

     echo "success";

}

// echo ($rating);
// echo ($id);

?>