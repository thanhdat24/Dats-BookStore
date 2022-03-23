// Đợi các thư viện load xong hết rồi mới chạy code
/* Truncate Card Title */

window.addEventListener("load", function () {
  truncateBookContent();
  truncateBookTitle();
});

function truncateBookContent() {
  var bookList = document.getElementsByClassName(
    "popular-book__item__info__content"
  );
  for (var i = 0; i < bookList.length; i++) {
    var text = bookList[i].innerHTML;
    var nextText = truncateString(text, 300);
    bookList[i].innerHTML = nextText;
  }
}
function truncateBookTitle() {
  var bookList = document.getElementsByClassName(
    "popular-book__item__info__title"
  );
  for (var i = 0; i < bookList.length; i++) {
    var text = bookList[i].innerHTML;
    var nextText = truncateString(text, 50);
    bookList[i].innerHTML = nextText;
  }
}

function truncateString(str, num) {
  if (str.length > num) return str.slice(0, num) + "...";
  else return str;
}

// function addCategory(category) {
//   category.classList.toggle("nav__item--active");
//   onChangeCategory();
// }
// function onChangeCategory() {
//   navCategory = document.getElementById("navCategory");
//   categories = navCategory.getElementsByTagName("a");

//   // hàm filter để lọc ra thẻ li nào được active, hàm map trả về mã hàng của thẻ li đó
//   selectedCategory = Array.from(categories)
//     .filter((category) => category.classList.contains("nav__item--active"))
//     .map((selectedCategoryHTML) => selectedCategoryHTML.value);
// }
