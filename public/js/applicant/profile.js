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
/******/ 	return __webpack_require__(__webpack_require__.s = 15);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/applicant/profile.js":
/*!*******************************************!*\
  !*** ./resources/js/applicant/profile.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Profile Blade
// add skill
var counter = 0;
$("#btnAddSkill").click(function () {
  if ($('#skillName').val() == '') {
    Swal.fire("Please input a skill", "", "error");
  } else {
    counter++;
    var years_exp = ['0 - 2', '2 - 3', '3 - 5', '5 - 8', '8 - 10'];
    var skill = $("#skillName").val();
    var html = '';
    html += '<div class="row my-3 show" id="rmsk' + counter + '"><div class="col-md-3"><label id="sklnm' + counter + '" skill-id="' + counter + '">' + skill + '</label></div><div class="col-md-3 w-50"><select id="yearsExp' + counter + '" class="form-control">';

    for (var i = 0; i < years_exp.length; i++) {
      html += '<option value="' + years_exp[i] + '">' + years_exp[i] + ' Years of Experience</option>';
    }

    html += '</select></div><div class="col-md-1 mt-1"><button type="button" class="btn btn-sm btn-danger rmSkill" data-id="rmsk' + counter + '"><i class="fas fa-times"></i></button></div></div>';
    $("#skill").append(html);
    $("#skillName").val("");
  }
}); // applicant preview template

$(document).ready(function () {
  $('.changeTemplate').click(function () {
    var id = $(this).data('id');
    $('.template').addClass('d-none');
    $('#' + id).removeClass('d-none');
  });
  $('#check1').click(function () {
    $('.gender').toggleClass('d-none');
  });
  $('#check2').click(function () {
    $('.birthdate').toggleClass('d-none');
  });
  $('#btnAddEduc').click(function () {
    $(this).addClass('d-none');
    $('.shw-education').addClass('d-none');
    $('#newEducation').removeClass('d-none');
  });
  $(document).on('click', '#btnAddSalary', function () {
    $(this).addClass('d-none'); // $('.shw-salary').addClass('d-none');

    $('#newSalary').removeClass('d-none');
  });
  $('#btnAddWorkExp').click(function () {
    $(this).addClass('d-none');
    $('.shw-workexp').addClass('d-none');
    $('#newWorkExp').removeClass('d-none');
  }); // SALARY REGEX

  function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
      textbox.addEventListener(event, function () {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
          this.value = "";
        }
      });
    });
  } //end SALARY REGEX 

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
  }); // ADD EDUCATION DATE RANGE

  $('#startDate').datetimepicker({
    format: 'Y-m-d',
    timepicker: false,
    onShow: function onShow(ct) {
      this.setOptions({
        maxDate: $('#endDate').val() ? jQuery('#endDate').val() : false
      });
    }
  });
  $('#endDate').datetimepicker({
    format: 'Y-m-d',
    timepicker: false,
    onShow: function onShow(ct) {
      this.setOptions({
        minDate: $('#startDate').val() ? jQuery('#startDate').val() : false
      });
    }
  }); // end ADD EDUCATION DATE RANGE
  // ADD WORK EXP DATE RANGE

  $('#workStartDate').datetimepicker({
    format: 'Y-m-d',
    timepicker: false,
    onShow: function onShow(ct) {
      this.setOptions({
        maxDate: $('#workEndDate').val() ? jQuery('#workEndDate').val() : false
      });
    }
  });
  $('#workEndDate').datetimepicker({
    format: 'Y-m-d',
    timepicker: false,
    onShow: function onShow(ct) {
      this.setOptions({
        minDate: $('#workStartDate').val() ? jQuery('#workStartDate').val() : false
      });
    }
  }); // end ADD WORK EXP DATE RANGE
  // UPDATE EDUCATION DATE RANGE

  $('#date input').each(function () {
    var id = $(this).attr('data-id');
    $('input#newStartDate' + id).datetimepicker({
      format: 'Y/m/d',
      timepicker: false,
      onShow: function onShow(ct) {
        this.setOptions({
          maxDate: $('#newEndDate' + id).val() ? jQuery('#newEndDate' + id).val() : false
        });
      }
    });
    $('input#newEndDate' + id).datetimepicker({
      format: 'Y/m/d',
      timepicker: false,
      onShow: function onShow(ct) {
        this.setOptions({
          minDate: $('#newStartDate' + id).val() ? jQuery('#newStartDate' + id).val() : false
        });
      }
    });
  }); // end UPDATE EDUCATION DATE RANGE
  // UPDATE WORK EXP DATE RANGE

  $('#workDate input').each(function () {
    var id = $(this).attr('data-id');
    $('input#workNewStartDate' + id).datetimepicker({
      format: 'Y/m/d',
      timepicker: false,
      onShow: function onShow(ct) {
        this.setOptions({
          maxDate: $('#workNewEndDate' + id).val() ? jQuery('#workNewEndDate' + id).val() : false
        });
      }
    });
    $('input#workNewEndDate' + id).datetimepicker({
      format: 'Y-m-d',
      timepicker: false,
      onShow: function onShow(ct) {
        this.setOptions({
          minDate: $('#workNewStartDate' + id).val() ? jQuery('#workNewStartDate' + id).val() : false
        });
      }
    });
  }); // end UPDATE WORK EXP DATE RANGE
});
setTimeout(function () {
  $('#divUploaded').fadeOut('fast');
}, 5000);
$('#profile').addClass('active');

/***/ }),

/***/ 15:
/*!*************************************************!*\
  !*** multi ./resources/js/applicant/profile.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/applicant/profile.js */"./resources/js/applicant/profile.js");


/***/ })

/******/ });