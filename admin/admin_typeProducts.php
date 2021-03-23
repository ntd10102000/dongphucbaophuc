<?php
$title = "Loại sản phẩm";
require_once 'init.php';

if (isset($_POST["addType"])) {
    addType($_POST["addType"]);
}

if (isset($_POST["updateType"])) {
    updateType($_POST["idType"], $_POST["updateType"]);
}

if (isset($_POST['deleteId'])) {
    $deleteId = $_POST['deleteId'];
    removeType($deleteId);
}
?>

<?php include './admin_header.php'; ?>
<?php include './admin_side-menu.php'; ?>

<h2 class="text-center display-5 mb-4">DANH SÁCH LOẠI SẢN PHẨM</h2>
<div class="row">
    <div class="w-100 text-end">
        <a href="./admin_create_product.php" class="btn btn-primary btn-rounded ml-auto" id="btn-add" data-toggle="modal" data-target="#addModal">Thêm mới</a>
    </div>
</div>

<div class=" mt-3">
    <table class="table hover row-border align-middle" style="width:100%">
        <thead>
            <tr>
                <th>Mã loại sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php echo renderTableTpyeProduct(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Mã loại sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Thao tác</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Modal remove  -->
<div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeModalLable">Xóa loại sản phẩm</h5>
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

<!-- Update type product -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Cập nhật loại sản phẩm</h5>
            </div>
            <div class="modal-body">
                <form action="admin_typeProducts.php" method="POST">
                    <div class="form-group text-start">
                        <label for="idType" class="form-label  fw-bold">Mã loại sản phẩm</label>
                        <input name="idType" type="number" class="form-control" id="idType" readonly="readonly">
                    </div>
                    <div class="form-group text-start">
                        <label for="updateType" class="form-label  fw-bold">Loại sản phẩm</label>
                        <input name="updateType" type="text" class="form-control" id="updateType" placeholder="Nhập loại sản phẩm" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Add type product -->

<!-- Form ajax -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Thêm loại sản phẩm</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group text-start">
                        <label for="addType" class="form-label  fw-bold">Loại sản phẩm</label>
                        <input name="addType" type="text" class="form-control" id="addType" placeholder="Nhập loại sản phẩm" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn-addType">Lưu</button>
                    </div>
                </form>
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

                    url: "admin_typeProducts.php",
                    type: "POST",
                    cache: false,
                    data: {
                        deleteId: id
                    },
                    success: function(data) {
                        document.location = "admin_typeProducts.php";
                    }
                });

                row.remove().draw(false)
                row = null;
                $('#removeModal').modal('hide');
            }
        });
        // Add record
        $("#btn-addType").click(function(event) {
            $.ajax({
                url: "admin_typeProducts.php",
                type: "POST",
                cache: false,
                data: {
                    addType: $("#addType").val()
                },
                success: function(data) {
                    document.location = "admin_typeProducts.php";
                }
            });
            $('#addModal').modal('hide');
        });


        $.fn.setEventChangePage = function() {

            $(".btn-delete").click(function(event) {
                row = table.row($(this).parents('tr'));
                id = row.data()[0];
            });
            $(".btn-edit").click(function(event) {
                row = table.row($(this).parents('tr'));
                id = row.data()[0];
                $('#idType').val(id);
            });
        }


        $.fn.setEventChangePage();
        $('.paginate_button').on('click', function() {
            $.fn.setEventChangePage();
        });
    })
</script>
<?php include './admin_footer.php'; ?>