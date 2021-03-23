<?php
$currentUser = getCurrentUser();
if ($currentUser) : ?>
<!-- CART FIXED -->
<div class="cartfixed d-none d-md-block  hidden-xs hidden-sm" data-target="#shop_cart" data-toggle="collapse">
    <span class="countProduct"><?php echo getCountCartDetail($id_cart); ?></span><br>
    <i class="fas fa-shopping-cart header__item-icon"></i>

    <div id="shop_cart" class="cart collapse">
        <span class="caret"></span>
        <ul class="list-group">
            <li class="list-group-item title">GIỎ HÀNG (<span class="countProduct"><?php echo getCountCartDetail($id_cart); ?></span>)</li>
            <li class="list-group-item divider"></li>
            <!-- LIST ITEM IN CART -->
            <li class="list-group-item items">
                <?php echo renderCartFixed($id_cart)?>
            </li>
            <!-- LIST ITEM IN CART -->
            <li class="list-group-item divider"></li>
            <li class="list-group-item total"><span class="float-left">Tổng cộng:</span><span class="float-right tright"><?php echo formatCurrency(getTotalCart($id_cart)); ?> VNĐ</span></li>
            <li class="list-group-item butn">
                <a href="./yourCart.php" class="btn btn-checkout mini-cart-checkout">THANH TOÁN</a>
            </li>
            <li class="list-group-item butn">
                <a href="javascript:void(0)" class="btn btn-addlike multipleAddLike">THÊM VÀO YÊU THÍCH</a>
            </li>
        </ul>
    </div>
</div>
<?php endif; ?>