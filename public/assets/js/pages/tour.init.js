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

/***/ "./resources/js/pages/tour.init.js":
/*!*****************************************!*\
  !*** ./resources/js/pages/tour.init.js ***!
  \*****************************************/
/***/ (() => {

eval("/*\r\nTemplate Name: Ubold - Responsive Bootstrap 4 Admin Dashboard\r\nAuthor: CoderThemes\r\nWebsite: https://coderthemes.com/\r\nContact: support@coderthemes.com\r\nFile: Tour init js\r\n*/\n\n$(document).ready(function () {\n  // Define the tour!\n  var tour = {\n    id: \"my-intro\",\n    steps: [{\n      target: \"logo-tour\",\n      title: \"Logo Here\",\n      content: \"You can find here status of user who's currently online.\",\n      placement: 'bottom',\n      yOffset: 10\n    }, {\n      target: 'display-title-tour',\n      title: \"Display Text\",\n      content: \"Click on the button and make sidebar navigation small.\",\n      placement: 'top',\n      zindex: 9999\n    }, {\n      target: 'page-title-tour',\n      title: \"User settings\",\n      content: \"You can edit you profile info here.\",\n      placement: 'bottom',\n      zindex: 999\n    }, {\n      target: 'thankyou-tour',\n      title: \"Thank you !\",\n      content: \"Here you can change theme skins and other features.\",\n      placement: 'top',\n      zindex: 999\n    }],\n    showPrevButton: true\n  };\n\n  // Start the tour!\n  hopscotch.startTour(tour);\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsInRvdXIiLCJpZCIsInN0ZXBzIiwidGFyZ2V0IiwidGl0bGUiLCJjb250ZW50IiwicGxhY2VtZW50IiwieU9mZnNldCIsInppbmRleCIsInNob3dQcmV2QnV0dG9uIiwiaG9wc2NvdGNoIiwic3RhcnRUb3VyIl0sInNvdXJjZXMiOlsid2VicGFjazovL3Vib2xkLWxhcmF2ZWwvLi9yZXNvdXJjZXMvanMvcGFnZXMvdG91ci5pbml0LmpzP2M3MDciXSwic291cmNlc0NvbnRlbnQiOlsiLypcclxuVGVtcGxhdGUgTmFtZTogVWJvbGQgLSBSZXNwb25zaXZlIEJvb3RzdHJhcCA0IEFkbWluIERhc2hib2FyZFxyXG5BdXRob3I6IENvZGVyVGhlbWVzXHJcbldlYnNpdGU6IGh0dHBzOi8vY29kZXJ0aGVtZXMuY29tL1xyXG5Db250YWN0OiBzdXBwb3J0QGNvZGVydGhlbWVzLmNvbVxyXG5GaWxlOiBUb3VyIGluaXQganNcclxuKi9cclxuXHJcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpIHtcclxuXHJcbiAgICAvLyBEZWZpbmUgdGhlIHRvdXIhXHJcbiAgICB2YXIgdG91ciA9IHtcclxuICAgICAgICBpZDogXCJteS1pbnRyb1wiLFxyXG4gICAgICAgIHN0ZXBzOiBbXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIHRhcmdldDogXCJsb2dvLXRvdXJcIixcclxuICAgICAgICAgICAgICAgIHRpdGxlOiBcIkxvZ28gSGVyZVwiLFxyXG4gICAgICAgICAgICAgICAgY29udGVudDogXCJZb3UgY2FuIGZpbmQgaGVyZSBzdGF0dXMgb2YgdXNlciB3aG8ncyBjdXJyZW50bHkgb25saW5lLlwiLFxyXG4gICAgICAgICAgICAgICAgcGxhY2VtZW50OiAnYm90dG9tJyxcclxuICAgICAgICAgICAgICAgIHlPZmZzZXQ6IDEwXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIHRhcmdldDogJ2Rpc3BsYXktdGl0bGUtdG91cicsXHJcbiAgICAgICAgICAgICAgICB0aXRsZTogXCJEaXNwbGF5IFRleHRcIixcclxuICAgICAgICAgICAgICAgIGNvbnRlbnQ6IFwiQ2xpY2sgb24gdGhlIGJ1dHRvbiBhbmQgbWFrZSBzaWRlYmFyIG5hdmlnYXRpb24gc21hbGwuXCIsXHJcbiAgICAgICAgICAgICAgICBwbGFjZW1lbnQ6ICd0b3AnLFxyXG4gICAgICAgICAgICAgICAgemluZGV4OiA5OTk5XHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIHRhcmdldDogJ3BhZ2UtdGl0bGUtdG91cicsXHJcbiAgICAgICAgICAgICAgICB0aXRsZTogXCJVc2VyIHNldHRpbmdzXCIsXHJcbiAgICAgICAgICAgICAgICBjb250ZW50OiBcIllvdSBjYW4gZWRpdCB5b3UgcHJvZmlsZSBpbmZvIGhlcmUuXCIsXHJcbiAgICAgICAgICAgICAgICBwbGFjZW1lbnQ6ICdib3R0b20nLFxyXG4gICAgICAgICAgICAgICAgemluZGV4OiA5OTlcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0OiAndGhhbmt5b3UtdG91cicsXHJcbiAgICAgICAgICAgICAgICB0aXRsZTogXCJUaGFuayB5b3UgIVwiLFxyXG4gICAgICAgICAgICAgICAgY29udGVudDogXCJIZXJlIHlvdSBjYW4gY2hhbmdlIHRoZW1lIHNraW5zIGFuZCBvdGhlciBmZWF0dXJlcy5cIixcclxuICAgICAgICAgICAgICAgIHBsYWNlbWVudDogJ3RvcCcsXHJcbiAgICAgICAgICAgICAgICB6aW5kZXg6IDk5OVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgXSxcclxuICAgICAgICBzaG93UHJldkJ1dHRvbjogdHJ1ZVxyXG4gICAgfTtcclxuXHJcbiAgICAvLyBTdGFydCB0aGUgdG91ciFcclxuICAgIGhvcHNjb3RjaC5zdGFydFRvdXIodG91cik7XHJcbn0pO1xyXG4iXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBQSxDQUFDLENBQUNDLFFBQVEsQ0FBQyxDQUFDQyxLQUFLLENBQUMsWUFBWTtFQUUxQjtFQUNBLElBQUlDLElBQUksR0FBRztJQUNQQyxFQUFFLEVBQUUsVUFBVTtJQUNkQyxLQUFLLEVBQUUsQ0FDSDtNQUNJQyxNQUFNLEVBQUUsV0FBVztNQUNuQkMsS0FBSyxFQUFFLFdBQVc7TUFDbEJDLE9BQU8sRUFBRSwwREFBMEQ7TUFDbkVDLFNBQVMsRUFBRSxRQUFRO01BQ25CQyxPQUFPLEVBQUU7SUFDYixDQUFDLEVBQ0Q7TUFDSUosTUFBTSxFQUFFLG9CQUFvQjtNQUM1QkMsS0FBSyxFQUFFLGNBQWM7TUFDckJDLE9BQU8sRUFBRSx3REFBd0Q7TUFDakVDLFNBQVMsRUFBRSxLQUFLO01BQ2hCRSxNQUFNLEVBQUU7SUFDWixDQUFDLEVBQ0Q7TUFDSUwsTUFBTSxFQUFFLGlCQUFpQjtNQUN6QkMsS0FBSyxFQUFFLGVBQWU7TUFDdEJDLE9BQU8sRUFBRSxxQ0FBcUM7TUFDOUNDLFNBQVMsRUFBRSxRQUFRO01BQ25CRSxNQUFNLEVBQUU7SUFDWixDQUFDLEVBQ0Q7TUFDSUwsTUFBTSxFQUFFLGVBQWU7TUFDdkJDLEtBQUssRUFBRSxhQUFhO01BQ3BCQyxPQUFPLEVBQUUscURBQXFEO01BQzlEQyxTQUFTLEVBQUUsS0FBSztNQUNoQkUsTUFBTSxFQUFFO0lBQ1osQ0FBQyxDQUNKO0lBQ0RDLGNBQWMsRUFBRTtFQUNwQixDQUFDOztFQUVEO0VBQ0FDLFNBQVMsQ0FBQ0MsU0FBUyxDQUFDWCxJQUFJLENBQUM7QUFDN0IsQ0FBQyxDQUFDIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3BhZ2VzL3RvdXIuaW5pdC5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/pages/tour.init.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/pages/tour.init.js"]();
/******/ 	
/******/ })()
;