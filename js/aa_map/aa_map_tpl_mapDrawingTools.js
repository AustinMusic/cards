var _aa_map_tpl_mapDrawingTools = function(options){
	var aa_map_tpl_mapDrawingTools;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	
	aa_map_tpl_mapDrawingTools = {
		options:{
			mapObject: false,
			connectedTemplate: false,
			translations:{},
			controller: "",
			tag: "mapDrawingTools",
			template: "<div id='mapDrawingTools' class='mapfilters'>"+
						  "<input type='button' id='mapDrawing' value='title_proxy'/>"+
						"</div>",
		    order: 1,
			dataSource: "",
			layout:{
				tag: "",
			},
			drawingManager: "",
			defaultDrawingType: "",//google.maps.drawing.OverlayType.POLYGON,
			polygon: ""
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
			this.options.drawingManager = new google.maps.drawing.DrawingManager({
				drawingMode: this.options.defaultDrawingType,
				drawingControl: true,
				drawingControlOptions: {
					position: google.maps.ControlPosition.TOP_CENTER,
					drawingModes: ['polygon', 'circle', 'rectangle']
				},
				circleOptions: {
					fillOpacity: 0.1,
					strokeWeight: 1,
					clickable: false,
					editable: true,
					zIndex: 0
				},
				_controller:this
			});
			this.options.drawingManager.addListener('overlaycomplete', function (event) {
				this._controller.resetMapBounds();
				
				if (this._controller.options.polygon!="") {
					this._controller.options.polygon.overlay.setMap(null);
					//hideListings(this._controller.options.mapObject.options.markers);
				}
				this._controller.options.mapObject.options.hasLayerDraw = true;
				this._controller.options.drawingManager.setDrawingMode(null);
				this._controller.options.polygon = event;
				this._controller.options.polygon.overlay._controller = this._controller;
				this._controller.options.polygon.overlay.setEditable(true);	
				
				if(this._controller.options.polygon.type == 'polygon') {
					//get the rectangle that contains all points
					var paths = this._controller.options.polygon.overlay.getPath();
					var lats = [];
					var lon = [];
					for(var p=0;p<paths.getLength();p++){
						var coords = paths.getAt(p);
						lats.push(coords.lat());
						lon.push(coords.lng());
					}
					lats.sort();
					lon.sort();
					var _element = document.getElementById("northEastLat");
					if(rbe_engine.checkElement(_element)){
						_element.value = lats[lats.length-1];
					}
					var _element = document.getElementById("northEastLng");
					if(rbe_engine.checkElement(_element)){
						_element.value = lon[0];
					}
					var _element = document.getElementById("southWestLat");
					if(rbe_engine.checkElement(_element)){
						_element.value = lats[0];
					}
					var _element = document.getElementById("southWestLng");
					if(rbe_engine.checkElement(_element)){
						_element.value = lon[lon.length-1];
					}
				}else if(this._controller.options.polygon.type == 'circle') {
					var center = this._controller.options.polygon.overlay.center;
					var clat = center.lat();
					var clon = center.lng();
					var radius = this._controller.options.polygon.overlay.radius;
					var _element = document.getElementById("northEastLat");
					if(rbe_engine.checkElement(_element)){
						_element.value = clat+(radius/111111);
					}
					var _element = document.getElementById("northEastLng");
					if(rbe_engine.checkElement(_element)){
						_element.value = clon+((radius/111111)*Math.cos(radius/111111));
					}
					var _element = document.getElementById("southWestLat");
					if(rbe_engine.checkElement(_element)){
						_element.value = clat-(radius/111111);
					}
					var _element = document.getElementById("southWestLng");
					if(rbe_engine.checkElement(_element)){
						_element.value = clon-((radius/111111)*Math.cos(radius/111111));
					}
				}else if(this._controller.options.polygon.type == 'rectangle') {
					this._controller.storeMapBounds(this._controller);
				}
				
				this._controller.options.mapObject.options.hasLayerDraw = true;
				this._controller.options.mapObject.filterMap(this._controller.options.mapObject.buildFilters());
				
				//this._controller.options.mapObject.filterMap(this._controller.options.mapObject.buildFilters());
				//console.log(this._controller.options.polygon.overlay);
				this._controller.options.mapObject.options.polygon = this._controller.options.polygon;
				google.maps.aamapController = this._controller;
				if (this._controller.options.polygon.type == 'polygon') {
					//polygon.overlay.getBounds().getNorthEast()
					google.maps.event.addListener(this._controller.options.polygon.overlay.getPath(), 'set_at', function() {
						google.maps.aamapController.options.mapObject.filterMap(google.maps.aamapController.options.mapObject.buildFilters());
					});
					google.maps.event.addListener(this._controller.options.polygon.overlay.getPath(), 'insert_at', function() {
						google.maps.aamapController.options.mapObject.filterMap(google.maps.aamapController.options.mapObject.buildFilters());
					});
				} else if (this._controller.options.polygon.type == 'circle') {
					google.maps.event.addListener(this._controller.options.polygon.overlay, 'radius_changed', function () {
						google.maps.aamapController.options.mapObject.options.polygon = google.maps.aamapController.options.polygon;
						google.maps.aamapController.options.mapObject.filterMap(google.maps.aamapController.options.mapObject.buildFilters());
					});
					google.maps.event.addListener(this._controller.options.polygon.overlay, 'center_changed', function () {
						google.maps.aamapController.options.mapObject.options.polygon = google.maps.aamapController.options.polygon;
						google.maps.aamapController.options.mapObject.filterMap(google.maps.aamapController.options.mapObject.buildFilters());
					});
				} else if (this._controller.options.polygon.type == 'rectangle') {
					google.maps.event.addListener(this._controller.options.polygon.overlay, 'bounds_changed', function () {
						google.maps.aamapController.options.mapObject.options.polygon = google.maps.aamapController.options.polygon;
						google.maps.aamapController.storeMapBounds(google.maps.aamapController);
						google.maps.aamapController.options.mapObject.filterMap(google.maps.aamapController.options.mapObject.buildFilters());
					});
				}	
			
			});	
				
			
			var _element = document.getElementById("mapDrawing");
			if(rbe_engine.checkElement(_element)){
				_element.setAttribute("onClick",this.options.controller+".toggleTools(this);");
			}					
		},
		resetMapBounds: function(){
			var _element = document.getElementById("northEastLat");
			if(rbe_engine.checkElement(_element)){
				_element.value = "";
			}
			var _element = document.getElementById("northEastLng");
			if(rbe_engine.checkElement(_element)){
				_element.value = "";
			}
			var _element = document.getElementById("southWestLat");
			if(rbe_engine.checkElement(_element)){
				_element.value = "";
			}
			var _element = document.getElementById("southWestLng");
			if(rbe_engine.checkElement(_element)){
				_element.value = "";
			}
		},
		storeMapBounds: function(_controller){
			var ne = _controller.options.polygon.overlay.getBounds().getNorthEast();
			var sw = _controller.options.polygon.overlay.getBounds().getSouthWest();
			var _element = document.getElementById("northEastLat");
			if(rbe_engine.checkElement(_element)){
				_element.value = ne.lat();
			}
			var _element = document.getElementById("northEastLng");
			if(rbe_engine.checkElement(_element)){
				_element.value = ne.lng();
			}
			var _element = document.getElementById("southWestLat");
			if(rbe_engine.checkElement(_element)){
				_element.value = sw.lat();
			}
			var _element = document.getElementById("southWestLng");
			if(rbe_engine.checkElement(_element)){
				_element.value = sw.lng();
			}
		},
		toggleTools:function(_element){
			if (this.options.drawingManager.map) {
				this.options.drawingManager.setMap(null);
				this.controller.options.mapObject.options.hasLayerDraw = false;
				this.controller.options.mapObject.options.polygon = false;
				if (this.options.polygon!==null) {
					this.options.polygon.overlay.setMap(null);
					this.options.polygon = null;
				}
			} else {
				this.options.drawingManager.setMap(this.options.mapObject.activeMap);
			}
		}

	};
	
	aa_map_tpl_mapDrawingTools.setOptions(options);
	
	return aa_map_tpl_mapDrawingTools;
};