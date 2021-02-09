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
/******/ 	return __webpack_require__(__webpack_require__.s = 36);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/employer/job_post.js":
/*!*******************************************!*\
  !*** ./resources/js/employer/job_post.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#jobPost').DataTable({
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
// DELETE MODAL

$(".btnDeleteJobPost").click(function (event) {
  var id = $(this).attr('data-id');
  var title = $(this).attr('data-title');
  event.preventDefault();
  Swal.fire({
    title: 'DELETE CONFIRMATION',
    text: 'You are about to delete a job post - ' + title,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#28A745',
    cancelButtonColor: '#d33',
    confirmButtonText: 'CONFIRM'
  }).then(function (result) {
    if (result.value) {
      Swal.fire('DELETED', 'Job post deleted', 'success').then(function (isOkay) {
        $('#deleteJobPost' + id).submit();
      });
    }
  });
}); // end DELETE MODAL

$('#job-post').addClass('active');
$('#viewJobPost').on('show.bs.modal', function (e) {
  var title = $(e.relatedTarget).data('jobposttitle');
  $(this).find('.modal-body #job_title').val(title);
});
$('#viewJobPost').on('show.bs.modal', function (e) {
  var type = $(e.relatedTarget).data('emptype');
  $(this).find('.modal-body #employment_type').val(type);
});
$('#viewJobPost').on('show.bs.modal', function (e) {
  var poslevel = $(e.relatedTarget).data('poslevel');
  $(this).find('.modal-body #position_level').val(poslevel);
});
$('#viewJobPost').on('show.bs.modal', function (e) {
  var jobspec = $(e.relatedTarget).data('jobspec');
  $(this).find('.modal-body #job_specialization').val(jobspec);
});
$('#viewJobPost').on('show.bs.modal', function (e) {
  var jobloc = $(e.relatedTarget).data('joblocation');
  $(this).find('.modal-body #job_location').val(jobloc);
});
$('#viewJobPost').on('show.bs.modal', function (e) {
  var educlevel = $(e.relatedTarget).data('educlevel');
  $(this).find('.modal-body #educ_level').val(educlevel);
});
$('#viewJobPost').on('show.bs.modal', function (e) {
  var yrsexp = $(e.relatedTarget).data('yrsexp');
  $(this).find('.modal-body #yrs_exp').val(yrsexp);
});
$('#viewJobPost').on('show.bs.modal', function (e) {
  var skill = $(e.relatedTarget).data('skill');
  $(this).find('.modal-body #skill').val(skill);
});
$('#viewJobPost').on('show.bs.modal', function (e) {
  var recperiod = $(e.relatedTarget).data('recperiod');
  $(this).find('.modal-body #rec_period').val(recperiod);
});
$('#viewJobPost').on('show.bs.modal', function (e) {
  var salmin = $(e.relatedTarget).data('salmin');
  $(this).find('.modal-body #salmin').val(salmin);
});
$('#viewJobPost').on('show.bs.modal', function (e) {
  var salmax = $(e.relatedTarget).data('salmax');
  $(this).find('.modal-body #salmax').val(salmax);
});
$('#viewJobPost').on('show.bs.modal', function (e) {
  var desc = $(e.relatedTarget).data('desc');
  $(this).find('.modal-body #desc').val(desc);
});
$('#job_title').attr('disabled', true);
$('#employment_type').attr('disabled', true);
$('#position_level').attr('disabled', true);
$('#job_specialization').attr('disabled', true);
$('#job_location').attr('disabled', true);
$('#educ_level').attr('disabled', true);
$('#yrs_exp').attr('disabled', true);
$('#skill').attr('disabled', true);
$('#rec_period').attr('disabled', true);
$('#salmin').attr('disabled', true);
$('#salmax').attr('disabled', true);
$(document).ready(function () {
  $('#selectAll').on('click', function (e) {
    if ($(this).is(':checked', true)) {
      $(".sub_chk").prop('checked', true);
    } else {
      $(".sub_chk").prop('checked', false);
    }
  });
  $('.delete_all').on('click', function (e) {
    var _this = this;

    var allVals = [];
    $(".sub_chk:checked").each(function () {
      allVals.push($(this).attr('data-id'));
    });

    if (allVals.length <= 0) {
      Swal.fire("Please select Job Post", "", "error");
    } else {
      console.log(allVals); //var check = confirm("Are you sure you want to delete this row?"); 

      Swal.fire({
        title: 'DELETE CONFIRMATION',
        text: 'You are about to delete a job post/s',
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

/***/ }),

/***/ 36:
/*!*************************************************!*\
  !*** multi ./resources/js/employer/job_post.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/employer/job_post.js */"./resources/js/employer/job_post.js");


/***/ })

/******/ });