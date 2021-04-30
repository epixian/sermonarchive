(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/app"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/NavigationMenu.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/NavigationMenu.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProfileDropdown__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProfileDropdown */ "./resources/js/components/ProfileDropdown.vue");
/* harmony import */ var _PrayerRequest__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PrayerRequest */ "./resources/js/components/PrayerRequest.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    ProfileDropdown: _ProfileDropdown__WEBPACK_IMPORTED_MODULE_0__["default"],
    PrayerRequest: _PrayerRequest__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  props: {
    user: {
      type: Object,
      required: false,
      "default": function _default() {}
    },
    route: {
      type: String,
      required: false,
      "default": ''
    }
  },
  data: function data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      mobileNavOpen: false,
      profileDropdownOpen: false
    };
  },
  computed: {
    canEditSermons: function canEditSermons() {
      return this.user ? this.user.can.includes('edit_sermons') : false;
    },
    canEditServices: function canEditServices() {
      return this.user ? this.user.can.includes('edit_services') : false;
    }
  },
  methods: {
    isRoute: function isRoute(route) {
      return route === this.route;
    },
    logout: function logout() {
      document.getElementById('logout-form').submit();
    },
    resend: function resend() {
      document.getElementById('resend-verification-email-form').submit();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/PrayerRequest.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/PrayerRequest.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      show: false,
      body: ''
    };
  },
  methods: {
    sendPrayerRequest: function sendPrayerRequest() {
      var _this = this;

      this.body = this.body.trim();

      if (this.body !== '') {
        axios.post('/prayer', {
          'body': this.body
        }).then(function () {
          _this.show = false;
          _this.body = '';
        });
      }
    },
    showPrayerRequestModal: function showPrayerRequestModal() {
      var _this2 = this;

      this.show = true;
      Vue.nextTick(function () {
        _this2.focusInput();
      });
    },
    focusInput: function focusInput() {
      this.$refs.body.focus();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ProfileDropdown.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/ProfileDropdown.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    user: {
      type: Object,
      required: true
    }
  },
  data: function data() {
    return {
      open: false
    };
  },
  methods: {
    logout: function logout() {
      document.getElementById('logout-form').submit();
    },
    resend: function resend() {
      document.getElementById('resend-verification-email-form').submit();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/RecordAttendance.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/RecordAttendance.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      available: [],
      selected: [],
      showAttendancePad: false,
      message: '',
      showButtons: false
    };
  },
  created: function created() {
    var _this = this;

    fetch('/user/family').then(function (response) {
      return response.json();
    }).then(function (data) {
      _this.available = data;
      _this.showButtons = true;
    });
  },
  methods: {
    clickCheckInButton: function clickCheckInButton() {
      if (this.available.length) this.showAttendancePad = true;else this.message = 'Already checked in!';
    },
    checkIn: function checkIn(ids) {
      axios.post('/check-in', ids).then(console.log);
    },
    select: function select(person) {
      var _this2 = this;

      this.selected.push(person);
      axios.post('/check-in', person).then(function () {
        _this2.available = _this2.available.filter(function (item) {
          return item !== person;
        });
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StreamController.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/StreamController.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    sermon: {
      type: Object,
      required: true
    }
  },
  data: function data() {
    return {
      stream_started: false,
      stream_ended: false
    };
  },
  methods: {
    doneRecording: function doneRecording() {
      var _this = this;

      axios.post('/admin/sermons/' + this.sermon.id + '/status', {
        recording_done: true
      }).then(function (response) {
        return response.data;
      }).then(function (data) {
        _this.recording_done = data.recording_done;
      });
    },
    startStream: function startStream() {
      var _this2 = this;

      axios.post('/admin/sermons/' + this.sermon.id + '/status', {
        stream_started: true
      }).then(function (response) {
        return response.data;
      }).then(function (data) {
        _this2.stream_started = data.stream_started;
      });
    },
    endStream: function endStream() {
      var _this3 = this;

      axios.post('/admin/sermons/' + this.sermon.id + '/status', {
        stream_ended: true
      }).then(function (response) {
        return response.data;
      }).then(function (data) {
        _this3.stream_ended = data.stream_ended;
      });
    }
  },
  created: function created() {
    var _this4 = this;

    axios.get('/sermons/' + this.sermon.id + '/status').then(function (response) {
      return response.data;
    }).then(function (data) {
      _this4.stream_started = data.stream_started;
      _this4.stream_ended = data.stream_ended;
      _this4.recording_done = data.recording_done;
    });
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VideoPlayer.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/VideoPlayer.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    sermon: {
      type: Object,
      required: true
    },
    control: {
      type: Boolean,
      required: false,
      "default": false
    },
    mode: {
      type: String,
      required: false,
      "default": 'live'
    }
  },
  data: function data() {
    return {
      'stream_started': this.sermon.stream_started,
      'stream_ended': this.sermon.stream_ended,
      'recording_done': this.sermon.recording_done
    };
  },
  computed: {
    fromNow: function fromNow() {
      return moment__WEBPACK_IMPORTED_MODULE_0___default()(this.sermon.scheduled_for).fromNow();
    },
    recordingPath: function recordingPath() {
      return this.sermon.recording_url || 'https://stream.newlifeglenside.com/recordings/' + this.sermon.stream_key + '.mp4';
    },
    statusText: function statusText() {
      if (this.recording_done !== 0) return 'recorded';else if (this.stream_ended !== 0 && this.recording_done === 0) return 'processing';else if (this.stream_started !== 0 && this.stream_ended === 0) return 'streaming';else return 'waiting';
    }
  },
  methods: {
    getStatus: function getStatus() {
      var _this = this;

      fetch('/sermons/' + this.sermon.id + '/status').then(function (response) {
        return response.json();
      }).then(function (data) {
        _this.stream_started = data.stream_started;
        _this.stream_ended = data.stream_ended;
        _this.recording_done = data.recording_done;

        if (_this.statusText === 'waiting' || _this.statusText === 'processing') {
          setTimeout(_this.getStatus, 10000);
        }
      });
    }
  },
  created: function created() {
    if (this.mode !== 'preview') this.getStatus();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/NavigationMenu.vue?vue&type=template&id=5132d33e&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/NavigationMenu.vue?vue&type=template&id=5132d33e& ***!
  \*****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "nav",
    {
      staticClass: "bg-white shadow-sm",
      attrs: { "x-cloak": "", "x-data": "{ menuOpen: false }" }
    },
    [
      _c("div", { staticClass: "max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" }, [
        _c("div", { staticClass: "flex justify-between h-16" }, [
          _c("div", { staticClass: "flex" }, [
            _vm._m(0),
            _vm._v(" "),
            _c("div", { staticClass: "hidden md:ml-8 md:flex md:space-x-6" }, [
              _c(
                "a",
                {
                  staticClass:
                    "inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out",
                  class: _vm.isRoute("/")
                    ? "text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700"
                    : "text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300",
                  attrs: { href: "/" }
                },
                [_vm._v("\n\t\t\t\t\t\t\tLive\n\t\t\t\t\t\t")]
              ),
              _vm._v(" "),
              _vm.canEditServices
                ? _c(
                    "a",
                    {
                      staticClass:
                        "inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out",
                      class: _vm.isRoute("admin/services")
                        ? "text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700"
                        : "text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300",
                      attrs: { href: "/admin/services" }
                    },
                    [_vm._v("\n\t\t\t\t\t\t\tServices\n\t\t\t\t\t\t")]
                  )
                : _vm._e(),
              _vm._v(" "),
              _vm.canEditServices
                ? _c(
                    "a",
                    {
                      staticClass:
                        "inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out",
                      class: _vm.isRoute("sermons")
                        ? "text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700"
                        : "text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300",
                      attrs: { href: "/sermons" }
                    },
                    [_vm._v("\n\t\t\t\t\t\t\tSermons\n\t\t\t\t\t\t")]
                  )
                : _vm._e(),
              _vm._v(" "),
              _vm.canEditServices
                ? _c(
                    "a",
                    {
                      staticClass:
                        "inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out",
                      class: _vm.isRoute("admin/users")
                        ? "text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700"
                        : "text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300",
                      attrs: { href: "/admin/users" }
                    },
                    [_vm._v("\n\t\t\t\t\t\t\tUsers\n\t\t\t\t\t\t")]
                  )
                : _vm._e()
            ])
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "flex items-center space-x-6 md:ml-6" },
            [
              _c("div", { staticClass: "hidden md:block" }, [
                _c("span", { staticClass: "rounded-md shadow-sm" }, [
                  _c(
                    "a",
                    {
                      staticClass:
                        "inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-green-500 hover:bg-nl-green-400 focus:outline-none focus:border-nl-green-500 focus:shadow-outline-nl-green active:bg-nl-green-600 transition ease-in-out duration-150",
                      attrs: {
                        href:
                          "https://www.eservicepayments.com/cgi-bin/Vanco_ver3.vps?appver3=Dc8dzPGn4-LCajFevTkh9IrAPiKyxuq1wz14eIF-xa7wDLnFUBRZuK9-TeNGQgRt3ZjrEf-JY61LsyvVDvllero7zqy-JU_UuLu19bUbJx16ST79ddXa13WVGWu3v78lk0PpduXvnt8gXUeZjQYbn8YMd3VAg-5ef_sTFvOQq-g=&ver=3",
                        target: "_blank"
                      }
                    },
                    [
                      _c(
                        "svg",
                        {
                          staticClass: "-ml-1 mr-2 h-5 w-5",
                          attrs: {
                            fill: "none",
                            "stroke-linecap": "round",
                            "stroke-linejoin": "round",
                            "stroke-width": "2",
                            stroke: "currentColor",
                            viewBox: "0 0 24 24"
                          }
                        },
                        [
                          _c("path", {
                            attrs: {
                              d:
                                "M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"
                            }
                          })
                        ]
                      ),
                      _vm._v("\n\t\t\t\t\t\t\t\tGive\n\t\t\t\t\t\t\t")
                    ]
                  )
                ])
              ]),
              _vm._v(" "),
              _vm.user
                ? _c("PrayerRequest", { staticClass: "hidden md:block" })
                : _vm._e(),
              _vm._v(" "),
              _vm.user
                ? _c("ProfileDropdown", {
                    staticClass: "hidden md:block",
                    attrs: { user: _vm.user }
                  })
                : _c(
                    "div",
                    { staticClass: "h-full hidden md:ml-6 md:flex space-x-6" },
                    [
                      _c(
                        "a",
                        {
                          staticClass:
                            "inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300",
                          attrs: { href: "/login" }
                        },
                        [_vm._v("\n\t\t\t\t\t\t\tSign In\n\t\t\t\t\t\t")]
                      ),
                      _vm._v(" "),
                      _c(
                        "a",
                        {
                          staticClass:
                            "inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300",
                          attrs: { href: "/register" }
                        },
                        [_vm._v("\n\t\t\t\t\t\t\tRegister\n\t\t\t\t\t\t")]
                      )
                    ]
                  )
            ],
            1
          ),
          _vm._v(" "),
          _c("div", { staticClass: "-mr-2 flex items-center md:hidden" }, [
            _c(
              "button",
              {
                staticClass:
                  "inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out",
                on: {
                  click: function($event) {
                    _vm.mobileNavOpen = !_vm.mobileNavOpen
                  }
                }
              },
              [
                _c(
                  "svg",
                  {
                    staticClass: "h-6 w-6",
                    class: _vm.mobileNavOpen ? "hidden" : "block",
                    attrs: {
                      stroke: "currentColor",
                      fill: "none",
                      viewBox: "0 0 24 24"
                    }
                  },
                  [
                    _c("path", {
                      attrs: {
                        "stroke-linecap": "round",
                        "stroke-linejoin": "round",
                        "stroke-width": "2",
                        d: "M4 6h16M4 12h16M4 18h16"
                      }
                    })
                  ]
                ),
                _vm._v(" "),
                _c(
                  "svg",
                  {
                    staticClass: "h-6 w-6",
                    class: _vm.mobileNavOpen ? "block" : "hidden",
                    attrs: {
                      stroke: "currentColor",
                      fill: "none",
                      viewBox: "0 0 24 24"
                    }
                  },
                  [
                    _c("path", {
                      attrs: {
                        "stroke-linecap": "round",
                        "stroke-linejoin": "round",
                        "stroke-width": "2",
                        d: "M6 18L18 6M6 6l12 12"
                      }
                    })
                  ]
                )
              ]
            )
          ])
        ])
      ]),
      _vm._v(" "),
      _c(
        "div",
        {
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.mobileNavOpen,
              expression: "mobileNavOpen"
            }
          ],
          staticClass: "block md:hidden"
        },
        [
          _c("div", { staticClass: "pb-3 space-y-1" }, [
            _c(
              "div",
              {
                staticClass:
                  "flex items-center w-full space-x-4 px-4 sm:px-6 py-3"
              },
              [
                _c("div", { staticClass: "rounded-md shadow-sm" }, [
                  _c(
                    "a",
                    {
                      staticClass:
                        "flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-green-500 hover:bg-nl-green-400 focus:outline-none focus:border-nl-green-500 focus:shadow-outline-nl-green active:bg-nl-green-600 transition ease-in-out duration-150",
                      attrs: {
                        href:
                          "https://www.eservicepayments.com/cgi-bin/Vanco_ver3.vps?appver3=Dc8dzPGn4-LCajFevTkh9IrAPiKyxuq1wz14eIF-xa7wDLnFUBRZuK9-TeNGQgRt3ZjrEf-JY61LsyvVDvllero7zqy-JU_UuLu19bUbJx16ST79ddXa13WVGWu3v78lk0PpduXvnt8gXUeZjQYbn8YMd3VAg-5ef_sTFvOQq-g=&ver=3",
                        target: "_blank"
                      }
                    },
                    [
                      _c(
                        "svg",
                        {
                          staticClass: "-ml-1 mr-2 h-5 w-5",
                          attrs: {
                            fill: "none",
                            "stroke-linecap": "round",
                            "stroke-linejoin": "round",
                            "stroke-width": "2",
                            stroke: "currentColor",
                            viewBox: "0 0 24 24"
                          }
                        },
                        [
                          _c("path", {
                            attrs: {
                              d:
                                "M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"
                            }
                          })
                        ]
                      ),
                      _vm._v("\n              Give\n            ")
                    ]
                  )
                ]),
                _vm._v(" "),
                _vm.user ? _c("PrayerRequest") : _vm._e()
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "a",
              {
                staticClass:
                  "block pl-3 sm:pl-5 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out",
                class: _vm.isRoute("/")
                  ? "border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700"
                  : "border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300",
                attrs: { href: "/" }
              },
              [_vm._v("Live")]
            ),
            _vm._v(" "),
            _vm.canEditServices
              ? _c(
                  "a",
                  {
                    staticClass:
                      "block pl-3 sm:pl-5 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out",
                    class: _vm.isRoute("admin/services")
                      ? "border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700"
                      : "border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300",
                    attrs: { href: "/admin/services" }
                  },
                  [_vm._v("Services")]
                )
              : _vm._e(),
            _vm._v(" "),
            _vm.canEditSermons
              ? _c(
                  "a",
                  {
                    staticClass:
                      "block pl-3 sm:pl-5 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out",
                    class: _vm.isRoute("sermons")
                      ? "border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700"
                      : "border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300",
                    attrs: { href: "/sermons" }
                  },
                  [_vm._v("Sermons")]
                )
              : _vm._e(),
            _vm._v(" "),
            _vm.canEditServices
              ? _c(
                  "a",
                  {
                    staticClass:
                      "block pl-3 sm:pl-5 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out",
                    class: _vm.isRoute("admin/users")
                      ? "border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700"
                      : "border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300",
                    attrs: { href: "/admin/users" }
                  },
                  [_vm._v("Users")]
                )
              : _vm._e()
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "border-t border-gray-200" }, [
            _vm.user
              ? _c("div", { staticClass: "divide-gray-200 divide-y" }, [
                  _c(
                    "div",
                    { staticClass: "flex items-center px-4 sm:px-6 py-3" },
                    [
                      _c("div", { staticClass: "flex-shrink-0" }, [
                        _c("img", {
                          staticClass: "h-10 w-10 rounded-full",
                          attrs: { src: _vm.user.gravatar, alt: "" }
                        })
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "ml-3" }, [
                        _c(
                          "div",
                          {
                            staticClass:
                              "text-base font-medium leading-6 text-gray-800"
                          },
                          [
                            _vm._v(
                              "\n\t              " +
                                _vm._s(_vm.user.name) +
                                "\n\t            "
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "inline-flex text-sm font-medium leading-5 text-gray-500"
                          },
                          [
                            _vm._v(
                              "\n\t              " +
                                _vm._s(_vm.user.email) +
                                "\n\t              "
                            ),
                            _vm.user.breeze_id
                              ? _c(
                                  "span",
                                  {
                                    staticClass:
                                      "ml-2 inline-flex items-center text-nl-blue-500"
                                  },
                                  [
                                    _c(
                                      "svg",
                                      {
                                        staticClass: "h-6 w-6 stroke-current",
                                        attrs: {
                                          fill: "none",
                                          "stroke-linecap": "round",
                                          "stroke-linejoin": "round",
                                          "stroke-width": "2",
                                          stroke: "currentColor",
                                          viewBox: "0 0 24 24"
                                        }
                                      },
                                      [
                                        _c("path", {
                                          attrs: {
                                            d:
                                              "M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
                                          }
                                        })
                                      ]
                                    ),
                                    _vm._v(
                                      "\n\t                Linked\n\t              "
                                    )
                                  ]
                                )
                              : !_vm.user.email_verified_at
                              ? _c(
                                  "span",
                                  {
                                    staticClass:
                                      "ml-2 inline-flex items-center text-red-600"
                                  },
                                  [
                                    _vm._v(
                                      "\n                  Unverified\n                "
                                    )
                                  ]
                                )
                              : !_vm.user.breeze_id
                              ? _c(
                                  "span",
                                  {
                                    staticClass:
                                      "ml-2 inline-flex items-center text-red-600"
                                  },
                                  [
                                    _vm._v(
                                      "\n                  Not linked\n                "
                                    )
                                  ]
                                )
                              : _vm._e()
                          ]
                        )
                      ])
                    ]
                  ),
                  _vm._v(" "),
                  !_vm.user.email_verified_at
                    ? _c(
                        "div",
                        {
                          staticClass:
                            "text-base font-medium leading-6 text-gray-800"
                        },
                        [
                          _c(
                            "a",
                            {
                              staticClass:
                                "block px-4 sm:px-6 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out",
                              attrs: { href: "/email/resend" },
                              on: {
                                click: function($event) {
                                  $event.preventDefault()
                                  return _vm.resend($event)
                                }
                              }
                            },
                            [_vm._v("Resend verification email")]
                          )
                        ]
                      )
                    : !_vm.user.breeze_id
                    ? _c(
                        "div",
                        {
                          staticClass:
                            "text-base font-medium leading-6 text-gray-800"
                        },
                        [
                          _c(
                            "a",
                            {
                              staticClass:
                                "block px-4 sm:px-6 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out",
                              attrs: { href: "/user/link" }
                            },
                            [_vm._v("Reattempt link")]
                          )
                        ]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "py-3 space-y-1",
                      attrs: {
                        role: "menu",
                        "aria-orientation": "vertical",
                        "aria-labelledby": "user-menu"
                      }
                    },
                    [
                      _c(
                        "a",
                        {
                          staticClass:
                            "block px-4 sm:px-6 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out",
                          attrs: { href: "#", role: "menuitem" },
                          on: { click: _vm.logout }
                        },
                        [_vm._v("Sign Out")]
                      )
                    ]
                  )
                ])
              : _c(
                  "div",
                  {
                    staticClass: "py-3 space-y-1",
                    attrs: {
                      role: "menu",
                      "aria-orientation": "vertical",
                      "aria-labelledby": "user-menu"
                    }
                  },
                  [
                    _c(
                      "a",
                      {
                        staticClass:
                          "block px-4 sm:px-6 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out",
                        attrs: { href: "/login", role: "menuitem" }
                      },
                      [_vm._v("Sign In")]
                    ),
                    _vm._v(" "),
                    _c(
                      "a",
                      {
                        staticClass:
                          "block px-4 sm:px-6 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out",
                        attrs: { href: "/register", role: "menuitem" }
                      },
                      [_vm._v("Register")]
                    )
                  ]
                )
          ])
        ]
      ),
      _vm._v(" "),
      _c(
        "form",
        {
          staticClass: "hidden",
          attrs: { id: "logout-form", action: "/logout", method: "POST" }
        },
        [
          _c("input", {
            attrs: { type: "hidden", name: "_token" },
            domProps: { value: _vm.csrf }
          })
        ]
      ),
      _vm._v(" "),
      _c(
        "form",
        {
          staticClass: "hidden",
          attrs: {
            id: "resend-verification-email-form",
            action: "/email/resend",
            method: "POST"
          }
        },
        [
          _c("input", {
            attrs: { type: "hidden", name: "_token" },
            domProps: { value: _vm.csrf }
          })
        ]
      )
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "flex-shrink-0 flex items-center" }, [
      _c("a", { attrs: { href: "/" } }, [
        _c("img", {
          staticClass: "hidden md:block lg:hidden h-12 w-auto",
          attrs: {
            src: "https://cdn.newlifeglenside.com/leaf.png",
            alt: "New Life logo"
          }
        }),
        _vm._v(" "),
        _c("img", {
          staticClass: "block md:hidden lg:block h-12 w-auto",
          attrs: {
            src: "https://cdn.newlifeglenside.com/nlg-logo.png",
            alt: "New Life logo"
          }
        })
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/PrayerRequest.vue?vue&type=template&id=aaa8ef66&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/PrayerRequest.vue?vue&type=template&id=aaa8ef66& ***!
  \****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("span", { staticClass: "rounded-md shadow-sm" }, [
      _c(
        "button",
        {
          staticClass:
            "inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-500 hover:bg-nl-blue-400 focus:outline-none focus:border-nl-blue-500 focus:shadow-outline-nl-blue active:bg-nl-blue-600 transition ease-in-out duration-150",
          attrs: { type: "button" },
          on: { click: _vm.showPrayerRequestModal }
        },
        [
          _c(
            "svg",
            {
              staticClass: "-ml-1 mr-2 h-5 w-5",
              attrs: {
                fill: "none",
                "stroke-linecap": "round",
                "stroke-linejoin": "round",
                "stroke-width": "2",
                stroke: "currentColor",
                viewBox: "0 0 24 24"
              }
            },
            [
              _c("path", {
                attrs: {
                  d:
                    "M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                }
              })
            ]
          ),
          _vm._v("\n      Request Prayer\n    ")
        ]
      )
    ]),
    _vm._v(" "),
    _c(
      "div",
      {
        class: _vm.show
          ? "fixed bottom-0 inset-x-0 px-4 pb-6 sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center z-50"
          : "hidden"
      },
      [
        _c(
          "transition",
          {
            attrs: {
              "enter-active-class": "ease-out duration-300",
              "enter-class": "opacity-0",
              "enter-to-class": "opacity-100",
              "leave-active-class": "ease-in duration-200",
              "leave-class": "opacity-100",
              "leave-to-class": "opacity-0"
            }
          },
          [
            _vm.show
              ? _c("div", { staticClass: "fixed inset-0 transition-opacity" }, [
                  _c("div", {
                    staticClass: "absolute inset-0 bg-gray-500 opacity-75"
                  })
                ])
              : _vm._e()
          ]
        ),
        _vm._v(" "),
        _c(
          "transition",
          {
            attrs: {
              "enter-active-class": "ease-out duration-300",
              "enter-class":
                "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95",
              "enter-to-class": "opacity-100 translate-y-0 sm:scale-100",
              "leave-active-class": "ease-in duration-200",
              "leave-class": "opacity-100 translate-y-0 sm:scale-100",
              "leave-to-class":
                "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            }
          },
          [
            _vm.show
              ? _c(
                  "div",
                  {
                    staticClass:
                      "bg-white rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6"
                  },
                  [
                    _c("div", [
                      _c(
                        "h3",
                        {
                          staticClass:
                            "mt-2 sm:my-5 text-xl text-center leading-6 font-medium text-gray-900"
                        },
                        [_vm._v("\n            Request Prayer\n          ")]
                      ),
                      _vm._v(" "),
                      _c("div", { staticClass: "mt-3" }, [
                        _c("div", {}, [
                          _c(
                            "label",
                            {
                              staticClass:
                                "block text-sm font-medium leading-5 text-gray-700",
                              attrs: { for: "body" }
                            },
                            [
                              _vm._v(
                                "\n                How can we pray for you?\n              "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "mt-2 rounded-md shadow-sm" },
                            [
                              _c("textarea", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.body,
                                    expression: "body"
                                  }
                                ],
                                ref: "body",
                                staticClass:
                                  "form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5",
                                attrs: { id: "body", rows: "3" },
                                domProps: { value: _vm.body },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.body = $event.target.value
                                  }
                                }
                              })
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "p",
                            { staticClass: "mt-2 text-sm text-gray-500" },
                            [_vm._v("This will be sent to the pastor.")]
                          )
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense"
                      },
                      [
                        _c(
                          "span",
                          {
                            staticClass:
                              "flex w-full rounded-md shadow-sm sm:col-start-2"
                          },
                          [
                            _c(
                              "button",
                              {
                                staticClass:
                                  "inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-nl-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-nl-green-500 focus:outline-none focus:border-blue-300 focus:shadow-outline transition ease-in-out duration-150 sm:text-sm sm:leading-5",
                                attrs: { type: "button" },
                                on: { click: _vm.sendPrayerRequest }
                              },
                              [_vm._v("\n              Send\n            ")]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "span",
                          {
                            staticClass:
                              "mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:col-start-1"
                          },
                          [
                            _c(
                              "button",
                              {
                                staticClass:
                                  "inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline transition ease-in-out duration-150 sm:text-sm sm:leading-5",
                                attrs: { type: "button" },
                                on: {
                                  click: function($event) {
                                    _vm.show = false
                                  }
                                }
                              },
                              [_vm._v("\n              Cancel\n            ")]
                            )
                          ]
                        )
                      ]
                    )
                  ]
                )
              : _vm._e()
          ]
        )
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ProfileDropdown.vue?vue&type=template&id=7a46ef82&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/ProfileDropdown.vue?vue&type=template&id=7a46ef82& ***!
  \******************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "relative" },
    [
      _c("div", [
        _c(
          "button",
          {
            staticClass:
              "flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out",
            attrs: {
              id: "user-menu",
              "aria-label": "User menu",
              "aria-haspopup": "true"
            },
            on: {
              click: function($event) {
                _vm.open = !_vm.open
              }
            }
          },
          [
            _c("img", {
              staticClass: "h-10 w-10 rounded-full",
              attrs: { src: _vm.user.gravatar, alt: "" }
            })
          ]
        )
      ]),
      _vm._v(" "),
      _c(
        "transition",
        {
          attrs: {
            "enter-active-class": "transition ease-out duration-200",
            "enter-class": "transform opacity-0 scale-95",
            "enter-to-class": "transform opacity-100 scale-100",
            "leave-active-class": "transition ease-in duration-75",
            "leave-class": "transform opacity-100 scale-100",
            "leave-to-class": "transform opacity-0 scale-95"
          }
        },
        [
          _vm.open
            ? _c(
                "div",
                {
                  staticClass:
                    "origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg z-50"
                },
                [
                  _c(
                    "div",
                    { staticClass: "pb-1 rounded-md bg-white shadow-xs" },
                    [
                      _c(
                        "div",
                        { staticClass: "bg-gray-50 border-b border-gray-200" },
                        [
                          _c(
                            "div",
                            {
                              staticClass:
                                "px-4 pt-3 text-sm font-medium leading-5 text-gray-700"
                            },
                            [_vm._v(_vm._s(_vm.user.name))]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "px-4 pb-2 text-sm leading-5 text-gray-700"
                            },
                            [_vm._v(_vm._s(_vm.user.email))]
                          ),
                          _vm._v(" "),
                          _vm.user.breeze_id
                            ? _c(
                                "div",
                                {
                                  staticClass:
                                    "flex items-center px-4 py-2 bg-nl-blue-100 text-sm text-nl-blue-500"
                                },
                                [
                                  _c(
                                    "svg",
                                    {
                                      staticClass:
                                        "h-5 w-5 mr-1 stroke-current",
                                      attrs: {
                                        fill: "none",
                                        "stroke-linecap": "round",
                                        "stroke-linejoin": "round",
                                        "stroke-width": "2",
                                        stroke: "currentColor",
                                        viewBox: "0 0 24 24"
                                      }
                                    },
                                    [
                                      _c("path", {
                                        attrs: {
                                          d:
                                            "M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v("\n            Linked\n          ")
                                ]
                              )
                            : !_vm.user.email_verified_at
                            ? _c(
                                "div",
                                {
                                  staticClass:
                                    "block px-4 py-2 bg-red-100 border-t border-gray-200 text-sm leading-5 text-red-700 "
                                },
                                [_vm._v("Unverified\n          ")]
                              )
                            : !_vm.user.breeze_id
                            ? _c(
                                "div",
                                {
                                  staticClass:
                                    "block px-4 py-2 bg-red-100 border-t border-gray-200 text-sm leading-5 text-red-700"
                                },
                                [_vm._v("Not linked\n          ")]
                              )
                            : _vm._e()
                        ]
                      ),
                      _vm._v(" "),
                      !_vm.user.email_verified_at
                        ? _c(
                            "div",
                            { staticClass: "border-b border-gray-200" },
                            [
                              _c(
                                "a",
                                {
                                  staticClass:
                                    "block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out",
                                  attrs: { href: "/email/resend" },
                                  on: {
                                    click: function($event) {
                                      $event.preventDefault()
                                      return _vm.resend($event)
                                    }
                                  }
                                },
                                [_vm._v("Resend verification email")]
                              )
                            ]
                          )
                        : !_vm.user.breeze_id
                        ? _c(
                            "div",
                            { staticClass: "border-b border-gray-200" },
                            [
                              _c(
                                "a",
                                {
                                  staticClass:
                                    "block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out",
                                  attrs: { href: "/user/link" }
                                },
                                [_vm._v("Reattempt link")]
                              )
                            ]
                          )
                        : _vm._e(),
                      _vm._v(" "),
                      _c("div", [
                        _c(
                          "a",
                          {
                            staticClass:
                              "block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out",
                            attrs: { href: "/logout" },
                            on: {
                              click: function($event) {
                                $event.preventDefault()
                                return _vm.logout($event)
                              }
                            }
                          },
                          [_vm._v("Sign out")]
                        )
                      ])
                    ]
                  )
                ]
              )
            : _vm._e()
        ]
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/RecordAttendance.vue?vue&type=template&id=65b3af85&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/RecordAttendance.vue?vue&type=template&id=65b3af85& ***!
  \*******************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" }, [
    _c(
      "div",
      { staticClass: "relative mt-4" },
      [
        _c(
          "transition",
          {
            attrs: {
              "enter-active-class": "transition ease-in duration-100",
              "enter-class": "opacity-0",
              "enter-to-class": "opacity-100",
              "leave-active-class": "transition ease-out duration-75",
              "leave-class": "opacity-100",
              "leave-to-class": "opacity-0",
              mode: "out-in"
            }
          },
          [
            _c(
              "div",
              {
                directives: [
                  {
                    name: "show",
                    rawName: "v-show",
                    value: _vm.available.length && _vm.showAttendancePad,
                    expression: "available.length && showAttendancePad"
                  }
                ]
              },
              [
                _c(
                  "div",
                  {
                    staticClass:
                      "mx-4 sm:mx-6 text-base text-center leading-6 font-medium"
                  },
                  [_vm._v("\n          Who is checking in?\n        ")]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass:
                      "flex flex-wrap items-center justify-center mx-4 sm:mx-6 space-x-2"
                  },
                  _vm._l(_vm.available, function(person) {
                    return _c(
                      "span",
                      {
                        key: person.id,
                        staticClass: "inline-flex rounded-md shadow-sm"
                      },
                      [
                        _c(
                          "button",
                          {
                            staticClass:
                              "mt-2 inline-flex items-center px-4 py-2 border text-sm leading-5 font-medium rounded-md transition ease-in-out duration-150",
                            class: !_vm.selected.includes(person)
                              ? "border-gray-300 text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50"
                              : "border-nl-green-300 text-nl-green-700 bg-nl-green-100 hover:bg-nl-green-50 focus:outline-none focus:border-nl-green-300 focus:shadow-outline-nl-green active:bg-nl-green-200",
                            attrs: { type: "button" },
                            on: {
                              click: function($event) {
                                return _vm.select(person)
                              }
                            }
                          },
                          [
                            _vm._v(
                              "\n              " +
                                _vm._s(person.name) +
                                "\n            "
                            )
                          ]
                        )
                      ]
                    )
                  }),
                  0
                )
              ]
            )
          ]
        ),
        _vm._v(" "),
        _vm.showButtons
          ? _c(
              "div",
              {
                staticClass: "absolute top-0 right-0 flex rounded-md shadow-sm"
              },
              [
                _c("transition", { attrs: { mode: "out-in" } }, [
                  _vm.available.length
                    ? _c("div", [
                        _vm.showAttendancePad
                          ? _c(
                              "button",
                              {
                                staticClass:
                                  "inline-flex items-center px-4 py-2 border text-sm leading-5 font-medium rounded-md transition ease-in-out duration-150 border-gray-300 text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50",
                                attrs: { type: "button" },
                                on: {
                                  click: function($event) {
                                    _vm.showAttendancePad = false
                                  }
                                }
                              },
                              [_vm._v("\n            Close\n          ")]
                            )
                          : _c(
                              "button",
                              {
                                staticClass:
                                  "inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition ease-in-out duration-150",
                                attrs: { type: "button" },
                                on: {
                                  click: function($event) {
                                    _vm.showAttendancePad = true
                                  }
                                }
                              },
                              [_vm._v("\n            Check In\n          ")]
                            )
                      ])
                    : _vm._e()
                ])
              ],
              1
            )
          : _vm._e()
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StreamController.vue?vue&type=template&id=647a78b2&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/StreamController.vue?vue&type=template&id=647a78b2& ***!
  \*******************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "text-right" }, [
    !_vm.stream_started
      ? _c("span", { staticClass: "inline-flex rounded-md shadow-sm" }, [
          _c(
            "button",
            {
              staticClass:
                "inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition ease-in-out duration-150",
              attrs: { type: "button" },
              on: { click: _vm.startStream }
            },
            [_vm._v("\n      Go Live\n    ")]
          )
        ])
      : _vm._e(),
    _vm._v(" "),
    _vm.stream_started && !_vm.stream_ended
      ? _c("span", { staticClass: "inline-flex rounded-md shadow-sm" }, [
          _c(
            "button",
            {
              staticClass:
                "inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition ease-in-out duration-150",
              attrs: { type: "button" },
              on: { click: _vm.endStream }
            },
            [_vm._v("\n      End Stream\n    ")]
          )
        ])
      : _vm._e(),
    _vm._v(" "),
    _vm.stream_ended && !_vm.recording_done
      ? _c("span", { staticClass: "inline-flex rounded-md shadow-sm" }, [
          _c(
            "button",
            {
              staticClass:
                "inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition ease-in-out duration-150",
              attrs: { type: "button" },
              on: { click: _vm.doneRecording }
            },
            [_vm._v("\n      ffmpeg Done (manual)\n    ")]
          )
        ])
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VideoPlayer.vue?vue&type=template&id=9e3bdfbe&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/VideoPlayer.vue?vue&type=template&id=9e3bdfbe& ***!
  \**************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _vm.statusText === "waiting" && _vm.mode === "live"
        ? _c("div", { class: { "flex flex-col-reverse": _vm.control } }, [
            _c(
              "p",
              { staticClass: "px-4 sm:px-0", class: { "mt-4": _vm.control } },
              [
                _vm._v(
                  "\n      The stream will begin about " +
                    _vm._s(_vm.fromNow) +
                    ".  Please prepare your hearts for worship.\n    "
                )
              ]
            ),
            _vm._v(" "),
            _c("img", {
              staticClass: "w-full shadow-md max-w-3xl",
              class: { "mt-4": !_vm.control },
              attrs: {
                src: "https://cdn.newlifeglenside.com/nlg-logo-white.png",
                alt: "New Life logo"
              }
            })
          ])
        : _vm._e(),
      _vm._v(" "),
      _vm.statusText === "streaming" ||
      _vm.mode === "preview" ||
      _vm.statusText === "recorded"
        ? _c(
            "video-js",
            {
              staticClass: "video-js vjs-big-play-centered h-full shadow-md",
              attrs: {
                controls: "",
                autoplay: "",
                preload: "none",
                "data-setup": '{ "liveui": true }'
              }
            },
            [
              _vm.statusText === "streaming" || _vm.mode === "preview"
                ? _c("source", {
                    attrs: {
                      src:
                        "https://stream.newlifeglenside.com/hls/" +
                        _vm.sermon.stream_key +
                        ".m3u8",
                      type: "application/vnd.apple.mpegurl"
                    }
                  })
                : _c("source", {
                    attrs: { src: _vm.recordingPath, type: "video/mp4" }
                  }),
              _vm._v(" "),
              _c("p", { staticClass: "vjs-no-js" }, [
                _vm._v(
                  "To watch this video, please enable Javascript or use a browser that supports HTML5 video."
                )
              ])
            ]
          )
        : _vm._e(),
      _vm._v(" "),
      _vm.statusText === "processing" && _vm.mode !== "preview"
        ? _c("div", { class: { "flex flex-col-reverse": _vm.control } }, [
            _c(
              "p",
              { staticClass: "px-4 sm:px-0", class: { "mt-4": _vm.control } },
              [
                _vm._v(
                  "\n      The stream has ended and is currently processing.  Please check back in a little bit.\n    "
                )
              ]
            ),
            _vm._v(" "),
            _c("img", {
              staticClass: "w-full shadow-md max-w-3xl",
              class: { "mt-4": !_vm.control },
              attrs: {
                src: "https://cdn.newlifeglenside.com/nlg-logo-white.png",
                alt: "New Life logo"
              }
            })
          ])
        : _vm._e(),
      _vm._v(" "),
      !_vm.control
        ? _c("div", { staticClass: "mt-4 mx-4 sm:mx-0" }, [
            _c(
              "h2",
              { staticClass: "text-lg font-bold leading-tight text-gray-900" },
              [_vm._v(_vm._s(_vm.sermon.name))]
            ),
            _vm._v(" "),
            _vm.control
              ? _c("div", { staticClass: "text-base text-gray-900" }, [
                  _vm._v("\n      " + _vm._s(_vm.sermon.description) + "\n    ")
                ])
              : _vm._e()
          ])
        : _vm._e()
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var alpinejs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! alpinejs */ "./node_modules/alpinejs/dist/alpine.js");
/* harmony import */ var alpinejs__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(alpinejs__WEBPACK_IMPORTED_MODULE_0__);
window.axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
var token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

 // import Echo from 'laravel-echo';
// window.io = require('socket.io-client');
// window.Echo = new Echo({
//     broadcaster: 'socket.io',
//     host: window.location.hostname + ':6001',
// });

window.Vue = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
Vue.component('record-attendance', __webpack_require__(/*! ./components/RecordAttendance.vue */ "./resources/js/components/RecordAttendance.vue")["default"]);
Vue.component('video-player', __webpack_require__(/*! ./components/VideoPlayer.vue */ "./resources/js/components/VideoPlayer.vue")["default"]);
Vue.component('stream-controller', __webpack_require__(/*! ./components/StreamController.vue */ "./resources/js/components/StreamController.vue")["default"]);
Vue.component('navigation-menu', __webpack_require__(/*! ./components/NavigationMenu.vue */ "./resources/js/components/NavigationMenu.vue")["default"]);
Vue.component('prayer-request', __webpack_require__(/*! ./components/PrayerRequest.vue */ "./resources/js/components/PrayerRequest.vue")["default"]); // Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
// Vue.component('chat-input', require('./components/ChatInput.vue').default);

var app = new Vue({
  el: '#app'
}); // const app = new Vue({
//   el: '#chat',
//   data: {
//     messages: []
//   },
//   created() {
//     this.fetchMessages();
//     window.Echo.private('nlglive-channel')
//       .listen('nlglive-event', (e) => {
//         console.log(e);
//         this.messages.push({
//           message: e.message.message,
//           user: e.user,
//         });
//       });
//   },
//   methods: {
//     fetchMessages() {
//       axios.get('/messages').then(response => {
//         this.messages = response.data;
//       });
//     },
//     addMessage(message) {
//       this.messages.push(message);
//       // axios.post('http://localhost:6001/apps/0849aee3142281e5/events?auth_key=63011bcdd2110d0bf0125b24a6a1d22e', {
//       //   'channel': 'private-nlglive-channel',
//       //   'name': 'nlglive-event',
//       //   'data': message
//       // })
//       axios.post('/messages', message)
//       .then(response => {
//         console.log(response.data);
//       });
//     }
//   }
// });

/***/ }),

/***/ "./resources/js/components/NavigationMenu.vue":
/*!****************************************************!*\
  !*** ./resources/js/components/NavigationMenu.vue ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _NavigationMenu_vue_vue_type_template_id_5132d33e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./NavigationMenu.vue?vue&type=template&id=5132d33e& */ "./resources/js/components/NavigationMenu.vue?vue&type=template&id=5132d33e&");
/* harmony import */ var _NavigationMenu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./NavigationMenu.vue?vue&type=script&lang=js& */ "./resources/js/components/NavigationMenu.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _NavigationMenu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _NavigationMenu_vue_vue_type_template_id_5132d33e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _NavigationMenu_vue_vue_type_template_id_5132d33e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/NavigationMenu.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/NavigationMenu.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/NavigationMenu.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NavigationMenu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./NavigationMenu.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/NavigationMenu.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NavigationMenu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/NavigationMenu.vue?vue&type=template&id=5132d33e&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/NavigationMenu.vue?vue&type=template&id=5132d33e& ***!
  \***********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NavigationMenu_vue_vue_type_template_id_5132d33e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./NavigationMenu.vue?vue&type=template&id=5132d33e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/NavigationMenu.vue?vue&type=template&id=5132d33e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NavigationMenu_vue_vue_type_template_id_5132d33e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NavigationMenu_vue_vue_type_template_id_5132d33e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/PrayerRequest.vue":
/*!***************************************************!*\
  !*** ./resources/js/components/PrayerRequest.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PrayerRequest_vue_vue_type_template_id_aaa8ef66___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PrayerRequest.vue?vue&type=template&id=aaa8ef66& */ "./resources/js/components/PrayerRequest.vue?vue&type=template&id=aaa8ef66&");
/* harmony import */ var _PrayerRequest_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PrayerRequest.vue?vue&type=script&lang=js& */ "./resources/js/components/PrayerRequest.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PrayerRequest_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PrayerRequest_vue_vue_type_template_id_aaa8ef66___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PrayerRequest_vue_vue_type_template_id_aaa8ef66___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/PrayerRequest.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/PrayerRequest.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/PrayerRequest.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PrayerRequest_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./PrayerRequest.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/PrayerRequest.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PrayerRequest_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/PrayerRequest.vue?vue&type=template&id=aaa8ef66&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/PrayerRequest.vue?vue&type=template&id=aaa8ef66& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PrayerRequest_vue_vue_type_template_id_aaa8ef66___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./PrayerRequest.vue?vue&type=template&id=aaa8ef66& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/PrayerRequest.vue?vue&type=template&id=aaa8ef66&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PrayerRequest_vue_vue_type_template_id_aaa8ef66___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PrayerRequest_vue_vue_type_template_id_aaa8ef66___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/ProfileDropdown.vue":
/*!*****************************************************!*\
  !*** ./resources/js/components/ProfileDropdown.vue ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProfileDropdown_vue_vue_type_template_id_7a46ef82___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProfileDropdown.vue?vue&type=template&id=7a46ef82& */ "./resources/js/components/ProfileDropdown.vue?vue&type=template&id=7a46ef82&");
/* harmony import */ var _ProfileDropdown_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProfileDropdown.vue?vue&type=script&lang=js& */ "./resources/js/components/ProfileDropdown.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ProfileDropdown_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProfileDropdown_vue_vue_type_template_id_7a46ef82___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProfileDropdown_vue_vue_type_template_id_7a46ef82___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/ProfileDropdown.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/ProfileDropdown.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/components/ProfileDropdown.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileDropdown_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./ProfileDropdown.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ProfileDropdown.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileDropdown_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/ProfileDropdown.vue?vue&type=template&id=7a46ef82&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/ProfileDropdown.vue?vue&type=template&id=7a46ef82& ***!
  \************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileDropdown_vue_vue_type_template_id_7a46ef82___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./ProfileDropdown.vue?vue&type=template&id=7a46ef82& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ProfileDropdown.vue?vue&type=template&id=7a46ef82&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileDropdown_vue_vue_type_template_id_7a46ef82___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileDropdown_vue_vue_type_template_id_7a46ef82___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/RecordAttendance.vue":
/*!******************************************************!*\
  !*** ./resources/js/components/RecordAttendance.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _RecordAttendance_vue_vue_type_template_id_65b3af85___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./RecordAttendance.vue?vue&type=template&id=65b3af85& */ "./resources/js/components/RecordAttendance.vue?vue&type=template&id=65b3af85&");
/* harmony import */ var _RecordAttendance_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./RecordAttendance.vue?vue&type=script&lang=js& */ "./resources/js/components/RecordAttendance.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _RecordAttendance_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _RecordAttendance_vue_vue_type_template_id_65b3af85___WEBPACK_IMPORTED_MODULE_0__["render"],
  _RecordAttendance_vue_vue_type_template_id_65b3af85___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/RecordAttendance.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/RecordAttendance.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/RecordAttendance.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_RecordAttendance_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./RecordAttendance.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/RecordAttendance.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_RecordAttendance_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/RecordAttendance.vue?vue&type=template&id=65b3af85&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/RecordAttendance.vue?vue&type=template&id=65b3af85& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_RecordAttendance_vue_vue_type_template_id_65b3af85___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./RecordAttendance.vue?vue&type=template&id=65b3af85& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/RecordAttendance.vue?vue&type=template&id=65b3af85&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_RecordAttendance_vue_vue_type_template_id_65b3af85___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_RecordAttendance_vue_vue_type_template_id_65b3af85___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/StreamController.vue":
/*!******************************************************!*\
  !*** ./resources/js/components/StreamController.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _StreamController_vue_vue_type_template_id_647a78b2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./StreamController.vue?vue&type=template&id=647a78b2& */ "./resources/js/components/StreamController.vue?vue&type=template&id=647a78b2&");
/* harmony import */ var _StreamController_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./StreamController.vue?vue&type=script&lang=js& */ "./resources/js/components/StreamController.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _StreamController_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _StreamController_vue_vue_type_template_id_647a78b2___WEBPACK_IMPORTED_MODULE_0__["render"],
  _StreamController_vue_vue_type_template_id_647a78b2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/StreamController.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/StreamController.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/StreamController.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_StreamController_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./StreamController.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StreamController.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_StreamController_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/StreamController.vue?vue&type=template&id=647a78b2&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/StreamController.vue?vue&type=template&id=647a78b2& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_StreamController_vue_vue_type_template_id_647a78b2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./StreamController.vue?vue&type=template&id=647a78b2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/StreamController.vue?vue&type=template&id=647a78b2&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_StreamController_vue_vue_type_template_id_647a78b2___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_StreamController_vue_vue_type_template_id_647a78b2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/VideoPlayer.vue":
/*!*************************************************!*\
  !*** ./resources/js/components/VideoPlayer.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VideoPlayer_vue_vue_type_template_id_9e3bdfbe___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VideoPlayer.vue?vue&type=template&id=9e3bdfbe& */ "./resources/js/components/VideoPlayer.vue?vue&type=template&id=9e3bdfbe&");
/* harmony import */ var _VideoPlayer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./VideoPlayer.vue?vue&type=script&lang=js& */ "./resources/js/components/VideoPlayer.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _VideoPlayer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _VideoPlayer_vue_vue_type_template_id_9e3bdfbe___WEBPACK_IMPORTED_MODULE_0__["render"],
  _VideoPlayer_vue_vue_type_template_id_9e3bdfbe___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/VideoPlayer.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/VideoPlayer.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/VideoPlayer.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VideoPlayer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./VideoPlayer.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VideoPlayer.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VideoPlayer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/VideoPlayer.vue?vue&type=template&id=9e3bdfbe&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/VideoPlayer.vue?vue&type=template&id=9e3bdfbe& ***!
  \********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VideoPlayer_vue_vue_type_template_id_9e3bdfbe___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./VideoPlayer.vue?vue&type=template&id=9e3bdfbe& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/VideoPlayer.vue?vue&type=template&id=9e3bdfbe&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VideoPlayer_vue_vue_type_template_id_9e3bdfbe___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VideoPlayer_vue_vue_type_template_id_9e3bdfbe___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/erich/code/sermonarchive/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /home/erich/code/sermonarchive/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

},[[0,"/js/manifest","/js/vendor"]]]);