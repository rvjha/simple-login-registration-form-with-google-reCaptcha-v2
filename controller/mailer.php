<?php 
    function send_mail($otp,$mail)
    {
        if($otp && $mail){
           
            $to = $mail;
            $from = "test@sec.test";
            $subject = "Enquiry Form Message";
            $message = "<b>you need to provide following code to login: </b></br><h3>Your Verification code is: $otp</h3>";
            $headers = "From: $from\n";
            $headers .= "MIME-Version: 1.0\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\n";
            if(@mail($to, $subject, $message, $headers)){
                return true;
            }
            else{
                return false;
             }
        }
    }