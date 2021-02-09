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
/******/ 	return __webpack_require__(__webpack_require__.s = 11);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/applicant/dashboard.js":
/*!*********************************************!*\
  !*** ./resources/js/applicant/dashboard.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('#dashboard').addClass('active');
$(document).ready(function () {
  var searchJSON = {};
  fetchJobPosts(searchJSON);
  $(".filter").selectpicker({
    multiple: true,
    actionsBox: true
  }); // #filterLocation, #filterJobLevel, #filterEmploymentType, #filterJobFunction, #filterEducation, #filterCompany

  $('.filter').change(function () {
    $('#filterBadge').html('');
    var values = $('#filterLocation').val();
    var valuesJobLevel = $('#filterJobLevel').val();
    var valuesEmploymentType = $('#filterEmploymentType').val();
    var valuesJobFunction = $('#filterJobFunction').val();
    var valuesEducation = $('#filterEducation').val();
    var valuesCompany = $('#filterCompany').val();

    for (var i = 0; i < values.length; i += 1) {
      $('#filterBadge').append("<p class='removeable bg-tags align-middle p-2 rounded m-2 pointer'><span class='text-primary'>LOCATION: </span><span class='location'>" + values[i] + "</span> <i class='fas fa-times pointer'> </i> </p>");
    }

    for (var j = 0; j < valuesJobLevel.length; j += 1) {
      $('#filterBadge').append("<p class='job-level bg-tags align-middle p-2 rounded m-2 pointer'><span class='text-primary'>JOB POSITION: </span> <span class='jobLevel'>" + valuesJobLevel[j] + "</span> <i class='fas fa-times pointer'> </i> </p>");
    }

    for (var k = 0; k < valuesEmploymentType.length; k += 1) {
      $('#filterBadge').append("<p class='employment-type bg-tags align-middle p-2 rounded m-2 pointer'><span class='text-primary'>EMPLOYMENT TYPE: </span> <span class='employmentType'>" + valuesEmploymentType[k] + "</span> <i class='fas fa-times pointer'> </i> </p>");
    }

    for (var l = 0; l < valuesJobFunction.length; l += 1) {
      $('#filterBadge').append("<p class='job-function bg-tags align-middle p-2 rounded m-2 pointer'><span class='text-primary'>JOB FUNCTION: </span> <span class='jobFunction'>" + valuesJobFunction[l] + "</span> <i class='fas fa-times pointer'> </i> </p>");
    }

    for (var m = 0; m < valuesEducation.length; m += 1) {
      $('#filterBadge').append("<p class='education bg-tags align-middle p-2 rounded m-2 pointer'><span class='text-primary'>EDUCATION: </span> <span class='educationFilter'>" + valuesEducation[m] + "</span> <i class='fas fa-times pointer'> </i> </p>");
    }

    for (var n = 0; n < valuesCompany.length; n += 1) {
      var text = valuesCompany[n] == '0' ? 'Verified' : 'Unverified';
      $('#filterBadge').append("<p class='company bg-tags align-middle p-2 rounded m-2 pointer'><span class='text-primary'>COMPANY: </span> <span class='companyFilter'>" + text + "</span> <i class='fas fa-times pointer'> </i> </p>");
    } ////////////////////////
    // VALUES FOR FILTER //
    //////////////////////


    searchJSON.location = values;
    searchJSON.jobLevel = valuesJobLevel;
    searchJSON.employmentType = valuesEmploymentType;
    searchJSON.jobFunction = valuesJobFunction;
    searchJSON.education = valuesEducation;
    searchJSON.company = valuesCompany;
    console.log(searchJSON);
    fetchJobPosts(searchJSON); // console.log(searchJSON.location)
    // sessionStorage.setItem('search', JSON.stringify(searchJSON));
    // console.log(JSON.parse(sessionStorage.getItem('search')));
  });
  $(document).on('click', '.saveJobs', function () {
    var post_id = $(this).attr('id');
    Swal.fire({
      title: 'Are you sure',
      text: "You want to save this job?",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#c2c2c2',
      confirmButtonText: 'Yes'
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          url: '{{ URL("/add-save-job") }}/',
          data: {
            _token: '{{csrf_token()}}',
            post_id: post_id
          },
          type: 'POST',
          dataType: 'json',
          success: function success(response) {
            console.log(response);
            fetchJobPosts(searchJSON);

            if (response.saved) {
              Swal.fire({
                text: response.saved,
                icon: 'info'
              });
            }

            if (response.success) {
              Swal.fire('Saved!', response.success, 'success');
            }
          }
        });
      }
    });
  });

  function fetchJobPosts(search_data) {
    $.ajax({
      url: '{{ url("/advance-search") }}',
      data: search_data,
      type: 'GET',
      dataType: 'json',
      success: function success(data) {
        var html = '';
        data.forEach(function (item) {
          html += '<div class="card my-20"><div class="card-body"><div class="row"><div class="col-md-2 text-center">';

          if (item.company_logo_path) {
            html += '<img src="/' + item.company_logo_path + '" class="img-fluid" width="200" height="200"></div>';
          } else {
            html += '<img src="{{asset("img/companies/def-logo-company.png")}}" class="img-fluid" width="200" height="200"></div>';
          }

          html += '<div class="col-md-10"><h5 class="mb-0 searchKey"><strong>' + item.title + '</strong></h5><a href="/applicant/company-details/' + item.company_id + '"><p class="searchKey">' + item.company_name + '</a>';

          if (item.company_status == '0') {
            html += '<i class="fa fa-check-circle ml-2 text-success" title="Verified company"></i></p>';
          } else {
            html += '<br>' + item.address + '</p>';
          }

          html += '<p class="card-text searchKey">' + item.description + '</p></div></div><div class="modal-footer modified"><a href="/applicant/view-job-post/' + item.job_post_id + '" class="text-decoration-none text-white"><button type="button" class="btn btn-primary"><i class="fas fa-paper-plane mr-2"></i>View Details</button></a><button type="button" class="btn btn-info saveJobs" id="' + item.job_post_id + '"><i class="fas fa-bookmark mr-2"></i>Save</button></div></div></div>';
        });
        $('#posts').html(html);
      },
      error: function error(_error) {
        console.log(_error);
      }
    });
  } // REMOVE LOCATION


  $("#filterBadge").on('click', '.removeable', function () {
    $(this).remove(); //this removes the item from the screen

    var foo = $(this);
    $('#filterLocation').find('[value="' + foo.find('.location').html() + '"]').prop('selected', false);
    $values = $('#filterLocation').val();
    $('#filterLocation').selectpicker('deselectAll');
    $('#filterLocation').selectpicker('val', $values);
  }); // end REMOVE LOCATION
  // REMOVE JOB LEVEL

  $("#filterBadge").on('click', '.job-level', function () {
    $(this).remove(); //this removes the item from the screen

    var foo = $(this);
    $('#filterJobLevel').find('[value="' + foo.find('.jobLevel').html() + '"]').prop('selected', false);
    $values = $('#filterJobLevel').val();
    $('#filterJobLevel').selectpicker('deselectAll');
    $('#filterJobLevel').selectpicker('val', $values);
  }); // end REMOVE JOB LEVEL
  // REMOVE EMPLOYMENT TYPE

  $("#filterBadge").on('click', '.employment-type', function () {
    $(this).remove(); //this removes the item from the screen

    var foo = $(this);
    $('#filterEmploymentType').find('[value="' + foo.find('.employmentType').html() + '"]').prop('selected', false);
    $values = $('#filterEmploymentType').val();
    $('#filterEmploymentType').selectpicker('deselectAll');
    $('#filterEmploymentType').selectpicker('val', $values);
  }); // end REMOVE EMPLOYMENT TYPE
  // REMOVE JOB FUNCTION

  $("#filterBadge").on('click', '.job-function', function () {
    $(this).remove(); //this removes the item from the screen

    var foo = $(this);
    $('#filterJobFunction').find('[value="' + foo.find('.jobFunction').html() + '"]').prop('selected', false);
    $values = $('#filterJobFunction').val();
    $('#filterJobFunction').selectpicker('deselectAll');
    $('#filterJobFunction').selectpicker('val', $values);
  }); // end REMOVE JOB FUNCTION
  // REMOVE EDUCATION

  $("#filterBadge").on('click', '.education', function () {
    $(this).remove(); //this removes the item from the screen

    var foo = $(this);
    $('#filterEducation').find('[value="' + foo.find('.educationFilter').html() + '"]').prop('selected', false);
    $values = $('#filterEducation').val();
    $('#filterEducation').selectpicker('deselectAll');
    $('#filterEducation').selectpicker('val', $values);
  }); // end REMOVE EDUCATION
  // REMOVE COMPANY

  $("#filterBadge").on('click', '.company', function () {
    $(this).remove(); //this removes the item from the screen

    var foo = $(this);
    $('#filterCompany').find('[value="' + foo.find('.companyFilter').html() + '"]').prop('selected', false);
    $values = $('#filterCompany').val();
    $('#filterCompany').selectpicker('deselectAll');
    $('#filterCompany').selectpicker('val', $values);
  }); // end REMOVE COMPANY

  $("#sortBy").change(function () {
    var sortVal = $(this).val();
    searchJSON.asc = null;

    if (sortVal == 'AtoZ') {
      searchJSON.filter = 'job_posts.title';
      searchJSON.asc = 'asc';
    }

    if (sortVal == 'Salary') {
      searchJSON.filter = 'job_posts.salary_range_maximum';
    }

    if (sortVal == 'Freshness') {
      searchJSON.filter = 'job_posts.created_at';
    }

    fetchJobPosts(searchJSON);
  });
  $('#searchForm').submit(function (e) {
    e.preventDefault();
    var searchKeyword = $('#search_text').val();
    searchJSON.search = searchKeyword;
    fetchJobPosts(searchJSON);
  });
  $('#search_text').keyup(function (e) {
    e.preventDefault();
    searchJSON.search = $(this).val();
    fetchJobPosts(searchJSON);
  });
});

/***/ }),

/***/ 11:
/*!***************************************************!*\
  !*** multi ./resources/js/applicant/dashboard.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/king/Desktop/RecreationLikhainWorks/resources/js/applicant/dashboard.js */"./resources/js/applicant/dashboard.js");


/***/ })

/******/ });