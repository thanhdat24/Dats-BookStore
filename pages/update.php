<?php
if (isset($_POST['btn_update_cart'])) {
    update_cart($_POST['soluong']);

    redirect('?page=order');

    show_array($_POST);
};
