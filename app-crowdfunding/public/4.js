(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[4],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/CampaignsDetails.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/CampaignsDetails.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      campaign: {}
    };
  },
  created: function created() {
    this.go();
  },
  methods: {
    go: function go() {
      var _this = this;

      var id = this.$route.params.id;
      var url = '/api/campaigns/' + id;
      axios.get(url).then(function (response) {
        console.log(response);
        var data = response.data.data;
        _this.campaign = data.campaign;
      })["catch"](function (error) {
        var response = error.response;
        console.log(response);
      });
    },
    donate: function donate() {
      alert('donate');
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/CampaignsDetails.vue?vue&type=template&id=75be68fe&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/CampaignsDetails.vue?vue&type=template&id=75be68fe& ***!
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
      _vm.campaign.id
        ? _c(
            "v-card",
            [
              _c(
                "v-img",
                {
                  staticClass: "white--text",
                  attrs: { src: _vm.campaign.image, height: "200px" }
                },
                [
                  _c("v-card-title", {
                    staticClass: "fill-height align-end",
                    domProps: { textContent: _vm._s(_vm.campaign.title) }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "v-card-text",
                [
                  _c("v-simple-table", { attrs: { dense: "" } }, [
                    _c("tbody", [
                      _c("tr", [
                        _c(
                          "td",
                          [
                            _c("v-icon", [_vm._v("mdi-home-city")]),
                            _vm._v(" Alamat")
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c("td", [_vm._v(_vm._s(_vm.campaign.address))])
                      ]),
                      _vm._v(" "),
                      _c("tr", [
                        _c(
                          "td",
                          [
                            _c("v-icon", [_vm._v("mdi-hand-heart")]),
                            _vm._v(" Terkumpul")
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c("td", { staticClass: "blue--text" }, [
                          _vm._v(
                            "Rp " +
                              _vm._s(
                                _vm.campaign.donation_collected.toLocaleString()
                              )
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("tr", [
                        _c(
                          "td",
                          [
                            _c("v-icon", [_vm._v("mdi-hand-heart")]),
                            _vm._v(" Dibutuhkan")
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c("td", { staticClass: "orange--text" }, [
                          _vm._v(
                            "Rp " +
                              _vm._s(
                                _vm.campaign.donation_required.toLocaleString()
                              )
                          )
                        ])
                      ])
                    ])
                  ]),
                  _vm._v("\n            Description:\n            "),
                  _c("p", [_vm._v(_vm._s(_vm.campaign.description))])
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "v-card-actions",
                [
                  _c(
                    "v-btn",
                    {
                      attrs: {
                        block: "",
                        color: "primary",
                        disabled:
                          _vm.campaign.donation_collected >=
                          _vm.campaign.donation_required
                      },
                      on: { click: _vm.donate }
                    },
                    [
                      _c("v-icon", [_vm._v(" mdi-money")]),
                      _vm._v("  \n                DONATE\n            ")
                    ],
                    1
                  )
                ],
                1
              )
            ],
            1
          )
        : _vm._e()
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/CampaignsDetails.vue":
/*!*************************************************!*\
  !*** ./resources/js/views/CampaignsDetails.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CampaignsDetails_vue_vue_type_template_id_75be68fe___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CampaignsDetails.vue?vue&type=template&id=75be68fe& */ "./resources/js/views/CampaignsDetails.vue?vue&type=template&id=75be68fe&");
/* harmony import */ var _CampaignsDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CampaignsDetails.vue?vue&type=script&lang=js& */ "./resources/js/views/CampaignsDetails.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _CampaignsDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _CampaignsDetails_vue_vue_type_template_id_75be68fe___WEBPACK_IMPORTED_MODULE_0__["render"],
  _CampaignsDetails_vue_vue_type_template_id_75be68fe___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/CampaignsDetails.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/CampaignsDetails.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/views/CampaignsDetails.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CampaignsDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./CampaignsDetails.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/CampaignsDetails.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CampaignsDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/CampaignsDetails.vue?vue&type=template&id=75be68fe&":
/*!********************************************************************************!*\
  !*** ./resources/js/views/CampaignsDetails.vue?vue&type=template&id=75be68fe& ***!
  \********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CampaignsDetails_vue_vue_type_template_id_75be68fe___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./CampaignsDetails.vue?vue&type=template&id=75be68fe& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/CampaignsDetails.vue?vue&type=template&id=75be68fe&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CampaignsDetails_vue_vue_type_template_id_75be68fe___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CampaignsDetails_vue_vue_type_template_id_75be68fe___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);