<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Document</title>

</head>

<body>
    <?php
    include './connect_db.php';
    include './function.php';
    $error = false;


    if (isset($_GET['action']) && $_GET['action'] == 'reg') {
        if (($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && $_POST['confirm_password'] && !empty($_POST['confirm_password']) 
        && isset($_POST['sdt']) && !empty($_POST['sdt'])) {
            if (isset($_POST['password']) && isset($_POST['confirm_password'])) {
                if ($_POST['password'] != $_POST['confirm_password']) {
                    echo '<script>alert("Mật khẩu không khớp! Vui lòng nhập lại");</script>';
                } else {
                    $checkQuery = "SELECT COUNT(*) as count FROM `user` WHERE `username` = '" . $_POST['username'] . "'";
                    $checkResult = mysqli_query($data, $checkQuery);

                    if (!$checkResult) {
                        die("Lỗi truy vấn: " . mysqli_error($data));
                    }

                    $row = mysqli_fetch_assoc($checkResult);
                    if ($row['count'] > 0) {
                        $error = "Tài khoản đã tồn tại. Bạn vui lòng chọn tài khoản khác.";
                    } else {
                        $result = mysqli_query($data, "INSERT INTO `user` (`id`,`username`, `password`, `status`, `sdt`, `create_time`) VALUES
                         ('null', '" . $_POST['username'] . "', MD5('" . $_POST['password'] . "'), 1,'" . $_POST['sdt'] . "', '" . time() . "');");
                        mysqli_close($data);
                    }
                    if ($error !== false) {
    ?>
                        <div id="error-notify" class="box-content">
                            <h1>Thông báo</h1>
                            <h4><?= $error ?></h4>
                            <a href="./register.php">Quay lại</a>
                        </div>
                    <?php } else { ?>
                        <div id="edit-notify" class="box-content">
                            <h1><?= ($error !== false) ? $error : "Đăng ký tài khoản thành công" ?></h1>
                            <a href="./login.php">Mời bạn đăng nhập</a>
                        </div>
                    <?php } ?>
                <?php } ?>

            <?php } ?>
        <?php } else { ?>
            <div id="edit-notify" class="box-content">
                <script>
                    alert("Vui lòng nhập đủ thông tin để đăng ký tài khoản");
                    location.href = "register.php";
                </script>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="login-form-container">
            <div style="width: 100px; height: 100px;" id="close-login-btn" class="fas fa-times"></div>
            <form action="./register.php?action=reg" method="POST" autocomplete="off">
                <h3>ĐĂNG KÍ TÀI KHOẢN</h3>
                <span>Username</span>
                <input type="text" name="username" class="box" placeholder="Enter you name" id="">
                <span>Password</span>
                <input type="password" name="password" class="box" placeholder="Enter you password" id="">
                <span>Nhập Password</span>
                <input type="password" name="confirm_password" class="box" placeholder="Enter you password" id="">
                <span>Số điện thoại</span>
                <input type="text" name="sdt" class="box" placeholder="Enter your phone number" id="">
                <input type="submit" value="Register " class="btn">

            </form>
        </div>
    <?php
    }
    ?>


</body>

</html>