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
/******/ 	return __webpack_require__(__webpack_require__.s = 12);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/applicant/interview.js":
/*!*********************************************!*\
  !*** ./resources/js/applicant/interview.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('.btnViewToggle').click(function () {
    var id = $(this).attr('data-id');
    $('#more' + id).toggleClass('d-none');
    $('#less' + id).toggleClass('d-none');
  });
  $('#date input').each(function () {
    var dateToday = new Date();
    var id = $(this).attr('data-id');
    $('input#datetimepicker' + id).datetimepicker({
      format: 'L',
      minDate: dateToday.setDate(dateToday.getDate() + 1)
    });
  }); // $(window).bind('beforeunload', function(){
  //     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  //     $.ajax({
  //         url: $(this).data('url'),
  //         type: 'POST',
  //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  //         data: 'ids='+join_selected_values,
  //         success: function (data) {
  //             console.log("update")
  //         },
  //             error: function (data) {
  //                 alert(data.responseText);
  //             }
  //     });
  // });

  $('#time input').each(function () {
    var id = $(this).attr('data-id');
    $('input#timepicker' + id).datetimepicker({
      format: 'LT'
    });
  });
});
$('#interviews').addClass('active');
$('.acceptInterview').click(function () {
  var id = $(this).attr('data-id');
  event.preventDefault();
  Swal.fire({
    title: "You're about to accept this Job Interview, This can’t be undone!",
    text: "",
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#28A745',
    cancelButtonColor: '#c2c2c2',
    confirmButtonText: 'Confirm'
  }).then(function (result) {
    if (result.value) {
      Swal.fire('Job Interview accepted!', '', 'success').then(function (isAccept) {
        $('#interviewDecisionAccept' + id).submit();
      });
    }
  });
});
$('.declineInterview').click(function () {
  var id = $(this).attr('data-id');
  event.preventDefault();
  Swal.fire({
    title: "You're about to decline this Job Interview, This can’t be undone!",
    text: "",
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#c2c2c2',
    confirmButtonText: 'Confirm'
  }).then(function (result) {
    if (result.value) {
      Swal.fire('Job Interview declined!', '', 'success').then(function (isDeclined) {
        $('#interviewDecisionDecline' + id).submit();
      });
    }
  });
});
$(".saveInterview").click(function () {
  $(".interviewRescheduleValidate").on('submit', function (e) {
    var id = $(this).attr('data-id');
    var checkEmptyInput1 = $(this).find("input[type=text]:visible").filter(function () {
      if ($(this).val() == "") return $(this);
    }).length;

    if (checkEmptyInput1 > 0) {
      e.preventDefault();
      Swal.fire({
        title: 'Please complete the fields',
        icon: 'info'
      });
      $(this).find("input[type=text]:visible").filter(function () {
        if ($(this).val() == "") return $(this);
      })[0].focus();
      return false;
    } else {
      Swal.fire('SUCCESS!', 'Job Interview rescheduled!', 'success').then(function (isOkay) {
        $('#interviewReschedule' + id).submit();
      });
    }
  });
});

/***/ }),

/***/ 12:
/*!***************************************************!*\
  !*** multi ./resources/js/applicant/interview.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/applicant/interview.js */"./resources/js/applicant/interview.js");


/***/ })

/******/ });