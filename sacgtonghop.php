<?php
session_start();
if (!isset($_SESSION["current_user"])) {
    header("location: login.php");
    exit;
}
?>
<?php
include 'connect_db.php';
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
    <link rel="stylesheet" href="sachtonghop.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <title>Cuahangsach</title>

</head>

<body>
    <?php
    $search = isset($_GET['name']) ? $_GET['name'] : "";
    if ($search) {
        $where = "WHERE `name` LIKE '%" . $search . "%'";
    }
    if ($search) {
        $product = mysqli_query($data, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%' ORDER BY `id` ASC ");
        $totalRecords = mysqli_query($data, "SELECT * FROM `product` WHERE `name` LIKE '%" . $search . "%'");
    } else {
        $product = mysqli_query($data, "SELECT * FROM `product` ORDER BY `id` ASC ");
        $totalRecords = mysqli_query($data, "SELECT * FROM `product`");
    }
    ?>

    <!-- <script src="logout.php"></script> -->
    <header class="header">
        <div class="header-1">
            <a href="#" class="logo"><i class="fas fa-book"></i>Online Book Store</a>
            <form action="" method="GET" class="search-form">
                <input type="search" name="name" placeholder="search here..." id="search-box">
                <label for="search-box" class="fas fa-search" name="timkiem"></label>
            </form>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="cart.php" class="fas fa-shopping-cart"></a>
                    <a href="login.php" class="fas fa-sign-out-alt"></a>
                </div>

        </div>
        <!-- Tạo header cho các button Trang chủ, fearured,... -->
        <div class="header-2">
            <nav class="navbar">
                <a href="index.php">Trang chủ</a>
                <a href="#">SÁCH TỔNG HỢP</a>
                <a href="gioithieu.php">GIỚI THIỆU</a>
                <a href="gioithieu.php">LIÊN HỆ</a>
            </nav>

        </div>
        </div>
        <br>
        <br>
        <div class="featured" id="featured">
            <h1 class="heading"><span>SÁCH TỔNG HỢP </span></h1>
            <div class="product-items">
                <?php
                while ($row = mysqli_fetch_array($product)) {
                ?>
                    <div class="product-item">
                        <div class="product-img">
                            <a href="detail.php?id=<?= $row['id'] ?>"> <img src=".<?= $row['image'] ?>" title="<?= $row['name'] ?>" />
                        </div>
                        <h2><strong><a href="detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></strong><br /></h2>
                        <div class="price">
                            <p><span><?= number_format($row['price'], 0, ",", ".") ?>đ</span></p>
                        </div>
                        <div class="buy-button">
                            <a href="detail.php?id=<?= $row['id'] ?>" class="btn">Mua sản phẩm</a>
                        </div>
                    </div>

                <?php } ?>
            </div>
            </div>
        </div>
    </header>
</body>