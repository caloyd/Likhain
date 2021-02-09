/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 27);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/employer/applicant_search.js":
/*!***************************************************!*\
  !*** ./resources/js/employer/applicant_search.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('#recruiterContact').mask('00000000000', {
  'translation': {
    0: {
      pattern: /[0-9*]/
    }
  }
}); // DataTable

$(document).ready(function () {
  $('#applicantSearch').DataTable({
    "fnDrawCallback": function fnDrawCallback(oSettings) {
      var totalPages = this.api().page.info().pages;

      if (totalPages <= 1) {
        jQuery('.dataTables_paginate').hide();
      } else {
        jQuery('.dataTables_paginate').show();
      }
    }
  });
}); // end DataTable
// Checkbox

$("#selectAll").change(function () {
  $(".checkbox").prop('checked', $(this).prop("checked"));
});
$('.checkbox').change(function () {
  if (false == $(this).prop("checked")) {
    $("#selectAll").prop('checked', false);
  }

  if ($('.checkbox:checked').length == $('.checkbox').length) {
    $("#selectAll").prop('checked', true);
  }
}); // end Checkbox

$(document).ready(function () {
  $('.js-example-basic-multiple').select2({
    theme: 'bootstrap4'
  });
});
$("#btnSetInterview").on('click', function (e) {
  e.preventDefault();
  var checkEmptyInput1 = $('#setInterviewForm').find("input[type=text]:visible,textarea:visible").filter(function () {
    if ($(this).val() == "") return $(this);
  }).length;

  if (checkEmptyInput1 > 0) {
    Swal.fire({
      title: 'Please complete the fields',
      icon: 'info'
    });
    $('#setInterviewForm').find("input[type=text]:visible,textarea:visible").filter(function () {
      if ($(this).val() == "") return $(this);
    })[0].focus();
  } else {
    Swal.fire('SUCCESS!', 'Interview Set!', 'success').then(function (isOkay) {
      $('#setInterviewForm').submit();
    });
  }
});
$('#app-search').addClass('active');
$('#setInterviewApplicantSearch').on('show.bs.modal', function (e) {
  var appid = $(e.relatedTarget).data('appid');
  $(this).find('.modal-body #applicantId').val(appid);
});
$('#setInterviewApplicantSearch').on('show.bs.modal', function (e) {
  var fname = $(e.relatedTarget).data('appfirstname');
  $(this).find('.modal-header #firstName').text(fname);
});
$('#setInterviewApplicantSearch').on('show.bs.modal', function (e) {
  var lname = $(e.relatedTarget).data('applastname');
  $(this).find('.modal-header #lastName').text(lname);
});
var dateToday = new Date();
$('#interviewDate1').datetimepicker({
  format: 'L',
  minDate: dateToday.setDate(dateToday.getDate() + 1)
});
$('#startTime1, #endTime1').datetimepicker({
  format: 'LT'
});

/***/ }),

/***/ 27:
/*!*********************************************************!*\
  !*** multi ./resources/js/employer/applicant_search.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/employer/applicant_search.js */"./resources/js/employer/applicant_search.js");


/***/ })

/******/ });