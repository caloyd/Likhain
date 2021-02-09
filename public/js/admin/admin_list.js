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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/admin_list.js":
/*!******************************************!*\
  !*** ./resources/js/admin/admin_list.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#contactNumber').mask('0000-000-0000', {
    'translation': {
      0: {
        pattern: /[0-9*]/
      }
    }
  });
  $('#admin-list').addClass('active');
  $('#adminList').DataTable({
    "fnDrawCallback": function fnDrawCallback(oSettings) {
      var totalPages = this.api().page.info().pages;

      if (totalPages <= 1) {
        jQuery('.dataTables_paginate').hide();
      } else {
        jQuery('.dataTables_paginate').show();
      }
    }
  }); // $("#btnPromoteAdmin").click(function(){
  //     Swal.fire({
  //     title: 'PROMOTE',
  //     text: 'You are about to promote this admin.', 
  //     icon: 'info',
  //     showCancelButton: true,
  //     cancelButtonColor: '#d33'
  //     }).then((result) => {
  //         if (result.value) {
  //         Swal.fire(                      
  //             'PROMOTED',
  //             'Admin account promoted.',
  //             'success'                        
  //             )
  //         }
  //     })   
  // });

  $(".btnDeleteAdmin").click(function (e) {
    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');
    e.preventDefault();
    Swal.fire({
      title: 'DELETE ' + name + ' ACCOUNT',
      text: 'You are about to delete ' + name + ' this cannot be undone!',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonColor: '#d33'
    }).then(function (result) {
      if (result.value) {
        Swal.fire('DELETED', 'Admin account deleted', 'success').then(function (submit) {
          $('#deleteAdminForm' + id).submit();
        });
      }
    });
  });
  $("#btnCreateAdmin").on('click', function (e) {
    e.preventDefault();
    var checkEmptyInput = $('#addAdminForm').find("input[type=text]:visible,input[type=email]:visible,input[type=password]:visible").filter(function () {
      if ($(this).val() == "") return $(this);
    }).length;

    if (checkEmptyInput > 0) {
      Swal.fire({
        title: 'Please complete the fields',
        icon: 'info'
      });
      $('#addAdminForm').find("input[type=text]:visible,input[type=email]:visible,input[type=password]:visible").filter(function () {
        if ($(this).val() == "") return $(this);
      })[0].focus();
    } else {
      Swal.fire('SUCCESS!', 'Admin Created!', 'success').then(function (isOkay) {
        $('#addAdminForm').submit();
      });
    }
  }); // Checkbox

  $("#selectAll").change(function () {
    //"select all" change 
    $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status 
  });
  $('.checkbox').change(function () {
    //uncheck "select all", if one of the listed checkbox item is unchecked 
    if (false == $(this).prop("checked")) {
      //if this item is unchecked
      $("#selectAll").prop('checked', false); //change "select all" checked status to false
    }

    if ($('.checkbox:checked').length == $('.checkbox').length) {
      //check "select all" if all checkbox items are checked
      $("#selectAll").prop('checked', true);
    }
  });
  $('#job-offers').addClass('active');
  $("#checkItem").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
  }); // end Checkbox

  $('#viewAdminModal').on('show.bs.modal', function (e) {
    var fname = $(e.relatedTarget).data('fname');
    $(this).find('.modal-body #firstName').text(fname);
  });
  $('#viewAdminModal').on('show.bs.modal', function (e) {
    var lname = $(e.relatedTarget).data('lname');
    $(this).find('.modal-body #lastName').text(lname);
  });
  $('#viewAdminModal').on('show.bs.modal', function (e) {
    var email = $(e.relatedTarget).data('email');
    $(this).find('.modal-body #email').text(email);
  });
  $('#viewAdminModal').on('show.bs.modal', function (e) {
    var contact = $(e.relatedTarget).data('contact');
    $(this).find('.modal-body #contact').text(contact);
  });
});

/***/ }),

/***/ 1:
/*!************************************************!*\
  !*** multi ./resources/js/admin/admin_list.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/admin/admin_list.js */"./resources/js/admin/admin_list.js");


/***/ })

/******/ });