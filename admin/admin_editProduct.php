<?php
$title = "Cập nhật sản phẩm";

require_once 'init.php';
if (isset($_GET)) {
    $product = getProduct($_GET["id"]);
}

?>
<?php include './admin_header.php'; ?>
<?php include './admin_side-menu.php'; ?>
<h2 class="text-center">CẬP NHẬT SẢN PHẨM</h2>
<div class="panel-form my-5">
    <div class="col-lg-8 mx-auto">
        <div class="mb-3">
            <label for="id" class="form-label fw-bold">Mã sản phẩm</label>
            <input id="id" name="id" type="text" class="form-control" style="background-color: #81F7D8; text-align: center;" readonly="readonly" value="<?php echo $product["id_product"] ?>">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Tên sản phẩm</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" required value="<?php echo $product["name"] ?>">
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="gender" class="form-label fw-bold">Giới tính</label>
                    <select class="form-select" name="gender" id="gender" required>
                        <option> -- Chọn giới tính -- </option>
                        <option value="1" <?php echo $product["gender"] == 1 ? ' selected' : '' ?>>Nam</option>
                        <option value="2" <?php echo $product["gender"] == 2 ? ' selected' : '' ?>>Nữ</option>
                        <option value="3" <?php echo $product["gender"] == 3 ? ' selected' : '' ?>>Trẻ em</option>
                        <option value="4" <?php echo $product["gender"] == 4 ? ' selected' : '' ?>>Cả nam và nữ</option>
                    </select>
                </div>
                <div class="col">
                    <label for="type" class="form-label fw-bold" required>Loại sản phẩm</label>
                    <select class="form-select" id="type" name="type">
                        <?php echo renderComboboxTypeSelected($product["id_type"]) ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="color" class="form-label fw-bold" required>Màu sắc</label>
                    <select class="form-select" id="color" name="color" required>
                        <?php echo renderComboboxColorSelected($product["id_color"]) ?>
                    </select>
                </div>
                <div class="col">
                    <label for="quantity" class="form-label fw-bold">Số lượng</label>
                    <input name="quantity" type="number" class="form-control" id="quantity" placeholder="Số lượng" value="<?php echo $product["quantity"] ?>" required>
                </div>
            </div>
        </div>
        <!-- Text area editor -->
        <div class="mb-3">
            <label for="desc" class="form-label fw-bold">Chi tiết sản phẩm</label>
            <textarea id="desc" name="desc" required ></textarea>
        </div>
        <div class="mb-3">
            <div class="row mt-3">
                <div class="col">
                    <label for="import_price" class="form-label fw-bold">Giá nhập</label>
                    <input name="import_price" type="number" class="form-control" id="import_price" placeholder="Giá nhập" required value="<?php echo $product["import_price"] ?>">
                </div>
                <div class="col">
                    <label for="import_price" class="form-label fw-bold">Giá bán</label>
                    <input name="price" type="number" class="form-control" id="price" placeholder="Giá bán" required value="<?php echo $product["price"] ?>">
                </div>
                <div class="col">
                    <label for="promotion_price" class="form-label fw-bold">Giá khuyến mãi</label>
                    <input name="promotion_price" type="number" class="form-control" id="promotion_price" placeholder="Giá khuyến mãi" required value="<?php echo $product["promotion_price"] ?>">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Hình ảnh mô tả</label>
            <div class="file-loading">
                <input id="input-res-1" name="input-res-1[]" type="file" multiple>
            </div>
        </div>
        <div class="mb-3">
            <div class="row mt-5">
                <div class="col">
                    <!-- Checked switch -->
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="hotCheck" name="hot" <?php echo $product["hot"] == 1 ? ' checked' : '' ?> />
                        <h5 class="form-check-label fw-bold" for="hotCheck">Sản phẩm bán chạy</h5>
                    </div>
                </div>
                <div class="col">
                    <!-- Checked switch -->
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="newCheck" name="new" <?php echo $product["new"] == 1 ? ' checked' : '' ?> />
                        <h5 class="form-check-label fw-bold" for="newCheck">Sản phẩm mới</h5>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4 py-1">
        <div class="row">
            <div class="text-end">
                <a href="./admin_productsAll.php"  class="btn btn-danger fw-bold" name="cancel">Hủy</a>
                <a class="btn btn-success fw-bold" name="update" id="btn-update">Cập nhật sản phẩm</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#desc').summernote('code', <?php  echo  "'".($product["description"])."'"  ?>);
        $("#btn-update").click(function(event) {
            $.ajax({
                url: "admin_productsAll.php",
                type: "POST",
                cache: false,
                data: {
                    id: $("#id").val(),
                    name: $("#name").val(),
                    gender: $("#gender").val(),
                    type: $("#type").val(),
                    color: $("#color").val(),
                    quantity: $("#quantity").val(),
                    desc: $("#desc").val(),
                    import_price: $("#import_price").val(),
                    price: $("#price").val(),
                    promotion_price: $("#promotion_price").val(),
                    hot: $('#hotCheck').is(":checked")?1:0,
                    new: $('#newCheck').is(":checked")?1:0,
                    update: ""
                },
                success: function(data) {
                    document.location = "admin_productsAll.php"; // tried this doesn't work
                },
            });
        });
    })
</script>
<?php include './admin_footer.php'; ?>