var _aa_map_tpl_excelTemplateSelect = function(options){
	var aa_map_tpl_excelTemplateSelect;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	var aa_mapRenderer = new _aa_mapRenderer();
	aa_map_tpl_excelTemplateSelect = {
		options:{
			translations:{},
			mapObject: false,
			controller: "",
			tag: "excelTemplateOptions",
			template: "<div class='filters gridfilters' >"+
							"<div style='float:left; width:200px;'><b>title_proxy</b></div>"+
							"<select style='float:left; margin-left:10px; width:250px; margin-bottom: 10px;' id='excelTemplateOptions' data-filter='excelTemplateOptions' class='excelTemplateOptions form-control'></select>"+
						"</div>",
			order: 1,
			dataSource: [],
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
			return false;
			
			
			var _element = document.getElementById("excelTemplateOptions");
			if(rbe_engine.checkElement(_element)){
				_element.setAttribute("onChange",this.options.mapObject.options.activeObject+".setExcelTemplate(this);");
			}
		},
	};
	
	aa_map_tpl_excelTemplateSelect.setOptions(options);
	
	return aa_map_tpl_excelTemplateSelect;
};