var _aa_map_tpl_reportType = function(options){
	var aa_map_tpl_reportType;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	
	aa_map_tpl_reportType = {
		options:{
			controller: "",
			mapObject: false,
			connectedTemplate: false,
			translations:{},
			controller: "",
			tag: "reportType",
			template: "<input type='hidden' id='FK_ReportTypeID' data-filter='FK_ReportTypeID' class='_mapFilter' value='_typeValue'/>",
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
			aa_mapRenderer.renderHiddenInput({value:"value"});
		}
	};
	
	aa_map_tpl_reportType.setOptions(options);
	
	return aa_map_tpl_reportType;
};