<?php
redirect("?page=cart");
$_SESSION['addCartStatusMessage'] = "Thêm vào giỏ hàng thành công!";
$_SESSION['addCartStatusCode'] = "success";
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $item = get_product_by_id($id); // Lấy ra sản phẩm muốn mua
    // $_SESSION['carts']; // bién lưu sản phẩm khách hàng muốn mua 

    if (!isset($_SESSION['carts'])) {
        $_SESSION['carts']['buy'][$id] = $item;
        $_SESSION['carts']['buy'][$id]['SoLuong'] = 1;
    } else {
        if (array_key_exists($id, $_SESSION['carts']['buy'])) {
            $_SESSION['carts']['buy'][$id]['SoLuong'] += 1;
        } else {
            $_SESSION['carts']['buy'][$id] = $item;
            $_SESSION['carts']['buy'][$id]['SoLuong'] = 1;
        }
    }
    update_info_cart();
}
