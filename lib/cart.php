<?php
function delete_cart($id)
{
    # Xoá sản phẩm có $id trong giỏ hàng
    if (isset($_SESSION['carts'])) {
        if (!empty($id)) {
            unset($_SESSION['carts']['buy'][$id]);
        } else {
            unset($_SESSION['carts']);
        }
    }
    update_info_cart();
}
# Thêm thông tin vào giỏ hàng 
function update_info_cart()
{
    $SoLuongGioHang = 0;
    $TongTien = 0;
    foreach ($_SESSION['carts']['buy'] as $item) {
        $SoLuongGioHang += $item['SoLuong'];
        $TongTien += $item['SoLuong'] * $item['Gia'];
    }
    $_SESSION['carts']['info'] = array(
        'SoLuongGioHang' => $SoLuongGioHang,
        'TongTien' => $TongTien

    );
}

function update_cart($soluong)
{
    foreach ($soluong as $id => $new_soluong) {
        $_SESSION['carts']['buy'][$id]['SoLuong'] = $new_soluong;
        $_SESSION['carts']['buy'][$id]['TongTien'] = $new_soluong *  $_SESSION['carts']['buy'][$id]['Gia'];
    }
    update_info_cart();
}
function get_liss_buy_cart()
{
    if (isset($_SESSION['carts'])) {
        return $_SESSION['carts']['buy'];
    }
    return false;
}

function get_num_order_cart()
{
    if (isset($_SESSION['carts'])) {
        return $_SESSION['carts']['info']['SoLuongGioHang'];
    }
    // update_info_cart();
    return false;
}

function get_total_cart()
{
    if (isset($_SESSION['carts'])) {
        return $_SESSION['carts']['info']['TongTien'];
    }
    return false;
}
