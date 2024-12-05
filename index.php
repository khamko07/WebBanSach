<?php
session_start();
if (!isset($_SESSION["current_user"])) {
    header("location: login.php");
    exit;
}
?>
<?php
include './connect_db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="STYLE.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <title>Cuahangsach</title>

</head>

<body>
    <!-- <script src="logout.php"></script> -->
    <header class="header">
        <div class="header-1">
            <a href="#" class="logo"><i class="fas fa-book"></i>Online Book Store</a>
            <form action="" method="GET" class="search-form">
                <input type="search" name="name" placeholder="search here..." id="search-box">
                <label for="search-box" class="fas fa-search" name="timkiem"></label>
            </form>
            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
                <a href="#" class="fas fa-heart"></a>
                <a href="cart.php" class="fas fa-shopping-cart"></a>
                <a href="login.php" class="fas fa-sign-out-alt"></a>
                <h4>Xin chào <?= $_SESSION['current_user'] ?>!</h4>
            </div>

        </div>
        <!-- Tạo header cho các button Trang chủ, fearured,... -->
        <div class="header-2">
            <nav class="navbar">
                <a href="index.php">Trang chủ </a>
                <a href="sacgtonghop.php">Sách tổng hợp</a>
                <a href="gioithieu.php"> Giới thiệu </a>
                <a href="#"> Liên hệ</a>
            </nav>

        </div>
        </div>
        <!--SALE-->
        <section class="home" id="home">
            <div class="row">
                <div class="content">
                    <h3>Welcome to Online Book Store</h3>
                    <p>This is the best Website Online Book Store in Laos
                    </p>
                    <a href="login.php" class="btn">shop now</a>
                </div>
                <!-- Thêm hình ảnh các trang sách-->
                <div class=" books-slider">
                    <div class="wraper">
                        <a href="#"><img src="image/hinh1.jpg" alt=""></a>
                        <a href="#"><img src="image/hinh2.jpg" alt=""></a>
                        <a href="#"><img src="image/hinh3.jpg" alt=""></a>
                        <a href="#"><img src="image/10.jpg" alt=""></a>
                        <a href="#"><img src="image/hinh5.jpg" alt=""></a>
                        <a href="#"><img src="image/hinh6.jpg" alt=""></a>

                    </div>

                </div>

            </div>

        </section>
        <section class="icons-container" >
            <p style="text-align: center; font-size: 18px;">© 2025 Khamko. All rights reserved</p>
        </section>
        <style></style>
           
        </style>
        <!--GIO HANG-->
        <!--Sách bán chạy--"-->
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        <script src="script.js"></script>
</body>

</html>