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