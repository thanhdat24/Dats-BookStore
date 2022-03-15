<?php
function delete_cart($id)
{
    # Xoá sản phẩm có $id trong giỏ hàng
    if (isset($_SESSION['carts'])) {
        if (!empty($id)) {
            unset($_SESSION['carts'][$id]);
        } else {
            unset($_SESSION['carts']);
        }
    }
}

function update_cart($soluong)
{
    foreach ($soluong as $id => $new_soluong) {
        $_SESSION['carts'][$id]['SoLuong'] = $new_soluong;
        $_SESSION['carts'][$id]['TongTien'] = $new_soluong *  $_SESSION['carts'][$id]['Gia'];
    }
    // update_info_cart();
}
