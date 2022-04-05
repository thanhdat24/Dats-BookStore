    <?php
    get_header();
    ?>
    <?php
    if (isset($_SESSION['userLogin'])) {
        // $item = userDetail($_SESSION['userLogin']['email']);
        // $orderDetail = get_all_order($_SESSION['userLogin']['email']);
        $email = $_SESSION['userLogin']['Email'];
        $sql = "SELECT d.SoDonDH, h.TenHH, c.GiaDatHang, c.SoLuong, d.TongTien , h.Hinh1 FROM khachhang k join dathang d on k.MSKH = d.MSKH join chitietdathang c on c.SoDonDH = d.SoDonDH join hanghoa h on h.MSHH = c.MSHH WHERE Email='$email' ORDER BY d.SoDonDH DESC";

        $query = mysqli_query($con, $sql);
    }

    ?>
    <div class="container">
        <div class="profile">
            <div class="profile__item">
                <h3>Thông tin tài khoản</h3>
                <div class="profile__item__card">
                    <div class="profile__item__card__avatar">
                        <span class="profile__item__card__span">
                            <img src="./public/img/dat-avatar.jpg" alt="./public/img/dat-avatar.jpg" class="profile__item__card__img">
                        </span>
                    </div>
                </div>
            </div>
            <div class="profile__item">
                <form action="" method="post" class="profile__info">
                    <label for="name">Họ tên: </label>
                    <input type="text" name="HoTenKH" id="name" value="<?= $_SESSION['userLogin']['HoTenKH'] ?>">
                    <label for="email">Email: </label>
                    <input type="text" name="Email" id="email" value="<?= $_SESSION['userLogin']['Email'] ?>">
                    <label for="phone">Số điện thoại: </label>
                    <input type="text" name="SoDienThoai" id="phone" value="<?= $_SESSION['userLogin']['SoDienThoai'] ?>">
                    <label for="address">Địa chỉ: </label>
                    <input type="text" name="DiaChi" id="address" value="<?= $_SESSION['userLogin']['DiaChi'] ?>">
                    <button class="btn btn--primary">Cập nhật thông tin</button>
                </form>
            </div>
        </div>
        <div class="profile__order">
            <h3>Lịch sử mua hàng</h3>
            <?php
            while ($order = mysqli_fetch_array($query)) {
            ?>
                <div class="profile__order__item">
                 
                    <h6>Đơn hàng #<span style="color:blue"><?= $order['SoDonDH'] ?></span></h6>
                    <ul>
                        <li class="profile__order__item__book">
                            <a href="" ?><img class="profile__order__item__image" src="./public/uploads/book-images/<?= $order['Hinh1'] ?>" alt="">
                            </a>
                            <div class="profile__order__item__info">
                                <a href="" class="profile__order__item__info__title">
                                    <?= $order['TenHH'] ?>
                                </a>
                                <p class="profile__order__item__info__price"><?= currency_format($order['GiaDatHang']) ?></p>
                                <p>Số lượng: <?= $order['SoLuong'] ?></p>
                            </div>
                        </li>
                    </ul>
                    <div class="profile__order__item__state">
                        <b>Tổng tiền: <span class="profile__order__item__info__price"><?= currency_format($order['TongTien']) ?></span>
                        </b>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php
    get_footer();
    ?>