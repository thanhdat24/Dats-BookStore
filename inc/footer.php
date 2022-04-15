<footer id="footer" class="footer container-fluid">
    <h5>About me</h5>
    <img class="footer__avatar" src="./public/img/dat-avatar.jpg">
    <div class="footer__info">
        <div>Lê Thành Đạt - B1910205
            <br>
            Đồ án Công nghệ web - CT275 Nhóm 01
        </div>
        <ul class="footer__info__social">
            <li><a href="https://www.facebook.com/datle243/" target="_blank"><img src="./public/img/icon-facebook.svg" alt="Facebook icon"></a></li>
            <li><a href="https://github.com/thanhdat24" target="_blank"><img src="./public/img/icon-github.svg"></a></li>
            <li><a href="" target="_blank"><img src="./public/img/icon-linked.svg" alt="Linked icon"></a></li>
        </ul>
        <div class="footer__copyright">
            Copyright © 2022 Lê Thành Đạt
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

    <!-- SwiperJS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="public/js/main.js" type="text/javascript"></script>
    <script src="public/js/swiper.js" type="text/javascript"></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>

    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>


    <!-- SWEETALERT2 JS -->
    <script src="public/js/sweetalert2.min.js"></script>
    <?php
    if (isset($_SESSION['loginStatusMessage']) && $_SESSION['loginStatusMessage'] != "") {
    ?>
        <script>
            Swal.fire({
                icon: '<?php echo $_SESSION['loginStatusCode'] ?>',
                title: '<?php echo $_SESSION['loginStatusMessage'] ?>',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
        unset($_SESSION['loginStatusMessage']);
        unset($_SESSION['loginStatusCode']);
    }

    if (isset($_SESSION['updateCartStatusMessage']) && $_SESSION['updateCartStatusMessage'] != "") {
    ?>
        <script>
            Swal.fire({
                icon: '<?php echo $_SESSION['updateCartStatusCode'] ?>',
                title: '<?php echo $_SESSION['updateCartStatusMessage'] ?>',
                showConfirmButton: false,
                timer: 2000,
                position: 'top-right',
                customClass: 'swal2-toast',
                backdrop: false
            })
        </script>
    <?php
        unset($_SESSION['updateCartStatusMessage']);
        unset($_SESSION['updateCartStatusCode']);
    }
    if (isset($_SESSION['deleteCartStatusMessage']) && $_SESSION['deleteCartStatusMessage'] != "") {
    ?>
        <script>
            Swal.fire({
                icon: '<?php echo $_SESSION['deleteCartStatusCode'] ?>',
                title: '<?php echo $_SESSION['deleteCartStatusMessage'] ?>',
                showConfirmButton: false,
                timer: 2000,
                position: 'top-right',
                customClass: 'swal2-toast',
                backdrop: false
            })
        </script>
    <?php
        unset($_SESSION['deleteCartStatusMessage']);
        unset($_SESSION['deleteCartStatusCode']);
    }
    ?>

    <!-- JJquery Validate -->
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

</footer>