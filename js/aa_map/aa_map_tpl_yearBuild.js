var _aa_map_tpl_yearBuild = function(options){
	var aa_map_tpl_yearBuild;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	var aa_mapRenderer = new _aa_mapRenderer();
	aa_map_tpl_yearBuild = {
		options:{
			translations:{},
			mapObject: false,
			controller: "",
			tag: "yearBuild",
			template: "<div id='_yb' class='filters'>"+
						"<div class='labelHolder'><b>title_proxy</b></div>"+
						"<div id='yb' >"+
							"<input type='text' style='width: 130px; float: left;' id='yearBuiltFrom' data-filter='yearBuiltFrom' class='_mapFilter form-control' value='' placeholder='From' />"+
							"<input type='text' style='width: 130px; float: right;' id='yearBuiltTo' data-filter='yearBuiltTo' class='_mapFilter form-control' value='' placeholder='To' />"+
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
			var _element = document.getElementById("yearBuiltFrom");
			if(rbe_engine.checkElement(_element)){
				_element.setAttribute("onBlur",this.options.mapObject.options.activeObject+".filterMap("+this.options.mapObject.options.activeObject+".buildFilters(),this);");
				_element.setAttribute("onKeyUp","this.value="+this.options.mapObject.options.activeObject+".aa_engine.formatNumber(this.value,0,0,false);");
			}

			var _element = document.getElementById("yearBuiltTo");
			if(rbe_engine.checkElement(_element)){
				_element.setAttribute("onBlur",this.options.mapObject.options.activeObject+".filterMap("+this.options.mapObject.options.activeObject+".buildFilters(),this);");
				_element.setAttribute("onKeyUp","this.value="+this.options.mapObject.options.activeObject+".aa_engine.formatNumber(this.value,0,0,false);");
			}
		},
	};
	
	aa_map_tpl_yearBuild.setOptions(options);
	
	return aa_map_tpl_yearBuild;
};