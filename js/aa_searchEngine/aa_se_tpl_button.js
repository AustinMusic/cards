var _aa_se_tpl_button = function(options){
	var aa_se_tpl_button;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	
	aa_se_tpl_button = {
		options:{
			seObject: false,
			connectedTemplate: false,
			translations:{},
			controller: "",
			tag: "",
			template: "<div id='_idProxy' class='containerClass_proxy'>"+
						  "<input typeProxy id='idProxy' srcProxy value='title_proxy' />"+
						"</div>",
		    order: 1,
			elementID: "addGroup",
			containerClass: "",
			method: "",
			type: "button",
			image: "",
			attributes: {},
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

			this.options.template = this.options.template.replace(/typeProxy/gi,"type='"+this.options.type+"'");
			if(this.options.image!=""){
				this.options.template = this.options.template.replace(/srcProxy/gi,"src='"+this.options.image+"'");
			}else{
				this.options.template = this.options.template.replace(/srcProxy/gi,"");
			}
			this.options.template = this.options.template.replace(/idProxy/gi,this.options.elementID);
			this.options.template = this.options.template.replace(/containerClass_proxy/gi,this.options.containerClass);
		},
		render: function(){
			var aa_mapRenderer = new _aa_mapRenderer({
				template:this.options
			});
			aa_mapRenderer.renderButton();
			this.assignEvents();
		},
		assignEvents: function(){
			var _element = document.getElementById(this.options.elementID);
			if(rbe_engine.checkElement(_element)){
				_element.setAttribute("onClick",this.options.seObject.options.activeObject+"."+this.options.method+".apply("+this.options.seObject.options.activeObject+",[this]);");
			}			
		}
		
	};
	
	aa_se_tpl_button.setOptions(options);
	
	return aa_se_tpl_button;
};