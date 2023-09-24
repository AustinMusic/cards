var _aa_map_tpl_client = function(options){
	var aa_map_tpl_client;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	
	aa_map_tpl_client = {
		options:{
			controller: "",
			mapObject: false,
			connectedTemplate: false,
			translations:{},
			tag: "client",
			template: "<div id='_mapClients' class='filters form-group'>"+
							"<label for='mapClients'><b>title_proxy</b></label>"+
							"<input type='text' id='mapClients' placeholder='title_proxy' value='' class='form-control'>"+
						"</div>",
			order: 3,
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
		},
		render: function(){
			var aa_mapRenderer = new _aa_mapRenderer({
				template:this.options
			});
			aa_mapRenderer.renderTextInput();
			this.initializeAutocomplete();
		},
		initializeAutocomplete: function(){
			$("#mapClients").autocomplete({
				minLength: 4,
				cacheName: "clients",
				method: "cid",
				object: this.options.dataSource,
				atype: "clients",
				mapObject: this.options.mapObject.options.activeObject,
				controller: this.options.controller,
				_elementID: "mapClients",
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
	
	aa_map_tpl_client.setOptions(options);
	
	return aa_map_tpl_client;
};