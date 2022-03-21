  <?php
    get_header();
    ?>
  <?php
    $sql_product = mysqli_query($con, "SELECT *FROM hanghoa");
    $list_product = array();
    if (mysqli_num_rows($sql_product) > 0) {
        while ($row = mysqli_fetch_assoc($sql_product)) {
            $list_product[] = $row;
        }
    }
    // show_array($list_popular)
    ?>
  <div class="slider">
      <div class="owl-carousel owl-theme" id="main-slider">

      </div>
  </div>

  <div class="container">
      <div class="popular-book__title">
          <h3>Sách bán chạy trong tháng</h3>
      </div>
      <section class="popular-book">
          <?php foreach ($list_popular as $key => $popularBook) : ?>
              <div class="popular-book__item">
                  <a href="?page=detail&id=<?php echo $popularBook['MSHH'] ?>"> <img class="popular-book__item__image" src="./public/uploads/book-images/<?= $popularBook['Hinh1'] ?>" alt="Best Seller Book"></a>
                  <div class="popular-book__item__info">
                      <div class="popular-book__item__info__title"><a href=""><?= $popularBook['TenHH'] ?></a></div>
                      <div class="popular-book__item__info__price"><?= number_format($popularBook['Gia'], 0, '', ',') ?>đ </div>
                      <div class="popular-book__item__info__content"><?= $popularBook['GhiChu'] ?></div>
                      <a href="?page=cart&id=<?php echo $popularBook['MSHH'] ?>">
                          <button class="btn btn--primary a-center d-flex btn--primary--hover">
                              <i class="bi bi-handbag"></i> Thêm vào giỏ
                          </button>
                      </a>
                  </div>
              </div>
          <?php endforeach; ?>
      </section>
  </div>


  <section class="trending trending-bottom">
      <div class="container p-80">
          <div class="trending-product">
              <div class="title">
                  <h3><span>Tất cả sách</span></h3>
              </div>
              <?php if (!empty($list_product)) {
                ?>
                  <div class="trending-product__list">
                      <div class="listProduct row products1" id="products1">
                          <?php foreach ($list_product as $item) { ?>
                              <div class="col-6 col-md-4 col-xl-3 item">
                                  <div class="product" data-id=<?php echo $item['MSHH'] ?> id="dataID">
                                      <div class="img">
                                          <a href="?page=detail&id=<?php echo $item['MSHH'] ?>">
                                              <img src="./public/uploads/book-images/<?php echo $item['Hinh1'] ?>" alt="">
                                          </a>
                                          <a href="?page=cart&id=<?php echo $item['MSHH'] ?>">
                                              <button class="btn btn--primary a-center d-flex addCartItem">
                                                  <i class="bi bi-handbag"></i> Thêm vào giỏ
                                              </button>
                                          </a>
                                      </div>
                                      <div class="content">
                                          <h4><?php echo $item['TenHH'] ?></h4>
                                          <div class="price">
                                              <?php echo currency_format($item['Gia']) ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          <?php } ?>

                      </div>
                  </div>
              <?php
                } ?>

          </div>

      </div>
  </section>



  <section class="quickview d-flex a-center">
      <div class="modal d-flex">
          <div class="img item-modal">
              <div class="owl-carousel owl-theme" id="quickviewSl">

              </div>

              <a href="#" class="btn btn-primary viewDetails">
                  View Details
              </a>

          </div>
          <div class="content item-modal">

          </div>
          <div class="close">
              &times;
          </div>
      </div>
  </section>

  <section class="compare-product">

      <div class="compare-product-box">

          <table class="comparelist content">

          </table>

          <div class="close">
              &times;
          </div>
      </div>
  </section>

  <?php
    get_footer();
    ?>