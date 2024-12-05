<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
?>
    <div class="main-content">
        <h1><?= !empty($_GET['id']) ? ((!empty($_GET['task']) && $_GET['task'] == "copy") ? "Copy sản phẩm" : "Sửa sản phẩm") : "Thêm sản phẩm" ?></h1>
        <div id="content-box">
            <?php
            if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
                if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['price']) && !empty($_POST['price'])) {
                    $galleryImages = array();
                    if (empty($_POST['name'])) {
                        $error = "Bạn phải nhập tên sản phẩm";
                    } elseif (empty($_POST['price'])) {
                        $error = "Bạn phải nhập giá sản phẩm";
                    } elseif (!empty($_POST['price']) && is_numeric(str_replace('.', '', $_POST['price'])) == false) {
                        $error = "Giá nhập không hợp lệ";
                    }
                    if (isset($_FILES['image']) && !empty($_FILES['image']['name'][0])) {
                        $uploadedFiles = $_FILES['image'];
                        $result = uploadFiles($uploadedFiles);
                        if (!empty($result['errors'])) {
                            $error = $result['errors'];
                        } else {
                            $image = $result['path'];
                        }
                    }
                    if (!isset($image) && !empty($_POST['image'])) {
                        $image = $_POST['image'];
                    }
                    if (isset($_FILES['gallery']) && !empty($_FILES['gallery']['name'][0])) {
                        $uploadedFiles = $_FILES['gallery'];
                        $result = uploadFiles($uploadedFiles);
                        if (!empty($result['errors'])) {
                            $error = $result['errors'];
                        } else {
                            $galleryImages = $result['uploaded_files'];
                        }
                    }
                    if (!empty($_POST['gallery_image'])) {
                        $galleryImages = array_merge($galleryImages, $_POST['gallery_image']);
                    }
                    if (!isset($error)) {if ($_GET['action'] == 'edit' && !empty($_GET['id'])) { //Cập nhật lại sản phẩm
                        // Escape và kiểm tra dữ liệu đầu vào trước khi sử dụng
                        $name = mysqli_real_escape_string($data, $_POST['name']);
                        $image = mysqli_real_escape_string($data, $image);
                        $price = str_replace('.', '', $_POST['price']);
                        $price_goc = str_replace('.', '', $_POST['price_goc']);
                        $SLNhap = mysqli_real_escape_string($data, $_POST['SLNhap']);
                        $tacgia = mysqli_real_escape_string($data, $_POST['tacgia']);
                        $sotrang = mysqli_real_escape_string($data, $_POST['sotrang']);
                        $ctyphathanh = mysqli_real_escape_string($data, $_POST['ctyphathanh']);
                        $last_updated = time();
                    
                        // Câu lệnh SQL UPDATE với các giá trị được escape
                        $result = mysqli_query($data, "UPDATE `product` SET `name` = '$name', `image` = '$image', `price` = $price, `price_goc` = $price_goc, `SLNhap` = '$SLNhap', `tacgia` = '$tacgia', `sotrang` = '$sotrang', `ctyphathanh` = '$ctyphathanh', `last_updated` = $last_updated WHERE `product`.`id` = " . $_GET['id']);
                    
                    
                        } else { //Thêm sản phẩm
                            $result = mysqli_query($data, "INSERT INTO `product` (`id`, `name`, `image`, `price`,`price_goc`, `SLNhap`, `tacgia`,`sotrang`,`ctyphathanh`, `last_updated`) VALUES (NULL, '"
                                . $_POST['name'] . "',
                                '" . $image . "',
                                 " . str_replace('.', '', $_POST['price']) . ",
                                 " . str_replace('.', '', $_POST['price_goc']) . ",
                                 '" . $_POST['SLNhap'] . "',
                                  '" . $_POST['tacgia'] . "',
                                  '" . $_POST['sotrang'] . "',
                                  '" . $_POST['ctyphathanh'] . "',
                                   " . time() . ");");
                        }
                        if (!$result) { //Nếu có lỗi xảy ra
                            $error = "Có lỗi xảy ra trong quá trình thực hiện.";
                        } else { //Nếu thành công
                            if (!empty($galleryImages)) {
                                $product_id = ($_GET['action'] == 'edit' && !empty($_GET['id'])) ? $_GET['id'] : $data->insert_id;
                                $insertValues = "";
                                foreach ($galleryImages as $path) {
                                    if (empty($insertValues)) {
                                        $insertValues = "(NULL, " . $product_id . ", '" . $path . "', " . time() . ", " . time() . ")";
                                    } else {
                                        $insertValues .= ",(NULL, " . $product_id . ", '" . $path . "', " . time() . ", " . time() . ")";
                                    }
                                }
                                $result = mysqli_query($data, "INSERT INTO `image_library` (`id`, `product_id`, `path`, `created_time`, `last_updated`) VALUES " . $insertValues . ";");
                            }
                        }
                    }
                } else {
                    $error = "Bạn chưa nhập thông tin sản phẩm.";
                }
            ?>
                <div class="container">
                    <div class="error"><?= isset($error) ? $error : "Cập nhật thành công" ?></div>
                    <a href="product_listing.php">Quay lại danh sách sản phẩm</a>
                </div>
            <?php
            } else {
                if (!empty($_GET['id'])) {
                    $result = mysqli_query($data, "SELECT * FROM `product` WHERE `id` = " . $_GET['id']);
                    $product = $result->fetch_assoc();
                }
            ?>
                <form id="product-form" method="POST" action="<?= (!empty($product) && !isset($_GET['task'])) ? "?action=edit&id=" . $_GET['id'] : "?action=add" ?>" enctype="multipart/form-data">
                    <input type="submit" title="Lưu sản phẩm" value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên sản phẩm:<input type="text" name="name" value="<?= (!empty($product) ? $product['name'] : "") ?>" /> </label>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá sản phẩm: <input type="text" name="price" value="<?= (!empty($product) ? number_format($product['price'], 0, ",", ".") : "") ?>" /> </label>

                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá gốc: <input type="text" name="price_goc" value="<?= (!empty($product) ? number_format($product['price_goc'], 0, ",", ".") : "") ?>" /> </label>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ảnh sản phẩm: <input type="file" name="image" /> </label>
                        <div class="right-wrap-field">
                            <?php if (!empty($product['image'])) { ?>
                                <img src="../<?= $product['image'] ?>" /><br />
                                <input type="hidden" name="image" value="<?= $product['image'] ?>" />
                            <?php } ?>

                        </div>
                        <div class="clear-both"></div>
                    </div>

                    <div class="wrap-field">
                        <label>Tác giả :<input type="text" name="tacgia" value="<?= (!empty($product) ? $product['tacgia'] : "") ?>" /> </label>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Số lượng Nhập:<input type="text" name="SLNhap" min="1" value="<?= (!empty($product) ? $product['SLNhap'] : "") ?>" /> </label>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Số trang :<input type="text" name="sotrang" value="<?= (!empty($product) ? $product['sotrang'] : "") ?>" /> </label>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Công ty phát hành :<input type="text" name="ctyphathanh" value="<?= (!empty($product) ? $product['ctyphathanh'] : "") ?>" /> </label>
                        <div class="clear-both"></div>
                    </div>
                </form>
                <div class="clear-both"></div>
                <script>
                    CKEDITOR.replace('product-content');
                </script>
            <?php } ?>
        </div>
    </div>

<?php
}
include './footer.php';
?>