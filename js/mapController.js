var _mapController = function (options) {
	var _mapController;
	var rbe_engine = new _rbe_engine();
	_mapController = {
		options: {
			activeObject: "",
			id: "",
			latitude: 0,
			longitude: 0,
			addEmptyMarker: true,
			coords: [],
			showNumbersForMarkers: true,
			useInfoWindowForMarkers: false,
			infoWindowData: [],
			parentController: "",
			useStreetView: true,
			maps: [document.getElementById('map-canvas')],
			mapOptions: ""
		},
		data: {
			maps: {
				"improved_sales": {
					"map": "",
					"markers": {
						"mainMarker": "",
						"objects": []
					},
					"bounds": ""
				},
				"land_sales": {
					"map": "",
					"markers": {
						"mainMarker": "",
						"objects": []
					},
					"bounds": ""
				},
				"leases": {
					"map": "",
					"markers": {
						"mainMarker": "",
						"objects": []
					},
					"bounds": ""
				}
			},
			autocomplete: "",
			componentForm: {
				street_number: 'short_name',
				route: 'long_name',
				locality: 'long_name',
				administrative_area_level_1: 'short_name',
				administrative_area_level_2: 'short_name',
				postal_code: 'short_name'
			},
			map: "",
			marker: "",
			markers: [],
		},
		largeInfowindow: "",
		setOptions: function (options) {
			for (var attr in options) {
				if (this.options.hasOwnProperty(attr)) {
					this.options[attr] = options[attr];
				}
			}
		},
		init: function () {
			this.assignEvents();
			this.initializeMap();
		},
		assignEvents: function () {
			var _elements = document.getElementsByClassName("_selectTab");
			for (var i = 0; i < _elements.length; i++) {
				_elements[i].setAttribute("onClick", this.options.activeObject + ".addMap(this);");
			}
		},
		addMap: function (_element) {
			var nlat = '45.398293';
			var nlng = '-122.753877';
			if (this.options.id != "") {
				nlat = this.options.latitude;
				nlng = this.options.longitude;
			}
			var mapType = _element.getAttribute("data-type");
			if (this.data.maps[mapType] == undefined) {
				return false;
			}
			if (this.data.maps[mapType].map != "" && this.data.maps[mapType].markers.mainMarker != "" && this.data.maps[mapType].markers.objects.length == 0) {
				this.addMarkers(mapType);
				return true;
			}
			var mapOptions = {
				center: new google.maps.LatLng(nlat, nlng),
				zoom: 18,
				mapTypeControl: true,
				mapTypeControlOptions: {
					style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
					position: google.maps.ControlPosition.TOP_CENTER
				},
				streetViewControl: false,
				zoomControl: false,
				scaleControl: false,
				rotateControl: false,
				fullscreenControl: false
			};
			this.data.maps[mapType].map = new google.maps.Map(document.getElementById('map-canvas-' + mapType), mapOptions);
			this.data.maps[mapType].bounds = new google.maps.LatLngBounds();
			this.data.maps[mapType].markers.mainMarker = new google.maps.Marker({
					position: new google.maps.LatLng(nlat, nlng),
					map: this.data.maps[mapType].map,
					title: "New marker",
					draggable: true,
					icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png'
				});
			var loc = new google.maps.LatLng(this.data.maps[mapType].markers.mainMarker.position.lat(), this.data.maps[mapType].markers.mainMarker.position.lng());
			this.data.maps[mapType].bounds.extend(loc);
			this.data.maps[mapType].map.fitBounds(this.data.maps[mapType].bounds);
			this.data.maps[mapType].map.panToBounds(this.data.maps[mapType].bounds);
			setTimeout(this.options.activeObject + ".addMarkers('" + mapType + "');", 1500);
		},
		initializeMap: function () {
			var nlat = '45.398293';
			var nlng = '-122.753877';
			if (this.options.id != "") {
				nlat = this.options.latitude;
				nlng = this.options.longitude;
			}
			var mapOptions = {
				center: new google.maps.LatLng(nlat, nlng),
				zoom: 18,
				mapTypeControl: true,
				mapTypeControlOptions: {
					style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
					position: google.maps.ControlPosition.TOP_LEFT
				},
				streetViewControl: false,
				fullscreenControl: false,
				controller: this.options.parentController
			};
			if (this.options.mapOptions != "") {
				mapOptions = this.options.mapOptions;
			}
			if (this.options.useStreetView) {
				mapOptions.streetViewControl = true;
				mapOptions.streetViewControlOptions = {
					position: google.maps.ControlPosition.LEFT_TOP
				}
			}
			this.data.map = new google.maps.Map(this.options.maps[0], mapOptions);
			if (this.options.addEmptyMarker) {
				this.data.marker = new google.maps.Marker({
						position: new google.maps.LatLng(nlat, nlng),
						map: this.data.map,
						title: "New marker",
						draggable: true
					});
				google.maps.event.addListener(this.data.marker, 'dragend', function (marker) {
					var latLng = this.position;
					currentLatitude = latLng.lat();
					currentLongitude = latLng.lng();
					var lt_element = document.getElementById('latitude');
					var ln_element = document.getElementById('longitude')
						if (rbe_engine.checkElement(lt_element) && rbe_engine.checkElement(ln_element)) {
							lt_element.value = currentLatitude;
							ln_element.value = currentLongitude;
							var geocoder = new google.maps.Geocoder;
							var latlng = {
								lat: parseFloat(currentLatitude),
								lng: parseFloat(currentLongitude)
							};
							geocoder.geocode({
								'location': latlng
							}, function (results, status) {
								if (status === 'OK') {
									if (results[0]) {
										console.log(results);
										for (var a = 0; a < results[0].address_components.length; a++) {
											var __element = document.getElementById(results[0].address_components[a].types[0]);
											if (rbe_engine.checkElement(__element)) {
												__element.value = results[0].address_components[a].short_name;
											}
										}
									} else {
										window.alert('No results found');
									}
								} else {
									window.alert('Geocoder failed due to: ' + status);
								}
							});
						}
				});
			}
			var t_element = document.getElementById('autocomplete');
			if (rbe_engine.checkElement(t_element)) {
				this.data.autocomplete = new google.maps.places.Autocomplete((t_element), {
						types: ['geocode']
					});
				this.data.autocomplete.aa_maps = this.data.maps;
				this.data.autocomplete.aa_controller = this;
				google.maps.event.addListener(this.data.autocomplete, 'place_changed', function () {
					var place = this.aa_controller.data.autocomplete.getPlace();
					if (place.geometry != undefined) {
						for (var component in this.aa_controller.data.componentForm) {
							document.getElementById(component).value = '';
							document.getElementById(component).disabled = false;
						}
						var newPos = new google.maps.LatLng(place.geometry.location.lat(), place.geometry.location.lng());
						var mapOptions = {
							center: newPos,
							zoom: 18,
							mapTypeControl: true,
							mapTypeControlOptions: {
								style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
								position: google.maps.ControlPosition.TOP_CENTER
							},
							streetViewControl: false,
							fullscreenControl: false,
						};
						if (this.aa_controller.options.useStreetView) {
							mapOptions.streetViewControl = true;
							mapOptions.streetViewControlOptions = {
								position: google.maps.ControlPosition.LEFT_TOP
							}
						}
						this.aa_controller.data.map.setOptions(mapOptions);
						this.aa_controller.data.marker.setPosition(newPos);
						for (var attr in this.aa_maps) {
							if (this.aa_maps[attr].map != "") {
								if (this.aa_maps[attr].map.object != undefined) {
									var mapOptions = {
										center: newPos,
										zoom: 18,
										mapTypeControl: true,
										mapTypeControlOptions: {
											style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
											position: google.maps.ControlPosition.TOP_CENTER
										},
										streetViewControl: false,
										fullscreenControl: false,
									};
									if (this.mapOptions.useStreetView) {
										mapOptions.streetViewControl = true;
										mapOptions.streetViewControlOptions = {
											position: google.maps.ControlPosition.LEFT_TOP
										}
									}
									this.aa_maps[attr].map.setOptions(mapOptions);
									this.aa_maps[attr].markers.mainMarker.setPosition(newPos);
								}
							}
						}
						for (var i = 0; i < place.address_components.length; i++) {
							var addressType = place.address_components[i].types[0];
							if (this.aa_controller.data.componentForm[addressType]) {
								var val = place.address_components[i][this.aa_controller.data.componentForm[addressType]];
								document.getElementById(addressType).value = val;
							}
						}
						document.getElementById('latitude').value = place.geometry.location.lat();
						document.getElementById('longitude').value = place.geometry.location.lng();
					}
				});
			}
			this.largeInfowindow = new google.maps.InfoWindow();
			if (this.options.coords.length > 0) {
				this.addMarkers();
			}
			for (var attr in this.data.maps) {
				if (rbe_engine.checkElement(document.getElementById('map-canvas-' + attr))) {
					this.data.maps[attr].map = new google.maps.Map(document.getElementById('map-canvas-' + attr), mapOptions);
				}
			}
		},
		getLatLan: function () {
			var s_element = document.getElementById("route");
			if (!rbe_engine.checkElement(s_element)) {
				return false;
			}
			if (s_element.value == "") {
				return false;
			}
			var n_element = document.getElementById("street_number");
			if (!rbe_engine.checkElement(n_element)) {
				return false;
			}
			if (n_element.value == "") {
				return false;
			}
			var a_element = document.getElementById("administrative_area_level_1");
			if (!rbe_engine.checkElement(a_element)) {
				return false;
			}
			if (a_element.value == "") {
				return false;
			}
			var b_element = document.getElementById("administrative_area_level_2");
			if (!rbe_engine.checkElement(b_element)) {
				return false;
			}
			if (b_element.value == "") {
				return false;
			}
			var address = n_element.value + "+" + s_element.value + "," + a_element.value + "," + b_element.value;
			var tempController = this;
			var req = $.ajax({
					type: "GET",
					url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + address + "&key=AIzaSyAtTb5qzQ9x50dKqqkfNrrypXRFYkw91NQ",
				}).done(function (response) {
					response.results[0].geometry.location;
					var center = new google.maps.LatLng(response.results[0].geometry.location.lat, response.results[0].geometry.location.lng);
					tempController.data.map.setCenter(center);
					tempController.data.marker.setPosition(center);
					document.getElementById('latitude').value = response.results[0].geometry.location.lat;
					document.getElementById('longitude').value = response.results[0].geometry.location.lng;
				});
		},
		addMarkers: function (mapType) {
			var _element = document.getElementById(mapType + "_table");
			if (rbe_engine.checkElement(_element)) {
				var rows = _element.querySelectorAll("tbody tr");
				for (var r = 1; r < rows.length; r++) {
					if (rows[r].hasAttribute("data-coords")) {
						var coords = rows[r].getAttribute("data-coords");
						coords = JSON.parse(coords);
						var mlabel = "";
						if (this.options.showNumbersForMarkers) {
							mlabel = (r).toString();
						}
						var _marker = new google.maps.Marker({
								position: new google.maps.LatLng({
									lat: parseFloat(coords.lat),
									lng: parseFloat(coords.lng)
								}),
								map: this.data.maps[mapType].map,
								draggable: false,
								label: mlabel,
								reportID: rows[r].id,
								dataType: mapType,
								aaController: this
							});
						_marker.addListener('click', function () {
							var _elements = document.querySelectorAll("#" + this.dataType + "_table tbody >tr");
							if (rbe_engine.checkElement(_elements)) {
								for (var i = 0; i < _elements.length; i++) {
									if (_elements[i].id == this.reportID) {
										aaController.selectTableRow(_elements[i].childNodes[0]);
										return true;
									}
								}
							}
							return false;
						});
						this.data.maps[mapType].markers.objects.push(_marker);
						var loc = new google.maps.LatLng(parseFloat(coords.lat), parseFloat(coords.lng));
						this.data.maps[mapType].bounds.extend(loc);
						this.data.maps[mapType].map.fitBounds(this.data.maps[mapType].bounds);
						this.data.maps[mapType].map.panToBounds(this.data.maps[mapType].bounds);
					} else {
						console.log("No attribute data-coords exists, no coordintates available to create markers on map!");
					}
				}
			}
			if (this.options.coords.length > 0) {
				this.clearMarkers("mainMap");
				this.data.map.bounds = new google.maps.LatLngBounds();
				var _mcontroller = this;
				for (var m = 0; m < this.options.coords.length; m++) {
					var coords = this.options.coords[m];
					var mlabel = "";
					if (this.options.showNumbersForMarkers) {
						mlabel = (m + 1).toString();
					}
					var iid = 0;
					if (coords.id != undefined) {
						iid = coords.id;
					}
					var _marker = new google.maps.Marker({
							position: new google.maps.LatLng({
								lat: parseFloat(coords.lat),
								lng: parseFloat(coords.lng)
							}),
							map: this.data.map,
							draggable: false,
							label: mlabel,
							dataType: "mainMap",
							aaController: this,
							icon: '../img/mm_20_red.png',
							iid: iid
						});
					_marker.addListener('click', function () {
						if (_mcontroller.options.useInfoWindowForMarkers) {
							_mcontroller.populateInfoWindow(this, _mcontroller.largeInfowindow);
						}
					});
					this.data.markers.push(_marker);
					var loc = new google.maps.LatLng(parseFloat(coords.lat), parseFloat(coords.lng));
					this.data.map.bounds.extend(loc);
					this.data.map.fitBounds(this.data.map.bounds);
					this.data.map.panToBounds(this.data.map.bounds);
				}
				var _map = new _aa_map({
						externalSearchEngine: "aa_searchEngine"
					});
				_map.activeMap = this.data.map;
				aa_map_tpl_mapDrawingTools = new _aa_map_tpl_mapDrawingTools({
						controller: "aa_map_tpl_mapDrawingTools",
						translations: {
							"title": "Polygon Search"
						},
						dataSource: {
							"title": "Polygon Search",
						},
						layout: {
							tag: "mapTools"
						},
						mapObject: _map
					});
				aa_map_tpl_mapDrawingTools.render();
				var m_element = document.getElementById("mapDrawing");
				if (m_element != undefined) {
					m_element.click();
				}
			}
		},
		populateInfoWindow: function (marker, infowindow) {
			if (infowindow.marker != marker) {
				infowindow.setContent('');
				infowindow.marker = marker;
				infowindow.addListener('closeclick', function () {
					infowindow.marker = null;
				});
				var info_data = rbe_engine.getItemForMethod(this.options.infoWindowData, "id", marker.iid, false);
				var infoHtml = "";
				var __element = document.querySelector("#comps [data-id='" + info_data.id + "']");
				var checkedhtml = "";
				if (__element != undefined) {
					if (__element.checked) {
						checkedhtml = "checked";
					}
				}
				infoHtml = "<div class='blended_grid'>";
				infoHtml += "<div class='topBanner'><center><label style='width: 150px;'>Check to add Comp</label>&nbsp;<input type='checkbox' data-id='" + info_data.id + "' " + checkedhtml + " onClick='" + this.options.parentController + ".handleMapEvent(this,\"infoWindow\");' /></center>";
				infoHtml += "</div>";
				infoHtml += "<div class='leftColumn'><div class='panoimg'><img src='../comp_images/" + info_data.photo1 + "' width='200px'></div>";
				infoHtml += "</div>";
				infoHtml += "<div class='feedHost'>";
				infoHtml += "<div class='feed_item'><div class='panoitem'>" + info_data.property_name + "</div></div>";
				infoHtml += "<div class='feed_item'><div class='panoitem'>" + info_data.address + "</div></div>";
				infoHtml += "<div class='feed_item'><div class='panoitem'>" + info_data.city + ", " + info_data.state + "</div></div>";
				infoHtml += "<div class='feed_item'><div class='panoitem'>&nbsp;</div></div>";
				var aas_engine = window[this.options.parentController];
				if (aas_engine.options.reportTypeID.includes(2)) {
					infoHtml += "<div class='feed_item'><div class='panoitem'>Subtype: " + info_data.subtype + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Occupancy: " + info_data.occupancy_type + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>GBA: " + info_data.overall_gba + " SF</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Year Built: " + info_data.year_built + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Construction: " + info_data.const_descr + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Parking Ratio: " + info_data.parking_ratio + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>&nbsp;</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Recording Date: " + info_data.record_date + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>" + info_data.adj_price_sf_gba + " per SF GBA</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Cap Rate: " + info_data.cap_rate + "</div></div>";
				} else if (aas_engine.options.reportTypeID.includes(3)) {
					infoHtml += "<div class='feed_item'><div class='panoitem'>Subtype: " + info_data.subtype + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Construction: " + info_data.const_descr + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Year Built: " + info_data.year_built + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>&nbsp;</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Start Date: " + info_data.lease_start_date + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Lessee: " + info_data.lessee_name + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Leased Area: " + info_data.tenant_area_sf + " SF</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Eff. Rent: " + info_data.eff_rent_sf_yr + " SF / Yr.</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Eff. Rent: " + info_data.eff_rent_sf_mo_blend + " SF / Mo.</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Expense Term: " + info_data.lease_expense_term + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Adjusted To: " + info_data.exp_term_adj + "</div></div>";
				} else {
					infoHtml += "<div class='feed_item'><div class='panoitem'>Type: " + info_data.property_type + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Zoning Code: " + info_data.zoning_code + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Net Land (SF): " + info_data.net_usable_sf + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Net Land (Acre): " + info_data.net_usable_acre + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>&nbsp;</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Recording Date: " + info_data.record_date + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Adj. $ / SF Net Land: " + info_data.adj_price_sf_net + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Adj. $ / SF FAR: " + info_data.adj_price_sf_far + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Adj. $ / Lot / Unit: " + info_data.sale_price_lot_wo + "</div></div>";
				}
				infoHtml += "</div>";
				infoHtml += "</div>";
				infowindow.setContent(infoHtml);
				infowindow.open(this.activeMap, marker);
			}
		},
		addMarker: function (data) {
			var data = JSON.parse(data);
			if (this.data.maps[data.mapType] == undefined) {
				return false;
			}
			var _marker = new google.maps.Marker({
					position: new google.maps.LatLng(data.lat, data.lng),
					map: this.data.maps[data.mapType].map,
					draggable: false,
					label: data.index.toString(),
					reportID: data.id,
					dataType: data.mapType,
					aaController: this
				});
			_marker.addListener('click', function () {
				var _elements = document.querySelectorAll("#" + this.dataType + "_table tbody >tr");
				if (rbe_engine.checkElement(_elements)) {
					for (var i = 0; i < _elements.length; i++) {
						if (_elements[i].id == this.reportID) {
							aaController.selectTableRow(_elements[i].childNodes[0]);
							return true;
						}
					}
				}
				return false;
			});
			this.data.maps[data.mapType].markers.objects.push(_marker);
			var loc = new google.maps.LatLng(_marker.position.lat(), _marker.position.lng());
			this.data.maps[data.mapType].bounds.extend(loc);
			this.data.maps[data.mapType].map.fitBounds(this.data.maps[data.mapType].bounds);
			this.data.maps[data.mapType].map.panToBounds(this.data.maps[data.mapType].bounds);
		},
		removeMarker: function () {},
		showErrorMessage: function (marker) {
			this.options.markers[i].setMap(null);
			this.options.markers[i] = null;
			this.options.markers.splice(i, 1);
		},
		clearMarkers: function (mapType) {
			for (var m = 0; m < this.options.coords.length; m++) {
				var coords = this.options.coords[m];
				if (this.data.markers[m] != undefined) {
					this.data.markers[m].setMap(null);
					this.data.markers[m] = null;
					this.data.markers.splice(m, 1);
				}
			}
		}
	};
	_mapController.setOptions(options);
	return _mapController;
}
