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

/***/ "./resources/js/pages/tabledit.init.js":
/*!*********************************************!*\
  !*** ./resources/js/pages/tabledit.init.js ***!
  \*********************************************/
/***/ (() => {

eval("/*\r\nTemplate Name: Ubold - Responsive Bootstrap 4 Admin Dashboard\r\nAuthor: CoderThemes\r\nWebsite: https://coderthemes.com/\r\nContact: support@coderthemes.com\r\nFile: Edit table init js\r\n*/\n\n!function ($) {\n  \"use strict\";\n\n  var EditableTable = function EditableTable() {};\n  EditableTable.prototype.init = function () {\n    $(\"#inline-editable\").Tabledit({\n      inputClass: 'form-control form-control-sm',\n      editButton: false,\n      deleteButton: false,\n      columns: {\n        identifier: [0, \"id\"],\n        editable: [[1, \"col1\"], [2, \"col2\"], [3, \"col3\"], [4, \"col4\"], [6, \"col6\"]]\n      }\n    }), $(\"#btn-editable\").Tabledit({\n      buttons: {\n        edit: {\n          \"class\": 'btn btn-success',\n          html: '<span class=\"mdi mdi-pencil\"></span>',\n          action: 'edit'\n        }\n      },\n      inputClass: 'form-control form-control-sm',\n      deleteButton: false,\n      saveButton: false,\n      autoFocus: false,\n      columns: {\n        identifier: [0, \"id\"],\n        editable: [[1, \"col1\"], [2, \"col2\"], [3, \"col3\"], [4, \"col4\"], [6, \"col6\"]]\n      }\n    });\n  }, $.EditableTable = new EditableTable(), $.EditableTable.Constructor = EditableTable;\n}(window.jQuery),\n//initializing \nfunction ($) {\n  \"use strict\";\n\n  $.EditableTable.init();\n}(window.jQuery);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyIkIiwiRWRpdGFibGVUYWJsZSIsInByb3RvdHlwZSIsImluaXQiLCJUYWJsZWRpdCIsImlucHV0Q2xhc3MiLCJlZGl0QnV0dG9uIiwiZGVsZXRlQnV0dG9uIiwiY29sdW1ucyIsImlkZW50aWZpZXIiLCJlZGl0YWJsZSIsImJ1dHRvbnMiLCJlZGl0IiwiaHRtbCIsImFjdGlvbiIsInNhdmVCdXR0b24iLCJhdXRvRm9jdXMiLCJDb25zdHJ1Y3RvciIsIndpbmRvdyIsImpRdWVyeSJdLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly91Ym9sZC1sYXJhdmVsLy4vcmVzb3VyY2VzL2pzL3BhZ2VzL3RhYmxlZGl0LmluaXQuanM/MjI1NiJdLCJzb3VyY2VzQ29udGVudCI6WyIvKlxyXG5UZW1wbGF0ZSBOYW1lOiBVYm9sZCAtIFJlc3BvbnNpdmUgQm9vdHN0cmFwIDQgQWRtaW4gRGFzaGJvYXJkXHJcbkF1dGhvcjogQ29kZXJUaGVtZXNcclxuV2Vic2l0ZTogaHR0cHM6Ly9jb2RlcnRoZW1lcy5jb20vXHJcbkNvbnRhY3Q6IHN1cHBvcnRAY29kZXJ0aGVtZXMuY29tXHJcbkZpbGU6IEVkaXQgdGFibGUgaW5pdCBqc1xyXG4qL1xyXG5cclxuIWZ1bmN0aW9uKCQpIHtcclxuICAgIFwidXNlIHN0cmljdFwiO1xyXG5cclxuICAgIHZhciBFZGl0YWJsZVRhYmxlID0gZnVuY3Rpb24oKSB7fTtcclxuXHJcbiAgICBFZGl0YWJsZVRhYmxlLnByb3RvdHlwZS5pbml0ID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIFxyXG4gICAgICAgICQoXCIjaW5saW5lLWVkaXRhYmxlXCIpLlRhYmxlZGl0KHtcclxuICAgICAgICAgICAgaW5wdXRDbGFzczogJ2Zvcm0tY29udHJvbCBmb3JtLWNvbnRyb2wtc20nLFxyXG4gICAgICAgICAgICBlZGl0QnV0dG9uOiBmYWxzZSxcclxuICAgICAgICAgICAgZGVsZXRlQnV0dG9uOiBmYWxzZSxcclxuICAgICAgICAgICAgY29sdW1uczoge1xyXG4gICAgICAgICAgICAgICAgaWRlbnRpZmllcjogWzAsIFwiaWRcIl0sXHJcbiAgICAgICAgICAgICAgICBlZGl0YWJsZTogW1xyXG4gICAgICAgICAgICAgICAgICAgIFsxLCBcImNvbDFcIl0sXHJcbiAgICAgICAgICAgICAgICAgICAgWzIsIFwiY29sMlwiXSxcclxuICAgICAgICAgICAgICAgICAgICBbMywgXCJjb2wzXCJdLFxyXG4gICAgICAgICAgICAgICAgICAgIFs0LCBcImNvbDRcIl0sXHJcbiAgICAgICAgICAgICAgICAgICAgWzYsIFwiY29sNlwiXVxyXG4gICAgICAgICAgICAgICAgXVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSksXHJcblxyXG4gICAgICAgICQoXCIjYnRuLWVkaXRhYmxlXCIpLlRhYmxlZGl0KHtcclxuICAgICAgICAgICAgYnV0dG9uczoge1xyXG4gICAgICAgICAgICAgICAgZWRpdDoge1xyXG4gICAgICAgICAgICAgICAgICAgIGNsYXNzOiAnYnRuIGJ0bi1zdWNjZXNzJyxcclxuICAgICAgICAgICAgICAgICAgICBodG1sOiAnPHNwYW4gY2xhc3M9XCJtZGkgbWRpLXBlbmNpbFwiPjwvc3Bhbj4nLFxyXG4gICAgICAgICAgICAgICAgICAgIGFjdGlvbjogJ2VkaXQnXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIGlucHV0Q2xhc3M6ICdmb3JtLWNvbnRyb2wgZm9ybS1jb250cm9sLXNtJyxcclxuICAgICAgICAgICAgZGVsZXRlQnV0dG9uOiBmYWxzZSxcclxuICAgICAgICAgICAgc2F2ZUJ1dHRvbjogZmFsc2UsXHJcbiAgICAgICAgICAgIGF1dG9Gb2N1czogZmFsc2UsXHJcbiAgICAgICAgICAgIGNvbHVtbnM6IHtcclxuICAgICAgICAgICAgICAgIGlkZW50aWZpZXI6IFswLCBcImlkXCJdLFxyXG4gICAgICAgICAgICAgICAgZWRpdGFibGU6IFtcclxuICAgICAgICAgICAgICAgICAgICBbMSwgXCJjb2wxXCJdLFxyXG4gICAgICAgICAgICAgICAgICAgIFsyLCBcImNvbDJcIl0sXHJcbiAgICAgICAgICAgICAgICAgICAgWzMsIFwiY29sM1wiXSxcclxuICAgICAgICAgICAgICAgICAgICBbNCwgXCJjb2w0XCJdLFxyXG4gICAgICAgICAgICAgICAgICAgIFs2LCBcImNvbDZcIl1cclxuICAgICAgICAgICAgICAgIF1cclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pXHJcbiAgICB9LFxyXG4gICAgJC5FZGl0YWJsZVRhYmxlID0gbmV3IEVkaXRhYmxlVGFibGUsICQuRWRpdGFibGVUYWJsZS5Db25zdHJ1Y3RvciA9IEVkaXRhYmxlVGFibGVcclxuXHJcbn0od2luZG93LmpRdWVyeSksXHJcblxyXG4vL2luaXRpYWxpemluZyBcclxuZnVuY3Rpb24oJCkge1xyXG4gICAgXCJ1c2Ugc3RyaWN0XCI7XHJcbiAgICAkLkVkaXRhYmxlVGFibGUuaW5pdCgpXHJcbn0od2luZG93LmpRdWVyeSk7Il0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxDQUFDLFVBQVNBLENBQUMsRUFBRTtFQUNULFlBQVk7O0VBRVosSUFBSUMsYUFBYSxHQUFHLFNBQWhCQSxhQUFhQSxDQUFBLEVBQWMsQ0FBQyxDQUFDO0VBRWpDQSxhQUFhLENBQUNDLFNBQVMsQ0FBQ0MsSUFBSSxHQUFHLFlBQVk7SUFFdkNILENBQUMsQ0FBQyxrQkFBa0IsQ0FBQyxDQUFDSSxRQUFRLENBQUM7TUFDM0JDLFVBQVUsRUFBRSw4QkFBOEI7TUFDMUNDLFVBQVUsRUFBRSxLQUFLO01BQ2pCQyxZQUFZLEVBQUUsS0FBSztNQUNuQkMsT0FBTyxFQUFFO1FBQ0xDLFVBQVUsRUFBRSxDQUFDLENBQUMsRUFBRSxJQUFJLENBQUM7UUFDckJDLFFBQVEsRUFBRSxDQUNOLENBQUMsQ0FBQyxFQUFFLE1BQU0sQ0FBQyxFQUNYLENBQUMsQ0FBQyxFQUFFLE1BQU0sQ0FBQyxFQUNYLENBQUMsQ0FBQyxFQUFFLE1BQU0sQ0FBQyxFQUNYLENBQUMsQ0FBQyxFQUFFLE1BQU0sQ0FBQyxFQUNYLENBQUMsQ0FBQyxFQUFFLE1BQU0sQ0FBQztNQUVuQjtJQUNKLENBQUMsQ0FBQyxFQUVGVixDQUFDLENBQUMsZUFBZSxDQUFDLENBQUNJLFFBQVEsQ0FBQztNQUN4Qk8sT0FBTyxFQUFFO1FBQ0xDLElBQUksRUFBRTtVQUNGLFNBQU8saUJBQWlCO1VBQ3hCQyxJQUFJLEVBQUUsc0NBQXNDO1VBQzVDQyxNQUFNLEVBQUU7UUFDWjtNQUNKLENBQUM7TUFDRFQsVUFBVSxFQUFFLDhCQUE4QjtNQUMxQ0UsWUFBWSxFQUFFLEtBQUs7TUFDbkJRLFVBQVUsRUFBRSxLQUFLO01BQ2pCQyxTQUFTLEVBQUUsS0FBSztNQUNoQlIsT0FBTyxFQUFFO1FBQ0xDLFVBQVUsRUFBRSxDQUFDLENBQUMsRUFBRSxJQUFJLENBQUM7UUFDckJDLFFBQVEsRUFBRSxDQUNOLENBQUMsQ0FBQyxFQUFFLE1BQU0sQ0FBQyxFQUNYLENBQUMsQ0FBQyxFQUFFLE1BQU0sQ0FBQyxFQUNYLENBQUMsQ0FBQyxFQUFFLE1BQU0sQ0FBQyxFQUNYLENBQUMsQ0FBQyxFQUFFLE1BQU0sQ0FBQyxFQUNYLENBQUMsQ0FBQyxFQUFFLE1BQU0sQ0FBQztNQUVuQjtJQUNKLENBQUMsQ0FBQztFQUNOLENBQUMsRUFDRFYsQ0FBQyxDQUFDQyxhQUFhLEdBQUcsSUFBSUEsYUFBYSxJQUFFRCxDQUFDLENBQUNDLGFBQWEsQ0FBQ2dCLFdBQVcsR0FBR2hCLGFBQWE7QUFFcEYsQ0FBQyxDQUFDaUIsTUFBTSxDQUFDQyxNQUFNLENBQUM7QUFFaEI7QUFDQSxVQUFTbkIsQ0FBQyxFQUFFO0VBQ1IsWUFBWTs7RUFDWkEsQ0FBQyxDQUFDQyxhQUFhLENBQUNFLElBQUksRUFBRTtBQUMxQixDQUFDLENBQUNlLE1BQU0sQ0FBQ0MsTUFBTSxDQUFDIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3BhZ2VzL3RhYmxlZGl0LmluaXQuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/pages/tabledit.init.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/pages/tabledit.init.js"]();
/******/ 	
/******/ })()
;