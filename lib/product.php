<?php
function get_product_by_id($id)
{
    global $con;
    $sql = "SELECT *FROM hanghoa WHERE MSHH=$id";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);
    return $result;
}
