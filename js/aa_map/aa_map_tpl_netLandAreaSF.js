var _aa_map_tpl_netLandAreaSF = function(options){
	var aa_map_tpl_netLandAreaSF;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	var aa_mapRenderer = new _aa_mapRenderer();
	aa_map_tpl_netLandAreaSF = {
		options:{
			translations:{},
			mapObject: false,
			controller: "",
			tag: "netLandAreaSF",
			template: "<div id='_nlasf' class='filters form-group'>"+
							"<div class='labelHolder'><b>title_proxy</b></div>"+
							"<div id='nlass' >"+
								"<input type='text' style='width: 130px; float: left;' id='netLandAreaSFFrom' data-filter='netLandAreaSFFrom' class='_mapFilter form-control' value='' placeholder='From' data-format='doubleVal' />"+
								"<input type='text' style='width: 130px; float: right;' id='netLandAreaSFTo' data-filter='netLandAreaSFTo' class='_mapFilter form-control' value='' placeholder='To' data-format='doubleVal' />"+
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
			this.assignEvents();
		},
		assignEvents: function(){
			var _element = document.getElementById("netLandAreaSFFrom");
			if(rbe_engine.checkElement(_element)){
				_element.setAttribute("onBlur",this.options.mapObject.options.activeObject+".filterMap("+this.options.mapObject.options.activeObject+".buildFilters(),this);");
				_element.setAttribute("onKeyUp","this.value="+this.options.mapObject.options.activeObject+".aa_engine.formatNumber(this.value,0,0,true);");
			}

			var _element = document.getElementById("netLandAreaSFTo");
			if(rbe_engine.checkElement(_element)){
				_element.setAttribute("onBlur",this.options.mapObject.options.activeObject+".filterMap("+this.options.mapObject.options.activeObject+".buildFilters(),this);");
				_element.setAttribute("onKeyUp","this.value="+this.options.mapObject.options.activeObject+".aa_engine.formatNumber(this.value,0,0,true);");
			}
		},
	};
	
	aa_map_tpl_netLandAreaSF.setOptions(options);
	
	return aa_map_tpl_netLandAreaSF;
};