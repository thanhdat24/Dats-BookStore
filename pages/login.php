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
            redirect();
        } else {
            $error['account'] = 'Tên đăng nhập hoặc mật khẩu không đúng';
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
    <link rel="stylesheet" href="./scss/style.css">
    <link rel="stylesheet" href="./scss/login.css">
    <link rel="stylesheet" href="./scss/index.css">
</head>

<body>
    <div class="login__background">
        <form class="login__form" action="" method="POST">
            <h1 class="login__form__title">Đăng nhập <br> Dat's Bookstore</h1>
            <?php if (!empty($error['account'])) { ?>
                <div class="errorMessage">
                    <p class="error"><?php echo $error['account'] ?></p>
                </div>
            <?php } ?>

            <p class="login__form__message">
                <span style="color:red">

                </span>
                <span style="color:green">

                </span>
            </p>
            <div class="login__form__input">
                <label for="email">Email </label>
                <input value="datb1910205@student.ctu.edu.vn" id="email" type="text" name="email" placeholder="Nhập email của bạn...">
                <?php if (!empty($error['email'])) { ?>
                    <p class="error"><?php echo $error['email'] ?></p>
                <?php } ?>
            </div>
            <div class="login__form__input">
                <label for="password">Mật khẩu </label>
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

</html>