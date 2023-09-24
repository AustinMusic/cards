var _aa_map_tpl_salesRecord = function (options) {
	var aa_map_tpl_salesRecord;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	var aa_mapRenderer = new _aa_mapRenderer();
	aa_map_tpl_salesRecord = {
		options : {
			translations : {},
			mapObject : false,
			controller : "",
			tag : "salesRecord",
			template : "<div id='_salesrec' class='filters'>" + "<div class='labelHolder'><b>title_proxy</b></div>" + "<div id='salesrec' >" + "<input type='text' style='width: 130px; float: left;' id='saledateFrom' data-filter='saledateFrom' value='' placeholder='From' data-format='dateVal' class='form-control'/>" + "<input type='text' style='width: 130px; float: right;' id='saledateTo' data-filter='saledateTo' value='' placeholder='To' data-format='dateVal' class='form-control'/>" + "<input type='hidden' id='saledateFromValue' class='_mapFilter' data-filter='saledateFrom' class='_mapFilter' value='' />" + "<input type='hidden' id='saledateToValue' class='_mapFilter' data-filter='saledateTo' class='_mapFilter' value='' />" + "</div>" + "<div style='clear:both;'></div>" + "<br />" + "</div>",
			order : 1,
			dataSource : {
				min : 0,
				max : 0
			},
			layout : {
				tag : "",
			}
		},
		setOptions : function (options) {
			for (var _attr in options) {
				if (this.options.hasOwnProperty(_attr)) {
					this.options[_attr] = options[_attr];
				}
			}
		},
		render : function () {
			var aa_mapRenderer = new _aa_mapRenderer({
					template : this.options
				});
			aa_mapRenderer.renderBoundInputs();
			this.initializeDatePickers();
		},
		initializeDatePickers : function () {
			$("#saledateFrom").datepicker({
				dateFormat : "yy-mm-dd",
				changeMonth : true,
				changeYear : true,
				/*minDate : null,
				maxDate : null,*/
				controller : this.options.mapObject.options.activeObject,
				valueElementID : "saledateFromValue",
				maxDateElementID : "saledateFrom",
				onSelect : function (dateText, _datePicker) {
					//$("#" + _datePicker.settings.maxDateElementID).datepicker("option", "minDate", dateText);
					var _element = document.getElementById(_datePicker.settings.valueElementID);
					if (rbe_engine.checkElement(_element)) {
						_element.value = dateText;
					}
					var _controller = window.top.window[_datePicker.settings.controller];
					var filters = _controller.buildFilters();
					_controller.filterMap(filters);
				}
			});
			$("#saledateTo").datepicker({
				dateFormat : "yy-mm-dd",
				changeMonth : true,
				changeYear : true,
				/*minDate : null,
				maxDate : null,*/
				controller : this.options.mapObject.options.activeObject,
				valueElementID : "saledateToValue",
				minDateElementID : "saledateTo",
				onSelect : function (dateText, _datePicker) {
					var _element = document.getElementById(_datePicker.settings.valueElementID);
					if (rbe_engine.checkElement(_element)) {
						_element.value = dateText;
					}
					var _controller = window.top.window[_datePicker.settings.controller];
					var filters = _controller.buildFilters();
					_controller.filterMap(filters);
				}
			});
		},
	};
	aa_map_tpl_salesRecord.setOptions(options);
	return aa_map_tpl_salesRecord;
};
