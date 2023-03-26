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

/***/ "./resources/js/pages/kanban.init.js":
/*!*******************************************!*\
  !*** ./resources/js/pages/kanban.init.js ***!
  \*******************************************/
/***/ (() => {

eval("/*\r\nTemplate Name: Ubold - Responsive Bootstrap 4 Admin Dashboard\r\nAuthor: CoderThemes\r\nWebsite: https://coderthemes.com/\r\nContact: support@coderthemes.com\r\nFile: Kanban Board init js\r\n*/\n\n!function ($) {\n  \"use strict\";\n\n  var KanbanBoard = function KanbanBoard() {\n    this.$body = $(\"body\");\n  };\n\n  //initializing various charts and components\n  KanbanBoard.prototype.init = function () {\n    $('.tasklist').each(function () {\n      Sortable.create($(this)[0], {\n        group: 'shared',\n        animation: 150,\n        ghostClass: 'bg-ghost'\n      });\n    });\n  },\n  //init KanbanBoard\n  $.KanbanBoard = new KanbanBoard(), $.KanbanBoard.Constructor = KanbanBoard;\n}(window.jQuery),\n//initializing KanbanBoard\nfunction ($) {\n  \"use strict\";\n\n  $.KanbanBoard.init();\n}(window.jQuery);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcGFnZXMva2FuYmFuLmluaXQuanMuanMiLCJuYW1lcyI6WyIkIiwiS2FuYmFuQm9hcmQiLCIkYm9keSIsInByb3RvdHlwZSIsImluaXQiLCJlYWNoIiwiU29ydGFibGUiLCJjcmVhdGUiLCJncm91cCIsImFuaW1hdGlvbiIsImdob3N0Q2xhc3MiLCJDb25zdHJ1Y3RvciIsIndpbmRvdyIsImpRdWVyeSJdLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vdWJvbGQtbGFyYXZlbC8uL3Jlc291cmNlcy9qcy9wYWdlcy9rYW5iYW4uaW5pdC5qcz9iMThiIl0sInNvdXJjZXNDb250ZW50IjpbIi8qXHJcblRlbXBsYXRlIE5hbWU6IFVib2xkIC0gUmVzcG9uc2l2ZSBCb290c3RyYXAgNCBBZG1pbiBEYXNoYm9hcmRcclxuQXV0aG9yOiBDb2RlclRoZW1lc1xyXG5XZWJzaXRlOiBodHRwczovL2NvZGVydGhlbWVzLmNvbS9cclxuQ29udGFjdDogc3VwcG9ydEBjb2RlcnRoZW1lcy5jb21cclxuRmlsZTogS2FuYmFuIEJvYXJkIGluaXQganNcclxuKi9cclxuXHJcbiEgZnVuY3Rpb24oJCkge1xyXG5cdFwidXNlIHN0cmljdFwiO1xyXG5cclxuXHR2YXIgS2FuYmFuQm9hcmQgPSBmdW5jdGlvbigpIHtcclxuXHRcdHRoaXMuJGJvZHkgPSAkKFwiYm9keVwiKVxyXG5cdH07XHJcblxyXG5cdC8vaW5pdGlhbGl6aW5nIHZhcmlvdXMgY2hhcnRzIGFuZCBjb21wb25lbnRzXHJcblx0S2FuYmFuQm9hcmQucHJvdG90eXBlLmluaXQgPSBmdW5jdGlvbigpIHtcclxuXHRcdCQoJy50YXNrbGlzdCcpLmVhY2goZnVuY3Rpb24gKCkge1xyXG5cdFx0XHRTb3J0YWJsZS5jcmVhdGUoJCh0aGlzKVswXSwge1xyXG5cdFx0XHRcdGdyb3VwOiAnc2hhcmVkJyxcclxuXHRcdFx0XHRhbmltYXRpb246IDE1MCxcclxuXHRcdFx0XHRnaG9zdENsYXNzOiAnYmctZ2hvc3QnXHJcblx0XHRcdH0pO1xyXG5cdFx0XHRcclxuXHRcdH0pO1x0XHJcblx0fSxcclxuXHJcblx0Ly9pbml0IEthbmJhbkJvYXJkXHJcblx0JC5LYW5iYW5Cb2FyZCA9IG5ldyBLYW5iYW5Cb2FyZCwgJC5LYW5iYW5Cb2FyZC5Db25zdHJ1Y3RvciA9XHJcblx0S2FuYmFuQm9hcmRcclxuXHJcbn0od2luZG93LmpRdWVyeSksXHJcblxyXG4vL2luaXRpYWxpemluZyBLYW5iYW5Cb2FyZFxyXG5mdW5jdGlvbigkKSB7XHJcblx0XCJ1c2Ugc3RyaWN0XCI7XHJcblx0JC5LYW5iYW5Cb2FyZC5pbml0KClcclxufSh3aW5kb3cualF1ZXJ5KTsiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLENBQUUsVUFBU0EsQ0FBQyxFQUFFO0VBQ2IsWUFBWTs7RUFFWixJQUFJQyxXQUFXLEdBQUcsU0FBZEEsV0FBV0EsQ0FBQSxFQUFjO0lBQzVCLElBQUksQ0FBQ0MsS0FBSyxHQUFHRixDQUFDLENBQUMsTUFBTSxDQUFDO0VBQ3ZCLENBQUM7O0VBRUQ7RUFDQUMsV0FBVyxDQUFDRSxTQUFTLENBQUNDLElBQUksR0FBRyxZQUFXO0lBQ3ZDSixDQUFDLENBQUMsV0FBVyxDQUFDLENBQUNLLElBQUksQ0FBQyxZQUFZO01BQy9CQyxRQUFRLENBQUNDLE1BQU0sQ0FBQ1AsQ0FBQyxDQUFDLElBQUksQ0FBQyxDQUFDLENBQUMsQ0FBQyxFQUFFO1FBQzNCUSxLQUFLLEVBQUUsUUFBUTtRQUNmQyxTQUFTLEVBQUUsR0FBRztRQUNkQyxVQUFVLEVBQUU7TUFDYixDQUFDLENBQUM7SUFFSCxDQUFDLENBQUM7RUFDSCxDQUFDO0VBRUQ7RUFDQVYsQ0FBQyxDQUFDQyxXQUFXLEdBQUcsSUFBSUEsV0FBVyxJQUFFRCxDQUFDLENBQUNDLFdBQVcsQ0FBQ1UsV0FBVyxHQUMxRFYsV0FBVztBQUVaLENBQUMsQ0FBQ1csTUFBTSxDQUFDQyxNQUFNLENBQUM7QUFFaEI7QUFDQSxVQUFTYixDQUFDLEVBQUU7RUFDWCxZQUFZOztFQUNaQSxDQUFDLENBQUNDLFdBQVcsQ0FBQ0csSUFBSSxFQUFFO0FBQ3JCLENBQUMsQ0FBQ1EsTUFBTSxDQUFDQyxNQUFNLENBQUMifQ==\n//# sourceURL=webpack-internal:///./resources/js/pages/kanban.init.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/pages/kanban.init.js"]();
/******/ 	
/******/ })()
;