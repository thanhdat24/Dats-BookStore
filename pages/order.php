<style>
    .update {
        color: #fff !important;
    }

    .update:hover {
        color: inherit !important;
    }
</style>

<?php
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $item = get_product_by_id($id); // Lấy ra sản phẩm muốn mua
    // $_SESSION['carts']; // bién lưu sản phẩm khách hàng muốn mua 

    if (!isset($_SESSION['carts']) || empty($_SESSION['carts'])) {
        $_SESSION['carts'][$id] = $item;
        $_SESSION['carts'][$id]['SoLuong'] = 1;
    } else {
        if (array_key_exists($id, $_SESSION['carts'])) {
            $_SESSION['carts'][$id]['SoLuong'] += 1;
        } else {
            $_SESSION['carts'][$id] = $item;
            $_SESSION['carts'][$id]['SoLuong'] = 1;
        }
        header('Location: ?page=order');
    }

    // $SoLuong = 1;
    // if (isset($_SESSION['carts']) && array_key_exists($id, $_SESSION['carts'])) {
    //     $SoLuong =
    //         $_SESSION['carts'][$id]['SoLuong'] += 1;
    // }

    // $_SESSION['carts'][$id] = array(
    //     'MSHH' => $item['MSHH'],
    //     'TenHH' =>   $item['TenHH'],
    //     'QuyCach' =>  $item['QuyCach'],
    //     'Gia' =>  $item['Gia'],
    //     'SoLuongHang' =>  $item['SoLuongHang'],
    //     'MaLoaiHang' =>  $item['MaLoaiHang'],
    //     'GhiChu' =>  $item['GhiChu'],
    //     'Hinh1' =>  $item['Hinh1'],
    //     'Hinh2' =>  $item['Hinh2'],
    //     'Hinh3' =>  $item['Hinh3'],
    //     'SoLuong' =>    $SoLuong,
    //     'TongPhu' => $item['Gia'] * $SoLuong
    // );
    // $SoLuongDonHang = 0;
    // $TongTien = 0;
    // foreach ($_SESSION['carts'] as $item) {
    //     $SoLuongDonHang = $item['SoLuong'];
    //     $TongTien += $item['TongPhu'];
    // }
    // $_SESSION['carts']['ThongTinDonHang'] = array(
    //     $SoLuongDonHang += $SoLuongDonHang,
    //     $TongTien += $TongTien
    // );
    // show_array($_SESSION['carts']);
}
?>

<section class="top">
    <div class="container">
        <ul class="nav-top d-flex a-center">
            <li><a href="insdex.html"> Home <span>/</span></a></li>
            <li><a class="active">Cart</a></li>
        </ul>
    </div>
</section>

<nav class="navigation">
    <?php
    $_SESSION['TongTien'] = 0;
    if (isset($_SESSION['carts']) && !empty($_SESSION['carts'])) {
    ?>
        <form action="?page=update" method="POST">
            <div class="products-cart cart-list1 p-80">
                <div class="container">
                    <h2 class="heading-cart">
                        Cart
                    </h2>

                    <div class="update-Complete">

                        <i class="fas fa-check-circle"></i> Cart updated.

                    </div>


                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="addToCard">
                            <?php

                            foreach ($_SESSION['carts'] as $key => $value) {
                            ?>
                                <tr class="product-item-cart" data-id="<?php echo $value['MSHH'] ?>">
                                    <td>
                                        <a href="?page=delete&id=<?php echo $value['MSHH'] ?>">
                                            <div class="erase">
                                                &times;
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="img">
                                            <img src="./public/uploads/book-images/<?php echo $value['Hinh1'] ?>" alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="heading-product">
                                            <?php echo $value['TenHH'] ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo currency_format($value['Gia']) ?>
                                    </td>
                                    <td>
                                        <div class="control a-center">
                                            <!-- <a class="dash-1" href=""><i class="bi bi-dash"></i></a>
                                            <input type="text" min="1" max="5" class="InputAmountProduct" value="<?php echo $value['SoLuong'] ?>">
                                            <a class="plus-1" href=""><i class="bi bi-plus"></i></a> -->
                                            <input type="number" name="soluong[<?php echo $value['MSHH'] ?>]" min=1 max=5 value="<?php echo $value['SoLuong'] ?>" class="InputAmountProduct">
                                        </div>
                                    </td>
                                    <td> <?php echo currency_format($value['SoLuong'] * $value['Gia']);
                                            $_SESSION['TongTien'] += $value['SoLuong'] * $value['Gia'] ?></td>
                                </tr>
                            <?php

                            }
                            ?>
                        </tbody>
                    </table>


                    <div class="cart-on-mb">
                    </div>

                    <div class="coupon d-flex a-center j-between">
                        <div class="coupon-input d-flex a-center">
                            <input type="text" placeholder="Coupon Code">
                            <a href="#" class="btn btn-primary">
                                Apply Coupon
                            </a>
                        </div>
                        <input type="submit" class="btn btn-primary update" name="btn_update_cart" value="Cập nhật giỏ hàng">
                        <!-- <a href="?page=update" class="btn btn-primary update">
                            Cập nhật giỏ hàng
                        </a> -->
                    </div>

                    <div class="cart_totals">
                        <div class="heading">
                            Tổng giỏ hàng
                        </div>

                        <div class="sub-totals d-flex a-center j-between">
                            <span>Tổng phụ</span>
                            <span class="subtotal"><?php echo currency_format($_SESSION['TongTien']) ?></span>
                        </div>

                        <div class="total d-flex a-center j-between">
                            <span> Tổng </span>
                            <span class="total-product"><?php echo currency_format($_SESSION['TongTien']) ?></span>
                        </div>

                        <div class="checkout">
                            <a href="checkout.html" class="btn btn-primary">Proceed To Checkout
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </form>
    <?php
    } else {
    ?>
        <div class="products-cart cart-list1 p-80">
            <div class="container">
                <h2 class="heading-cart">
                    Cart
                </h2>
                <p>Giỏ hàng của bạn không có bất kỳ mặt hàng nào</p>
                <a href="?page=home" class="btn btn-primary comeback">Quay lại</a>
                </p>
            </div>
        </div>
    <?php
    }
    ?>
</nav>