<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>DEMO GỬI EMAIL</title>
    <!-- Sử dụng Bootstrap cho giao diện đẹp và gọn gàng -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Email tới bạn</h2>
        <form action="mail.php" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label>Email người nhận:</label>
                <input type="email" class="form-control" name="email" placeholder="Nhập email người nhận" required>
            </div>
            
            <div class="form-group">
                <label>Tiêu đề:</label>
                <input type="text" class="form-control" name="tieude" placeholder="Nhập tiêu đề thư" required>
            </div>
            
            <div class="form-group">
                <label>Nội dung:</label>
                <textarea name="content" id="editor" class="form-control" rows="5" placeholder="Nhập nội dung thư..."></textarea>
            </div>
            
            <div class="form-group">
                <label>File đính kèm:</label>
                <input type="file" class="form-control-file" name="file">
            </div>
            
            <button type="submit" class="btn btn-primary">Gửi</button>
        </form>
    </div>
</body>
</html>