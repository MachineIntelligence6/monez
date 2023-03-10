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

eval("/*\r\nTemplate Name: Ubold - Responsive Bootstrap 4 Admin Dashboard\r\nAuthor: CoderThemes\r\nWebsite: https://coderthemes.com/\r\nContact: support@coderthemes.com\r\nFile: Kanban Board init js\r\n*/\n\n!function ($) {\n  \"use strict\";\n\n  var KanbanBoard = function KanbanBoard() {\n    this.$body = $(\"body\");\n  };\n\n  //initializing various charts and components\n  KanbanBoard.prototype.init = function () {\n    $('.tasklist').each(function () {\n      Sortable.create($(this)[0], {\n        group: 'shared',\n        animation: 150,\n        ghostClass: 'bg-ghost'\n      });\n    });\n  },\n  //init KanbanBoard\n  $.KanbanBoard = new KanbanBoard(), $.KanbanBoard.Constructor = KanbanBoard;\n}(window.jQuery),\n//initializing KanbanBoard\nfunction ($) {\n  \"use strict\";\n\n  $.KanbanBoard.init();\n}(window.jQuery);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyIkIiwiS2FuYmFuQm9hcmQiLCIkYm9keSIsInByb3RvdHlwZSIsImluaXQiLCJlYWNoIiwiU29ydGFibGUiLCJjcmVhdGUiLCJncm91cCIsImFuaW1hdGlvbiIsImdob3N0Q2xhc3MiLCJDb25zdHJ1Y3RvciIsIndpbmRvdyIsImpRdWVyeSJdLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly91Ym9sZC1sYXJhdmVsLy4vcmVzb3VyY2VzL2pzL3BhZ2VzL2thbmJhbi5pbml0LmpzP2IxOGIiXSwic291cmNlc0NvbnRlbnQiOlsiLypcclxuVGVtcGxhdGUgTmFtZTogVWJvbGQgLSBSZXNwb25zaXZlIEJvb3RzdHJhcCA0IEFkbWluIERhc2hib2FyZFxyXG5BdXRob3I6IENvZGVyVGhlbWVzXHJcbldlYnNpdGU6IGh0dHBzOi8vY29kZXJ0aGVtZXMuY29tL1xyXG5Db250YWN0OiBzdXBwb3J0QGNvZGVydGhlbWVzLmNvbVxyXG5GaWxlOiBLYW5iYW4gQm9hcmQgaW5pdCBqc1xyXG4qL1xyXG5cclxuISBmdW5jdGlvbigkKSB7XHJcblx0XCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG5cdHZhciBLYW5iYW5Cb2FyZCA9IGZ1bmN0aW9uKCkge1xyXG5cdFx0dGhpcy4kYm9keSA9ICQoXCJib2R5XCIpXHJcblx0fTtcclxuXHJcblx0Ly9pbml0aWFsaXppbmcgdmFyaW91cyBjaGFydHMgYW5kIGNvbXBvbmVudHNcclxuXHRLYW5iYW5Cb2FyZC5wcm90b3R5cGUuaW5pdCA9IGZ1bmN0aW9uKCkge1xyXG5cdFx0JCgnLnRhc2tsaXN0JykuZWFjaChmdW5jdGlvbiAoKSB7XHJcblx0XHRcdFNvcnRhYmxlLmNyZWF0ZSgkKHRoaXMpWzBdLCB7XHJcblx0XHRcdFx0Z3JvdXA6ICdzaGFyZWQnLFxyXG5cdFx0XHRcdGFuaW1hdGlvbjogMTUwLFxyXG5cdFx0XHRcdGdob3N0Q2xhc3M6ICdiZy1naG9zdCdcclxuXHRcdFx0fSk7XHJcblx0XHRcdFxyXG5cdFx0fSk7XHRcclxuXHR9LFxyXG5cclxuXHQvL2luaXQgS2FuYmFuQm9hcmRcclxuXHQkLkthbmJhbkJvYXJkID0gbmV3IEthbmJhbkJvYXJkLCAkLkthbmJhbkJvYXJkLkNvbnN0cnVjdG9yID1cclxuXHRLYW5iYW5Cb2FyZFxyXG5cclxufSh3aW5kb3cualF1ZXJ5KSxcclxuXHJcbi8vaW5pdGlhbGl6aW5nIEthbmJhbkJvYXJkXHJcbmZ1bmN0aW9uKCQpIHtcclxuXHRcInVzZSBzdHJpY3RcIjtcclxuXHQkLkthbmJhbkJvYXJkLmluaXQoKVxyXG59KHdpbmRvdy5qUXVlcnkpOyJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsQ0FBRSxVQUFTQSxDQUFDLEVBQUU7RUFDYixZQUFZOztFQUVaLElBQUlDLFdBQVcsR0FBRyxTQUFkQSxXQUFXQSxDQUFBLEVBQWM7SUFDNUIsSUFBSSxDQUFDQyxLQUFLLEdBQUdGLENBQUMsQ0FBQyxNQUFNLENBQUM7RUFDdkIsQ0FBQzs7RUFFRDtFQUNBQyxXQUFXLENBQUNFLFNBQVMsQ0FBQ0MsSUFBSSxHQUFHLFlBQVc7SUFDdkNKLENBQUMsQ0FBQyxXQUFXLENBQUMsQ0FBQ0ssSUFBSSxDQUFDLFlBQVk7TUFDL0JDLFFBQVEsQ0FBQ0MsTUFBTSxDQUFDUCxDQUFDLENBQUMsSUFBSSxDQUFDLENBQUMsQ0FBQyxDQUFDLEVBQUU7UUFDM0JRLEtBQUssRUFBRSxRQUFRO1FBQ2ZDLFNBQVMsRUFBRSxHQUFHO1FBQ2RDLFVBQVUsRUFBRTtNQUNiLENBQUMsQ0FBQztJQUVILENBQUMsQ0FBQztFQUNILENBQUM7RUFFRDtFQUNBVixDQUFDLENBQUNDLFdBQVcsR0FBRyxJQUFJQSxXQUFXLElBQUVELENBQUMsQ0FBQ0MsV0FBVyxDQUFDVSxXQUFXLEdBQzFEVixXQUFXO0FBRVosQ0FBQyxDQUFDVyxNQUFNLENBQUNDLE1BQU0sQ0FBQztBQUVoQjtBQUNBLFVBQVNiLENBQUMsRUFBRTtFQUNYLFlBQVk7O0VBQ1pBLENBQUMsQ0FBQ0MsV0FBVyxDQUFDRyxJQUFJLEVBQUU7QUFDckIsQ0FBQyxDQUFDUSxNQUFNLENBQUNDLE1BQU0sQ0FBQyIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9wYWdlcy9rYW5iYW4uaW5pdC5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/pages/kanban.init.js\n");

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