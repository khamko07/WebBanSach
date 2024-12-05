<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
        $_SESSION['product_filter'] = $_POST;
        header('Location: product_listing.php');exit;
    }
    if(!empty($_SESSION['product_filter'])){
        $where = "";
        foreach ($_SESSION['product_filter'] as $field => $value) {
            if(!empty($value)){
                switch ($field) {
                    case 'name':
                    $where .= (!empty($where))? " AND "."`".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";
                    break;
                    default:
                    $where .= (!empty($where))? " AND "."`".$field."` = ".$value."": "`".$field."` = ".$value."";
                    break;
                }
            }
        }
        extract($_SESSION['product_filter']);
    }
    if(!empty($where)){
        $products = mysqli_query($data, "SELECT * FROM `product` where (".$where.") ORDER BY `id` DESC  " );
    }else{
        $products = mysqli_query($data, "SELECT * FROM `product` ORDER BY `id` DESC " );
    }
    mysqli_close($data);
    ?>
    <div class="main-content">
        <h1>Danh sách sản phẩm</h1>
        <div class="product-items">
            <div class="buttons">
                <a href="./product_editing.php">Thêm sản phẩm</a>
            </div>
            <div class="product-search">
                <form id="product-search-form" action="product_listing.php?action=search" method="POST">
                    <fieldset>
                        <legend>Tìm kiếm sản phẩm:</legend>
                        ID: <input type="text" name="id" value="<?=!empty($id)?$id:""?>" />
                        Tên sản phẩm: <input type="text" name="name" value="<?=!empty($name)?$name:""?>" />
                        <input type="submit" value="Tìm" />
                    </fieldset>
                </form>
            </div>
            <ul>
                <li class="product-item-heading">
                    <div class="product-prop product-img">Ảnh</div>
                    <div class="product-prop product-name">Tên sản phẩm</div>
                    <div class="product-prop product-price">Giá</div>
                    <div class="product-prop product-goc">Giá gốc</div>
                    <div class="product-prop product-SL">SL</div>
                    
                    <div class="product-prop product-button">
                        Xóa
                    </div>
                    <div class="product-prop product-button">
                        Sửa
                    </div>
                    <div class="clear-both"></div>
                </li>
                <?php
                while ($row = mysqli_fetch_array($products)) {
                    ?>
                    <li>
                        <div class="product-prop product-img"><img src="../<?= $row['image'] ?>" alt="<?= $row['name'] ?>" title="<?= $row['name'] ?>" /></div>
                        <div class="product-prop product-name"><?= $row['name'] ?></div>
                        <div class="product-prop product-price"><?= $row['price'] ?></div>
                        <div class="product-prop product-goc"><?= $row['price_goc'] ?></div>
                        <div class="product-prop product-SL"><?= $row['SLNhap'] ?></div>
                        <div class="product-prop product-button">
                            <a href="./product_delete.php?id=<?= $row['id'] ?>">Xóa</a>
                        </div>
                        <div class="product-prop product-button">
                            <a href="./product_editing.php?id=<?= $row['id'] ?>">Sửa</a>
                        </div>
                        <div class="clear-both"></div>
                    </li>
                <?php } ?>
            </ul>
            <?php
            include './pagination.php';
            ?>
            <div class="clear-both"></div>
        </div>
    </div>
    <?php
}
include './footer.php';
?>