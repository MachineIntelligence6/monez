/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/pages/animation.init.js":
/*!**********************************************!*\
  !*** ./resources/js/pages/animation.init.js ***!
  \**********************************************/
/***/ (() => {

eval("/*\r\nTemplate Name: Ubold - Responsive Bootstrap 4 Admin Dashboard\r\nAuthor: CoderThemes\r\nWebsite: https://coderthemes.com/\r\nContact: support@coderthemes.com\r\nFile: Animation demo only\r\n*/\n\nfunction testAnim(x) {\n  $('#animationSandbox').removeClass().addClass('animate__animated animate__' + x).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {\n    $(this).removeClass();\n  });\n}\n;\n$(document).ready(function () {\n  $('.js--triggerAnimation').click(function (e) {\n    e.preventDefault();\n    var anim = $('.js--animations').val();\n    testAnim(anim);\n  });\n  $('.js--animations').change(function () {\n    var anim = $(this).val();\n    testAnim(anim);\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJ0ZXN0QW5pbSIsIngiLCIkIiwicmVtb3ZlQ2xhc3MiLCJhZGRDbGFzcyIsIm9uZSIsImRvY3VtZW50IiwicmVhZHkiLCJjbGljayIsImUiLCJwcmV2ZW50RGVmYXVsdCIsImFuaW0iLCJ2YWwiLCJjaGFuZ2UiXSwic291cmNlcyI6WyJ3ZWJwYWNrOi8vdWJvbGQtbGFyYXZlbC8uL3Jlc291cmNlcy9qcy9wYWdlcy9hbmltYXRpb24uaW5pdC5qcz8xMDZjIl0sInNvdXJjZXNDb250ZW50IjpbIi8qXHJcblRlbXBsYXRlIE5hbWU6IFVib2xkIC0gUmVzcG9uc2l2ZSBCb290c3RyYXAgNCBBZG1pbiBEYXNoYm9hcmRcclxuQXV0aG9yOiBDb2RlclRoZW1lc1xyXG5XZWJzaXRlOiBodHRwczovL2NvZGVydGhlbWVzLmNvbS9cclxuQ29udGFjdDogc3VwcG9ydEBjb2RlcnRoZW1lcy5jb21cclxuRmlsZTogQW5pbWF0aW9uIGRlbW8gb25seVxyXG4qL1xyXG5cclxuZnVuY3Rpb24gdGVzdEFuaW0oeCkge1xyXG4gICAgJCgnI2FuaW1hdGlvblNhbmRib3gnKS5yZW1vdmVDbGFzcygpLmFkZENsYXNzKCdhbmltYXRlX19hbmltYXRlZCBhbmltYXRlX18nICsgeCkub25lKCd3ZWJraXRBbmltYXRpb25FbmQgbW96QW5pbWF0aW9uRW5kIE1TQW5pbWF0aW9uRW5kIG9hbmltYXRpb25lbmQgYW5pbWF0aW9uZW5kJywgZnVuY3Rpb24oKXtcclxuICAgICAgICAkKHRoaXMpLnJlbW92ZUNsYXNzKCk7XHJcbiAgICB9KTtcclxufTtcclxuXHJcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCl7XHJcbiAgICAkKCcuanMtLXRyaWdnZXJBbmltYXRpb24nKS5jbGljayhmdW5jdGlvbihlKXtcclxuICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgdmFyIGFuaW0gPSAkKCcuanMtLWFuaW1hdGlvbnMnKS52YWwoKTtcclxuICAgICAgICB0ZXN0QW5pbShhbmltKTtcclxuICAgIH0pO1xyXG5cclxuICAgICQoJy5qcy0tYW5pbWF0aW9ucycpLmNoYW5nZShmdW5jdGlvbigpe1xyXG4gICAgICAgIHZhciBhbmltID0gJCh0aGlzKS52YWwoKTtcclxuICAgICAgICB0ZXN0QW5pbShhbmltKTtcclxuICAgIH0pO1xyXG59KTsgICAgIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxTQUFTQSxRQUFRQSxDQUFDQyxDQUFDLEVBQUU7RUFDakJDLENBQUMsQ0FBQyxtQkFBbUIsQ0FBQyxDQUFDQyxXQUFXLEVBQUUsQ0FBQ0MsUUFBUSxDQUFDLDZCQUE2QixHQUFHSCxDQUFDLENBQUMsQ0FBQ0ksR0FBRyxDQUFDLDhFQUE4RSxFQUFFLFlBQVU7SUFDM0tILENBQUMsQ0FBQyxJQUFJLENBQUMsQ0FBQ0MsV0FBVyxFQUFFO0VBQ3pCLENBQUMsQ0FBQztBQUNOO0FBQUM7QUFFREQsQ0FBQyxDQUFDSSxRQUFRLENBQUMsQ0FBQ0MsS0FBSyxDQUFDLFlBQVU7RUFDeEJMLENBQUMsQ0FBQyx1QkFBdUIsQ0FBQyxDQUFDTSxLQUFLLENBQUMsVUFBU0MsQ0FBQyxFQUFDO0lBQ3hDQSxDQUFDLENBQUNDLGNBQWMsRUFBRTtJQUNsQixJQUFJQyxJQUFJLEdBQUdULENBQUMsQ0FBQyxpQkFBaUIsQ0FBQyxDQUFDVSxHQUFHLEVBQUU7SUFDckNaLFFBQVEsQ0FBQ1csSUFBSSxDQUFDO0VBQ2xCLENBQUMsQ0FBQztFQUVGVCxDQUFDLENBQUMsaUJBQWlCLENBQUMsQ0FBQ1csTUFBTSxDQUFDLFlBQVU7SUFDbEMsSUFBSUYsSUFBSSxHQUFHVCxDQUFDLENBQUMsSUFBSSxDQUFDLENBQUNVLEdBQUcsRUFBRTtJQUN4QlosUUFBUSxDQUFDVyxJQUFJLENBQUM7RUFDbEIsQ0FBQyxDQUFDO0FBQ04sQ0FBQyxDQUFDIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3BhZ2VzL2FuaW1hdGlvbi5pbml0LmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/pages/animation.init.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/pages/animation.init.js"]();
/******/ 	
/******/ })()
;