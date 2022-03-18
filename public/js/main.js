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
