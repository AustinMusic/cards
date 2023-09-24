var _aa_map_tpl_advancedSearch = function(options){
	var aa_map_tpl_advancedSearch;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	
	aa_map_tpl_advancedSearch = {
		options:{
			mapObject: false,
			connectedTemplate: false,
			translations:{},
			controller: "",
			tag: "advancedSearch",
			template: "<div id='advancedSearch'>"+
						  "<input type='button' id='advancedSearch' value='title_proxy'/>"+
						"</div>",
		    order: 2,
			dataSource: "",
			layout:{
				tag: "",
			},
			drawingManager: "",
			polygon: ""
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
			aa_mapRenderer.renderButton();
			this.assignEvents();
		},
		assignEvents: function(){
			var _element = document.getElementById(this.options.tag);
			if(rbe_engine.checkElement(_element)){
				_element.setAttribute("onClick",this.options.controller+".toggleAdvancedSearch(this);")
			}		
		},
		toggleAdvancedSearch:function(_element){
			var __element = document.getElementById("filterlistSearch");
			if(rbe_engine.checkElement(__element)){
				if (__element.style.display=="none") {
					__element.style.display = "block";
				}else{
					__element.style.display = "none";
				}
			}
			
		}
	};
	
	aa_map_tpl_advancedSearch.setOptions(options);
	
	return aa_map_tpl_advancedSearch;
};