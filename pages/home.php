  <?php
    $sql_product = mysqli_query($con, "SELECT *FROM hanghoa");
    $list_product = array();
    if (mysqli_num_rows($sql_product) > 0) {
        while ($row = mysqli_fetch_assoc($sql_product)) {
            $list_product[] = $row;
        }
    }
    // show_array($list_product)
    ?>
  <div class="slider">
      <div class="owl-carousel owl-theme" id="main-slider">

      </div>
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
                                          <a href="?page=detail_product&id=<?php echo $item['MSHH'] ?>">
                                              <img src="./public/uploads/book-images/<?php echo $item['Hinh1'] ?>" alt="">
                                          </a>
                                          <button class="btn a-center d-flex addCartItem">
                                              <i class="bi bi-handbag"></i> Thêm vào giỏ
                                          </button>
                                          <ul class="action action1">
                                              <li class="wishlist"><i class="far fa-heart"></i><span>Add to Wishlist</span>
                                              </li>
                                              <li class="compare action-disable"><i class="fas fa-sliders-h"></i> <span>Compare</span> </li>
                                              <li class="detail" data-bs-toggle="modal" data-bs-target="#detailModal"><i class="fas fa-eye"></i><span>View Details</span></li>
                                          </ul>
                                          <ul class="action action2">
                                              <li class="wishlist"><i class="far fa-heart"></i><span></span>
                                              </li>
                                              <li class="addCartItem"><i class="bi bi-handbag"></i></li>
                                          </ul>
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

          <div class="top">
              <p class="heading">
                  Compare Products
              </p>
          </div>

          <table class="comparelist content">

          </table>

          <div class="close">
              &times;
          </div>
      </div>
  </section>