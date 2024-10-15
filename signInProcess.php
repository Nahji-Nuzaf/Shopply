<?php

session_start();
require "connectionshop.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["rm"];

if(empty($email)){
    echo("Please Enter your Email Address");
}else if(strlen($email) > 100){
    echo("Email Address cannot be accepted");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Not a Valid Email");
}else if(empty($password)){
    echo("Please enter your password");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo("Incorrect Password");
}else{

    $rs = Shopply::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `password`='".$password."'");
    $n = $rs->num_rows;
    $c = $rs->fetch_assoc();

    if($n == 1){

        if($c["status"] == 1){

            echo("success");

            $_SESSION["shopply"] = $c;

            if($rememberme == true){
                setcookie("email",$email,time()+(60*60*24));
                setcookie("password",$password,time()+(60*60*24));
            }else{
                setcookie("email","",-1);
                setcookie("password","",-1);
            }

        }else{
            echo ("Inactive User");
        }
    }else{
        echo("Please Sign Up Again");
    }
}
?>