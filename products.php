<?php require_once 'init.php';

if (isset($_GET["id"])) {
    $product = getProductById($_GET["id"]);
}
$title = $product["name"];
?>



<?php include 'header.php'; ?>
<div id="content" class="mb-4">
    <div class="container pt-3">
        <div class="prd-detail container-fluid">
            <input type="hidden" id="is-page-product-detail" value="1">
            <div class="row">
                <!-- Breadcrumb -->
                <div class="col-xs-12 col-sm-12 col-md-12 hidden-xs hidden-sm">
                    <ol class="breadcrumb">
                        <li><a href="./product-list?type=<?php echo $product["id_type"] ?>"><?php echo getTypeProduct($product["id_product"]) ?></a></li>
                        <li class="active"><?php echo $product["name"] ?></li>
                    </ol>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <!-- Image product -->
                    <div class="row prd-detail-img">
                        <div class="slider-product-img">
                        <?php echo renderProductDetailImage($product["id_product"])?>
                        </div>
                    </div>

                </div>

                <!-- Infomation product -->
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 prd-detail-right">
                    <h3 id="name" class="font-weight-bold"><?php echo $product["name"] ?></h3>
                    <h6 class="mt-4 mb-4 d-flex justify-content-between">
                        <span id="id" class="pull-left">Mã sản phẩm: <strong id="id_product"><?php echo $product["id_product"] ?></strong></span>
                        <span class="pull-right">Tình trạng:
                            <strong id="new"><?php echo $product["new"] == 1 ? 'New Arrival' : 'Best Seller' ?></strong>
                        </span>
                    </h6>
                    <h6 class="mt-4 mb-4 d-flex justify-content-between">
                        <span id="id" class="pull-left">Lượt thích: <strong id="countLike"><?php echo getCountLike($product["id_product"]) ?></strong><i class="ml-2 text-danger fas fa-heart"></i></span>
                    </h6>
                    <div class="mt-4 mb-4">
                        <?php if ($product["promotion_price"] != -1) : ?>
                            <h6 class="price"><del><?php echo number_format($product["price"], 0, ',', '.') ?> VND</del></h6>
                            <h4 class="saleprice"><span id="promotion_price"><?php echo formatCurrency($product["promotion_price"]) ?></span> VND</h4>
                        <?php else : ?>
                            <h4 class="saleprice"><span id="promotion_price"><?php echo formatCurrency($product["price"]) ?></span> VND</h4>
                        <?php endif ?>
                    </div>
                    <div class="divider"></div>
                    <h6 class="mt-4 mb-4" id="desc"><?php echo $product["description"] ?></h6>
                    <div class="divider"></div>
                    <!-- Color -->
                    <div class="color">
                        <ul class="nav tree">
                            <li class="cb-color-fixed">
                                <label data-link=""><span class="bg-color" style="background-color: <?php echo getCodeColor($product["id_color"]) ?>;"></span><input name="color" type="checkbox" value="#b4cfd9" hidden=""></label>
                            </li>
                        </ul>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <h5 class=" mt-2 font-weight-bold">SIZE</h5>
                            <select id="size" class="custom-select btn-group bootstrap-select">
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <h5 class="mt-2 font-weight-bold">SỐ LƯỢNG</h5>
                            <select id="quantity" class="custom-select btn-group bootstrap-select">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                    </div>
                    <div class="row grp-btn1">
                        <a class="btn btn-addcart" id="addProductToCart">THÊM VÀO GIỎ HÀNG</a>
                        <a class="btn btn-like" id="addToWishList-<?php echo $product["id_product"]?>" onclick="addWishList('<?php echo $product['id_product']?>')"></a>

                    </div>



                    <div class="row">
                        <a id="pickOrder"  class="btn btn-checkout">THANH TOÁN</a>
                        <input type="hidden" id="_wpnonce" name="_wpnonce" value="b2da4192a6"><input type="hidden" name="_wp_http_referer" value="/product-detail/a61102/">
                    </div>
                    <div class="row info-validate empty-error" style="display: none;">
                        Vui lòng chọn Size/Số lượng phù hợp
                    </div>

                    <!-- Details info -->
                    <div>
                        <div class="panel-group" id="prdDetailInfor" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a class="dropdown-toggle" role="button" data-toggle="collapse" data-parent="#prdDetailInfor" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            THÔNG TIN SẢN PHẨM <span class="caret"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="divider-1"></div>
                                    <div class="panel-body">
                                        <h6>
                                            <p>
                                                Gender: Unisex<br>
                                                Size run: 35 – 46<br>
                                                Upper: Canvas<br>
                                                Outsole: Rubber<br>
                                            </p>
                                            <p><img class="alignnone size-full wp-image-6905" src="https://ananas.vn/wp-content/uploads/Size-chart-1-e1559209680920.jpg" alt="" width="500" height="358"></p>
                                        </h6>
                                    </div>
                                </div>
                                <div class="divider-1"></div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">

                                        <a class="dropdown-toggle collapsed" role="button" data-toggle="collapse" data-parent="#prdDetailInfor" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            QUY ĐỊNH ĐỔI SẢN PHẨM <span class="caret"></span>
                                        </a>

                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="divider-1"></div>
                                    <div class="panel-body">
                                        <h6>
                                            <ul>
                                                <li>Chỉ đổi hàng 1 lần duy nhất, mong bạn cân nhắc kĩ trước khi quyết định.</li>
                                                <li>Thời hạn đổi sản phẩm khi mua trực tiếp tại cửa hàng là 07 ngày, kể từ ngày mua. Đổi sản phẩm khi mua online là 14 ngày, kể từ ngày nhận hàng.</li>
                                                <li>Sản phẩm đổi phải kèm hóa đơn. Bắt buộc phải còn nguyên tem, hộp, nhãn mác.</li>
                                                <li>Sản phẩm đổi không có dấu hiệu đã qua sử dụng, không giặt tẩy, bám bẩn, biến dạng.</li>
                                                <li>GunoStore chỉ ưu tiên hỗ trợ đổi size. Trong trường hợp sản phẩm hết size cần đổi, bạn có thể đổi sang 01 sản phẩm khác:<br>
                                                    - Nếu sản phẩm muốn đổi ngang giá trị hoặc có giá trị cao hơn, bạn sẽ cần bù khoảng chênh lệch tại thời điểm đổi (nếu có).<br>
                                                    - Nếu bạn mong muốn đổi sản phẩm có giá trị thấp hơn, chúng tôi sẽ không hoàn lại tiền.</li>
                                                <li>Trong trường hợp sản phẩm - size bạn muốn đổi không còn hàng trong hệ thống. Vui lòng chọn sản phẩm khác.</li>
                                                <li>Không hoàn trả bằng tiền mặt dù bất cứ trong trường hợp nào. Mong bạn thông cảm.</li>
                                            </ul>
                                        </h6>
                                    </div>
                                </div>
                                <div class="divider-1"></div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class=" dropdown-toggle collapsed" role="button" data-toggle="collapse" data-parent="#prdDetailInfor" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            BẢO HÀNH THẾ NÀO ? <span class="caret"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="divider-1"></div>
                                    <div class="panel-body">
                                        <h6>
                                            <p>Mỗi đôi giày GunoStore trước khi xuất xưởng đều trải qua nhiều khâu kiểm tra. Tuy vậy, trong quá trình sử dụng, nếu nhận thấy các lỗi: gãy đế, hở đế, đứt chỉ may,...trong thời gian 6 tháng từ ngày mua hàng, mong bạn sớm gửi sản phẩm về GunoStore nhằm giúp chúng tôi có cơ hội phục vụ bạn tốt hơn. Vui lòng gửi sản phẩm về bất kỳ cửa hàng GunoStore nào, hoặc gửi đến trung tâm bảo hành GunoStore ngay trong trung tâm TP.HCM trong giờ hành chính:</p>
                                            <p>227, Nguyễn Văn Cừ, phường 4, quận 5, Hồ Chí Minh<br>
                                                Hotline: 0845606616 </p>
                                        </h6>
                                    </div>
                                </div>
                                <div class="divider-1 hidden-xs hidden-sm"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 visible-xs visible-sm">
                    <div class="row prd-detail-img">
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $("#addProductToCart").click(function() {
                    $.ajax({
                        url: "yourCart.php",
                        type: 'POST',
                        cache: false,
                        data: {
                            id_product: $("#id_product").text(),
                            quantity: $("#quantity").val(),
                            size: $("#size").val(),
                            price: currencyToNumber($("#promotion_price").text()),
                            addCartDetail: ""
                        },
                        success: function(data) {
                            $(".countProduct").text(Number($(".countProduct").first().text())+1);
                        }
                    });
                });


                $("#pickOrder").click(function() {
                    $.ajax({
                        url: "yourCart.php",
                        type: 'POST',
                        cache: false,
                        data: {
                            id_product: $("#id_product").text(),
                            quantity: $("#quantity").val(),
                            size: $("#size").val(),
                            price: currencyToNumber($("#promotion_price").text()),
                            addCartDetail: ""
                        },
                        success: function(data) {
                            document.location = "yourCart.php"; // tried this doesn't work
                        }
                    });

                });
            })
        </script>
        <?php include 'footer.php'; ?>