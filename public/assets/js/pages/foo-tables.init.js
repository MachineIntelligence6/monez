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

/***/ "./resources/js/pages/foo-tables.init.js":
/*!***********************************************!*\
  !*** ./resources/js/pages/foo-tables.init.js ***!
  \***********************************************/
/***/ (() => {

eval("/*\r\nTemplate Name: Ubold - Responsive Bootstrap 4 Admin Dashboard\r\nAuthor: CoderThemes\r\nWebsite: https://coderthemes.com/\r\nContact: support@coderthemes.com\r\nFile: Foo tables init js\r\n*/\n\n$(window).on('load', function () {\n  // Row Toggler\n  // -----------------------------------------------------------------\n  $('#demo-foo-row-toggler').footable();\n\n  // Accordion\n  // -----------------------------------------------------------------\n  $('#demo-foo-accordion').footable().on('footable_row_expanded', function (e) {\n    $('#demo-foo-accordion tbody tr.footable-detail-show').not(e.row).each(function () {\n      $('#demo-foo-accordion').data('footable').toggleDetail(this);\n    });\n  });\n\n  // Pagination\n  // -----------------------------------------------------------------\n  $('#demo-foo-pagination').footable();\n  $('#demo-show-entries').change(function (e) {\n    e.preventDefault();\n    var pageSize = $(this).val();\n    $('#demo-foo-pagination').data('page-size', pageSize);\n    $('#demo-foo-pagination').trigger('footable_initialized');\n  });\n\n  // Filtering\n  // -----------------------------------------------------------------\n  var filtering = $('#demo-foo-filtering');\n  filtering.footable().on('footable_filtering', function (e) {\n    var selected = $('#demo-foo-filter-status').find(':selected').val();\n    e.filter += e.filter && e.filter.length > 0 ? ' ' + selected : selected;\n    e.clear = !e.filter;\n  });\n\n  // Filter status\n  $('#demo-foo-filter-status').change(function (e) {\n    e.preventDefault();\n    filtering.trigger('footable_filter', {\n      filter: $(this).val()\n    });\n  });\n\n  // Search input\n  $('#demo-foo-search').on('input', function (e) {\n    e.preventDefault();\n    filtering.trigger('footable_filter', {\n      filter: $(this).val()\n    });\n  });\n\n  // Add & Remove Row\n  // -----------------------------------------------------------------\n  var addrow = $('#demo-foo-addrow');\n  addrow.footable().on('click', '.demo-delete-row', function () {\n    //get the footable object\n    var footable = addrow.data('footable');\n\n    //get the row we are wanting to delete\n    var row = $(this).parents('tr:first');\n\n    //delete the row\n    footable.removeRow(row);\n  });\n\n  // Search input\n  $('#demo-input-search2').on('input', function (e) {\n    e.preventDefault();\n    addrow.trigger('footable_filter', {\n      filter: $(this).val()\n    });\n  });\n\n  // Add Row Button\n  $('#demo-btn-addrow').click(function () {\n    //get the footable object\n    var footable = addrow.data('footable');\n\n    //build up the row we are wanting to add\n    var newRow = '<tr><td style=\"text-align: center;\"><button class=\"demo-delete-row btn btn-danger btn-xs btn-icon\"><i class=\"fa fa-times\"></i></button></td><td>Adam</td><td>Doe</td><td>Traffic Court Referee</td><td>22 Jun 1972</td><td><span class=\"badge label-table badge-success   \">Active</span></td></tr>';\n\n    //add it\n    footable.appendRow(newRow);\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyIkIiwid2luZG93Iiwib24iLCJmb290YWJsZSIsImUiLCJub3QiLCJyb3ciLCJlYWNoIiwiZGF0YSIsInRvZ2dsZURldGFpbCIsImNoYW5nZSIsInByZXZlbnREZWZhdWx0IiwicGFnZVNpemUiLCJ2YWwiLCJ0cmlnZ2VyIiwiZmlsdGVyaW5nIiwic2VsZWN0ZWQiLCJmaW5kIiwiZmlsdGVyIiwibGVuZ3RoIiwiY2xlYXIiLCJhZGRyb3ciLCJwYXJlbnRzIiwicmVtb3ZlUm93IiwiY2xpY2siLCJuZXdSb3ciLCJhcHBlbmRSb3ciXSwic291cmNlcyI6WyJ3ZWJwYWNrOi8vdWJvbGQtbGFyYXZlbC8uL3Jlc291cmNlcy9qcy9wYWdlcy9mb28tdGFibGVzLmluaXQuanM/YTRjNCJdLCJzb3VyY2VzQ29udGVudCI6WyIvKlxyXG5UZW1wbGF0ZSBOYW1lOiBVYm9sZCAtIFJlc3BvbnNpdmUgQm9vdHN0cmFwIDQgQWRtaW4gRGFzaGJvYXJkXHJcbkF1dGhvcjogQ29kZXJUaGVtZXNcclxuV2Vic2l0ZTogaHR0cHM6Ly9jb2RlcnRoZW1lcy5jb20vXHJcbkNvbnRhY3Q6IHN1cHBvcnRAY29kZXJ0aGVtZXMuY29tXHJcbkZpbGU6IEZvbyB0YWJsZXMgaW5pdCBqc1xyXG4qL1xyXG5cclxuJCh3aW5kb3cpLm9uKCdsb2FkJywgZnVuY3Rpb24oKSB7XHJcblxyXG4gICAgLy8gUm93IFRvZ2dsZXJcclxuICAgIC8vIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcbiAgICAkKCcjZGVtby1mb28tcm93LXRvZ2dsZXInKS5mb290YWJsZSgpO1xyXG5cclxuICAgIC8vIEFjY29yZGlvblxyXG4gICAgLy8gLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cclxuICAgICQoJyNkZW1vLWZvby1hY2NvcmRpb24nKS5mb290YWJsZSgpLm9uKCdmb290YWJsZV9yb3dfZXhwYW5kZWQnLCBmdW5jdGlvbihlKSB7XHJcbiAgICAgICAgJCgnI2RlbW8tZm9vLWFjY29yZGlvbiB0Ym9keSB0ci5mb290YWJsZS1kZXRhaWwtc2hvdycpLm5vdChlLnJvdykuZWFjaChmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgJCgnI2RlbW8tZm9vLWFjY29yZGlvbicpLmRhdGEoJ2Zvb3RhYmxlJykudG9nZ2xlRGV0YWlsKHRoaXMpO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfSk7XHJcblxyXG4gICAgLy8gUGFnaW5hdGlvblxyXG4gICAgLy8gLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cclxuICAgICQoJyNkZW1vLWZvby1wYWdpbmF0aW9uJykuZm9vdGFibGUoKTtcclxuICAgICQoJyNkZW1vLXNob3ctZW50cmllcycpLmNoYW5nZShmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICB2YXIgcGFnZVNpemUgPSAkKHRoaXMpLnZhbCgpO1xyXG4gICAgICAgICQoJyNkZW1vLWZvby1wYWdpbmF0aW9uJykuZGF0YSgncGFnZS1zaXplJywgcGFnZVNpemUpO1xyXG4gICAgICAgICQoJyNkZW1vLWZvby1wYWdpbmF0aW9uJykudHJpZ2dlcignZm9vdGFibGVfaW5pdGlhbGl6ZWQnKTtcclxuICAgIH0pO1xyXG5cclxuICAgIC8vIEZpbHRlcmluZ1xyXG4gICAgLy8gLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cclxuICAgIHZhciBmaWx0ZXJpbmcgPSAkKCcjZGVtby1mb28tZmlsdGVyaW5nJyk7XHJcbiAgICBmaWx0ZXJpbmcuZm9vdGFibGUoKS5vbignZm9vdGFibGVfZmlsdGVyaW5nJywgZnVuY3Rpb24gKGUpIHtcclxuICAgICAgICB2YXIgc2VsZWN0ZWQgPSAkKCcjZGVtby1mb28tZmlsdGVyLXN0YXR1cycpLmZpbmQoJzpzZWxlY3RlZCcpLnZhbCgpO1xyXG4gICAgICAgIGUuZmlsdGVyICs9IChlLmZpbHRlciAmJiBlLmZpbHRlci5sZW5ndGggPiAwKSA/ICcgJyArIHNlbGVjdGVkIDogc2VsZWN0ZWQ7XHJcbiAgICAgICAgZS5jbGVhciA9ICFlLmZpbHRlcjtcclxuICAgIH0pO1xyXG5cclxuICAgIC8vIEZpbHRlciBzdGF0dXNcclxuICAgICQoJyNkZW1vLWZvby1maWx0ZXItc3RhdHVzJykuY2hhbmdlKGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgIGZpbHRlcmluZy50cmlnZ2VyKCdmb290YWJsZV9maWx0ZXInLCB7ZmlsdGVyOiAkKHRoaXMpLnZhbCgpfSk7XHJcbiAgICB9KTtcclxuXHJcbiAgICAvLyBTZWFyY2ggaW5wdXRcclxuICAgICQoJyNkZW1vLWZvby1zZWFyY2gnKS5vbignaW5wdXQnLCBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICBmaWx0ZXJpbmcudHJpZ2dlcignZm9vdGFibGVfZmlsdGVyJywge2ZpbHRlcjogJCh0aGlzKS52YWwoKX0pO1xyXG4gICAgfSk7XHJcblxyXG5cclxuICAgIC8vIEFkZCAmIFJlbW92ZSBSb3dcclxuICAgIC8vIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXHJcbiAgICB2YXIgYWRkcm93ID0gJCgnI2RlbW8tZm9vLWFkZHJvdycpO1xyXG4gICAgYWRkcm93LmZvb3RhYmxlKCkub24oJ2NsaWNrJywgJy5kZW1vLWRlbGV0ZS1yb3cnLCBmdW5jdGlvbigpIHtcclxuXHJcbiAgICAgICAgLy9nZXQgdGhlIGZvb3RhYmxlIG9iamVjdFxyXG4gICAgICAgIHZhciBmb290YWJsZSA9IGFkZHJvdy5kYXRhKCdmb290YWJsZScpO1xyXG5cclxuICAgICAgICAvL2dldCB0aGUgcm93IHdlIGFyZSB3YW50aW5nIHRvIGRlbGV0ZVxyXG4gICAgICAgIHZhciByb3cgPSAkKHRoaXMpLnBhcmVudHMoJ3RyOmZpcnN0Jyk7XHJcblxyXG4gICAgICAgIC8vZGVsZXRlIHRoZSByb3dcclxuICAgICAgICBmb290YWJsZS5yZW1vdmVSb3cocm93KTtcclxuICAgIH0pO1xyXG5cclxuICAgIC8vIFNlYXJjaCBpbnB1dFxyXG4gICAgJCgnI2RlbW8taW5wdXQtc2VhcmNoMicpLm9uKCdpbnB1dCcsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgIGFkZHJvdy50cmlnZ2VyKCdmb290YWJsZV9maWx0ZXInLCB7ZmlsdGVyOiAkKHRoaXMpLnZhbCgpfSk7XHJcbiAgICB9KTtcclxuXHJcbiAgICAvLyBBZGQgUm93IEJ1dHRvblxyXG4gICAgJCgnI2RlbW8tYnRuLWFkZHJvdycpLmNsaWNrKGZ1bmN0aW9uKCkge1xyXG5cclxuICAgICAgICAvL2dldCB0aGUgZm9vdGFibGUgb2JqZWN0XHJcbiAgICAgICAgdmFyIGZvb3RhYmxlID0gYWRkcm93LmRhdGEoJ2Zvb3RhYmxlJyk7XHJcblxyXG4gICAgICAgIC8vYnVpbGQgdXAgdGhlIHJvdyB3ZSBhcmUgd2FudGluZyB0byBhZGRcclxuICAgICAgICB2YXIgbmV3Um93ID0gJzx0cj48dGQgc3R5bGU9XCJ0ZXh0LWFsaWduOiBjZW50ZXI7XCI+PGJ1dHRvbiBjbGFzcz1cImRlbW8tZGVsZXRlLXJvdyBidG4gYnRuLWRhbmdlciBidG4teHMgYnRuLWljb25cIj48aSBjbGFzcz1cImZhIGZhLXRpbWVzXCI+PC9pPjwvYnV0dG9uPjwvdGQ+PHRkPkFkYW08L3RkPjx0ZD5Eb2U8L3RkPjx0ZD5UcmFmZmljIENvdXJ0IFJlZmVyZWU8L3RkPjx0ZD4yMiBKdW4gMTk3MjwvdGQ+PHRkPjxzcGFuIGNsYXNzPVwiYmFkZ2UgbGFiZWwtdGFibGUgYmFkZ2Utc3VjY2VzcyAgIFwiPkFjdGl2ZTwvc3Bhbj48L3RkPjwvdHI+JztcclxuXHJcbiAgICAgICAgLy9hZGQgaXRcclxuICAgICAgICBmb290YWJsZS5hcHBlbmRSb3cobmV3Um93KTtcclxuICAgIH0pO1xyXG59KTsiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBQSxDQUFDLENBQUNDLE1BQU0sQ0FBQyxDQUFDQyxFQUFFLENBQUMsTUFBTSxFQUFFLFlBQVc7RUFFNUI7RUFDQTtFQUNBRixDQUFDLENBQUMsdUJBQXVCLENBQUMsQ0FBQ0csUUFBUSxFQUFFOztFQUVyQztFQUNBO0VBQ0FILENBQUMsQ0FBQyxxQkFBcUIsQ0FBQyxDQUFDRyxRQUFRLEVBQUUsQ0FBQ0QsRUFBRSxDQUFDLHVCQUF1QixFQUFFLFVBQVNFLENBQUMsRUFBRTtJQUN4RUosQ0FBQyxDQUFDLG1EQUFtRCxDQUFDLENBQUNLLEdBQUcsQ0FBQ0QsQ0FBQyxDQUFDRSxHQUFHLENBQUMsQ0FBQ0MsSUFBSSxDQUFDLFlBQVc7TUFDOUVQLENBQUMsQ0FBQyxxQkFBcUIsQ0FBQyxDQUFDUSxJQUFJLENBQUMsVUFBVSxDQUFDLENBQUNDLFlBQVksQ0FBQyxJQUFJLENBQUM7SUFDaEUsQ0FBQyxDQUFDO0VBQ04sQ0FBQyxDQUFDOztFQUVGO0VBQ0E7RUFDQVQsQ0FBQyxDQUFDLHNCQUFzQixDQUFDLENBQUNHLFFBQVEsRUFBRTtFQUNwQ0gsQ0FBQyxDQUFDLG9CQUFvQixDQUFDLENBQUNVLE1BQU0sQ0FBQyxVQUFVTixDQUFDLEVBQUU7SUFDeENBLENBQUMsQ0FBQ08sY0FBYyxFQUFFO0lBQ2xCLElBQUlDLFFBQVEsR0FBR1osQ0FBQyxDQUFDLElBQUksQ0FBQyxDQUFDYSxHQUFHLEVBQUU7SUFDNUJiLENBQUMsQ0FBQyxzQkFBc0IsQ0FBQyxDQUFDUSxJQUFJLENBQUMsV0FBVyxFQUFFSSxRQUFRLENBQUM7SUFDckRaLENBQUMsQ0FBQyxzQkFBc0IsQ0FBQyxDQUFDYyxPQUFPLENBQUMsc0JBQXNCLENBQUM7RUFDN0QsQ0FBQyxDQUFDOztFQUVGO0VBQ0E7RUFDQSxJQUFJQyxTQUFTLEdBQUdmLENBQUMsQ0FBQyxxQkFBcUIsQ0FBQztFQUN4Q2UsU0FBUyxDQUFDWixRQUFRLEVBQUUsQ0FBQ0QsRUFBRSxDQUFDLG9CQUFvQixFQUFFLFVBQVVFLENBQUMsRUFBRTtJQUN2RCxJQUFJWSxRQUFRLEdBQUdoQixDQUFDLENBQUMseUJBQXlCLENBQUMsQ0FBQ2lCLElBQUksQ0FBQyxXQUFXLENBQUMsQ0FBQ0osR0FBRyxFQUFFO0lBQ25FVCxDQUFDLENBQUNjLE1BQU0sSUFBS2QsQ0FBQyxDQUFDYyxNQUFNLElBQUlkLENBQUMsQ0FBQ2MsTUFBTSxDQUFDQyxNQUFNLEdBQUcsQ0FBQyxHQUFJLEdBQUcsR0FBR0gsUUFBUSxHQUFHQSxRQUFRO0lBQ3pFWixDQUFDLENBQUNnQixLQUFLLEdBQUcsQ0FBQ2hCLENBQUMsQ0FBQ2MsTUFBTTtFQUN2QixDQUFDLENBQUM7O0VBRUY7RUFDQWxCLENBQUMsQ0FBQyx5QkFBeUIsQ0FBQyxDQUFDVSxNQUFNLENBQUMsVUFBVU4sQ0FBQyxFQUFFO0lBQzdDQSxDQUFDLENBQUNPLGNBQWMsRUFBRTtJQUNsQkksU0FBUyxDQUFDRCxPQUFPLENBQUMsaUJBQWlCLEVBQUU7TUFBQ0ksTUFBTSxFQUFFbEIsQ0FBQyxDQUFDLElBQUksQ0FBQyxDQUFDYSxHQUFHO0lBQUUsQ0FBQyxDQUFDO0VBQ2pFLENBQUMsQ0FBQzs7RUFFRjtFQUNBYixDQUFDLENBQUMsa0JBQWtCLENBQUMsQ0FBQ0UsRUFBRSxDQUFDLE9BQU8sRUFBRSxVQUFVRSxDQUFDLEVBQUU7SUFDM0NBLENBQUMsQ0FBQ08sY0FBYyxFQUFFO0lBQ2xCSSxTQUFTLENBQUNELE9BQU8sQ0FBQyxpQkFBaUIsRUFBRTtNQUFDSSxNQUFNLEVBQUVsQixDQUFDLENBQUMsSUFBSSxDQUFDLENBQUNhLEdBQUc7SUFBRSxDQUFDLENBQUM7RUFDakUsQ0FBQyxDQUFDOztFQUdGO0VBQ0E7RUFDQSxJQUFJUSxNQUFNLEdBQUdyQixDQUFDLENBQUMsa0JBQWtCLENBQUM7RUFDbENxQixNQUFNLENBQUNsQixRQUFRLEVBQUUsQ0FBQ0QsRUFBRSxDQUFDLE9BQU8sRUFBRSxrQkFBa0IsRUFBRSxZQUFXO0lBRXpEO0lBQ0EsSUFBSUMsUUFBUSxHQUFHa0IsTUFBTSxDQUFDYixJQUFJLENBQUMsVUFBVSxDQUFDOztJQUV0QztJQUNBLElBQUlGLEdBQUcsR0FBR04sQ0FBQyxDQUFDLElBQUksQ0FBQyxDQUFDc0IsT0FBTyxDQUFDLFVBQVUsQ0FBQzs7SUFFckM7SUFDQW5CLFFBQVEsQ0FBQ29CLFNBQVMsQ0FBQ2pCLEdBQUcsQ0FBQztFQUMzQixDQUFDLENBQUM7O0VBRUY7RUFDQU4sQ0FBQyxDQUFDLHFCQUFxQixDQUFDLENBQUNFLEVBQUUsQ0FBQyxPQUFPLEVBQUUsVUFBVUUsQ0FBQyxFQUFFO0lBQzlDQSxDQUFDLENBQUNPLGNBQWMsRUFBRTtJQUNsQlUsTUFBTSxDQUFDUCxPQUFPLENBQUMsaUJBQWlCLEVBQUU7TUFBQ0ksTUFBTSxFQUFFbEIsQ0FBQyxDQUFDLElBQUksQ0FBQyxDQUFDYSxHQUFHO0lBQUUsQ0FBQyxDQUFDO0VBQzlELENBQUMsQ0FBQzs7RUFFRjtFQUNBYixDQUFDLENBQUMsa0JBQWtCLENBQUMsQ0FBQ3dCLEtBQUssQ0FBQyxZQUFXO0lBRW5DO0lBQ0EsSUFBSXJCLFFBQVEsR0FBR2tCLE1BQU0sQ0FBQ2IsSUFBSSxDQUFDLFVBQVUsQ0FBQzs7SUFFdEM7SUFDQSxJQUFJaUIsTUFBTSxHQUFHLHFTQUFxUzs7SUFFbFQ7SUFDQXRCLFFBQVEsQ0FBQ3VCLFNBQVMsQ0FBQ0QsTUFBTSxDQUFDO0VBQzlCLENBQUMsQ0FBQztBQUNOLENBQUMsQ0FBQyIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9wYWdlcy9mb28tdGFibGVzLmluaXQuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/pages/foo-tables.init.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/pages/foo-tables.init.js"]();
/******/ 	
/******/ })()
;