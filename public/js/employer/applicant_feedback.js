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
/******/ 	return __webpack_require__(__webpack_require__.s = 25);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/employer/applicant_feedback.js":
/*!*****************************************************!*\
  !*** ./resources/js/employer/applicant_feedback.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('.btnApprove').click(function (e) {
  e.preventDefault();
  var id = $(this).attr('data-id');
  Swal.fire({
    title: 'Are you sure?',
    text: "You are about to approve a feedback",
    icon: 'info',
    showCancelButton: true,
    cancelButtonColor: '#c2c2c2',
    confirmButtonText: 'Approve'
  }).then(function (result) {
    if (result.value) {
      Swal.fire('APPROVED', 'Applicant feedback approved. It will show on company\'s profile.', 'success').then(function (isOkay) {
        $('#approveForm' + id).submit();
      });
    }
  });
});
$('.btnReject').click(function (e) {
  e.preventDefault();
  var id = $(this).attr('data-id');
  Swal.fire({
    title: 'Are you sure?',
    text: "You are about to reject a feedback",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#c2c2c2',
    confirmButtonText: 'Reject'
  }).then(function (result) {
    if (result.value) {
      Swal.fire('REJECTED', 'Applicant feedback rejected.', 'success').then(function (isOkay) {
        $('#rejectForm' + id).submit();
      });
    }
  });
});
$('#sortValue').on('submit', function (data) {
  var form = $(this);
  console.log(form.serialize());
  $.ajax({
    type: 'GET',
    data: form.serialize(),
    url: form.attr('action'),
    success: function success(data) {}
  });
});
$("#sortBy").change(function () {
  var sortVal = $(this).val();
  $('.defaultSort').addClass('d-none');
  $('.defaultOld').addClass('d-none');

  if (sortVal == 'Freshness') {
    $('.defaultSort').removeClass('d-none');
  }

  if (sortVal == 'Oldness') {
    $('.defaultOld').removeClass('d-none');
  }
});
$('#app-feedback').addClass('active');

/***/ }),

/***/ 25:
/*!***********************************************************!*\
  !*** multi ./resources/js/employer/applicant_feedback.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/employer/applicant_feedback.js */"./resources/js/employer/applicant_feedback.js");


/***/ })

/******/ });