<?php
if (isset($_POST['btn_update_cart'])) {
    update_cart($_POST['soluong']);
    $_SESSION['updateCartStatusMessage'] = "Cập nhật thành công";
    $_SESSION['updateCartStatusCode'] = "success";

    redirect('?page=cart');
};

