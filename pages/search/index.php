    <?php
    get_header();
    ?>
    <?php
    $key = $_SESSION['key'];
    $sql  = "SELECT * FROM `hanghoa` WHERE TENHH LIKE '%$key%'";

    if (db_fetch_array($sql)) {
        $data = db_fetch_array($sql);
    } else {
        $data = "";
    }
    ?>
    <section class="trending trending-bottom">
        <div class="container p-80">
            <div class="trending-product">
                <h3>Kết quả tìm kiếm cho: "<?= isset($key) ? $key : "" ?>"</h3>
                <?php if (isset($data) && is_array($data)) : ?>
                    <div class="category-book">
                        <div class="listProduct row" id="category-book">
                            <?php foreach ($data as $key => $book) : ?>
                                <div class="col-6 col-md-4 col-xl-3">
                                    <div class="category-book__item" data-id=<?php echo $book['MSHH'] ?> id="dataID">
                                        <div class="category-book__item__image">
                                            <a href="?page=home&action=detail&id=<?php echo $book['MSHH'] ?>">
                                                <img src="./public/uploads/book-images/<?php echo $book['Hinh1'] ?>" alt="">
                                            </a>
                                            <a href="?page=cart&id=<?php echo $book['MSHH'] ?>">
                                                <button class="btn btn--primary align-items-center d-flex addCartItem">
                                                    <i class="bi bi-handbag"></i> Thêm vào giỏ
                                                </button>
                                            </a>
                                        </div>
                                        <div class="category-book__item__title">
                                            <?php echo $book['TenHH'] ?>
                                        </div>
                                        <div class="category-book__item__price">
                                            <?php echo currency_format($book['Gia']) ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php elseif (isset($data) && is_string($data)) : ?>
                    <div class="d-flex justify-content-center"><img src="./public/img/404.svg" display="block" alt="Not Found" style="display: block; max-width: 400px; width: 100%; margin-bottom: 1.5rem; "></div>
                    <div class="d-flex justify-content-center"><a href="?page=home" style="padding: 8px 16px; border-radius: 4px; color: #fff; background-color: #ec455a; box-shadow: 0px 4px 16px rgb(43, 52, 69, 0,10); text-align: center">Trang Chủ</a></div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php
    get_footer();
    ?>