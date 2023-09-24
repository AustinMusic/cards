var _aa_se_tpl_input = function(options){
	var aa_se_tpl_input;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	
	aa_se_tpl_input = {
		options:{
			controller: "",
			mapObject: false,
			connectedTemplate: false,
			seObject: false,
			translations:{},
			elementID: "selectTable",
			containerClass: "",
			tag: "",
			template: "<div id='_idProxy' class='filters form-group containerClass_proxy'>"+
							//"<a id='maskidProxy' class='maskfilter' style='float:left; margin:2px; margin-left:10px;'></a>"+
							"<input type='text' id='idProxy' style='float:left; margin-left:10px;' placeholder='title_proxy' value='' class='form-control _searchFilter'>"+
						"</div>",
			order: 1,
			method: "",
			attributes: {},
			dataSource: "",
			layout:{
				tag: "",
			}
		},
		data:{
				"clients": []
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
			aa_mapRenderer.renderTextInput();
			/*var _element = document.getElementById(this.options.elementID);
			if(rbe_engine.checkElement(_element)){
				var value = _element.value;
				if(value==""){
					value = "value";
				}
				_element.parentNode.querySelector("#mask"+this.options.elementID).innerHTML = value;
			}*/
			this.assignEvents();
		},
		assignEvents: function(){
			if(this.options.attributes!=undefined){
				if(this.options.attributes["data-field-data-type"]=="date"){
					$("#"+this.options.elementID).datepicker({
						changeMonth: true,
						changeYear: true,
						dateFormat: "yy-mm-dd",
					});
				}
			}
			if(this.options.seObject.options!=undefined){
				var _element = document.getElementById(this.options.elementID);
				if(rbe_engine.checkElement(_element)){
					_element.setAttribute("onBlur",this.options.seObject.options.activeObject+"."+this.options.method+".apply("+this.options.seObject.options.activeObject+",[this]);");
				}
				
				/*var _element = document.getElementById(this.options.elementID);
				if(rbe_engine.checkElement(_element)){
					_element.setAttribute("onBlur",this.options.seObject.options.activeObject+".showMask(this);");
				}
					
				var _element = document.getElementById("mask"+this.options.elementID);
				if(rbe_engine.checkElement(_element)){
					_element.setAttribute("onClick",this.options.seObject.options.activeObject+".hideMask(this);");
				}*/
			}
		}
	};
	
	aa_se_tpl_input.setOptions(options);
	
	return aa_se_tpl_input;
};