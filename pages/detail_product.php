<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

$sql_detail = mysqli_query($con, "SELECT *FROM hanghoa WHERE MSHH='$id'");
?>

<div class="cart">
    <div class="products-cart">
        <h4 class="d-flex j-between a-center">
            Your Cart
        </h4>
        <span class="close">
            &times;
        </span>

        <div class="mini-cart a-center j-between">

            <div class="mini-cart-list">
                <ul id="mini-cart-product">

                </ul>
            </div>

            <div class="mini-cart-bottom">

                <div class="total d-flex a-center j-between">

                    <strong>
                        Subtotal:
                    </strong>

                    <div class="sub-total">
                        $600.00
                    </div>

                </div>

                <div class="group-btn">

                    <a href="cart.html" class="btn btn-primary viewCart">

                        View Cart

                    </a>
                    <a href="checkout.html" class="btn btn-primary bill">

                        Checkout

                    </a>
                </div>

            </div>

        </div>

        <div class="no-product">
            No products in the cart.
        </div>

    </div>
</div>

<section class="top">
    <div class="container">

        <ul class="nav-top d-flex a-center">

        </ul>

    </div>
</section>
<?php
while ($row_detail = mysqli_fetch_array($sql_detail)) {
?>
    <div class="main-details-products p-80">
        <div class="container">
            <div class="row">
                <div class="left col-sm-12 col-lg-6 col-xl-6">
                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="swiper-slide-container">
                                    <img src="./public/uploads/book-images/<?php echo $row_detail['Hinh1'] ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="swiper-slide-container">
                                    <img src="./public/uploads/book-images/<?php echo $row_detail['Hinh1'] ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="right col-sm-12 col-lg-6 col-xl-5">
                    <h2 class="heading">
                        <?php echo $row_detail['TenHH'] ?>
                    </h2>

                    <div class="rate">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <p>
                            <span>(Xem 258 đánh giá)</span>
                            <span> | Đã bán 1000+</span>
                        </p>

                    </div>
                    <p class="price">
                        <?php echo currency_format($row_detail['Gia']) ?>
                    </p>
                    <p class="description-products">
                        <?php echo $row_detail['GhiChu'] ?>
                    </p>

                    <div class="action d-flex a-center" data-id=${item.id}>
                        <div class="cotrol-item d-flex a-center">
                            <a class="dash-1" href=""><i class="bi bi-dash"></i></a>
                            <input type="text" class="InputAmountProduct" value="1">
                            <a class="plus-1" href=""><i class="bi bi-plus"></i></a>
                        </div>
                        <a href="?page=cart">
                            <button class=" btn a-center d-flex addcartitem">
                                <i class="bi bi-handbag"></i> Thêm giỏ hàng
                            </button>
                        </a>
                    </div>
                    <div class="sku">
                        <span>SKU :</span> FUW237-1<br>
                        <span>Categories :</span> Accessories, Fashion, Mens<br>
                        <span>Tag :</span> teapot<br>
                    </div>

                </div>

            </div>

            <div class="description p-80">
                <div class="heading-des">
                    <h3> Description</h3>
                </div>

                <div class="content">
                    Tailored line. Wool mix fabric. Long design. Long buttoned sleeve. Lapel with notch. Back slit. Two
                    pockets with flaps on the front. Button up. Inner lining. Inner pocket. Back length 95.0 cm. Common
                    Projects’ black Original Achilles trainers exude the label’s stark minimalism. They’re constructed
                    in Italy from leather to a round-toe, low-top shape, and accented with a signature serial number at
                    the heel.<br><br>

                    Anti-Theft Backpack: Made of strong anti-scratch /-cut fabric, this college backpack keeps your
                    belongings pretty safe with hidden zippers of the main pocket and a secret pocket at the back
                    Convenient Charging: Via the built-in charging cable on the inside of the laptop backpack and the
                    USB charging port on the outside, you can just plug in and charge your device anywhere (Reminder:
                    Power bank NOT included)
                </div>
            </div>
        </div>

    </div>
<?php
}
?>

<div class="compare-product">

    <div class="compare-product-box">

        <div class="top">
            <p class="heading">
                Compare Products
            </p>
        </div>

        <table class="comparelist content">

        </table>

        <div class="close">
            &times;
        </div>
    </div>
</div>