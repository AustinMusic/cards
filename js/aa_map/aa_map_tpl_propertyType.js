var _aa_map_tpl_propertyType = function(options){
	var aa_map_tpl_propertyType;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	
	aa_map_tpl_propertyType = {
		options:{
			controller: "",
			mapObject: false,
			connectedTemplate: false,
			translations:{},
			controller: "",
			tag: "propertyType",
			template: "<div class='filters form-group' style='margin-bottom:4px;'>"+
							"<label for='_typeValue'></label>"+
							"<input type='checkbox' id='_typeValue' data-id='_typeid' data-filter='ptid' filter-type='group' class='propertyType _mapFilter'/>_typeValue"+
						"</div>",
			order: 1,
			dataSource: "",
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
			aa_mapRenderer.renderCheckBoxGroup({value:"ptid",title:"propertytype"});
			this.assignEvents();
		},
		assignEvents: function(){
			var _elements = document.getElementsByClassName(this.options.tag);
			if(rbe_engine.checkElement(_elements)){
				for(var i=0;i<_elements.length;i++){
					_elements[i].setAttribute("onClick",this.options.controller+".setSubPropertyType(this);");
				}
			}
		},
		setSubPropertyType: function(_element){
			if(!this.options.mapObject){
				return false;
			}
			var propertyTypeID = _element.getAttribute("data-id");
			propertyTypeID = parseInt(propertyTypeID);

			var hasChecked = false;
			var _elements = document.getElementsByClassName(this.options.tag);
			if(rbe_engine.checkElement(_elements)){
				for(var i=0;i<_elements.length;i++){
					if(_elements[i].checked){
						hasChecked = true;
					}
				}
			}

			if(this.options.connectedTemplate!==false){
				this.options.connectedTemplate.setSubPropertyTypes(_element,hasChecked,propertyTypeID);
			}
			
			$("#mapFilters").accordion("refresh");
			
			//if(_element.checked){
				var filters = this.options.mapObject.buildFilters();
				this.options.mapObject.filterMap(filters);
			/*}else{
				this.hideMarkers(_element);
			}*/
		}
	};
	
	aa_map_tpl_propertyType.setOptions(options);
	
	return aa_map_tpl_propertyType;
};