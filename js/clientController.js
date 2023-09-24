var _clientController = function (options) {
	var _clientController;
	var rbe_engine = new _rbe_engine();
	_clientController = {
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
		assignEvents: function () {},
		showErrorMessage: function (message) {}
	};
	_clientController.setOptions(options);
	return _clientController;
}
