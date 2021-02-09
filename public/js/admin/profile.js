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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/profile.js":
/*!***************************************!*\
  !*** ./resources/js/admin/profile.js ***!
  \***************************************/
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
  $('#accnt-sidebar').addClass('menu-open');
  $('#accnt-sett').addClass('active');
  $('#profile').addClass('active');
  $('#btnEdit').click(function () {
    $('#btnEdit').addClass('d-none');
    $('#viewProfile').addClass('d-none');
    $('#btnSave, #btnCancel').removeClass('d-none');
    $('#profilePic').removeClass('d-none');
    $('input[name=firstName],input[name=lastName],input[name=email],input[name=contactNumber]').removeAttr('disabled');
  });
  $('#btnCancel').click(function () {
    $('#btnEdit').removeClass('d-none');
    $('#btnSave, #btnCancel').addClass('d-none');
    $('#profilePic').addClass('d-none');
    $('#viewProfile').removeClass('d-none');
    $('input[name=firstName],input[name=lastName],input[name=email],input[name=contactNumber]').attr('disabled', true);
  });
  $('#btnSave').click(function () {
    event.preventDefault();
    Swal.fire({
      title: 'Are you sure?',
      text: "You are about to edit your profile",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#c2c2c2',
      confirmButtonText: 'CONFIRM'
    }).then(function (result) {
      if (result.value) {
        Swal.fire('SUCCESS', 'Your profile has been updated.', 'success').then(function (isOkay) {
          $('#profileForm').submit();
        });
      }

      $('#btnEdit').removeClass('d-none');
      $('#btnSave, #btnCancel').addClass('d-none');
      $('input[name=firstName],input[name=lastName],input[name=email],input[name=address],input[name=contactNumber]').attr('disabled', true);
    });
  });
  $(document).ready(function () {
    var readURL = function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('.profile-pic').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    };

    $(".file-upload").on('change', function () {
      readURL(this);
      $('#btnSaveImage').removeClass('d-none');
    });
    $(".upload-button").on('click', function () {
      $(".file-upload").click();
    });
  });
});

/***/ }),

/***/ 6:
/*!*********************************************!*\
  !*** multi ./resources/js/admin/profile.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/admin/profile.js */"./resources/js/admin/profile.js");


/***/ })

/******/ });