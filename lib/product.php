<?php
function get_product_by_id($id)
{
    global $con;
    $sql = "SELECT *FROM hanghoa WHERE MSHH=$id";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);
    return $result;
}

function getProduct($startProduct, $product)
{
    global $con;
    $data = null;
    $sql = "SELECT *FROM hanghoa LIMIT $startProduct,$product";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    return $result;
}
