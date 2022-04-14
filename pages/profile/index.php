    <?php
    get_header();
    ?>
    <?php
    if (isset($_SESSION['userLogin'])) {
        // $item = userDetail($_SESSION['userLogin']['email']);
        // $orderDetail = get_all_order($_SESSION['userLogin']['email']);
        $email = $_SESSION['userLogin']['Email'];
        $sql = "SELECT d.SoDonDH, h.TenHH, h.MSHH, c.GiaDatHang, c.SoLuong, d.TongTien , h.Hinh1 FROM khachhang k join dondathang d on k.MSKH = d.MSKH join chitietdathang c on c.SoDonDH = d.SoDonDH join hanghoa h on h.MSHH = c.MSHH WHERE Email='$email' ORDER BY d.SoDonDH DESC";

        $query = mysqli_query($con, $sql);

        $chitietdathang  = db_fetch_array($sql);
        $dondathang  = db_fetch_array("SELECT *FROM dondathang d join khachhang k on d.MSKH = k.MSKH WHERE Email='$email' ORDER BY SoDonDH DESC ");
        // show_array($row);
        // show_array(db_fetch_array($sql));
        // = mysqli_fetch_array($query);
        $_SESSION['userLogin'] = userDetail($email);
    }

    if (isset($_POST['btn_update'])) {

        $updateInfo = "CALL edit_kh('" . $_POST["MSKH"] . "',  '" . $_POST["HoTenKH"] . "' ,'" . $_POST["DiaChi"] . "', '" . $_POST["SoDienThoai"] . "' )";
        mysqli_query($con, $updateInfo);

        // if ($result > 0) {
        //     $_SESSION['alert']['success'] = true;
        //     $_SESSION['alert']['messages'] = "Cập nhật khách hàng thành công";
        // } else {
        //     $_SESSION['alert']['success'] = false;
        //     $_SESSION['alert']['messages'] = $result;
        // }

        redirect("?page=profile");
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
                <!-- <?php require "./pages/shared/noti.php" ?> -->
                <form action="" method="post" class="profile__info">
                    <input hidden type="text" name="MSKH" value="<?= $_SESSION['userLogin']['MSKH'] ?>">
                    <label for="name">Họ tên: </label>
                    <input type="text" name="HoTenKH" id="name" value="<?= $_SESSION['userLogin']['HoTenKH'] ?>">
                    <label for="email">Email: </label>
                    <input disabled type="text" name="Email" id="email" value="<?= $_SESSION['userLogin']['Email'] ?>" style="cursor: not-allowed;">
                    <label for="phone">Số điện thoại: </label>
                    <input type="text" name="SoDienThoai" id="phone" value="<?= $_SESSION['userLogin']['SoDienThoai'] ?>">
                    <label for="address">Địa chỉ: </label>
                    <input type="text" name="DiaChi" id="address" value="<?= $_SESSION['userLogin']['DiaChi'] ?>">
                    <button name="btn_update" class="btn btn--primary">Cập nhật thông tin</button>
                </form>
            </div>
        </div>
        <div class="profile__order">
            <h3>Lịch sử mua hàng</h3>
            <?php
            foreach ($dondathang as $key => $item) :
            ?>
                <div class="profile__order__item">

                    <h6>Đơn hàng #<span style="color:blue; font-weight:600"><?= $item['SoDonDH'] ?></span></h6>
                    <ul>
                        <?php foreach ($chitietdathang as $key => $order) : ?>
                            <?php if ($order['SoDonDH'] === $item['SoDonDH']) : ?>
                                <li class="profile__order__item__book">
                                    <a href="?page=home&action=detail&id=<?php echo $order['MSHH'] ?>" ?><img class="profile__order__item__image" src="./public/uploads/book-images/<?= $order['Hinh1'] ?>" alt="">
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
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="profile__order__item__state">
                <b>Tổng tiền: <span class="profile__order__item__info__price"><?= currency_format($item['TongTien']) ?></span>
                </b>
            </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php
    get_footer();
    ?>