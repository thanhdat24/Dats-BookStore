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
        <h3 class="pb-4">Cám ơn vì đã mua hàng!</h3>
        <div class="success-checkmark">
          <div class="check-icon">
            <span class="icon-line line-tip"></span>
            <span class="icon-line line-long"></span>
            <div class="icon-circle"></div>
            <div class="icon-fix"></div>
          </div>
        </div>
        <div class="popup-detail__cart__content">
          <p>Cảm ơn bạn đã đặt hàng <a><?php
                                        $bytes = random_bytes(11);
                                        echo bin2hex($bytes);
                                        ?></a></p>
          <p>Chúng tôi sẽ gửi cho bạn thông báo trong vòng 5 ngày khi hàng được gửi.</p>
          <p>Nếu bạn có bất kỳ câu hỏi hoặc thắc mắc nào thì hãy liên hệ với chúng tôi.</p>
        </div>
        <hr>
        <div class="back__home d-flex w-100 justify-content-between">
          <a href="?page=home"><i class="fa fa-angle-left mr-2"></i>Tiếp tục mua sắm</a>

          <a href="?page=profile">Xem đơn đặt hàng<i class="fa fa-angle-right ml-2"></i></a>
        </div>
      </div>

    </div>
  </div>
  <?php
  get_footer();
  ?>