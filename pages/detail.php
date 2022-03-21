<?php
get_header();
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

$sql_detail = mysqli_query($con, "SELECT *FROM hanghoa h join loaihanghoa l on h.MaLoaiHang = l.MaLoaiHang WHERE MSHH='$id'");
?>
<?php
while ($item = mysqli_fetch_array($sql_detail)) {
?>
    <section class="main-details-products">
        <div class="container">
            <h3 class="title">Chi tiết hàng hoá</h3>
            <div class="book-detail">
                <img src="./public/uploads/book-images/<?php echo $item['Hinh1'] ?>" alt="">
                <div class="book-detail__info">
                    <div class="book-detail__info__title"><?= $item['TenHH'] ?></div>
                    <div class="book-detail__info__rate">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <p class="book-detail__info__reviews">
                            <span>(Xem 258 đánh giá)</span>
                            <span> | Đã bán 1000+</span>
                        </p>

                    </div>
                    <div class="book-detail__info__price"><?= currency_format($item['Gia']) ?></div>
                    <div class="book-detail__info__detail">
                        <p class="book-detail__info__detail__title">Mã sách:</p>
                        <p class="book-detail__info__detail__title">Thể loại:</p>
                        <p class="book-detail__info__detail__title">Kho:</p>
                        <p><?= $item['MSHH'] ?></p>
                        <p><?= $item['TenLoaiHang'] ?></p>
                        <p><?= $item['SoLuongHang'] ?></p>
                    </div>
                    <a href="?page=cart&id=<?php echo $item['MSHH'] ?>">
                        <button class="btn btn--primary book-detail__button">
                            <i class="bi bi-handbag"></i> Thêm vào giỏ +
                        </button>
                    </a>
                </div>

            </div>
            <div class="book-detail__content">
                <p class="book-detail__content__title">Sơ lược sách</p>
                <p class="book-detail__content__content"><?= $item['GhiChu'] ?></p>
            </div>

            <h3>Đánh Giá - Nhận Xét Từ Khách Hàng</h3>
        </div>
    </section>
<?php
}
?>

<div class="compare-product">

    <div class="compare-product-box">

        <table class="comparelist content">

        </table>

        <div class="close">
            &times;
        </div>
    </div>
</div>
<?php
get_footer();
?>