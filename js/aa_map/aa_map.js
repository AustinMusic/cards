var _aa_map = function (options) {
	var aa_map;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	aa_map = {
		options: {
			mapIcons: {},
			maps: [],
			mapOptions: [],
			customIcons: {
				2: {
					icon: '../img/mm_20_purple.png',
					shadow: '../img/mm_20_shadow.png'
				},
				3: {
					icon: '../img/mm_20_green.png',
					shadow: '../img/mm_20_shadow.png'
				},
				4: {
					icon: '../img/mm_20_blue.png',
					shadow: '../img/mm_20_shadow.png'
				},
				5: {
					icon: '../img/mm_20_brown.png',
					shadow: '../img/mm_20_shadow.png'
				},
				6: {
					icon: '../img/mm_20_red.png',
					shadow: '../img/mm_20_shadow.png'
				},
				7: {
					icon: '../img/mm_20_yellow.png',
					shadow: '../img/mm_20_shadow.png'
				},
				8: {
					icon: '../img/mm_20_orange.png',
					shadow: '../img/mm_20_shadow.png'
				},
				9: {
					icon: '../img/mm_20_white.png',
					shadow: '../img/mm_20_shadow.png'
				},
				1: {
					icon: '../img/mm_20_black.png',
					shadow: '../img/mm_20_shadow.png'
				}
			},
			activeObject: "",
			ajaxURL: "ajax_appraisal.php",
			markers: [],
			useGrid: true,
			gridType: "",
			gridTpl: "",
			gridOpenScript: "",
			mapTypeTitle: "",
			translations: {},
			layout: false,
			hasLayerDraw: false,
			polygon: false,
			reportTypeID: 0,
			externalSearchEngine: "",
			templates: {
				gridRowTPL: "<td><a href='../forms/appraisals.php?id=reportID_proxy' target='_blank'><img src='../img/edit.gif' alt='Edit Record'></a></td>" + "<td><a style='cursor:pointer;' rel='lightbox[property]' class='thumbnail' href='../comp_images/photo_proxy'><img src='../comp_images/thumbnail_proxy' alt='Subject Photo' class='img-rounded img-responsive' style='width:60px; max-width:60px;'></a></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>reportname_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>propertyname_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>address_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>city_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>state_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>country_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>submarket_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>zoning_code_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>duedate_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>AssignedTo_proxy</font></td>",
				gridRowImprovedSalesTPL: "<td><input type='checkbox' name='reportid[]' value='reportID_proxy'><a href='../forms/appraisals.php?id=reportID_proxy' target='_blank'><img src='../img/edit.gif' alt='Edit Record'></a></td>" + "<td><a style='cursor:pointer;' href='../forms/improvedsales.php?id=reportID_proxy' target='_blank'><img src='../img/edit.gif' alt='Edit Record'></a></td>" + "<td><a style='cursor:pointer;' href='../templates/improved_sales/template_path_proxy?id=reportID_proxy' target='_blank'><img src='../img/view.gif' alt='View Record'></a></td>" + "<td><a style='cursor:pointer;' rel='lightbox[property]' class='thumbnail' href='../comp_images/reportID_proxy/photo_proxy'><img src='../comp_images/reportID_proxy/thumbnail_proxy' alt='Subject Photo' class='img-rounded img-responsive' style='width:60px; max-width:60px;'></a></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>propertyname_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>address_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>city_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>state_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>submarket_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>overallgba_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>recorddate_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>saleprice_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>adjprice_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>caprate_proxy</font></td>",
				gridRowLandSalesTPL: "<td><input type='checkbox' name='reportid[]' value='reportID_proxy'></td>" + "<td><a href='../forms/landsales.php?id=reportID_proxy' target='_blank'><img src='../img/edit.gif' alt='Edit Record'></a></td>" + "<td><a href='../templates/land_sale/template_path_proxy?id=reportID_proxy' target='_blank'><img src='../img/view.gif' alt='View Record'></a></td>" + "<td><a style='cursor:pointer;' rel='lightbox[property]' class='thumbnail' href='../comp_images/photo_proxy'><img src='../comp_images/thumbnail_proxy' alt='Subject Photo' class='img-rounded img-responsive' style='width:60px; max-width:60px;'></a></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>propertyname_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>address_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>city_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>state_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>country_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>submarket_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>recorddate_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>sale_status_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>zoning_code_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>net_usable_sf_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>net_usable_acre_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>adj_price_sf_net_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>data.adj_price_sf_far_proxy</font></td>",
				gridRowLeasesTPL: "<td><input type='checkbox' name='reportid[]' value='reportID_proxy'></td>" + "<td style='cursor:pointer;'><a href='../forms/leases.php?id=reportID_proxy' target='_blank'><img src='../img/edit.gif' alt='Edit Record'></a></td>" + "<td style='cursor:pointer;'><a href='../templates/leases/template_path_proxy?id=reportID_proxy' target='_blank'><img src='../img/view.gif' alt='View Record'></a></td>" + "<td><a style='cursor:pointer;' rel='lightbox[property]' class='thumbnail' href='../comp_images/photo_proxy'><img src='../comp_images/thumbnail_proxy' alt='Subject Photo' class='img-rounded img-responsive' style='width:60px; max-width:60px;'></a></td>" + "<td align='left' valign='middle'><font family='Calibri' size='1'>propertyname_proxy</font></td>" + "<td align='left' valign='middle'><font family='Calibri' size='1'>address_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>city_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>state_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>county_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>submarket_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>lease_start_date_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>lessee_name_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>overallgba_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>tenant_area_sf_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>no_building_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>year_built_search_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>lease_expense_term_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>lease_esc_terms_desc_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>const_descr_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>init_rent_sf_yr_proxy</font></td>" + "<td align='center' valign='middle'><font family='Calibri' size='1'>eff_rent_sf_yr_proxy</font></td>",
			}
		},
		aa_engine: aa_engine,
		activeMap: "",
		largeInfowindow: "",
		filters: false,
		actionInProgress: false,
		markerClusters: false,
		data: {
			ajaxData: {},
			ajaxQuee: [],
			xhr: false,
			cacheReports: {},
			cacheClients: {},
			cacheProperties: {},
			markers: [],
			allowMapEvents: true,
		},
		setOptions: function (options) {
			for (var _attr in options) {
				if (this.options.hasOwnProperty(_attr)) {
					this.options[_attr] = options[_attr];
				}
			}
		},
		init: function () {
			this.initializeMap();
			this.renderLayout();
			this.initializeDialog();
			this.assignEvents();
		},
		initializeDialog: function () {
			var _element = document.getElementById("dialogueMessage");
			if (_element == null || _element == undefined) {
				var _element = document.createElement("div");
				_element.setAttribute("id", "dialogueMessage");
				document.getElementsByTagName('body')[0].appendChild(_element);
				$("#dialogueMessage").dialog({
					autoOpen: false,
					height: 200,
					width: 600,
					modal: true,
					title: this.options.translations["error"],
					buttons: [{
							text: this.options.translations["OK"],
							click: function () {
								$(this).dialog("close");
							}
						}
					]
				});
			}
		},
		initializeMap: function () {
			var _element = document.getElementById("mapLoader");
			if (!rbe_engine.checkElement(_element)) {
				var _element = document.createElement("img");
				_element.setAttribute("src", "../img/loader.gif");
				_element.setAttribute("id", "mapLoader");
				_element.setAttribute("style", "display:none;");
				document.getElementsByTagName("body")[0].appendChild(_element);
			}
			this.activeMap = new google.maps.Map(this.options.maps[0], this.options.mapOptions[0]);
			this.largeInfowindow = new google.maps.InfoWindow();
		},
		renderLayout: function () {
			if (this.options.layout !== false) {
				this.options.layout.options.mapObject = this;
				this.options.layout.renderLayout();
				$("#mapFilters").accordion({
					heightStyle: "content"
				});
				var _element = document.getElementById("mapFilters");
				if (rbe_engine.checkElement(_element)) {
					var __element = document.createElement("input");
					__element.setAttribute("type", "hidden");
					__element.setAttribute("id", "northEastLat");
					__element.setAttribute("class", "_mapFilter");
					__element.setAttribute("data-filter", "northEastLat");
					_element.appendChild(__element);
					var __element = document.createElement("input");
					__element.setAttribute("type", "hidden");
					__element.setAttribute("id", "northEastLng");
					__element.setAttribute("class", "_mapFilter");
					__element.setAttribute("data-filter", "northEastLng");
					_element.appendChild(__element);
					var __element = document.createElement("input");
					__element.setAttribute("type", "hidden");
					__element.setAttribute("id", "southWestLat");
					__element.setAttribute("class", "_mapFilter");
					__element.setAttribute("data-filter", "southWestLat");
					_element.appendChild(__element);
					var __element = document.createElement("input");
					__element.setAttribute("type", "hidden");
					__element.setAttribute("id", "southWestLng");
					__element.setAttribute("class", "_mapFilter");
					__element.setAttribute("data-filter", "southWestLng");
					_element.appendChild(__element);
				}
			}
			var _elements = document.querySelectorAll("#mapFilters .gridfilters");
			for (var i = 0; i < _elements.length; i++) {
				_elements[i].style.display = "none";
			}
		},
		renderUserSelectionComponents: function () {},
		assignEvents: function () {
			this.activeMap.addListener('idle', function (event) {
				var _controller = window.top.window[this.controller];
				if (!_controller.options.hasLayerDraw) {}
			});
			this.activeMap.addListener('dragend', function (event) {});
			this.activeMap.addListener('zoom_changed', function (event) {});
			if (this.options.useGrid) {
				var _element = document.getElementById("toggleGrid");
				if (rbe_engine.checkElement(_element)) {
					_element.setAttribute("onClick", this.options.activeObject + ".toggleGrid(this);");
				}
			}
		},
		toggleGrid: function (_element) {
			var g__element = document.getElementById("gridlist");
			var m__element = document.getElementById("map");
			if (g__element.style.display == "block") {
				g__element.style.display = "none";
				m__element.style.display = "block";
				_element.innerHTML = this.options.translations['Show Grid'];
				_element.setAttribute("type", "m");
				var _elements = document.querySelectorAll("#mapFilters .gridfilters");
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].style.display = "none";
				}
				var _elements = document.querySelectorAll("#mapFilters .mapfilters");
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].style.display = "block";
				}
				this.buildMarkers();
				this.fitMapOnMarkers();
			} else {
				g__element.style.display = "block";
				m__element.style.display = "none";
				_element.innerHTML = this.options.translations['Show Map'];
				_element.setAttribute("type", "g");
				var _elements = document.querySelectorAll("#mapFilters .gridfilters");
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].style.display = "block";
				}
				var _elements = document.querySelectorAll("#mapFilters .mapfilters");
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].style.display = "none";
				}
			}
		},
		assignGeneralMarketEvents: function () {
			var _elements = document.getElementsByClassName("generalMarket");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].setAttribute("onClick", this.options.activeObject + ".setSubMarket(this);");
				}
			}
			var _element = document.getElementById("smsubfilters");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onClick", this.options.activeObject + ".selectSubMarket(this);");
			}
		},
		buildFilters: function () {
			var _elements = document.querySelectorAll("#mapFilters ._mapFilter");
			var filters = {};
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					var nodeName = _elements[i].nodeName.toLowerCase();
					var inputType = undefined;
					if (_elements[i].type != null) {
						inputType = _elements[i].type.toLowerCase();
					}
					var prop = _elements[i].getAttribute("data-filter");
					if (filters[prop] == undefined) {
						if (_elements[i].getAttribute("filter-type") == "group") {
							filters[prop] = [];
						}
					}
					var dataFormat = false;
					if (_elements[i].hasAttribute("data-format")) {
						dataFormat = _elements[i].getAttribute("data-format");
					}
					switch (nodeName) {
					case "input":
						switch (inputType) {
						case "text":
							filters[prop] = _elements[i].value;
							if (dataFormat !== false) {
								filters[prop] = this[dataFormat].apply(null, [filters[prop]]);
							}
							break;
						case "hidden":
							filters[prop] = _elements[i].value;
							break;
						case "checkbox":
							if (_elements[i].checked) {
								if (_elements[i].getAttribute("filter-type") == "group") {
									filters[prop].push(_elements[i].getAttribute("data-id"));
								} else {
									filters[prop] = 1;
								}
							} else {
								if (_elements[i].getAttribute("filter-type") == "group") {}
								else {
									filters[prop] = 0;
								}
							}
							break;
						case "radio":
							break;
						}
						break;
					case "select":
						switch (inputType) {
						case "select-one":
							filters[prop] = _elements[i].options[_elements[i].selectedIndex].value;
							break;
						case "select-multiple":
							for (var o = 0; o < _elements[i].options.length; o++) {
								if (_elements[i].options[o].selected) {
									filters[prop].push(_elements[i].options[o].value);
								}
							}
							break;
						}
						break;
					case "textarea":
						break;
					}
				}
			}
			return filters;
		},
		getChangedFilterValues: function (filters) {
			console.log("getChangedFilterValues Method is deprecated 20180302!");
			return false;
			for (var attr in filters) {
				if (filters[attr]instanceof Array) {
					if (filters[attr].length != 0) {
						filters[attr].splice(0, filters[attr].length - 1);
					}
				}
			}
			return filters;
		},
		mergeFilters: function (filters) {
			console.log("mergeFilters Method is deprecated 20180302!");
			return false;
			for (var attr in filters) {
				this.filters[attr] = filters[attr];
				if (filters[attr]instanceof Array) {
					if (filters[attr].length != 0) {
						for (var i = 0; i < filters[attr]; i++) {
							var _index = this.filters[attr].indexOf(filters[attr][i]);
							if (_index == -1) {
								this.filters[attr].push(filters[attr][i]);
							}
						}
					}
				}
			}
		},
		filterMap: function (filters, _element) {
			if (this.options.externalSearchEngine != "") {
				window[this.options.externalSearchEngine].execMapFilters(filters);
				return true;
			}
			if (rbe_engine.checkElement(_element)) {
				if (!this.checkEmptyFilter(this.filters, _element)) {
					return false;
				}
			}
			this.data.ajaxQuee.push(JSON.stringify(filters));
			if (this.data.ajaxQuee.length == 1) {
				this.execAjax(filters, true);
			}
		},
		checkEmptyFilter: function (filters, _element) {
			if (_element == undefined) {
				return true;
			}
			var nodeName = _element.nodeName.toLowerCase();
			var inputType = undefined;
			if (_element.type != null) {
				inputType = _element.type.toLowerCase();
			}
			var property = _element.getAttribute("data-filter");
			if (filters[property] == undefined) {
				return true;
			}
			var dataFormat = false;
			if (_element.hasAttribute("data-format")) {
				dataFormat = _element.getAttribute("data-format");
			}
			switch (nodeName) {
			case "input":
				switch (inputType) {
				case "text":
					if (filters[property] == _element.value) {
						return false;
					}
					if (dataFormat !== false) {
						if (filters[property] == this[dataFormat].apply(null, [_element.value])) {
							return false;
						}
					}
					break;
				}
				break;
			}
			return true;
		},
		execAjax: function (filters, clearMarkers) {
			if (this.actionInProgress) {
				console.log("ACTION IN PROGRESS!");
				return false;
			}
			var _controller = this;
			this.data.xhr = $.ajax({
					url: this.options.ajaxURL,
					type: "post",
					dataType: "json",
					data: filters,
					beforeSend: function () {
						$('img#mapLoader').css('display', 'block');
						$('div.overlay').addClass('active');
					},
					success: function (retJson) {
						if (retJson.status == 'ok') {
							if (retJson.data.length == 0) {
								_controller.data.ajaxQuee.splice(0, 1);
								$('img#mapLoader').css('display', 'none');
								$('div.overlay').removeClass('active');
								_controller.showErrorMessage("No results found");
								return false;
							}
							_controller.filters = JSON.parse(JSON.stringify(filters));
							if (clearMarkers) {
								_controller.clearMarker(false, false);
							}
							_controller.data.markers = retJson.data;
							_controller.buildMarkers();
							_controller.fitMapOnMarkers();
						}
						if (retJson.status == 'ok') {
							var shuttDownLoader = false;
							if (_controller.options.useGrid) {
								if (_controller.options.activeObject != "") {
									setTimeout(_controller.options.activeObject + ".buildTable();", 3000);
								} else {
									shuttDownLoader = true;
								}
								var __element = document.getElementById("toggleGrid");
								if (rbe_engine.checkElement(__element)) {
									if (__element.getAttribute("type") == "g") {
										setTimeout("$('img#mapLoader').css('display','none');$('div.overlay').removeClass('active');", 3000);
									} else {
										shuttDownLoader = true;
									}
								} else {
									shuttDownLoader = true;
								}
							} else {
								shuttDownLoader = true;
							}
							if (shuttDownLoader) {
								$('img#mapLoader').css('display', 'none');
								$('div.overlay').removeClass('active');
							}
						} else {
							$('img#mapLoader').css('display', 'none');
							$('div.overlay').removeClass('active');
						}
						_controller.data.ajaxQuee.splice(0, 1);
						if (_controller.data.ajaxQuee.length > 0) {
							_controller.execAjax(JSON.parse(_controller.data.ajaxQuee[0]), true);
						} else {}
						_controller.actionInProgress = false;
					},
					error: function (jqXHR, textStatus, errorThrown) {
						_controller.showErrorMessage("An error occured.");
						_controller.data.ajaxQuee.length = 0;
						_controller.data.ajaxQuee = [];
						$('img#mapLoader').css('display', 'none');
						$('div.overlay').removeClass('active');
					}
				});
		},
		buildMarkers: function () {
			if (this.markerClusters !== false) {}
			var _mcontroller = this;
			for (var i = 0; i < this.data.markers.length; i++) {
				var mapData = this.data.markers[i];
				var markerIcon = this.options.customIcons[mapData.ptid];
				if (markerIcon == undefined) {
					markerIcon = this.options.customIcons[1];
				}
				var _marker = rbe_engine.getItemForMethod(this.options.markers, "id", mapData.id, false);
				if (this.options.hasLayerDraw && this.options.polygon !== false) {
					if (this.options.polygon.type == 'polygon') {
						if (!google.maps.geometry.poly.containsLocation(new google.maps.LatLng(parseFloat(mapData.lat), parseFloat(mapData.lng)), this.options.polygon.overlay)) {
							_marker = true;
						}
					} else if (this.options.polygon.type == 'circle') {
						var bounds = this.options.polygon.overlay.getBounds();
						if (!bounds.contains(new google.maps.LatLng(parseFloat(mapData.lat), parseFloat(mapData.lng)))) {
							_marker = true;
						}
					}
				}
				if (_marker == false) {
					var marker = new google.maps.Marker({
							map: this.activeMap,
							position: new google.maps.LatLng(parseFloat(mapData.lat), parseFloat(mapData.lng)),
							id: mapData.id,
							title: mapData.reportname,
							icon: markerIcon.icon,
							data: mapData
						});
					marker.addListener('click', function () {
						_mcontroller.populateInfoWindow(this, _mcontroller.largeInfowindow);
					});
					this.options.markers.push(marker);
				}
			}
			if (this.options.markers.length == 1) {}
		},
		fitMapOnMarkers: function () {
			this.data.allowMapEvents = false;
			this.activeMap.bounds = new google.maps.LatLngBounds();
			for (var i = 0; i < this.options.markers.length; i++) {
				var loc = new google.maps.LatLng(parseFloat(this.options.markers[i].data.lat), parseFloat(this.options.markers[i].data.lng));
				this.activeMap.bounds.extend(loc);
			}
			this.activeMap.fitBounds(this.activeMap.bounds);
			this.activeMap.panToBounds(this.activeMap.bounds);
			this.data.allowMapEvents = true;
		},
		populateInfoWindow: function (marker, infowindow) {
			if (infowindow.marker != marker) {
				infowindow.setContent('');
				infowindow.marker = marker;
				infowindow.addListener('closeclick', function () {
					infowindow.marker = null;
				});
				var scriptName = "";
				if (window.aa_map.options.gridOpenScript != "") {
					scriptName = window.aa_map.options.gridOpenScript;
				} else {
					console.log("No grid open script url defined!");
				}
				var infoHtml = "";
				var __element = document.querySelector("#comps [value='" + marker.data.id + "']");
				var checkedhtml = "";
				if (__element != undefined) {
					if (__element.checked) {
						checkedhtml = "checked";
					}
				}
				console.log(this.options);
				infoHtml = "<div class='blended_grid'>";
				if (this.options.reportTypeID != 1) {
					infoHtml += "<div class='topBanner'><center><label style='width: 150px;'>Select Comp</label>&nbsp;<input type='checkbox' data-id='" + marker.data.id + "' " + checkedhtml + " onClick='" + this.options.activeObject + ".setOptionToGrid(this,);' /></center>";
				}
				infoHtml += "<div class='topBanner'><center><a target='_blank' style='color: #FFFFFF;' href='";
				if (this.options.reportTypeID == 1) {
					infoHtml += "/cards/forms/appraisals.php?id=" + marker.data.id;
				} else if (this.options.reportTypeID == 2) {
					infoHtml += "/cards/forms/improvedsales.php?id=" + marker.data.id;
				} else if (this.options.reportTypeID == 3) {
					infoHtml += "/cards/forms/leases.php?id=" + marker.data.id;
				} else {
					infoHtml += "/cards/forms/landsales.php?id=" + marker.data.id;
				}
				infoHtml += "' >Click to Open Report</a></center></div>";
				if (this.options.reportTypeID != 1) {
					infoHtml += "</div>";
				}
				infoHtml += "<div class='leftColumn'><div class='panoimg'><img src='../comp_images/" + marker.data.photo1 + "' width='200px'></div>";
				infoHtml += "</div>";
				infoHtml += "<div class='feedHost'>";
				infoHtml += "<div class='feed_item'><div class='panoitem'>" + marker.data.property_name + "</div></div>";
				infoHtml += "<div class='feed_item'><div class='panoitem'>" + marker.data.address + "</div></div>";
				infoHtml += "<div class='feed_item'><div class='panoitem'>" + marker.data.city + ", " + marker.data.state + "</div></div>";
				infoHtml += "<div class='feed_item'><div class='panoitem'>&nbsp;</div></div>";
				if (this.options.reportTypeID == 1) {
                    infoHtml += "<div class='feed_item'><div class='panoitem'>Job No.: " + marker.data.reportname + "</div></div>";
                    infoHtml += "<div class='feed_item'><div class='panoitem'>Type: " + marker.data.property_type + "</div></div>";
                    infoHtml += "<div class='feed_item'><div class='panoitem'>Subtype: " + marker.data.subtype + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>County: " + marker.data.county + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Zoning Code: " + marker.data.zoning_code + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Client: " + marker.data.client_name + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Appraiser: " + marker.data.OwnerID + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Due Date: " + marker.data.DueDate + "</div></div>";
				} else if (this.options.reportTypeID == 2) {
                    infoHtml += "<div class='feed_item'><div class='panoitem'>Subtype: " + marker.data.subtype + "</div></div>";
				    infoHtml += "<div class='feed_item'><div class='panoitem'>Occupancy: " + marker.data.occupancy_type + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>GBA: " + marker.data.overall_gba + " SF</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Year Built: " + marker.data.year_built + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Construction: " + marker.data.const_descr + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Parking Ratio: " + marker.data.parking_ratio + "</div></div>";                
				    infoHtml += "<div class='feed_item'><div class='panoitem'>&nbsp;</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Recording Date: " + marker.data.record_date + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>" + marker.data.adj_price_sf_gba + " per SF GBA</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Cap Rate: " + marker.data.cap_rate + "</div></div>";
				} else if (this.options.reportTypeID == 3) {
                    infoHtml += "<div class='feed_item'><div class='panoitem'>Subtype: " + marker.data.subtype + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Construction: " + marker.data.const_descr + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Year Built: " + marker.data.year_built + "</div></div>";                 
				    infoHtml += "<div class='feed_item'><div class='panoitem'>&nbsp;</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Start Date: " + marker.data.lease_start_date + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Lessee: " + marker.data.lessee_name + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Leased Area: " + marker.data.tenant_area_sf + " SF</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Eff. Rent: " + marker.data.eff_rent_sf_yr + " SF / Yr.</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Eff. Rent: " + marker.data.eff_rent_sf_mo_blend + " SF / Mo.</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Expense Term: " + marker.data.lease_expense_term + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Adjusted To: " + marker.data.exp_term_adj + "</div></div>";
				} else {
					infoHtml += "<div class='feed_item'><div class='panoitem'>Type: " + marker.data.property_type + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Zoning Code: " + marker.data.zoning_code + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Net Land (SF): " + marker.data.net_usable_sf + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Net Land (Acre): " + marker.data.net_usable_acre + "</div></div>";                 
				    infoHtml += "<div class='feed_item'><div class='panoitem'>&nbsp;</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Recording Date: " + marker.data.record_date + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Adj. $ / SF Net Land: " + marker.data.adj_price_sf_net + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Adj. $ / SF FAR: " + marker.data.adj_price_sf_far + "</div></div>";
					infoHtml += "<div class='feed_item'><div class='panoitem'>Adj. $ / Lot / Unit: " + marker.data.sale_price_lot_wo + "</div></div>";
				}
				infoHtml += "</div>";
				infoHtml += "</div>";
				infowindow.setContent(infoHtml);
				infowindow.open(map, marker);
			}
		},
		buildTable: function () {
			var rows = [];
			var template = "";
			if (this.options.gridTpl != "") {
				template = this.options.gridTpl;
			} else {
				console.log("No grid row template defined!");
			}
			var hasCustomTpl = false;
			var tplElement = document.getElementById(template);
			if (rbe_engine.checkElement(tplElement)) {
				hasCustomTpl = true;
			}
			var table = $('#gridlist #comps').DataTable();
			table.destroy();
			for (var i = 0; i < this.options.markers.length; i++) {
				var marker = this.options.markers[i];
				if (marker.visible) {
					var cell = this.options.templates[template];
					if (hasCustomTpl) {
						cell = tplElement.innerHTML;
						cell = cell.replace("<!--", "");
						cell = cell.replace("!-->", "");
						cell = cell.replace(/\r\n/gi, "");
						cell = cell.replace(/\t/gi, "");
					}
					cell = cell.replace(/reportID_proxy/gi, marker.data.id);
					cell = cell.replace(/photo_proxy/gi, marker.data.photo1);
					cell = cell.replace(/thumbnail_proxy/gi, marker.data.thumbnail);
					cell = cell.replace(/reportname_proxy/gi, marker.data.reportname);
					cell = cell.replace(/propertyname_proxy/gi, marker.data.property_name);
					cell = cell.replace(/address_proxy/gi, marker.data.address);
					cell = cell.replace(/citystate_proxy/gi, marker.data.citystate);
					cell = cell.replace(/city_proxy/gi, marker.data.city);
					cell = cell.replace(/state_proxy/gi, marker.data.state);
					cell = cell.replace(/zip_code_proxy/gi, marker.data.zip_code);
					cell = cell.replace(/country_proxy/gi, marker.data.county);
					cell = cell.replace(/county_proxy/gi, marker.data.county);
					cell = cell.replace(/submarket_proxy/gi, marker.data.submarket);
					cell = cell.replace(/propertytype_proxy/gi, marker.data.propertytype);
					cell = cell.replace(/date_created_proxy/gi, marker.data.DateCreated);
					cell = cell.replace(/client_name_proxy/gi, marker.data.client_name);
					cell = cell.replace(/year_built_proxy/gi, marker.data.year_built);
					cell = cell.replace(/last_renovation_proxy/gi, marker.data.last_renovation);
					cell = cell.replace(/const_descr_proxy/gi, marker.data.const_descr);
					cell = cell.replace(/parking_ratio_proxy/gi, marker.data.parking_ratio);
					cell = cell.replace(/no_stories_proxy/gi, marker.data.no_stories);
					cell = cell.replace(/sale_status_proxy/gi, marker.data.sale_status);
					cell = cell.replace(/occupancy_type_proxy/gi, marker.data.occupancy_type);
					cell = cell.replace(/adj_price_sf_nra_proxy/gi, marker.data.adj_price_sf_nra);
					cell = cell.replace(/adj_price_unit_proxy/gi, marker.data.adj_price_unit);
					cell = cell.replace(/alloc_imp_value_sf_nra_proxy/gi, marker.data.alloc_imp_value_sf_nra);
					cell = cell.replace(/ind_pct_office_proxy/gi, marker.data.ind_pct_office);
					cell = cell.replace(/site_cover_primary_proxy/gi, marker.data.site_cover_primary);
					cell = cell.replace(/subtype_proxy/gi, marker.data.subtype);
					cell = cell.replace(/gross_land_sf_proxy/gi, marker.data.gross_land_sf);
					cell = cell.replace(/zoning_code_proxy/gi, marker.data.zoning_code);
					cell = cell.replace(/zoning_desc_proxy/gi, marker.data.zoning_desc);
					cell = cell.replace(/duedate_proxy/gi, marker.data.DueDate);
					cell = cell.replace(/AssignedTo_proxy/gi, marker.data.AssignedTo);
					cell = cell.replace(/overallgba_proxy/gi, marker.data.overall_gba);
					cell = cell.replace(/recorddate_proxy/gi, marker.data.record_date);
					cell = cell.replace(/saleprice_proxy/gi, marker.data.sale_price);
					cell = cell.replace(/adjprice_proxy/gi, marker.data.adj_price_sf_gba);
					cell = cell.replace(/caprate_proxy/gi, marker.data.cap_rate);
					cell = cell.replace(/template_path_proxy/gi, marker.data.templatepath);
					cell = cell.replace(/net_usable_sf_proxy/gi, marker.data.net_usable_sf);
					cell = cell.replace(/net_usable_acre_proxy/gi, marker.data.net_usable_acre);
					cell = cell.replace(/adj_price_sf_net_proxy/gi, marker.data.adj_price_sf_net);
					if (marker.data.adj_price_sf_far == "$0.00") {
						cell = cell.replace(/adj_price_sf_far_proxy/gi, "---");
					} else {
						cell = cell.replace(/adj_price_sf_far_proxy/gi, marker.data.adj_price_sf_far);
					}
					cell = cell.replace(/sale_status_proxy/gi, marker.data.sale_status);
					cell = cell.replace(/adj_price_acre_net_proxy/gi, marker.data.adj_price_acre_net);
					cell = cell.replace(/unit_density_net_acre_proxy/gi, marker.data.unit_density_net_acre);
					cell = cell.replace(/finish_lot_size_sf_proxy/gi, marker.data.finish_lot_size_sf);
					cell = cell.replace(/bulk_price_lot_proxy/gi, marker.data.bulk_price_lot);
					cell = cell.replace(/lease_start_date_proxy/gi, marker.data.lease_start_date);
					cell = cell.replace(/lease_end_date_proxy/gi, marker.data.lease_end_date);
					cell = cell.replace(/lessee_name_proxy/gi, marker.data.lessee_name);
					cell = cell.replace(/tenant_area_sf_proxy/gi, marker.data.tenant_area_sf);
					cell = cell.replace(/no_building_proxy/gi, marker.data.no_building);
					cell = cell.replace(/year_built_search_proxy/gi, marker.data.year_built_search);
					cell = cell.replace(/lease_expense_term_proxy/gi, marker.data.lease_expense_term);
					cell = cell.replace(/lease_esc_terms_desc_proxy/gi, marker.data.lease_esc_terms_desc);
					cell = cell.replace(/const_descr_proxy/gi, marker.data.const_descr);
					cell = cell.replace(/init_rent_sf_yr_proxy/gi, marker.data.init_rent_sf_yr);
					cell = cell.replace(/eff_rent_sf_yr_proxy/gi, marker.data.eff_rent_sf_yr);
					cell = cell.replace(/eff_rent_sf_mo_shell_proxy/gi, marker.data.eff_rent_sf_mo_shell);
					cell = cell.replace(/eff_rent_sf_mo_office_proxy/gi, marker.data.eff_rent_sf_mo_office);
					cell = cell.replace(/eff_rent_sf_mo_blend_proxy/gi, marker.data.eff_rent_sf_mo_blend);
					cell = cell.replace(/exp_term_adj_proxy/gi, marker.data.exp_term_adj);
					var _element = document.createElement("tr");
					_element.innerHTML = cell;
					rows.push(_element);
				}
			}
			$.fn.dataTable.moment('M/D/YYYY');
			var table = $('#gridlist #comps').DataTable({
					"pageLength": 50
				});
			table.clear().draw();
			table.rows.add(rows).draw();
		},
		clearMarker: function (type, id) {
			for (var i = 0; i < this.options.markers.length; i++) {
				if (id == false) {
					this.options.markers[i].setMap(null);
					this.options.markers[i] = null;
					this.options.markers.splice(i, 1);
					i--;
				} else {
					if (type == "propertytype") {
						if (this.options.markers[i].data.propertytype == id) {
							this.options.markers[i].setMap(null);
						}
					} else if (type == "report") {
						if (this.options.markers[i].data.id == id) {
							this.options.markers[i].setMap(null);
						}
					} else if (type == "property") {
						if (this.options.markers[i].data.id == id) {
							this.options.markers[i].setMap(null);
						}
					} else {
						if (this.options.markers[i].data.submarkid == id) {
							this.options.markers[i].setMap(null);
						}
					}
				}
			}
			this.options.markers = [];
		},
		hideMarkers: function (_element) {
			console.log("Method is deprecated 20180302");
			return false;
			for (var i = 0; i < this.options.markers.length; i++) {
				this.options.markers[i].setVisible(true);
			}
			var filters = this.buildFilters();
			var filter = _element.getAttribute("data-filter");
			var values = [];
			var methods = [];
			var calculations = [];
			var isEmpty = true;
			console.log(filter);
			console.log(filters);
			for (var attr in filters) {
				if (filters[attr]instanceof Array) {
					if (filters[attr].length != 0) {
						isEmpty = false;
					}
				} else {
					if (filters[attr].value != "") {
						isEmpty = false;
					}
				}
				if (!isEmpty) {
					if (filter == attr) {
						calculations.push("!=");
					} else {
						calculations.push("=");
					}
					values.push(filters[attr]);
					methods.push(attr);
				}
				isEmpty = true;
			}
			if (values.length > 0) {
				var _markers = rbe_engine.getItemsForMethod(this.options.markers, ["data", methods], values, calculations);
				console.log(_markers);
				if (_markers !== false && calculations.indexOf("!=") != -1) {
					for (var i = 0; i < _markers.length; i++) {
						_markers[i].setVisible(false);
					}
				}
			}
		},
		setOptionToGrid: function (_element) {
			var _id = _element.getAttribute("data-id");
			var __element = document.querySelector("#comps [value='" + _id + "']");
			if (__element != undefined) {
				__element.checked = _element.checked;
			}
		},
		showErrorMessage: function (message) {
			var _element = document.getElementById("dialogueMessage");
			if (_element != undefined) {
				_element.innerHTML = "<p>" + message + "</p>";
				$("#dialogueMessage").dialog("open");
			}
		},
		doubleVal: function (value) {
			if (value == "") {
				return 0;
			}
			value = value.replace(/,/gi, "");
			return parseFloat(value);
		},
		currencyVal: function (value) {
			if (value == "") {
				return 0;
			}
			value = value.replace("$ ", "");
			value = value.replace(/,/gi, "");
			return parseInt(value);
		},
		percentageVal: function (value) {
			if (value == "") {
				return 0;
			}
			return parseFloat(value.replace("%", ""));
		},
		intVal: function (value) {
			if (value == "") {
				return 0;
			}
			value = value.replace(/,/gi, "");
			return parseInt(value);
		},
		dateVal: function (value) {
			return value;
		}
	}
	aa_map.setOptions(options);
	return aa_map;
};
