var _aa_map_layout = function(options){
	var aa_map_layout;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	aa_map_layout = {
		options:{
			mapObject: false,
			templates:[],
			useGrid: true,
			showAdvanceSearchOnTop:true,
			layoutTitle: "",
			reccount: "",
			translations:{},
		},
		setOptions: function(options){
		    for(var _attr in options) {
		        if(this.options.hasOwnProperty(_attr)){
		        	this.options[_attr] = options[_attr];
		        }
		    }
		},
		renderLayout: function(){
			var _element = document.getElementById("filterlist");
			if(rbe_engine.checkElement(_element)){
				var __element = document.createElement("div");
				__element.setAttribute("id","headersb");
				__element.innerHTML = "<h2>"+this.options.reccount+" Total "+this.options.layoutTitle+"</h2>";
				_element.appendChild(__element);
				
				var ___element = document.createElement("div");
				___element.setAttribute("style","clear:both; height:24px;");
					
				if(this.options.useGrid){
					var __element = document.createElement("div");
					__element.setAttribute("id","togbutton2");
					__element.innerHTML = "<a style='cursor:pointer;' id='toggleGrid' type='m'>Show Grid</a>";
					___element.appendChild(__element);
					
					$('#gridlist #comps').DataTable( {
						paging: true,
						pagingType: "full_numbers",
						ColReorder: true,
						RowReorder: true
					} );
					
					_element.appendChild(___element);
				}
				
				if(this.options.showAdvanceSearchOnTop){
					var __element = document.createElement("div");
					__element.setAttribute("id","advancedSearch");
					__element.innerHTML = "<a id='myLink' href=#' onclick='aa_map_tpl_advancedSearch.toggleAdvancedSearch(this);'>Advanced Search</a>";
//					__element.setAttribute("onClick","aa_map_tpl_advancedSearch.toggleAdvancedSearch(this);");
//					__element.innerHTML = '<input id="advancedSearch" value="Advanced Search" type="button">';
					___element.appendChild(__element);
					_element.appendChild(___element);
					
				}
				

				var __element = document.createElement("div");
				__element.setAttribute("id","mapFilters");
				_element.appendChild(__element);
				var _element = document.getElementById("mapFilters");
				if(rbe_engine.checkElement(_element)){
					for(var i=0;i<this.options.templates.length;i++){
						var __element = document.createElement("h3");
						__element.innerHTML = "<a href='#'>"+this.options.templates[i].title+":</a>";
						_element.appendChild(__element);
						
						var __element = document.createElement("div");
						__element.setAttribute("id",this.options.templates[i].tag);
						_element.appendChild(__element);
						for(var j=0;j<this.options.templates[i].templates.length;j++){
							this.options.templates[i].templates[j].options.mapObject = this.options.mapObject;
							this.options.templates[i].templates[j].render();
						}
					}
				}
			}
		}
	}
	
	aa_map_layout.setOptions(options);
	
	return aa_map_layout;
};