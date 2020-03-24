(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/custom"],{

/***/ "./resources/js/custom.js":
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {function goBack() {
  window.history.back();
}

$(document).on("click", ".submit-comment", function () {
  alert('ok');
});
$(".menu-mobile").click(function () {
  $(this).children('i').toggleClass('fa-align-right fa-bars');
});
$(".btn-y-cmt").click(function (event) {
  $(".box-y-cmt").slideToggle(500);
  $([document.documentElement, document.body]).animate({
    scrollTop: $(".box-y-cmt").offset().top - 50
  }, 2000);
});
$(".view-cmt").click(function (event) {
  $([document.documentElement, document.body]).animate({
    scrollTop: $(".btn-y-cmt").offset().top - 50
  }, 2000);
});
$(".read-more").click(function () {
  $(this).siblings('.cmt-more').css('display', '');
  $(this).css('display', 'none');
});
$(".cmt-hidden").click(function () {
  $(this).siblings('.cmt-more').css('display', 'none');
  $(this).css('display', 'none');
  $(this).siblings(".read-more").css('display', '');
}); //load more content comment

$(window).scroll(function () {
  if ($(window).scrollTop() == $(document).height() - $(window).height()) {
    enabledLoader();
    var comment_html = "\n            \t<div class=\"my-2 px-2 box-cmt\">\n\t\t\t\t\t<div class=\"row\">\n\t\t\t\t\t\t<div class=\"col-2 p-0 m-0\">\n\t\t\t\t\t\t\t<figure class=\"text-center\">\n\t\t\t\t\t\t\t\t<img src=\"http://localhost:8000/web/images/ava.jpg\" class=\"ava-cmt\"  alt=\"\">\n\t\t\t\t\t\t\t\t<figcaption><span>thieusumo</span><p>1 gi\u1EDD tr\u01B0\u1EDBc</p></figcaption>\n\t\t\t\t\t\t\t</figure>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"col-10\">\n\t\t\t\t\t\t\t\t\t<i class=\"fa fa-star star\" aria-hidden=\"true\"></i>\n\t\t\t\t\t\t\t\t\t<i class=\"fa fa-star star\" aria-hidden=\"true\"></i>\n\t\t\t\t\t\t\t\t\t<i class=\"fa fa-star star\" aria-hidden=\"true\"></i>\n\t\t\t\t\t\t\t\t\t<i class=\"fa fa-star star\" aria-hidden=\"true\"></i>\n\t\t\t\t\t\t\t\t\t<i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t\u0110\xE2y l\xE0 lo\u1EA1i b\xECnh m\xE0 t\xF4i d\xF9ng \u0111\u1EC3 \u1EDF b\xE0n \u0103n c\u1EE7a gia \u0111\xECnh. B\xECnh thi\u1EBFt k\u1EBF \u0111\u01A1n gi\u1EA3n, h\xE0i h\xF2a v\u1EDBi c\u0103n b\u1EBFp c\u1EE7a gia \u0111\xECnh t\xF4i. Dung t\xEDch kh\xE1 l\u1EDBn, ch\u1EE9a \u0111\u01B0\u1EE3c 1,3 l\xEDt n\u01B0\u1EDBc, khi \u0111\u1ED5 n\u01B0\u1EDBc n\xF3ng hay n\u01B0\u1EDBc l\u1EA1nh v\xE0o kh\xF4ng g\xE2y n\u1EE9t b\xECnh nh\u01B0 nh\u1EEFng lo\u1EA1i b\xECnh kh\xE1c.\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t\n\t\t\t\t</div>\n            ";
    $(".box-cmt:last").after(comment_html);
    disabledLoader();
  }
});
$(window).scroll(function () {
  if ($(window).scrollTop() > $(window).height()) $(".move-top").show();else $('.move-top').hide();
});
$(".move-top").click(function () {
  $(window).scrollTop(0);
});

function enabledLoader() {
  $('.content-body').css('opacity', '.3');
  $(".loader").show();
}

function disabledLoader() {
  $('.content-body').css('opacity', '1');
  $(".loader").hide();
}
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/custom.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\car\resources\js\custom.js */"./resources/js/custom.js");


/***/ })

},[[1,"/js/manifest","/js/vendor"]]]);