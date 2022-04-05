 <?php
    // kiểm tra đã singup
    global    $error, $HoTenKH, $Email, $password, $confirm_password, $phone, $DiaChi;
    if (isset($_POST['btn-signup'])) {
        $error = array();
        if (empty($_POST['HoTenKH'])) {
            $error['HoTenKH'] = "error";
        } else {
            $HoTenKH = $_POST['HoTenKH'];
        }
        if (empty($_POST['Email'])) {
            $error['Email'] = "error";
        } else {
            $Email = $_POST['Email'];
        }
        if (empty($_POST['password'])) {
            $error['password'] = "error";
        } else {
            $password = $_POST['password'];
        }

        if (empty($_POST['confirm_password'])) {
            $error['confirm_password'] = "error";
        } else {
            $confirm_password = $_POST['confirm_password'];
        }

        if (empty($_POST['phone'])) {
            $error['phone'] = "error";
        } else {
            $phone = $_POST['phone'];
        }
        if (empty($_POST['DiaChi'])) {
            $error['DiaChi'] = "error";
        } else {
            $DiaChi = $_POST['DiaChi'];
        }
        if (empty($error)) {
            if (!checkUserExits($Email)) {
                $password = md5($password);
                $sql = "INSERT INTO khachhang(HoTenKH,DiaChi,SoDienThoai,Email,password) VALUES ('$HoTenKH','$DiaChi','$phone','$Email','$password')";
                $result = mysqli_query($con, $sql);
                show_array($result);

                if ($result) {
                    redirect("?page=login");
                } else {
                    echo "Thất bại";
                }
            } else {
                $error['existAccount'] = 'Email đã tồn tại';
            }
        }
    }
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />

     <link rel="stylesheet" href="./scss/style.css">
     <link rel="stylesheet" href="./scss/login.css">
     <link rel="stylesheet" href="./scss/index.css">
 </head>

 <body>
     <div class="login__background" style="height:100%">
         <form id="signupForm" class="login__form" action="" method="post">
             <h1 class="login__form__title">Đăng ký tài khoản <br> Dat's Bookstore</h1>
             <?php if (!empty($error['existAccount'])) : ?>
                 <div class="errorMessage">
                     <p class="error"><?php echo $error['existAccount'] ?></p>
                 </div>
             <?php endif; ?>
             <div class="login__form__input">
                 <label for="HoTenKH">Họ tên <span style="color:red; font-weight: normal;">(*)</span></label>
                 <input value="" id="HoTenKH" type="text" name="HoTenKH" placeholder="Nhập họ tên của bạn...">

             </div>

             <div class="login__form__input">
                 <label for="Email">Email <span style="color:red; font-weight: normal;">(*)</span></label>
                 <input value="" id="Email" type="email" name="Email" placeholder="Nhập email của bạn...">

             </div>
             <div class="login__form__input">
                 <label for="phone">Số điện thoại <span style="color:red; font-weight: normal;">(*)</span></label>
                 <input value="" id="phone" type="text" name="phone" placeholder="Nhập số điện thoại của bạn...">


             </div>

             <div class="login__form__input">
                 <label for="password">Mật khẩu <span style="color:red; font-weight: normal;">(*)</span></label>
                 <input value="" id="password" type="password" name="password" placeholder="Nhập mật khẩu...">


             </div>
             <div class="login__form__input">
                 <label for="confirm_password">Nhập lại mật khẩu <span style="color:red; font-weight: normal;">(*)</span></label>
                 <input value="" id="confirm_password" type="password" name="confirm_password" placeholder="Nhập lại mật khẩu...">


             </div>

             <div class="login__form__input">
                 <label for="DiaChi">Địa chỉ <span style="color:red; font-weight: normal;">(*)</span></label>
                 <input value="" id="DiaChi" type="text" name="DiaChi" placeholder="Nhập địa chỉ giao hàng của bạn...">


             </div>

             <button type="submit" class="btn btn--primary" name="btn-signup">Đăng ký</button>
             <div style="margin-left:auto; margin-top: 10px;">Đã có tài khoản? <a href="?page=login" style="font-weight: bold; color: red; margin-left: 10px;">Đăng nhập</a></div>
         </form>
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
             $("#signupForm").validate({
                 rules: {
                     Email: {
                         required: true,
                         email: true
                     },
                     HoTenKH: "required",
                     password: {
                         required: true,
                         minlength: 8
                     },
                     confirm_password: {
                         required: true,
                         minlength: 8,
                         equalTo: "#password"
                     },
                     phone: {
                         required: true,
                         minlength: 10,
                         maxlength: 10,
                     },
                     DiaChi: "required",
                 },
                 messages: {
                     HoTenKH: "*Vui lòng nhập họ tên!",
                     Email: "*Email không hợp lệ!",
                     password: {
                         required: "*Vui lòng nhập mật khẩu!",
                         minlength: "Mật khẩu phải có ít nhất 8 ký tự"
                     },
                     confirm_password: {
                         required: "*Vui lòng nhập mật khẩu!",
                         minlength: "*Mật khẩu phải có ít nhất 8 ký tự",
                         equalTo: "*Mật khẩu và mật khẩu xác phải trùng khớp khớp!"
                     },
                     phone: {
                         required: "*Vui lòng nhập số điện thoại!",
                         minlength: "*Số điện thoại phải gồm 10 số!",
                         maxlength: "*Số điện thoại phải gồm 10 số!",
                     },
                     DiaChi: "*Vui lòng nhập địa chỉ!"
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
 </body>

 </html>