<?php

// if(isset($_POST['Submit'])){

    require 'phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Mailer = 'smtp';
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'lipundebidutta.db@gmail.com';                 // SMTP username
    $mail->Password = 'qwerty123LIPUN';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom($_POST['client_email'],$_POST['name']);
    $mail->addAddress('debidutta.db@gmail.com', 'ADglob');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo($_POST['client_email'], $_POST['name']);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    // $mail->Subject = $_POST['subject'].$_POST['select_service'];
    $mail->Subject = $_POST['subject'];



    $mail->Body    = "Name = ".$_POST['name']." , \r\n".
                        "Email = ". $_POST['client_email'] ." , \r\n".
                            "Phone No = ".$_POST['phone'] ." , \r\n".
                                "Subject = ".$_POST['subject']." , \r\n".
                                    "Message = ". $_POST['message'];

    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        
        echo "<h1 style=color:red;margin-top:24%;margin-left:38%;background:transparent>Message could not be sent !!!</h1>";
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
        // header("Location:tryagain.html");

    } else {
        // echo 'Message has been sent';
        header("Location:index.html");
    }

// }    
?>