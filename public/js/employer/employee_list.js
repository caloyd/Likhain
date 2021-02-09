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
/******/ 	return __webpack_require__(__webpack_require__.s = 33);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/employer/employee_list.js":
/*!************************************************!*\
  !*** ./resources/js/employer/employee_list.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#employeeListTbl').DataTable({
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
// SINGLE DELETE EMPLOYEE

$('.btnEmployeeDelete').click(function (e) {
  var id = $(this).attr('data-id');
  e.preventDefault();
  Swal.fire({
    title: 'Are you sure?',
    text: "You are about to delete an employee.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#c2c2c2',
    confirmButtonText: 'Delete'
  }).then(function (result) {
    if (result.value) {
      Swal.fire('DELETED!', 'Employee records has been deleted.', 'success').then(function (isOkay) {
        $('#deleteEmpForm' + id).submit();
      });
    }
  });
}); // end SINGLE DELETE EMPLOYEE 
// MULTIPLE DELETE EMPLOYEE

$(document).ready(function () {
  $('#selectAll').on('click', function (e) {
    if ($(this).is(':checked', true)) {
      $(".sub_chk").prop('checked', true);
    } else {
      $(".sub_chk").prop('checked', false);
    }
  });
  $('.btnEmployeeMultipleDelete').on('click', function (e) {
    var _this = this;

    var allVals = [];
    $(".sub_chk:checked").each(function () {
      allVals.push($(this).attr('data-id'));
    });

    if (allVals.length <= 0) {
      Swal.fire("Please select an Employee", "", "error");
    } else {
      console.log(allVals); //var check = confirm("Are you sure you want to delete this row?"); 

      Swal.fire({
        title: 'DELETE CONFIRMATION',
        text: 'You are about to delete an Employee/s',
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
}); // end MULTIPLE DELETE EMPLOYEE
// CONFIRM ADD EMPLOYEE

$('#btnConfirmAddEmployee').on('click', function (e) {
  e.preventDefault();
  var checkEmptyInput1 = $('#addEmployeeForm').find("input[type=text]:visible,input[type=number]:visible,input[type=email]:visible,input[type=password]:visible").filter(function () {
    if ($(this).val() == "") return $(this);
  }).length;

  if (checkEmptyInput1 > 0) {
    e.preventDefault();
    Swal.fire({
      title: 'Please complete the fields',
      icon: 'info'
    });
    $('#addEmployeeForm').find("input[type=text]:visible,input[type=number]:visible,input[type=email]:visible,input[type=password]:visible").filter(function () {
      if ($(this).val() == "") return $(this);
    })[0].focus();
  } else {
    Swal.fire({
      title: 'ADDED!',
      text: "Employee added to records",
      icon: 'success'
    }).then(function (submit) {
      $('#addEmployeeForm').submit();
    });
  }
}); // end CONFIRM ADD EMPLOYEE

$('#menu-sidebar').addClass('menu-open');
$('#employee').addClass('active');
$('#employee-list').addClass('active');
$('#employmentDate').datetimepicker({
  format: 'L'
});
$('#viewEmployeeModal').on('show.bs.modal', function (e) {
  var fname = $(e.relatedTarget).data('fname');
  $(this).find('.modal-body #firstName').text(fname);
});
$('#viewEmployeeModal').on('show.bs.modal', function (e) {
  var mname = $(e.relatedTarget).data('mname');
  $(this).find('.modal-body #middleName').text(mname);
});
$('#viewEmployeeModal').on('show.bs.modal', function (e) {
  var lname = $(e.relatedTarget).data('lname');
  $(this).find('.modal-body #lastName').text(lname);
});
$('#viewEmployeeModal').on('show.bs.modal', function (e) {
  var jobpos = $(e.relatedTarget).data('jobpos');
  $(this).find('.modal-body #jobPosition').text(jobpos);
});
$('#viewEmployeeModal').on('show.bs.modal', function (e) {
  var empdate = $(e.relatedTarget).data('empdate');
  $(this).find('.modal-body #hireDate').text(empdate);
});
$('#viewEmployeeModal').on('show.bs.modal', function (e) {
  var address = $(e.relatedTarget).data('address');
  $(this).find('.modal-body #address').text(address);
});
$('#viewEmployeeModal').on('show.bs.modal', function (e) {
  var contact = $(e.relatedTarget).data('contactnumber');
  $(this).find('.modal-body #contactNumber').text(contact);
});
$('#viewEmployeeModal').on('show.bs.modal', function (e) {
  var salary = $(e.relatedTarget).data('salary');
  $(this).find('.modal-body #salaryAmount').text(salary);
});

/***/ }),

/***/ 33:
/*!******************************************************!*\
  !*** multi ./resources/js/employer/employee_list.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/employer/employee_list.js */"./resources/js/employer/employee_list.js");


/***/ })

/******/ });