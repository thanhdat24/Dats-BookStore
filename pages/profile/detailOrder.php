<?php
get_header();
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

$sql_order_detail = "SELECT d.SoDonDH,d.NgayDH, h.TenHH, h.MSHH, c.GiaDatHang, c.SoLuong, d.TongTien ,d.DiaChi, h.Hinh1, k.HoTenKH, k.SoDienThoai FROM khachhang k join dondathang d on k.MSKH = d.MSKH join chitietdathang c on c.SoDonDH = d.SoDonDH join hanghoa h on h.MSHH = c.MSHH WHERE d.SoDonDH='$id'";

$dondathang  = db_fetch_array($sql_order_detail);

// format day
$originalDate = $dondathang[0]['NgayDH'];
$currentDate = date("H:i d-m-Y", strtotime($originalDate));
?>
<div class="main-content-products">

    <div class="container">
        <h3 class="title mt-5">Chi tiết đơn hàng #<?= $dondathang[0]['SoDonDH'] ?>
        </h3>
        <p class="text-right"><b>Ngày đặt hàng:</b> <?= $currentDate ?></p>
        <div class="products-cart">
            <div class="products-cart__book">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>

                    <tbody id="product-item">
                        <?php
                        foreach ($dondathang as $key => $item) :
                        ?>
                            <tr class="product-item-cart" data-id="<?= $item['MSHH'] ?>">
                                <td>
                                    <div class="product-item-cart__name">
                                        <a href="?page=home&action=detail&id=<?= $item['MSHH'] ?>">
                                            <img class="product-item-cart__image" src="./public/uploads/book-images/<?= $item['Hinh1'] ?>" alt="">
                                        </a>
                                        <a href="?page=home&action=detail&id=<?= $item['MSHH'] ?>" class="heading-product">
                                            <?= $item['TenHH'] ?>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <?= currency_format($item['GiaDatHang']) ?>
                                </td>
                                <td>
                                    <div class="control align-items-center">
                                        <span><?= $item['SoLuong'] ?></span>
                                    </div>
                                </td>
                                <td class="product-item-cart__total-price"> <?= currency_format($item['SoLuong'] * $item['GiaDatHang']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style=" white-space: nowrap"><b>Tổng cộng: </b></td>
                            <td style="color:#ec455a; font-weight:bold; font-size:18px"><?= currency_format($item['TongTien']) ?></td>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
                <hr>
                <div class="products-cart__book__update">
                    <a href="?page=profile" class="products-cart__book__update__back"><i class="fa fa-angle-left mr-2"></i>Quay lại đơn hàng của tôi</a>
                </div>
            </div>
            <div class="cart-detail__order">
                <div class="cart-detail__order__title">Thông tin nhận hàng</div>
                <div class="cart-detail__order__detail">
                    <input hidden type="text" name="MSKH" value="<?= $_SESSION['userDetail']['MSKH'] ?>">
                    <p><b>Tên người nhận:</b></p>
                    <p class="ml-3"><?= $item['HoTenKH'] ?></p>
                    <p><b>Số điện thoại:</b></p>
                    <p class="ml-3"><?= $item['SoDienThoai'] ?></p>

                    <div class="cart-detail__order__detail__address">
                        <b>Địa chỉ nhận hàng:</b>
                        <p class="mt-3"><?= $item['DiaChi'] ?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>


<?php
get_footer();
?>