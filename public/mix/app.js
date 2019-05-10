(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/mix/app"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Steps.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Steps.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'steps',
  props: {
    path: {
      type: String,
      "default": ""
    }
  },
  data: function data() {
    return {
      currentStep: 0,
      steps: ["Quantity and Size", "Wood", "Glue", "Concave", "Bottom Print", "Top Print", "Engravery", "Engravery", "Veneer Colors", "Cardboard", "Box"]
    };
  },
  methods: {
    goToStep: function goToStep(step, orderPath) {
      if (window.location.href != orderPath && orderPath != '') {
        window.location.href = orderPath;
        return;
      }

      this.currentStep = step;
      WizardDemo.gotoStep(step);
    }
  },
  mounted: function mounted() {
    if (this.path === window.location.href || this.path.length === 0) {
      this.currentStep = 1;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/VendorCode.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/VendorCode.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'vendor-code',
  data: function data() {
    return {};
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _views_Step1_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./views/Step1.vue */ "./resources/assets/js/components/configurator/views/Step1.vue");
/* harmony import */ var _views_Step2_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./views/Step2.vue */ "./resources/assets/js/components/configurator/views/Step2.vue");
/* harmony import */ var _views_Step3_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./views/Step3.vue */ "./resources/assets/js/components/configurator/views/Step3.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: 'skateboard-decks-configurator',
  props: {
    user: {
      type: Object,
      "default": null
    },
    order: {
      type: Object,
      "default": null
    }
  },
  components: {
    skateboardDecksStep1: _views_Step1_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
    skateboardDecksStep2: _views_Step2_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    skateboardDecksStep3: _views_Step3_vue__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      colorData: {
        'natural': '#FFE4C4',
        'brown': '#A52A2A',
        'orange': '#FFA500',
        'red': 'red',
        'lime green': '#32CD32',
        'black': 'black',
        'yellow': 'yellow',
        'green': 'green',
        'grey': 'grey',
        'purple': '#800080',
        'pink': '#FFC0CB',
        'blue': 'blue',
        'scarlet': '#ff2400',
        'dark blue': '#00008B',
        'deep violet': '#9400D3',
        'wood red': '#65000b',
        'royal purple': '#9370DB',
        'light blue': '#87CEFA',
        'yellowish brown': '#F4A460',
        'random': '#FFE4C4'
      },
      colorNames: ['natural', 'brown', 'orange', 'red', 'lime green', 'black', 'yellow', 'green', 'grey', 'purple', 'pink', 'blue', 'scarlet', 'dark blue', 'deep violet', 'wood red', 'royal purple', 'light blue', 'yellowish brown'],
      partNames: [],
      currentColors: ['natural', 'natural', 'natural', 'natural', 'natural', 'natural', 'natural'],
      title: 'Skateboard Deck Configurator',
      randomColors: [],
      currentStep: 0,
      quantity: 0,
      total_quantity: 0,
      batchTotal: 0,
      total: 0,
      fixedprice: 0,
      perdeck: 0,
      size: "",
      pre_quantity: 0,
      pre_size: "" // steps: [ 
      //     {state: false}, 
      //     {state: true}, 
      //     {state: true}, 
      //     {state: true}, 
      //     {state: false},                      
      //     {state: false, name: ''}, 
      //     {state: false, name: ''}, 
      //     {state: true, name: ''}, 
      //     {
      //         fulldip: {state: false,color: ""}, 
      //         transparent: {state: false, color: ""}, 
      //         metallic: {state: false, color: ""}, 
      //         blacktop: {state: false}, 
      //         blackmidlayer: {state: false}, 
      //         pattern: {state: false}, 
      //     },                     
      //     {state: false, name: ''}, 
      //     {state: false, name: ''}, 
      // ],

    };
  },
  computed: {
    steps: function steps() {
      return this.$store.getters['configurator/skateboardSteps'];
    },
    progressWidth: function progressWidth() {
      return {
        width: 100 * this.currentStep / 10 + '%'
      };
    },
    sizePrice: function sizePrice() {
      var match = this.size.match(/[0-9.]{3}/) || [];
      if (!match.length) return 0;
      var value = parseFloat(match[0]);

      if (value < 7.0) {
        return 0;
      } else if (value >= 7.0 && value < 8.0) {
        return 8.5;
      } else if (value >= 8.0 && value < 8.5) {
        return 9.5;
      } else if (value >= 8.5) return 10.0;
    },
    quantityPrice: function quantityPrice() {
      if (this.total_quantity < 20) {
        return 50;
      } else if (this.total_quantity >= 20 && this.total_quantity < 30) {
        return 40;
      } else if (this.total_quantity >= 30 && this.total_quantity < 40) {
        return 30;
      } else if (this.total_quantity >= 40 && this.total_quantity < 50) {
        return 10;
      } else if (this.total_quantity >= 50 && this.total_quantity < 100) {
        return 6;
      } else if (this.total_quantity >= 100 && this.total_quantity < 200) {
        return 4;
      } else if (this.total_quantity >= 200 && this.total_quantity < 300) {
        return 3;
      } else if (this.total_quantity >= 300 && this.total_quantity < 500) {
        return 2.5;
      } else if (this.total_quantity >= 500 && this.total_quantity < 1000) {
        return 1.5;
      } else if (this.total_quantity >= 1000 && this.total_quantity < 2000) {
        return 1;
      } else if (this.total_quantity >= 2000 && this.total_quantity < 5000) {
        return 0.5;
      } else if (this.total_quantity >= 5000) {
        return 0;
      }
    },
    deckPrice: function deckPrice() {
      return this.sizePrice + this.quantityPrice;
    }
  },
  methods: {
    save: function save(event) {
      var formData = new FormData();
      formData.append('id', $('#saved_order_id').val());
      formData.append('quantity', this.quantity);
      formData.append('size', $('#size').val());
      formData.append('concave', this.steps[1].state ? 'Deep Concave' : 'Mediumn Concave');
      formData.append('wood', this.steps[2].state ? 'European Maple Wood' : 'American Maple Wood');
      formData.append('glue', this.steps[3].state ? 'American Glue' : 'Epoxy Glue');
      formData.append('bottomprint', this.steps[4].state ? $('#bottomPrintFile').attr('fileName') : '');
      formData.append('topprint', this.steps[5].state ? $('#topPrintFile').attr('fileName') : '');
      formData.append('engravery', this.steps[6].state ? $('#engraveryFile').attr('fileName') : '');
      formData.append('veneer', JSON.stringify(this.currentColors));
      formData.append('extra', JSON.stringify(this.steps[8]));
      formData.append('cardboard', this.steps[9].state ? $('#cardboardFile').attr('fileName') : '');
      formData.append('carton', this.steps[10].state ? $('#cartonFile').attr('fileName') : '');
      formData.append('perdeck', this.perdeck);
      formData.append('total', (this.quantity * app.perdeck + this.fixedprice).toFixed(2));
      formData.append('fixedprice', this.fixedprice);
      axios.post('/skateboard-deck-configurator', formData).then(function (response) {
        window.location.href = "/summary";
      })["catch"](function (error) {
        console.error(error);
      });
    },
    color: function color(index) {
      if (index < 20) return this.colorNames[index];else return 'white';
    },
    currentColor: function currentColor(index) {
      if (index < 7) return this.currentColors[index];else return 'white';
    },
    colorClicked: function colorClicked(event) {
      // check active random colors
      if (!this.steps[7].state) {
        this.steps[7].state = true;
        this.currentColors.fill('natural');
      }

      var part, color;

      if (event.target.getAttribute('data-part-id') == null) {
        part = parseInt(event.target.parentElement.getAttribute('data-part-id'));
        color = event.target.parentElement.getAttribute('data-color-name');
      } else {
        part = parseInt(event.target.getAttribute('data-part-id'));
        color = event.target.getAttribute('data-color-name');
      }

      var org_c = 0;

      for (i = 0; i < this.currentColors.length; i++) {
        if (this.currentColors[i] != 'natural') org_c++;
      }

      this.currentColors[part] = color;
      var c = 0;

      for (i = 0; i < this.currentColors.length; i++) {
        if (this.currentColors[i] != 'natural') c++;
      }

      if (org_c == 0 && c > 0) this.perdeck += 0.4;else if (org_c < c && c > 3) this.perdeck += 0.4;else if (org_c > c && c > 2) this.perdeck -= 0.4;else if (c == 0 && org_c > 0) this.perdeck -= 0.4;
      this.renderProduct();
    },
    randomClicked: function randomClicked(event) {
      this.steps[7].state = !this.steps[7].state;

      if (this.steps[7].state) {
        this.currentColors.fill('natural');
      } else {
        // Selected colors when don`t 'natural'
        var selectedColors = this.currentColors.filter(function (c) {
          return c != 'natural';
        }).length;

        if (selectedColors >= 1 && selectedColors < 4) {
          this.perdeck -= 0.4;
        } else if (selectedColors >= 4 && selectedColors < 5) {
          this.perdeck -= 0.8;
        } else if (selectedColors >= 5) {
          this.perdeck -= 1.2;
        }

        this.currentColors.fill('random');
      }

      this.renderProduct();
    },
    nextStep: function nextStep() {
      if (this.currentStep < 10) this.currentStep++;
    },
    prevStep: function prevStep() {
      if (this.currentStep > 0) this.currentStep--;
    },
    sizeChange: function sizeChange(size) {
      this.size = size;

      if (this.pre_size != "") {
        if (this.pre_size < '8') this.perdeck -= 8.5;else if (this.pre_size < '8.5') this.perdeck -= 9.5;else this.perdeck -= 10;
      }

      if (this.size < '8') this.perdeck += 8.5;else if (this.size < '8.5') this.perdeck += 9.5;else this.perdeck += 10;
      this.pre_size = this.size;
    },
    quantityChange: function quantityChange(quantity) {
      this.quantity = quantity;

      if (this.quantity % 10 != 0) {
        swal({
          title: "",
          text: "Select Only quantities in steps of 10 (10, 20, ...)",
          type: "alert",
          confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
        }).then(function (value) {});
        this.quantity = this.pre_quantity;
        return false;
      }

      if (this.pre_quantity > 0) {
        if (this.total_quantity < 20) {
          this.perdeck -= 50;
        } else if (this.total_quantity >= 20 && this.total_quantity < 30) {
          this.perdeck -= 40;
        } else if (this.total_quantity >= 30 && this.total_quantity < 40) {
          this.perdeck -= 30;
        } else if (this.total_quantity >= 40 && this.total_quantity < 50) {
          this.perdeck -= 10;
        } else if (this.total_quantity >= 50 && this.total_quantity < 100) {
          this.perdeck -= 6;
        } else if (this.total_quantity >= 100 && this.total_quantity < 200) {
          this.perdeck -= 4;
        } else if (this.total_quantity >= 200 && this.total_quantity < 300) {
          this.perdeck -= 3;
        } else if (this.total_quantity >= 300 && this.total_quantity < 500) {
          this.perdeck -= 2.5;
        } else if (this.total_quantity >= 500 && this.total_quantity < 1000) {
          this.perdeck -= 1.5;
        } else if (this.total_quantity >= 1000 && this.total_quantity < 2000) {
          this.perdeck -= 1;
        } else if (this.total_quantity >= 2000 && this.total_quantity < 5000) {
          this.perdeck -= 0.5;
        } else if (this.total_quantity >= 5000) {
          this.perdeck -= 0;
        }
      }

      this.total_quantity -= this.pre_quantity * 1;
      this.total_quantity += this.quantity * 1;
      this.pre_quantity = this.quantity;

      if (this.total_quantity < 20) {
        this.perdeck += 50;
      } else if (this.total_quantity >= 20 && this.total_quantity < 30) {
        this.perdeck += 40;
      } else if (this.total_quantity >= 30 && this.total_quantity < 40) {
        this.perdeck += 30;
      } else if (this.total_quantity >= 40 && this.total_quantity < 50) {
        this.perdeck += 10;
      } else if (this.total_quantity >= 50 && this.total_quantity < 100) {
        this.perdeck += 6;
      } else if (this.total_quantity >= 100 && this.total_quantity < 200) {
        this.perdeck += 4;
      } else if (this.total_quantity >= 200 && this.total_quantity < 300) {
        this.perdeck += 3;
      } else if (this.total_quantity >= 300 && this.total_quantity < 500) {
        this.perdeck += 2.5;
      } else if (this.total_quantity >= 500 && this.total_quantity < 1000) {
        this.perdeck += 1.5;
      } else if (this.total_quantity >= 1000 && this.total_quantity < 2000) {
        this.perdeck += 1;
      } else if (this.total_quantity >= 2000 && this.total_quantity < 5000) {
        this.perdeck += 0.5;
      } else if (this.total_quantity >= 5000) {
        this.perdeck += 0;
      }
    },
    renderProduct: function renderProduct() {
      this.validateColorPanel();
      var imgArr = [];

      for (var i = 0; i < this.currentColors.length; i++) {
        if (this.currentColors[i] == 'random') {
          imgArr.push('/skateboard-deck-production/8.1 veneers/' + 'natural/000' + (i + 1) + ".png");
          continue;
        }

        imgArr.push('/skateboard-deck-production/8.1 veneers/' + this.currentColors[i] + '/000' + (i + 1) + ".png");
      }

      mergeImages(imgArr).then(function (b64) {
        var product = document.getElementById('productCanvas');

        if (product != null) {
          product.src = b64;
        }
      });
    },
    validateColorPanel: function validateColorPanel() {
      var dropdownMenus = document.getElementsByClassName('skate-color-dropdown-menu');

      for (var i = 0; i < dropdownMenus.length; i++) {
        dropdownMenus[i].firstElementChild.innerHTML = i + 1 + ". " + this.currentColors[i];
        dropdownMenus[i].lastElementChild.style.setProperty('background', this.colorData[this.currentColors[i]]);
      }
    }
  },
  created: function created() {
    var _this = this;

    // Global quantity batches plus current total.
    this.total_quantity += this.batchTotal;
    setTimeout(function () {
      var length = _this.currentColors.length;

      for (var _i = 0; _i < length; _i++) {
        _this.$set(_this.partNames, _i, {});

        _this.$set(_this.partNames[_i], 'number', _i + 1);

        _this.$set(_this.partNames[_i], 'name', _this.currentColor(_i));

        _this.$set(_this.partNames[_i], 'bg', _this.colorData[_this.currentColors[_i]]);
      }
    }, 2000);
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/views/Step1.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/configurator/views/Step1.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: 'skateboard-decks-step-1',
  data: function data() {
    return {
      quantity: 0,
      size: "",
      sizes: ['7.0" x 28" (A1: WB 11.73", N 6.06", T 6.0")', '7.25" x 29" (B1: WB13.5": N5.87", T5.47")', '7.375" x 30" (C1: WB12.81" : N6.81" , T6.18")', '7.5" x 30.75" (D1: WB14.02": N6.40", T6.16")', '7.5" x 31" (D2: WB14.02": N6.59", T6.20")', '7.5" x 31.25" (D3: WB14.02": N6.73", T6.34")', '7.5" x 31.5" (D4: WB14.02": N6.77", T6.54")', '7.625" x 31.125" (E1: WB14.02": N6.57", T6.38")', '7.625" x 31.25" (E2: WB14.02": N6.73", T6.34")', '7.625" x 31.5" (E3: WB14.02": N6.83", T6.44")', '7.75" x 31" (F1: WB 14.02", N 6.60", T 6.20")', '7.75" x 31.125" (F2: WB14.02": N6.73", T6.22")', '7.75" x 31.5" (F3: WB14.02": N6.85", T6.46")', '7.75" x 31.75" (F4: WB14.02": N6.93", T6.65")', '7.875" x 31.1875" (G1: WB14.02": N6.77", T6.22")', '7.875" x 31.3" (G2: WB14.02": N6.75", T6.36")', '7.875" x 31.625" (G3: WB 14.25", N 6.79", T 6.40")', '7.875" x 31.875" (G4: WB14.25": N6.93", T6.54")', '8.0" x 31" (H1: WB14.02": N6.59", T6.20")', '8.0" x 31.375" (H2: WB14.02": N6.87", T6.32")', '8.0" x 31.5" (H3: WB14.02": N6.93", T6.38")', '8.0" x 31.75" (H4: WB14.25": N6.81", T6.50")', '8.0" x 31.75" (H5: WB14.21" : N6.87", T6.47")', '8.0" x 31.875" (H6: WB14.25": N6.85", T6.61")', '8.0" x 32" (H7: WB14.02": N7.13", T6.65")', '8.125" x 31.5" (I1: WB14.02": N6.75" , T6.55")', '8.125" x 31.75" (I2: WB14.02": N6.97", T6.57")', '8.125" x 31.875" (I3: WB14.25" : N6.8" , T6.625")', '8.125" x 31.875" (I4: WB14.5": N6.85", T6.34")', '8.125" x 32" (I5: WB14.25" : N6.9375" , T6.61")', '8.25" x 31.625" (I6: WB14.25" : N6.75" , T6.425")', '8.25" x 31.75" (J1: WB14.5": N6.65", T6.42")', '8.25" x 32" (J2: WB14.25" : N7.0" , T6.55" )', '8.25" x 32.56" (J3: WB15": N6.89", T6.50")', '8.375" x 32.1875"  (K1: WB14.5": N7.01", T6.54")', '8.375" x 32.125" (K2: WB14.5": N6.89", T6.58")', '8.5" x 32" (L1: WB14.37": N6.95", T6.52")', '8.5" x 32.125" (L2: WB14.56": N6.81", T6.57")', '8.5" x 32.5" (L3: WB15": N6.79", T6.44")', '8.5" x 32.875" (L4: WB15.04": N6.97", T6.69")', '8.75" x 32.5" (M1: WB14.625" : N7.13", T6.55")']
    };
  },
  methods: {
    quantityChange: function quantityChange() {
      this.$emit('quantityChange', this.quantity);
    },
    sizeChange: function sizeChange(event) {
      this.$emit('sizeChange', this.size);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/views/Step2.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/configurator/views/Step2.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: 'skateboard-decks-step-2',
  data: function data() {
    return {
      state: true
    };
  },
  watch: {
    state: _.debounce(function (newVal) {
      this.$store.commit('configurator/changeState', {
        index: 1,
        data: newVal
      });
    }, 500)
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/views/Step3.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/configurator/views/Step3.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: 'skateboard-decks-step-3',
  data: function data() {
    return {
      state: true
    };
  },
  watch: {
    state: _.debounce(function (newVal) {
      this.$store.commit('configurator/changeState', {
        index: 2,
        data: newVal
      });
    }, 500)
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Steps.vue?vue&type=template&id=cec92000&":
/*!***************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Steps.vue?vue&type=template&id=cec92000& ***!
  \***************************************************************************************************************************************************************************************************************/
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
    "ul",
    { staticClass: "m-menu__subnav" },
    _vm._l(_vm.steps, function(step, index) {
      return _c(
        "li",
        {
          staticClass: "m-menu__item",
          class: [_vm.currentStep == ++index ? "m-menu__item--active" : ""],
          attrs: { "aria-haspopup": "true" },
          on: {
            click: function($event) {
              return _vm.goToStep(index, _vm.path)
            }
          }
        },
        [
          _c("a", { staticClass: "m-menu__link " }, [
            _vm._m(0, true),
            _vm._v(" "),
            _c("span", { staticClass: "m-menu__link-text" }, [
              _vm._v(_vm._s(index) + ". " + _vm._s(step))
            ])
          ])
        ]
      )
    }),
    0
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "i",
      { staticClass: "m-menu__link-bullet m-menu__link-bullet--dot" },
      [_c("span")]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/VendorCode.vue?vue&type=template&id=4b347e4c&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/VendorCode.vue?vue&type=template&id=4b347e4c& ***!
  \********************************************************************************************************************************************************************************************************************/
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
  return _vm._m(0)
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30",
        attrs: { role: "alert" }
      },
      [
        _c("div", { staticClass: "m-alert__icon" }, [
          _c("i", { staticClass: "flaticon-businesswoman m--font-brand" })
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "m-alert__text" }, [
          _c(
            "form",
            { staticClass: "m-form m-form--fit m-form--label-align-right" },
            [
              _c("div", { staticClass: "m-portlet__body" }, [
                _c("div", { staticClass: "row" }, [
                  _c(
                    "div",
                    {
                      staticClass: "col-3",
                      staticStyle: { "min-width": "150px" }
                    },
                    [
                      _c("input", {
                        staticClass: "form-control m-input",
                        attrs: {
                          type: "text",
                          value: "",
                          placeholder: "Vendor Code"
                        }
                      })
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "a",
                    {
                      staticClass:
                        "btn btn-secondary m-btn m-btn--icon m-btn--air",
                      attrs: { href: "#" }
                    },
                    [_c("span", [_c("span", [_vm._v("Add")])])]
                  )
                ])
              ])
            ]
          )
        ])
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue?vue&type=template&id=47b82d60&":
/*!**************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue?vue&type=template&id=47b82d60& ***!
  \**************************************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "m-content" }, [
    _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-xl-9" }, [
        _c("div", { staticClass: "m-portlet" }, [
          _vm._m(0),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "m-wizard m-wizard--1 m-wizard--success",
              attrs: { id: "m_wizard" }
            },
            [
              _c("div", { staticClass: "m-portlet__padding-x" }),
              _vm._v(" "),
              _c("div", { staticClass: "m-wizard__progress" }, [
                _c(
                  "div",
                  { staticClass: "progress", staticStyle: { height: "2px" } },
                  [
                    _c("div", {
                      staticClass: "progress-bar m--bg-info",
                      style: _vm.progressWidth,
                      attrs: {
                        role: "progressbar",
                        "aria-valuenow": "65",
                        "aria-valuemin": "0",
                        "aria-valuemax": "100"
                      }
                    })
                  ]
                ),
                _vm._v(" "),
                _vm._m(1)
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "m-wizard__form" }, [
                _c(
                  "form",
                  {
                    staticClass:
                      "m-form m-form--label-align-left- m-form--state-",
                    attrs: {
                      id: "m_form",
                      method: "POST",
                      action: "/skateboard-deck-configurator"
                    }
                  },
                  [
                    _c("input", {
                      attrs: { type: "hidden", id: "saved_order_id" }
                    }),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "m-portlet__body" },
                      [
                        _c("skateboard-decks-step-1", {
                          on: {
                            quantityChange: _vm.quantityChange,
                            sizeChange: _vm.sizeChange
                          }
                        }),
                        _vm._v(" "),
                        _c("skateboard-decks-step-2"),
                        _vm._v(" "),
                        _c("skateboard-decks-step-3"),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "m-wizard__form-step",
                            attrs: { id: "m_wizard_form_step_4" }
                          },
                          [
                            _c("div", { staticClass: "row" }, [
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(2),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    _vm.steps[3].state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[3].state = !_vm
                                                                  .steps[3]
                                                                  .state),
                                                                  (_vm.perdeck += 0.9)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[3].state = !_vm
                                                                  .steps[3]
                                                                  .state),
                                                                  (_vm.perdeck -= 0.9)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(3)
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(4),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    !_vm.steps[3].state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[3].state = !_vm
                                                                  .steps[3]
                                                                  .state),
                                                                  (_vm.perdeck -= 0.9)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[3].state = !_vm
                                                                  .steps[3]
                                                                  .state),
                                                                  (_vm.perdeck += 0.9)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(5)
                                  ]
                                )
                              ])
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "m-wizard__form-step",
                            attrs: { id: "m_wizard_form_step_5" }
                          },
                          [
                            _c("div", { staticClass: "row" }, [
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(6),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    _vm.steps[4].state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[4].state = !_vm
                                                                  .steps[4]
                                                                  .state),
                                                                  (_vm.perdeck -= 0.75)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[4].state = !_vm
                                                                  .steps[4]
                                                                  .state),
                                                                  (_vm.perdeck += 0.75)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__body" },
                                      [
                                        _c(
                                          "div",
                                          { staticClass: "m-widget17" },
                                          [
                                            _vm._m(7),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "form-group m-form__group"
                                              },
                                              [
                                                _c("div"),
                                                _vm._v(" "),
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass: "custom-file"
                                                  },
                                                  [
                                                    _c("input", {
                                                      staticClass:
                                                        "custom-file-input",
                                                      attrs: {
                                                        onclick:
                                                          "() => {user ? true : false}",
                                                        type: "file",
                                                        "data-type-upload":
                                                          "bottom",
                                                        id: "bottomPrintFile"
                                                      },
                                                      on: {
                                                        click: function(
                                                          $event
                                                        ) {
                                                          ;(_vm.perdeck += _vm
                                                            .steps[4].state
                                                            ? 0
                                                            : 0.75),
                                                            (_vm.steps[4].state = 1)
                                                        }
                                                      }
                                                    }),
                                                    _vm._v(" "),
                                                    _c(
                                                      "label",
                                                      {
                                                        staticClass:
                                                          "custom-file-label unchecked",
                                                        class: {
                                                          checked:
                                                            _vm.steps[4].state
                                                        },
                                                        attrs: {
                                                          for: "customFile"
                                                        }
                                                      },
                                                      [
                                                        _vm._v(
                                                          "Upload artwork preview"
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              { staticClass: "dropdown" },
                                              [
                                                _c(
                                                  "button",
                                                  {
                                                    staticClass:
                                                      "btn btn-secondary dropdown-toggle unchecked",
                                                    class: {
                                                      checked:
                                                        _vm.steps[4].state
                                                    },
                                                    staticStyle: {
                                                      width: "100%"
                                                    },
                                                    attrs: {
                                                      type: "button",
                                                      id: "dropdownMenuButton",
                                                      "data-toggle": "dropdown",
                                                      "aria-haspopup": "true",
                                                      "aria-expanded": "false"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        ;(_vm.perdeck += _vm
                                                          .steps[4].state
                                                          ? 0
                                                          : 0.75),
                                                          (_vm.steps[4].state = 1)
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                                                                        Recent file\n                                                                    "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "dropdown-menu",
                                                    attrs: {
                                                      "aria-labelledby":
                                                        "dropdownMenuButton"
                                                    }
                                                  },
                                                  [
                                                    _c(
                                                      "a",
                                                      {
                                                        staticClass:
                                                          "dropdown-item file-dropdown",
                                                        attrs: { href: "#" },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            ;(_vm.perdeck += _vm
                                                              .steps[4].state
                                                              ? 0
                                                              : 0.75),
                                                              (_vm.steps[4].state = 1)
                                                          }
                                                        }
                                                      },
                                                      [_vm._v("$filename")]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _vm._m(8)
                                          ]
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(9),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    !_vm.steps[4].state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[4].state = !_vm
                                                                  .steps[4]
                                                                  .state),
                                                                  (_vm.perdeck += 0.75)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[4].state = !_vm
                                                                  .steps[4]
                                                                  .state),
                                                                  (_vm.perdeck -= 0.75)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(10)
                                  ]
                                )
                              ])
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "m-wizard__form-step",
                            attrs: { id: "m_wizard_form_step_6" }
                          },
                          [
                            _c("div", { staticClass: "row" }, [
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(11),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    _vm.steps[5].state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[5].state = !_vm
                                                                  .steps[5]
                                                                  .state),
                                                                  (_vm.perdeck -= 0.75)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[5].state = !_vm
                                                                  .steps[5]
                                                                  .state),
                                                                  (_vm.perdeck += 0.75)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__body" },
                                      [
                                        _c(
                                          "div",
                                          { staticClass: "m-widget17" },
                                          [
                                            _vm._m(12),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "form-group m-form__group"
                                              },
                                              [
                                                _c("div"),
                                                _vm._v(" "),
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass: "custom-file"
                                                  },
                                                  [
                                                    _c("input", {
                                                      staticClass:
                                                        "custom-file-input",
                                                      attrs: {
                                                        onclick:
                                                          "() => { user ? true : false}",
                                                        type: "file",
                                                        "data-type-upload":
                                                          "top",
                                                        id: "topPrintFile"
                                                      },
                                                      on: {
                                                        click: function(
                                                          $event
                                                        ) {
                                                          ;(_vm.perdeck += _vm
                                                            .steps[5].state
                                                            ? 0
                                                            : 0.75),
                                                            (_vm.steps[5].state = 1)
                                                        }
                                                      }
                                                    }),
                                                    _vm._v(" "),
                                                    _c(
                                                      "label",
                                                      {
                                                        staticClass:
                                                          "custom-file-label unchecked",
                                                        class: {
                                                          checked:
                                                            _vm.steps[5].state
                                                        },
                                                        attrs: {
                                                          for: "customFile"
                                                        }
                                                      },
                                                      [_vm._v("Choose file")]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              { staticClass: "dropdown" },
                                              [
                                                _c(
                                                  "button",
                                                  {
                                                    staticClass:
                                                      "btn btn-secondary dropdown-toggle unchecked",
                                                    class: {
                                                      checked:
                                                        _vm.steps[5].state
                                                    },
                                                    staticStyle: {
                                                      width: "100%"
                                                    },
                                                    attrs: {
                                                      type: "button",
                                                      id: "dropdownMenuButton",
                                                      "data-toggle": "dropdown",
                                                      "aria-haspopup": "true",
                                                      "aria-expanded": "false"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        ;(_vm.perdeck += _vm
                                                          .steps[5].state
                                                          ? 0
                                                          : 0.75),
                                                          (_vm.steps[5].state = 1)
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                                                                        Recent file\n                                                                    "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "dropdown-menu",
                                                    attrs: {
                                                      "aria-labelledby":
                                                        "dropdownMenuButton"
                                                    }
                                                  },
                                                  [
                                                    _c(
                                                      "a",
                                                      {
                                                        staticClass:
                                                          "dropdown-item file-dropdown",
                                                        attrs: { href: "#" },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            ;(_vm.perdeck += _vm
                                                              .steps[5].state
                                                              ? 0
                                                              : 0.75),
                                                              (_vm.steps[5].state = 1)
                                                          }
                                                        }
                                                      },
                                                      [_vm._v("$filename")]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _vm._m(13)
                                          ]
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(14),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    !_vm.steps[5].state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[5].state = !_vm
                                                                  .steps[5]
                                                                  .state),
                                                                  (_vm.perdeck += 0.75)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[5].state = !_vm
                                                                  .steps[5]
                                                                  .state),
                                                                  (_vm.perdeck -= 0.75)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(15)
                                  ]
                                )
                              ])
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "m-wizard__form-step",
                            attrs: { id: "m_wizard_form_step_7" }
                          },
                          [
                            _c("div", { staticClass: "row" }, [
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(16),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    _vm.steps[6].state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[6].state = !_vm
                                                                  .steps[6]
                                                                  .state),
                                                                  (_vm.perdeck -= 0.75)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[6].state = !_vm
                                                                  .steps[6]
                                                                  .state),
                                                                  (_vm.perdeck += 0.75)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__body" },
                                      [
                                        _c(
                                          "div",
                                          { staticClass: "m-widget17" },
                                          [
                                            _vm._m(17),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "form-group m-form__group"
                                              },
                                              [
                                                _c("div"),
                                                _vm._v(" "),
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass: "custom-file"
                                                  },
                                                  [
                                                    _c("input", {
                                                      staticClass:
                                                        "custom-file-input",
                                                      attrs: {
                                                        onclick:
                                                          "() => { user ? true : false}",
                                                        type: "file",
                                                        "data-type-upload":
                                                          "engravery",
                                                        id: "engraveryFile"
                                                      },
                                                      on: {
                                                        click: function(
                                                          $event
                                                        ) {
                                                          ;(_vm.perdeck += _vm
                                                            .steps[6].state
                                                            ? 0
                                                            : 0.75),
                                                            (_vm.steps[6].state = 1)
                                                        }
                                                      }
                                                    }),
                                                    _vm._v(" "),
                                                    _c(
                                                      "label",
                                                      {
                                                        staticClass:
                                                          "custom-file-label unchecked",
                                                        class: {
                                                          checked:
                                                            _vm.steps[6].state
                                                        },
                                                        attrs: {
                                                          for: "customFile"
                                                        }
                                                      },
                                                      [_vm._v("Choose file")]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              { staticClass: "dropdown" },
                                              [
                                                _c(
                                                  "button",
                                                  {
                                                    staticClass:
                                                      "btn btn-secondary dropdown-toggle unchecked",
                                                    class: {
                                                      checked:
                                                        _vm.steps[6].state
                                                    },
                                                    staticStyle: {
                                                      width: "100%"
                                                    },
                                                    attrs: {
                                                      type: "button",
                                                      id: "dropdownMenuButton",
                                                      "data-toggle": "dropdown",
                                                      "aria-haspopup": "true",
                                                      "aria-expanded": "false"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        ;(_vm.perdeck += _vm
                                                          .steps[6].state
                                                          ? 0
                                                          : 0.75),
                                                          (_vm.steps[6].state = 1)
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                                                                        Recent file\n                                                                    "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "dropdown-menu",
                                                    attrs: {
                                                      "aria-labelledby":
                                                        "dropdownMenuButton"
                                                    }
                                                  },
                                                  [
                                                    _c(
                                                      "a",
                                                      {
                                                        staticClass:
                                                          "dropdown-item file-dropdown",
                                                        attrs: { href: "#" },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            ;(_vm.perdeck += _vm
                                                              .steps[6].state
                                                              ? 0
                                                              : 0.75),
                                                              (_vm.steps[6].state = 1)
                                                          }
                                                        }
                                                      },
                                                      [_vm._v("$filename")]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _vm._m(18)
                                          ]
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(19),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    !_vm.steps[6].state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[6].state = !_vm
                                                                  .steps[6]
                                                                  .state),
                                                                  (_vm.perdeck += 0.75)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[6].state = !_vm
                                                                  .steps[6]
                                                                  .state),
                                                                  (_vm.perdeck -= 0.75)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(20)
                                  ]
                                )
                              ])
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "m-wizard__form-step",
                            attrs: { id: "m_wizard_form_step_8" }
                          },
                          [
                            _c("div", { staticClass: "row" }, [
                              _c("div", { staticClass: "col-xl-4" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi configurator-color-panel "
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__body" },
                                      [
                                        _c(
                                          "div",
                                          { staticClass: "m-widget4" },
                                          _vm._l(_vm.partNames, function(
                                            partName
                                          ) {
                                            return _c(
                                              "div",
                                              { staticClass: "dropdown" },
                                              [
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "btn btn-secondary  dropdown-toggle skate-color-dropdown-menu",
                                                    attrs: {
                                                      "data-toggle": "dropdown",
                                                      "aria-haspopup": "true",
                                                      "aria-expanded": "false"
                                                    }
                                                  },
                                                  [
                                                    _c("label", [
                                                      _vm._v(
                                                        _vm._s(
                                                          partName.number
                                                        ) +
                                                          ". " +
                                                          _vm._s(partName.name)
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("button", {
                                                      staticClass:
                                                        "btn m-btn btn-configurator-drop-btn",
                                                      style: {
                                                        background: partName.bg
                                                      }
                                                    })
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                partName.number != 3 &&
                                                partName.number != 5
                                                  ? _c(
                                                      "div",
                                                      {
                                                        staticClass:
                                                          "dropdown-menu",
                                                        attrs: {
                                                          "aria-labelledby":
                                                            "dropdownMenu2"
                                                        }
                                                      },
                                                      _vm._l(
                                                        _vm.colorData,
                                                        function(
                                                          colorValue,
                                                          colorName
                                                        ) {
                                                          return colorName !=
                                                            "random"
                                                            ? _c(
                                                                "div",
                                                                {
                                                                  staticClass:
                                                                    "color-dropdown-item",
                                                                  attrs: {
                                                                    "data-part-id":
                                                                      partName.number -
                                                                      1,
                                                                    "data-color-name": colorName
                                                                  },
                                                                  on: {
                                                                    click:
                                                                      _vm.colorClicked
                                                                  }
                                                                },
                                                                [
                                                                  _c("label", [
                                                                    _vm._v(
                                                                      _vm._s(
                                                                        colorName
                                                                      )
                                                                    )
                                                                  ]),
                                                                  _vm._v(" "),
                                                                  _c("button", {
                                                                    staticClass:
                                                                      "btn m-btn btn-configurator-drop-btn",
                                                                    style: {
                                                                      background: colorValue
                                                                    }
                                                                  })
                                                                ]
                                                              )
                                                            : _vm._e()
                                                        }
                                                      ),
                                                      0
                                                    )
                                                  : _vm._e()
                                              ]
                                            )
                                          }),
                                          0
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-xl-8" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi product-panel "
                                  },
                                  [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "m-portlet__head m-portlet__head--fit product-panel-header"
                                      },
                                      [
                                        _c(
                                          "div",
                                          {
                                            staticClass:
                                              "m-portlet__head-caption"
                                          },
                                          [
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "m-portlet__head-action"
                                              },
                                              [
                                                _c(
                                                  "a",
                                                  {
                                                    staticClass:
                                                      "btn m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                    class: [
                                                      _vm.steps[7].state
                                                        ? "btn-success"
                                                        : "btn-secondary"
                                                    ],
                                                    on: {
                                                      click: _vm.randomClicked
                                                    }
                                                  },
                                                  [
                                                    _c("i", {
                                                      staticClass: "fa",
                                                      class: [
                                                        _vm.steps[7].state
                                                          ? "fa-check"
                                                          : "fa-times"
                                                      ]
                                                    })
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(21)
                                  ]
                                )
                              ])
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "row" }, [
                              _vm._m(22),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-xl-8" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi product-panel2 "
                                  },
                                  [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "m-portlet__head m-portlet__head--fit product-panel-header",
                                        staticStyle: { position: "absolute" }
                                      },
                                      [
                                        _c(
                                          "div",
                                          {
                                            staticClass:
                                              "m-portlet__head-caption"
                                          },
                                          [
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "m-portlet__head-action"
                                              },
                                              [
                                                _c(
                                                  "a",
                                                  {
                                                    staticClass:
                                                      "btn m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                    class: [
                                                      !_vm.steps[7].state
                                                        ? "btn-success"
                                                        : "btn-secondary"
                                                    ],
                                                    on: {
                                                      click: _vm.randomClicked
                                                    }
                                                  },
                                                  [
                                                    _c("i", {
                                                      staticClass: "fa",
                                                      class: [
                                                        !_vm.steps[7].state
                                                          ? "fa-check"
                                                          : "fa-times"
                                                      ]
                                                    })
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c("img", {
                                      attrs: {
                                        src:
                                          "/skateboard-deck-production/colored-maple-veneers-for-skateboard-deck-factory-2hex.jpg",
                                        alt: ""
                                      }
                                    })
                                  ]
                                )
                              ])
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "m-wizard__form-step",
                            attrs: { id: "m_wizard_form_step_9" }
                          },
                          [
                            _c("div", { staticClass: "row" }, [
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(23),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    _vm.steps[8].fulldip.state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[8].fulldip.state = !_vm
                                                                  .steps[8]
                                                                  .fulldip
                                                                  .state),
                                                                  (_vm.perdeck -= 1.5)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[8].fulldip.state = !_vm
                                                                  .steps[8]
                                                                  .fulldip
                                                                  .state),
                                                                  (_vm.perdeck += 1.5)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__body" },
                                      [
                                        _c(
                                          "div",
                                          { staticClass: "m-widget17" },
                                          [
                                            _vm._m(24),
                                            _vm._v(" "),
                                            _vm.steps[8].fulldip.state
                                              ? _c("input", {
                                                  directives: [
                                                    {
                                                      name: "model",
                                                      rawName: "v-model",
                                                      value:
                                                        _vm.steps[8].fulldip
                                                          .color,
                                                      expression:
                                                        "steps[8].fulldip.color"
                                                    }
                                                  ],
                                                  staticClass:
                                                    "form-control m-input",
                                                  staticStyle: {
                                                    "margin-top": "20px"
                                                  },
                                                  attrs: {
                                                    onclick:
                                                      "() => { user ? true : false}",
                                                    type: "text",
                                                    value: "",
                                                    id: "example-text-input",
                                                    placeholder:
                                                      "Enter Pantone Color"
                                                  },
                                                  domProps: {
                                                    value:
                                                      _vm.steps[8].fulldip.color
                                                  },
                                                  on: {
                                                    input: function($event) {
                                                      if (
                                                        $event.target.composing
                                                      ) {
                                                        return
                                                      }
                                                      _vm.$set(
                                                        _vm.steps[8].fulldip,
                                                        "color",
                                                        $event.target.value
                                                      )
                                                    }
                                                  }
                                                })
                                              : _vm._e(),
                                            _vm._v(" "),
                                            _vm._m(25)
                                          ]
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(26),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    _vm.steps[8].transparent
                                                      .state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[8].transparent.state = !_vm
                                                                  .steps[8]
                                                                  .transparent
                                                                  .state),
                                                                  (_vm.perdeck -= 1.5)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[8].transparent.state = !_vm
                                                                  .steps[8]
                                                                  .transparent
                                                                  .state),
                                                                  (_vm.perdeck += 1.5)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__body" },
                                      [
                                        _c(
                                          "div",
                                          { staticClass: "m-widget17" },
                                          [
                                            _vm._m(27),
                                            _vm._v(" "),
                                            _vm.steps[8].transparent.state
                                              ? _c("input", {
                                                  directives: [
                                                    {
                                                      name: "model",
                                                      rawName: "v-model",
                                                      value:
                                                        _vm.steps[8].transparent
                                                          .color,
                                                      expression:
                                                        "steps[8].transparent.color"
                                                    }
                                                  ],
                                                  staticClass:
                                                    "form-control m-input",
                                                  staticStyle: {
                                                    "margin-top": "20px"
                                                  },
                                                  attrs: {
                                                    type: "text",
                                                    value: "",
                                                    id: "example-text-input",
                                                    placeholder:
                                                      "Enter Pantone Color"
                                                  },
                                                  domProps: {
                                                    value:
                                                      _vm.steps[8].transparent
                                                        .color
                                                  },
                                                  on: {
                                                    input: function($event) {
                                                      if (
                                                        $event.target.composing
                                                      ) {
                                                        return
                                                      }
                                                      _vm.$set(
                                                        _vm.steps[8]
                                                          .transparent,
                                                        "color",
                                                        $event.target.value
                                                      )
                                                    }
                                                  }
                                                })
                                              : _vm._e(),
                                            _vm._v(" "),
                                            _vm._m(28)
                                          ]
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ])
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "row" }, [
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(29),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    _vm.steps[8].metallic.state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[8].metallic.state = !_vm
                                                                  .steps[8]
                                                                  .metallic
                                                                  .state),
                                                                  (_vm.perdeck -= 3.5)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[8].metallic.state = !_vm
                                                                  .steps[8]
                                                                  .metallic
                                                                  .state),
                                                                  (_vm.perdeck += 3.5)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__body" },
                                      [
                                        _c(
                                          "div",
                                          { staticClass: "m-widget17" },
                                          [
                                            _vm._m(30),
                                            _vm._v(" "),
                                            _vm.steps[8].metallic.state
                                              ? _c("input", {
                                                  directives: [
                                                    {
                                                      name: "model",
                                                      rawName: "v-model",
                                                      value:
                                                        _vm.steps[8].metallic
                                                          .color,
                                                      expression:
                                                        "steps[8].metallic.color"
                                                    }
                                                  ],
                                                  staticClass:
                                                    "form-control m-input",
                                                  staticStyle: {
                                                    "margin-top": "20px"
                                                  },
                                                  attrs: {
                                                    type: "text",
                                                    value: "",
                                                    id: "example-text-input",
                                                    placeholder:
                                                      "Enter Pantone Color"
                                                  },
                                                  domProps: {
                                                    value:
                                                      _vm.steps[8].metallic
                                                        .color
                                                  },
                                                  on: {
                                                    input: function($event) {
                                                      if (
                                                        $event.target.composing
                                                      ) {
                                                        return
                                                      }
                                                      _vm.$set(
                                                        _vm.steps[8].metallic,
                                                        "color",
                                                        $event.target.value
                                                      )
                                                    }
                                                  }
                                                })
                                              : _vm._e(),
                                            _vm._v(" "),
                                            _vm._m(31)
                                          ]
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(32),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    _vm.steps[8].blacktop.state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[8].blacktop.state = !_vm
                                                                  .steps[8]
                                                                  .blacktop
                                                                  .state),
                                                                  (_vm.perdeck -= 1.9)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[8].blacktop.state = !_vm
                                                                  .steps[8]
                                                                  .blacktop
                                                                  .state),
                                                                  (_vm.perdeck += 1.9)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(33)
                                  ]
                                )
                              ])
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "row" }, [
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(34),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    _vm.steps[8].blackmidlayer
                                                      .state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[8].blackmidlayer.state = !_vm
                                                                  .steps[8]
                                                                  .blackmidlayer
                                                                  .state),
                                                                  (_vm.perdeck -= 1.9)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[8].blackmidlayer.state = !_vm
                                                                  .steps[8]
                                                                  .blackmidlayer
                                                                  .state),
                                                                  (_vm.perdeck += 1.9)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(35)
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(36),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    _vm.steps[8].pattern.state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[8].pattern.state = !_vm
                                                                  .steps[8]
                                                                  .pattern
                                                                  .state),
                                                                  (_vm.perdeck -= 1.3)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[8].pattern.state = !_vm
                                                                  .steps[8]
                                                                  .pattern
                                                                  .state),
                                                                  (_vm.perdeck += 1.3)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(37)
                                  ]
                                )
                              ])
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "m-wizard__form-step",
                            attrs: { id: "m_wizard_form_step_10" }
                          },
                          [
                            _c("div", { staticClass: "row" }, [
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(38),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    _vm.steps[9].state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                _vm.steps[9].state = !_vm
                                                                  .steps[9]
                                                                  .state
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                _vm.steps[9].state = !_vm
                                                                  .steps[9]
                                                                  .state
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__body" },
                                      [
                                        _c(
                                          "div",
                                          { staticClass: "m-widget17" },
                                          [
                                            _vm._m(39),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "form-group m-form__group"
                                              },
                                              [
                                                _c("div"),
                                                _vm._v(" "),
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass: "custom-file"
                                                  },
                                                  [
                                                    _c("input", {
                                                      staticClass:
                                                        "custom-file-input",
                                                      attrs: {
                                                        onclick:
                                                          "() => { user ? true : false}",
                                                        type: "file",
                                                        "data-type-upload":
                                                          "cardboard",
                                                        id: "cardboardFile"
                                                      },
                                                      on: {
                                                        click: function(
                                                          $event
                                                        ) {
                                                          _vm.steps[9].state = 1
                                                        }
                                                      }
                                                    }),
                                                    _vm._v(" "),
                                                    _c(
                                                      "label",
                                                      {
                                                        staticClass:
                                                          "custom-file-label unchecked",
                                                        class: {
                                                          checked:
                                                            _vm.steps[9].state
                                                        },
                                                        attrs: {
                                                          for: "customFile"
                                                        }
                                                      },
                                                      [_vm._v("Choose file")]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              { staticClass: "dropdown" },
                                              [
                                                _c(
                                                  "button",
                                                  {
                                                    staticClass:
                                                      "btn btn-secondary dropdown-toggle unchecked",
                                                    class: {
                                                      checked:
                                                        _vm.steps[9].state
                                                    },
                                                    staticStyle: {
                                                      width: "100%"
                                                    },
                                                    attrs: {
                                                      type: "button",
                                                      id: "dropdownMenuButton",
                                                      "data-toggle": "dropdown",
                                                      "aria-haspopup": "true",
                                                      "aria-expanded": "false"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        _vm.steps[9].state = 1
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                                                                        Recent file\n                                                                    "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "dropdown-menu",
                                                    attrs: {
                                                      "aria-labelledby":
                                                        "dropdownMenuButton"
                                                    }
                                                  },
                                                  [
                                                    _c(
                                                      "a",
                                                      {
                                                        staticClass:
                                                          "dropdown-item file-dropdown",
                                                        attrs: { href: "#" },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            _vm.steps[9].state = 1
                                                          }
                                                        }
                                                      },
                                                      [_vm._v("$filename")]
                                                    ),
                                                    _vm._v(" "),
                                                    _vm._v(
                                                      "\n                                                                        @endif\n                                                                    "
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _vm._m(40)
                                          ]
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(41),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    !_vm.steps[9].state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                _vm.steps[9].state = !_vm
                                                                  .steps[9]
                                                                  .state
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                _vm.steps[9].state = !_vm
                                                                  .steps[9]
                                                                  .state
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(42)
                                  ]
                                )
                              ])
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "m-wizard__form-step",
                            attrs: { id: "m_wizard_form_step_11" }
                          },
                          [
                            _c("div", { staticClass: "row" }, [
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(43),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    _vm.steps[10].state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[10].state = !_vm
                                                                  .steps[10]
                                                                  .state),
                                                                  (_vm.perdeck -= 0.15)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[10].state = !_vm
                                                                  .steps[10]
                                                                  .state),
                                                                  (_vm.perdeck += 0.15)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__body" },
                                      [
                                        _c(
                                          "div",
                                          { staticClass: "m-widget17" },
                                          [
                                            _vm._m(44),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "form-group m-form__group"
                                              },
                                              [
                                                _c("div"),
                                                _vm._v(" "),
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass: "custom-file"
                                                  },
                                                  [
                                                    _c("input", {
                                                      staticClass:
                                                        "custom-file-input",
                                                      attrs: {
                                                        onclick:
                                                          "() => { user ? true : false}",
                                                        type: "file",
                                                        "data-type-upload":
                                                          "box",
                                                        id: "cartonFile"
                                                      },
                                                      on: {
                                                        click: function(
                                                          $event
                                                        ) {
                                                          ;(_vm.perdeck += _vm
                                                            .steps[10].state
                                                            ? 0
                                                            : 0.75),
                                                            (_vm.steps[10].state = 1)
                                                        }
                                                      }
                                                    }),
                                                    _vm._v(" "),
                                                    _c(
                                                      "label",
                                                      {
                                                        staticClass:
                                                          "custom-file-label unchecked",
                                                        class: {
                                                          checked:
                                                            _vm.steps[10].state
                                                        },
                                                        attrs: {
                                                          for: "customFile"
                                                        }
                                                      },
                                                      [_vm._v("Choose file")]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              { staticClass: "dropdown" },
                                              [
                                                _c(
                                                  "button",
                                                  {
                                                    staticClass:
                                                      "btn btn-secondary dropdown-toggle unchecked",
                                                    class: {
                                                      checked:
                                                        _vm.steps[10].state
                                                    },
                                                    staticStyle: {
                                                      width: "100%"
                                                    },
                                                    attrs: {
                                                      type: "button",
                                                      id: "dropdownMenuButton",
                                                      "data-toggle": "dropdown",
                                                      "aria-haspopup": "true",
                                                      "aria-expanded": "false"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        ;(_vm.perdeck += _vm
                                                          .steps[10].state
                                                          ? 0
                                                          : 0.75),
                                                          (_vm.steps[10].state = 1)
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                                                                        Recent file\n                                                                    "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "dropdown-menu",
                                                    attrs: {
                                                      "aria-labelledby":
                                                        "dropdownMenuButton"
                                                    }
                                                  },
                                                  [
                                                    _c(
                                                      "a",
                                                      {
                                                        staticClass:
                                                          "dropdown-item file-dropdown",
                                                        attrs: { href: "#" },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            ;(_vm.perdeck += _vm
                                                              .steps[10].state
                                                              ? 0
                                                              : 0.75),
                                                              (_vm.steps[10].state = 1)
                                                          }
                                                        }
                                                      },
                                                      [_vm._v("$filename")]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _vm._m(45)
                                          ]
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-xl-6" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "m-portlet__head" },
                                      [
                                        _vm._m(46),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "m-portlet__head-tools"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              { staticClass: "m-portlet__nav" },
                                              [
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                    attrs: {
                                                      "m-dropdown-toggle":
                                                        "hover"
                                                    }
                                                  },
                                                  [
                                                    !_vm.steps[10].state
                                                      ? _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[10].state = !_vm
                                                                  .steps[10]
                                                                  .state),
                                                                  (_vm.perdeck += 0.15)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-check"
                                                            })
                                                          ]
                                                        )
                                                      : _c(
                                                          "a",
                                                          {
                                                            staticClass:
                                                              "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                ;(_vm.steps[10].state = !_vm
                                                                  .steps[10]
                                                                  .state),
                                                                  (_vm.perdeck -= 0.15)
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-times"
                                                            })
                                                          ]
                                                        )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _vm._m(47)
                                  ]
                                )
                              ])
                            ])
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "m-portlet__foot m-portlet__foot--fit m--margin-top-40"
                      },
                      [
                        _c(
                          "div",
                          { staticClass: "m-form__actions m-form__actions" },
                          [
                            _c("div", { staticClass: "row" }, [
                              _c(
                                "div",
                                { staticClass: "col-lg-4 m--align-center" },
                                [
                                  _c(
                                    "button",
                                    {
                                      staticClass:
                                        "btn btn-secondary m-btn m-btn--custom m-btn--icon",
                                      attrs: { "data-wizard-action": "prev" },
                                      on: { click: _vm.prevStep }
                                    },
                                    [_vm._m(48)]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                { staticClass: "col-lg-4 m--align-center" },
                                [
                                  _c(
                                    "button",
                                    {
                                      staticClass:
                                        "btn btn-primary m-btn m-btn--custom m-btn--icon",
                                      attrs: { "data-wizard-action": "submit" },
                                      on: { click: _vm.save }
                                    },
                                    [_vm._m(49)]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "button",
                                    {
                                      staticClass:
                                        "btn btn-warning m-btn m-btn--custom m-btn--icon",
                                      attrs: { "data-wizard-action": "next" },
                                      on: { click: _vm.nextStep }
                                    },
                                    [_vm._m(50)]
                                  )
                                ]
                              )
                            ])
                          ]
                        )
                      ]
                    )
                  ]
                )
              ])
            ]
          )
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "col-xl-3" }, [
        _c("div", { staticClass: "m-portlet" }, [
          _c("div", { staticClass: "m-portlet__body" }, [
            _vm._m(51),
            _vm._v(" "),
            _c("div", { staticClass: "m-separator m-separator--fit" }),
            _vm._v(" "),
            _c("div", { staticClass: "m-widget1 m-widget1--paddingless" }, [
              _c("div", { staticClass: "m-widget1__item" }, [
                _c(
                  "div",
                  { staticClass: "row m-row--no-padding align-items-center" },
                  [
                    _c("div", { staticClass: "col" }, [
                      _c("h3", { staticClass: "m-widget1__title" }, [
                        _vm._v(_vm._s(_vm.user ? "Deck" : "Login"))
                      ]),
                      _vm._v(" "),
                      _c("span", { staticClass: "m-widget1__desc" }, [
                        _vm._v(
                          _vm._s(_vm.user ? "Price per Deck" : "To See Prices")
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col m--align-right" }, [
                      _vm.quantity > 0 && _vm.size != "" && _vm.user
                        ? _c(
                            "span",
                            {
                              staticClass: "m-widget1__number m--font-brand",
                              attrs: { id: "perdeck" }
                            },
                            [
                              _vm._v(
                                "\n                                                        $ " +
                                  _vm._s(_vm.perdeck.toFixed(2)) +
                                  "\n                                                "
                              )
                            ]
                          )
                        : _c(
                            "span",
                            {
                              staticClass: "m-widget1__number m--font-danger",
                              attrs: { id: "perdeck" }
                            },
                            [
                              _vm._v(
                                "\n                                                    $ ?.??\n                                                "
                              )
                            ]
                          )
                    ])
                  ]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "m-widget1__item" }, [
                _c(
                  "div",
                  { staticClass: "row m-row--no-padding align-items-center" },
                  [
                    _c("div", { staticClass: "col" }, [
                      _c("h3", { staticClass: "m-widget1__title" }, [
                        _vm._v(_vm._s(_vm.user ? "Order" : "Login"))
                      ]),
                      _vm._v(" "),
                      _c("span", { staticClass: "m-widget1__desc" }, [
                        _vm._v(
                          _vm._s(_vm.user ? "Total of Order" : "To See Prices")
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col m--align-right" }, [
                      _vm.quantity > 0 && _vm.size != "" && _vm.user
                        ? _c(
                            "span",
                            {
                              staticClass: "m-widget1__number m--font-danger",
                              attrs: { id: "total" }
                            },
                            [
                              _vm._v(
                                "\n                                                    $ " +
                                  _vm._s(
                                    (
                                      _vm.perdeck * _vm.quantity +
                                      _vm.fixedprice
                                    ).toFixed(2)
                                  ) +
                                  "\n                                                "
                              )
                            ]
                          )
                        : _c(
                            "span",
                            {
                              staticClass: "m-widget1__number m--font-danger",
                              attrs: { id: "total" }
                            },
                            [
                              _vm._v(
                                "\n                                                    $ ?.??\n                                                "
                              )
                            ]
                          )
                    ])
                  ]
                )
              ]),
              _vm._v(" "),
              _c("br"),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass:
                    "btn btn-secondary m-btn m-btn--custom m-btn--icon col m--align-right",
                  attrs: { id: "save_order" },
                  on: { click: _vm.save }
                },
                [_vm._m(52)]
              )
            ])
          ])
        ])
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head" }, [
      _c("div", { staticClass: "m-portlet__head-caption" }, [
        _c("div", { staticClass: "m-portlet__head-title" }, [
          _c("h3", { staticClass: "m-portlet__head-text" }, [
            _vm._v(
              "\n                                        Skateboard Deck Factory\n                                    "
            )
          ]),
          _vm._v(" "),
          _c(
            "ul",
            {
              staticClass: "m-subheader__breadcrumbs m-nav m-nav--inline",
              attrs: { id: "breadcrumbs" }
            },
            [
              _c("li", { staticClass: "m-nav__item" }, [
                _c("a", { staticClass: "m-nav__link", attrs: { href: "/" } }, [
                  _c("span", { staticClass: "m-nav__link-text" }, [
                    _vm._v("Home -")
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("li", { staticClass: "m-nav__item" }, [
                _c(
                  "a",
                  {
                    staticClass: "m-nav__link",
                    attrs: { href: "skateboard-deck-manufacturer" }
                  },
                  [
                    _c("span", { staticClass: "m-nav__link-text" }, [
                      _vm._v("Configurator -")
                    ])
                  ]
                )
              ]),
              _vm._v(" "),
              _c("li", { staticClass: "m-nav__item" }, [
                _c(
                  "a",
                  {
                    staticClass: "m-nav__link",
                    attrs: { href: "skateboard-deck-configurator" }
                  },
                  [
                    _c("span", { staticClass: "m-nav__link-text" }, [
                      _vm._v("SB Deck")
                    ])
                  ]
                )
              ])
            ]
          )
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "m-portlet__head-tools" }, [
        _c("ul", { staticClass: "m-portlet__nav" }, [
          _c("li", { staticClass: "m-portlet__nav-item" }, [
            _c(
              "a",
              {
                staticClass: "m-portlet__nav-link m-portlet__nav-link--icon",
                attrs: {
                  "data-toggle": "m-tooltip",
                  "data-direction": "left",
                  "data-width": "auto",
                  title: "Get help with filling up this form"
                }
              },
              [_c("i", { staticClass: "flaticon-info m--icon-font-size-lg3" })]
            )
          ])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-wizard__nav" }, [
      _c("div", { staticClass: "m-wizard__steps" }, [
        _c("div", {
          staticClass: "m-wizard__step m-wizard__step--current",
          attrs: { "m-wizard-target": "m_wizard_form_step_1" }
        }),
        _vm._v(" "),
        _c("div", {
          staticClass: "m-wizard__step",
          attrs: { "m-wizard-target": "m_wizard_form_step_2" }
        }),
        _vm._v(" "),
        _c("div", {
          staticClass: "m-wizard__step",
          attrs: { "m-wizard-target": "m_wizard_form_step_3" }
        }),
        _vm._v(" "),
        _c("div", {
          staticClass: "m-wizard__step",
          attrs: { "m-wizard-target": "m_wizard_form_step_4" }
        }),
        _vm._v(" "),
        _c("div", {
          staticClass: "m-wizard__step",
          attrs: { "m-wizard-target": "m_wizard_form_step_5" }
        }),
        _vm._v(" "),
        _c("div", {
          staticClass: "m-wizard__step",
          attrs: { "m-wizard-target": "m_wizard_form_step_6" }
        }),
        _vm._v(" "),
        _c("div", {
          staticClass: "m-wizard__step",
          attrs: { "m-wizard-target": "m_wizard_form_step_7" }
        }),
        _vm._v(" "),
        _c("div", {
          staticClass: "m-wizard__step",
          attrs: { "m-wizard-target": "m_wizard_form_step_8" }
        }),
        _vm._v(" "),
        _c("div", {
          staticClass: "m-wizard__step",
          attrs: { "m-wizard-target": "m_wizard_form_step_9" }
        }),
        _vm._v(" "),
        _c("div", {
          staticClass: "m-wizard__step",
          attrs: { "m-wizard-target": "m_wizard_form_step_10" }
        }),
        _vm._v(" "),
        _c("div", {
          staticClass: "m-wizard__step",
          attrs: { "m-wizard-target": "m_wizard_form_step_11" }
        })
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        American Glue\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget17" }, [
        _c(
          "div",
          {
            staticClass:
              "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
          },
          [
            _c("div", [
              _c(
                "div",
                {
                  staticClass:
                    "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
                  staticStyle: { "min-height": "286px" }
                },
                [
                  _c("img", {
                    staticClass: "step1-img1",
                    attrs: {
                      src:
                        "/skateboard-deck-production/american-glue-for-skateboard-decks-manufacturer-2hex.jpg",
                      alt: ""
                    }
                  })
                ]
              )
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticStyle: {
              "text-align": "justify",
              color: "#9699a4",
              "margin-top": "20px"
            }
          },
          [
            _c("h3", [_vm._v("American Glue Formula")]),
            _vm._v(
              "\n                                                                    This water based glue was invented in\n                                                                    America for the purpose of being exclusively\n                                                                    used for the production of skateboard decks.\n                                                                "
            )
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        Epoxy Glue\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget17" }, [
        _c(
          "div",
          {
            staticClass:
              "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
          },
          [
            _c("div", [
              _c(
                "div",
                {
                  staticClass:
                    "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
                  staticStyle: { "min-height": "286px" }
                },
                [
                  _c("img", {
                    staticClass: "step1-img1",
                    attrs: {
                      src:
                        "/skateboard-deck-production/epoxy-glue-for-skateboard-decks-factory-2hex.jpg",
                      alt: ""
                    }
                  })
                ]
              )
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticStyle: {
              "text-align": "justify",
              color: "#9699a4",
              "margin-top": "20px"
            }
          },
          [
            _c("h3", [_vm._v("Epoxy Glue Formula")]),
            _vm._v(
              "\n                                                                    Epoxy is a strong and hard glue, making skateboard decks more durable and stiff.\n                                                                    This leads to more pop and improved deck control. (Epoxy must be selected if you plan on adding GFRP technology in step 9.)\n                                                                "
            )
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        Bottom Print\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
      },
      [
        _c("div", [
          _c(
            "div",
            {
              staticClass:
                "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
              staticStyle: { "min-height": "286px" }
            },
            [
              _c("img", {
                staticClass: "step1-img2",
                attrs: {
                  src:
                    "/skateboard-deck-production/heat-transfer-print-skateboard-decks-manufacturer-2hex-com.jpg",
                  alt: ""
                }
              })
            ]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: {
          "text-align": "justify",
          color: "#9699a4",
          "margin-top": "20px"
        }
      },
      [
        _c("h3", [_vm._v("Custom Bottom Design")]),
        _vm._v(
          '\n                                                                    Submit your artwork in 9" x 33" at 300 dpi or as a vector image. For images of up to 4 colors, please give each color layer its Pantone code.\n                                                                    Photos or artworks of ≥5 colors are printed in CMYK.'
        ),
        _c("br"),
        _vm._v(" "),
        _c("br"),
        _vm._v(
          "\n                                                                    Optionally you can upload a preview of your artwork and send the full size file by email before the production."
        ),
        _c("br")
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        Blank Bottom\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget17" }, [
        _c(
          "div",
          {
            staticClass:
              "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
          },
          [
            _c("div", [
              _c(
                "div",
                {
                  staticClass:
                    "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
                  staticStyle: { "min-height": "286px" }
                },
                [
                  _c("img", {
                    staticClass: "step1-img2",
                    attrs: {
                      src:
                        "/skateboard-deck-production/blank-skateboard-decks-manufacturer-2hex.jpg",
                      alt: ""
                    }
                  })
                ]
              )
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticStyle: {
              "text-align": "justify",
              color: "#9699a4",
              "margin-top": "20px"
            }
          },
          [
            _c("h3", [_vm._v("Blank Bottom")]),
            _vm._v(
              "\n                                                                    Blank decks are commonly sold to print shops, artists or skateshops that need a reason to sell the same pro quality at a cheaper price.\n\n                                                                "
            )
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        Top Print Upload\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
      },
      [
        _c("div", [
          _c(
            "div",
            {
              staticClass:
                "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
              staticStyle: { "min-height": "286px" }
            },
            [
              _c("img", {
                staticClass: "step1-img2",
                attrs: {
                  src:
                    "/skateboard-deck-production/skateboard-deck-top-print-factory-2hex-com.jpg",
                  alt: ""
                }
              })
            ]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: {
          "text-align": "justify",
          color: "#9699a4",
          "margin-top": "20px"
        }
      },
      [
        _c("h3", [_vm._v("Top Print")]),
        _vm._v(
          '\n                                                                    Submit your artwork in 9" x 33" at 300 dpi or as a vector image. For images of up to 4 colors, please give each color layer its Pantone code.\n                                                                    Photos or artworks of ≥5 colors are printed in CMYK.'
        ),
        _c("br"),
        _vm._v(" "),
        _c("br"),
        _vm._v(
          "\n                                                                    Optionally you can upload a preview of your artwork and send the full size file by email before the production."
        ),
        _c("br")
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        No Top Print\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget17" }, [
        _c(
          "div",
          {
            staticClass:
              "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
          },
          [
            _c("div", [
              _c(
                "div",
                {
                  staticClass:
                    "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
                  staticStyle: { "min-height": "286px" }
                },
                [
                  _c("img", {
                    staticClass: "step1-img2",
                    attrs: {
                      src:
                        "/skateboard-deck-production/blank-skateboard-deck-factory-2hex.jpg",
                      alt: ""
                    }
                  })
                ]
              )
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticStyle: {
              "text-align": "justify",
              color: "#9699a4",
              "margin-top": "20px"
            }
          },
          [
            _c("h3", [_vm._v("Blank Top")]),
            _vm._v(
              "\n                                                                    Not every deck needs a top print.\n                                                                    However top prints are the cherry on top of the creme giving buyers the impression of holding a higher quality deck.\n                                                                "
            )
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        Top Engraving\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
      },
      [
        _c("div", [
          _c(
            "div",
            {
              staticClass:
                "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
              staticStyle: { "min-height": "286px" }
            },
            [
              _c("img", {
                staticClass: "step1-img2",
                attrs: {
                  src:
                    "/skateboard-deck-production/skateboard-decks-laser-engravery-manufacturer-2hex.jpg",
                  alt: ""
                }
              })
            ]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: {
          "text-align": "justify",
          color: "#9699a4",
          "margin-top": "20px"
        }
      },
      [
        _c("h3", [_vm._v("Top Engraving")]),
        _vm._v(
          '\n                                                                    Submit artwork in one color 9" x 33" as vector image to show where the max 4" x 4" engraving should be placed. '
        ),
        _c("br"),
        _vm._v(" "),
        _c("br"),
        _vm._v(
          "\n                                                                    Optionally you can upload a preview of your engraving artwork and send the full size file by email before the production."
        ),
        _c("br")
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        Smooth Top\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget17" }, [
        _c(
          "div",
          {
            staticClass:
              "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
          },
          [
            _c("div", [
              _c(
                "div",
                {
                  staticClass:
                    "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
                  staticStyle: { "min-height": "286px" }
                },
                [
                  _c("img", {
                    staticClass: "step1-img2",
                    attrs: {
                      src:
                        "/skateboard-deck-production/blank-skateboard-deck-factory-2hex.jpg",
                      alt: ""
                    }
                  })
                ]
              )
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticStyle: {
              "text-align": "justify",
              color: "#9699a4",
              "margin-top": "20px"
            }
          },
          [
            _c("h3", [_vm._v("Smooth Top")]),
            _vm._v(
              "\n                                                                    You already have a top print? In this case you don't need an engraved top.\n                                                                    However if you do not have a top print either, remember that top prints and top engravings give buyers the impression of holding a higher quality deck.\n                                                                "
            )
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget4" }, [
        _c("div", { staticClass: "m-widget19__pic m-portlet-fit--sides" }, [
          _c("img", { attrs: { id: "productCanvas" } })
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-xl-4" }, [
      _c(
        "div",
        {
          staticClass:
            "m-portlet m-portlet--bordered-semi configurator-color-panel "
        },
        [
          _c("div", { staticClass: "m-portlet__body" }, [
            _c("div", { staticClass: "m-widget4" }, [
              _c("div", { staticClass: "btn random-button" }, [
                _c("label", [_vm._v("Random")]),
                _vm._v(" "),
                _c("img", {
                  attrs: { src: "/skateboard-deck-production/random-icon.png" }
                })
              ])
            ])
          ])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        Fulldip\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
      },
      [
        _c("div", [
          _c(
            "div",
            {
              staticClass:
                "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
              staticStyle: { "min-height": "286px" }
            },
            [
              _c("img", {
                staticClass: "step1-img1",
                attrs: {
                  src:
                    "/skateboard-deck-production/blue-full-dip-skateboard-deck-manufacturer-2hex.jpg",
                  alt: ""
                }
              })
            ]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: {
          "text-align": "justify",
          color: "#9699a4",
          "margin-top": "20px"
        }
      },
      [
        _c("h3", [_vm._v("Fulldip")]),
        _vm._v(
          "\n                                                                    Dye your decks in one opaque color of your choice.\n                                                                "
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        Transparent Full Dip\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
      },
      [
        _c("div", [
          _c(
            "div",
            {
              staticClass:
                "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
              staticStyle: { "min-height": "286px" }
            },
            [
              _c("img", {
                staticClass: "step1-img1",
                attrs: {
                  src:
                    "/skateboard-deck-production/transparent-full-dip-skateboard-deck-manufacturer-2hex.jpg",
                  alt: ""
                }
              })
            ]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: {
          "text-align": "justify",
          color: "#9699a4",
          "margin-top": "20px"
        }
      },
      [
        _c("h3", [_vm._v("Transparent Full Dip")]),
        _vm._v(
          "\n                                                                    Dye your decks in one transparent color of your choice.\n                                                                "
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        Metallic Full Dip\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
      },
      [
        _c("div", [
          _c(
            "div",
            {
              staticClass:
                "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
              staticStyle: { "min-height": "286px" }
            },
            [
              _c("img", {
                staticClass: "step1-img1",
                attrs: {
                  src:
                    "/skateboard-deck-production/metallic-full-dip-skateboard-deck-manufacturer-2hex.jpg",
                  alt: ""
                }
              })
            ]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: {
          "text-align": "justify",
          color: "#9699a4",
          "margin-top": "20px"
        }
      },
      [
        _c("h3", [_vm._v("Metallic Full Dip")]),
        _vm._v(
          "\n                                                                    Dye your decks in one opaque metallic color of your choice.\n                                                                "
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        Black GFRP Top Layer\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget17" }, [
        _c(
          "div",
          {
            staticClass:
              "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
          },
          [
            _c("div", [
              _c(
                "div",
                {
                  staticClass:
                    "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
                  staticStyle: { "min-height": "286px" }
                },
                [
                  _c("img", {
                    staticClass: "step1-img1",
                    attrs: {
                      src:
                        "/skateboard-deck-production/fiberglass-skateboard-deck-manufacturer-2hex.jpg",
                      alt: ""
                    }
                  })
                ]
              )
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticStyle: {
              "text-align": "justify",
              color: "#9699a4",
              "margin-top": "20px"
            }
          },
          [
            _c("h3", [_vm._v("Black GFRP Top Layer")]),
            _vm._v(
              "\n                                                                    Add a top layer of black GFRP glassfiber reinforced plastic for increased durability and an hardcore look.\n                                                                    "
            ),
            _c("br"),
            _vm._v(
              "\n                                                                    Epoxy glue must be used for GFRP decks. Please double check your selection in step 3.\n                                                                "
            )
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        Black GFRP Mid Layer\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget17" }, [
        _c(
          "div",
          {
            staticClass:
              "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
          },
          [
            _c("div", [
              _c(
                "div",
                {
                  staticClass:
                    "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
                  staticStyle: { "min-height": "286px" }
                },
                [
                  _c("img", {
                    staticClass: "step1-img1",
                    attrs: {
                      src:
                        "/skateboard-deck-production/fiberglas-skateboard-decks-manufacturer-2hex.jpg",
                      alt: ""
                    }
                  })
                ]
              )
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticStyle: {
              "text-align": "justify",
              color: "#9699a4",
              "margin-top": "20px"
            }
          },
          [
            _c("h3", [_vm._v("Black GFRP Midlayer")]),
            _vm._v(
              "\n                                                                    Add a mid layer of black GFRP glassfiber reinforced plastic for increased durability.\n                                                                    "
            ),
            _c("br"),
            _vm._v(
              "\n                                                                    Epoxy glue must be used for GFRP decks. Please double check your selection in step 3.\n                                                                "
            )
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        HEX Pattern Press\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget17" }, [
        _c(
          "div",
          {
            staticClass:
              "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
          },
          [
            _c("div", [
              _c(
                "div",
                {
                  staticClass:
                    "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
                  staticStyle: { "min-height": "286px" }
                },
                [
                  _c("img", {
                    staticClass: "step1-img1",
                    attrs: {
                      src:
                        "/skateboard-deck-production/pattern-pressed-skateboard-decks-manufacturer-2hex.jpg",
                      alt: ""
                    }
                  })
                ]
              )
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticStyle: {
              "text-align": "justify",
              color: "#9699a4",
              "margin-top": "20px"
            }
          },
          [
            _c("h3", [_vm._v("HEX Pattern Press")]),
            _vm._v(
              "\n                                                                    Add the hexagon pattern to your decks bottom veneer, to give your decks a more high end feel and look.\n                                                                "
            )
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        Upload Cardboard Design\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
      },
      [
        _c("div", [
          _c(
            "div",
            {
              staticClass:
                "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
              staticStyle: { "min-height": "286px" }
            },
            [
              _c("img", {
                staticClass: "step1-img1",
                attrs: {
                  src:
                    "/skateboard-deck-production/skateboard-deck-cardboards-factory-2hex.jpg",
                  alt: ""
                }
              })
            ]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: {
          "text-align": "justify",
          color: "#9699a4",
          "margin-top": "20px"
        }
      },
      [
        _c("h3", [_vm._v("Custom Cardboard Wrap")]),
        _vm._v(
          "\n                                                                    Have a custom cardboard printed and folded around your deck, before the shrink wrap is added.\n                                                                    Having a custom cardboard around your deck does not only make it stand out from all other decks when placed in a skate shop's deck rack,\n                                                                    it also lets you communicate to your end users just before they make their purchasing decision.\n                                                                "
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        No Cardboard\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget17" }, [
        _c(
          "div",
          {
            staticClass:
              "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
          },
          [
            _c("div", [
              _c(
                "div",
                {
                  staticClass:
                    "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
                  staticStyle: { "min-height": "286px" }
                },
                [
                  _c("img", {
                    staticClass: "step1-img1",
                    attrs: {
                      src:
                        "/skateboard-deck-production/skateboard-decks-manufacturer-2hex.jpg",
                      alt: ""
                    }
                  })
                ]
              )
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticStyle: {
              "text-align": "justify",
              color: "#9699a4",
              "margin-top": "20px"
            }
          },
          [
            _c("h3", [_vm._v("No Cardboard")]),
            _vm._v(
              "\n                                                                    Saves costs and cuts down on paper waste. Cardboards only improve the buying experience, not the ride.\n                                                                "
            )
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        Custom Printed Cartons\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
      },
      [
        _c("div", [
          _c(
            "div",
            {
              staticClass:
                "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
              staticStyle: { "min-height": "286px" }
            },
            [
              _c("img", {
                staticClass: "step1-img1",
                attrs: {
                  src:
                    "/skateboard-deck-production/skateboard-decks-carton-manufacturer-2hex.jpg",
                  alt: ""
                }
              })
            ]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: {
          "text-align": "justify",
          color: "#9699a4",
          "margin-top": "20px"
        }
      },
      [
        _c("h3", [_vm._v("Custom Printed Cartons")]),
        _vm._v(
          "\n                                                                    Add your logo on both sides of the carton. Please submit the artwork in 40cm(width) x 15cm(height).\n                                                                    Additionally we will print the content details on both ends of the carton showing your brand name, product description, deck name and size.\n                                                                "
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                                                        Basic Cartons\n                                                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget17" }, [
        _c(
          "div",
          {
            staticClass:
              "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
          },
          [
            _c("div", [
              _c(
                "div",
                {
                  staticClass:
                    "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
                  staticStyle: { "min-height": "286px" }
                },
                [
                  _c("img", {
                    staticClass: "step1-img1",
                    attrs: {
                      src:
                        "/skateboard-deck-production/skateboard-decks-carton-factory-2hex.jpg",
                      alt: ""
                    }
                  })
                ]
              )
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticStyle: {
              "text-align": "justify",
              color: "#9699a4",
              "margin-top": "20px"
            }
          },
          [
            _c("h3", [_vm._v("Basic Cartons")]),
            _vm._v(
              "\n                                                                    Choose our basic cartons to save cost.\n                                                                    Basic Cartons come in blank or with the content details printed on both ends and two sides of the carton, showing your brand name, product description, deck name and size.\n                                                                "
            )
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", [
      _c("i", { staticClass: "la la-arrow-left" }),
      _vm._v(
        "  \n                                                            "
      ),
      _c("span", [_vm._v("Back")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", [
      _c("i", { staticClass: "la la-check" }),
      _vm._v(
        "  \n                                                            "
      ),
      _c("span", [_vm._v("Summary")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", [
      _c("span", [_vm._v("Continue")]),
      _vm._v(
        "  \n                                                            "
      ),
      _c("i", { staticClass: "la la-arrow-right" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-section" }, [
      _c("h2", { staticClass: "m-section__heading" }, [
        _vm._v("How to build the best skateboard deck?")
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "m-section__content" }, [
        _c("p", [
          _vm._v(
            "\n                                        Know your target group! Do they skate vert or street? Are you users price sensitive\n                                        or do they want the deck to be the most durable with the highest pop?\n                                    "
          )
        ]),
        _vm._v(" "),
        _c("p", [
          _vm._v(
            "\n                                        Choose the specifications that best meet your target groups requirements. All of our decks\n                                        have the highest quality within the selected specifications.\n                                        Follow the deck price calculation below, to make sure you find the sweet spot\n                                        between the highest quality and the best price.\n                                    "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", [
      _c("i", { staticClass: "la la-send" }),
      _vm._v(" "),
      _c("span", [_vm._v("skip next steps")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/views/Step1.vue?vue&type=template&id=381dfa21&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/configurator/views/Step1.vue?vue&type=template&id=381dfa21& ***!
  \**********************************************************************************************************************************************************************************************************************************/
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
    {
      staticClass: "m-wizard__form-step m-wizard__form-step--current",
      attrs: { id: "m_wizard_form_step_1" }
    },
    [
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-xl-6" }, [
          _c(
            "div",
            {
              staticClass:
                "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
            },
            [
              _vm._m(0),
              _vm._v(" "),
              _c("div", { staticClass: "m-portlet__body" }, [
                _c("div", { staticClass: "m-widget17" }, [
                  _vm._m(1),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.quantity,
                        expression: "quantity"
                      }
                    ],
                    staticClass:
                      "form-control bootstrap-touchspin-vertical-btn",
                    attrs: {
                      id: "quantity",
                      type: "text",
                      name: "quantity",
                      placeholder: "30"
                    },
                    domProps: { value: _vm.quantity },
                    on: {
                      change: _vm.quantityChange,
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.quantity = $event.target.value
                      }
                    }
                  }),
                  _vm._v(" "),
                  _vm._m(2)
                ])
              ])
            ]
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-xl-6" }, [
          _c(
            "div",
            {
              staticClass:
                "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
            },
            [
              _vm._m(3),
              _vm._v(" "),
              _c("div", { staticClass: "m-portlet__body" }, [
                _c("div", { staticClass: "m-widget17" }, [
                  _vm._m(4),
                  _vm._v(" "),
                  _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.size,
                          expression: "size"
                        }
                      ],
                      staticClass: "form-control",
                      staticStyle: { width: "100%" },
                      attrs: { id: "size", name: "size" },
                      on: {
                        change: [
                          function($event) {
                            var $$selectedVal = Array.prototype.filter
                              .call($event.target.options, function(o) {
                                return o.selected
                              })
                              .map(function(o) {
                                var val = "_value" in o ? o._value : o.value
                                return val
                              })
                            _vm.size = $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          },
                          _vm.sizeChange
                        ]
                      }
                    },
                    [
                      _c("option", { attrs: { value: "", disabled: "" } }, [
                        _vm._v("SELECT")
                      ]),
                      _vm._v(" "),
                      _vm._l(_vm.sizes, function(size, index) {
                        return _c("option", { key: index }, [
                          _vm._v(_vm._s(size))
                        ])
                      })
                    ],
                    2
                  ),
                  _vm._v(" "),
                  _vm._m(5)
                ])
              ])
            ]
          )
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head" }, [
      _c("div", { staticClass: "m-portlet__head-caption" }, [
        _c("div", { staticClass: "m-portlet__head-title" }, [
          _c("h3", { staticClass: "m-portlet__head-text" }, [
            _vm._v("Batch Quantity")
          ])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
      },
      [
        _c("div", [
          _c(
            "div",
            {
              staticClass:
                "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
              staticStyle: { "min-height": "286px" }
            },
            [
              _c("img", {
                staticClass: "step1-img1",
                attrs: {
                  src:
                    "/skateboard-deck-production/stacked-skateboard-decks-factory-2hex.jpg",
                  alt: ""
                }
              })
            ]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: {
          "text-align": "justify",
          color: "#9699a4",
          "margin-top": "20px"
        }
      },
      [
        _c("h3", [_vm._v("Batch Quantity")]),
        _vm._v(
          "\n                                Select the required quantity of your first\n                                style of decks. Decks are packed and sold in\n                                cartons of ten pieces. The final deck price\n                                depends on your deck specifications as well as your\n                                total order quantity of all batches together.\n                                With every batch you add, your previous batched get cheaper as well.\n                                You can always go to the summary page to see the price of each batch.\n                            "
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head" }, [
      _c("div", { staticClass: "m-portlet__head-caption" }, [
        _c("div", { staticClass: "m-portlet__head-title" }, [
          _c("h3", { staticClass: "m-portlet__head-text" }, [_vm._v("Size")])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
      },
      [
        _c("div", [
          _c(
            "div",
            {
              staticClass:
                "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
              staticStyle: { "min-height": "286px" }
            },
            [
              _c("img", {
                staticClass: "step1-img1",
                attrs: {
                  src:
                    "/skateboard-deck-production/width-skateboard-decks-manufacturer-2hex.jpg",
                  alt: ""
                }
              })
            ]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticStyle: {
          "text-align": "justify",
          color: "#9699a4",
          "margin-top": "20px"
        }
      },
      [
        _c("h3", [_vm._v("Deck Size")]),
        _vm._v(
          '\n                                Select the deck shape of this batch.\n                                Shapes are shown by "Width x Length" as well\n                                as "Wheelbase", "Nose" and "Tail". All dimensions\n                                are given in inches.\n                            '
        )
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/views/Step2.vue?vue&type=template&id=382c11a2&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/configurator/views/Step2.vue?vue&type=template&id=382c11a2& ***!
  \**********************************************************************************************************************************************************************************************************************************/
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
    {
      staticClass: "m-wizard__form-step",
      attrs: { id: "m_wizard_form_step_2" }
    },
    [
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-xl-12" }, [
          _c(
            "div",
            {
              staticClass:
                "m-portlet m-portlet--head-overlay m-portlet--full-height  m-portlet--rounded-force"
            },
            [
              _c("div", { staticClass: "m-portlet__body" }, [
                _c("div", { staticClass: "m-widget27 m-portlet-fit--sides" }, [
                  _c("div", { staticClass: "m-widget27__container" }, [
                    _vm._m(0),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "m-widget27__tab tab-content m-widget27--no-padding"
                      },
                      [
                        _c(
                          "div",
                          {
                            staticClass: "tab-pane active",
                            attrs: { id: "m_personal_income_quater_1" }
                          },
                          [
                            _c(
                              "div",
                              { staticClass: "row  align-items-center" },
                              [
                                _c("div", { staticClass: "col" }, [
                                  _c("div", { staticClass: "col-xl-12" }, [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                      },
                                      [
                                        _c(
                                          "div",
                                          { staticClass: "m-portlet__head" },
                                          [
                                            _vm._m(1),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "m-portlet__head-tools"
                                              },
                                              [
                                                _c(
                                                  "ul",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav"
                                                  },
                                                  [
                                                    _c(
                                                      "li",
                                                      {
                                                        staticClass:
                                                          "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                        attrs: {
                                                          "m-dropdown-toggle":
                                                            "hover"
                                                        }
                                                      },
                                                      [
                                                        _c(
                                                          "button",
                                                          {
                                                            staticClass:
                                                              "btn m-btn m-btn--icon m-btn--icon-only m-btn--pill",
                                                            class: [
                                                              _vm.state
                                                                ? "btn-success m-btn--custom"
                                                                : "btn-secondary btn-lg"
                                                            ],
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                _vm.state = !_vm.state
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass: "fa",
                                                              class: [
                                                                _vm.state
                                                                  ? "fa-check"
                                                                  : "fa-times"
                                                              ]
                                                            })
                                                          ]
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _vm._m(2)
                                      ]
                                    )
                                  ])
                                ])
                              ]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "tab-pane fade",
                            attrs: { id: "m_personal_income_quater_2" }
                          },
                          [
                            _c(
                              "div",
                              { staticClass: "row  align-items-center" },
                              [
                                _c("div", { staticClass: "col" }, [
                                  _c("div", { staticClass: "col-xl-12" }, [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
                                      },
                                      [
                                        _c(
                                          "div",
                                          { staticClass: "m-portlet__head" },
                                          [
                                            _vm._m(3),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "m-portlet__head-tools"
                                              },
                                              [
                                                _c(
                                                  "ul",
                                                  {
                                                    staticClass:
                                                      "m-portlet__nav"
                                                  },
                                                  [
                                                    _c(
                                                      "li",
                                                      {
                                                        staticClass:
                                                          "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                                                        attrs: {
                                                          "m-dropdown-toggle":
                                                            "hover"
                                                        }
                                                      },
                                                      [
                                                        _c(
                                                          "button",
                                                          {
                                                            staticClass:
                                                              "btn m-btn m-btn--icon m-btn--icon-only m-btn--pill",
                                                            class: [
                                                              _vm.state
                                                                ? "btn-success m-btn--custom"
                                                                : "btn-secondary btn-lg"
                                                            ],
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                _vm.state = !_vm.state
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass: "fa",
                                                              class: [
                                                                _vm.state
                                                                  ? "fa-check"
                                                                  : "fa-times"
                                                              ]
                                                            })
                                                          ]
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _vm._m(4)
                                      ]
                                    )
                                  ])
                                ])
                              ]
                            )
                          ]
                        )
                      ]
                    )
                  ])
                ])
              ])
            ]
          )
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "ul",
      {
        staticClass: "m-widget27__nav-items nav nav-pills nav-fill",
        attrs: { role: "tablist" }
      },
      [
        _c("li", { staticClass: "step2-tab-nav nav-item" }, [
          _c(
            "a",
            {
              staticClass: "nav-link active",
              attrs: {
                "data-toggle": "pill",
                href: "#m_personal_income_quater_1"
              }
            },
            [_vm._v("Deep Concave")]
          )
        ]),
        _vm._v(" "),
        _c("li", { staticClass: "step2-tab-nav nav-item" }, [
          _c(
            "a",
            {
              staticClass: "nav-link",
              attrs: {
                "data-toggle": "pill",
                href: "#m_personal_income_quater_2"
              }
            },
            [_vm._v("Medium Concave")]
          )
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget17" }, [
        _c(
          "div",
          {
            staticClass:
              "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger"
          },
          [
            _c(
              "div",
              { staticStyle: { height: "280px", "background-color": "white" } },
              [
                _c(
                  "div",
                  {
                    staticClass:
                      "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
                    staticStyle: { "min-height": "286px" }
                  },
                  [
                    _c("iframe", {
                      staticStyle: {
                        "margin-left": "40px",
                        "margin-top": "0px"
                      },
                      attrs: {
                        height: "280",
                        width: "90%",
                        src:
                          "https://sketchfab.com/models/0f583557d87a461e8e920741ad39575c/embed",
                        frameborder: "0",
                        allow: "autoplay; fullscreen; vr",
                        mozallowfullscreen: "true",
                        webkitallowfullscreen: "true"
                      }
                    })
                  ]
                )
              ]
            )
          ]
        )
      ]),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "m-widget17",
          staticStyle: { "padding-top": "60px", "padding-bottom": "20px" }
        },
        [
          _c("div", { staticClass: "m-widget17__stats" }, [
            _c(
              "div",
              { staticClass: "m-widget17__items m-widget17__items-col1" },
              [
                _c("div", { staticClass: "m-widget17__item" }, [
                  _c("span", { staticClass: "m-widget17__icon" }, [
                    _c("i", {
                      staticClass: "flaticon-presentation-1 m--font-brand"
                    })
                  ]),
                  _vm._v(" "),
                  _c("span", { staticClass: "m-widget17__subtitle" }, [
                    _vm._v("Better Grip")
                  ]),
                  _vm._v(" "),
                  _c("span", { staticClass: "m-widget17__desc" }, [
                    _vm._v("Sticks better to feet.")
                  ])
                ])
              ]
            ),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "m-widget17__items m-widget17__items-col2" },
              [
                _c("div", { staticClass: "m-widget17__item" }, [
                  _c("span", { staticClass: "m-widget17__icon" }, [
                    _c("i", { staticClass: "flaticon-coins m--font-success" })
                  ]),
                  _vm._v(" "),
                  _c("span", { staticClass: "m-widget17__subtitle" }, [
                    _vm._v("$ 0.00")
                  ]),
                  _vm._v(" "),
                  _c("span", { staticClass: "m-widget17__desc" }, [
                    _vm._v("No added cost")
                  ])
                ])
              ]
            )
          ])
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        { staticStyle: { "text-align": "justify", color: "#9699a4" } },
        [
          _c("h3", [_vm._v("Deep Concave")]),
          _vm._v(
            "\n                                                                Deep concave decks are mostly used for vert skateboarding as well as large gaps, as the\n                                                                deep concave makes it easier to keep the deck close to your feet.\n                                                                Select your preferred concave by check marking the upper right corner.\n                                                            "
          )
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget17" }, [
        _c(
          "div",
          {
            staticClass:
              "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger"
          },
          [
            _c(
              "div",
              { staticStyle: { height: "280px", "background-color": "white" } },
              [
                _c(
                  "div",
                  {
                    staticClass:
                      "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
                    staticStyle: { "min-height": "286px" }
                  },
                  [
                    _c("iframe", {
                      staticStyle: {
                        "margin-left": "40px",
                        "margin-top": "0px"
                      },
                      attrs: {
                        height: "280",
                        width: "90%",
                        src:
                          "https://sketchfab.com/models/6998edf0f00e43f09bb6047ebc0a56e5/embed",
                        frameborder: "0",
                        allow: "autoplay; fullscreen; vr",
                        mozallowfullscreen: "true",
                        webkitallowfullscreen: "true"
                      }
                    })
                  ]
                )
              ]
            )
          ]
        )
      ]),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "m-widget17",
          staticStyle: { "padding-top": "60px", "padding-bottom": "20px" }
        },
        [
          _c("div", { staticClass: "m-widget17__stats" }, [
            _c(
              "div",
              { staticClass: "m-widget17__items m-widget17__items-col1" },
              [
                _c("div", { staticClass: "m-widget17__item" }, [
                  _c("span", { staticClass: "m-widget17__icon" }, [
                    _c("i", {
                      staticClass: "flaticon-presentation-1 m--font-brand"
                    })
                  ]),
                  _vm._v(" "),
                  _c("span", { staticClass: "m-widget17__subtitle" }, [
                    _vm._v(
                      "\n                                                                                Flip Control\n                                                                            "
                    )
                  ]),
                  _vm._v(" "),
                  _c("span", { staticClass: "m-widget17__desc" }, [
                    _vm._v(
                      "\n                                                                                More precise control.\n                                                                            "
                    )
                  ])
                ])
              ]
            ),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "m-widget17__items m-widget17__items-col2" },
              [
                _c("div", { staticClass: "m-widget17__item" }, [
                  _c("span", { staticClass: "m-widget17__icon" }, [
                    _c("i", { staticClass: "flaticon-coins m--font-success" })
                  ]),
                  _vm._v(" "),
                  _c("span", { staticClass: "m-widget17__subtitle" }, [
                    _vm._v("$ 0.00")
                  ]),
                  _vm._v(" "),
                  _c("span", { staticClass: "m-widget17__desc" }, [
                    _vm._v("No added cost")
                  ])
                ])
              ]
            )
          ])
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        { staticStyle: { "text-align": "justify", color: "#9699a4" } },
        [
          _c("h3", [_vm._v("Medium Concave")]),
          _vm._v(
            "\n                                                                Medium concave decks are mostly used for street and park skateboarding.\n                                                                The medium concave makes it easier to accurately control the deck,\n                                                                which is essential for flip tricks.\n                                                                Select your preferred concave by check marking the upper right corner.\n                                                            "
          )
        ]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/views/Step3.vue?vue&type=template&id=383a2923&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/configurator/views/Step3.vue?vue&type=template&id=383a2923& ***!
  \**********************************************************************************************************************************************************************************************************************************/
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
    {
      staticClass: "m-wizard__form-step",
      attrs: { id: "m_wizard_form_step_3" }
    },
    [
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-xl-6" }, [
          _c(
            "div",
            {
              staticClass:
                "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
            },
            [
              _c("div", { staticClass: "m-portlet__head" }, [
                _vm._m(0),
                _vm._v(" "),
                _c("div", { staticClass: "m-portlet__head-tools" }, [
                  _c("ul", { staticClass: "m-portlet__nav" }, [
                    _c(
                      "li",
                      {
                        staticClass:
                          "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                        attrs: { "m-dropdown-toggle": "hover" }
                      },
                      [
                        _vm.state
                          ? _c(
                              "a",
                              {
                                staticClass:
                                  "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                on: {
                                  click: function() {
                                    _vm.state = !_vm.state
                                    _vm.perdeck += 1
                                  }
                                }
                              },
                              [_c("i", { staticClass: "fa fa-check" })]
                            )
                          : _c(
                              "a",
                              {
                                staticClass:
                                  "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                on: {
                                  click: function() {
                                    _vm.state = !_vm.state
                                    _vm.perdeck -= 1
                                  }
                                }
                              },
                              [_c("i", { staticClass: "fa fa-times" })]
                            )
                      ]
                    )
                  ])
                ])
              ]),
              _vm._v(" "),
              _vm._m(1)
            ]
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-xl-6" }, [
          _c(
            "div",
            {
              staticClass:
                "m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"
            },
            [
              _c("div", { staticClass: "m-portlet__head" }, [
                _vm._m(2),
                _vm._v(" "),
                _c("div", { staticClass: "m-portlet__head-tools" }, [
                  _c("ul", { staticClass: "m-portlet__nav" }, [
                    _c(
                      "li",
                      {
                        staticClass:
                          "m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push",
                        attrs: { "m-dropdown-toggle": "hover" }
                      },
                      [
                        !_vm.state
                          ? _c(
                              "a",
                              {
                                staticClass:
                                  "btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill",
                                on: {
                                  click: function() {
                                    _vm.state = !_vm.state
                                    _vm.perdeck -= 1
                                  }
                                }
                              },
                              [_c("i", { staticClass: "fa fa-check" })]
                            )
                          : _c(
                              "a",
                              {
                                staticClass:
                                  "btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill",
                                on: {
                                  click: function() {
                                    _vm.state = !_vm.state
                                    _vm.perdeck += 1
                                  }
                                }
                              },
                              [_c("i", { staticClass: "fa fa-times" })]
                            )
                      ]
                    )
                  ])
                ])
              ]),
              _vm._v(" "),
              _vm._m(3)
            ]
          )
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                    European Maple Wood\n                                "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget17" }, [
        _c(
          "div",
          {
            staticClass:
              "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
          },
          [
            _c("div", [
              _c(
                "div",
                {
                  staticClass:
                    "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
                  staticStyle: { "min-height": "286px" }
                },
                [
                  _c("img", {
                    staticClass: "step1-img1",
                    attrs: {
                      src:
                        "/skateboard-deck-production/european-maple-for-skateboard-deck-manufacturer-2hex.jpg",
                      alt: ""
                    }
                  })
                ]
              )
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticStyle: {
              "text-align": "justify",
              color: "#9699a4",
              "margin-top": "20px"
            }
          },
          [
            _c("h3", [_vm._v("European Maple Wood")]),
            _vm._v(
              "\n                                European maple is cheaper and lighter, but\n                                slightly less durable than American maple.\n                                Our European maple wood is sustainably grown in areas\n                                of warm summers and ice cold winters - just like\n                                our American maple.\n                            "
            )
          ]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__head-caption" }, [
      _c("div", { staticClass: "m-portlet__head-title" }, [
        _c("h3", { staticClass: "m-portlet__head-text" }, [
          _vm._v(
            "\n                                    American Maple Wood\n                                "
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "m-portlet__body" }, [
      _c("div", { staticClass: "m-widget17" }, [
        _c(
          "div",
          {
            staticClass:
              "m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
          },
          [
            _c("div", [
              _c(
                "div",
                {
                  staticClass:
                    "m-widget19__pic m-portlet-fit--top m-portlet-fit--sides",
                  staticStyle: { "min-height": "286px" }
                },
                [
                  _c("img", {
                    staticClass: "step1-img1",
                    attrs: {
                      src:
                        "/skateboard-deck-production/american-maple-for-skateboard-decks-factory-2hex.jpg",
                      alt: ""
                    }
                  })
                ]
              )
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticStyle: {
              "text-align": "justify",
              color: "#9699a4",
              "margin-top": "20px"
            }
          },
          [
            _c("h3", [_vm._v("American Maple Wood")]),
            _vm._v(
              "\n                                American maple wood is the standard in professional\n                                skateboarding. It is the most durable material and\n                                has been used since the beginning of modern skateboarding.\n                            "
            )
          ]
        )
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/assets/js/app.js":
/*!************************************!*\
  !*** ./resources/assets/js/app.js ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _bootstrap__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./bootstrap */ "./resources/assets/js/bootstrap.js");
/* harmony import */ var _bootstrap__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_bootstrap__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _store__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./store */ "./resources/assets/js/store/index.js");
/* harmony import */ var _components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./components */ "./resources/assets/js/components/index.js");




_components__WEBPACK_IMPORTED_MODULE_3__["default"].forEach(function (component) {
  vue__WEBPACK_IMPORTED_MODULE_1___default.a.component(component.name, component);
});
/* harmony default export */ __webpack_exports__["default"] = (new vue__WEBPACK_IMPORTED_MODULE_1___default.a({
  el: "#app",
  store: _store__WEBPACK_IMPORTED_MODULE_2__["default"]
}));

/***/ }),

/***/ "./resources/assets/js/bootstrap.js":
/*!******************************************!*\
  !*** ./resources/assets/js/bootstrap.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

window._ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js");
window.axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
var csrf_token = document.head.querySelector('meta[name="csrf-token"]');

if (csrf_token) {
  window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': csrf_token.content
  };
} else {
  console.error("CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token");
}

/***/ }),

/***/ "./resources/assets/js/components/Steps.vue":
/*!**************************************************!*\
  !*** ./resources/assets/js/components/Steps.vue ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Steps_vue_vue_type_template_id_cec92000___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Steps.vue?vue&type=template&id=cec92000& */ "./resources/assets/js/components/Steps.vue?vue&type=template&id=cec92000&");
/* harmony import */ var _Steps_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Steps.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/Steps.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Steps_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Steps_vue_vue_type_template_id_cec92000___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Steps_vue_vue_type_template_id_cec92000___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/Steps.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/Steps.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/assets/js/components/Steps.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Steps_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Steps.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Steps.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Steps_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/Steps.vue?vue&type=template&id=cec92000&":
/*!*********************************************************************************!*\
  !*** ./resources/assets/js/components/Steps.vue?vue&type=template&id=cec92000& ***!
  \*********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Steps_vue_vue_type_template_id_cec92000___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Steps.vue?vue&type=template&id=cec92000& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Steps.vue?vue&type=template&id=cec92000&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Steps_vue_vue_type_template_id_cec92000___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Steps_vue_vue_type_template_id_cec92000___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/VendorCode.vue":
/*!*******************************************************!*\
  !*** ./resources/assets/js/components/VendorCode.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VendorCode_vue_vue_type_template_id_4b347e4c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VendorCode.vue?vue&type=template&id=4b347e4c& */ "./resources/assets/js/components/VendorCode.vue?vue&type=template&id=4b347e4c&");
/* harmony import */ var _VendorCode_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./VendorCode.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/VendorCode.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _VendorCode_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _VendorCode_vue_vue_type_template_id_4b347e4c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _VendorCode_vue_vue_type_template_id_4b347e4c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/VendorCode.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/VendorCode.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/assets/js/components/VendorCode.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VendorCode_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./VendorCode.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/VendorCode.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VendorCode_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/VendorCode.vue?vue&type=template&id=4b347e4c&":
/*!**************************************************************************************!*\
  !*** ./resources/assets/js/components/VendorCode.vue?vue&type=template&id=4b347e4c& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VendorCode_vue_vue_type_template_id_4b347e4c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./VendorCode.vue?vue&type=template&id=4b347e4c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/VendorCode.vue?vue&type=template&id=4b347e4c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VendorCode_vue_vue_type_template_id_4b347e4c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VendorCode_vue_vue_type_template_id_4b347e4c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue":
/*!*************************************************************************************!*\
  !*** ./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SkateboardDecksConfigurator_vue_vue_type_template_id_47b82d60___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SkateboardDecksConfigurator.vue?vue&type=template&id=47b82d60& */ "./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue?vue&type=template&id=47b82d60&");
/* harmony import */ var _SkateboardDecksConfigurator_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SkateboardDecksConfigurator.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _SkateboardDecksConfigurator_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _SkateboardDecksConfigurator_vue_vue_type_template_id_47b82d60___WEBPACK_IMPORTED_MODULE_0__["render"],
  _SkateboardDecksConfigurator_vue_vue_type_template_id_47b82d60___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************!*\
  !*** ./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SkateboardDecksConfigurator_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./SkateboardDecksConfigurator.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SkateboardDecksConfigurator_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue?vue&type=template&id=47b82d60&":
/*!********************************************************************************************************************!*\
  !*** ./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue?vue&type=template&id=47b82d60& ***!
  \********************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SkateboardDecksConfigurator_vue_vue_type_template_id_47b82d60___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./SkateboardDecksConfigurator.vue?vue&type=template&id=47b82d60& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue?vue&type=template&id=47b82d60&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SkateboardDecksConfigurator_vue_vue_type_template_id_47b82d60___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SkateboardDecksConfigurator_vue_vue_type_template_id_47b82d60___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/configurator/views/Step1.vue":
/*!*********************************************************************!*\
  !*** ./resources/assets/js/components/configurator/views/Step1.vue ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Step1_vue_vue_type_template_id_381dfa21___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Step1.vue?vue&type=template&id=381dfa21& */ "./resources/assets/js/components/configurator/views/Step1.vue?vue&type=template&id=381dfa21&");
/* harmony import */ var _Step1_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Step1.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/configurator/views/Step1.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Step1_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Step1_vue_vue_type_template_id_381dfa21___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Step1_vue_vue_type_template_id_381dfa21___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/configurator/views/Step1.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/configurator/views/Step1.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************!*\
  !*** ./resources/assets/js/components/configurator/views/Step1.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Step1_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Step1.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/views/Step1.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Step1_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/configurator/views/Step1.vue?vue&type=template&id=381dfa21&":
/*!****************************************************************************************************!*\
  !*** ./resources/assets/js/components/configurator/views/Step1.vue?vue&type=template&id=381dfa21& ***!
  \****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Step1_vue_vue_type_template_id_381dfa21___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Step1.vue?vue&type=template&id=381dfa21& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/views/Step1.vue?vue&type=template&id=381dfa21&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Step1_vue_vue_type_template_id_381dfa21___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Step1_vue_vue_type_template_id_381dfa21___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/configurator/views/Step2.vue":
/*!*********************************************************************!*\
  !*** ./resources/assets/js/components/configurator/views/Step2.vue ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Step2_vue_vue_type_template_id_382c11a2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Step2.vue?vue&type=template&id=382c11a2& */ "./resources/assets/js/components/configurator/views/Step2.vue?vue&type=template&id=382c11a2&");
/* harmony import */ var _Step2_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Step2.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/configurator/views/Step2.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Step2_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Step2_vue_vue_type_template_id_382c11a2___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Step2_vue_vue_type_template_id_382c11a2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/configurator/views/Step2.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/configurator/views/Step2.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************!*\
  !*** ./resources/assets/js/components/configurator/views/Step2.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Step2_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Step2.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/views/Step2.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Step2_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/configurator/views/Step2.vue?vue&type=template&id=382c11a2&":
/*!****************************************************************************************************!*\
  !*** ./resources/assets/js/components/configurator/views/Step2.vue?vue&type=template&id=382c11a2& ***!
  \****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Step2_vue_vue_type_template_id_382c11a2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Step2.vue?vue&type=template&id=382c11a2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/views/Step2.vue?vue&type=template&id=382c11a2&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Step2_vue_vue_type_template_id_382c11a2___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Step2_vue_vue_type_template_id_382c11a2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/configurator/views/Step3.vue":
/*!*********************************************************************!*\
  !*** ./resources/assets/js/components/configurator/views/Step3.vue ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Step3_vue_vue_type_template_id_383a2923___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Step3.vue?vue&type=template&id=383a2923& */ "./resources/assets/js/components/configurator/views/Step3.vue?vue&type=template&id=383a2923&");
/* harmony import */ var _Step3_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Step3.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/configurator/views/Step3.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Step3_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Step3_vue_vue_type_template_id_383a2923___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Step3_vue_vue_type_template_id_383a2923___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/configurator/views/Step3.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/configurator/views/Step3.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************!*\
  !*** ./resources/assets/js/components/configurator/views/Step3.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Step3_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Step3.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/views/Step3.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Step3_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/configurator/views/Step3.vue?vue&type=template&id=383a2923&":
/*!****************************************************************************************************!*\
  !*** ./resources/assets/js/components/configurator/views/Step3.vue?vue&type=template&id=383a2923& ***!
  \****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Step3_vue_vue_type_template_id_383a2923___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Step3.vue?vue&type=template&id=383a2923& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/configurator/views/Step3.vue?vue&type=template&id=383a2923&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Step3_vue_vue_type_template_id_383a2923___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Step3_vue_vue_type_template_id_383a2923___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/components/index.js":
/*!*************************************************!*\
  !*** ./resources/assets/js/components/index.js ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VendorCode_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VendorCode.vue */ "./resources/assets/js/components/VendorCode.vue");
/* harmony import */ var _Steps_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Steps.vue */ "./resources/assets/js/components/Steps.vue");
/* harmony import */ var _configurator_SkateboardDecksConfigurator_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./configurator/SkateboardDecksConfigurator.vue */ "./resources/assets/js/components/configurator/SkateboardDecksConfigurator.vue");
// components/index.js



/* harmony default export */ __webpack_exports__["default"] = ([_VendorCode_vue__WEBPACK_IMPORTED_MODULE_0__["default"], _configurator_SkateboardDecksConfigurator_vue__WEBPACK_IMPORTED_MODULE_2__["default"], _Steps_vue__WEBPACK_IMPORTED_MODULE_1__["default"]]);

/***/ }),

/***/ "./resources/assets/js/store/index.js":
/*!********************************************!*\
  !*** ./resources/assets/js/store/index.js ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var _modules_configurator__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/configurator */ "./resources/assets/js/store/modules/configurator.js");



vue__WEBPACK_IMPORTED_MODULE_0___default.a.use(vuex__WEBPACK_IMPORTED_MODULE_1__["default"]);
/* harmony default export */ __webpack_exports__["default"] = (new vuex__WEBPACK_IMPORTED_MODULE_1__["default"].Store({
  state: {},
  mutations: {},
  actions: {},
  getters: {},
  modules: {
    configurator: _modules_configurator__WEBPACK_IMPORTED_MODULE_2__["default"]
  }
}));

/***/ }),

/***/ "./resources/assets/js/store/modules/configurator.js":
/*!***********************************************************!*\
  !*** ./resources/assets/js/store/modules/configurator.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  namespaced: true,
  state: {
    skateboard: {
      steps: [{
        state: false
      }, {
        state: true
      }, {
        state: true
      }, {
        state: true
      }, {
        state: false
      }, {
        state: false,
        name: ''
      }, {
        state: false,
        name: ''
      }, {
        state: true,
        name: ''
      }, {
        fulldip: {
          state: false,
          color: ""
        },
        transparent: {
          state: false,
          color: ""
        },
        metallic: {
          state: false,
          color: ""
        },
        blacktop: {
          state: false
        },
        blackmidlayer: {
          state: false
        },
        pattern: {
          state: false
        }
      }, {
        state: false,
        name: ''
      }, {
        state: false,
        name: ''
      }]
    }
  },
  getters: {
    getStepByIndex: function getStepByIndex(state) {
      return function (index) {
        return state.skateboard.steps[index];
      };
    },
    skateboardSteps: function skateboardSteps(state) {
      return state.skateboard.steps;
    }
  },
  mutations: {
    changeState: function changeState(state, payload) {
      state.skateboard.steps[payload.index].state = payload.data;
    }
  },
  actions: {}
});

/***/ }),

/***/ 0:
/*!******************************************!*\
  !*** multi ./resources/assets/js/app.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/2hex/resources/assets/js/app.js */"./resources/assets/js/app.js");


/***/ })

},[[0,"/mix/manifest","/mix/vendor"]]]);
//# sourceMappingURL=app.js.map