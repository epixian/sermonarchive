(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/app"],{

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
      this.body = this.body.trim();

      if (this.body !== '') {
        axios.post('/prayer', {
          'body': this.body
        }).then(function (response) {
          return response.data;
        }).then(function (data) {
          return console.log(data);
        });
      }
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
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    sermon: {
      type: Object,
      required: true
    }
  },
  data: function data() {
    return {
      stream_started: false
    };
  },
  methods: {
    goLive: function goLive() {
      var _this = this;

      axios.post('/admin/sermons/' + this.sermon.id + '/status', {
        stream_started: true
      }).then(function (response) {
        return response.json();
      }).then(function (data) {
        _this.stream_started = data.stream_started;
      });
    }
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
          on: {
            click: function($event) {
              _vm.show = true
            }
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
                      _c("div", { staticClass: "mt-3 text-center sm:mt-5" }, [
                        _c(
                          "h3",
                          {
                            staticClass:
                              "text-lg leading-6 font-medium text-gray-900"
                          },
                          [
                            _vm._v(
                              "\n              Request Prayer\n            "
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "mt-2" }, [
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
                                  "\n                  How can we pray for you?\n                "
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "mt-1 rounded-md shadow-sm" },
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
                                  "inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-nl-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-nl-green-500 focus:outline-none focus:border-nl-green-700 focus:shadow-outline-nl-green transition ease-in-out duration-150 sm:text-sm sm:leading-5",
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
    _c("span", { staticClass: "inline-flex rounded-md shadow-sm" }, [
      _c(
        "button",
        {
          staticClass:
            "inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150",
          attrs: { type: "button", disabled: _vm.stream_started },
          on: { click: _vm.goLive }
        },
        [_vm._v("\n      Go Live\n    ")]
      )
    ])
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
                    attrs: {
                      src:
                        "https://stream.newlifeglenside.com/recordings/" +
                        _vm.sermon.stream_key +
                        ".mp4",
                      type: "video/mp4"
                    }
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
      _vm.statusText === "processing"
        ? _c("div", {}, [
            _c("p", { staticClass: "px-4 sm:px-0" }, [
              _vm._v(
                "\n      The stream has ended.  Please check back later when the video is done processing.\n    "
              )
            ]),
            _vm._v(" "),
            _c("img", {
              staticClass: "mt-4 w-full shadow-md max-w-3xl",
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
            _vm.description
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
Vue.component('prayer-request', __webpack_require__(/*! ./components/PrayerRequest.vue */ "./resources/js/components/PrayerRequest.vue")["default"]); // Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
// Vue.component('chat-input', require('./components/ChatInput.vue').default);

var video = new Vue({
  el: '#videoplayer'
});
var attendance = new Vue({
  el: '#attendance'
});
var nav = new Vue({
  el: '#nav'
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

__webpack_require__(/*! /mnt/c/code/sermonarchive/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /mnt/c/code/sermonarchive/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

},[[0,"/js/manifest","/js/vendor"]]]);