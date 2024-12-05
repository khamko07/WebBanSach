<!DOCTYPE html>
    <head>
        <title>Chi tiết đơn hàng</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"  href="../css/admin_style.css" >
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <?php
        session_start();
        if (!empty($_SESSION['current_user'])) {
            include '../connect_db.php';
            $orders = mysqli_query($data, "SELECT orders.name, orders.address, orders.phone, orders.note, order_detail.*, product.name as product_name FROM orders
             INNER JOIN order_detail ON orders.id = order_detail.order_id
             INNER JOIN product ON product.id = order_detail.product_id
             WHERE orders.id = " . $_GET['id']);
            $orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);
        }
        ?>
        <div id="order-detail-wrapper">
            <div id="order-detail">
                <h1>Chi tiết đơn hàng</h1>
                <label>Người nhận: </label><span> <?= $orders[0]['name'] ?></span><br/>
                <label>Điện thoại: </label><span> <?= $orders[0]['address'] ?></span><br/>
                <label>Địa chỉ: </label><span> <?= $orders[0]['phone'] ?></span><br/>
                <hr/>
                <h3>Danh sách sản phẩm</h3>
                <ul>
                    <?php
                    $totalQuantity = 0;
                    $totalMoney = 0;
                    foreach ($orders as $row) {
                        ?>
                        <li>
                            <span class="item-name"><?= $row['product_name'] ?></span>
                            <span class="item-quantity"> - SL: <?= $row['quantity'] ?> sản phẩm</span>
                        </li>
                        <?php
                        $totalMoney += ($row['price'] * $row['quantity']);
                        $totalQuantity += $row['quantity'];
                    }
                    ?>
                </ul>
                <hr/>
                <label>Tổng SL:</label> <?= $totalQuantity ?> - <label>Tổng tiền:</label> <?= number_format($totalMoney, 0, ",", ".") ?> đ
                <p><label>Ghi chú: </label><?= $orders[0]['note'] ?></p>
            </div>
        </div>
    </body>
</html>