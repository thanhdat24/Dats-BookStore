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
        header('Location: ?page=cart');
    }
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
            <div class="products-cart cart-list1 p-60">
                <div class="container">
                    <h2 class="heading-cart" style="color:#ec455a; font-weight:bold">
                        Giỏ hàng
                    </h2>

                    <div class="update-Complete">

                        <i class="fas fa-check-circle"></i> Cart updated.

                    </div>


                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Tên hàng hoá</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Kho</th>
                                <th>Tổng</th>
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
                                        <a href="?page=detail&id=<?php echo $value['MSHH'] ?>">
                                            <img class="product-item-cart__image" src="./public/uploads/book-images/<?php echo $value['Hinh1'] ?>" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?page=detail&id=<?= $value['MSHH'] ?>" class="heading-product">
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
                                            <input type="number" name="soluong[<?php echo $value['MSHH'] ?>]" min=1 max=99 value="<?php echo $value['SoLuong'] ?>" class="InputAmountProduct">
                                        </div>
                                    </td>
                                    <td>
                                        <p>
                                            <?php echo $value['SoLuongHang'] ?> quyển
                                        </p>
                                    </td>
                                    <td> <?php echo currency_format($value['SoLuong'] * $value['Gia']);
                                            $_SESSION['TongTien'] += $value['SoLuong'] * $value['Gia'] ?>
                                    </td>

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
                            <input type="text" placeholder="Mã giảm giá">
                            <a href="#" class="btn btn--primary">
                                Áp phiếu giảm giá
                            </a>
                        </div>
                        <p><input type="submit" class="btn btn--primary update" name="btn_update_cart" value="Cập nhật giỏ hàng"></p>
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
                            <a href="?page=checkout" class="btn btn--primary">Thanh toán
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
</nav>