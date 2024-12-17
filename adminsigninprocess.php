<?php
session_start();
require "connectionshop.php";

$adminemail = $_POST["ae"];
$adminpassword = $_POST["ap"];
$adrememberme = $_POST["arm"];

if(empty($adminemail)){
    
    echo("Please Enter your Email Address");
}else if(strlen($adminemail) > 100){
    echo("Email Address cannot be accepted");
}else if(!filter_var($adminemail,FILTER_VALIDATE_EMAIL)){
    echo("Not a Valid Email");
}else if(empty($adminpassword)){
    echo("Please enter your password");
}else if(strlen($adminpassword) < 5 || strlen($adminpassword) > 20){
    echo("Incorrect Password");
}else{

    $rs = Shopply::search("SELECT * FROM `admin` WHERE `email`='".$adminemail."' AND `password`='".$adminpassword."'");
    $n = $rs->num_rows;

    if($n == 1){
        echo("success");
        $a = $rs->fetch_assoc();
        $_SESSION["shopply"] = $a;
    }else{
        echo("Please Try Again");
    }
}

?>