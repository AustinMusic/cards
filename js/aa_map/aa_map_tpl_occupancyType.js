var _aa_map_tpl_occupancyType = function(options){
	var aa_map_tpl_occupancyType;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	var aa_mapRenderer = new _aa_mapRenderer();
	aa_map_tpl_occupancyType = {
		options:{
			translations:{},
			mapObject: false,
			controller: "",
			tag: "occupancyType",
			template: "<div id='_occuptp' class='filters'>"+
							"<div class='labelHolder'><b>title_proxy</b></div>"+
							"<select style='float:left; margin-right:10px;' id='occuptp' data-filter='occupancy_type' class='_mapFilter form-control'></select>"+
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
			aa_mapRenderer.renderSelect();
			this.assignEvents();
		},
		assignEvents: function(){
			var _element = document.getElementById("occuptp");
			if(rbe_engine.checkElement(_element)){
				_element.setAttribute("onChange",this.options.mapObject.options.activeObject+".filterMap("+this.options.mapObject.options.activeObject+".buildFilters());");
			}
		},
	};
	
	aa_map_tpl_occupancyType.setOptions(options);
	
	return aa_map_tpl_occupancyType;
};