<?php
get_header();
?>

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
        $_SESSION['carts']['buy'][$id] = $item;
        $_SESSION['carts']['buy'][$id]['SoLuong'] = 1;
    } else {
        if (array_key_exists($id, $_SESSION['carts']['buy'])) {
            $_SESSION['carts']['buy'][$id]['SoLuong'] += 1;
        } else {
            $_SESSION['carts']['buy'][$id] = $item;
            $_SESSION['carts']['buy'][$id]['SoLuong'] = 1;
        }
        header('Location: ?page=cart');
    }
    update_info_cart();

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

<div class="main-content-products">
    <div class="container">
        <h3 class="title">Giỏ hàng</h3>
        <?php
        $_SESSION['SoLuongGioHang'] = 0;
        if (isset($_SESSION['carts']['buy']) && !empty($_SESSION['carts']['buy'])) {
        ?>
            <form action="?page=update" method="POST">
                <div class="products-cart">
                    <div class="products-cart__book">
                        <!-- <h2 class="heading-cart" style="color:#ec455a; font-weight:bold">
                                Giỏ hàng
                            </h2> -->
                        <div class="update-Complete">

                            <i class="fas fa-check-circle"></i> Cart updated.

                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>

                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="product-item">
                                <?php

                                foreach ($_SESSION['carts']['buy'] as $key => $value) {
                                ?>
                                    <tr class="product-item-cart" data-id="<?php echo $value['MSHH'] ?>">
                                        <td>
                                            <div class="product-item-cart__name">
                                                <a href="?page=detail&id=<?php echo $value['MSHH'] ?>">
                                                    <img class="product-item-cart__image" src="./public/uploads/book-images/<?php echo $value['Hinh1'] ?>" alt="">
                                                </a>
                                                <a href="?page=detail&id=<?= $value['MSHH'] ?>" class="heading-product">
                                                    <?php echo $value['TenHH'] ?>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo currency_format($value['Gia']) ?>
                                        </td>
                                        <td>
                                            <div class="control a-center">
                                                <input type="number" name="soluong[<?php echo $value['MSHH'] ?>]" min=1 max=99 value="<?php echo $value['SoLuong']; ?>" class="InputAmountProduct">
                                            </div>
                                        </td>
                                        <td> <?php echo currency_format($value['SoLuong'] * $value['Gia'])
                                                ?>
                                        </td>
                                        <td>
                                            <a href="?page=delete&id=<?php echo $value['MSHH'] ?>">
                                                <div class="trash">
                                                    <span class="iconify" data-icon="eva:trash-2-outline" style="color: #637381;" data-width="22" data-height="22"></span>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                <?php

                                }
                                ?>
                            </tbody>

                        </table>
                        <hr>
                        <div class="products-cart__book__update">
                            <a href="?page=home" class="products-cart__book__update__back"><span class="iconify" data-icon="eva:arrow-ios-back-fill" data-width="22" data-height="22"></span>Tiếp tục mua sắm</a>
                            <p><input type="submit" class="btn btn--primary btn--primary--hover" name="btn_update_cart" value="Cập nhật giỏ hàng"></p>
                        </div>
                    </div>
                    <div class="products-cart__totals">
                        <div class="heading">
                            Tổng giỏ hàng
                        </div>

                        <div class="sub-totals d-flex a-center j-between">
                            <span>Tạm tính</span>
                            <span class="subtotal"><?php echo currency_format(get_total_cart()) ?></span>
                        </div>
                        <div class="discount d-flex a-center j-between">
                            <span>Giảm giá</span>
                            <span class="subtotal">-</span>
                        </div>
                        <div class="shipping d-flex a-center j-between">
                            <span>Shipping</span>
                            <span class="subtotal">Free</span>
                        </div>
                        <div class="total d-flex a-center j-between">
                            <span> Tổng cộng</span>
                            <span class="total-product"><?php echo currency_format(get_total_cart()) ?></span>
                        </div>
                        <div class="coupon d-flex a-center j-between">
                            <input type="text" placeholder="Mã giảm giá">
                            <div class="coupon-btn">
                                <span>Áp dụng</span>
                            </div>
                        </div>
                        <div class="checkout">
                            <a href="?page=checkout" class="btn btn--primary btn-checkout">Mua hàng
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </form>
        <?php
        } else {
        ?>
            <div class="products-cart cart-list1 p-80">
                <div class="container">
                    <h3 class="heading-cart">
                        Giỏ hàng
                    </h3>
                    <p>Bạn chưa chọn quyển sách nào!</p>
                    <a href="?page=home" class="btn btn--primary comeback">Quay lại</a>
                    </p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
get_footer();
?>