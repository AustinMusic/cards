var _aa_map_tpl_leaseEndTransaction = function(options){
	var aa_map_tpl_leaseEndTransaction;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	var aa_mapRenderer = new _aa_mapRenderer();
	aa_map_tpl_leaseEndTransaction = {
		options:{
			translations:{},
			mapObject: false,
			controller: "",
			tag: "leaseEndTransaction",
			template: "<div id='_lteb' class='filters'>"+
							"<div class='labelHolder'><b>title_proxy</b></div>"+
							"<div id='lteb' >"+
								"<input type='text' style='width: 130px; float: left;' id='leaseEndTransactionFrom' data-filter='leaseEndTransactionFrom' value='' placeholder='From' data-format='dateVal' class='form-control'/>"+
								"<input type='text' style='width: 130px; float: right;' id='leaseEndTransactionTo' data-filter='leaseEndTransactionTo' value='' placeholder='To' data-format='dateVal' class='form-control'/>"+
								"<input type='hidden' id='leaseEndTransactionFromValue' class='_mapFilter' data-filter='leaseEndTransactionFrom' class='_mapFilter' value='' />"+
								"<input type='hidden' id='leaseEndTransactionToValue' class='_mapFilter' data-filter='leaseEndTransactionTo' class='_mapFilter' value='' />"+
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
			$("#leaseEndTransactionFrom").datepicker({
				dateFormat : "yy-mm-dd",
				changeMonth : true,
				changeYear : true,
				/*minDate : null,
				maxDate : null,*/
				controller : this.options.mapObject.options.activeObject,
				valueElementID : "leaseEndTransactionFromValue",
				maxDateElementID : "leaseEndTransactionFrom",
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
			$("#leaseEndTransactionTo").datepicker({
				dateFormat : "yy-mm-dd",
				changeMonth : true,
				changeYear : true,
				/*minDate : null,
				maxDate : null,*/
				controller : this.options.mapObject.options.activeObject,
				valueElementID : "leaseEndTransactionToValue",
				minDateElementID : "leaseEndTransactionTo",
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
	
	aa_map_tpl_leaseEndTransaction.setOptions(options);
	
	return aa_map_tpl_leaseEndTransaction;
};