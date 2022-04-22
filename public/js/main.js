// Đợi các thư viện load xong hết rồi mới chạy code
/* Truncate Card Title */

window.addEventListener("load", function () {
  truncateBookContent();
  truncateBookTitle();
});

function truncateBookContent() {
  const bookList = $(".popular-book__item__info__content");
  for (let i = 0; i < bookList.length; i++) {
    const divContent = $(bookList[i]);
    const text = divContent.html();
    const nextText = truncateString(text, 300);
    divContent.html(nextText);
  }
}
function truncateBookTitle() {
  const bookList = $(".popular-book__item__info__title");
  for (let i = 0; i < bookList.length; i++) {
    const divContent = $(bookList[i]);
    const text = divContent.html();
    const nextText = truncateString(text, 50);
    divContent.html(nextText);
  }
}

function truncateString(str, num) {
  if (str.length > num) return str.slice(0, num) + "...";
  else return str;
}

$("button").click(function () {
  $(".check-icon").hide();
  setTimeout(function () {
    $(".check-icon").show();
  }, 1000);
});

$(document).ready(function () {
  $(".soluong").change(function () {
    var SoLuong = $(this).val();
    if (SoLuong < 1) {
      window.location.href = '?page=notify';
       $(this).val() = 1;
    }
    var id = $(this).attr("data-id");
    var data = { id: id, SoLuong: SoLuong };
    $.ajax({
      url: "?page=cart&action=update",
      method: "POST",
      data: data,
      dataType: "json",
      success: function (data) {
     
        if (SoLuong > 0) {
          $("#total-price-" + id).text(data.Tong_Tien);
          $("#total-product").text(data.Tong);
          $("#subtotal").text(data.Tong);
          $("#total-qty").text(data.SoLuongGH);
          // console.log("data",data)
        }
      },
    });
  });
});
