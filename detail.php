<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="STYLE.css">
    <link rel="stylesheet" href="detail.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <title>chi tiet sp</title>

</head>

<body>
    <header class="header">
        <div class="header-1">
            <a href="#" class="logo"><i class="fas fa-book"></i>Online Book Store</a>
            <form action="" class="search-form" method="post">
                <input type="search" name="tukhoa" placeholder="search here..." id="search-box">
                <label for="search-box" class="fas fa-search"></label>
            </form>
            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
                <a href="#" class="fas fa-heart"></a>
                <a href="#cart-btn" class="fas fa-shopping-cart"></a>
                <a href="login.php" class="fas fa-sign-out-alt"></a>
            </div>

        </div>
        <!-- Tạo header cho các button Trang chủ, fearured,... -->
        <div class="header-2">
            <nav class="navbar">
                <a href="index.php">Trang chủ </a>
                <a href="sacgtonghop.php">Sách tổng hợp</a>
                <a href="#featured"> Giới thiệu </a>
                <a href="#sach"> Liên hệ</a>
            </nav>

        </div>
        </div>
        <!-- Tạo form đăng kí -->
        <div class="login-form-container">
            <div id="close-login-btn" class="fas fa-times"></div>
            <form action="">
                <h3>sign in</h3>
                <span>username</span>
                <input name="username" class="box" placeholder="enter your email" id="">
                <span>userpassword</span>
                <input type="password" name="password" class="box" placeholder="enter your password" id="">
                <div class="checkbox">
                    <input type="checkbox" name="" id="remember-me">
                    <label for="remeber-me">remember</label>

                </div>
                <input type="submit" value="sign in " class="btn">
                <p>forget password ?<a href="#">click here</a></p>
                <p>don't have an account ?<a href="#">creat on</a></p>
            </form>
        </div>

        <?php
        include './connect_db.php';
        $result = mysqli_query($data, "SELECT * FROM `product` WHERE `id` = " . $_GET['id']);
        $product = mysqli_fetch_assoc($result);

        ?>
        <!--Chi tiêt san pham-->
        <div class="flex-box">
            <div class="left">
                <div class="big-img">
                    <img src=".<?= $product['image'] ?>" style="width: 27rem; height: 30rem;">
                </div>
            </div>
        </div>
        <div style=" margin-right: 470px;" class="right">
            <div class="pname">
                <h2><?= $product['name'] ?></h2>
            </div><br>
            <h3>Thông Tin Sản Phẩm</h3>
            <p style="font-size: 1.5rem;">Tên tác phẩm : <?= $product['name'] ?></p><br>
            <p>NXB :<?= $product['NXB'] ?></p><br>
            <p>Số trang :<?= $product['sotrang'] ?></p><br>
            <p>Công ty phát hành :<?= $product['ctyphathanh'] ?></p><br>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <label>Giá:</label><span style="font-size: 2rem;" class="product-price"><?= number_format($product['price'], 0, ",", ".") ?> VND</span><br />
            <form id="add-to-cart-form" action="cart.php?action=add" method="POST">
                <a style="font-size:1.5rem ;">Số lượng

                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $quantity = $_POST["quantity"];

                        if ($quantity < 0) {
                            echo "Lỗi: Số lượng không được âm.";
                        } 
                         
                       
                    }



                    ?>

                    <form method="POST" action="">
                        <input type="number" min="1" value="1" name="quantity[<?= $product['id'] ?>]" size="2" />
                    </form><br>
                    <input href="carrt.php" class="btn" type="submit" value="Mua sản phẩm" />
            </form>
            <?php if (!empty($product['images'])) { ?>
                <div id="gallery">
                    <ul>
                        <?php foreach ($product['images'] as $img) { ?>
                            <li><img src="<?= $img['path'] ?>" /></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
        </div>
        </div>



        <section class="footer">
            <div class="icons">
                <i class="fas fa-plane"></i>
                <div class="content">
                    <h3>
                        free shipping
                    </h3>
                    <p>order over $100</p>

                </div>

            </div>
            <div class="icons">
                <i class="fas fa-clock"></i>
                <div class="content">
                    <h3>
                        secure payment
                    </h3>
                    <p>Secure payment</p>
                </div>
            </div>
            <div class="icons">
                <i class="fas fa-redo-alt"></i>
                <div class="content">
                    <h3>
                        returns
                    </h3>
                    <p>10 days returns</p>
                </div>
            </div>
            <div class="icons">
                <i class="fas fa-headset"></i>
                <div class="content">
                    <h3>
                        24/7 support
                    </h3>
                    <p>call us anytime</p>
                </div>
            </div>
        </section>

        <script>
            let bigImg = document.querySelector('.big-img img');

            function showImg(pic) {
                bigImg.src = pic;
            }
        </script>
    </header>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script src="script.js"></script>
</body>

</html>