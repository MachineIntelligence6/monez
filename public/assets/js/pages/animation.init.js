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

eval("/*\r\nTemplate Name: Ubold - Responsive Bootstrap 4 Admin Dashboard\r\nAuthor: CoderThemes\r\nWebsite: https://coderthemes.com/\r\nContact: support@coderthemes.com\r\nFile: Animation demo only\r\n*/\n\nfunction testAnim(x) {\n  $('#animationSandbox').removeClass().addClass('animate__animated animate__' + x).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {\n    $(this).removeClass();\n  });\n}\n;\n$(document).ready(function () {\n  $('.js--triggerAnimation').click(function (e) {\n    e.preventDefault();\n    var anim = $('.js--animations').val();\n    testAnim(anim);\n  });\n  $('.js--animations').change(function () {\n    var anim = $(this).val();\n    testAnim(anim);\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcGFnZXMvYW5pbWF0aW9uLmluaXQuanMuanMiLCJuYW1lcyI6WyJ0ZXN0QW5pbSIsIngiLCIkIiwicmVtb3ZlQ2xhc3MiLCJhZGRDbGFzcyIsIm9uZSIsImRvY3VtZW50IiwicmVhZHkiLCJjbGljayIsImUiLCJwcmV2ZW50RGVmYXVsdCIsImFuaW0iLCJ2YWwiLCJjaGFuZ2UiXSwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsid2VicGFjazovL3Vib2xkLWxhcmF2ZWwvLi9yZXNvdXJjZXMvanMvcGFnZXMvYW5pbWF0aW9uLmluaXQuanM/MTA2YyJdLCJzb3VyY2VzQ29udGVudCI6WyIvKlxyXG5UZW1wbGF0ZSBOYW1lOiBVYm9sZCAtIFJlc3BvbnNpdmUgQm9vdHN0cmFwIDQgQWRtaW4gRGFzaGJvYXJkXHJcbkF1dGhvcjogQ29kZXJUaGVtZXNcclxuV2Vic2l0ZTogaHR0cHM6Ly9jb2RlcnRoZW1lcy5jb20vXHJcbkNvbnRhY3Q6IHN1cHBvcnRAY29kZXJ0aGVtZXMuY29tXHJcbkZpbGU6IEFuaW1hdGlvbiBkZW1vIG9ubHlcclxuKi9cclxuXHJcbmZ1bmN0aW9uIHRlc3RBbmltKHgpIHtcclxuICAgICQoJyNhbmltYXRpb25TYW5kYm94JykucmVtb3ZlQ2xhc3MoKS5hZGRDbGFzcygnYW5pbWF0ZV9fYW5pbWF0ZWQgYW5pbWF0ZV9fJyArIHgpLm9uZSgnd2Via2l0QW5pbWF0aW9uRW5kIG1vekFuaW1hdGlvbkVuZCBNU0FuaW1hdGlvbkVuZCBvYW5pbWF0aW9uZW5kIGFuaW1hdGlvbmVuZCcsIGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgJCh0aGlzKS5yZW1vdmVDbGFzcygpO1xyXG4gICAgfSk7XHJcbn07XHJcblxyXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpe1xyXG4gICAgJCgnLmpzLS10cmlnZ2VyQW5pbWF0aW9uJykuY2xpY2soZnVuY3Rpb24oZSl7XHJcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgIHZhciBhbmltID0gJCgnLmpzLS1hbmltYXRpb25zJykudmFsKCk7XHJcbiAgICAgICAgdGVzdEFuaW0oYW5pbSk7XHJcbiAgICB9KTtcclxuXHJcbiAgICAkKCcuanMtLWFuaW1hdGlvbnMnKS5jaGFuZ2UoZnVuY3Rpb24oKXtcclxuICAgICAgICB2YXIgYW5pbSA9ICQodGhpcykudmFsKCk7XHJcbiAgICAgICAgdGVzdEFuaW0oYW5pbSk7XHJcbiAgICB9KTtcclxufSk7ICAgICJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsU0FBU0EsUUFBUUEsQ0FBQ0MsQ0FBQyxFQUFFO0VBQ2pCQyxDQUFDLENBQUMsbUJBQW1CLENBQUMsQ0FBQ0MsV0FBVyxFQUFFLENBQUNDLFFBQVEsQ0FBQyw2QkFBNkIsR0FBR0gsQ0FBQyxDQUFDLENBQUNJLEdBQUcsQ0FBQyw4RUFBOEUsRUFBRSxZQUFVO0lBQzNLSCxDQUFDLENBQUMsSUFBSSxDQUFDLENBQUNDLFdBQVcsRUFBRTtFQUN6QixDQUFDLENBQUM7QUFDTjtBQUFDO0FBRURELENBQUMsQ0FBQ0ksUUFBUSxDQUFDLENBQUNDLEtBQUssQ0FBQyxZQUFVO0VBQ3hCTCxDQUFDLENBQUMsdUJBQXVCLENBQUMsQ0FBQ00sS0FBSyxDQUFDLFVBQVNDLENBQUMsRUFBQztJQUN4Q0EsQ0FBQyxDQUFDQyxjQUFjLEVBQUU7SUFDbEIsSUFBSUMsSUFBSSxHQUFHVCxDQUFDLENBQUMsaUJBQWlCLENBQUMsQ0FBQ1UsR0FBRyxFQUFFO0lBQ3JDWixRQUFRLENBQUNXLElBQUksQ0FBQztFQUNsQixDQUFDLENBQUM7RUFFRlQsQ0FBQyxDQUFDLGlCQUFpQixDQUFDLENBQUNXLE1BQU0sQ0FBQyxZQUFVO0lBQ2xDLElBQUlGLElBQUksR0FBR1QsQ0FBQyxDQUFDLElBQUksQ0FBQyxDQUFDVSxHQUFHLEVBQUU7SUFDeEJaLFFBQVEsQ0FBQ1csSUFBSSxDQUFDO0VBQ2xCLENBQUMsQ0FBQztBQUNOLENBQUMsQ0FBQyJ9\n//# sourceURL=webpack-internal:///./resources/js/pages/animation.init.js\n");

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