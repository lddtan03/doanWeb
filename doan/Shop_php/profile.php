
<?php
session_start();

if (!isset($_SESSION['userId'])) {
    header("Location: dangnhap.php");
    exit;
}

// Kết nối tới cơ sở dữ liệu và lấy thông tin user
$pdo = new PDO("mysql:host=localhost;dbname=lagi.shop", "root", "");
$stmt = $pdo->prepare("SELECT * FROM user WHERE userId = :user_id");
$stmt->bindParam(":user_id", $_SESSION['userId']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
</head>

<body>
    <h1>User Profile</h1>
    <p><strong>Name:</strong> <?php echo $user['username']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    <p><strong>Phone:</strong> <?php echo $user['sdt']; ?></p>

    <!-- Form để thay đổi thông tin cá nhân -->
    <form method="post" action="update_user_info.php">
        <label for="new_password">Mật khẩu mới:</label>
        <input type="password" id="new_password" name="new_password" value="<?php echo $user['username']; ?>"><br>

        <label for="new_email">Email mới:</label>
        <input type="email" id="new_email" name="new_email" value="<?php echo $user['username']; ?>"><br>

        <label for="new_phone">Số điện thoại mới:</label>
        <input type="text" id="new_phone" name="new_phone"><br>

        <input type="submit" value="Cập nhật thông tin">
    </form>

    <!-- Nút đăng xuất -->
    <form method="post" action="logout.php">
        <input type="submit" value="Đăng xuất">
    </form>
</body>

</html>