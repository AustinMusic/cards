var _aa_map_tpl_DueDate = function(options){
	var aa_map_tpl_DueDate;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	var aa_mapRenderer = new _aa_mapRenderer();
	aa_map_tpl_DueDate = {
		options:{
			translations:{},
			mapObject: false,
			controller: "",
			tag: "DueDate",
			template: "<div id='_ddeb' class='filters'>"+
							"<div class='labelHolder'><b>title_proxy</b></div>"+
							"<div id='ddeb' >"+
								"<input type='text' style='width: 130px; float: left;' id='DueDateFrom' data-filter='DueDateFrom' value='' placeholder='From' data-format='dateVal' class='form-control'/>"+
								"<input type='text' style='width: 130px; float: right;' id='DueDateTo' data-filter='DueDateTo' value='' placeholder='To' data-format='dateVal' class='form-control'/>"+
								"<input type='hidden' id='DueDateFromValue' class='_mapFilter' data-filter='DueDateFrom' class='_mapFilter' value='' />"+
								"<input type='hidden' id='DueDateToValue' class='_mapFilter' data-filter='DueDateTo' class='_mapFilter' value='' />"+
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
			$("#DueDateFrom").datepicker({
				dateFormat : "yy-mm-dd",
				changeMonth : true,
				changeYear : true,
				/*minDate : null,
				maxDate : null,*/
				controller : this.options.mapObject.options.activeObject,
				valueElementID : "DueDateFromValue",
				maxDateElementID : "DueDateFrom",
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
			$("#DueDateTo").datepicker({
				dateFormat : "yy-mm-dd",
				changeMonth : true,
				changeYear : true,
				/*minDate : null,
				maxDate : null,*/
				controller : this.options.mapObject.options.activeObject,
				valueElementID : "DueDateToValue",
				minDateElementID : "DueDateTo",
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
	
	aa_map_tpl_DueDate.setOptions(options);
	
	return aa_map_tpl_DueDate;
};