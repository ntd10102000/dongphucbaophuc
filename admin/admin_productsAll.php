<?php
$title = "Danh sách sản phẩm";

require_once 'init.php';
if (
    isset($_POST['id']) && isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['type'])
    && isset($_POST['color']) && isset($_POST['quantity']) && isset($_POST['desc']) && isset($_POST['import_price'])
    && isset($_POST['price']) && isset($_POST['promotion_price'])
) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $type = $_POST['type'];
    $color = $_POST['color'];
    $quantity = $_POST['quantity'];
    $desc = $_POST['desc'];
    $import_price = $_POST['import_price'];
    $price = $_POST['price'];
    $promotion_price = $_POST['promotion_price'];
    $hot = $_POST['hot'];
    $new = $_POST['new'];

    if (isset($_POST['add'])) {
        createProduct($id, $name, $type,$color,$quantity, $gender, $desc, $import_price, $price, $promotion_price, $id.'_1.jpg' , $new, $hot);
    } elseif (isset($_POST['update'])) {
        updateProduct($id, $name, $type,$color,$quantity, $gender, $desc, $import_price, $price, $promotion_price, $id.'_1.jpg' , $new, $hot);
    }
}
elseif(isset($_POST['deleteId'])){
    removeProduct($_POST['deleteId']);
}
?>
<?php include './admin_header.php'; ?>
<?php include './admin_side-menu.php'; ?>
<h2 class="text-center display-5 mb-4">DANH SÁCH SẢN PHẨM</h2>
<div class="row">
    <div class="w-100 text-end">
       
        <a href="./admin_createProduct.php" class="btn btn-primary btn-rounded ml-auto" id="btn-add">Thêm mới</a>

    </div>
</div>
<div class=" mt-3">
    <table id="table" class="table hover row-border align-middle" style="width:100%">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá nhập</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php echo  renderTableProduct(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá nhập</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </tfoot>
    </table>
</div>

<div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeModalLable">Xóa sản phẩm</h5>
            </div>
            <div class="modal-body">
                <h3>Bạn có muốn xóa sản phẩm?</h3>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary btn-comfirm" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary btn-comfirm">Yes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var table = $('.table').DataTable({
            responsive: true,
            className: 'dt-body-center',
            "pageLength": 50
        });

        var row;
        var id = "";

        // Remove record
        $(".btn-comfirm").click(function(event) {
            var yes = $(this).text();
            if (yes == 'Yes') {
                $.ajax({
                    url: "admin_productsAll.php",
                    type: "POST",
                    cache: false,
                    data: {
                        deleteId: id
                    },
                    success: function(data) {
                        row.remove().draw(false)
                        row = null;
                    }
                });

           
                $('#removeModal').modal('hide');
            }
        });
        $.fn.setEventChangePage = function() {
            $(".btn-delete").click(function(event) {
                row = table.row($(this).parents('tr'));
                id = row.data()[0];
            });
        }


        $.fn.setEventChangePage();
        $('.paginate_button').on('click', function() {
            $.fn.setEventChangePage();
        });
    });
</script>
<?php include './admin_footer.php'; ?>