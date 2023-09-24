var _aa_map_tpl_wordTemplate = function(options){
	var aa_map_tpl_wordTemplate;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	
	aa_map_tpl_wordTemplate = {
		options:{
			mapObject: false,
			connectedTemplate: false,
			translations:{},
			controller: "",
			tag: "selectWordTemplate",
			template: "<div id='selectWordTemplate' class='gridfilters' style='margin:10px;'>"+
						  "<input type='button' id='selectWordTemplate' value='title_proxy'/>"+
						"</div>",
		    order: 2,
			dataSource: "",
			layout:{
				tag: "",
			},
			templatePath:""
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
				_element.setAttribute("onClick",this.options.controller+".selectWordTemplate(this);")
			}		
		},
		selectWordTemplate:function(_element){
			var _element = document.getElementById("wordTemplateOptions");
			if(rbe_engine.checkElement(_element)){
				if(_element.selectedIndex==0){
					alert("Please select a template");
					return false;
				}
				var selectedTemplate = _element.options[_element.selectedIndex].value;
				
				var selectedReports = document.querySelectorAll("#comps input[name='reportid[]']");
				var rids = [];
				for(var i=0;i<selectedReports.length;i++){
					if(selectedReports[i].checked){
						rids.push(parseInt(selectedReports[i].value));
					}
				}
				if(rids.length==0){
					alert("Please select records to merge");
					return false;
				}
				window.location = "../templates/"+this.options.templatePath+"/"+selectedTemplate+"?id="+rids.join(",");
			}
		}
	};
	
	aa_map_tpl_wordTemplate.setOptions(options);
	
	return aa_map_tpl_wordTemplate;
};