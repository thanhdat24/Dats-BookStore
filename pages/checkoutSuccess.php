  <?php
  get_header();
  ?>
  <?php
  // Thanh toán xong, xoá sp giỏ hàng
  unset($_SESSION['carts']);
  ?>
  <div class="popup-container">
    <div class="popup-detail">
      <div class="popup-detail__cart">
        <h3>Cám ơn vì đã mua hàng!</h3>
        <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#000000,secondary:#08a88a" stroke="40" style="width:250px;height:250px">
        </lord-icon>
        <div class="popup-detail__cart__content">
          <p>Cảm ơn bạn đã đặt hàng <a><?php
                                        $bytes = random_bytes(12);
                                        echo bin2hex($bytes);
                                        ?></a></p>
          <p>Chúng tôi sẽ gửi cho bạn thông báo trong vòng 5 ngày khi hàng được gửi.</p>
          <p>Nếu bạn có bất kỳ câu hỏi hoặc thắc mắc nào thì hãy liên hệ với chúng tôi.</p>
        </div>
        <hr>
        <div class="back__home d-flex w-100 justify-content-between">
          <a href="?page=home"><span class="iconify" data-icon="eva:arrow-ios-back-fill" data-width="22" data-height="22"></span>Tiếp tục mua sắm</a>

          <a href="?page=profile">Xem đơn đặt hàng<span class="iconify" data-icon="eva:arrow-ios-forward-fill" data-width="22" data-height="22"></span></a>
        </div>
      </div>

    </div>
  </div>
  <?php
  get_footer();
  ?>