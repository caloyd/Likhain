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
/******/ 	return __webpack_require__(__webpack_require__.s = 35);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/employer/job_offer.js":
/*!********************************************!*\
  !*** ./resources/js/employer/job_offer.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#jobOffersTbl').DataTable({
    "fnDrawCallback": function fnDrawCallback(oSettings) {
      var totalPages = this.api().page.info().pages;

      if (totalPages <= 1) {
        jQuery('.dataTables_paginate').hide();
      } else {
        jQuery('.dataTables_paginate').show();
      }
    }
  });
  $('#job-offers').addClass('active');
  $('.btnDelete').click(function (event) {
    var id = $(this).attr('data-id');
    event.preventDefault();
    Swal.fire({
      title: 'Are you sure?',
      text: "You are about to cancel Job offer.",
      icon: 'warning',
      showCancelButton: true,
      cancelButtonColor: '#c2c2c2'
    }).then(function (result) {
      if (result.value) {
        Swal.fire('DELETED', 'Job offer cancelled', 'success').then(function (isOkay) {
          $('#cancelJobOfferForm' + id).submit();
        });
      }
    });
  }); // $("#selectAll").change(function(){  
  //     $(".checkbox").prop('checked', $(this).prop("checked")); 
  // });
  // $('.checkbox').change(function(){ 
  //     if(false == $(this).prop("checked")){ 
  //         $("#selectAll").prop('checked', false); 
  //     }
  //     if ($('.checkbox:checked').length == $('.checkbox').length ){
  //         $("#selectAll").prop('checked', true);
  //     }
  // });

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
      Swal.fire("Please select an Applicant", "", "error");
    } else {
      console.log(allVals); //var check = confirm("Are you sure you want to delete this row?"); 

      Swal.fire({
        title: 'DELETE CONFIRMATION',
        text: 'You are about to delete an Applicant/s',
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
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var appfnameLabel = $(e.relatedTarget).data('applicantfirstname');
  $(this).find('.modal-header #applicantModalLabel').text(appfnameLabel);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var applnameLabel = $(e.relatedTarget).data('applicantlastname');
  $(this).find('.modal-header #applicantModalLabelLast').text(applnameLabel);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var appemail = $(e.relatedTarget).data('applicantemail');
  $(this).find('.modal-body #email').text(appemail);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var appcontactno = $(e.relatedTarget).data('applicantcontactno');
  $(this).find('.modal-body #contactNo').text(appcontactno);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var appexpsal = $(e.relatedTarget).data('applicantexpsal');
  $(this).find('.modal-body #expSalary').text(appexpsal);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var appschool = $(e.relatedTarget).data('applicantschool');
  $(this).find('.modal-body #school').text(appschool);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var appdatefrom = $(e.relatedTarget).data('applicantdatefrom');
  $(this).find('.modal-body #dateFrom').text(appdatefrom);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var appdateto = $(e.relatedTarget).data('applicantdateto');
  $(this).find('.modal-body #dateTo').text(appdateto);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var course = $(e.relatedTarget).data('course');
  $(this).find('.modal-body #course').text(course);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var educ = $(e.relatedTarget).data('educationattainment');
  $(this).find('.modal-body #educ').text(educ);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var jobtitle = $(e.relatedTarget).data('jobtitle');
  $(this).find('.modal-body #jobTitle').text(jobtitle);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var company = $(e.relatedTarget).data('company');
  $(this).find('.modal-body #companyName').text(company);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var begin = $(e.relatedTarget).data('begin');
  $(this).find('.modal-body #begin').text(begin);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var end = $(e.relatedTarget).data('end');
  $(this).find('.modal-body #end').text(end);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var salary = $(e.relatedTarget).data('salary');
  $(this).find('.modal-body #salary').text(salary);
});
$('#viewApplicantProfile').on('show.bs.modal', function (e) {
  var skill = $(e.relatedTarget).data('skills');
  $(this).find('.modal-body #skills').text(skill);
});

/***/ }),

/***/ 35:
/*!**************************************************!*\
  !*** multi ./resources/js/employer/job_offer.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/employer/job_offer.js */"./resources/js/employer/job_offer.js");


/***/ })

/******/ });