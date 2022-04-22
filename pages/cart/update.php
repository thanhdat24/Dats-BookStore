<?php
$SoLuong = $_POST['SoLuong'];
$id =  $_POST['id'];
 // Lấy thong tin san pham
$item = get_product_by_id($id);

if (isset($_SESSION['carts']) && array_key_exists($id, $_SESSION['carts']['buy'])) {
    // Cap nhat gio hang
    $_SESSION['carts']['buy'][$id]['SoLuong'] = $SoLuong;

    //Cap nhat tong tien
    $Tong_Tien = $SoLuong * $item['Gia'];
    $_SESSION['carts']['buy'][$id]['TongTien'] = $Tong_Tien;

    // Cap nhat toan bo gio hang
    update_info_cart();

    // Lay tong gia tri trong gio hang
    $Tong = get_total_cart();

    $SoLuongGioHang = get_num_order_cart();
    // Gia tri tra ve
    $data = array(
        'Tong_Tien' => currency_format(($Tong_Tien)),
        'Tong' => currency_format($Tong),
        'SoLuongGH'=> $SoLuongGioHang

    );

    // tra du lieu ve
    echo json_encode($data);
}
