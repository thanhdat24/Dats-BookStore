   <?php
    get_header();
    ?>
   <?php
    global   $MSKH, $DiaChi, $TongTien;
    if (!empty(($_SESSION['carts']['buy']))) {
        foreach ($_SESSION['carts']['buy'] as $key => $book) {
            $SoLuong = $book['SoLuong'];
            $Gia = $book['Gia'];
            $TongTien += $book['SoLuong'] * $book['Gia'];
        }
    }


    if (isset($_POST['btn-order'])) {
        $MSKH = $_POST['MSKH'];
        $DiaChi = $_POST['DiaChi'];
        $result_dondathang = db_query("INSERT INTO dondathang(MSKH,DiaChi,TongTien) VALUES ('$MSKH','$DiaChi','$TongTien')");

        if ($result_dondathang) {
            $SoDonDH = mysqli_insert_id($con);
            foreach ($_SESSION['carts']['buy'] as $value) {
                db_query("INSERT INTO chitietdathang(SoDonDH,MSHH, SoLuong,GiaDatHang) VALUES ('$SoDonDH','$value[MSHH]','$value[SoLuong]','$value[Gia]')");
            }
            redirect("?page=checkout&action=success");
        } else {
            echo "Đặt hàng thất bại!";
        }
    }
    ?>
   <div class="main-content-checkout">
       <div class="container">
           <h3 class="title mt-5">Thanh toán</h3>
           <?php
            if (isset($_SESSION['carts']['buy']) && !empty($_SESSION['carts']['buy'])) {
            ?>
               <form id="checkout" action="" method="post">
                   <div class="cart-detail">
                       <ul class="cart-detail__book">
                           <?php foreach ($_SESSION['carts']['buy'] as $key => $book) { ?>
                               <li class="cart-detail__book__item">
                                   <a href="?page=home&action=detail&id=<?= $book['MSHH'] ?>"><img class="cart-detail__book__item__image" src="./public/uploads/book-images/<?= $book['Hinh1'] ?>" alt="">
                                   </a>
                                   <div class="cart-detail__book__item__info">
                                       <a href="?page=home&action=detail&id=<?= $book['MSHH'] ?>" class="cart-detail__book__item__info__title">
                                           <?= $book['TenHH'] ?>
                                       </a>
                                       <input type="number" hidden id="priceOfBook<?= $key ?>" value="<?= $book['Gia'] ?>">
                                       <p class="cart-detail__book__item__info__price"><?= number_format($book['Gia'], 0) ?>đ</p>
                                       <label class="cart-detail__book__item__info__number" for="numOfBook<?= $book['MSHH'] ?>">Số lượng: <?= $book['SoLuong'] ?></label>
                                   </div>
                               </li>
                           <?php
                            }
                            ?>
                       </ul>
                       <?php if (isset($_SESSION['isLogin'])) { ?>
                           <div class="cart-detail__user-info">
                               <div class="cart-detail__user-info__title">Thông tin nhận hàng</div>
                               <div class="cart-detail__user-info__detail">
                                   <input hidden type="text" name="MSKH" value="<?= $_SESSION['userLogin']['MSKH'] ?>">
                                   <p><b>Tên người nhận:</b></p>
                                   <p class="ml-3"><?= $_SESSION['userLogin']['HoTenKH'] ?></p>
                                   <p><b>Số điện thoại:</b></p>
                                   <p class="ml-3"><?= $_SESSION['userLogin']['SoDienThoai'] ?></p>
                                   <div class="cart-detail__user-info__detail__address">
                                       <b>Địa chỉ nhận hàng:</b>
                                       <div> <textarea name="DiaChi" rows="3" cols="50" id="addressOfBook<?= $key ?>" placeholder="Nhập địa chỉ giao hàng của bạn..."></textarea></div>
                                   </div>

                                   <div class="cart-detail__user-info__detail__total">
                                       <b>Tổng tiền:</b>
                                       <b id="total" class="price"> <?= currency_format(get_total_cart()) ?></b>
                                   </div>
                                   <div class="cart-detail__user-info__detail__total">
                                       <button class="btn btn--primary" name="btn-order">Đặt mua</button>
                                   </div>
                               </div>
                           </div>
                       <?php } else { ?>
                           <div class="cart-detail__user-info">
                               <div class="cart-detail__user-info__title">
                                   Thông tin giỏ hàng
                               </div>
                               <p class="cart-detail__user-info__text">Bạn chưa đăng nhập, hãy <a href="?page=login">đăng nhập</a> để đặt hàng!</p>
                           </div>

                       <?php } ?>
                   </div>
       </div>
       </form>
   <?php
            } else {
    ?>
       <form action="" method="post">
           <div class="cart-detail">
               <div class="cart-detail__book__empty">
                   <img class="empty" src="./public/img/illustration_empty_cart.svg" alt="empty content">
                   <h3>Giỏ hàng rỗng</h3>
                   <p>Có vẻ như bạn không có quyển sách nào trong giỏ hàng của mình.</p>
                   <div class="back__home">
                       <a href="?page=home"><i class="fa fa-angle-left mr-2"></i>Tiếp tục mua sắm</a>
                   </div>
               </div>
               <?php if (isset($_SESSION['isLogin'])) { ?>
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
                               <div class="cart-detail__user-info__detail__total disabled">
                                   <button class="btn btn--primary" name="btn-order">Đặt mua</button>
                               </div>
                           </div>
                       </div>
                   </div>
               <?php } else {
                ?>
                   <div class="cart-detail__user-info">
                       <div class="cart-detail__user-info__title">
                           Thông tin giỏ hàng
                       </div>
                       <p class="cart-detail__user-info__text">Bạn chưa đăng nhập, hãy <a href="?page=login">đăng nhập</a> để đặt hàng!</p>
                   </div>
               <?php } ?>

           </div>
       </form>
   <?php
            }
    ?>
   </div>

   </div>


   <?php
    get_footer();
    ?>