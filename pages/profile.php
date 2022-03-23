    <?php
    get_header();
    ?>
    <?php
    if (isset($_SESSION['userLogin'])) {
        $item = userDetail($_SESSION['userLogin']['email']);
        $_SESSION['customer'] = $item;
        // show_array($_SESSION['customer']);
    }

    ?>
    <div class="container">
        <div class="profile">
            <div class="profile__item">
                <h3>Thông tin tài khoản</h3>
                <div class="profile__item__card">
                    <span class="active">ACTIVE</span>
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
                    <input type="text" name="HoTenKH" id="name" value="<?= $_SESSION['customer']['HoTenKH'] ?>">
                    <label for="email">Email: </label>
                    <input type="text" name="Email" id="email" value="<?= $_SESSION['customer']['Email'] ?>">
                    <label for="phone">Số điện thoại: </label>
                    <input type="text" name="SoDienThoai" id="phone" value="<?= $_SESSION['customer']['SoDienThoai'] ?>">
                    <label for="address">Địa chỉ: </label>
                    <input type="text" name="DiaChi" id="address" value="<?= $_SESSION['customer']['DiaChi'] ?>">
                    <button class="btn btn--primary">Cập nhật thông tin</button>
                </form>
            </div>
        </div>
        <div class="profile__order">
            <h3>Lịch sử mua hàng</h3>
            <div class="mb-4">Bạn chưa mua hàng</div>
        </div>
    </div>

    <?php
    get_footer();
    ?>