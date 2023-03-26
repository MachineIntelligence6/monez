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

/***/ "./resources/js/pages/crm-opportunities.init.js":
/*!******************************************************!*\
  !*** ./resources/js/pages/crm-opportunities.init.js ***!
  \******************************************************/
/***/ (() => {

eval("/*\r\nTemplate Name: Ubold - Responsive Bootstrap 4 Admin Dashboard\r\nAuthor: CoderThemes\r\nWebsite: https://coderthemes.com/\r\nContact: support@coderthemes.com\r\nFile: CRM Opportunities init\r\n*/\n\n$(document).ready(function () {\n  var colors = ['#4fc6e1', '#6658dd', '#f7b84b', '#f1556c', '#1abc9c'];\n  var dataColors = $(\"#status-chart\").data('colors');\n  if (dataColors) {\n    colors = dataColors.split(\",\");\n  }\n  var DrawSparkline = function DrawSparkline() {\n    $('#status-chart').sparkline([20, 40, 30, 10, 28], {\n      type: 'pie',\n      width: '220',\n      height: '220',\n      sliceColors: colors\n    });\n  };\n  DrawSparkline();\n  var resizeChart;\n  $(window).resize(function (e) {\n    clearTimeout(resizeChart);\n    resizeChart = setTimeout(function () {\n      DrawSparkline();\n    }, 300);\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcGFnZXMvY3JtLW9wcG9ydHVuaXRpZXMuaW5pdC5qcy5qcyIsIm5hbWVzIjpbIiQiLCJkb2N1bWVudCIsInJlYWR5IiwiY29sb3JzIiwiZGF0YUNvbG9ycyIsImRhdGEiLCJzcGxpdCIsIkRyYXdTcGFya2xpbmUiLCJzcGFya2xpbmUiLCJ0eXBlIiwid2lkdGgiLCJoZWlnaHQiLCJzbGljZUNvbG9ycyIsInJlc2l6ZUNoYXJ0Iiwid2luZG93IiwicmVzaXplIiwiZSIsImNsZWFyVGltZW91dCIsInNldFRpbWVvdXQiXSwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsid2VicGFjazovL3Vib2xkLWxhcmF2ZWwvLi9yZXNvdXJjZXMvanMvcGFnZXMvY3JtLW9wcG9ydHVuaXRpZXMuaW5pdC5qcz80NzFkIl0sInNvdXJjZXNDb250ZW50IjpbIi8qXHJcblRlbXBsYXRlIE5hbWU6IFVib2xkIC0gUmVzcG9uc2l2ZSBCb290c3RyYXAgNCBBZG1pbiBEYXNoYm9hcmRcclxuQXV0aG9yOiBDb2RlclRoZW1lc1xyXG5XZWJzaXRlOiBodHRwczovL2NvZGVydGhlbWVzLmNvbS9cclxuQ29udGFjdDogc3VwcG9ydEBjb2RlcnRoZW1lcy5jb21cclxuRmlsZTogQ1JNIE9wcG9ydHVuaXRpZXMgaW5pdFxyXG4qL1xyXG5cclxuJCggZG9jdW1lbnQgKS5yZWFkeShmdW5jdGlvbigpIHtcclxuICAgIHZhciBjb2xvcnMgPSBbJyM0ZmM2ZTEnLCcjNjY1OGRkJywnI2Y3Yjg0YicsJyNmMTU1NmMnLCcjMWFiYzljJ107XHJcbiAgICB2YXIgZGF0YUNvbG9ycyA9ICQoXCIjc3RhdHVzLWNoYXJ0XCIpLmRhdGEoJ2NvbG9ycycpO1xyXG4gICAgaWYgKGRhdGFDb2xvcnMpIHtcclxuICAgICAgICBjb2xvcnMgPSBkYXRhQ29sb3JzLnNwbGl0KFwiLFwiKTtcclxuICAgIH1cclxuICAgIHZhciBEcmF3U3BhcmtsaW5lID0gZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgJCgnI3N0YXR1cy1jaGFydCcpLnNwYXJrbGluZShbMjAsIDQwLCAzMCwgMTAsIDI4XSwge1xyXG4gICAgICAgICAgICB0eXBlOiAncGllJyxcclxuICAgICAgICAgICAgd2lkdGg6ICcyMjAnLFxyXG4gICAgICAgICAgICBoZWlnaHQ6ICcyMjAnLFxyXG4gICAgICAgICAgICBzbGljZUNvbG9yczogY29sb3JzXHJcbiAgICAgICAgfSk7XHJcbiAgICB9O1xyXG4gICAgXHJcbiAgICBEcmF3U3BhcmtsaW5lKCk7XHJcbiAgICBcclxuICAgIHZhciByZXNpemVDaGFydDtcclxuXHJcbiAgICAkKHdpbmRvdykucmVzaXplKGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICBjbGVhclRpbWVvdXQocmVzaXplQ2hhcnQpO1xyXG4gICAgICAgIHJlc2l6ZUNoYXJ0ID0gc2V0VGltZW91dChmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgRHJhd1NwYXJrbGluZSgpO1xyXG4gICAgICAgIH0sIDMwMCk7XHJcbiAgICB9KTtcclxufSk7Il0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQUEsQ0FBQyxDQUFFQyxRQUFRLENBQUUsQ0FBQ0MsS0FBSyxDQUFDLFlBQVc7RUFDM0IsSUFBSUMsTUFBTSxHQUFHLENBQUMsU0FBUyxFQUFDLFNBQVMsRUFBQyxTQUFTLEVBQUMsU0FBUyxFQUFDLFNBQVMsQ0FBQztFQUNoRSxJQUFJQyxVQUFVLEdBQUdKLENBQUMsQ0FBQyxlQUFlLENBQUMsQ0FBQ0ssSUFBSSxDQUFDLFFBQVEsQ0FBQztFQUNsRCxJQUFJRCxVQUFVLEVBQUU7SUFDWkQsTUFBTSxHQUFHQyxVQUFVLENBQUNFLEtBQUssQ0FBQyxHQUFHLENBQUM7RUFDbEM7RUFDQSxJQUFJQyxhQUFhLEdBQUcsU0FBaEJBLGFBQWFBLENBQUEsRUFBYztJQUMzQlAsQ0FBQyxDQUFDLGVBQWUsQ0FBQyxDQUFDUSxTQUFTLENBQUMsQ0FBQyxFQUFFLEVBQUUsRUFBRSxFQUFFLEVBQUUsRUFBRSxFQUFFLEVBQUUsRUFBRSxDQUFDLEVBQUU7TUFDL0NDLElBQUksRUFBRSxLQUFLO01BQ1hDLEtBQUssRUFBRSxLQUFLO01BQ1pDLE1BQU0sRUFBRSxLQUFLO01BQ2JDLFdBQVcsRUFBRVQ7SUFDakIsQ0FBQyxDQUFDO0VBQ04sQ0FBQztFQUVESSxhQUFhLEVBQUU7RUFFZixJQUFJTSxXQUFXO0VBRWZiLENBQUMsQ0FBQ2MsTUFBTSxDQUFDLENBQUNDLE1BQU0sQ0FBQyxVQUFTQyxDQUFDLEVBQUU7SUFDekJDLFlBQVksQ0FBQ0osV0FBVyxDQUFDO0lBQ3pCQSxXQUFXLEdBQUdLLFVBQVUsQ0FBQyxZQUFXO01BQ2hDWCxhQUFhLEVBQUU7SUFDbkIsQ0FBQyxFQUFFLEdBQUcsQ0FBQztFQUNYLENBQUMsQ0FBQztBQUNOLENBQUMsQ0FBQyJ9\n//# sourceURL=webpack-internal:///./resources/js/pages/crm-opportunities.init.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/pages/crm-opportunities.init.js"]();
/******/ 	
/******/ })()
;