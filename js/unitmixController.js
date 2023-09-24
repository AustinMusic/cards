var _unitmixController = function (options) {
	var _unitmixController;
	var rbe_engine = new _rbe_engine();
	_unitmixController = {
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
			this.renderUI();
			this.baseController = new _baseController({
					activeObject: this.options.activeObject + ".baseController",
					data: this.options.data,
					openerController: "improvedsalesController",
					onReturnExecutionMethod: "applyCalcuations",
					dataName: "unitmixes"
				});
			this.baseController.init();
			this.assignEvents();
		},
		renderUI: function () {},
		assignEvents: function () {
			var _elements = document.getElementsByClassName("_fm00t");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,0,true);");
					_elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 0, true);
				}
			}
			var _elements = document.getElementsByClassName("_fm01tp");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,1,true)+' %';");
					_elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 1, true) + " %";
				}
			}
			var _elements = document.getElementsByClassName("_fm01f");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,1,true);");
					_elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 1, true);
				}
			}
			var _elements = document.getElementsByClassName("_ppgc");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".propagadeCalcualations();");
				}
			}
		},
		propagadeCalcualations: function () {
			var no_units = $(".no_units").val();
			var no_units =  + (no_units ? no_units.replace(/[^\d.-]/g, '') : no_units);
			var no_these_units = $(".no_these_units").val();
			var no_these_units =  + (no_these_units ? no_these_units.replace(/[^\d.-]/g, '') : no_these_units);
			$("#percunits").val((no_these_units / no_units) * 100).trigger('onblur');
			var _elements = document.getElementsByClassName("calc");
		},
		showErrorMessage: function (message) {}
	};
	_unitmixController.setOptions(options);
	return _unitmixController;
}
