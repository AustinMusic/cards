var _aa_map_tpl_leaseTransaction = function(options){
	var aa_map_tpl_leaseTransaction;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	var aa_mapRenderer = new _aa_mapRenderer();
	aa_map_tpl_leaseTransaction = {
		options:{
			translations:{},
			mapObject: false,
			controller: "",
			tag: "leaseTransaction",
			template: "<div id='_ltb' class='filters'>"+
							"<div class='labelHolder'><b>title_proxy</b></div>"+
							"<div id='ltb' >"+
								"<input type='text' style='width: 130px; float: left;' id='leaseTransactionFrom' data-filter='leaseTransactionFrom' value='' placeholder='From' data-format='dateVal' class='form-control'/>"+
								"<input type='text' style='width: 130px; float: right;' id='leaseTransactionTo' data-filter='leaseTransactionTo' value='' placeholder='To' data-format='dateVal' class='form-control'/>"+
								"<input type='hidden' id='leaseTransactionFromValue' class='_mapFilter' data-filter='leaseTransactionFrom' class='_mapFilter' value='' />"+
								"<input type='hidden' id='leaseTransactionToValue' class='_mapFilter' data-filter='leaseTransactionTo' class='_mapFilter' value='' />"+
							"</div>"+
							"<div style='clear:both;'></div>"+
							"<br />"+
							"</div>",
			order: 1,
			dataSource: {
							min:0,
							max:0
						},
			layout:{
				tag: "",
			}
		},
		setOptions: function(options){
		    for(var _attr in options) {
		        if(this.options.hasOwnProperty(_attr)){
		        	this.options[_attr] = options[_attr];
		        }
		    }
		},
		render: function(){
			var aa_mapRenderer = new _aa_mapRenderer({
				template:this.options
			});
			aa_mapRenderer.renderBoundInputs();
			this.initializeDatePickers();
		},
		initializeDatePickers : function () {
			$("#leaseTransactionFrom").datepicker({
				dateFormat : "yy-mm-dd",
				changeMonth : true,
				changeYear : true,
				/*minDate : null,
				maxDate : null,*/
				controller : this.options.mapObject.options.activeObject,
				valueElementID : "leaseTransactionFromValue",
				maxDateElementID : "leaseTransactionFrom",
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
			$("#leaseTransactionTo").datepicker({
				dateFormat : "yy-mm-dd",
				changeMonth : true,
				changeYear : true,
				/*minDate : null,
				maxDate : null,*/
				controller : this.options.mapObject.options.activeObject,
				valueElementID : "leaseTransactionToValue",
				minDateElementID : "leaseTransactionTo",
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
	
	aa_map_tpl_leaseTransaction.setOptions(options);
	
	return aa_map_tpl_leaseTransaction;
};