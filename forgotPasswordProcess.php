<?php

require "connectionshop.php";

// require "SMTP.php";
// require "PHPMailer.php";
// require "Exception.php";

// use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];
    $results = Shopply::search("SELECT * FROM `user` WHERE `email`='".$email."'");
    $row_nums = $results->num_rows;

    if($row_nums == 1){

        $code = uniqid();

        Shopply::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE `email`='".$email."'");

        // $mail = new PHPMailer;
        // $mail->IsSMTP();
        // $mail->Host = 'smtp.gmail.com';
        // $mail->SMTPAuth = true;
        // $mail->Username = '*****************';
        // $mail->Password = '*****************';
        // $mail->SMTPSecure = 'ssl';
        // $mail->Port = 465;
        // $mail->setFrom('********************', 'Reset Password');
        // $mail->addReplyTo('*******************', 'Reset Password');
        // $mail->addAddress($email);
        // $mail->isHTML(true);
        // $mail->Subject = 'Shopply Forgot Password Verification Code';
        // $bodyContent = '<h1 style="color:green">Your Verification Code is '.$code.'</h1>';
        // $bodyContent .= '******************';
        // $mail->Body    = $bodyContent;

        // if(!$mail->send()){
            echo("Verification Code Sending Failed.");
        }else{
            echo("success");
        }

    }else{
        echo("Invalid Email Address");
    }
}else{
    echo("Please Enter your E-mail Address");
}

?>
