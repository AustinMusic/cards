var _aa_map_tpl_netLandAreaAcre = function(options){
	var aa_map_tpl_netLandAreaAcre;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	var aa_mapRenderer = new _aa_mapRenderer();
	aa_map_tpl_netLandAreaAcre = {
		options:{
			translations:{},
			mapObject: false,
			controller: "",
			tag: "netLandAreaAcre",
			template: "<div id='_glaacr' class='filters'>"+
							"<div class='labelHolder'><b>title_proxy</b></div>"+
							"<div id='glaacr' >"+
								"<input type='text' style='width: 130px; float: left;' id='netLandAreaAcresFrom' data-filter='netLandAreaAcresFrom' class='_mapFilter form-control' value='' placeholder='From' data-format='intVal' />"+
								"<input type='text' style='width: 130px; float: right;' id='netLandAreaAcresTo' data-filter='netLandAreaAcresTo' class='_mapFilter form-control' value='' placeholder='To' data-format='intVal' />"+
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
		assignEvents : function () {
			var _element = document.getElementById("netLandAreaAcresFrom");
			if (rbe_engine.checkElement(_element)) {				_element.setAttribute("onBlur", "this.value=" + this.options.mapObject.options.activeObject + ".aa_engine.formatNumber(this.value,0,3,true);");
				_element.setAttribute("onBlur", _element.getAttribute("onBlur")+";"+this.options.mapObject.options.activeObject + ".filterMap(" + this.options.mapObject.options.activeObject + ".buildFilters(),this);");
				
			}
			var _element = document.getElementById("netLandAreaAcresTo");
			if (rbe_engine.checkElement(_element)) {				_element.setAttribute("onBlur", "this.value=" + this.options.mapObject.options.activeObject + ".aa_engine.formatNumber(this.value,0,3,true);");
				_element.setAttribute("onBlur", _element.getAttribute("onBlur")+";"+this.options.mapObject.options.activeObject + ".filterMap(" + this.options.mapObject.options.activeObject + ".buildFilters(),this);");
			}
		},
	};
	
	aa_map_tpl_netLandAreaAcre.setOptions(options);
	
	return aa_map_tpl_netLandAreaAcre;
};