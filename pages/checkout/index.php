   <?php
    get_header();
    ?>
   <?php
    // if (isset($_SESSION['userLogin'])) {
    //     $item = userDetail($_SESSION['userLogin']['email']);
    //     $_SESSION['userLogin'] = $item;
    //     // show_array($_SESSION['userLogin']);
    // }
    global   $MSKH, $DiaChi, $TongTien;
    if (!empty(($_SESSION['carts']['buy']))) {
        foreach ($_SESSION['carts']['buy'] as $key => $book) {
            $SoLuong = $book['SoLuong'];
            $Gia = $book['Gia'];
            $TongTien += $book['SoLuong'] * $book['Gia'];
        }
    }
    // show_array($_SESSION['carts']['buy']);

    if (isset($_POST['btn-order'])) {
        $MSKH = $_POST['MSKH'];
        $DiaChi = $_POST['DiaChi'];
        $sql_dondathang = "INSERT INTO dondathang(MSKH,DiaChi,TongTien) VALUES ('$MSKH','$DiaChi','$TongTien')";
        $result_dondathang = mysqli_query($con, $sql_dondathang);
        if ($result_dondathang) {
            $SoDonDH = mysqli_insert_id($con);
            foreach ($_SESSION['carts']['buy'] as $value) {
                mysqli_query($con, "INSERT INTO chitietdathang(SoDonDH,MSHH, SoLuong,GiaDatHang) VALUES ('$SoDonDH','$value[MSHH]','$value[SoLuong]','$value[Gia]')");
            }
            redirect("?page=checkout&action=success");
        } else {
            echo "Đặt hàng thất bại!";
        }
    }
    ?>
   <div class="main-content-checkout">
       <div class="container">
           <h3 class="title">Thanh toán</h3>
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
                                       <b>Thành tiền:</b>
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
                       <a href="?page=home"><span class="iconify" data-icon="eva:arrow-ios-back-fill" data-width="22" data-height="22"></span>Tiếp tục mua sắm</a>
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
                                   <b>Thành tiền:</b>
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

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script type="text/javascript" src="./public/js/jquery.validate.js"></script>

   <script type="text/javascript">
       $.validator.setDefaults({
           submitHandler: function() {
               form.submit();
           }
       })
       $(document).ready(function() {
           $("#checkout").validate({
               rules: {
                   DiaChi: "required",
               },
               messages: {
                   DiaChi: "*Vui lòng nhập địa chỉ giao hàng!"
               },
               errorElement: "div",
               errorPlacement: function(error, element) {
                   error.addClass("invalid-feedback");
                   $(".invalid-feedback").css("font-style", "italic")
                   if (element.prop("type") === "checkbox") {
                       error.insertAfter(element.siblings("label"))
                   } else {
                       error.insertAfter(element)
                   }
               },
               highlight: function(element, errorClass, validClass) {
                   $(element).addClass("is-invalid").removeClass("is-valid")

               },
               unhighlight: function(element, errorClass, validClass) {
                   $(element).addClass("is-valid").removeClass("is-invalid")
               },
           })
       })
   </script>
   <?php
    get_footer();
    ?>