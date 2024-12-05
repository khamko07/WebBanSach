<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    $totalRecords = mysqli_query($data, "SELECT * FROM `orders`");
    $totalRecords = $totalRecords->num_rows;

    $orders = mysqli_query($data, "SELECT * FROM `orders` ORDER BY `id` DESC");
    mysqli_close($data);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <title>Document</title>
    </head>

    <body>
        <div class="main-content">
            <h1>Danh sách Đơn hàng</h1>
            <div class="listing-items">
                <div class="total-items">
                    <?php /*
                  <span>Có tất cả <strong><?=$totalRecords?></strong> <?=$config_title?> trên <strong><?=$totalPages?></strong> trang</span> */ ?>
                </div>
                <ul>
                    <li class="listing-item-heading">
                        <div class="listing-prop listing-id">ID</div>
                        <div class="listing-prop listing-name">Tên người nhận</div>
                        <div class="listing-prop listing-address">Địa chỉ</div>
                        <div class="listing-prop listing-phone">Điện thoại</div>
                        <div class="listing-prop listing-button">
                            In đơn
                        </div>
                        <div class="listing-prop listing-time">Ngày đặt hàng</div>
                        <div class="clear-both"></div>
                    </li>
                    <?php while ($row = mysqli_fetch_array($orders)) { ?>
                        <li>
                            <div class="listing-prop listing-id"><?= $row['id'] ?></div>
                            <div class="listing-prop listing-name"><?= $row['name'] ?></div>
                            <div class="listing-prop listing-address"><?= $row['address'] ?></div>
                            <div class="listing-prop listing-phone"><?= $row['phone'] ?></div>
                            <div class="listing-prop listing-button">
                                <a href="order_printing.php?id=<?= $row['id'] ?>" target="_blank">In</a>
                            </div>
                            <div class="listing-prop listing-time"><?= $row['created_time'] ?></div>
                            <div class="clear-both"></div>
                        </li>
                    <?php  } ?>
                </ul>
                <?php /*
              include './pagination.php';
             */ ?>
                <div class="clear-both"></div>
            </div>
        </div>
    <?php
}
include './footer.php';
    ?>
    </body>

    </html>