<?php
session_start();
ob_start();
// require('email.php');
$conn = mysqli_connect('localhost', 'root', '', 'lagi.shop');
$name = $_POST['name'];
$username = $_POST['username'];
$userPassword = $_POST['userPassword'];
$email = $_POST['email'];
$gioiTinh = $_POST['gioiTinh'];
$sdt = $_POST['sdt'];
$ngaySinh = $_POST['ngaySinh'];
$diaChi = $_POST['diaChi'];
// $password_confirm = $_POST['password_confirm'];
$data = array();
$error = array();
if (empty($name)) {
    $error['name'] = "Không được để trống họ tên";
} 
if (empty($username)) {
    $error['username'] = "Không được để trống họ tên";
} else {
    $pattern = '/^([a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]{1,10})((\s{1}[a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]{1,10}){0,5})$/';
    if (!preg_match($pattern, mb_strtolower($username))) {
        $error['username'] = "Họ tên không chứa ký tự đặt biệt, không chứa số";
    }
}

$sql_email = "SELECT * from `user` where email = '$email'";
$result_email = mysqli_query($conn, $sql_email);
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

if (empty($diaChi)) {
    $error['diaChi'] = "Không được để trống địa chỉ";
} else {
    $pattern = '/^([,.0-9a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]{1,10})((\s{1}[,.0-9a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]{1,10}){0,5})$/';
    if (!preg_match($pattern, mb_strtolower($diaChi))) {
        $error['diaChi'] = "Địa chỉ không chứa ký tự đặc biệt";
    }
}

if (empty($userPassword)) {
    $error['userPassword'] = "Không được để trống mật khẩu";
} else {
    $pattern = '/^[A-Za-z0-9_\.!@#$%^&*()]{5,32}$/';
    if (!preg_match($pattern, $userPassword)) {
        $error['userPassword'] = "Mật khẩu chứa ít nhất 5 ký tự, không chứa khoảng trắng và không có dấu";
    }
}

if (isset($_POST['btnSignUp'])) {
    if (empty($error)) {
        $data['is_sign_up'] = 1;
        $sql = "INSERT INTO `user`(`name`, `username`, `userPassword`, `email`, `gioiTinh`,`sdt`,`ngaySinh`,`diaChi`) VALUES ('$name','$username','$userPassword','$email','$gioiTinh','$sdt','$ngaySinh','$diaChi')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            alert('sjfjbisbdfs');
            header("Location: dangnhap.php");
            exit;
        } else {
            header("Location: dangky.php");
            exit;
        }
    }
}

$data['error'] = $error;
echo json_encode($data);
?>


