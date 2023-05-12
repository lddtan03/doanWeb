<?php
session_start();

if (isset($_SESSION['userId'])) {
    // Lấy thông tin mới từ form
    $new_password = $_POST['new_password'];
    $new_email = $_POST['new_email'];
    $new_phone = $_POST['new_phone'];

    // Cập nhật thông tin mới vào cơ sở dữ liệu
    $pdo = new PDO("mysql:host=localhost;dbname=your_database_name", "your_username", "your_password");
    $stmt = $pdo->prepare("UPDATE user SET userPassword=:new_password, email=:new_email, sdt=:new_phone WHERE userId=:userId");
    $stmt->bindParam(":new_password", $new_password);
    $stmt->bindParam(":new_email", $new_email);
    $stmt->bindParam(":new_phone", $new_phone);
    $stmt->bindParam(":userId", $_SESSION['userId']);
    $stmt->execute();

    // Hiển thị thông báo cập nhật thành công
    echo "Cập nhật thông tin thành công!";
} else {
    // Nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
    header("Location: dangnhap.php");
    exit;
}
