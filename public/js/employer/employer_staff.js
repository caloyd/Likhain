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
/******/ 	return __webpack_require__(__webpack_require__.s = 34);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/employer/employer_staff.js":
/*!*************************************************!*\
  !*** ./resources/js/employer/employer_staff.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#employerStaff').DataTable({
    "fnDrawCallback": function fnDrawCallback(oSettings) {
      var totalPages = this.api().page.info().pages;

      if (totalPages <= 1) {
        jQuery('.dataTables_paginate').hide();
      } else {
        jQuery('.dataTables_paginate').show();
      }
    }
  });
});
$("#createdStaffBtn").click(function (e) {
  e.preventDefault();
  var checkEmptyInput1 = $('#createStaffForm').find("input[type=text]:visible,input[type=email]:visible,input[type=password]:visible").filter(function () {
    if ($(this).val() == "") return $(this);
  }).length;

  if (checkEmptyInput1 > 0) {
    e.preventDefault();
    Swal.fire({
      title: 'Please complete the fields',
      icon: 'info'
    });
    $('#createStaffForm').find("input[type=text]:visible,input[type=email]:visible,input[type=password]:visible").filter(function () {
      if ($(this).val() == "") return $(this);
    })[0].focus(); // return false;
  } else {
    Swal.fire({
      title: 'SUCCESS',
      text: "Staff added to records",
      icon: 'success'
    }).then(function (okay) {
      $('#createStaffForm').submit();
    });
  }
}); // Modal

$(".btnDeleteStaff").click(function (e) {
  var id = $(this).attr('data-id');
  e.preventDefault();
  Swal.fire({
    title: 'DELETE STAFF ACCOUNT',
    text: 'Are you sure you want to delete staff account/s?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#28A745',
    cancelButtonColor: '#d33',
    confirmButtonText: 'CONFIRM'
  }).then(function (result) {
    if (result.value) {
      Swal.fire('DELETED', 'Applicant deleted', 'success').then(function (isOkay) {
        $('#deleteStaffForm' + id).submit();
      });
    }
  });
});
$("#promoteStaff,#promoteStaff2").click(function () {
  Swal.fire({
    title: 'PROMOTE STAFF ACCOUNT',
    text: 'Do you really want to promote this staff account/s?',
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#28A745',
    cancelButtonColor: '#d33',
    confirmButtonText: 'CONFIRM'
  }).then(function (result) {
    if (result.value) {
      Swal.fire('SUCCESS', 'Staff promoted to Admin', 'success');
    }
  });
});
$(document).ready(function () {
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
      Swal.fire("Please select Staff", "", "error");
    } else {
      console.log(allVals);
      Swal.fire({
        title: 'DELETE CONFIRMATION',
        text: 'You are about to delete a Staff/s',
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
}); // end Modal

$('#employer-list').addClass('active');
$('#viewProfileStaff').on('show.bs.modal', function (e) {
  var fname = $(e.relatedTarget).data('fname');
  $(this).find('.modal-body #firstName').text(fname);
});
$('#viewProfileStaff').on('show.bs.modal', function (e) {
  var mname = $(e.relatedTarget).data('mname');
  $(this).find('.modal-body #middleName').text(mname);
});
$('#viewProfileStaff').on('show.bs.modal', function (e) {
  var lname = $(e.relatedTarget).data('lname');
  $(this).find('.modal-body #lastName').text(lname);
});
$('#viewProfileStaff').on('show.bs.modal', function (e) {
  var email = $(e.relatedTarget).data('email');
  $(this).find('.modal-body #email').text(email);
});

/***/ }),

/***/ 34:
/*!*******************************************************!*\
  !*** multi ./resources/js/employer/employer_staff.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/employer/employer_staff.js */"./resources/js/employer/employer_staff.js");


/***/ })

/******/ });