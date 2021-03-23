<?php require_once 'init.php';
$title = "Tìm kiếm sản phẩm";

if (isset($_GET["search"])) {
    $search = $_GET["search"];
}
$products = getSearchProduct($search);
?>

<?php include 'header.php'; ?>
<div id="content" class="mb-4">
    <div class="container pt-3">
        <!-- List product -->
        <div class="row prd1-right-box d-none d-md-block">
            <img class="w-100 my-3" src="./assets/img/banner_productlist.jpg">
        </div>
        <div class="row prd1-right-items">
            <?php if ($products):?>
                <?php echo renderDataPageProductList($products);?>
            <?php else: ?>
                <h4 class="text-center my-4 font-weight-bold w-75 mx-auto">TÌM THẤY 0 KẾT QUẢ CHO "<?php echo $search?> "</h4>
                <div class="row w-100 justify-content-center">    
                    <div class="mt-3 mb-4 w-100 divider2"></div>
                    <a href="./productList.php" class="btn btn-back">XEM TẤT CẢ SẢN PHẨM</a>
			    </div>
            <?php endif; ?>            
        </div>
        <!-- End list product -->
        <?php include 'footer.php'; ?>