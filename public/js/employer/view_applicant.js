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
/******/ 	return __webpack_require__(__webpack_require__.s = 39);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/employer/view_applicant.js":
/*!*************************************************!*\
  !*** ./resources/js/employer/view_applicant.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('#recruiterContact').mask('00000000000', {
  'translation': {
    0: {
      pattern: /[0-9*]/
    }
  }
});
$(".btnDelete").click(function (event) {
  var id = $(this).attr('data-id');
  event.preventDefault();
  Swal.fire({
    title: 'DELETE CONFIRMATION',
    text: 'Are you sure you want to delete Applicant?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#28A745',
    cancelButtonColor: '#d33',
    confirmButtonText: 'CONFIRM'
  }).then(function (result) {
    if (result.value) {
      Swal.fire('DELETED', 'Applicant deleted', 'success').then(function (isOkay) {
        $('#deleteApplicant' + id).submit();
      });
    }
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
    })[0].focus(); // return false;
  } else {
    Swal.fire('SUCCESS!', 'Interview Set!', 'success').then(function (isOkay) {
      $('#setInterviewForm').submit();
    });
  }
});
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
});
var dateToday = new Date();
$('#interviewDate').datetimepicker({
  format: 'L',
  minDate: dateToday.setDate(dateToday.getDate() + 1)
});
$('#startTime, #endTime').datetimepicker({
  format: 'hh:mm A'
});
$('#setInterview').on('show.bs.modal', function (e) {
  var app = $(e.relatedTarget).data('applicantid');
  $(this).find('.modal-body #applicant_id_int').val(app);
});
$('#setInterview').on('show.bs.modal', function (e) {
  var jbid = $(e.relatedTarget).data('jobpostid');
  $(this).find('.modal-body #job_post_id').val(jbid);
});
$('#setInterview').on('show.bs.modal', function (e) {
  var fname = $(e.relatedTarget).data('fname');
  $(this).find('.modal-header #appFirstName').text(fname);
});
$('#setInterview').on('show.bs.modal', function (e) {
  var lname = $(e.relatedTarget).data('lname');
  $(this).find('.modal-header #appLastName').text(lname);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var appfname = $(e.relatedTarget).data('appfname');
  $(this).find('.modal-header #applicantModalLabelFirst').text(appfname);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var applname = $(e.relatedTarget).data('applname');
  $(this).find('.modal-header #applicantModalLabelLast').text(applname);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var email = $(e.relatedTarget).data('email');
  $(this).find('.modal-body #email').text(email);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var contact = $(e.relatedTarget).data('contact');
  $(this).find('.modal-body #contact').text(contact);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var expsalary = $(e.relatedTarget).data('expsalary');
  $(this).find('.modal-body #expSalary').text(expsalary);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var school = $(e.relatedTarget).data('school');
  $(this).find('.modal-body #school').text(school);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var course = $(e.relatedTarget).data('course');
  $(this).find('.modal-body #course').text(course);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var datefrom = $(e.relatedTarget).data('datefrom');
  $(this).find('.modal-body #dateFrom').text(datefrom);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var dateto = $(e.relatedTarget).data('dateto');
  $(this).find('.modal-body #dateTo').text(dateto);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var educattainment = $(e.relatedTarget).data('educattainment');
  $(this).find('.modal-body #educ').text(educattainment);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var jobtitle = $(e.relatedTarget).data('jobtitle');
  $(this).find('.modal-body #jobTitle').text(jobtitle);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var companyName = $(e.relatedTarget).data('company');
  $(this).find('.modal-body #companyName').text(companyName);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var datebegin = $(e.relatedTarget).data('begin');
  $(this).find('.modal-body #begin').text(datebegin);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var dateend = $(e.relatedTarget).data('end');
  $(this).find('.modal-body #end').text(dateend);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var salary = $(e.relatedTarget).data('salary');
  $(this).find('.modal-body #salary').text(salary);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var skill = $(e.relatedTarget).data('skills');
  $(this).find('.modal-body #skill').text(skill);
});
$('#viewApplicant').on('show.bs.modal', function (e) {
  var pitch = $(e.relatedTarget).data('pitch');
  $(this).find('.modal-body #pitch').text(pitch);
});
$('#job-post').addClass('active');

/***/ }),

/***/ 39:
/*!*******************************************************!*\
  !*** multi ./resources/js/employer/view_applicant.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/employer/view_applicant.js */"./resources/js/employer/view_applicant.js");


/***/ })

/******/ });