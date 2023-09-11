<?php
require_once("../model/connect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'email/PHPMailer/src/Exception.php';
require 'email/PHPMailer/src/PHPMailer.php';
require 'email/PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


$noidung = "";
try {                //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'levu1962004@gmail.com';                     //SMTP username
    $mail->Password   = 'kvcupgsllwpafckt';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('levu1962004@gmail.com', 'testemail');
    $mail->addAddress('tranlevu1962004@gmail.com', 'Vutran');     //Add a recipient             //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'THÔNG TIN MUA HÀNG TỪ KEY CENTER';
    $noidung .= '
        <h2>THÔNG TIN MUA HÀNG TỪ KEY CENTER</h2>
        <p> Tên Khách hàng: '  .  $name  . '</p> 
        <p> Số điện thoại: '  . $phone . '</p> 
        <p> Địa chỉ: '  . $address . '</p> 
        <p> Thông tin sản phẩm: '  . $infor . '</p> 
        <p> "Tổng số tiền: '  . $total . '</p> 
        <p> Cảm ơn quý khách đã tin tưởng dùng sản phẩm của chúng tôi! Hy vọng quý khách có thể ghé qua của hàng nhiều hơn, sẽ có nhiều ưu đãi cho khách hàng là thành viên của shop ạ."</p>
    ';
    $mail->Body = $noidung;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<script type=\"text/javascript\">alert(\"Email của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả! Cảm ơn.\");</script>";
} catch (Exception $e) {
    echo "<script type=\"text/javascript\">alert(\"Gửi email lỗi! Vui lòng kiểm tra lại.\");</script>";
}

?>