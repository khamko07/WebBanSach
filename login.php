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
    <title>Đăng nhập</title>

</head>

<body>
    <?php
    session_start();
    include './connect_db.php';
    $error = false;
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "select * from user where (username='" . $username . "'AND password=md5('" . $password . "'))";
        $result = mysqli_query($data, $sql);
        if (!$result) {
            $error = mysqli_error($data);
        } else {
            $row = mysqli_fetch_array($result);
            $_SESSION['current_user'] = $username;
        }

        if ($error !== false || $result->num_rows == 0) {
    ?>
            <script>
                alert("Tài khoản đăng nhập không đúng");
                window.location.href = "./login.php";
            </script>

    <?php
            exit;
        }
        if ($row["status"] == "1") {
            header("location:index.php");
            exit;
        } elseif ($row["status"] == "0") {
            header("location:admin/product_listing.php");
            exit;
        }
    } ?>

    <header class="header">
        <div class="header-1">
            <a href="#" class="logo"><i class="fas fa-book"></i>Book Shop Khamko</a>
            <form action="" class="search-form">
                <input type="search" name="" placeholder="search here..." id="search-box">
                <label for="search-box" class="fas fa-search"></label>
            </form>
            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
                <a href="#" class="fas fa-heart"></a>
                <a href="#cart-btn" class="fas fa-shopping-cart"></a>
                <div id="login-btn" class="fas fa-user"></div>
            </div>

        </div>
        <!-- Tạo header cho các button Trang chủ, fearured,... -->
        <div class="header-2">
            <nav class="navbar">
                <a href="#home">TRANG CHỦ</a>
                <a href="sacgtonghop.php">SÁCH TỔNG HỢP</a>
                <a href="gioithieu.php">GIỚI THIỆU</a>
                <a href="#sach">LIÊN HỆ</a>
            </nav>

        </div>
        </div>
        <!-- Tạo form đăng kí -->
        <div class="login-form-container">
            <div id="close-login-btn" class="fas fa-times"></div>
            <form action="./login.php" method="Post" autocomplete="off">
                <h3>sign in</h3>
                <span>username</span>
                <input type="text" name="username" class="box" placeholder="enter your user" id="">
                <span>userpassword</span>
                <input type="password" name="password" class="box" placeholder="enter your password" id="">
                <div class="checkbox">
                    <input type="checkbox" name="" id="remember-me">
                    <label for="remeber-me">remember</label>

                </div>
                <input type="submit" value="sign in " class="btn">
                <p>forget password ?<a href="#">click here</a></p>
                <p>don't have an account ?<a href="./register.php">creat on</a></p>
            </form>
        </div>
        <section class="home" id="home">
            <div class="row">
                <div class="content">
                    <h3>Welcome to Book Store</h3>
                    <p>This is the best place to buy books in Laos
                    </p>
                         <a href="./login.php" class="btn">Shop now</a>
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
        <section class="icons-container">
          <p style="text-align: center; font-size: 18px;">© 2025 Khamko. All rights reserved</p>
        </section>
    </header>
    <script src="script.js"></script>
</body>

</html>