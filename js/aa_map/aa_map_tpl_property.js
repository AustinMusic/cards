var _aa_map_tpl_property = function(options){
	var aa_map_tpl_property;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	
	aa_map_tpl_property = {
		options:{
			controller: "",
			mapObject: false,
			connectedTemplate: false,
			translations:{},
			tag: "mapProperties",
			template: "<div id='_mapProperties' class='filters form-group'>"+
							"<div style='float:left; width:200px;'><b>title_proxy</b></div>"+
							"<input type='text' id='mapProperties' placeholder='title_proxy' data-filter='propertyname' value='' class='form-control'>"+
						"</div>",
			order: 1,
			dataSource: "",
			layout:{
				tag: "",
			}
		},
		data:{
				"property": []
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
			aa_mapRenderer.renderTextInput();
			this.initializeAutocomplete();
		},
		initializeAutocomplete: function(){
			$("#mapProperties").autocomplete({
				minLength: 4,
				cacheName: "property",
				method: "pid",
				object: this.options.dataSource,
				atype: "property",
				mapObject: this.options.mapObject.options.activeObject,
				controller: this.options.controller,
				_elementID: "mapProperties",
				source: function( request, response ) {
						var _controller = window.top.window[this.options.controller];
						var cacheName = this.options.cacheName;
						var term = request.term;
						if(term in _controller.data[cacheName] ) {
							response(_controller.data[cacheName[term]]);
							return;
						}
			 
						var method = this.options.method;
						var object = this.options.object;
						object[method] = term;
						$.getJSON( "ajax_autocomplete.php",object, function( data, status, xhr ) {
							_controller.data[cacheName[term]] = data;
							response(data);
						});
					},
				select: function( event, ui ) {
					var _elementID = $("#"+event.target.id).autocomplete("option","_elementID");
					var _element = document.getElementById(_elementID+"Value");
					if(_element==null || _element==undefined){
						_element = document.createElement("hidden"); 
						_element.setAttribute("id",_elementID+"Value");
					}
					var _controller = window.top.window[$("#"+event.target.id).autocomplete("option","mapObject")];
					var method = $("#"+event.target.id).autocomplete("option","method");
					var object = $("#"+event.target.id).autocomplete("option","object");
					var type = $("#"+event.target.id).autocomplete("option","atype");
					_controller.clearMarker(type,_element.value)
					_element.value = ui.item.id;
					document.getElementsByTagName("body")[0].appendChild(_element);
					object[method] = ui.item.id;
					_controller.execAjax(object,false);
				}
			});
		}
	};
	
	aa_map_tpl_property.setOptions(options);
	
	return aa_map_tpl_property;
};