<?php
$title = "Đơn hàng";
require_once 'init.php';
if (isset($_POST["id_status"]) && isset($_POST["id_order"])) {
    updateStatusOrder($_POST["id_status"], $_POST["id_order"]);
}
if (isset($_POST['deleteId'])) {
    $deleteId = $_POST['deleteId'];
    removeBill($deleteId);
}
?>

<?php include './admin_header.php'; ?>
<?php include './admin_side-menu.php'; ?>
<h2 class="text-center display-5 mb-4">DANH SÁCH ĐƠN HÀNG</h2>

<div class=" mt-4">
    <table id="table" class="table hover row-border align-middle" style="width:100%">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Phí ship</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày đặt hàng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php echo renderTableBill(); ?>

        </tbody>
        <tfoot>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Phí ship</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày đặt hàng</th>
                <th>Thao tác</th>
            </tr>
        </tfoot>
    </table>
</div>


<div class="modal fade" id="changeStatusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thay đổi trạng thái đơn hàng <strong>#<span id="id_bill-edit"></span></strong></h5>
            </div>
            <div class="modal-body">
                <a class="btn btn-secondary" onclick="updateStatusOrder(1)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                        <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
                    </svg>
                    Chở xử lý</a>
                <a class="btn btn-warning" onclick="updateStatusOrder(2)"><i class="fas fa-pallet"></i> Đang đóng gói</a>
                <a class="btn btn-danger" onclick="updateStatusOrder(3)"> <i class="far fa-times-circle"></i> Hủy</a>
                <a class="btn btn-success" onclick="updateStatusOrder(4)"><i class="fas fa-shipping-fast"></i> Đang vận chuyển</a>
                <a class="btn btn-primary" onclick="updateStatusOrder(5)"><i class="fas fa-clipboard-check"></i> Hoàn thành</a>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal remove  -->
<div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeModalLable">Xóa đơn hàng</h5>
            </div>
            <div class="modal-body">
                <h3>Bạn có muốn xóa xóa đơn hàng <span class="id-bill--remove"></span>?</h3>
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

        $.fn.setEventChangePage = function() {
            $(".btn-delete").click(function(event) {
                row = table.row($(this).parents('tr'));
                id = row.data()[0];
            });
            $(".btn-edit").click(function(event) {
                row = table.row($(this).parents('tr'));
                id = row.data()[0];
                $("#id_bill-edit").text(id);
            });
        }


        $.fn.setEventChangePage();
        $('.paginate_button').on('click', function() {
            $.fn.setEventChangePage();
        });

         // Remove record
        $(".btn-comfirm").click(function(event) {
            var yes = $(this).text();
            if (yes == 'Yes') {
                $.ajax({

                    url: "admin_billAll.php",
                    type: "POST",
                    cache: false,
                    data: {
                        deleteId: id
                    }
                });

                row.remove().draw(false)
                row = null;
                $('#removeModal').modal('hide');
            }
        });


    });

    function updateStatusOrder(id_status) {
        var id_order = $("#id_bill-edit").text();
        $.ajax({
            url: "admin_billAll.php",
            type: "POST",
            cache: false,
            data: {
                id_status: id_status,
                id_order: id_order
            },
            success: function(data) {
                document.location = "admin_billAll.php";
            }
        });

        $('#changeStatusModal').modal('hide');
    }
</script>
<?php include './admin_footer.php'; ?>