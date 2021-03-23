<?php require_once 'init.php';
$title = "Danh sách sản phẩm";
if(isset($_GET["gender"])){
    $gender = $_GET["gender"];
    if(isset($_GET["type"])){
        $type = $_GET["type"];
        $products = getProductAllByGenderAndType($gender,$type);
    }
    else $products = getProductAllByGender($gender);
}
else $products = getProductAll();
?>

<?php include 'header.php'; ?>
<div id="content" class="mb-4">
    <div class="container pt-3">
        <!-- List product -->
        <div class="row prd1-right-box d-none d-md-block" >
            <img class="w-100 my-3" src="./assets/img/banner_productlist.jpg">
        </div>
        <div class="row prd1-right-items">
        <?php if($products):?>
            <?php 
                echo renderDataPageProductList($products); 
            ?>
        <?php else:?>
            <h4 class="text-center my-4 font-weight-bold w-75 mx-auto">HIỆN TẠI CHƯA CÓ SẢN PHẨM NÀO PHÙ HỢP</h4>
                <div class="row w-100 justify-content-center">    
                    <div class="mt-3 mb-4 w-100 divider2"></div>
                    <a href="./productList.php" class="btn btn-back">XEM TẤT CẢ SẢN PHẨM</a>
			    </div>
        <?php endif;?>

        <!-- End list product -->
        <?php include 'footer.php'; ?>