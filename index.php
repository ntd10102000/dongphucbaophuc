<?php
require_once 'init.php';
$title = "Guno Store";
// Xử lý logic ở đây
if (isset($_POST["unsetBill"])) {  
  unset($_SESSION["id_bill"]);
}

if (isset($_POST['content-post']) && isset($_FILES["img-post"])) {
  $file = $_FILES["img-post"];
  $img = file_get_contents($file['tmp_name']);
  header('Location: index.php');
  exit();
}

?>

<?php include 'header.php'; ?>

<?php include 'slidePanner.php'; ?>

<!-- NEW ARRAIVAL-->
<div class="bg-gradient-primary">
  <div class="home-new-arrial container-fluid">
    <div class="prd-detail-title">ĐỒNG PHỤC ÁO PHÔNG</div>
    <div class="slider prd-detail-slide">
      <?php
      $products = getNewProduct();
      echo renderThumbnailProductListHome($products);
      ?>
    </div>
  </div>
</div>

<!-- FAVOURITE -->
<div class="home-sale-off container-fluid">
  <div class="prd-detail-title">ĐỒNG PHỤC ÁO HỌP LỚP</div>
  <div class="slider prd-detail-slide">
    <?php
    $products = getDongPhucAoLop();
    echo renderThumbnailProductListHome($products);
    ?>
  </div>
</div>

<!-- BEST SELLER -->
<div class="home-best-seller container-fluid">
  <div class="prd-detail-title">ĐỒNG PHỤC CÔNG SỞ</div>
  <div class="slider prd-detail-slide">
    <?php
    $products = getDongPhucCongSo();
    echo renderThumbnailProductListHome($products);
    ?>
  </div>
</div>

<div class="home-best-seller container-fluid">
  <div class="prd-detail-title">ĐỒNG PHỤC BẢO HỘ LAO ĐỘNG</div>
  <div class="slider prd-detail-slide">
    <?php
    $products = getDongPhucBaoHoLaoDong();
    echo renderThumbnailProductListHome($products);
    ?>
  </div>
</div>

<div class="home-best-seller container-fluid">
  <div class="prd-detail-title">ĐỒNG PHỤC ÁO KHOÁC GIÓ</div>
  <div class="slider prd-detail-slide">
    <?php
    $products = getDongPhucAoKhoacGio();
    echo renderThumbnailProductListHome($products);
    ?>
  </div>
</div>

<div class="row w-100 justify-content-center">
  <div class="mt-3 mb-4 w-100 divider2"></div>
  <a href="./productList.php" class="btn btn-back" id="btn-watch-all">XEM TẤT CẢ SẢN PHẨM</a>
</div>

<?php include 'footer.php'; ?>