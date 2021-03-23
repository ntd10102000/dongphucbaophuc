<?php require_once 'init.php';

repquireLoggedIn();
$id_cart = $_SESSION["cartId"];

$title = 'Giỏ hàng';


if (isset($_POST["addCartDetail"])) {
    $id_cartDetail = $_POST["id_product"];
    $quantity = $_POST["quantity"];
    $size = $_POST["size"];
    $price = (int)$_POST["price"];
    addCartDetail($id_cart, $id_cartDetail, $size, $quantity,$price);
}

if (isset($_POST["updateQuatity"])) {
    $id_cartDetail = $_POST["id_cartDetail"];
    $newQuantity = $_POST["newQuantity"];
    updateCartDetail($id_cart, $id_cartDetail, $newQuantity);
}

if (isset($_POST["removeCartDetail"])) {
    $id_cartDetail = $_POST["id_cartDetail"];
    removeCartDetail($id_cart, $id_cartDetail);
}
?>


<?php include './header.php'; ?>

<div class="main-cart container-fluid" data-cart-list="">
    <!--Section: Block Content-->
    <section>

        <!--Grid row-->
        <div class="row">

            <!--LIST PRODUCT IN CART-->
            <div class="col-lg-8">

                <!-- Card -->
                <div class="card wish-list mb-3">
                    <div class="card-body">
                        <h5 class="font-weight-bold mb-4">Giỏ hàng (<span id="number_cart-detail" class="cart--count-item"><?php echo getCountCartDetail($id_cart); ?></span> sản phẩm)</h5>

                        <!-- CART DETAILS -->
                        <?php echo renderCart($id_cart) ?>
                        <!-- END CART DETAILS -->

                        <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Hãy tiến hành thanh toán, thêm sản phẩm vào giỏ hàng của bạn không có nghĩa là đặt chúng.</p>
                    </div>
                </div>
                <!-- Card -->

            </div>
            <!--LIST PRODUCT IN CART-->

            <!--CART BILL-->
            <div class="col-lg-4">

                <!-- Card -->
                <div class="card mb-3">
                    <div class="card-body">

                        <h4 class="font-weight-bold mb-3">Đơn hàng</h4>
                        <hr>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Hóa đơn
                                <span class="totalPriceOfCart"><span id="totalCart"><?php echo formatCurrency(getTotalCart($id_cart))?></span> VNĐ</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Giảm giá
                                <span class="totalDiscountOfCart">0 VNĐ</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <h4><strong>Tạm tính</strong></h4>
                                </div>
                                <h4><strong><span id="tempPrice"><?php echo formatCurrency(getTotalCart($id_cart))?></span> VND</strong></h4>
                            </li>
                        </ul>

                        <a href="./checkout.php" class="btn bg-primary-color btn-primary-color btn-block waves-effect waves-light">Tiếp tục thanh toán</a>

                    </div>
                </div>
                <!-- Card -->

                <!-- Card -->
                <div class="card mb-3">
                    <div class="card-body">

                        <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
                            Mã khuyến mãi
                            <span><i class="fas fa-chevron-down pt-1"></i></span>
                        </a>

                        <div class="collapse" id="collapseExample1">
                            <div class="mt-3">
                                <div class="md-form md-outline mb-0">
                                    <input type="text" id="discount-code1" class="form-control font-weight-light" placeholder="Enter discount code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card -->

            </div>
            <!--CART BILL-->

        </div>
        <!--Grid row-->

    </section>
    <!--Section: Block Content-->
</div>

<script>
    
    function increment_quantity(id_cartDetail) {
        var inputQuantityElement = $("#input_quantity-" + id_cartDetail);
        var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
        sendNewQuantity(id_cartDetail, newQuantity);
    }

    function decrement_quantity(id_cartDetail) {
        var inputQuantityElement = $("#input_quantity-" + id_cartDetail);
        if ($(inputQuantityElement).val() > 1) {
            var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
            sendNewQuantity(id_cartDetail, newQuantity);
        }
    }

    function sendEventRemoveCartDetail(id_cartDetail) {

        $.ajax({
            url: "yourCart.php",
            data: {
                id_cartDetail: id_cartDetail,
                removeCartDetail: "",
            },
            type: 'post',
            success: function(response) {
                $("#cart-detail-" + id_cartDetail).remove();
                $("#countProductCartFixed").text($(".cart-detail--item").length);
                $("#number_cart-detail").text($(".cart-detail--item").length);
                setTotalPriceOfOrder();
            }
        });

    }

    function setTotalPriceOfOrder() {
        var totalBill = 0;
        var strTotals = document.getElementsByClassName("total_product");
        for (var i = 0; i < strTotals.length; i++) {
            totalBill += currencyToNumber(strTotals[i].textContent);
        }
        $("#tempPrice,#totalCart").text(numberToCurrency(totalBill));
    }

    // Update UI infor cart
    function updateInfoCart(id_cartDetail, new_quantity) {

        var price = currencyToNumber($("#price_product-" + id_cartDetail).text());
        var total = price * new_quantity;

        var strTotalOfProduct = numberToCurrency(total);

        $("#price_product-" + id_cartDetail).val(new_quantity);
        $("#total_product-" + id_cartDetail).text(strTotalOfProduct);

        setTotalPriceOfOrder()
        //Calc totals of cart detail

    }

    function sendNewQuantity(id_cartDetail, new_quantity) {
        var inputQuantityElement = $("#input-quantity-" + id_cartDetail);
        $.ajax({
            url: "yourCart.php",
            data: {
                id_cartDetail: id_cartDetail,
                newQuantity: new_quantity,
                updateQuatity: "",
            },
            type: 'post',
            success: function(response) {
                $("#input_quantity-" + id_cartDetail).val(new_quantity);
                updateInfoCart(id_cartDetail, new_quantity);
            }
        });
    }
</script>
<?php include './footer.php'; ?>