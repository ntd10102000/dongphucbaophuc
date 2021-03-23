<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function getAllUser()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE username != ?");
    $stmt->execute(array('admin'));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getAllProduct()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM products ");
    $stmt->execute(array());
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getProduct($id_product)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM products WHERE id_product = ?");
    $stmt->execute(array($id_product));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getCurrentUser()
{
    if (isset($_SESSION['userId'])) {
        return findUserById($_SESSION['userId']);
    }
    return null;
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



function allUsers()
{
    $user = getAllUser();
    return json_encode($user);
}

function getLastIDProduct()
{
    global $db;
    $stmt = $db->prepare("SELECT MAX(id) as max_id FROM products");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['max_id'];
}

function createProduct($id_prd, $name, $id_type, $id_color, $quantity, $gender, $desctiption, $import_price, $price, $promotion_price, $image, $new, $hot)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO products(id_product,name,id_type,id_color,quantity,gender,description,import_price,price,promotion_price,image,new,hot)
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->execute(array($id_prd, $name, $id_type, $id_color, $quantity, $gender, $desctiption, $import_price, $price, $promotion_price, $image, $new, $hot));
}

function updateProduct($id_prd, $name, $id_type, $id_color, $quantity, $gender, $desctiption, $import_price, $price, $promotion_price, $image, $new, $hot)
{
    global $db;
    $stmt = $db->prepare("UPDATE products 
                            SET  name = ?, id_type = ? ,
                            id_color = ?,quantity = ?, gender = ?,
                            description = ?, import_price = ?,
                            price = ?, promotion_price = ?,
                            image = ?, new = ?, hot = ?, updated_at = NULL
                            WHERE id_product = ?");
    $stmt->execute(array($name, $id_type, $id_color, $quantity, $gender, $desctiption, $import_price, $price, $promotion_price, $image, $new, $hot, $id_prd));
}

function updateType($id, $name)
{
    global $db;
    $stmt = $db->prepare("UPDATE type_product SET name = ? WHERE id = ?");
    $stmt->execute(array($name, $id));
}

function removeType($id)
{
    global $db;
    $stmt = $db->prepare("DELETE FROM type_product WHERE id = ?");
    $stmt->execute(array((int)$id));
}

function removeBill($id_bill)
{
    global $db;
    $stmt = $db->prepare("DELETE FROM bill WHERE id = ?");
    $stmt->execute(array((int)$id_bill));
}

function removeProduct($id_product)
{
    global $db;
    $stmt = $db->prepare("DELETE FROM products WHERE id_product = ?");
    $stmt->execute(array($id_product));
}

function addType($name)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO type_product(name) VALUES(?)");
    $stmt->execute(array($name));
}

function renderTableCustomers()
{
    $users = getAllUser();
    $strUsers = '';
    foreach ($users as $user) {
        $strUsers = $strUsers .
            '<tr>
                <td>' . $user["id"] . '</td>
                <td>' . $user["full_name"] . '</td>
                <td>' . $user["address"] . '</td>
                <td>' . $user["create_at"] . '</td>
                <td>' . $user["phone_number"] . '</td>
                <td>' . $user["email"] . '</td>
                <td class="text-center">
                    <a href="" class="btn-delete btn-control text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>';
    }
    return $strUsers;
}

function renderTableUsers()
{
    $users = getAllUser();
    $strUsers = '';
    foreach ($users as $user) {
        $strUsers = $strUsers .
            '<tr>
                <td>' . $user["username"] . '</td>
                <td>' . $user["phone_number"] . '</td>
                <td>' . $user["email"] . '</td>
                <td>' . $user["create_at"] . '</td>
                <td class="text-center">
                    <a href="" class="btn-delete btn-control text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>';
    }
    return $strUsers;
}

function renderTableProduct()
{
    $products = getAllProduct();
    $strProducts = '';
    foreach ($products as $product) {
        $strProducts = $strProducts .
            '<tr>
                <td>' . $product["id_product"] . '</td>
                <td>' . $product["name"] . '</td>
                <td>' . $product["id_type"] . '</td>
                <td>' . $product["quantity"] . '</td>
                <td>' . $product["import_price"] . '</td>
                <td>' . $product["price"] . '</td>
                <td>' . $product["promotion_price"] . '</td>
                <td><img id="img_load" src="../uploads/' . $product["image"] . '" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
                <td class="text-center">
                    <a href ="./admin_editProduct.php?id=' . $product["id_product"] . '" title="edit" id="btn-edit-prd" class="btn-edit  btn-control text-success">
                        <i class="far fa-edit"></i>
                    </a>
                    <a  title="Xoa" class="btn-delete  btn-control text-danger" data-toggle="modal" data-target="#removeModal">
                    <i class="far fa-times-circle"></i>
                </a>
                </td>
            </tr>';
    }
    return $strProducts;
}

function renderTableTpyeProduct()
{
    $types = getAllTypeProduct();
    $strTypes = '';
    foreach ($types as $type) {
        $strTypes = $strTypes .
            '<tr>
                <td class = "id">' . $type["id"] . '</td>
                <td>' . $type["name"] . '</td>
                <td>' . $type["created_at"] . '</td>
                <td>' . $type["updated_at"] . '</td>
                <td class="text-center">
                    <a  title="edit" class="btn-edit  btn-control text-success" data-toggle="modal" data-target="#updateModal">
                        <i class="far fa-edit"></i>
                    </a>
                    <a  title="Xoa" class="btn-delete  btn-control text-danger" data-toggle="modal" data-target="#removeModal">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>';
    }
    return $strTypes;
}

function renderTableBill()
{
    $bills = getAllBill();
    $strBills = '';
    foreach ($bills as $bill) {
        $strBills = $strBills .
            '
            <tr>
                <td class = "id">' . $bill["id"] . '</td>
                <td >' . $bill["reciever"] . '</td>
                <td>' . $bill["ship_cost"] . '</td>
                <td>' . $bill["total_bill"] . '</td>
                ' . getStatusOrderTag($bill["status_order"]) . '
                <td>' . $bill["date_order"] . '</td>
                <td class="text-center">
                    <a href="" class="btn-watch btn-control text-dark" title="Xem chi tiết"><i class="fas fa-search"></i></a>
                    <a  title="edit" class="btn-edit btn-control text-success" data-toggle="modal" data-target="#changeStatusModal">
                        <i class="far fa-edit"></i>
                    </a>
                    <a  title="Xoa" class="btn-delete  btn-control text-danger" data-toggle="modal" data-target="#removeModal">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            ';
    }
    return $strBills;
}

function getStatusOrderTag($id_status)
{
    switch ($id_status) {
        case 1:
            return '<td><span class="btn-secondary p-1 ">Chờ xử lý</span></td>';
            break;
        case 2:
            return '<td><span class="btn-warning p-1 ">Đang đóng gói</span></td>';
            break;
        case 3:
            return '<td><span class="btn-danger p-1 ">Đã hủy</span></td>';
            break;
        case 4:
            return '<td><span class="btn-success p-1 ">Đang vận chuyển</span></td>';
            break;
        default:
            return '<td><span class="btn-primary p-1 ">Hoàn thành</span></td>';
            break;
    }
}


function renderSelectType()
{
    $types = getAllTypeProduct();
    $str = '<option selected> -- Loại sản phẩm -- </option>';
    foreach ($types as $type) {
        $str = $str . '<option value="' . $type["id"] . '">' . $type["name"] . '</option>';
    }
    return $str;
}

function renderSelectColor()
{
    $colors = getAllColor();
    $str = '<option selected> -- Loại sản phẩm -- </option>';
    foreach ($colors as $color) {
        $str = $str . '<option value="' . $color["id"] . '">' . $color["color_name"] . '</option>';
    }
    return $str;
}

function renderComboboxTypeSelected($id_type)
{
    $types = getAllTypeProduct();
    $str = '<option > -- Loại sản phẩm -- </option>';
    foreach ($types as $type) {
        $selected = $type["id"] == $id_type ? 'selected' : '';
        $str = $str . '<option value="' . $type["id"] . '" ' . $selected . '>' . $type["name"] . '</option>';
    }
    return $str;
}

function renderComboboxColorSelected($id_color)
{
    $colors = getAllColor();
    $str = '<option > -- Màu -- </option>';
    foreach ($colors as $color) {
        $selected = $color["id"] == $id_color ? 'selected' : '';
        $str = $str . '<option value="' . $color["id"] . '" ' . $selected . '>' . $color["color_name"] . '</option>';
    }
    return $str;
}
// ======================================================================================================
//                                             ADD FUNCTIONS
//  ======================================================================================================

function addImageProduct($id_product, $image)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO product_images( id_product, image) VALUES (?,?)");
    $stmt->execute(array($id_product, $image));
}

// ======================================================================================================
//                                             REMOVE FUNCTIONS
//  ======================================================================================================

function updateStatusOrder($status_order, $id_order)
{
    global $db;
    $stmt = $db->prepare("UPDATE bill SET status_order = ? WHERE id = ?");
    $stmt->execute(array($status_order, $id_order));
}

// ======================================================================================================
//                                             GET FUNCTIONS
//  ======================================================================================================


function getAllTypeProduct()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM type_product ");
    $stmt->execute(array());
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllColor()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM color ");
    $stmt->execute(array());
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getAllBill()
{
    global $db;
    $stmt = $db->prepare("SELECT id,reciever,ship_cost,total_bill,status_order,date_order FROM bill ");
    $stmt->execute(array());
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getNameStatusOrder($id_status)
{
    global $db;
    $stmt = $db->prepare("SELECT name FROM status_order WHERE id = ? ");
    $stmt->execute(array());
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getRevenue($option)
{
    if ($option == 'day') {
        $query = "SELECT DATE(date_order) AS label, SUM(total_bill) AS y FROM bill GROUP BY DATE(date_order)";
    } elseif ($option == 'month') {
        $query = "SELECT CONCAT(MONTH( DATE(date_order)),' - ',YEAR( DATE(date_order))) AS label , SUM(total_bill) AS y FROM bill GROUP BY MONTH( DATE(date_order)),YEAR( DATE(date_order))";
    } elseif ($option == 'quarter') {
        $query = "SELECT CONCAT('Quý ',QUARTER(date_order),' - ',YEAR( DATE(date_order))) AS label , SUM(total_bill) AS y FROM bill GROUP BY QUARTER( date_order),YEAR( DATE(date_order))";
    } elseif ($option == 'year') {
        $query = "SELECT YEAR( DATE(date_order)) AS label, SUM(total_bill) AS y FROM bill GROUP BY YEAR( DATE(date_order))";
    } else return null;

    global $db;
    $stmt = $db->prepare($query);
    $stmt->execute(array());
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
