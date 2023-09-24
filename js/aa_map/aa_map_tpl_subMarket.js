var _aa_map_tpl_subMarket = function(options){
	var aa_map_tpl_subMarket;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	
	aa_map_tpl_subMarket = {
		options:{
			apObject: false,
			translations:{},
			controller: "",
			tag: "smsubfilters",
			template: "<div data-id='_gmid' class='subtypes form-group' style='margin-bottom:10px;'>"+
							"<label for='smsubfilters'></label>"+
							"<input type='checkbox' id='smsubfilters' data-id='_typeid' data-filter='sbmid' filter-type='group' class='generalSubMarket _mapFilter'/>_typeValue"+
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
				_element.setAttribute("data-filter","sbmid");
				_element.setAttribute("filter-type","group");

				container.appendChild(_element);
			}
			this.assignEvents();
		},
		setSubMarket: function(_element,hasChecked,subMarketID){
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
					if(_element.checked){
						if(parseInt(this.options.dataSource[i].gmid)==subMarketID){
							var html = this.options.template;
							if(hasCustomTpl){
								html = tplElement.innerHTML;
							}
							html = html.replace(/_ptid/gi,subMarketID);
							html = html.replace(/_typeValue/gi,this.options.dataSource[i].submarket);
							html = html.replace(/_typeid/gi,this.options.dataSource[i].sbmid);
							
							var p_element = document.createElement("div");
							p_element.innerHTML = html;
							options.push(p_element.children[0]);
						}
					}else{
						for(var o=0;o<options.length;o++){
							if(parseInt(options[o].getAttribute("data-id"))==subMarketID){
								s_element.removeChild(options[o]);
								options.splice(o,1);
								break;
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
				_element.setAttribute("onClick",this.options.controller+".selectSubMarket(this);");
			}
		},
		selectSubMarket: function(_element){
			//if(options.length>0){
				var filters = this.options.mapObject.buildFilters();
				this.options.mapObject.filterMap(filters);
			/*}else{
				this.hideMarkers(_element);
			}*/
		},
			
	};
	
	aa_map_tpl_subMarket.setOptions(options);
	
	return aa_map_tpl_subMarket;
};