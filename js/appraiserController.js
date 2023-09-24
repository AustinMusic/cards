var _appraiserController = function (options) {
  var _appraiserController;
  var rbe_engine = new _rbe_engine();
  _appraiserController = {
    options: {
      activeObject: "",
      id: "",
      data: ""
    },
    data: {},
    baseController: "",
    setOptions: function (options) {
      for (var attr in options) {
        if (this.options.hasOwnProperty(attr)) {
          this.options[attr] = options[attr];
        }
      }
    },
    init: function () {
      this.assignEvents();
      this.baseController = new _baseController({
        activeObject: this.options.activeObject + ".baseController",
        data: this.options.data
      });
      this.baseController.init();
    },
    assignEvents: function () {
      var _element = document.getElementById("IsAppraiser");
      if (rbe_engine.checkElement(_element)) {
        _element.setAttribute("onClick", this.options.activeObject + ".toggleAppInfo(this);");
        this.toggleAppInfo(_element);
      }
      var _element = document.getElementById("IsAppAsst");
      if (rbe_engine.checkElement(_element)) {
        _element.setAttribute("onClick", this.options.activeObject + ".toggleAppInfo(this);");
        this.toggleAppInfo(_element);
      }
    },
    toggleAppInfo: function () {
      var isApp = document.getElementById("IsAppraiser");
      var isAppAsst = document.getElementById("IsAppAsst");
      var _elements = document.getElementById("licenseData");
      if (isApp.checked || isAppAsst.checked) {
        _elements.style.display = "block";
      } else {
        _elements.style.display = "none";
      }
    },
    showErrorMessage: function (message) {}
  };
  _appraiserController.setOptions(options);
  return _appraiserController;
}
