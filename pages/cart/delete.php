<?php

// Xoá sản phẩm
$id = (int) $_GET['id'];
$_SESSION['deleteCartStatusMessage'] = "Xoá thành công!";
$_SESSION['deleteCartStatusCode'] = "success";
delete_cart($id);

redirect("?page=cart");
