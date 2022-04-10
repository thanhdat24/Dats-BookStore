<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dat's Bookstore</title>
    <link rel="icon" href="./public/img/icon.svg" sizes="16x16">
    <link rel="icon" href="./public/img/icon.svg" sizes="192x192">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./scss/footer.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" hre f="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="./scss/details.css">
    <link rel="stylesheet" href="./scss/cart.css">
    <link rel="stylesheet" href="./scss/checkout.css">
    <link rel="stylesheet" href="./scss/profile.css">
    <link rel="stylesheet" href="./scss/checkoutSuccess.css">

    <link rel="stylesheet" href="./scss/index.css">


    <!-- font icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

    <!-- SwiperJS -->

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="public/js/main.js" type="text/javascript"></script>
    <script src="public/js/swiper.js" type="text/javascript"></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>

    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>


</head>

<body>
    <header>
        <div class="main-header pt-3">
            <div class="container d-flex a-center j-between header">
                <div class="bar-mobile">
                    <div class="bar">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
                <a href="?page=home" class="header__logo">
                    <img src="./public/img/icon.svg" alt="logo" style="width:64px;height:64px">
                    <h1 class="header__name">Dat's <br> Bookstore</h1>
                </a>
                <form class="header__search" action="" method="post">
                    <input type="text" name="key" placeholder="Tên sản phẩm..."><input type="image" class="header__search__icon" src="./public/img/search.svg" alt="Search icon">
                </form>

                <div class="header__user d-flex a-center j-between">
                    <div class="header__user__cart">
                        <a href="?page=cart"><i class="bi bi-handbag"></i></a>
                        <?php $SoLuongGioHang = get_num_order_cart();
                        if ($SoLuongGioHang > 0) {
                        ?>
                            <span class="header__user__cart__badge"><?php echo $SoLuongGioHang ?></span>
                        <?php } else {
                        ?>
                            <span class="header__user__cart__badge">0</span>
                        <?php } ?>
                    </div>
                    <?php if (isLogin()) : ?>
                        <a class=" header__user__username" href="?page=profile">
                            <span><?= $_SESSION['userLogin']['HoTenKH'] ?>
                            </span>
                            <div class="header__user__avatar">
                                <img src="./public/img/dat-avatar.jpg" alt="User Avatar">
                                <div class="header__user__logout"><a href="?page=logout">Đăng xuất</a></div>

                            </div>
                        </a>
                    <?php else : ?>
                        <div class="header__login-button">
                            <a href="?page=login"><button class="btn btn--primary">Đăng nhập</button></a>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </header>