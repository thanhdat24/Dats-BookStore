<?php

// Xoá sản phẩm
$id = (int) $_GET['id'];
delete_cart($id);

redirect("?page=order");
