<?php

    $result="";
    
    if(isset($_POST['submit'])) {
        require 'mail/PHPMailerAutoload.php';
        $mail - new PHPMailer;
        
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
        $mail->Username='lazziztower@gmail.com';
        $mail->Password='lazziz@tower1';
        
        $mail->setFrom($_POST['email'],$_POST['name']);
        $mail->addAddress('lazziztower@gmail.com');
        $mail->addReplyTo($_POST['email'],$_POST['name']);
        
        $mail->isHTML(true);
        $mail->Subject='Form Submission: '.$_POST['name'].'<br>Email: '.$_POST['email'].'<br>Phone: '.$_POST['phone'].'<br>Message: '.$_POST['msg'].'</h1>';
        
        if(!$mail->send()) {
            $result="Something went wrong. Please try again."
        }
        else {
             $result="Thanks ".$_POST['name']." for connecting us. We'll get back to you soon!";
        }
    }
?>