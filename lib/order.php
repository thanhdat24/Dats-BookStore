<?php
// lay thong tin don hang
function get_all_order($email)
{
    global $con;
    $sql = "SELECT d.SoDonDH, h.TenHH, c.GiaDatHang, c.SoLuong, d.TongTien  FROM khachhang k join dondathang d on k.MSKH = d.MSKH join chitietdathang c on c.SoDonDH = d.SoDonDH join hanghoa h on h.MSHH = c.MSHH WHERE Email='$email'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_array($query);
    return $result;
}
