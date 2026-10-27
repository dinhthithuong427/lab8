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

    // Thông tin tài khoản gửi mail của bạn
    $nguoigui = 'dinhthithuong427@gmail.com';
    $matkhau = 'muejwvwlfeoiulzc'; // Mật khẩu ứng dụng 16 ký tự
    $tennguoigui = 'Đinh Thị Thương';

    $mail->Username = $nguoigui; 
    $mail->Password = $matkhau; 
    $mail->SMTPSecure = 'ssl'; 
    $mail->Port = 465; 

    $mail->setFrom($nguoigui, $tennguoigui);
    $mail->isHTML(true); 
    $mail->Subject = 'Thư thông báo gửi hàng loạt từ hệ thống';
    $mail->Body = '<b>Chào bạn!</b>< đây là nội dung thông báo gửi cho nhiều người cùng lúc.';

    
    $recipients = "khanhpd.25it@vku.udn.vn,thuongdt.25it@vku.udn.vn,minhthuong73qb@gmail.com,uyenhpb@vku.udn.vn"; 
    $email_array = explode(",", $recipients);

    foreach ($email_array as $email) {
        $email = trim($email); // Loại bỏ khoảng trắng thừa nếu có
        if (!empty($email)) {
            $mail->addAddress($email, "Bạn đọc"); // Thêm địa chỉ vào danh sách gửi
        }
    }

    $mail->smtpConnect(array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    ));

    $mail->send();
    echo 'Đã gửi email hàng loạt thành công!';

} catch (Exception $e) {
    echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
}
?>