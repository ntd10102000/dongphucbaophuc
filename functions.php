<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// ==========================================================================================
//                                TOOL FUNCTIONS
// ========================================================================================
function formatCurrency($number)
{
    return number_format($number, 0, ',', '.');
}

// Send mail
function sendMail($to, $subject, $content)
{
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'gunostoresaigon@gmail.com';                     // SMTP username
        $mail->Password   = 'gunosaigon';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom('gunostoresaigon@gmail.com', 'GunoStore');
        $mail->addAddress($to);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject =  $subject;
        $mail->Body = $content;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


function getCartDetails($idUser)
{
    global $db;
    $stmt = $db->prepare("SELECT cd.id,p.id_product,p.name,p.image,cd.size,cd.price,cd.quantity,cd.total
                            FROM cart c JOIN cart_detail cd ON c.id = cd.id_cart
                            JOIN products p ON cd.id_product = p.id_product
                            WHERE c.id = ?  
                            ORDER BY cd.created_at DESC");
    $stmt->execute(array($idUser));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function getAllUser()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users ORDER BY created_at DESC");
    $stmt->execute(array());
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findUserById($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE id=?");
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findUserByEmail($email)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute(array($email));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findUserByUsername($username)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute(array($username));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function changePass($id, $password)
{
    try {
        global $db;
        $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute(array($password, $id));
    } catch (PDOException $e) {
        echo 'Lỗi' . "<br>" . $e->getMessage();
    }
}


function createUser($username, $password, $email, $fullname, $phone, $code)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO users (username, password, email, full_name, phone_number, activation) VALUES(?,?,?,?,?,?)");
    $stmt->execute(array($username, $password, $email, $fullname, $phone, $code));
    return findUserById($db->lastInsertId());
}

function getCurrentUser()
{
    if (isset($_SESSION['userId'])) {
        return findUserById($_SESSION['userId']);
    }
    return null;
}

function upload_avatar($userId, $avatar)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET avatar = ? WHERE id = ?");
    $stmt->execute(array($avatar, $userId));
}

// ===================IMG============================
function resizeImage($filename, $max_width, $max_height)
{
    list($orig_width, $orig_height) = getimagesize($filename);

    $width = $orig_width;
    $height = $orig_height;

    # taller
    if ($height > $max_height) {
        $width = ($max_height / $height) * $width;
        $height = $max_height;
    }

    # wider
    if ($width > $max_width) {
        $height = ($max_width / $width) * $height;
        $width = $max_width;
    }

    $image_p = imagecreatetruecolor($width, $height);

    $image = imagecreatefromjpeg($filename);

    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

    return $image_p;
}

function repquireLoggedIn()
{
    $currentUser = getCurrentUser();
    if (!$currentUser) {
        header('Location: login.php');
        exit();
    }
}



function activateUser($userId)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET activation = NULL WHERE id = ?");
    $stmt->execute(array($userId));
}


function getLastIDProduct()
{
    global $db;
    $stmt = $db->prepare("SELECT MAX(id) as max_id FROM users");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['max_id'];
}



// ==========================================================================================
//                                RENDER FUNCTIONS
// ========================================================================================

function renderCart($id)
{

    $cartDetails = getCartDetails($id);
    $strCart = '';
    foreach ($cartDetails as $cartDetail) {
        $strCart = $strCart . '
         <!-- Product card -->
         <div id = "cart-detail-' . $cartDetail["id"] . '" class = "cart-detail--item">
         <div class="row mb-4">
         <div class="col-md-5 col-lg-3 col-xl-3">
             <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                 <img class="product-img img-fluid w-100" src="' .  getImageProduct($cartDetail["id_product"]) . '" >
                 <a class = "product-link" href="./products.php?id=' . $cartDetail["id_product"] . '">
                     <div class="mask waves-effect waves-light">
                         <div class="mask rgba-black-slight waves-effect waves-light"></div>
                     </div>
                 </a>
             </div>
         </div>
         <div class="col-md-7 col-lg-9 col-xl-9">
             <div>
                 <div class="d-flex justify-content-between">
                     <div class="cart__product-info w-75">
                         <a href="./products.php?id=' . $cartDetail["id_product"] . '">
                             <h5 class="cart__product-info--heading">' . $cartDetail["name"] . '</h5>
                         </a>
                         <p id = "id_product-' . $cartDetail["id"] . '" class=" cart__product-info--dsc mb-3 text-muted text-uppercase small">' . $cartDetail["id_product"] . '</p>
                         <p class="cart__product-info--dsc mb-3 text-muted text-uppercase small">Size:<span id="size_product-' . $cartDetail["id"] . '" class=" cart__product-info--size">' . $cartDetail["size"] . '<span></p>
                         <p class=" mb-3 text-muted text-uppercase small"><span class="font-weight-bold">Giá: </span> <span id="price_product-' . $cartDetail["id"] . '">' . (string)number_format($cartDetail["price"], 0, ',', '.') . '</span> VND</p>  
                     </div>
                     <div class="text-right">
                         <div class="def-number-input number-input safari_only mb-0 w-100">
                             <button onClick="decrement_quantity(' . $cartDetail["id"] . ')" class="minus">-</button>
                             <input id="input_quantity-' . $cartDetail["id"] . '" class="quantity w-50" min="0" name="quantity" value="' . $cartDetail["quantity"] . '" type="number">
                             <button onClick="increment_quantity(' . $cartDetail["id"] . ')" class="plus">+</button>
                         </div>
                     </div>
                 </div>
                 <div class="d-flex justify-content-between align-items-center">
                     <div>
                         <a type="button" onClick="sendEventRemoveCartDetail(' . $cartDetail["id"] . ')" class="btn-remove card-link-secondary small text-uppercase mr-3"><i class="fas fa-trash-alt mr-1"></i> Xóa sản phảm</a>
                         <a type="button" onClick="addWishList(' . $cartDetail["id"] . ')"class="btn-addWishList card-link-secondary small text-uppercase"><i class="fas fa-heart mr-1"></i> Thêm vào danh sách yêu thích </a>
                     </div>
                     <p class="mb-0"><strong class="cart__product-info--price"><span class = "total_product" id= "total_product-' . $cartDetail["id"] . '">' . (string)number_format($cartDetail["total"], 0, ',', '.') . '</span> VND</strong></p>
                 </div>
             </div>
         </div>
     </div>
     <!-- End product card -->
     <hr class="mb-4">
     </div>';
    }
    return $strCart;
}


function renderWishlist($id_user)
{

    $wishList = getWishList($id_user);
    $strWishlist = '';
    foreach ($wishList as $wishItem) {
        $prd = getProductById($wishItem['id_product']);
        $strWishlist = $strWishlist . '
         <!-- Product card -->
         <div id = "cart-detail-' . $wishItem["id_product"] . '" class = "cart-detail--item">
         <div class="row mb-4">
         <div class="col-md-5 col-lg-3 col-xl-3">
             <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                 <img class="product-img img-fluid w-100" src="./uploads/' .  $prd["image"] . '" >
                 <a class = "product-link" href="./products.php?id=' . $wishItem["id_product"] . '">
                     <div class="mask waves-effect waves-light">
                         <div class="mask rgba-black-slight waves-effect waves-light"></div>
                     </div>
                 </a>
             </div>
         </div>
         <div class="col-md-7 col-lg-9 col-xl-9">
             <div>
                 <div class="d-flex justify-content-between">
                     <div class="cart__product-info w-75">
                         <a href="./products.php?id=' . $wishItem["id_product"] . '">
                             <h5 class="cart__product-info--heading">' . $prd["name"] . '</h5>
                         </a>
                         
                         <p>Mã sản phẩm: <span id = "id_wishItem-' . $wishItem["id_product"] . '" class=" cart__product-info--dsc mb-3 text-muted text-uppercase small">' . $wishItem["id_product"] . '</span></p>
                         <h5 class=" mb-3 text-muted text-uppercase"><span class="font-weight-bold">Giá: </span> <span id="price_product-' . $wishItem["id_product"] . '">' . (string)number_format($prd["price"], 0, ',', '.') . '</span> VND</h5>  
                     </div>
                 </div>
                 <div class="d-flex justify-content-between align-items-center">
                     <div>
                         <a type="button" onClick="removeWishItem(\'' . $wishItem["id_product"] . '\')" class="btn-remove card-link-secondary small text-uppercase mr-3"><i class="fas fa-trash-alt mr-1"></i> Bỏ yêu thích</a>
                     </div>
                  
                 </div>
             </div>
         </div>
     </div>
     <!-- End product card -->
     <hr class="mb-4">
     </div>';
    }
    return $strWishlist;
}

function renderThumbnailProductHome($id_product)
{
    $prd = getProductById($id_product);
    $price = '';
    if ($prd["promotion_price"] != -1) {
        $price = '<h3 class="price-real"><small>' . formatCurrency($prd["price"]) . ' VND</small></h3>
                <h3 class="price" style ="color:#f58b00">' . formatCurrency($prd["promotion_price"]) . ' VND</h3>';
    } else {
        $price = '<h3 class="price">' . formatCurrency($prd["price"]) . ' VND</h3>';
    }
    return ' <!-- item -->
    <div class="thumbnail">
      <div class="cont-item">
        <a href="./products.php?id=' . $prd["id_product"] . '">
          <img src="./uploads/' .  $prd["image"] . '">
        </a>
      </div>
      <div class="caption">
        <h3 class="name">
            <a href="./products.php?id=' . $prd["id_product"] . '">' . $prd["name"] . '</a>
        </h3>
        <h3 class="color"></h3>
      </div>
    </div>
    <!-- item -->';
}


function renderThumbnailProductListHome($products)
{
    $strThumbnails = '';
    foreach ($products as $product) {
        $strThumbnails = $strThumbnails . renderThumbnailProductHome($product["id_product"]);
    }
    return $strThumbnails;
}

function renderThumbnailAtProductList($id_product){
    $prd = getProductById($id_product);
    $price = '';
    if ($prd["promotion_price"] != -1) {
        $price = '<h3 class="price"><span class="price-real">' . formatCurrency($prd["price"]) . ' VND</span>' . formatCurrency($prd["promotion_price"]) . ' VND</h3>';
    } else {
        $price = '<h3 class="price">' . formatCurrency($prd["price"]) . ' VND</h3>';
    }
    $strThumbnail =  '<!-- Product -->
    <div class="col-md-4 col-6 item">
        <div class="thumbnail">
            <div class="cont-item">
                <a href="./products.php?id=' . $prd["id_product"] . '">
                    <img src="./uploads/' . $prd["image"] . '">
                </a>
            </div>
            <div class="button">
                <a class="btn btn-prd1-buynow d-none d-md-block" href="./products.php?id=' . $prd["id_product"] . '">MUA NGAY</a>
                <a class="btn-prd1-heart addToWishList" id = "addToWishList-'. $prd["id_product"] .'" onclick = "addWishList(\''. $prd["id_product"] .'\')"> </a>
            </div>
            <div class="caption">
                <h3 class="name"><a href="./products.php?id=' . $prd["id_product"] . '">' . $prd["name"] . '</a>
                </h3>
                <h3 class="color"></h3>
            </div>
        </div>

    </div>
    <!-- End product -->';
    if(isset($_SESSION['userId'])) return $strThumbnail;
    return str_replace('<a class="btn-prd1-heart addToWishList" id = "addToWishList-'. $prd["id_product"] .'" onclick = "addWishList(\''. $prd["id_product"] .'\')"></a>','',$strThumbnail);

}

function renderDataPageProductList($products){
    $strThumbnails = '';
    foreach ($products as $product) {
        $strThumbnails = $strThumbnails . renderThumbnailAtProductList($product["id_product"]);
    }
    return $strThumbnails;
}

function renderProductDetailImage($id_product){
    $images = getAllImageProduct($id_product);

    // Slider large
    $sliderLg = '<!-- Large image  -->
                <div class="slider slider-for">';

    // Slider large
    $sliderSm = '<!-- Image thumbnails -->
                <div class="slider slider-nav responsive">';

    foreach ($images as $image) {
        $sliderLg = $sliderLg . '<div class="prd-detail-main-img">
                                    <img class="main-img" src="./uploads/' . $image . '">
                                </div>';

        $sliderSm  = $sliderSm . '<div>
                                    <img class="main-img item" src="./uploads/' . $image . '">
                                </div>';
    }
    // Add close tag
    $slider = $sliderLg . '</div>' . $sliderSm . '</div>';
    // Return Slider final
    return $slider ;
}


function renderCartFixed($id_cart){
    $cart_details = getAllCartDetails($id_cart);
    $strCart = '';
    foreach ($cart_details as $cart_detail){
        $prd = getProductById($cart_detail["id_product"]);
        $strCart = $strCart . '
        <!-- ITEM -->
                <div class="media ">
                    
                    <div class="media-left is-mini-cart">
                        <a href="#"><img class="media-object" src="./uploads/'.$cart_detail["id_product"].'_1.jpg" data-holder-rendered="true"></a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">'. $prd["name"] .'</h4>
                        <h5>
                            <span class="price"> '.formatCurrency($cart_detail["price"]) .' VNĐ</span>

                        </h5>
                        <div style="display:none;"><span class="productId" hidden="hidden"></span><span class="value">'.$cart_detail["id_product"].'</span></div>
                        <h5><span class="size">Size:</span><span class="value">'.$cart_detail["size"].'</span>
                        </h5>
                        <h5><span class="quantity">Số lượng:</span><span class="value">'.$cart_detail["quantity"].'</span></h5>
                    </div>
                    
                </div>
                <!-- ITEM -->
                <div class="divider"></div>';
    }
    return $strCart;
}

// ==========================================================================================
//                                ADD FUNCTIONS
// ========================================================================================

function addCart($id_user)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO cart(id_user) VALUES (?)");
    $stmt->execute(array($id_user));
}

function addCartDetail($id_cart, $id_cartDetail, $size, $quantity, $price)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO cart_detail(id_cart,id_product,size,quantity,price,total) VALUES(?,?,?,?,?,?)");
    $stmt->execute(array($id_cart, $id_cartDetail, $size, $quantity, $price, $quantity * $price));
}

function addBill($id_user, $reciever, $total_bill, $reciever_address, $phone, $email)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO bill ( id_user, reciever,total_bill, recive_address, phone, email) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute(array($id_user, $reciever, $total_bill, $reciever_address, $phone, $email));
    return $db->lastInsertId();
}

function addBillDetailList($id_bill,$cart_details){
    foreach($cart_details as $cart_detail){
        addBillDetail($id_bill,$cart_detail["id_product"],$cart_detail["price"],$cart_detail["quantity"],$cart_detail["total"]);
    }
 } 

function addBillDetail($id_bill, $id_product, $price, $quantity, $total){
    global $db;
    $stmt = $db->prepare("INSERT INTO bill_detail(id_bill, id_product, price, quantity, total) VALUES (?,?,?,?,?)");
    $stmt->execute(array($id_bill, $id_product, $price, $quantity, $total));
 } 

function addWishItem($id_product,$id_user)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO my_product ( id_product,id_user) VALUES (?, ?)");
    $stmt->execute(array($id_product,$id_user));
}

// ==========================================================================================
//                                UPDATE FUNCTIONS
// ========================================================================================

function updateCartDetail($id_cart, $id_cartDetail, $newQuantity)
{
    global $db;
    $stmt = $db->prepare("UPDATE cart_detail cd 
                            SET cd.quantity = ?, cd.total = cd.price * ?
                            WHERE id_cart = ? AND cd.id = ?");
    $stmt->execute(array($newQuantity, $newQuantity, $id_cart, $id_cartDetail));
}


// ==========================================================================================
//                                REMOVE FUNCTIONS
// ========================================================================================

function removeCartDetail($id_cart, $id_cartDetail)
{
    global $db;
    $stmt = $db->prepare("DELETE cd
                         FROM cart_detail cd 
                         WHERE cd.id_cart = ? AND cd.id = ?");
    $stmt->execute(array($id_cart, $id_cartDetail));
}

function clearCart($id_cart)
{
    global $db;
    $stmt = $db->prepare("DELETE FROM cart_detail 
                         WHERE id_cart = ?");
    $stmt->execute(array($id_cart));
}

function removeWishItem($id_product,$id_user)
{
    global $db;
    $stmt = $db->prepare("DELETE FROM my_product WHERE id_product = ? AND id_user = ?");
    $stmt->execute(array($id_product,$id_user));
}


// ==========================================================================================
//                                GET FUNCTIONS
// ========================================================================================
function getCountCartDetail($id_cart)
{
    global $db;
    $stmt = $db->prepare("SELECT *
                         FROM cart_detail cd 
                         WHERE cd.id_cart = ? ");
    $stmt->execute(array($id_cart));
    return $stmt->rowCount();
}

function getCountWishItem($id_user)
{
    global $db;
    $stmt = $db->prepare("SELECT *
                         FROM my_product
                         WHERE id_user = ? ");
    $stmt->execute(array($id_user));
    return $stmt->rowCount();
}

function getCountLike($id_product)
{
    global $db;
    $stmt = $db->prepare("SELECT *
                         FROM my_product
                         WHERE id_product = ? ");
    $stmt->execute(array($id_product));
    return $stmt->rowCount();
}

function getPriceProdurt($id_product)
{
    global $db;
    $stmt = $db->prepare("SELECT price
                         FROM product  
                         WHERE id_product = ? ");
    $stmt->execute(array($id_product));
    return $stmt->fetchColumn();;
}

function getTotalCart($id_cart)
{
    global $db;
    $stmt = $db->prepare("SELECT total_cart
                         FROM cart  
                         WHERE id = ? ");
    $stmt->execute(array($id_cart));
    return $stmt->fetchColumn();;
}
function getBillByID($id_bill)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM bill WHERE id = ?");
    $stmt->execute(array($id_bill));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getCartIdByUserId($id_user)
{
    global $db;
    $stmt = $db->prepare("SELECT id FROM cart WHERE id_user = ?");
    $stmt->execute(array($id_user));
    return $stmt->fetchColumn();;
}

function getProductAll()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM products");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductAllByGender($id_gender)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM products WHERE gender = ? or gender = 3  ORDER BY updated_at DESC");
    $stmt->execute(array($id_gender));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getProductAllByGenderAndType($id_gender,$id_type)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM products WHERE id_type = ? AND (gender = ? or gender = 3)  ORDER BY updated_at DESC");
    $stmt->execute(array($id_type,$id_gender));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getNewProduct()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM products WHERE new = 1  ORDER BY updated_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getHotProduct()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM products WHERE hot = 1 ORDER BY updated_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getSaleProduct()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM products WHERE promotion_price != -1 ORDER BY updated_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getProductById($id_product)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM products WHERE id_product = ?");
    $stmt->execute(array($id_product));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getTypeProduct($id_prduct)
{
    global $db;
    $stmt = $db->prepare("SELECT t.name FROM products p JOIN type_product t ON p.id_type = t.id WHERE id_product = ?");
    $stmt->execute(array($id_prduct));
    return $stmt->fetchColumn();;
}

function getAllTypeProduct()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM type_product ORDER BY updated_at DESC");
    $stmt->execute(array());
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllCartDetails($id_cart)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM cart_detail WHERE id_cart = ? ORDER BY updated_at DESC");
    $stmt->execute(array($id_cart));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getWishList($id_user)
{
    global $db;
    $stmt = $db->prepare("SELECT *
                         FROM my_product
                         WHERE id_user = ? ORDER BY updated_at DESC");
    $stmt->execute(array($id_user));
    return $stmt->fetchAll();
}
// =========================== COLOR =============================
function getColorProduct($id_prduct)
{
    global $db;
    $stmt = $db->prepare("SELECT c.color_name FROM products p JOIN color c ON p.id_color = c.id WHERE id_product = ?");
    $stmt->execute(array($id_prduct));
    return $stmt->fetchColumn();;
}

function getCodeColor($id_color)
{
    global $db;
    $stmt = $db->prepare("SELECT code FROM color WHERE id = ?");
    $stmt->execute(array($id_color));
    return $stmt->fetchColumn();;
}



// =========================== IMAGE =============================
function getAllImageProduct($id_product)
{
    global $db;
    $stmt = $db->prepare("SELECT image FROM product_images WHERE id_product = ?");
    $stmt->execute(array($id_product));
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function getImageProduct($id_product)
{
    global $db;
    $stmt = $db->prepare("SELECT image FROM product_images WHERE id_product = ?");
    $stmt->execute(array($id_product));
    return $stmt->fetchColumn();
}

function getFavouriteProducts()
{
    global $db;
    $stmt = $db->prepare("SELECT p.*
    FROM my_product m JOIN products p ON m.id_product = p.id_product 
    WHERE p.id_product IN (SELECT DISTINCT(id_product) FROM my_product) 
    ORDER BY m.updated_at DESC");
    $stmt->execute(array());
    return $stmt->fetchAll();
}


function getSearchProduct($search)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM products 
                        WHERE LOWER(name) LIKE CONCAT(N'%',LOWER(?),N'%')
                        ORDER BY updated_at DESC");
    $stmt->execute(array($search));
    return $stmt->fetchAll();
}





