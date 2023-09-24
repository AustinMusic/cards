var _aa_se_tpl_select = function(options){
	var aa_se_tpl_select;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	var aa_mapRenderer = new _aa_mapRenderer();
	aa_se_tpl_select = {
		options:{
			translations:{},
			seObject: false,
			controller: "",
			elementID: "selectTable",
			containerClass: "",
			tag: "selectTable",
			template: "<div id='_idProxy' class='filters containerClass_proxy'>"+
							//"<a id='maskidProxy' class='maskfilter' style='float:left; margin:2px; margin-left:10px;'></a>"+
							"<select style='float:left; margin-left:10px;' id='idProxy' class='form-control _searchFilter'></select>"+
						"</div>",
			order: 1,
			method: "showTableFields",
			attributes: {},
			dataSource: {},
			layout:{
				tag: "",
			},
			defaultIndex: 0,
			defaultValue: "",
			//map: false,
			//filterMatch:false
		},
		setOptions: function(options){
		    for(var _attr in options) {
		        if(this.options.hasOwnProperty(_attr)){
		        	this.options[_attr] = options[_attr];
		        }
		    }

			this.options.template = this.options.template.replace(/idProxy/gi,this.options.elementID);
			this.options.template = this.options.template.replace(/containerClass_proxy/gi,this.options.containerClass);
		},
		render: function(){
			var aa_mapRenderer = new _aa_mapRenderer({
				template:this.options
			});

			aa_mapRenderer.renderSelect();
			/*var _element = document.getElementById(this.options.elementID);
			if(rbe_engine.checkElement(_element)){
				var value = _element.options[_element.selectedIndex].text;
				_element.parentNode.querySelector("#mask"+this.options.elementID).innerHTML = value;
			}*/
			this.assignEvents();
		},
		assignEvents: function(){
			if(this.options.method!=""){
				var _element = document.getElementById(this.options.elementID);
				if(rbe_engine.checkElement(_element)){
					_element.setAttribute("onChange",this.options.seObject.options.activeObject+"."+this.options.method+".apply("+this.options.seObject.options.activeObject+",[this]);");
				}
				
			}
			/*if(this.options.filterMatch!=false){
				//console.log(this.options.filterMatch);
				//console.log(this.options.map);
				var _element = document.getElementById(this.options.elementID);
				if(this.options.map!=false && rbe_engine.checkElement(_element)){
					_element.setAttribute("onChange",_element.getAttribute("onChange")+";"+this.options.seObject.options.activeObject+".setMapOption('"+this.options.filterMatch+"','"+this.options.elementID+"');");
				}
			}*/
			/*if(this.options.seObject.options!=undefined){
				var _element = document.getElementById(this.options.elementID);
				if(rbe_engine.checkElement(_element)){
					_element.setAttribute("onBlur",this.options.seObject.options.activeObject+".showMask(this);");
				}
					
				var _element = document.getElementById("mask"+this.options.elementID);
				if(rbe_engine.checkElement(_element)){
					_element.setAttribute("onClick",this.options.seObject.options.activeObject+".hideMask(this);");
				}
			}*/
			
		},
	};
	
	aa_se_tpl_select.setOptions(options);
	
	return aa_se_tpl_select;
};