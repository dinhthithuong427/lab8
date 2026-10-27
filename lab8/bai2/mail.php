<?php
require "../PHPMailer-master/src/PHPMailer.php"; 
require "../PHPMailer-master/src/SMTP.php";     
require "../PHPMailer-master/src/Exception.php";

if (isset($_POST['email'])) {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true); 
    try {
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true; 

        // Thông tin tài khoản của bạn
        $nguoigui = 'dinhthithuong427@gmail.com';
        $matkhau = 'muejwvwlfeoiulzc'; // Mật khẩu ứng dụng 16 ký tự của bạn
        $tennguoigui = 'Đinh Thị Thương';

        $mail->Username = $nguoigui; 
        $mail->Password = $matkhau; 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Port = 465; 

        $mail->setFrom($nguoigui, $tennguoigui);

        // Lấy dữ liệu từ form index.php truyền lên
        $to = $_POST['email'];
        $to_name = "Bạn";
        $tieude = $_POST['tieude'];

        $mail->addAddress($to, $to_name); 
        $mail->isHTML(true); 
        $mail->Subject = $tieude;

        // Tạo giao diện nội dung email dạng HTML card
        $noidungthu = ' <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><b>Xin chào ' . $to_name . '</b></h5>
                <p class="card-text">' . $_POST['content'] . '</p>
            </div>
        </div>';
        $mail->Body = $noidungthu;

        // Xử lý file đính kèm nếu có upload file
        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
            $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name']));
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $mail->addAttachment($uploadfile, $_FILES['file']['name']);
            }
        }

        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));

        // Gửi mail và chuyển hướng về lại trang index nếu thành công
        if ($mail->send()) {
            echo "Đã gửi mail thành công! <a href='index.php'>Quay lại</a>";
            // Hoặc dùng: header("Location:index.php");
        }
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    }
}
?>