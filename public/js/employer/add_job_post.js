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
/******/ 	return __webpack_require__(__webpack_require__.s = 24);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/employer/add_job_post.js":
/*!***********************************************!*\
  !*** ./resources/js/employer/add_job_post.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var prev_date = new Date();
prev_date.setDate(prev_date.getDate() - 1);
$('input[name="recPeriod"]').daterangepicker({
  "minDate": prev_date
});
$(function () {
  $("#fullLocation").attr('readonly', 'readonly');
  $('#fullLocation').val($('#jobLocationCity option:selected').val() + ' ' + $('#jobLocation').val());
  $('#fullLocation').val($('#jobLocation option:selected').val() + ' ' + $('#jobLocationCity').val());
  $('#jobLocationCity, #jobLocation').bind('change keyup keydown', function () {
    $('#fullLocation').val($('#jobLocationCity option:selected').text() + ' , ' + $('#jobLocation').val());
  });
});
$(document).ready(function () {
  $('#jobDetailsForm').on('submit', function (event) {
    event.preventDefault();
    var form = $(this);
    Swal.fire({
      title: 'Are you sure?',
      text: "You are about to save a Job Post",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#c2c2c2',
      confirmButtonText: 'Yes'
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          url: form.attr('action'),
          data: form.serialize(),
          type: 'POST',
          dataType: 'json',
          success: function success(response) {
            $('input[type="number"]').removeClass('is-invalid');
            $('span.invalid-feedback').html('');

            if (response.errors) {
              var err = Object.entries(response.errors);
              err.forEach(function (element) {
                $('#' + element[0]).addClass('is-invalid');
                var html = '<strong>' + element[1][0] + '</strong>';
                $('span#' + element[0]).html(html);
              });
            }

            if (response.success) {
              Swal.fire('', response.success, 'success').then(function (isOkay) {
                location.reload();
              });
            }
          }
        });
      }
    }); // FOR ECHO              

    var tato = $("#skills").val();
    console.warn(tato);
    var tatoes = tato.join(", ");
    console.info(tatoes);
    var tatos = $('#outputSkill').append(tatoes); // end FOR ECHO
  });
  $('#skills').select2({
    theme: 'bootstrap4',
    tags: true,
    // NEW TAG
    createTag: function createTag(params) {
      var term = $.trim(params.term);

      if (term === '') {
        return null;
      }

      return {
        id: term,
        text: term,
        newTag: true // add additional parameters

      };
    } // end NEW TAG

  });
});
$('#maximumSalary').keyup(function () {
  var max = parseInt($(this).val());
  var min = parseInt($('#minimumSalary').val());

  if (min > max) {
    $('#maxMsg').removeClass('d-none');
  } else {
    $('#maxMsg').addClass('d-none');
  }
});

/***/ }),

/***/ 24:
/*!*****************************************************!*\
  !*** multi ./resources/js/employer/add_job_post.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/employer/add_job_post.js */"./resources/js/employer/add_job_post.js");


/***/ })

/******/ });