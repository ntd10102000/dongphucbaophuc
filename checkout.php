<?php
require_once 'init.php';
repquireLoggedIn();

$title = 'Thanh toán';

?>
<?php include './header.php'; ?>

<div class="main-cart container-fluid mt-5" data-cart-list="">
  <!--Section: Block Content-->
  <section class="mt-4">

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-lg-8 mb-4">

        <!-- INPUT INFOR -->
        <div class="card wish-list pb-1">
          <div class="card-body">

            <h4 class="font-weight-bold mb-4">Thông tin giao hàng</h4>

            <!-- Full name-->
            <div class="md-form md-outline my-0">
              <input type="text" name="full_name" id="full_name" class="form-control mb-0" required>
              <label for="full_name">Họ và tên</label>
            </div>
            <!-- Full name -->

            <!-- Address -->
            <div class="md-form md-outline">
              <input type="text" name="address" id="address" class="form-control" required>
              <label for="address">Địa chỉ</label>
            </div>

            <!-- Phone -->
            <div class="md-form md-outline">
              <input type="number" name="phone_number" id="phone_number" class="form-control" required>
              <label for="phone_number">Số điện thoại</label>
            </div>

            <!-- Email address -->
            <div class="md-form md-outline">
              <input type="email" name="email" id="email" class="form-control">
              <label for="email">Email</label>
            </div>

          </div>
        </div>
        <!-- INPUT INFOR -->

      </div>
      <!--Grid column-->

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
                <span class="totalPriceOfCart"><?php echo formatCurrency(getTotalCart($id_cart)) ?> VNĐ</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Giảm giá
                <span class="totalDiscountOfCart">0 VNĐ</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <h4><strong>Tổng cộng</strong></h4>
                </div>
                <h4><strong><span class="tempPrice"><?php echo formatCurrency(getTotalCart($id_cart)) ?></span> VNĐ</strong></h4>
              </li>
            </ul>

            <a id="btn-complete-order" class="btn bg-primary-color btn-primary-color btn-block waves-effect waves-light">Hoàn tất đặt hàng</a>

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
  $(document).ready(function() {
    $("#btn-complete-order").click(function() {
        $.ajax({
            url: "completeOrder.php",
            type: "POST",
            data: {
              name : $("#full_name").val(),
              address : $("#address").val(),
              email : $("#email").val(),
              phone : $("#phone_number").val(),
              totalBill: currencyToNumber($(".tempPrice").text()),
              completeOrder: ""
            },
            success: function(data) {
              document.location = "completeOrder.php";
            }
        })
    });
  });

 
</script>
<?php include './footer.php'; ?>