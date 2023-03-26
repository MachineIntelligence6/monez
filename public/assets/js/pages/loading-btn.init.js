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

/***/ "./resources/js/pages/loading-btn.init.js":
/*!************************************************!*\
  !*** ./resources/js/pages/loading-btn.init.js ***!
  \************************************************/
/***/ (() => {

eval("/*\r\nTemplate Name: Ubold - Responsive Bootstrap 4 Admin Dashboard\r\nAuthor: CoderThemes\r\nWebsite: https://coderthemes.com/\r\nContact: support@coderthemes.com\r\nFile: Loading Button init js\r\n*/\n\n// Bind normal buttons\nLadda.bind('.ladda-button', {\n  timeout: 2000\n});\n\n// Bind progress buttons and simulate loading progress\nLadda.bind('.progress-demo .ladda-button', {\n  callback: function callback(instance) {\n    var progress = 0;\n    var interval = setInterval(function () {\n      progress = Math.min(progress + Math.random() * 0.1, 1);\n      instance.setProgress(progress);\n      if (progress === 1) {\n        instance.stop();\n        clearInterval(interval);\n      }\n    }, 200);\n  }\n});\n\n// You can control loading explicitly using the JavaScript API\n// as outlined below:\n\n// var l = Ladda.create( document.querySelector( 'button' ) );\n// l.start();\n// l.stop();\n// l.toggle();\n// l.isLoading();\n// l.setProgress( 0-1 );//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcGFnZXMvbG9hZGluZy1idG4uaW5pdC5qcy5qcyIsIm5hbWVzIjpbIkxhZGRhIiwiYmluZCIsInRpbWVvdXQiLCJjYWxsYmFjayIsImluc3RhbmNlIiwicHJvZ3Jlc3MiLCJpbnRlcnZhbCIsInNldEludGVydmFsIiwiTWF0aCIsIm1pbiIsInJhbmRvbSIsInNldFByb2dyZXNzIiwic3RvcCIsImNsZWFySW50ZXJ2YWwiXSwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsid2VicGFjazovL3Vib2xkLWxhcmF2ZWwvLi9yZXNvdXJjZXMvanMvcGFnZXMvbG9hZGluZy1idG4uaW5pdC5qcz8xOWY4Il0sInNvdXJjZXNDb250ZW50IjpbIi8qXHJcblRlbXBsYXRlIE5hbWU6IFVib2xkIC0gUmVzcG9uc2l2ZSBCb290c3RyYXAgNCBBZG1pbiBEYXNoYm9hcmRcclxuQXV0aG9yOiBDb2RlclRoZW1lc1xyXG5XZWJzaXRlOiBodHRwczovL2NvZGVydGhlbWVzLmNvbS9cclxuQ29udGFjdDogc3VwcG9ydEBjb2RlcnRoZW1lcy5jb21cclxuRmlsZTogTG9hZGluZyBCdXR0b24gaW5pdCBqc1xyXG4qL1xyXG5cclxuIC8vIEJpbmQgbm9ybWFsIGJ1dHRvbnNcclxuIExhZGRhLmJpbmQoICcubGFkZGEtYnV0dG9uJywgeyB0aW1lb3V0OiAyMDAwIH0gKTtcclxuXHJcbiAvLyBCaW5kIHByb2dyZXNzIGJ1dHRvbnMgYW5kIHNpbXVsYXRlIGxvYWRpbmcgcHJvZ3Jlc3NcclxuIExhZGRhLmJpbmQoICcucHJvZ3Jlc3MtZGVtbyAubGFkZGEtYnV0dG9uJywge1xyXG4gICAgIGNhbGxiYWNrOiBmdW5jdGlvbiggaW5zdGFuY2UgKSB7XHJcbiAgICAgICAgIHZhciBwcm9ncmVzcyA9IDA7XHJcbiAgICAgICAgIHZhciBpbnRlcnZhbCA9IHNldEludGVydmFsKCBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgIHByb2dyZXNzID0gTWF0aC5taW4oIHByb2dyZXNzICsgTWF0aC5yYW5kb20oKSAqIDAuMSwgMSApO1xyXG4gICAgICAgICAgICAgaW5zdGFuY2Uuc2V0UHJvZ3Jlc3MoIHByb2dyZXNzICk7XHJcblxyXG4gICAgICAgICAgICAgaWYoIHByb2dyZXNzID09PSAxICkge1xyXG4gICAgICAgICAgICAgICAgIGluc3RhbmNlLnN0b3AoKTtcclxuICAgICAgICAgICAgICAgICBjbGVhckludGVydmFsKCBpbnRlcnZhbCApO1xyXG4gICAgICAgICAgICAgfVxyXG4gICAgICAgICB9LCAyMDAgKTtcclxuICAgICB9XHJcbiB9ICk7XHJcblxyXG4gLy8gWW91IGNhbiBjb250cm9sIGxvYWRpbmcgZXhwbGljaXRseSB1c2luZyB0aGUgSmF2YVNjcmlwdCBBUElcclxuIC8vIGFzIG91dGxpbmVkIGJlbG93OlxyXG5cclxuIC8vIHZhciBsID0gTGFkZGEuY3JlYXRlKCBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCAnYnV0dG9uJyApICk7XHJcbiAvLyBsLnN0YXJ0KCk7XHJcbiAvLyBsLnN0b3AoKTtcclxuIC8vIGwudG9nZ2xlKCk7XHJcbiAvLyBsLmlzTG9hZGluZygpO1xyXG4gLy8gbC5zZXRQcm9ncmVzcyggMC0xICk7XHJcbiJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUM7QUFDQUEsS0FBSyxDQUFDQyxJQUFJLENBQUUsZUFBZSxFQUFFO0VBQUVDLE9BQU8sRUFBRTtBQUFLLENBQUMsQ0FBRTs7QUFFaEQ7QUFDQUYsS0FBSyxDQUFDQyxJQUFJLENBQUUsOEJBQThCLEVBQUU7RUFDeENFLFFBQVEsRUFBRSxTQUFBQSxTQUFVQyxRQUFRLEVBQUc7SUFDM0IsSUFBSUMsUUFBUSxHQUFHLENBQUM7SUFDaEIsSUFBSUMsUUFBUSxHQUFHQyxXQUFXLENBQUUsWUFBVztNQUNuQ0YsUUFBUSxHQUFHRyxJQUFJLENBQUNDLEdBQUcsQ0FBRUosUUFBUSxHQUFHRyxJQUFJLENBQUNFLE1BQU0sRUFBRSxHQUFHLEdBQUcsRUFBRSxDQUFDLENBQUU7TUFDeEROLFFBQVEsQ0FBQ08sV0FBVyxDQUFFTixRQUFRLENBQUU7TUFFaEMsSUFBSUEsUUFBUSxLQUFLLENBQUMsRUFBRztRQUNqQkQsUUFBUSxDQUFDUSxJQUFJLEVBQUU7UUFDZkMsYUFBYSxDQUFFUCxRQUFRLENBQUU7TUFDN0I7SUFDSixDQUFDLEVBQUUsR0FBRyxDQUFFO0VBQ1o7QUFDSixDQUFDLENBQUU7O0FBRUg7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EifQ==\n//# sourceURL=webpack-internal:///./resources/js/pages/loading-btn.init.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/pages/loading-btn.init.js"]();
/******/ 	
/******/ })()
;