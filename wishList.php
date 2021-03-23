<?php require_once 'init.php';
$title = "Yêu thích";

repquireLoggedIn();
$id_cart = $_SESSION["cartId"];

$title = 'Your cart';
$id_user = $_SESSION['userId'];

if (isset($_POST["remove"])) {
    $id_product = $_POST["id_product"];
    removeWishItem($id_product, $id_user);
}

if (isset($_POST["add"])) {
    $id_product = $_POST["id_product"];
    addWishItem($id_product, $id_user);
}

?>


<?php include './header.php'; ?>

<div class="main-cart container-fluid" >
    <!--Section: Block Content-->
    <section>

        <!--Grid row-->
        <div class="row">
        <h3 class="text-center my-5 font-weight-bold w-75 mx-auto">SẢN PHẨM YÊU THÍCH</h3>
            <!--LIST PRODUCT IN CART-->
            <div class="col-lg-10 m-auto">

                <!-- Card -->
                <div class="card wish-list mb-3">
                    <div class="card-body ">
                        <h5 class="font-weight-bold mb-4">Sản phẩm  (<span id="number_cart-detail" class="cart--count-item"><?php echo getCountWishItem($id_user); ?></span> sản phẩm)</h5>

                        <!-- CART DETAILS -->
                        <?php echo renderWishlist($id_user) ?>
                        <!-- END CART DETAILS -->

            
                    </div>
                </div>
                <!-- Card -->

            </div>
            <!--LIST PRODUCT IN CART-->
        </div>
        <!--Grid row-->

    </section>
    <!--Section: Block Content-->
</div>

<?php include './footer.php'; ?>