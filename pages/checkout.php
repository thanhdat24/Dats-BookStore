    <div class="title-nav">
        <div class="container">
            <p class="description-nav">
                <a href="index.html">Home</a> / <span>Checkout</span>
            </p>
        </div>
    </div>

    <div class="main-content-checkout p-60">
        <div class="container">
            <h3 class="title">Thanh toán</h3>
            <?php
            if (isset($_SESSION['carts']['buy']) && !empty($_SESSION['carts']['buy'])) {
            ?>
                <form action="" method="post">
                    <div class="cart-detail">
                        <ul class="cart-detail__book">
                            <?php foreach ($_SESSION['carts']['buy'] as $key => $book) { ?>
                                <li class="cart-detail__book__item">
                                    <a href="?page=detail&id=<?= $book['MSHH'] ?>"><img class="cart-detail__book__item__image" src="./public/uploads/book-images/<?= $book['Hinh1'] ?>" alt="">
                                    </a>
                                    <div class="cart-detail__book__item__info">
                                        <a href="?page=detail&id=<?= $book['MSHH'] ?>" class="cart-detail__book__item__info__title">
                                            <?= $book['TenHH'] ?>
                                        </a>
                                        <input type="number" hidden id="priceOfBook<?= $key ?>" value="<?= $book['Gia'] ?>">
                                        <p class="cart-detail__book__item__info__price"><?= number_format($book['Gia'], 0) ?>đ</p>
                                        <p>Kho: còn <?= $book['SoLuongHang'] ?> quyển</p>
                                        <label class="cart-detail__book__item__info__number" for="numOfBook<?= $book['MSHH'] ?>">Số lượng: <?= $book['SoLuong'] ?></label>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <div class="cart-detail__user-info">
                            <div class="cart-detail__user-info__title">Thông tin nhận hàng</div>
                            <div class="cart-detail__user-info__detail">
                                <input hidden type="text" name="MSKH" value="<?= $_SESSION['userDetail']['MSKH'] ?>">
                                <p><b>Tên người nhận:</b></p>
                                <input type="text" id="priceOfBook<?= $key ?>" value="" placeholder="Nhập tên của bạn...">
                                <p><b>Số điện thoại:</b></p>
                                <input type="text" id="phoneOfBook<?= $key ?>" value="" placeholder="Nhập số điện thoại của bạn...">
                                <div class="cart-detail__user-info__detail__address">
                                    <b>Địa chỉ nhận hàng:</b>
                                    <div> <textarea rows="3" cols="50" id="addressOfBook<?= $key ?>" placeholder="Nhập địa chỉ giao hàng của bạn..."></textarea></di>
                                    </div>

                                    <div class="cart-detail__user-info__detail__total">
                                        <b>Tổng tiền:</b>
                                        <b id="total" class="price"> <?= currency_format(get_total_cart()) ?></b>
                                    </div>
                                    <div class="cart-detail__user-info__detail__total">
                                        <button class="btn btn--primary">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            <?php
            } else {
            ?>
                <form action="" method="post">
                    <div class="cart-detail">
                        <ul class="cart-detail__book">
                            <p>Bạn chưa chọn quyển sách nào!</p>
                        </ul>
                        <div class="cart-detail__user-info">
                            <div class="cart-detail__user-info__title">Thông tin nhận hàng</div>
                            <div class="cart-detail__user-info__detail">
                                <input hidden type="text" name="MSKH" value="<?= $_SESSION['userDetail']['MSKH'] ?>">
                                <p><b>Tên người nhận:</b></p>
                                <input type="text" id="priceOfBook<?= $key ?>" value="" placeholder="Nhập tên của bạn...">
                                <p><b>Số điện thoại:</b></p>
                                <input type="text" id="phoneOfBook<?= $key ?>" value="" placeholder="Nhập số điện thoại của bạn...">
                                <div class="cart-detail__user-info__detail__address">
                                    <b>Địa chỉ nhận hàng:</b>
                                    <div> <textarea rows="3" cols="50" id="addressOfBook<?= $key ?>" placeholder="Nhập địa chỉ giao hàng của bạn..."></textarea></di>
                                    </div>

                                    <div class="cart-detail__user-info__detail__total">
                                        <b>Tổng tiền:</b>
                                        <b id="total" class="price"> <?= currency_format(get_total_cart()) ?></b>
                                    </div>
                                    <div class="cart-detail__user-info__detail__total">
                                        <button class="btn btn--primary">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>

    </div>