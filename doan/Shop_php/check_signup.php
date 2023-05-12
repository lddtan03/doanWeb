<?php
// Kết nối đến database
$pdo = new PDO('mysql:host=localhost;dbname=lagi.shop', 'root', '');

// Lấy dữ liệu từ form
$name = $_POST['name'];
$username = $_POST['username'];
$userPassword = $_POST['userPassword'];
$email = $_POST['email'];
$gioiTinh = $_POST['gioiTinh'];
$sdt = $_POST['sdt'];
$ngaySinh = $_POST['ngaySinh'];
$diaChi = $_POST['diaChi'];

if (empty($name)) {
    $error['name'] = "Không được để trống họ tên";
} else {
    $pattern = '/^([a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]{1,10})((\s{1}[a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]{1,10}){0,5})$/';
    if (!preg_match($pattern, mb_strtolower($username))) {
        $error['name'] = "Họ tên không chứa ký tự đặt biệt, không chứa số";
    }
}

if (empty($username)) {
    $error['username'] = "Không được để trống họ tên";
} else {
    $pattern = '/^([a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]{1,10})((\s{1}[a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]{1,10}){0,5})$/';
    if (!preg_match($pattern, mb_strtolower($username))) {
        $error['username'] = "Tên đăng nhập không chứa ký tự đặt biệt, không chứa số";
    }
}


if (empty($userPassword)) {
    $error['userPassword'] = "Không được để trống mật khẩu";
} else {
    $pattern = '/^[A-Za-z0-9_\.!@#$%^&*()]{5,32}$/';
    if (!preg_match($pattern, $password)) {
        $error['userPassword'] = "Mật khẩu chứa ít nhất 5 ký tự, không chứa khoảng trắng và không có dấu";
    }
}


$sql_email = "SELECT * from `user` where email = '$email'";
$result_email = mysqli_query($pdo, $sql_email);
if (empty($email)) {
    $error['email'] = "Không được để trống email";
} else {
    // $pattern = '/^[A-Za-z0-9_\.]{6,32}$/';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Email không đúng định dạng";
    } else if (mysqli_num_rows($result_email) > 0) {
        $error['email'] = "Email đã tồn tại trên hệ thống, vui lòng nhập email khác";
    }
}


if (empty($sdt)) {
    $error['sdt'] = "Không được để trống số điện thoại";
} else {
    $pattern = '/^[0]{1}[0-9_\.]{9}$/';
    if (!preg_match($pattern, $sdt)) {
        $error['sdt'] = "Số điện thoại chứa 10 số, bắt đầu là số 0";
    }
}


// if (empty($ngaySinh)) {
//     $error['ngaySinh'] = "Không được để trống ngày sinh";
// } 


if (empty($diaChi)) {
    $error['diaChi'] = "Không được để trống địa chỉ";
} else {
    $pattern = '/^([,.0-9a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]{1,10})((\s{1}[,.0-9a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]{1,10}){0,5})$/';
    if (!preg_match($pattern, mb_strtolower($diaChi))) {
        $error['diaChi'] = "Địa chỉ không chứa ký tự đặc biệt";
    }
}

$data['error'] = $error;
echo json_encode($data);
?>



// Mã hóa mật khẩu
// $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
// Chuẩn bị câu truy vấn SQL
// $sql = "INSERT INTO user (name, username, userPassword, email, gioiTinh, sdt, ngaySinh, diaChi)
//         VALUES (:name, :username, :userPassword, :email, :gioiTinh, :sdt, :ngaySinh, :diaChi)";
// $stmt = $pdo->prepare($sql);

// Gán giá trị vào các biến trong câu truy vấn
// $stmt->bindParam(':name', $name);
// $stmt->bindParam(':username', $username);
// $stmt->bindParam(':userPassword', $hashedPassword);
// $stmt->bindParam(':email', $email);
// $stmt->bindParam(':gioiTinh', $gioiTinh);
// $stmt->bindParam(':sdt', $sdt);
// $stmt->bindParam(':ngaySinh', $ngaySinh);
// $stmt->bindParam(':diaChi', $diaChi);

// Thực thi câu truy vấn
// $result = $stmt->execute();

if ($result) {
    header("Location: dangnhap.php");
    exit;
} else {
    header("Location: dangky.php");
    exit;
}