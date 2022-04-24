<?php
if (isset($_POST['key'])) {
    $_SESSION['key'] =  $_POST['key'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dat's Bookstore</title>

    <link rel="icon" href="./public/img/book.png" sizes="16x16">
    <link rel="icon" href="./public/img/book.png" sizes="192x192">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- SWEETALERT2 CSS -->
    <link rel="stylesheet" href="./public/css/sweetalert2.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="./public/css/main.css">


    <!-- font icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">



</head>

<body>
    <header>
        <div class="main-header pt-3">
            <div class="container header">
                <a href="?page=home" class="header__logo">
                    <img src="./public/img/book.png" alt="logo" style="width:64px;height:64px">
                    <h1 class="header__name">Dat's <br> Bookstore</h1>
                </a>
                <form class="header__search" action="?page=search" method="post">
                    <input type="text" name="key" placeholder="Tìm kiếm sách..."><input type="image" class="header__search__icon" src="./public/img/search.svg" alt="Search icon">
                </form>

                <div class="header__user d-flex align-items-center justify-content-between">
                    <div class="header__user__cart">
                        <a href="?page=cart"><i class="bi bi-handbag"></i></a>
                        <?php $SoLuongGioHang = get_num_order_cart();
                        if ($SoLuongGioHang > 0) {
                        ?>
                            <span id="total-qty" class="header__user__cart__badge"><?php echo $SoLuongGioHang ?></span>
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