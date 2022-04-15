<?php
// kiểm tra đã login
if (isset($_POST['btn-login'])) {

    $error = array();
    if (empty($_POST['email'])) {
        $error['email'] = "*Email không được bỏ trống!";
    } else {
        $re = '/\S+@\S+\.\S+/';
        if (!preg_match($re, $_POST['email'])) {
            $error['email'] = "*Email không đúng định dạng!";
        } else {
            $email = $_POST['email'];
        }
    }
    if (empty($_POST['password'])) {
        $error['password'] = "*Password không được bỏ trống!";
    } else {
        $password = $_POST['password'];
    }

    if (empty($error)) {
        if (checkLogin($email, $password)) {
            $_SESSION['isLogin'] = true;
            $item = userDetail($email);
            $_SESSION['userLogin'] = $item;
            $_SESSION['loginStatusMessage'] = "Đăng nhập thành công!";
            $_SESSION['loginStatusCode'] = "success";
            redirect();
        } else {
            $_SESSION['loginStatusMessage'] = 'Tên đăng nhập hoặc mật khẩu không đúng!';
            $_SESSION['loginStatusCode'] = 'error';
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
    <title>Dat's Bookstore</title>

    <link rel="icon" href="./public/img/book.png" sizes="16x16">
    <link rel="icon" href="./public/img/book.png" sizes="192x192">

    <!-- SWEETALERT2 CSS -->
    <link rel="stylesheet" href="./public/css/sweetalert2.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="./public/css/main.css">
</head>

<body>
    <div class="login__background">
        <form class="login__form" action="" method="POST">
            <h1 class="login__form__title">Đăng nhập <br> Dat's Bookstore</h1>
            <p class="login__form__message">
                <span style="color:red">

                </span>
                <span style="color:green">

                </span>
            </p>
            <div class="login__form__input">
                <label for="email">Email (Kiểm thử: datb1910205@student.ctu.edu.vn)</label>
                <input value="datb1910205@student.ctu.edu.vn" id="email" type="text" name="email" placeholder="Nhập email của bạn...">
                <?php if (!empty($error['email'])) { ?>
                    <p class="error"><?php echo $error['email'] ?></p>
                <?php } ?>
            </div>
            <div class="login__form__input">
                <label for="password">Mật khẩu (Kiểm thử: Dat123456)</label>
                <input value="Dat123456" id="password" type="password" name="password" placeholder="Nhập mật khẩu...">
                <?php if (!empty($error['password'])) { ?>
                    <p class="error"><?php echo $error['password'] ?></p>
                <?php } ?>
            </div>
            <input type="submit" name="btn-login" class="btn btn--primary" value="Đăng nhập">
            <div style="margin-left:auto; margin-top: 10px;">Chưa có tài khoản? <a href="?page=signup" style="font-weight: bold; color: red; margin-left: 10px;">Đăng ký</a></div>

        </form>
    </div>
</body>

<!-- SWEETALERT2 JS -->
<script src="public/js/sweetalert2.min.js"></script>

<?php
if (isset($_SESSION['loginStatusCode']) && $_SESSION['loginStatusCode'] == 'error') {
?>
    <script>
        Swal.fire({
            icon: '<?php echo $_SESSION['loginStatusCode'] ?>',
            title: '<?php echo $_SESSION['loginStatusMessage'] ?>',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
    <?php
    unset($_SESSION['loginStatusMessage']);
    unset($_SESSION['loginStatusCode']);
} else {
    if (isset($_SESSION['signupStatusCode']) && $_SESSION['signupStatusCode'] == 'success') {
    ?>
        <script>
            Swal.fire({
                icon: '<?php echo $_SESSION['signupStatusCode'] ?>',
                title: '<?php echo $_SESSION['signupStatusMessage'] ?>',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
<?php
        unset($_SESSION['signupStatusMessage']);
        unset($_SESSION['signupStatusCode']);
    }
}
?>

</html>