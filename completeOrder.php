<?php require_once 'init.php';
$title = 'Đặt hàng thành công';


if (isset($_POST["completeOrder"])) {

    $reciever = $_POST["name"];
    $reciever_address = $_POST["address"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $total_bill =  $_POST["totalBill"];

    $id_bill = addBill($id_user, $reciever, $total_bill, $reciever_address, $phone, $email);
    $cart_details =  getAllCartDetails($id_cart);
    addBillDetailList($id_bill,$cart_details);
    clearCart($_SESSION["cartId"]);
    $_SESSION['id_bill'] =  $id_bill;
}

if (!isset($_SESSION['id_bill'])) {
    header('Location: checkout.php');
}

$bill = getBillByID($_SESSION['id_bill']);
?>


<?php include './header.php'; ?>
<div id="complete-order" class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-5 text-center">
            <img src="./assets/img/SalesGenius_SubOrders_1.gif" alt="" class="tick-img">
            <h4 class="font-weight-bold my-2">Cảm ơn bạn đã đặt hàng</h4>
            <h4 class="font-weight-bold my-2">Đơn hàng của bạn đang được xữ lý</h4>
            <p>Một email xác nhận đã gữi tới <span class="d-block"><?php echo $bill["email"] ?></span> Xin bạn vui lòng kiểm tra email của bạn</p>
            <hr class="divider w-75">
            </hr>
            <div class="info-order mt-1 mx-auto w-75 ">

                <h4 class="font-weight-bold mb-3">Thông tin mua hàng</h4>
                <h6><strong>Mã đơn hàng :</strong><span class="ml-2">#<?php echo $bill["id"] ?></span></h6>
                <h6><strong>Tổng tiền :</strong><span class="ml-2" id="total"><?php echo formatCurrency($bill["total_bill"]) ?></span> VNĐ</h6>
                <h6><strong>Tên khách hàng :</strong><span class="ml-2" id="name"><?php echo $bill["reciever"] ?></span></h6>
                <h6><strong>Email :</strong><span class="ml-2" id="email"><?php echo $bill["email"] ?></span></h6>
                <h6><strong>Số điện thoại :</strong><span class="ml-2" id="phone"><?php echo $bill["phone"] ?></span></h6>
                <h6><strong>Địa chỉ :</strong><span class="ml-2" id="recive_address"><?php echo $bill["recive_address"] ?></span></h6>
            </div>
            <hr class="divider">
            </hr>
            <a  class="btn btn-primary text-white" onclick="unsetBill()">Tiếp tục mua hàng</a>
        </div>
    </div>
</div>

<script>
    function unsetBill() {
        $.ajax({
            url: "index.php",
            type: "POST",
            data: {
                unsetBill: ""
            },
            success: function(data) {
                document.location = "index.php";
            }
        })
    };
</script>
<?php include './footer.php'; ?>