<?php include 'inc/sessionCheck.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/doan.css">
    <link rel="stylesheet" href="../css/new_products.css">
    <title>Lagi Shop</title>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="dashboard.php">
                        <span class="icon"><ion-icon name="book-outline"></ion-icon></span>
                        <span class="title">Lagi Shop</span>
                    </a>
                </li>
                <li>
                    <a href="dashboard.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="xulydonhang.php">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Oders</span>
                    </a>
                </li>
                <li>
                    <a href="xulydanhmuc.php">
                        <span class="icon"><ion-icon name="bag-outline"></ion-icon></span>
                        <span class="title">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="xulybrand.php">
                        <span class="icon"><ion-icon name="bag-outline"></ion-icon></span>
                        <span class="title">Brands</span>
                    </a>
                </li>
                <li>
                    <a href="products.php">
                        <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                        <span class="title">Products</span>
                    </a>
                </li>
                <li>
                    <a href="xulykhachhang.php">
                        <span class="icon"><ion-icon name="storefront-outline"></ion-icon></span>
                        <span class="title">Users</span>
                    </a>
                </li>
                <li>
                    <a href="account.php">
                        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                        <span class="title">Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="?dangxuat=1">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!--main-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!--search-->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!--userimg-->
                <div class="user">
                    <img src="../img/user.png" alt="">
                </div>
            </div>
            <style>
                .content-2 {
                    padding: 20px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }

                form {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }

                label {
                    font-weight: bold;
                    margin-bottom: 10px;
                }

                input,
                select,
                textarea {
                    margin-bottom: 20px;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    width: 100%;
                    max-width: 400px;
                }

                select {
                    max-width: none;
                }

                textarea {
                    resize: none;
                    height: 100px;
                }

                input[type="submit"] {
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    border-radius: 5px;
                    padding: 10px 20px;
                    cursor: pointer;
                }

                input[type="submit"]:hover {
                    background-color: #0069d9;
                }

                select[disabled] {
                    color: #ccc;
                }
            </style>
            <div class="content">
                <style>
                    .btn {
                        margin: 10px;
                        display: inline-block;
                        font-weight: 400;
                        color: #fff;
                        text-align: center;
                        vertical-align: middle;
                        user-select: none;
                        background-color: #dc3545;
                        border-color: #dc3545;
                        padding: .375rem .75rem;
                        font-size: 1rem;
                        line-height: 1.5;
                        border-radius: .25rem;
                        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                    }

                    .btn:hover {
                        background-color: #c82333;
                        border-color: #bd2130;
                        color: #fff;
                    }

                    .btn span {
                        display: inline-block;
                        margin-left: 5px;
                        margin-right: 5px;
                    }
                </style>
                <div class="mb-10">
                    <a href="xulykhachhang.php" class="btn btn-danger mr-2">
                        <span>Back</span>
                    </a>
                </div>
                <div class="cards-1">
                    <h2>Tạo tài khoản</h2>
                    <div class="content-2">
                        <style>
                            #registerForm {
                                display: grid;
                                grid-template-columns: 1fr 1fr;
                                grid-gap: 20px;
                            }

                            #registerForm label,
                            #registerForm select,
                            #registerForm textarea {
                                grid-column: span 2;
                            }

                            #registerForm textarea {
                                grid-row: span 2;
                            }
                        </style>

                        <form method="post" action="registerUser.php" id="registerForm">
                            <label for="name">Họ và tên:</label>
                            <input type="text" name="name" id="name" required><br><br>
                            <label for="username"> Tên đăng nhập:</label>
                            <input type="text" name="username" id="username" required><br><br>
                            <label for="password">Mật khẩu:</label>
                            <input type="password" name="userPassword" id="userPassword" required><br><br>
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" required><br><br>
                            <label for="gioiTinh">Giới tính:</label>
                            <select name="gioiTinh" id="gioiTinh" required>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select><br><br>
                            <label for="sdt">Số điện thoại:</label>
                            <input type="tel" name="sdt" id="sdt" required><br><br>
                            <label for="ngaySinh">Ngày sinh:</label>
                            <input type="date" name="ngaySinh" id="ngaySinh" required><br><br>
                            <label for="diaChi">Địa chỉ:</label><br>
                            <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
                                <option value="" selected>Chọn tỉnh thành</option>
                            </select>

                            <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
                                <option value="" selected>Chọn quận huyện</option>
                            </select>

                            <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
                                <option value="" selected>Chọn phường xã</option>
                            </select>

                            <textarea name="diaChi" id="diaChi" rows="4" cols="30" required></textarea><br><br>

                            <input type="submit" name="register" value="Đăng ký">
                        </form>
                        <script>
                            document.getElementById('registerForm').addEventListener('submit', function(e) {
                                e.preventDefault(); // Ngăn chặn form submit mặc định

                                // Lấy giá trị từ các trường select và textarea
                                var city = document.getElementById('city').options[document.getElementById('city').selectedIndex].text;
                                var district = document.getElementById('district').options[document.getElementById('district').selectedIndex].text;
                                var ward = document.getElementById('ward').options[document.getElementById('ward').selectedIndex].text;
                                var diaChi = document.getElementById('diaChi').value;

                                // Ghép các giá trị lại thành một chuỗi
                                var diaChiFull = city + ', ' + district + ', ' + ward + ', ' + diaChi;

                                // Gán chuỗi địa chỉ vào trường input "diaChi"
                                document.getElementById('diaChi').value = diaChiFull;

                                // Tiếp tục submit form
                                this.submit();
                            });
                        </script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
                        <script>
                            var citis = document.getElementById("city");
                            var districts = document.getElementById("district");
                            var wards = document.getElementById("ward");
                            var Parameter = {
                                url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
                                method: "GET",
                                responseType: "application/json",
                            };
                            var promise = axios(Parameter);
                            promise.then(function(result) {
                                renderCity(result.data);
                            });

                            function renderCity(data) {
                                for (const x of data) {
                                    citis.options[citis.options.length] = new Option(x.Name, x.Id);
                                }
                                citis.onchange = function() {
                                    district.length = 1;
                                    ward.length = 1;
                                    if (this.value != "") {
                                        const result = data.filter(n => n.Id === this.value);

                                        for (const k of result[0].Districts) {
                                            district.options[district.options.length] = new Option(k.Name, k.Id);
                                        }
                                    }
                                };
                                district.onchange = function() {
                                    ward.length = 1;
                                    const dataCity = data.filter((n) => n.Id === citis.value);
                                    if (this.value != "") {
                                        const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                                        for (const w of dataWards) {
                                            wards.options[wards.options.length] = new Option(w.Name, w.Id);
                                        }
                                    }
                                };
                            }
                        </script>
                    </div>
                </div>
            </div>



            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

            <script>
                //Menu
                let toggle = document.querySelector('.toggle');
                let navigation = document.querySelector('.navigation');
                let main = document.querySelector('.main');

                toggle.onclick = function() {
                    navigation.classList.toggle('active');
                    main.classList.toggle('active');
                }



                //add hovered class in selected list item
                let list = document.querySelectorAll('.navigation li');

                function activeLink() {
                    list.forEach((item) =>
                        item.classList.remove('hovered'));
                    this.classList.add('hovered');
                }
                list.forEach((item) =>
                    item.addEventListener('mouseover', activeLink));
            </script>


</body>

</html>