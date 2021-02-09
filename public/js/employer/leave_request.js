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
/******/ 	return __webpack_require__(__webpack_require__.s = 37);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/employer/leave_request.js":
/*!************************************************!*\
  !*** ./resources/js/employer/leave_request.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#leaveRequestTbl').DataTable({
    "fnDrawCallback": function fnDrawCallback(oSettings) {
      var totalPages = this.api().page.info().pages;

      if (totalPages <= 1) {
        jQuery('.dataTables_paginate').hide();
      } else {
        jQuery('.dataTables_paginate').show();
      }
    }
  });
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
// APPROVE LEAVE

$('.btnApproveLeave').click(function (e) {
  e.preventDefault();
  var id = $(this).attr('data-id');
  Swal.fire({
    title: 'Are you sure?',
    text: "You are about to approve a leave request",
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#28a745',
    cancelButtonColor: '#c2c2c2',
    confirmButtonText: 'CONFIRM'
  }).then(function (result) {
    if (result.value) {
      Swal.fire('APPROVED!', 'Employees leave request approved.', 'success').then(function (isOkay) {
        $('#approveForm' + id).submit();
      });
    }
  });
});
$('.btnApproveLeaveModal').click(function (e) {
  var id = $(this).attr('data-id');
  e.preventDefault();
  Swal.fire({
    title: 'Are you sure?',
    text: "You are about to approve a leave request",
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#28a745',
    cancelButtonColor: '#c2c2c2',
    confirmButtonText: 'CONFIRM'
  }).then(function (result) {
    if (result.value) {
      Swal.fire('APPROVED!', 'Employees leave request approved.', 'success').then(function (isOkay) {
        $('#approveFormModal' + id).submit();
      });
    }
  });
}); // end APPROVE LEAVE
// DENY LEAVE

$('.btnDenyLeave').click(function (e) {
  var id = $(this).attr('data-id');
  e.preventDefault();
  Swal.fire({
    title: 'Are you sure?',
    text: "You are about to deny leave request",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#c2c2c2',
    confirmButtonText: 'Deny'
  }).then(function (result) {
    if (result.value) {
      Swal.fire('DENIED!', 'Employee leave request has been denied.', 'success').then(function (isOkay) {
        $('#denyForm' + id).submit();
      });
    }
  });
});
$('.btnDenyLeaveModal').click(function (e) {
  var id = $(this).attr('data-id');
  e.preventDefault();
  Swal.fire({
    title: 'Are you sure?',
    text: "You are about to deny leave request",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#c2c2c2',
    confirmButtonText: 'DENY'
  }).then(function (result) {
    if (result.value) {
      Swal.fire('DENIED!', 'Employee leave request has been denied.', 'success').then(function (isOkay) {
        $('#denyFormModal' + id).submit();
      });
    }
  });
}); // end DENY LEAVE
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

$('#menu-sidebar').addClass('menu-open');
$('#employee').addClass('active');
$('#leave-req').addClass('active');
$('.leaveType').attr('disabled', true);
$('.startDate').attr('disabled', true);
$('.endDate').attr('disabled', true);
$('.leaveReason').attr('disabled', true);
$(document).ready(function () {
  $('#selectAll').on('click', function (e) {
    if ($(this).is(':checked', true)) {
      $(".sub_chk").prop('checked', true);
    } else {
      $(".sub_chk").prop('checked', false);
    }
  });
  $('.btnMultipleApproveLeave').on('click', function (e) {
    var _this = this;

    var allVals = [];
    $(".sub_chk:checked").each(function () {
      allVals.push($(this).attr('data-id'));
    });

    if (allVals.length <= 0) {
      Swal.fire("Please select Leave to approve", "", "error");
    } else {
      console.log(allVals);
      Swal.fire({
        title: 'Multiple Approve Request',
        text: 'You are about to approve leave request/s',
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'CONFIRM'
      }).then(function (result) {
        if (result.value) {
          var join_selected_values = allVals.join(",");
          $.ajax({
            url: $(_this).data('url'),
            type: 'PATCH',
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
  $('.btnMultipleDenyLeave').on('click', function (e) {
    var _this2 = this;

    var allVals = [];
    $(".sub_chk:checked").each(function () {
      allVals.push($(this).attr('data-id'));
    });

    if (allVals.length <= 0) {
      Swal.fire("Please select Leave to deny", "", "error");
    } else {
      console.log(allVals);
      Swal.fire({
        title: 'Multiple Deny Request',
        text: 'You are about to Deny leave request/s',
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#c2c2c2',
        confirmButtonText: 'CONFIRM'
      }).then(function (result) {
        if (result.value) {
          var join_selected_values = allVals.join(",");
          $.ajax({
            url: $(_this2).data('url'),
            type: 'PATCH',
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

/***/ }),

/***/ 37:
/*!******************************************************!*\
  !*** multi ./resources/js/employer/leave_request.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/employer/leave_request.js */"./resources/js/employer/leave_request.js");


/***/ })

/******/ });