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
/******/ 	return __webpack_require__(__webpack_require__.s = 26);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/employer/applicant_interview.js":
/*!******************************************************!*\
  !*** ./resources/js/employer/applicant_interview.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('#contactNumber').mask('00000000000', {
  'translation': {
    0: {
      pattern: /[0-9*]/
    }
  }
});
$('.updateContactNumber').mask('00000000000', {
  'translation': {
    0: {
      pattern: /[0-9*]/
    }
  }
});
$('.massUpdateContactNumber').mask('00000000000', {
  'translation': {
    0: {
      pattern: /[0-9*]/
    }
  }
});
$(document).ready(function () {
  $('#interviewList').DataTable({
    "fnDrawCallback": function fnDrawCallback(oSettings) {
      var totalPages = this.api().page.info().pages;

      if (totalPages <= 1) {
        jQuery('.dataTables_paginate').hide();
      } else {
        jQuery('.dataTables_paginate').show();
      }
    }
  }); // Checkbox

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

  $('#app-interview').addClass('active');
  $('.interviewResult').change(function () {
    var selectedStat = $(this).children("option:selected").val(); // console.log(selectedStat);

    if (selectedStat == 'Pass') {
      $('.interviewType').removeAttr('disabled');
      $('.updateInterview').removeAttr('disabled');
      $('.updateTimeStart').removeAttr('disabled');
      $('.updateTimeEnd').removeAttr('disabled');
      $('.updateAddress').removeAttr('disabled');
      $('.updateInterviewee').removeAttr('disabled');
      $('.updateContactNumber').removeAttr('disabled');
      $('.updateNotes').removeAttr('disabled');
      $('.interviewStatus').removeAttr('disabled');
    } else {
      $('.interviewType').attr('disabled', true);
      $('.updateInterview').attr('disabled', true);
      $('.updateTimeStart').attr('disabled', true);
      $('.updateTimeEnd').attr('disabled', true);
      $('.updateAddress').attr('disabled', true);
      $('.updateInterviewee').attr('disabled', true);
      $('.updateContactNumber').attr('disabled', true);
      $('.updateNotes').attr('disabled', true);
      $('.interviewStatus').attr('disabled', true);
    }
  });
  $('#massInterviewResult').change(function () {
    var selectedStat = $(this).children("option:selected").val(); // console.log(selectedStat);

    if (selectedStat == 'Pass') {
      $('#massInterviewType').removeAttr('disabled');
      $('#massUpdateInterview').removeAttr('disabled');
      $('#massUpdateTimeStart').removeAttr('disabled');
      $('#massUpdateTimeEnd').removeAttr('disabled');
      $('#massUpdateAddress').removeAttr('disabled');
      $('#massUpdateInterviewee').removeAttr('disabled');
      $('#massUpdateContactNumber').removeAttr('disabled');
      $('#massUpdateNotes').removeAttr('disabled');
      $('#massInterviewStatus').removeAttr('disabled');
    } else {
      $('#massInterviewType').attr('disabled', true);
      $('#massUpdateInterview').attr('disabled', true);
      $('#massUpdateTimeStart').attr('disabled', true);
      $('#massUpdateTimeEnd').attr('disabled', true);
      $('#massUpdateAddress').attr('disabled', true);
      $('#massUpdateInterviewee').attr('disabled', true);
      $('#massUpdateContactNumber').attr('disabled', true);
      $('#massUpdateNotes').attr('disabled', true);
      $('#massInterviewStatus').attr('disabled', true);
    }
  });
  var dateToday = new Date();
  $('#jobOfferDate').datetimepicker({
    format: 'L',
    minDate: dateToday.setDate(dateToday.getDate() + 1)
  });
  $('#updateTime').datetimepicker({
    format: 'LT'
  });
  $('#dateOnly input').each(function () {
    var dateTodays = new Date();
    var ids = $(this).attr('data-id');
    $('input#updateInterview' + ids).datetimepicker({
      format: 'L',
      minDate: dateTodays.setDate(dateTodays.getDate() + 1)
    });
  });
  $('#massDateOnly input').each(function () {
    var dateTodays = new Date(); //var ids = $(this).attr('data-id');

    $('input#massUpdateInterview').datetimepicker({
      format: 'L',
      minDate: dateTodays.setDate(dateTodays.getDate() + 1)
    });
  });
  $('#massStartTime input').each(function () {
    $('input#massUpdateTimeStart').datetimepicker({
      format: 'LT'
    });
  });
  $('#startTime input').each(function () {
    var idst = $(this).attr('data-id');
    $('input#updateTimeStart' + idst).datetimepicker({
      format: 'LT'
    });
  });
  $('#endTime input').each(function () {
    var idet = $(this).attr('data-id');
    $('input#updateTimeEnd' + idet).datetimepicker({
      format: 'LT'
    });
  });
  $('.btnConfirmUpdateInterview').click(function () {
    var id = $(this).attr('data-id');
    event.preventDefault();
    Swal.fire('SUCCESS', 'Saved changes', 'success').then(function (isUpdate) {
      $('#updateInterviewForm' + id).submit();
    });
  });
  $('#selectAll').on('click', function (e) {
    if ($(this).is(':checked', true)) {
      $(".sub_chk").prop('checked', true);
    } else {
      $(".sub_chk").prop('checked', false);
    }
  });
  $('.btnMassDelete').on('click', function (e) {
    var _this = this;

    var allVals = [];
    $(".sub_chk:checked").each(function () {
      allVals.push($(this).attr('data-id'));
    });

    if (allVals.length <= 0) {
      Swal.fire("Please select Applicants", "", "error");
    } else {
      console.log(allVals);
      Swal.fire({
        title: 'DELETE CONFIRMATION',
        text: 'You are about to delete an applicant/s',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'CONFIRM'
      }).then(function (result) {
        if (result.value) {
          var join_selected_values = allVals.join(",");
          $.ajax({
            url: $(_this).data('url'),
            type: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: 'ids=' + join_selected_values,
            success: function success(data) {
              if (data['success']) {
                $(".sub_chk:checked").each(function () {
                  $(this).parents("tr").remove();
                });
                Swal.fire('', data['success'], 'success').then(function (isOkay) {
                  location.reload();
                });
              } else if (data['error']) {
                alert(data['error']);
              } else {
                alert('Whoops Something went wrong!!');
              }
            },
            error: function error(data) {
              alert(data.responseText);
            }
          });
          $.each(allVals, function (index, value) {
            $('table tr').filter("[data-row-id='" + value + "']").remove();
          });
        }
      });
    }
  });
});
$('#setJobOffer1').on('show.bs.modal', function (e) {
  var app = $(e.relatedTarget).data('applicantid');
  $(this).find('.modal-body #applicantId').val(app);
});
$('#setJobOffer1').on('show.bs.modal', function (e) {
  var _int = $(e.relatedTarget).data('interviewid');

  $(this).find('.modal-body #interviewId').val(_int);
});
$('#setJobOffer1').on('show.bs.modal', function (e) {
  var job = $(e.relatedTarget).data('jobpostid');
  $(this).find('.modal-body #jobPostId').val(job);
});
$('#setJobOffer1').on('show.bs.modal', function (e) {
  var fname = $(e.relatedTarget).data('fname');
  $(this).find('.modal-header #firstName').text(fname);
});
$('#setJobOffer1').on('show.bs.modal', function (e) {
  var lname = $(e.relatedTarget).data('lname');
  $(this).find('.modal-header #lastName').text(lname);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var app = $(e.relatedTarget).data('applicantid');
  $(this).find('.modal-body #applicant_id').val(app);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var _int2 = $(e.relatedTarget).data('interviewid');

  $(this).find('.modal-body #interview_id').val(_int2);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var job = $(e.relatedTarget).data('jobpostid');
  $(this).find('.modal-body #job_post_id').val(job);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var fname = $(e.relatedTarget).data('interviewfname');
  $(this).find('.modal-header #applicantModalLabel').text(fname);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var lname = $(e.relatedTarget).data('interviewlname');
  $(this).find('.modal-header #applicantModalLabelLast').text(lname);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var email = $(e.relatedTarget).data('email');
  $(this).find('.modal-body #email').text(email);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var contactno = $(e.relatedTarget).data('contactno');
  $(this).find('.modal-body #contact_no').text(contactno);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var expsal = $(e.relatedTarget).data('expsal');
  $(this).find('.modal-body #expected_salary').text(expsal);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var school = $(e.relatedTarget).data('school');
  $(this).find('.modal-body #school').text(school);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var datefrom = $(e.relatedTarget).data('datefrom');
  $(this).find('.modal-body #dateFrom').text(datefrom);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var dateto = $(e.relatedTarget).data('dateto');
  $(this).find('.modal-body #dateTo').text(dateto);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var prevcompany = $(e.relatedTarget).data('company');
  $(this).find('.modal-body #company').text(prevcompany);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var jobtitle = $(e.relatedTarget).data('jobtitle');
  $(this).find('.modal-body #jobTitle').text(jobtitle);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var datebegin = $(e.relatedTarget).data('datebegin');
  $(this).find('.modal-body #datebegin').text(datebegin);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var dateend = $(e.relatedTarget).data('dateend');
  $(this).find('.modal-body #dateend').text(dateend);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var salary = $(e.relatedTarget).data('salary');
  $(this).find('.modal-body #salary').text(salary);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var intstatus = $(e.relatedTarget).data('intstatus');
  $(this).find('.modal-body #interviewStatus').text(intstatus);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var intresult = $(e.relatedTarget).data('intresult');
  $(this).find('.modal-body #interviewResult').text(intresult);
});
$('#viewInterviewProfile').on('show.bs.modal', function (e) {
  var skill = $(e.relatedTarget).data('skills');
  $(this).find('.modal-body #skills').text(skill);
});
$(".updateInterviewForm").submit(function (e) {
  var checkEmptyInput = $(this).find("input[type=text]:visible").filter(function () {
    if ($(this).val() == "") return $(this);
  }).length;

  if (checkEmptyInput > 0) {
    e.preventDefault();
    Swal.fire({
      title: 'Please complete the fields',
      icon: 'info'
    });
    $(this).find("input[type=text]:visible").filter(function () {
      if ($(this).val() == "") return $(this);
    })[0].focus();
    return false;
  }
});
$("#btnSetJobOffer").on('click', function (e) {
  e.preventDefault();
  var checkEmptyInput1 = $('#setJobOfferForm').find("input[type=text]:visible,textarea:visible").filter(function () {
    if ($(this).val() == "") return $(this);
  }).length;

  if (checkEmptyInput1 > 0) {
    Swal.fire({
      title: 'Please complete the fields',
      icon: 'info'
    });
    $('#setJobOfferForm').find("input[type=text]:visible,textarea:visible").filter(function () {
      if ($(this).val() == "") return $(this);
    })[0].focus();
  } else {
    Swal.fire('Success', 'Job offer sent!', 'success').then(function (isOkay) {
      $('#setJobOfferForm').submit();
    });
  }
});

/***/ }),

/***/ 26:
/*!************************************************************!*\
  !*** multi ./resources/js/employer/applicant_interview.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/employer/applicant_interview.js */"./resources/js/employer/applicant_interview.js");


/***/ })

/******/ });