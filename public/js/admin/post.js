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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/post.js":
/*!************************************!*\
  !*** ./resources/js/admin/post.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var token = $("input[name='_token']").attr("value");
$("select.change").change(function () {
  var id = $(this).attr('data-id');
  var status = $(this).find(':selected').attr('data-status');
  var slug = $(this).attr('data-slug');
  $.ajax({
    url: "/aktualnosci/" + slug,
    type: 'POST',
    data: {
      "id": id,
      '_method': 'PUT',
      'status': status,
      "_token": token,
      api: 'statusChange'
    },
    success: function success() {
      bootbox.alert({
        message: "Status zaktualizowany",
        centerVertical: true
      });
    }
  });
});

function checkIfModal() {
  $(".select-to-check").each(function () {
    var test = $(this).find(':selected').attr('data-type');

    if (test == 1) {
      $(".select-to-check").attr("disabled", true);
      $(this).attr("disabled", false);
    }
  });
}

$("select.change-type").change(function () {
  var id = $(this).attr('data-id');
  var status = $(this).find(':selected').attr('data-type');
  var slug = $(this).attr('data-slug');
  $.ajax({
    url: "/aktualnosci/" + slug,
    type: 'POST',
    data: {
      "id": id,
      '_method': 'PUT',
      'status': status,
      "_token": token,
      api: 'typeChange'
    },
    success: function success() {
      location.reload();
    }
  });
});
checkIfModal();
$("a[data-type='delete']").click(function () {
  var slug = $(this).attr('data-slug');
  var id = $(this).attr('data-id');
  bootbox.confirm({
    size: "small",
    centerVertical: true,
    message: "Czy chcesz usunąć aktulność?",
    buttons: {
      confirm: {
        label: 'Tak'
      },
      cancel: {
        label: 'Nie',
        className: 'btn-danger'
      }
    },
    callback: function callback(result) {
      if (result) {
        $.ajax({
          url: "/aktualnosci/" + slug,
          type: 'POST',
          data: {
            "id": id,
            '_method': 'DELETE',
            "_token": token,
            api: 'deletePost'
          },
          success: function success() {
            bootbox.alert({
              message: "Aktualnosc usunięta",
              centerVertical: true,
              callback: function callback() {
                location.reload();
              }
            });
          }
        });
      }
      /* result is a boolean; true = OK, false = Cancel*/

    }
  });
});

/***/ }),

/***/ 5:
/*!******************************************!*\
  !*** multi ./resources/js/admin/post.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/Shared/Previously Relocated Items/Security/Praca 2020/Balumed/balumed-dev/resources/js/admin/post.js */"./resources/js/admin/post.js");


/***/ })

/******/ });