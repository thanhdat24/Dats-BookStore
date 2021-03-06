  <?php
    get_header();
    ?>
  <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = "";
    }
    $list_product = db_fetch_array("SELECT *FROM hanghoa h join loaihanghoa l on h.MaLoaiHang = l.MaLoaiHang WHERE h.MALOAIHANG = '$id'");

    $list_product_all = db_fetch_array("SELECT *FROM hanghoa");

    $list_product_type = db_fetch_array("SELECT *FROM loaihanghoa");

    $page = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
    $products = 8;

    // vi tri san pham bat dau muon lay
    $startProduct =  $page * $products - $products;

    // show san pham
    $data = getProduct($startProduct, $products);
    // dem so luong san pham // 40sp
    $rowCount = count($list_product_all);

    // tong so trang
    $totalPages = ceil($rowCount / $products);

    ?>
  <div class="slider">
      <div class="owl-carousel owl-theme" id="main-slider">

      </div>
  </div>

  <div class="container pb-2">
      <div class="banner">
          <img src="./public/img/banner.jpg" alt="banner">
      </div>
      <div class="popular-book__title mt-5">
          <h3>Sách bán chạy trong tháng</h3>
      </div>
      <section class="popular-book">
          <?php foreach ($list_popular as $key => $popularBook) : ?>
              <div class="popular-book__item">
                  <a href="?page=home&action=detail&id=<?php echo $popularBook['MSHH'] ?>"> <img class="popular-book__item__image" src="./public/uploads/book-images/<?= $popularBook['Hinh1'] ?>" alt="Best Seller Book"></a>
                  <div class="popular-book__item__info">
                      <div class="popular-book__item__info__title"><a href=""><?= $popularBook['TenHH'] ?></a></div>
                      <div class="popular-book__item__info__price"><?= number_format($popularBook['Gia'], 0, '', ',') ?>đ </div>
                      <div class="popular-book__item__info__content"><?= $popularBook['GhiChu'] ?></div>
                      <a href="?page=home&action=add&id=<?php echo $popularBook['MSHH'] ?>">
                          <button class="btn btn--primary align-items-center d-flex btn--primary--hover ">
                              <i class="mr-1 bi bi-handbag"></i> Thêm vào giỏ
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
              <nav>
                  <ul id="navCategory" class="nav">
                      <?php foreach ($list_product_type as $key => $category) : ?>
                          <?php if ($key + 1 <= 13) : ?>
                              <a href="?page=home&id=<?= $category['MaLoaiHang'] ?>" class="nav__item" value="<?= $category['MaLoaiHang'] ?>"><?= $category['TenLoaiHang'] ?></a>
                          <?php endif; ?>
                          <?php if ($key + 1 == 14) : ?>
                              <li class="nav__item">...</li>
                          <?php endif; ?>
                      <?php endforeach; ?>
              </nav>
              <?php if (!empty($list_product) && isset($_GET['id'])) {
                ?>
                  <div class="category-book">
                      <div class="listProduct row" id="category-book">
                          <?php foreach ($list_product as $item) { ?>
                              <div class="col-6 col-md-4 col-xl-3 ">
                                  <div class="category-book__item" data-id=<?php echo $item['MSHH'] ?> id="dataID">
                                      <div class="category-book__item__image">
                                          <a href="?page=home&action=detail&id=<?php echo $item['MSHH'] ?>">
                                              <img src="./public/uploads/book-images/<?php echo $item['Hinh1'] ?>" alt="">
                                          </a>
                                          <a href="?page=home&action=add&id=<?php echo $item['MSHH'] ?>">
                                              <button class="btn btn--primary align-items-center d-flex addCartItem">
                                                  <i class="bi bi-handbag"></i> Thêm vào giỏ
                                              </button>
                                          </a>
                                      </div>
                                      <div class="category-book__item__title">
                                          <?php echo $item['TenHH'] ?>
                                      </div>
                                      <div class="category-book__item__price">
                                          <?php echo currency_format($item['Gia']) ?>
                                      </div>
                                  </div>
                              </div>
                          <?php } ?>

                      </div>
                  </div>
              <?php
                } else {
                ?>
                  <div class="category-book">
                      <div class="listProduct row" id="category-book">
                          <?php if (!empty($data)) : foreach ($data as $book) : ?>
                                  <div class="col-6 col-md-4 col-xl-3">
                                      <div class="category-book__item" data-id=<?php echo $book['MSHH'] ?> id="dataID">
                                          <div class="category-book__item__image">
                                              <a href="?page=home&action=detail&id=<?php echo $book['MSHH'] ?>">
                                                  <img src="./public/uploads/book-images/<?php echo $book['Hinh1'] ?>" alt="">
                                              </a>
                                              <a href="?page=home&action=add&id=<?php echo $book['MSHH'] ?>">
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
                          <?php endforeach;
                            endif; ?>

                      </div>
                  </div>
              <?php
                }
                ?>

          </div>
          <nav aria-label="Page navigation example ">
              <ul class="pagination justify-content-center mt-4">

                  <?php if ($page > 1) : ?>
                      <li class="page-item">
                          <a class="page-link" href="?page=home&pagination=<?= $page - 1 ?>" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                          </a>
                      </li>
                  <?php endif; ?>

                  <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                      <?php if ($page == $i) { ?>
                          <li class="page-item active"><a class="page-link" href="?page=home&pagination=<?= $i ?>"><?= $i ?></a></li>
                      <?php } else { ?>
                          <li class="page-item"><a class="page-link" href="?page=home&pagination=<?= $i ?>"><?= $i ?></a></li>
                  <?php }
                    endfor; ?>

                  <?php if ($page !=  $totalPages) : ?>
                      <li class="page-item">
                          <a class="page-link" href="?page=home&pagination=<?= $page + 1 ?>" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                          </a>
                      </li>
                  <?php endif; ?>
              </ul>
          </nav>
      </div>

  </section>


  <?php
    get_footer();
    ?>