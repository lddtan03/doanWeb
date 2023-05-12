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

            <div class="content">
                <div class="cards-1">
                    <div class="content-2">
                        <form method="post" enctype="multipart/form-data">
                            <div class="recent-payments">
                                <?php
                                // Kết nối CSDL
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "lagi.shop";
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Kiểm tra kết nối
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Lấy danh sách các Category từ CSDL
                                $sql_cat = "SELECT * FROM `category`";
                                $result_cat = $conn->query($sql_cat);
                                if ($result_cat->num_rows > 0) {
                                    $categories = array();
                                    while ($row_cat = $result_cat->fetch_assoc()) {
                                        $categories[$row_cat['catId']] = $row_cat['catName'];
                                    }
                                } else {
                                    echo "No categories found.";
                                }

                                // Lấy danh sách các Brand từ CSDL
                                $sql_brand = "SELECT * FROM `brand`";
                                $result_brand = $conn->query($sql_brand);
                                if ($result_brand->num_rows > 0) {
                                    $brands = array();
                                    while ($row_brand = $result_brand->fetch_assoc()) {
                                        $brands[$row_brand['brandId']] = $row_brand['brandName'];
                                    }
                                } else {
                                    echo "No brands found.";
                                }

                                // Kiểm tra nếu có giá trị form submit
                                if (isset($_POST['submit'])) {
                                    $productId = $_POST['productId'];
                                    $productName = $_POST['productName'];
                                    $catId = $_POST['catId'];
                                    $brandId = $_POST['brandId'];
                                    $product_desc = $_POST['product_desc'];
                                    $price = $_POST['price'];
                                    $price_discount = $_POST['price_discount'];
                                    $amount = $_POST['amount'];

                                    // Xử lý upload ảnh
                                    $target_dir = "uploads/";
                                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                                        $image = $target_file;
                                    } else {
                                        $image = $_POST['image_old'];
                                    }

                                    // Kiểm tra xem Category ID và Brand ID có hợp lệ hay không
                                    if (!array_key_exists($catId, $categories)) {
                                        echo "Invalid Category ID.";
                                    } else if (!array_key_exists($brandId, $brands)) {
                                        echo "Invalid Brand ID.";
                                    } else {
                                        $sql = "INSERT INTO `product` (`productName`, `catId`, `brandId`, `product_desc`, `price`, `price_discount`, `image`, `amount`) VALUES ('$productName', '$catId', '$brandId', '$product_desc', '$price', '$price_discount', '$image', '$amount')";
                                        if ($conn->query($sql) === TRUE) {
                                            echo "New product created successfully.";
                                        } else {
                                            echo "Error creating product: " . $conn->error;
                                        }
                                    }
                                }

                                $conn->close();
                                ?>
                                <style>
                                    table {
                                        width: 100%;
                                        border-collapse: collapse;
                                    }

                                    td {
                                        padding: 10px;
                                        border: 1px solid #ccc;
                                    }

                                    input[type="text"],
                                    textarea {
                                        width: 100%;
                                        padding: 8px;
                                        border: 1px solid #ccc;
                                        border-radius: 4px;
                                        box-sizing: border-box;
                                    }

                                    select {
                                        width: 100%;
                                        padding: 8px;
                                        border: 1px solid #ccc;
                                        border-radius: 4px;
                                        box-sizing: border-box;
                                        background-color: #fff;
                                        cursor: pointer;
                                    }

                                    input[type="submit"],
                                    input[type="button"] {
                                        background-color: #4CAF50;
                                        border: none;
                                        color: #fff;
                                        padding: 10px 20px;
                                        text-align: center;
                                        text-decoration: none;
                                        display: inline-block;
                                        font-size: 16px;
                                        border-radius: 4px;
                                        cursor: pointer;
                                    }

                                    input[type="file"] {
                                        display: block;
                                        margin-bottom: 10px;
                                    }
                                </style>
                                <table>
                                    <tr>
                                        <td>Product ID:</td>
                                        <td><input type="text" name="productId" value="" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Product Name:</td>
                                        <td><input type="text" name="productName" value=""></td>
                                    </tr>
                                    <tr>
                                        <td>Category:</td>
                                        <td>
                                            <select name="catId">
                                                <?php foreach ($categories as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Brand:</td>
                                        <td>
                                            <select name="brandId">
                                                <?php foreach ($brands as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Product Description:</td>
                                        <td><textarea name="product_desc"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Price:</td>
                                        <td><input type="text" name="price" value=""></td>
                                    </tr>
                                    <tr>
                                        <td>Price Discount:</td>
                                        <td><input type="text" name="price_discount" value=""></td>
                                    </tr>
                                    <tr>
                                        <td>Image:</td>
                                        <td>
                                            <input type="file" name="image">
                                            <input type="hidden" name="image_old" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Amount:</td>
                                        <td><input type="text" name="amount" value=""></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="button" value="Close" onclick="window.location.href='products.php'">
                                            <input type="submit" name="submit" value="Create Product">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
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