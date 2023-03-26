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

/***/ "./resources/js/pages/form-masks.init.js":
/*!***********************************************!*\
  !*** ./resources/js/pages/form-masks.init.js ***!
  \***********************************************/
/***/ (() => {

eval("/*\r\nTemplate Name: Ubold - Responsive Bootstrap 4 Admin Dashboard\r\nAuthor: CoderThemes\r\nWebsite: https://coderthemes.com/\r\nContact: support@coderthemes.com\r\nFile: Form mask init js\r\n*/\n\n$(document).ready(function () {\n  $('[data-toggle=\"input-mask\"]').each(function (idx, obj) {\n    var maskFormat = $(obj).data(\"maskFormat\");\n    var reverse = $(obj).data(\"reverse\");\n    if (reverse != null) $(obj).mask(maskFormat, {\n      'reverse': reverse\n    });else $(obj).mask(maskFormat);\n  });\n});\njQuery(function ($) {\n  AutoNumeric.multiple('.autonumber', {});\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcGFnZXMvZm9ybS1tYXNrcy5pbml0LmpzLmpzIiwibmFtZXMiOlsiJCIsImRvY3VtZW50IiwicmVhZHkiLCJlYWNoIiwiaWR4Iiwib2JqIiwibWFza0Zvcm1hdCIsImRhdGEiLCJyZXZlcnNlIiwibWFzayIsImpRdWVyeSIsIkF1dG9OdW1lcmljIiwibXVsdGlwbGUiXSwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsid2VicGFjazovL3Vib2xkLWxhcmF2ZWwvLi9yZXNvdXJjZXMvanMvcGFnZXMvZm9ybS1tYXNrcy5pbml0LmpzP2Q3ZTIiXSwic291cmNlc0NvbnRlbnQiOlsiLypcclxuVGVtcGxhdGUgTmFtZTogVWJvbGQgLSBSZXNwb25zaXZlIEJvb3RzdHJhcCA0IEFkbWluIERhc2hib2FyZFxyXG5BdXRob3I6IENvZGVyVGhlbWVzXHJcbldlYnNpdGU6IGh0dHBzOi8vY29kZXJ0aGVtZXMuY29tL1xyXG5Db250YWN0OiBzdXBwb3J0QGNvZGVydGhlbWVzLmNvbVxyXG5GaWxlOiBGb3JtIG1hc2sgaW5pdCBqc1xyXG4qL1xyXG5cclxuJCggZG9jdW1lbnQgKS5yZWFkeShmdW5jdGlvbigpIHtcclxuICAgICQoJ1tkYXRhLXRvZ2dsZT1cImlucHV0LW1hc2tcIl0nKS5lYWNoKGZ1bmN0aW9uIChpZHgsIG9iaikge1xyXG4gICAgICAgIHZhciBtYXNrRm9ybWF0ID0gJChvYmopLmRhdGEoXCJtYXNrRm9ybWF0XCIpO1xyXG4gICAgICAgIHZhciByZXZlcnNlID0gJChvYmopLmRhdGEoXCJyZXZlcnNlXCIpO1xyXG4gICAgICAgIGlmIChyZXZlcnNlICE9IG51bGwpXHJcbiAgICAgICAgICAgICQob2JqKS5tYXNrKG1hc2tGb3JtYXQsIHsncmV2ZXJzZSc6IHJldmVyc2V9KTtcclxuICAgICAgICBlbHNlXHJcbiAgICAgICAgICAgICQob2JqKS5tYXNrKG1hc2tGb3JtYXQpO1xyXG4gICAgfSk7XHJcbn0pO1xyXG5cclxualF1ZXJ5KGZ1bmN0aW9uKCQpIHtcclxuICAgIEF1dG9OdW1lcmljLm11bHRpcGxlKCcuYXV0b251bWJlcicsIHt9KTtcclxufSk7XHJcbiJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUFBLENBQUMsQ0FBRUMsUUFBUSxDQUFFLENBQUNDLEtBQUssQ0FBQyxZQUFXO0VBQzNCRixDQUFDLENBQUMsNEJBQTRCLENBQUMsQ0FBQ0csSUFBSSxDQUFDLFVBQVVDLEdBQUcsRUFBRUMsR0FBRyxFQUFFO0lBQ3JELElBQUlDLFVBQVUsR0FBR04sQ0FBQyxDQUFDSyxHQUFHLENBQUMsQ0FBQ0UsSUFBSSxDQUFDLFlBQVksQ0FBQztJQUMxQyxJQUFJQyxPQUFPLEdBQUdSLENBQUMsQ0FBQ0ssR0FBRyxDQUFDLENBQUNFLElBQUksQ0FBQyxTQUFTLENBQUM7SUFDcEMsSUFBSUMsT0FBTyxJQUFJLElBQUksRUFDZlIsQ0FBQyxDQUFDSyxHQUFHLENBQUMsQ0FBQ0ksSUFBSSxDQUFDSCxVQUFVLEVBQUU7TUFBQyxTQUFTLEVBQUVFO0lBQU8sQ0FBQyxDQUFDLENBQUMsS0FFOUNSLENBQUMsQ0FBQ0ssR0FBRyxDQUFDLENBQUNJLElBQUksQ0FBQ0gsVUFBVSxDQUFDO0VBQy9CLENBQUMsQ0FBQztBQUNOLENBQUMsQ0FBQztBQUVGSSxNQUFNLENBQUMsVUFBU1YsQ0FBQyxFQUFFO0VBQ2ZXLFdBQVcsQ0FBQ0MsUUFBUSxDQUFDLGFBQWEsRUFBRSxDQUFDLENBQUMsQ0FBQztBQUMzQyxDQUFDLENBQUMifQ==\n//# sourceURL=webpack-internal:///./resources/js/pages/form-masks.init.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/pages/form-masks.init.js"]();
/******/ 	
/******/ })()
;