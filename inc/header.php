<?php
if (isset($_SESSION['userLogin'])) {
    $item = userDetail($_SESSION['userLogin']['email']);

    $_SESSION['userDetail'] = $item;

    // show_array($_SESSION['userDetail']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dat's Bookstore</title>
    <link rel="icon" href="https://blueskytechco.com/rubix/wp-content/uploads/2021/01/favi.png" sizes="16x16">
    <link rel="icon" href="https://blueskytechco.com/rubix/wp-content/uploads/2021/01/favi.png" sizes="192x192">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./scss/style.css">
    <link rel="stylesheet" href="./scss/footer.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" hre f="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="./scss/details.css">
    <link rel="stylesheet" href="./scss/cart.css">
    <link rel="stylesheet" href="./scss/checkout.css">


    <link rel="stylesheet" href="./scss/index.css">


    <!-- font icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

    <!-- SwiperJS -->

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="./owlcarousel/owl.carousel.min.js"></script>

    <script src="public/js/details.js" type="text/javascript"></script>
    <script src="public/js/main.js" type="text/javascript"></script>
    <script src="public/js/swiper.js" type="text/javascript"></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>




</head>

<body>
    <header>
        <div class="main-header">
            <div class="container d-flex a-center j-between header">
                <div class="bar-mobile">
                    <div class="bar">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
                <div class="logo">
                    <a href="?page=home">
                        <img src="./img/logo/logo_x2.png" alt="">
                    </a>
                </div>
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
                        <a class=" header__user__username" href="/profile">
                            <span><?= $_SESSION['userDetail']['HoTenKH'] ?>
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

    <section class="popup-product-added">
        <p>Product added!</p>
    </section>

    <div class="loaded">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>

    <section class="content-in-website">
        <section class="menu-mobile-overlay">
            <div class="content-menu">
                <div class="close">
                    &times;
                </div>
                <div class="searching">
                    <h3 class="searching-title">
                        Search
                    </h3>

                    <div class="suggets">
                        <ul>
                            <li>
                                All categories
                            </li>
                            <li>
                                Furniture
                            </li>
                            <li>
                                Chairs
                            </li>
                            <li>
                                Construction
                            </li>
                            <li>
                                Decoration
                            </li>
                            <li>
                                Education
                            </li>
                        </ul>
                    </div>

                    <div class="search d-flex a-center">
                        <input type="text" placeholder="Search Product...">
                        <i class="bi bi-search"></i>
                    </div>
                </div>

                <nav class="main-menu-mobile">
                    <ul class="nav-level-1">
                        <li>
                            <a class="d-flex a-center j-between" href="#"> Home <i class="dropdown-mini bi bi-chevron-down"></i></a>
                            <ul class="menu-level2">
                                <li><a href="#">Furniture</a></li>
                                <li><a href="#">Fashion – Jewelry</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="d-flex a-center j-between" href="products.html"> Shop <i class="dropdown-mini bi bi-chevron-down"></i></a>
                            <ul class="menu-level2">
                                <li>
                                    <a href="#">Shop Layout <i class="bi bi-chevron-down"></i></a>
                                    <ul class="menu-level-3">
                                        <li><a href="#">Full Width</a></li>
                                        <li><a href="#">Grid View</a></li>
                                        <li><a href="#">List View</a></li>
                                        <li><a href="#">Left Sidebar</a></li>
                                        <li><a href="#">Sidebar Right</a></li>
                                        <li><a href="#">Wishlist</a></li>
                                        <li><a href="#">Checkout</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Product Layout <i class="bi bi-chevron-down"></i></a>
                                    <ul class="menu-level-3">
                                        <li><a href="#">Big Image Scroll</a></li>
                                        <li><a href="#">Product Carousel</a></li>
                                        <li><a href="#">Product Grid</a></li>
                                        <li><a href="#">Vertical Right </a></li>
                                        <li><a href="#">Vertical Left</a></li>
                                        <li><a href="#">Horizontal Layout</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Product Type <i class="bi bi-chevron-down"></i></a>
                                    <ul class="menu-level-3">
                                        <li><a href="#">Simple Product</a></li>
                                        <li><a href="#">Variables Product</a></li>
                                        <li><a href="#">Group Product</a></li>
                                        <li><a href="#">Special Product</a></li>
                                        <li><a href="#">Furniture</a></li>
                                        <li><a href="#">Decoration</a></li>
                                        <li><a href="#">Chairs</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="./products.html">Product Categories <i class="bi bi-chevron-down"></i></a>
                                    <ul class="menu-level-3">
                                        <li><a href="#">Furniture</a></li>
                                        <li><a href="#">Jewelly</a></li>
                                        <li><a href="#">Fashion</a></li>
                                        <li><a href="#">Chairs</a></li>
                                        <li><a href="#">Lighting Lamp</a></li>
                                        <li><a href="#">Sofas</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="d-flex a-center j-between" href="#"> Page <i class="dropdown-mini bi bi-chevron-down"></i></a>

                            <ul class="menu-level2">
                                <li> <a href="#"> About Us</a></li>
                                <li> <a href="#"> Contact</a></li>
                                <li> <a href="./wishlist.html"> Wishlist</a></li>
                                <li> <a href="#"> My Account</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="d-flex a-center j-between" href="#"> Blog <i class="dropdown-mini bi bi-chevron-down"></i></a>

                            <ul class="menu-level2">
                                <li> <a href="#"> Big Image </a></li>
                                <li> <a href="#"> Grid Layout </a></li>
                                <li> <a href="#"> Left Sidebar </a></li>
                                <li> <a href="#"> Right Sidebar </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"> Contact </a>
                        </li>
                    </ul>
                </nav>

                <nav class="bottom">

                    <ul class="my-account">

                        <li class="d-flex a-center j-between">
                            <div class="login_Regis">
                                <a href="login.html">Login</a> /
                                <a href="register.html">Register</a>
                            </div>
                            <i class="bi bi-person"></i>
                        </li>
                        <li class="d-flex a-center j-between">
                            <a href="wishlist.html">Wishlist</a>
                            <i class="bi bi-heart"></i>
                        </li>
                    </ul>
                </nav>

            </div>
        </section>

        <ul class="side-sticky-icons a-center">
            <li><a href="#"><i class="bi bi-house"></i> Home</a></li>
            <li class="addWishlist">
                <a href="wishlist.html">
                    <i class="bi bi-heart"></i> Wishlist
                </a>
                <span class="before">0</span>
            </li>
            <li>
                <div class="bar">
                    <i class="fas fa-bars"></i> Menu
                </div>
            </li>
            <li><a href="login.html"><i class="far fa-user"></i> Account</a></li>
            <li class="cart-item">
                <a href="#"><i class="bi bi-handbag"></i>Cart</a>
                <span class="before">0</span>
            </li>
        </ul>

        <section class="form-search">
            <div class="container-element">
                <h2>Search</h2>
                <ul class="d-flex a-center">
                    <li class="active">All categories</li>
                    <li>Furniture</li>
                    <li>Chairs</li>
                    <li>Construction</li>
                    <li>Decoration</li>
                    <li>Education</li>
                </ul>
                <div class="searchProduct d-flex a-center">
                    <input type="text" placeholder="Search Products...">
                    <i class="bi bi-search"></i>
                </div>
            </div>
            <div class="close">
                &times;
            </div>
        </section>


        <section class="cart">
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

                            <a href="?page=cart" class="btn btn-primary viewCart">

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
        </section>





    </section>