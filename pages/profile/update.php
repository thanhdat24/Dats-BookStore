<?php
if (isset($_POST['btn_update'])) {
    $updateInfo = "CALL edit_kh('" . $_POST["MSKH"] . "',  '" . $_POST["HoTenKH"] . "' ,'" . $_POST["DiaChi"] . "', '" . $_POST["SoDienThoai"] . "' )";
    mysqli_query($con, $updateInfo);

    $_SESSION['updateProfileStatusMessage'] = "Cập nhật thông tin thành công!";
    $_SESSION['updateProfileStatusCode'] = "success";
    redirect("?page=profile");
};
