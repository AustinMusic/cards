var _aa_map_tpl_groundLease = function(options){
	var aa_map_tpl_groundLease;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	var aa_mapRenderer = new _aa_mapRenderer();
	aa_map_tpl_groundLease = {
		options:{
			translations:{},
			mapObject: false,
			controller: "",
			tag: "groundLease",
			template: "<div id='_glb' class='filters'>"+
							"<div class='labelHolder'><b>title_proxy</b>"+
								"<input type='checkBox' id='groundLease' data-filter='groundLease' class='_mapFilter form-control' value='' />"+
							"</div>"+
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
			var _element = document.getElementById("groundLease");
			if(rbe_engine.checkElement(_element)){
				_element.setAttribute("onClick",this.options.mapObject.options.activeObject+".filterMap("+this.options.mapObject.options.activeObject+".buildFilters());");
			}
		},
	};
	
	aa_map_tpl_groundLease.setOptions(options);
	
	return aa_map_tpl_groundLease;
};