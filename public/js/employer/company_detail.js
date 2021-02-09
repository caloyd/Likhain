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
/******/ 	return __webpack_require__(__webpack_require__.s = 29);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/employer/company_detail.js":
/*!*************************************************!*\
  !*** ./resources/js/employer/company_detail.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#companyPostalCode').mask('0000', {
    'translation': {
      0: {
        pattern: /[0-9*]/
      }
    }
  });
  $('#contactNumber').mask('0000-000-0000', {
    'translation': {
      0: {
        pattern: /[0-9*]/
      }
    }
  });

        var videoURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.video').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
    }
    $(".video-upload").on('change', function(){
        videoURL(this);
        });

    $('#industry').select2({
        theme: 'bootstrap4',
        placeholder: "Select industry"
    })

    $('#companyCity').select2({
        theme: 'bootstrap4',
        placeholder: "Select City"
    })

    $('#companyCountry').select2({
        theme: 'bootstrap4',
        placeholder: "Select Country"
    })

    $('#country').select2({
        theme: 'bootstrap4'
    })

    $('#dressCode').select2({
        theme: 'bootstrap4',
        placeholder: "Dress code"
    })

    $('#companySize').select2({
        theme: 'bootstrap4',
        placeholder: "Company Size"
    })

    $('#workingHours').select2({
        theme: 'bootstrap4',
        placeholder: "Working Hours"
    })

    $('#workingHours').change(function(){
        var workHours = $('#workingHours').val();
        console.log(workHours);

        if(workHours == 'Others'){
            $('#txtWorkHours').removeClass('d-none');
        }else{
            $('#txtWorkHours').addClass('d-none');
        }
    });
    var readURL = function(input) {
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
  });
  $('#industry').select2({
    theme: 'bootstrap4',
    placeholder: "Select industry"
  });
  $('#companyCity').select2({
    theme: 'bootstrap4',
    placeholder: "Select City"
  });
  $('#companyCountry').select2({
    theme: 'bootstrap4',
    placeholder: "Select Country"
  });
  $('#country').select2({
    theme: 'bootstrap4'
  });
  $('#dressCode').select2({
    theme: 'bootstrap4',
    placeholder: "Dress code"
  });
  $('#companySize').select2({
    theme: 'bootstrap4',
    placeholder: "Company Size"
  });
  $('#workingHours').select2({
    theme: 'bootstrap4',
    placeholder: "Working Hours"
  });
  $('#workingHours').change(function () {
    var workHours = $('#workingHours').val();
    console.log(workHours);

    if (workHours == 'Others') {
      $('#txtWorkHours').removeClass('d-none');
    } else {
      $('#txtWorkHours').addClass('d-none');
    }
  });
  $('#benefits').select2({
    theme: 'bootstrap4',
    placeholder: "Benefits"
  });
  $('#benefits').select2({
    theme: 'bootstrap4',
    placeholder: "Benefits",
    tags: true,
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
    }
  });
  $('#spoken-language').select2({
    theme: 'bootstrap4',
    placeholder: "Spoken Language"
  });
  $('#btnCancelCompanyDetails').click(function () {
    $('.form-control').val("");
  });
  $('#accnt-sidebar').addClass('menu-open');
  $('#accnt-sett').addClass('active');
  $('#company-details').addClass('active');
});
$(function () {
  $("#fullLocation").attr('readonly', 'readonly');
  $('#fullLocation').val($('#companyCity option:selected').val() + ' ' + $('#companyCountry').val());
  $('#fullLocation').val($('#companyCity option:selected').val() + ' ' + $('#companyCountry').val());
  $('#companyCity, #companyCountry').bind('change keyup keydown', function () {
    $('#fullLocation').val($('#companyCity option:selected').text() + ',' + $('#companyCountry').val());
  });
});
$("#btnSaveCompanyDetails").on('click', function (e) {
  e.preventDefault();
  var checkEmptyInput = $('#companyDetailsForm').find("input[type=text]:visible,textarea:visible").filter(function () {
    if ($(this).val() == "") return $(this);
  }).length;

  if (checkEmptyInput > 0) {
    Swal.fire({
      title: 'Please complete the fields',
      icon: 'info'
    });
    $('#companyDetailsForm').find("input[type=text]:visible,textarea:visible").filter(function () {
      if ($(this).val() == "") return $(this);
    })[0].focus();
  } else {
    Swal.fire({
      title: 'Are you sure?',
      text: "You are about to save changes of company details",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#c2c2c2',
      confirmButtonText: 'Yes'
    }).then(function (result) {
      if (result.value) {
        Swal.fire('SAVED!', 'Successfully saved changes', 'success').then(function (isOkay) {
          $('#companyDetailsForm').submit();
        });
      }
    });
    var tato = $("#benefits").val();
    console.warn(tato);
    var tatoes = tato.join(", ");
    console.info(tatoes);
    var tatos = $('#outputBenefits').append(tatoes);
    console.log(tatos);
    var lang = $('#spoken-language').val();
    console.log(lang);
    var langs = lang.join(", ");
    console.log(langs);
    var language = $('#outputLanguage').append(langs);
  }
});

/***/ }),

/***/ 29:
/*!*******************************************************!*\
  !*** multi ./resources/js/employer/company_detail.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/employer/company_detail.js */"./resources/js/employer/company_detail.js");


/***/ })

/******/ });