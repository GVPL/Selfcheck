    <?php
    require("");
    $mail = new PHPMailer();
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host = ""; // SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = "";
    $mail->Password = "Pa\$\$word";

    $mail->FromName = "";
    $mail->From = "";//sender addy
    $mail->AddAddress("");//recip. email addy

    $mail->Subject = "Your Subject";
    $mail->Body = "hi ! \nBLA BLA BLA !";
    $mail->WordWrap = 50;

    if(!$mail->Send())
    {
    echo "Message was not sent";
    echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
    echo "Message has been sent";
    }
    ?>
