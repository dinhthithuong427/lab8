<?php
require "../PHPMailer-master/src/PHPMailer.php"; 
require "../PHPMailer-master/src/SMTP.php";     
require "../PHPMailer-master/src/Exception.php";

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->CharSet = "utf-8";
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;

    $nguoigui = 'dinhthithuong427@gmail.com';
    $matkhau = 'muejwvwlfeoiulzc';
    $tennguoigui = 'Đinh Thị Thương';

    $mail->Username = $nguoigui;
    $mail->Password = $matkhau;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom($nguoigui, $tennguoigui);
    
    $to = "thuongdt.25it@vku.udn.vn";
    $to_name = "Bạn nhận";
    $mail->addAddress($to, $to_name); 

    $mail->isHTML(true);
    $mail->Subject = 'Gửi thư từ PHP - Lab 8';
    $mail->Body = "<b>Chào bạn!</b><br>Chúc an lành và học tập tốt!";

    $mail->smtpConnect(array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    ));

    $mail->send();
    echo 'Đã gửi mail xong';

} catch (Exception $e) {
    echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
}
?>