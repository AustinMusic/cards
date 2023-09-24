var _aa_map_tpl_subPropertyType = function(options){
	var aa_map_tpl_subPropertyType;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	
	aa_map_tpl_subPropertyType = {
		options:{
			apObject: false,
			translations:{},
			controller: "",
			reportTypeID: 0,
			tag: "ptsubfilters",
			template: "<div data-id='_ptid' class='subtypes form-group' style='margin-bottom:10px;'>"+
							"<label for='ptsubfilters'></label>"+
							"<input type='checkbox' id='ptsubfilters' data-id='_typeid' data-filter='ptsid' filter-type='group' class='propertySubType _mapFilter'/>_typeValue"+
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
			var container = document.getElementById(this.options.layout.tag);
			if(rbe_engine.checkElement(container)){
				var _element = document.createElement("div");
				_element.setAttribute("class","sublist _mapFilter");
				_element.setAttribute("id",this.options.tag);
				_element.setAttribute("style","height:150px; overflow:scroll;");
				_element.setAttribute("data-filter","ptsid");
				_element.setAttribute("filter-type","group");

				container.appendChild(_element);
			}
			this.assignEvents();
		},
		setSubPropertyTypes: function(_element,hasChecked,propertyTypeID){
			var s_element = document.getElementById(this.options.tag);
			if(rbe_engine.checkElement(s_element)){
				if(hasChecked){
					s_element.style.display = "block";
				}else{
					s_element.style.display = "none";
				}

				var hasCustomTpl = false;
				var tplElement = document.getElementById(this.options.template);
				if(rbe_engine.checkElement(tplElement)){
					hasCustomTpl = true;
				}

				var _options = s_element.querySelectorAll("div");
				var options = [];
				for(var i=0;i<_options.length;i++){
					options.push(_options[i]);
				}

				for(var i=0;i<this.options.dataSource.length;i++){
					var addOption = false;
					if(this.options.dataSource[i].subtype!="---"){
						if(this.options.reportTypeID==4){
							if(parseInt(this.options.dataSource[i].rid)==this.options.reportTypeID){
								addOption = true;
							}
						}else{
							//addOption = true;
							if(parseInt(this.options.dataSource[i].rid)!=4){
								addOption = true;
							}
						}
					}
					
					if(addOption){
						if(_element.checked){
							if(parseInt(this.options.dataSource[i].ptid)==propertyTypeID){
								var html = this.options.template;
								if(hasCustomTpl){
									html = tplElement.innerHTML;
								}
								html = html.replace(/_ptid/gi,propertyTypeID);
								html = html.replace(/_typeValue/gi,this.options.dataSource[i].subtype);
								html = html.replace(/_typeid/gi,this.options.dataSource[i].ptsid);
								
								var p_element = document.createElement("div");
								p_element.innerHTML = html;
								options.push(p_element.children[0]);
							}
						}else{
							for(var o=0;o<options.length;o++){
								if(parseInt(options[o].getAttribute("data-id"))==propertyTypeID){
									s_element.removeChild(options[o]);
									options.splice(o,1);
									break;
								}
							}
						}
					}
				}
				for(var i=0;i<options.length;i++){
					s_element.appendChild(options[i]);
				}
			}
		},
		assignEvents: function(){
			var _element = document.getElementById(this.options.tag);
			if(rbe_engine.checkElement(_element)){
				_element.setAttribute("onClick",this.options.controller+".selectSubPropertyType(this);");
			}
		},
		selectSubPropertyType: function(_element){
			//if(options.length>0){
				var filters = this.options.mapObject.buildFilters();
				this.options.mapObject.filterMap(filters);
			/*}else{
				this.hideMarkers(_element);
			}*/
		},
			
	};
	
	aa_map_tpl_subPropertyType.setOptions(options);
	
	return aa_map_tpl_subPropertyType;
};