var _appraisalsController = function (options) {
    var _appraisalsController;
    var rbe_engine = new _rbe_engine();
    _appraisalsController = {
        options: {
            ajaxURL: "forms/ajax_forms.php",
            ajaxDataSourceURL: "forms/ajax_datasource.php",
            activeObject: "",
            id: "",
            latitude: "",
            longitude: "",
            subMarketArea: "",
            subProperty: "",
            appraisalsData: "",
        },
        data: {
            selectedElement: null,
			selectedCompType:null
        },
        mapController: "",
        baseController: "",
        setOptions: function (options) {
            for (var attr in options) {
                if (this.options.hasOwnProperty(attr)) {
                    this.options[attr] = options[attr];
                }
            }
        },
        init: function () {
            this.baseController = new _baseController({
                    activeObject: this.options.activeObject + ".baseController",
                    data: this.options.data,
                    mapType: ""
                });
            this.baseController.init();
            this.mapController = new _mapController({
                    activeObject: this.options.activeObject + ".mapController",
                    id: this.options.id,
                    latitude: this.options.latitude,
                    longitude: this.options.longitude,
                });
            this.baseController.mapController = this.mapController;
            this.assignSelectRowsEvents();
            this.initDeleteEntryDialog();
            this.assignEvents();
            this.sortPics();
            var _elements = document.getElementById("assessed_table").querySelectorAll("tbody tr ._sumv");
            for (var i = 0; i < _elements.length; i++) {
                this.sumValuesVerticaly(_elements[i]);
            }
            this.mapController.init();
            this.renderUI();
        },
        assignEvents: function () {
            var _element = document.getElementById("onePhotoTemp");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".GetOnephotoTemp(this);");
            }
            var _element = document.getElementById("twoPhotoTemp");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".GetTwophotoTemp(this);");
            }
            var _element = document.getElementById("removeBoxFile");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".removeBoxFile(this);");
            }
            var _elements = document.getElementsByClassName('newWindow');
            for (var i = 0; i < _elements.length; i++) {
                _elements[i].setAttribute("onClick", this.options.activeObject + ".openWindow(this);");
            }
            var _element = document.getElementById("autocomplete");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("focus", this.options.activeObject + ".geolocate();");
            }
            var _element = document.getElementById("as_is");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".toggleAsIs(this);");
                this.toggleAsIs(_element);
            }
            var _element = document.getElementById("prospective_stabilized");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".toggleProsStab(this);");
                this.toggleProsStab(_element);
            }
            var _element = document.getElementById("prospective_completion");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".toggleProsComp(this);");
                this.toggleProsComp(_element);
            }
            var _element = document.getElementById("retrospective");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".toggleRetro(this);");
                this.toggleRetro(_element);
            }
            var _element = document.getElementById("sales_comparison");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".togglesaLibrary(this);");
                this.togglesaLibrary(_element);
            }
            var _element = document.getElementById("income_approach");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".toggleiaLibrary(this);");
                this.toggleiaLibrary(_element);
            }
            var _element = document.getElementById("groundlease");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".togglemvLibrary(this);");
                this.togglemvLibrary(_element);
            }
            var _element = document.getElementById("site_valuation");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".togglelvLibrary(this);");
                this.togglelvLibrary(_element);
            }
            var _element = document.getElementById("cost_approach");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".togglecaLibrary(this);");
                this.togglecaLibrary(_element);
            }
            var _element = document.getElementById("purpose_of_appraisal");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".toggleEmDomain();");
                this.toggleEmDomain();
            }
            var _elements = document.getElementsByClassName("_generateReportWordBtn");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".generateReportWord(this);");
                }
            }
            var _elements = document.getElementsByClassName("_generateLibraryWordBtn");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".generateLibraryWord(this);");
                }
            }
            var _elements = document.getElementsByClassName("_generateReportExcelBtn");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".generateReportExcel(this);");
                }
            }
            var _elements = document.getElementsByClassName("_generateReportWordBtnImages");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".generateReportWordImages(this);");
                }
            }
            var _elements = document.getElementsByClassName("_generateCoverPage");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".generateCover(this);");
                }
            }
            var _elements = document.getElementsByClassName("_generateCompProfile");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".generateCompProf(this);");
                }
            }
            var _elements = document.getElementsByClassName("_generateDataAnalysis");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".generateDataAnalysis(this);");
                }
            }
            var _elements = document.getElementsByClassName("_editAction");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".editEntry(this);");
                }
            }
            var _elements = document.getElementsByClassName("_addAssessed");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".addAssessed(this);");
                }
            }
            var _elements = document.getElementsByClassName("_removeAction");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".removeEntryPrompt(this);");
                }
            }
            var _elements = document.getElementsByClassName("itemUp");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".upItem(this);");
                }
            }
            var _elements = document.getElementsByClassName("itemDown");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".downItem(this);");
                }
            }
            var _elements = document.getElementsByClassName("_fm03t");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                    this.getNumberFormat(_elements[i], _elements[i].value);
                }
            }
            var _elements = document.getElementsByClassName("_fm02t");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                    this.getNumberFormat(_elements[i], _elements[i].value);
                }
            }
            var _elements = document.getElementsByClassName("_fm00f");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                    this.getNumberFormat(_elements[i], _elements[i].value);
                }
            }
            var _elements = document.getElementsByClassName("_fm06fp");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                    this.getNumberFormat(_elements[i], _elements[i].value);
                }
            }
            var _elements = document.getElementsByClassName("_fm00t");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                    this.getNumberFormat(_elements[i], _elements[i].value);
                }
            }
            var _elements = document.getElementsByClassName("_fm01t");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                    this.getNumberFormat(_elements[i], _elements[i].value);
                }
            }
            var _elements = document.getElementsByClassName("_cfm00t");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                    this.getNumberFormat(_elements[i], _elements[i].value);
                }
            }
            var _elements = document.getElementsByClassName("_cfm02t");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                    this.getNumberFormat(_elements[i], _elements[i].value);
                }
            }
            var _elements = document.getElementsByClassName("_fm01tp");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                    this.getNumberFormat(_elements[i], _elements[i].value);
                }
            }
            var _elements = document.getElementsByClassName("_fm02tp");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                    this.getNumberFormat(_elements[i], _elements[i].value);
                }
            }
            var _elements = document.getElementsByClassName("_fm01tr");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                    this.getNumberFormat(_elements[i], _elements[i].value);
                }
            }
 /*           var _elements = document.getElementsByClassName("_bmfield");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onblur", _elements[i].getAttribute("onblur") + ";" + this.options.activeObject + ".changeBG(this);");
                }
            }
            var _elements = document.getElementsByClassName("_bmfields3");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".changeBGSeaa(this);");
                this.changeBGSeaa(_element);
            }*/
            var _elements = document.getElementsByClassName("_sum");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumValues(this);");
                }
            }
            var _elements = document.getElementsByClassName("_sumv");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumValuesVerticaly(this);");
                }
            }
/*            var _element = document.getElementById("inputtypeSF");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onBlur") + ";aa_engine.changeFormat('gla_inputsize',0,0,true);");
            }
            var _element = document.getElementById("Acre");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onBlur") + ";aa_engine.changeFormat('gla_inputsize',0,3,true);");
            }*/
            var _element = document.getElementById("inputtypeSF");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onBlur") + ";aa_engine.changeFormat('gla_inputsize',0,0,true);");
                _elements.value = aa_engine.formatNumber(_element.value, 0, 0, true);
            }
            var _element = document.getElementById("Acre");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onBlur") + ";aa_engine.changeFormat('gla_inputsize',0,3,true);");
                _elements.value = aa_engine.formatNumber(_element.value, 0, 3, true);
            }
            var _element = document.querySelector(".gla_ut:checked");
            if (rbe_engine.checkElement(_element)) {
                _element.onclick();
            }
            var _element = document.getElementById("gla_inputsize");
            if (rbe_engine.checkElement(_element)) {
                _element.onblur();
            }
            var _element = document.getElementById("cloneReport");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onClick") + ";" + this.options.activeObject + ".cloneReport(this);");
            }
            var _elements = document.getElementsByClassName("_ppgc");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".propagadeCalcualations();");
                }
            }
            var _elements = document.getElementsByClassName("_ppgcc");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onClick", _elements[i].getAttribute("onClick") + ";" + this.options.activeObject + ".propagadeCalcualations();");
                }
            }
            var _element = document.getElementById("selectPropertType");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".setSubPropertType(this);" + this.options.activeObject + ".togglePT();");
                this.setSubPropertType(_element);
            }
            var _element = document.getElementById("selectSubPropertType");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".togglePT();");
                this.togglePT();
            }
            var _element = document.getElementById("selectMarketArea");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".setSubMarket(this);");
                this.setSubMarket(_element);
            }
            var _elements = document.getElementsByClassName("_renderMap");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onClick", _elements[i].getAttribute("onClick") + ";" + this.options.activeObject + ".renderMap(this);");
                }
            }
            var _elements = document.getElementsByClassName("_delAssessed");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onClick", _elements[i].getAttribute("onClick") + ";" + this.options.activeObject + ".deleteAssessed(this);");
                }
            }
            var _elements = document.querySelectorAll("#appraiser_table .dl-report");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onClick", this.options.activeObject + ".generateAppraisarReport(this);");
                }
            }
            var _element = document.getElementById("galleryContainer");
            if (rbe_engine.checkElement(_element)) {
                var _elements = _element.querySelectorAll(".galleryItem");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("draggable", true);
                        _elements[i].addEventListener("dragstart", function (evt) {
                            evt.dataTransfer.setData("text", evt.target.getAttribute("drag-index"));
                        });
                        _elements[i].setAttribute("drag-index", i);
                        this.prepareChildrenForDrag(_elements[i], i);
                    }
                }
                _element.addEventListener("drop", function (evt) {
                    evt.preventDefault();
                    var data = evt.dataTransfer.getData("text");
                    var _element = document.getElementById("galleryContainer");
                    var cnteX = _element.getBoundingClientRect().right;
                    var posX = evt.clientX - _element.getBoundingClientRect().x;
                    var posY = evt.clientY - _element.getBoundingClientRect().y;
                    var sX = 0;
                    var sY = 0;
                    var eX = 0;
                    var eY = 0;
                    var __element = _element.querySelector(".galleryItem[drag-index='" + data + "']");
                    $("#galleryContainer .drag-divider").remove();
                    var xOffset = 0;
                    var yOffset = 0;
                    for (var c = 0; c < _element.children.length; c++) {
                        sX = _element.children[c].clientLeft + xOffset;
                        eX = sX + _element.children[c].offsetLeft;
                        sY = _element.children[c].clientTop + _element.children[c].offsetTop + yOffset;
                        eY = sY + _element.children[c].clientHeight;
                        if (posX >= sX && posX <= eX && posY >= sY && posY <= eY) {
                            _element.insertBefore(__element, _element.children[c]);
                            appraisalsController.sortPics();
                            return true;
                        }
                        if (cnteX < (posX + _element.children[c].getBoundingClientRect().width)) {
                            posX = cnteX - posX;
                            posY = posY + _element.children[c].getBoundingClientRect().height;
                        }
                        if (xOffset != 0) {}
                    }
                    _element.appendChild(__element);
                    appraisalsController.sortPics();
                });
                _element.addEventListener("dragover", function (evt) {
                    var rbe_engine = new _rbe_engine();
                    evt.preventDefault();
                    var p_element = evt.target;
                    while ((!rbe_engine.hasClass(p_element, "galleryItem") && !rbe_engine.hasClass(p_element, "gallery")) && p_element.nodeName.toLowerCase() != "body") {
                        p_element = p_element.parentNode;
                    }
                    var _element = document.getElementById("galleryContainer");
                    var divider = document.createElement("div");
                    divider.setAttribute("class", "drag-divider");
                    $("#galleryContainer .drag-divider").remove();
                    var data = evt.dataTransfer.getData("text");
                    var posX = evt.layerX;
                    var posY = evt.layerY;
                    var ePosX = 0;
                    var ePosY = 0;
                    var __element = _element.querySelector(".galleryItem[drag-index='" + data + "']");
                    for (var c = 0; c < _element.children.length; c++) {}
                });
            }
            var _elements = document.getElementsByClassName("_clonecompsAction");
            if (rbe_engine.checkElement(_elements)) {
				for(var c=0;c<_elements.length;c++){
					_elements[c].setAttribute("onClick", _elements[c].getAttribute("onClick") + ";" + this.options.activeObject + ".showCloneCompsModal(this);");
				}
            }
            var _element = document.querySelector("#cloneCompsModal ._search_reports");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onClick") + ";" + this.options.activeObject + ".searchReports(this);");
            }
            var _element = document.querySelector("#cloneCompsModal ._clonecompsConfirm");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onClick") + ";" + this.options.activeObject + ".showCloneConfirmation(this);");
            }
            var _element = document.querySelector("#cloneModal .modal-footer ._proceed");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onClick") + ";" + this.options.activeObject + ".cloneType(this);");
            }
			
			var _elements = document.getElementsByClassName("_copycompsAction");
            if (rbe_engine.checkElement(_elements)) {
				for(var c=0;c<_elements.length;c++){
					_elements[c].setAttribute("onClick", _elements[c].getAttribute("onClick") + ";" + this.options.activeObject + ".showCopyConfirmation(this);");
				}
            }
			
			var _element = document.querySelector("#copyModal .modal-footer ._proceed");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onClick") + ";" + this.options.activeObject + ".copyType(this);");
            }
        },
		addSelectedLines: function (data,dataTarget) {
			var dataTargets = [
				{
					target: "caprate",
					container: "caprate_table",
					idsInput: "caprateIDs",
					cellClasses: [ "selectable", "", "selectable cellNoWrap", "selectable cellNoWrap", "selectable cellNoWrap", "selectable cellNoWrap cellAlignCenter", "selectable cellNoWrap cellAlignCenter", "selectable cellNoWrap cellAlignCenter", "selectable cellNoWrap cellAlignCenter", "selectable cellAlignCenter", "selectable cellAlignCenter", "selectable cellAlignCenter", "selectable cellAlignCenter", "selectable cellAlignCenter" ],
					cellMethods: [ "indexCounter", [ "photo1", "thumbnail" ],
								[ "property_name", "address" ],
								[ "city", "submarket" ],
								[ "property_type", "subtype" ],
								[ "year_built", "last_renovation" ],
								[ "overall_gba", "const_descr" ],
								[ "parking_ratio", "no_stories" ],
								[ "record_date", "sale_status" ], "adj_price_sf_nra", "ind_pct_office", "adj_price_unit", "site_cover_primary", "cap_rate"
					]
				},
				{
					target: "miscrent",
					container: "miscrent_table",
					idsInput: "miscrentIDs",
					cellClasses: [ "selectable", "", "selectable cellNoWrap", "selectable cellNoWrap", "selectable cellNoWrap", "selectable cellNoWrap cellAlignCenter", "selectable cellNoWrap cellAlignCenter", "selectable cellNoWrap cellAlignCenter", "selectable cellNoWrap cellAlignCenter", "selectable cellAlignCenter", "selectable cellAlignCenter", "selectable cellAlignCenter", "selectable cellAlignCenter", "selectable cellAlignCenter", "selectable cellAlignCenter" ],
					cellMethods: [ "indexCounter", [ "photo1", "thumbnail" ],
						["property_name", "lessee_name"], [ "address", "city", "state" ],
						[ "lease_start", "term" ],
						"yard_sf",
						"desc_yard_space",
						"yard_rent",
						"or_tenant",
						"ortypes",
						"other_rent_sf_mo"
					]
				}
			]
			
			var wopener = rbe_engine.getItemForMethod(dataTargets, "target",dataTarget);
			if(wopener==false){
				return false;
			}
			
			var _element = document.getElementById(wopener.idsInput);
			var selectedIds = [];
			if (rbe_engine.checkElement(_element)) {
				var ids = _element.value;
				if (ids != "") {
					if (ids.indexOf(",") != -1) {
						selectedIds = ids.split(",");
					} else {
						selectedIds.push(ids);
					}
				}
			}
			var final_data = [];
			for(var i=0;i<data.length;i++){
				if(selectedIds.indexOf(data[i].id)==-1){
					final_data.push(data[i]);
					selectedIds.push(data[i].id);
				}
			}

			var __element = document.getElementById(wopener.container);
			if (!rbe_engine.checkElement(__element)) {
				console.log("container is missing!");
				return false;
			}
			var _parent = __element.querySelector("tbody");
			var markers = [];
			for (var i = 0; i < final_data.length; i++) {
				var jsonData = final_data[i];
				var trow = rbe_engine.getElementFromNodeTree("tbody #" + jsonData.id, __element, false);
				if (!rbe_engine.checkElement(trow)) {
					var row = document.createElement("tr");
					row.setAttribute("id", jsonData.id);
					row.setAttribute("data-coords", JSON.stringify({
							"lat": jsonData.lat,
							"lng": jsonData.lng
						}));
					var html = "";
					for (var m = 0; m < wopener.cellMethods.length; m++) {
					//for (var m = 0; m < this.options.wopener.cellMethods.length; m++) {
						var cssClass = "selectable";
						if (wopener.cellClasses != undefined) {
							cssClass = wopener.cellClasses[m];
						}
						if (typeof wopener.cellMethods[m] == "string") {
							if (wopener.cellMethods[m] == "photo1") {
								html += "<td><a style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='/cards/comp_images/" + jsonData[wopener.cellMethods[m]] + "'>";
								m++;
								html += "<img src='/cards/comp_images/" + jsonData[wopener.cellMethods[m]] + "' height='32' style='height:32px;'/></a>";
								html += "</td>";
							} else if (wopener.cellMethods[m] == "indexCounter") {	
								var rows = __element.querySelectorAll("tbody >tr");
								html += "<td class='" + cssClass + "'>" + (rows.length + 1) + "</td>";
								if (this.addMarker != undefined) {
									this.addMarker(JSON.stringify({
											index: (rows.length + 1),
											lat: jsonData.lat,
											lng: jsonData.lng,
											mapType: this.options.gridType,
											id: jsonData.id
										}));
								} else {
									if (window[this.options.activeObject].mapController.addMarker != undefined) {
										window[this.options.activeObject].mapController.addMarker(JSON.stringify({
												index: (rows.length + 1),
												lat: jsonData.lat,
												lng: jsonData.lng,
												mapType: this.options.gridType,
												id: jsonData.id
											}));
									}
								}
							} else {
								html += "<td class='" + cssClass + "'>" + jsonData[wopener.cellMethods[m]] + "</td>";
							}
						} else {
							if (wopener.cellMethods[m][0] == "photo1") {
								html += "<td data-type='thumb' ><a style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='/cards/comp_images/" + jsonData[wopener.cellMethods[m][0]] + "'>";
								html += "<img src='/cards/comp_images/" + jsonData[wopener.cellMethods[m][1]] + "' height='32' style='height:32px;'/></a></td>";
							} else {
								var cmethods = [];
								for (var n = 0; n < wopener.cellMethods[m].length; n++) {
									cmethods.push(jsonData[wopener.cellMethods[m][n]]);
								}
								html += "<td class='" + cssClass + "'>" + cmethods.join("<br/>") + "</td>";
							}
						}
					}
					row.innerHTML = html;
					_parent.appendChild(row);
				} else {
					if (selectedIds.indexOf(jsonData.id.toString()) == -1) {
						console.log(trow);
						_parent.removeChild(trow);
						if (this.removeMarker != undefined) {
							this.removeMarker(JSON.stringify({
									index: 0,
									lat: jsonData.lat,
									lng: jsonData.lng,
									mapType: this.options.gridType,
									id: jsonData.id
								}));
						} else {
							if (window[this.options.activeObject].mapController.removeMarker != undefined) {
								window[this.options.activeObject].mapController.removeMarker(JSON.stringify({
										index: 0,
										lat: jsonData.lat,
										lng: jsonData.lng,
										mapType: this.options.gridType,
										id: jsonData.id
									}));
							}
						}
					}
				}
			}
			var __element = document.getElementById(wopener.idsInput);
			//var __element = window.opener.document.getElementById(this.options.wopener.idsInput);
			if (!rbe_engine.checkElement(__element)) {
				console.log("window opener ids input is missing!");
				return false;
			}
			__element.value = selectedIds.join(",");
			this.assignSelectRowsEvents();
			
        },
		closeAllCopyModals:function(){
			$('#copyModal').modal('hide');
		},
		copyType: function (_element) {
            var sids = [];
            var ielement = this.data.selectedElement;
            var options = this.getActionType(ielement);
            var type = ielement.getAttribute("data-type");
            var rows = document.querySelectorAll("#" + type + "_table tbody >tr");
            for (var i = 0; i < rows.length; i++) {
                if (rows[i].hasAttribute("data-selected")) {
                    var _rowElement = rows[i];
                    sids.push(_rowElement.id);
                }
            }
			var _controller = this;
			var dataTarget = ielement.getAttribute("data-target");
			//
			//return false;
            $.ajax({
                url: "../" + this.options.ajaxURL,
                type: "post",
                dataType: "json",
                data: {
					"target":dataTarget,
                    "type": type,
                    "move_comps": true,
                    "reportID": this.options.id,
                    "sourceIDs": sids.join(","),
                },
                beforeSend: function () {
                    var _element = document.querySelector("#copyModal .modal-body");
                    if (rbe_engine.checkElement(_element)) {
                        var __element = document.createElement("img");
                        __element.setAttribute("src", "../img/loader.gif");
                        __element.setAttribute("id", "cloneloader");
                        _element.appendChild(__element);
                    }
                    var _element = document.querySelector("#copyModal .modal-body p");
                    if (rbe_engine.checkElement(_element)) {
                        var html = "Copied complete succesfuly";
						_element.innerHTML = html;
                    }
                    var _element = document.querySelector("#copyModal .modal-footer ._proceed");
                    if (rbe_engine.checkElement(_element)) {
                        _element.style.display = "none";
                    }
                },
                success: function (retJson) {
                    var _element = document.querySelector("#copyModal #cloneloader");
                    if (rbe_engine.checkElement(_element)) {
                        _element.parentNode.removeChild(_element);
                    }
                    var _element = document.querySelector("#copyModal .modal-body p");
                    if (rbe_engine.checkElement(_element)) {
                        _element.style.display = "block";
                        if (retJson.status == 'error') {
                            _element.innerHTML = "An error has occured: " + retJson.data;
                        } else {
                            _element.innerHTML = "Copy completed succesfully";
							
							var _element = document.querySelector("#copyModal .modal-footer .btn-secondary");
							if (rbe_engine.checkElement(_element)) {
								_element.setAttribute("onClick",_controller.options.activeObject+".closeAllCopyModals(this);");
							}
							_controller.addSelectedLines(retJson.data,dataTarget);
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    _controller.showErrorMessage("An error occured.");
                    var _element = document.querySelector("#copyModal #cloneloader");
                    if (rbe_engine.checkElement(_element)) {
                        _element.parentNode.removeChild(_element);
                    }
                }
            });

        },
		showCopyConfirmation: function (_element) {
			this.data.selectedElement = _element;
            var _element = document.querySelector("#copyModal .modal-body p");
            if (rbe_engine.checkElement(_element)) {
                _element.style.display = "block";
            }
			var _element = document.querySelector("#copyModal .modal-footer ._proceed");
            if (rbe_engine.checkElement(_element)) {
                _element.style.display = "block";
            }
			var html = "Click Proceed to move the selected comps. This action cannot be undone!";
            var _element = document.querySelector("#copyModal .modal-body p");
            if (!rbe_engine.checkElement(_element)) {
                return false;
            }
            _element.innerHTML = html;
            $('#copyModal').modal('show');
        },
		closeCloneModal: function(_element){
			$('#cloneModal').modal('hide');
		},
		closeAllCloneModals: function(_element){
			$('#cloneCompsModal').modal('hide');
			
			var _element = document.querySelector("#cloneModal .modal-footer .btn-secondary");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onClick",this.options.activeObject+".closeCloneModal(this);");
			}
			$('#cloneModal').modal('hide');
		},
        cloneType: function (_element) {
            var _elements = document.querySelectorAll("#cloneCompsModal ._results_reports input[type=checkbox]:checked");
            var ids = [];
            for (var i = 0; i < _elements.length; i++) {
                ids.push(_elements[i].getAttribute("data-value"));
            }
            var sids = [];
            var ielement = this.data.selectedElement;
            var options = this.getActionType(ielement);
            var type = ielement.getAttribute("data-type");
            var rows = document.querySelectorAll("#" + type + "_table tbody >tr");
            for (var i = 0; i < rows.length; i++) {
                if (rows[i].hasAttribute("data-selected")) {
                    var _rowElement = rows[i];
                    sids.push(_rowElement.id);
                }
            }
			var _controller = this;
            $.ajax({
                url: "../" + this.options.ajaxURL,
                type: "post",
                dataType: "json",
                data: {
                    "type": type,
                    "clone_toreports": true,
                    "reportIDs": ids,
                    "sourceIDs": sids.join(","),
                },
                beforeSend: function () {
                    var _element = document.querySelector("#cloneModal .modal-body");
                    if (rbe_engine.checkElement(_element)) {
                        var __element = document.createElement("img");
                        __element.setAttribute("src", "../img/loader.gif");
                        __element.setAttribute("id", "cloneloader");
                        _element.appendChild(__element);
                    }
                    var _element = document.querySelector("#cloneModal .modal-body p");
                    if (rbe_engine.checkElement(_element)) {
                        _element.style.display = "none";
                    }
                    var _element = document.querySelector("#cloneModal .modal-footer ._proceed");
                    if (rbe_engine.checkElement(_element)) {
                        _element.style.display = "none";
                    }
                },
                success: function (retJson) {
                    var _element = document.querySelector("#cloneModal #cloneloader");
                    if (rbe_engine.checkElement(_element)) {
                        _element.parentNode.removeChild(_element);
                    }
                    var _element = document.querySelector("#cloneModal .modal-body p");
                    if (rbe_engine.checkElement(_element)) {
                        _element.style.display = "block";
                        if (retJson.status == 'error') {
                            _element.innerHTML = "An error has occured: " + retJson.data;
                        } else {
                            _element.innerHTML = "Update completed succesfully";
							
							var _element = document.querySelector("#cloneModal .modal-footer .btn-secondary");
							if (rbe_engine.checkElement(_element)) {
								_element.setAttribute("onClick",_controller.options.activeObject+".closeAllCloneModals(this);");
							}
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    _controller.showErrorMessage("An error occured.");
                    var _element = document.querySelector("#cloneModal #cloneloader");
                    if (rbe_engine.checkElement(_element)) {
                        _element.parentNode.removeChild(_element);
                    }
                }
            });
            console.log(_elements);
        },
        showCloneConfirmation: function (_element) {
            var _element = document.querySelector("#cloneModal #cloneloader");
            if (rbe_engine.checkElement(_element)) {
                _element.parentNode.removeChild(_element);
            }
            var _element = document.querySelector("#cloneModal .modal-footer ._proceed");
            if (rbe_engine.checkElement(_element)) {
                _element.style.display = "block";
            }
            var _element = document.querySelector("#cloneModal .modal-body p");
            if (rbe_engine.checkElement(_element)) {
                _element.style.display = "block";
            }
            var _elements = document.querySelectorAll("#cloneCompsModal ._results_reports input[type=checkbox]:checked");
            var html = "You must select at least one report to proceed.";
            if (_elements.length > 0) {
                html = "Click Proceed to add the selected comps into the reports. This action cannot be undone!";
                var _element = document.querySelector("#cloneModal .modal-footer ._proceed");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "block";
                }
            } else {
                var _element = document.querySelector("#cloneModal .modal-footer ._proceed");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "none";
                }
            }
            var _element = document.querySelector("#cloneModal .modal-body p");
            if (!rbe_engine.checkElement(_element)) {
                return false;
            }
            _element.innerHTML = html;
            $('#cloneModal').modal('show');
        },
        searchReports: function (_element) {
            var _element = document.querySelector("#cloneCompsModal ._rep-name");
            if (!rbe_engine.checkElement(_element)) {
                return false;
            }
			var reportTypeID = 1;
			/*switch(this.data.selectedCompType){
				case "improved_sales":
					reportTypeID = 2;
				break;
				case "improved_sales":
					reportTypeID = 2;
				break;
			}*/
            var _controller = this;
            var value = _element.value.trim();
            $.ajax({
                url: "../" + this.options.ajaxDataSourceURL,
                type: "post",
                dataType: "json",
                data: {
                    "func": "getReportsForCopy",
                    "reportTypeID": 1,
                    "reportName": value,
                },
                beforeSend: function () {
                    var _element = document.querySelector("#cloneCompsModal ._results_reports");
                    if (rbe_engine.checkElement(_element)) {
                        var __element = document.createElement("img");
                        __element.setAttribute("src", "../img/loader.gif");
                        __element.setAttribute("id", "cloneloader");
                        _element.appendChild(__element);
                    }
                },
                success: function (retJson) {
                    var _element = document.querySelector("#cloneCompsModal #cloneloader");
                    if (rbe_engine.checkElement(_element)) {
                        _element.parentNode.removeChild(_element);
                    }
                    if (retJson.status == 'ok') {
                        if (retJson.data.length == 0) {
                            _controller.showErrorMessage("No results found");
                            return false;
                        }
                    }
                    var p_element = document.querySelector("#cloneCompsModal ._results_reports");
                    if (!rbe_engine.checkElement(p_element)) {
                        return false;
                    }
                    p_element.innerHTML = "";
                    var t_element = document.createElement("table");
                    t_element.setAttribute("class", "table");
                    var r_element = document.createElement("tr");
                    var d_element = document.createElement("th");
                    r_element.appendChild(d_element);
                    i_element = document.createTextNode("Report");
                    d_element = document.createElement("th");
                    d_element.appendChild(i_element);
                    r_element.appendChild(d_element);
                    i_element = document.createTextNode("Property");
                    d_element = document.createElement("th");
                    d_element.appendChild(i_element);
                    r_element.appendChild(d_element);
                    i_element = document.createTextNode("Address");
                    d_element = document.createElement("th");
                    d_element.appendChild(i_element);
                    r_element.appendChild(d_element);
                    t_element.appendChild(r_element);
                    for (var r = 0; r < retJson.data.length; r++) {
						if(_controller.options.id!=retJson.data[r].id){
							var r_element = document.createElement("tr");
							var i_element = document.createElement("input");
							i_element.setAttribute("type", "checkbox");
							i_element.setAttribute("data-value", retJson.data[r].id);
							var d_element = document.createElement("td");
							d_element.appendChild(i_element);
							r_element.appendChild(d_element);
							i_element = document.createTextNode(retJson.data[r].reportname);
							d_element = document.createElement("td");
							d_element.appendChild(i_element);
							r_element.appendChild(d_element);
							i_element = document.createTextNode(retJson.data[r].property_name);
							d_element = document.createElement("td");
							d_element.appendChild(i_element);
							r_element.appendChild(d_element);
							i_element = document.createTextNode(retJson.data[r].address);
							d_element = document.createElement("td");
							d_element.appendChild(i_element);
							r_element.appendChild(d_element);
							t_element.appendChild(r_element);
						}
                        
                    }
                    p_element.appendChild(t_element);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    _controller.showErrorMessage("An error occured.");
                    var _element = document.querySelector("#cloneCompsModal #cloneloader");
                    if (rbe_engine.checkElement(_element)) {
                        _element.parentNode.removeChild(_element);
                    }
                }
            });
        },
        showCloneCompsModal: function (_element) {
			this.data.selectedCompType = _element.getAttribute("data-type");
            this.data.selectedElement = _element;
            var _element = document.querySelector("#cloneCompsModal ._rep-name");
            if (!rbe_engine.checkElement(_element)) {
                return false;
            }
            _element.value = "";
            var p_element = document.querySelector("#cloneCompsModal ._results_reports");
            if (rbe_engine.checkElement(p_element)) {
                p_element.innerHTML = "";
            }
            $('#cloneCompsModal').modal('show');
        },
        showMoveLandCompsModal_Deprecated: function (_element) {
            var data = [];
            var t_elements = document.querySelectorAll("#land-sales table tr [data-property='property_name,address']");
            for (var i = 0; i < t_elements.length; i++) {
                if (t_elements[i].childNodes.length > 0) {
                    var entry = {
                        property_name: "",
                        address: "",
                    }
                    if (t_elements[i].childNodes[0].nodeType == 3) {
                        entry.property_name = t_elements[i].childNodes[0].nodeValue.replace("\n", "").replace("\r", "").trim();
                    } else {
                        if (t_elements[i].childNodes[1].nodeType == 3) {
                            entry.address = t_elements[i].childNodes[1].nodeValue.replace("\n", "").replace("\r", "").trim();
                        }
                    }
                    if (t_elements[i].childNodes[2] != undefined) {
                        if (t_elements[i].childNodes[2].nodeType == 3) {
                            entry.address = t_elements[i].childNodes[2].nodeValue.replace("\n", "").replace("\r", "").trim();
                        }
                    }
                    data.push(entry);
                }
            }
            var t_element = document.createElement("table");
            t_element.setAttribute("class", "table");
            for (var r = 0; r < data.length; r++) {
                var r_element = document.createElement("tr");
                var i_element = document.createElement("input");
                i_element.setAttribute("type", "checkbox");
                var d_element = document.createElement("td");
                d_element.appendChild(i_element);
                r_element.appendChild(d_element);
                i_element = document.createTextNode(data[r].property_name);
                d_element = document.createElement("td");
                d_element.appendChild(i_element);
                r_element.appendChild(d_element);
                i_element = document.createTextNode(data[r].address);
                d_element = document.createElement("td");
                d_element.appendChild(i_element);
                r_element.appendChild(d_element);
                t_element.appendChild(r_element);
            }
            var p_element = document.querySelector("#cloneCompsModal .modal-body");
            if (rbe_engine.checkElement(p_element)) {
                p_element.appendChild(t_element);
            }
            $('#cloneCompsModal').modal('show');
        },
        sortPics: function () {
            var _elements = document.querySelectorAll("#galleryContainer .galleryItem");
            var ids = [];
            for (var i = 0; i < _elements.length; i++) {
                var img_element = _elements[i].querySelector("a img");
                var img = img_element.src.split("/");
                ids.push(img[img.length - 1]);
            }
            _element = document.getElementById("picorder");
            _element.value = ids.join(",");
            var _element = document.getElementById("galleryContainer");
            for (var c = 0; c < _element.children.length; c++) {
                ePosX = _element.children[c].clientLeft + _element.children[c].offsetLeft;
                ePosY = _element.children[c].clientTop + _element.children[c].offsetTop;
                console.log("eposX=" + ePosX + ", width=" + (ePosX + _element.children[c].offsetWidth) + ", eposY=" + ePosY + ", height=" + (ePosY + _element.children[c].offsetHeight));
            }
        },
        prepareChildrenForDrag: function (p_element, index) {
            if (p_element.children.length > 0) {
                for (var i = 0; i < p_element.children.length; i++) {
                    p_element.children[i].setAttribute("drag-index", index);
                    this.prepareChildrenForDrag(p_element.children[i], index);
                }
            }
            return true;
        },
        renderUI: function () {
            var e_elements = document.getElementsByClassName("_editAction");
            for (var i = 0; i < e_elements.length; i++) {
                var type = e_elements[i].getAttribute("data-type");
                if (document.querySelectorAll("#" + type + "_table [data-selected=true]").length == 0) {
                    rbe_engine.addClass(e_elements[i], "disabled");
                } else {
                    rbe_engine.removeClass(e_elements[i], "disabled");
                }
            }
            var e_elements = document.getElementsByClassName("_removeAction");
            for (var i = 0; i < e_elements.length; i++) {
                var type = e_elements[i].getAttribute("data-type");
                if (document.querySelectorAll("#" + type + "_table [data-selected=true]").length == 0) {
                    rbe_engine.addClass(e_elements[i], "disabled");
                } else {
                    rbe_engine.removeClass(e_elements[i], "disabled");
                }
            }
            var e_elements = document.getElementsByClassName("_clonecompsAction");
            for (var i = 0; i < e_elements.length; i++) {
                var type = e_elements[i].getAttribute("data-type");
                if (document.querySelectorAll("#" + type + "_table [data-selected=true]").length == 0) {
                    rbe_engine.addClass(e_elements[i], "disabled");
                } else {
                    rbe_engine.removeClass(e_elements[i], "disabled");
                }
            }
			var e_elements = document.getElementsByClassName("_copycompsAction");
            for (var i = 0; i < e_elements.length; i++) {
                var type = e_elements[i].getAttribute("data-type");
                if (document.querySelectorAll("#" + type + "_table [data-selected=true]").length == 0) {
                    rbe_engine.addClass(e_elements[i], "disabled");
                } else {
                    rbe_engine.removeClass(e_elements[i], "disabled");
                }
            }
            var e_elements = document.getElementsByClassName("_generateReportWordBtnImages");
            for (var i = 0; i < e_elements.length; i++) {
                var type = e_elements[i].getAttribute("data-id");
                if (type) {
                    rbe_engine.removeClass(e_elements[i], "disabled");
                } else {
                    rbe_engine.addClass(e_elements[i], "disabled");
                }
            }
            var e_elements = document.getElementsByClassName("_generateReportWordBtn");
            for (var i = 0; i < e_elements.length; i++) {
                var type = e_elements[i].getAttribute("data-type");
                if (document.querySelectorAll("#" + type + "_table tbody tr").length <= 1) {
                    rbe_engine.addClass(e_elements[i], "disabled");
                } else {
                    rbe_engine.removeClass(e_elements[i], "disabled");
                }
            }
        },
        showGhost: function (type, __element) {
            console.log(type);
            console.log(__element);
        },
/*        changeBG: function (_element) {
            var _elements = document.getElementsByClassName("_bmfield");
            for (var i = 0; i < _elements.length; i++) {
                if (_elements[i].value == "") {
                     _element.style.background = "rgba(116,220,131,0.25)";
                } else {
                    _element.style.background = "#FFFFFF";
                }
            };
        },
        changeBGSeaa: function (_element) {
            if (parseInt(_element.options[_element.selectedIndex].value) == 3) {
                var _element = document.getElementsByClassName("_bmfields3");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.background = "rgba(116,220,131,0.25)";
                }
            } else {
                var _element = document.getElementsByClassName("_bmfields3");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.background = "#FFFFFF";
                }
            }
        },*/
        sumValuesVerticaly: function (_element) {
            var cell = _element.parentNode;
            var row = cell.parentNode;
            var inputs = row.querySelectorAll("td ._sumv");
            var sum = 0;
            for (var i = 0; i < inputs.length; i++) {
                var value = inputs[i].value;
                value = value.replace(/\,|\.|\$/gi, "");
                sum += parseFloat(value);
            }
            var __element = row.querySelector("td ._sumvr");
            __element.value = sum;
            this.getNumberFormat(__element, sum);
            var _element = document.getElementById("assessed_table");
            if (rbe_engine.checkElement(_element)) {
                var rows = _element.querySelectorAll("tbody tr");
                var cells = rows[0].querySelectorAll("td ._sum");
                for (var i = 0; i < cells.length; i++) {
                    this.sumValues(cells[i]);
                }
            }
        },
        sumValues: function (_element) {
            var cell = _element.parentNode;
            var row = cell.parentNode;
            var cells = row.querySelectorAll("td");
            var cIndex = 0;
            for (var i = 0; i < cells.length; i++) {
                if (cells[i] == cell) {
                    cIndex = i;
                }
            }
            var table = row.parentNode;
            var rows = table.querySelectorAll("tr");
            var sum = 0;
            for (var i = 0; i < rows.length - 1; i++) {
                var value = rows[i].querySelectorAll("td")[cIndex].querySelectorAll("input")[0].value;
                value = value.replace(/\,|\$/gi, "");
                sum += parseFloat(value);
            }
            var __element = rows[rows.length - 1].children[cIndex].querySelectorAll("input")[0];
            __element.value = sum;
            this.getNumberFormat(__element, sum);
        },
        getNumberFormat: function (_element, value) {
            var classes = _element.getAttribute("class").split(" ");
            var format = classes[classes.length - 1];
            var result = "";
            if (format.charAt(0) == "_") {
                format = format.substr(1);
            }
            if (format.charAt(0) == "c") {
                result = '$ ';
                format = format.substr(1);
            }
            var digits = parseInt(format.charAt(2));
            var presicion = parseInt(format.charAt(3));
            var showCommas = format.charAt(4);
            if (showCommas == "t") {
                showCommas = true;
            } else {
                showCommas = false;
            }
            if (format.charAt(0) == "f" && format.charAt(1) == "m") {}
            result += aa_engine.formatNumber(value, digits, presicion, showCommas);
            if (format.charAt(5) == "p") {
                result += ' %';
            }
            if (format.charAt(5) == "r") {
                result += ' to 1';
            }
            _element.value = result;
            return result;
        },
        generateAppraisarReport: function (_element) {
            var showPreview = 0;
            var ids = "";
            var ids = aa_engine.getUrlVars()["id"];
            var appid = _element.parentNode.parentNode.getAttribute("id");
            var url = "../templates/libtemplates/qualifications.php?id=" + ids + "&app=" + appid + "&showPreview=0";
            window.location = url;
            console.log(url);
        },
        deleteAssessed: function (_element) {
            _element.parentNode.parentNode.parentNode.removeChild(_element.parentNode.parentNode);
            var _element = document.getElementById("assessed_table");
            if (rbe_engine.checkElement(_element)) {
                var rows = _element.querySelectorAll("tbody tr");
                var cells = rows[0].querySelectorAll("td ._sum");
                for (var i = 0; i < cells.length; i++) {
                    this.sumValues(cells[i]);
                }
            }
        },
        togglePT: function () {
            var _ProType = document.getElementById("selectPropertType");
            if (!rbe_engine.checkElement(_ProType)) {
                return false;
            }
            var _subProType = document.getElementById("selectSubPropertType");
            if (!rbe_engine.checkElement(_subProType)) {
                return false;
            }
            if (_subProType.options.length > 0) {
                var _showpttab = document.getElementById("proptypeTab");
                if (rbe_engine.checkElement(_showpttab)) {
                    if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 6 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 60 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 61 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 62 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 63 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 64 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 65 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 66 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 67 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 68 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 69 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 70 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 71 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 72 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 73 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 74 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 75 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 76 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 77 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 78 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 79 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 80 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 81 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 82 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 83 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 84 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 86 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 87 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 88 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 89 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 90 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 91 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 92 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 93 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 106 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 107 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 113 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 133 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 11 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 12 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 13 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 14 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 15 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 16 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 17 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 18 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 55 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 56 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 35 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 36 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 34 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 49 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 50 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 51 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 54 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 44 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 45 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 46 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 47 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 85 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 222 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 223) {
                        _showpttab.style.display = "block";
                    } else {
                        _showpttab.style.display = "none";
                    }
                }
                var _industrial = document.querySelectorAll(".PDIndustrial");
                if (rbe_engine.checkElement(_industrial)) {
                    for (var i = 0; i < _industrial.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 60 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 61 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 62 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 63 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 64 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 65 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 66 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 67 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 68 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 69 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 70 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 71 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 72 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 73 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 74 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 75 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 76 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 77 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 78 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 79 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 80 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 81 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 82 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 83 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 84 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 86 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 87 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 88 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 89 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 90 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 91 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 92 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 93 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 106 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 107 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 113 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 222 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 223) {
                            _industrial[i].style.display = "flex";
                        } else {
                            _industrial[i].style.display = "none";
                        }
                    }
                }
                var _sfres = document.querySelectorAll("._sfres");
                if (rbe_engine.checkElement(_sfres)) {
                    for (var i = 0; i < _sfres.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 127) {
                            _sfres[i].style.display = "flex";
                        } else {
                            _sfres[i].style.display = "none";
                        }
                    }
                }
                var _sergas = document.querySelectorAll("._sergas");
                if (rbe_engine.checkElement(_sergas)) {
                    for (var i = 0; i < _sergas.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 55) {
                            _sergas[i].style.display = "block";
                        } else {
                            _sergas[i].style.display = "none";
                        }
                    }
                }
                var _shopping = document.querySelectorAll(".PDShopping");
                if (rbe_engine.checkElement(_shopping)) {
                    for (var i = 0; i < _shopping.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 11 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 12 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 13 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 14 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 15 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 16 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 17 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 18) {
                            _shopping[i].style.display = "flex";
                        } else {
                            _shopping[i].style.display = "none";
                        }
                    }
                }
                var _gasstation = document.querySelectorAll(".PDCstore");
                if (rbe_engine.checkElement(_gasstation)) {
                    for (var i = 0; i < _gasstation.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 55 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 56) {
                            _gasstation[i].style.display = "flex";
                        } else {
                            _gasstation[i].style.display = "none";
                        }
                    }
                }
                var _resturant = document.querySelectorAll(".PDFood");
                if (rbe_engine.checkElement(_resturant)) {
                    for (var i = 0; i < _resturant.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 35 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 36 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 34) {
                            _resturant[i].style.display = "flex";
                        } else {
                            _resturant[i].style.display = "none";
                        }
                    }
                }
                var _vehicle = document.querySelectorAll(".PDService");
                if (rbe_engine.checkElement(_vehicle)) {
                    for (var i = 0; i < _vehicle.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 49 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 50 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 51 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 54 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 44 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 45 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 46 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 47) {
                            _vehicle[i].style.display = "flex";
                        } else {
                            _vehicle[i].style.display = "none";
                        }
                    }
                }
                var _ministore = document.querySelectorAll(".PDMini");
                if (rbe_engine.checkElement(_ministore)) {
                    for (var i = 0; i < _ministore.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 85) {
                            _ministore[i].style.display = "flex";
                        } else {
                            _ministore[i].style.display = "none";
                        }
                    }
                }
                var _mobhp = document.querySelectorAll(".PDMHP");
                if (rbe_engine.checkElement(_mobhp)) {
                    for (var i = 0; i < _mobhp.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 133) {
                            _mobhp[i].style.display = "flex";
                        } else {
                            _mobhp[i].style.display = "none";
                        }
                    }
                }
                var _sbortun = document.querySelectorAll("._nosbtun");
                if (rbe_engine.checkElement(_sbortun)) {
                    for (var i = 0; i < _sbortun.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 49 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 50 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 51 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 54) {
                            _sbortun[i].style.display = "block";
                        } else {
                            _sbortun[i].style.display = "none";
                        }
                    }
                }
            } else {
                var _showpttab = document.getElementById("proptypeTab");
                if (rbe_engine.checkElement(_showpttab)) {
                    _showpttab.style.display = "none";
                }
                var _industrial = document.querySelectorAll(".PDIndustrial");
                if (rbe_engine.checkElement(_industrial)) {
                    for (var i = 0; i < _industrial.length; i++) {
                        _industrial[i].style.display = "none";
                    }
                }
                var _sergas = document.querySelectorAll("._sergas");
                if (rbe_engine.checkElement(_sergas)) {
                    for (var i = 0; i < _sergas.length; i++) {
                        _sergas[i].style.display = "none";
                    }
                }
                var _sfres = document.querySelectorAll("._sfres");
                if (rbe_engine.checkElement(_sfres)) {
                    for (var i = 0; i < _sfres.length; i++) {
                        _sfres[i].style.display = "none";
                    }
                }
                var _shopping = document.querySelectorAll(".PDShopping");
                if (rbe_engine.checkElement(_shopping)) {
                    for (var i = 0; i < _shopping.length; i++) {
                        _shopping[i].style.display = "none";
                    }
                }
                var _gasstation = document.querySelectorAll(".PDCstore");
                if (rbe_engine.checkElement(_gasstation)) {
                    for (var i = 0; i < _gasstation.length; i++) {
                        _gasstation[i].style.display = "none";
                    }
                }
                var _resturant = document.querySelectorAll(".PDFood");
                if (rbe_engine.checkElement(_resturant)) {
                    for (var i = 0; i < _resturant.length; i++) {
                        _resturant[i].style.display = "none";
                    }
                }
                var _vehicle = document.querySelectorAll(".PDService");
                if (rbe_engine.checkElement(_vehicle)) {
                    for (var i = 0; i < _vehicle.length; i++) {
                        _vehicle[i].style.display = "none";
                    }
                }
                var _ministore = document.querySelectorAll(".PDMini");
                if (rbe_engine.checkElement(_ministore)) {
                    for (var i = 0; i < _ministore.length; i++) {
                        _ministore[i].style.display = "none";
                    }
                }
                var _mobhp = document.querySelectorAll(".PDMHP");
                if (rbe_engine.checkElement(_mobhp)) {
                    for (var i = 0; i < _mobhp.length; i++) {
                        _mobhp[i].style.display = "none";
                    }
                }
                var _sbortun = document.querySelectorAll("._nosbtun");
                if (rbe_engine.checkElement(_sbortun)) {
                    for (var i = 0; i < _sbortun.length; i++) {
                        _sbortun[i].style.display = "none";
                    }
                }
            }
            var _office = document.querySelectorAll(".PDOffice");
            if (rbe_engine.checkElement(_office)) {
                for (var i = 0; i < _office.length; i++) {
                    if (parseInt(_ProType.options[_ProType.selectedIndex].value) == '6') {
                        _office[i].style.display = "flex";
                    } else {
                        _office[i].style.display = "none";
                    }
                }
            }
            return true;
        },
        renderMap: function (_element) {
            var type = _element.getAttribute("type");
            window.open("renderMap.php", "Map");
        },
        removeBoxFile: function (_element) {
            var l_elements = _element.parentNode.parentNode.parentNode.parentNode.querySelectorAll("a");
            if (rbe_engine.checkElement(l_elements)) {
                l_elements[0].style.display = "none";
            }
            var l_element = _element.parentNode.parentNode.parentNode.parentNode.querySelector('input[name="boxurl"]');
            if (rbe_engine.checkElement(l_element)) {
                l_element.type = "text";
            }
            _element.style.display = "none";
        },
        toggleEmDomain: function () {
            var _emDomType = document.getElementById("purpose_of_appraisal");
            if (!rbe_engine.checkElement(_emDomType)) {
                return false;
            }
            if (_emDomType.options.length > 0) {
                var _showedtab = document.getElementById("emdomtab");
                if (rbe_engine.checkElement(_showedtab)) {
                    if (parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 453 || parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 454) {
                        _showedtab.style.display = "block";
                    } else {
                        _showedtab.style.display = "none";
                    }
                }
                var _LandEDWordwriteup = document.getElementById("LandEDWordwriteup");
                if (rbe_engine.checkElement(_LandEDWordwriteup)) {
                    if (parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 453 || parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 454) {
                        _LandEDWordwriteup.style.display = "flex";
                    } else {
                        _LandEDWordwriteup.style.display = "none";
                    }
                }
                var _LandWordwriteup = document.getElementById("LandWordwriteup");
                if (rbe_engine.checkElement(_LandWordwriteup)) {
                    if (parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 453 || parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 454) {
                        _LandWordwriteup.style.display = "none";
                    } else {
                        _LandWordwriteup.style.display = "flex";
                    }
                }
                var _ImpWordwriteup = document.getElementById("ImpWordwriteup");
                if (rbe_engine.checkElement(_ImpWordwriteup)) {
                    if (parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 453 || parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 454) {
                        _ImpWordwriteup.style.display = "none";
                    } else {
                        _ImpWordwriteup.style.display = "flex";
                    }
                }
                var _ImpEDWordwriteup = document.getElementById("ImpEDWordwriteup");
                if (rbe_engine.checkElement(_ImpEDWordwriteup)) {
                    if (parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 453 || parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 454) {
                        _ImpEDWordwriteup.style.display = "flex";
                    } else {
                        _ImpEDWordwriteup.style.display = "none";
                    }
                }
                var _RentWordwriteup = document.getElementById("RentWordwriteup");
                if (rbe_engine.checkElement(_RentWordwriteup)) {
                    if (parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 453 || parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 454) {
                        _RentWordwriteup.style.display = "none";
                    } else {
                        _RentWordwriteup.style.display = "flex";
                    }
                }
                var _RentEDWordwriteup = document.getElementById("RentEDWordwriteup");
                if (rbe_engine.checkElement(_RentEDWordwriteup)) {
                    if (parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 453 || parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 454) {
                        _RentEDWordwriteup.style.display = "flex";
                    } else {
                        _RentEDWordwriteup.style.display = "none";
                    }
                }
                var _emdinspDate = document.getElementById("edinspDate");
                if (rbe_engine.checkElement(_emdinspDate)) {
                    if (parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 453 || parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 454) {
                        _emdinspDate.style.display = "none";
                    } else {
                        _emdinspDate.style.display = "flex";
                    }
                }
                var _emdborrower = document.getElementById("borrower");
                if (rbe_engine.checkElement(_emdborrower)) {
                    if (parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 453 || parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 454) {
                        _emdborrower.style.display = "none";
                    } else {
                        _emdborrower.style.display = "flex";
                    }
                }
                var _reviewpurp = document.querySelectorAll(".edreviewpurp");
                if (rbe_engine.checkElement(_reviewpurp)) {
                    for (var i = 0; i < _reviewpurp.length; i++) {
                        if (parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 454) {
                            _reviewpurp[i].style.display = "flex";
                        } else {
                            _reviewpurp[i].style.display = "none";
                        }
                    }
                }
                var _apppurp = document.querySelectorAll(".edapppurp");
                if (rbe_engine.checkElement(_apppurp)) {
                    for (var i = 0; i < _apppurp.length; i++) {
                        if (parseInt(_emDomType.options[_emDomType.selectedIndex].value) == 453) {
                            _apppurp[i].style.display = "flex";
                        } else {
                            _apppurp[i].style.display = "none";
                        }
                    }
                }
            } else {
                var _showedtab = document.getElementById("emdomtab");
                if (rbe_engine.checkElement(_showedtab)) {
                    _showedtab.style.display = "none";
                }
                var _reviewpurp = document.querySelectorAll(".edreviewpurp");
                if (rbe_engine.checkElement(_reviewpurp)) {
                    for (var i = 0; i < _reviewpurp.length; i++) {
                        _reviewpurp[i].style.display = "none";
                    }
                }
                var _apppurp = document.querySelectorAll(".edapppurp");
                if (rbe_engine.checkElement(_apppurp)) {
                    for (var i = 0; i < _apppurp.length; i++) {
                        _apppurp[i].style.display = "none";
                    }
                }
            }
        },
        toggleAsIs: function (_element) {
            var _elements = document.querySelectorAll("._asisvp");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
                }
            }
        },
        toggleProsStab: function (_element) {
            var _elements = document.querySelectorAll("._prostabvp");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
                }
            }
        },
        toggleProsComp: function (_element) {
            var _elements = document.querySelectorAll("._procompvp");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
                }
            }
        },
        toggleRetro: function (_element) {
            var _elements = document.querySelectorAll("._retrovp");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
                }
            }
        },
        togglesaLibrary: function (_element) {
            var _elements = document.querySelectorAll("._sa_Library");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].style.display = "flex";
                } else {
                    _elements[i].style.display = "none";
                }
            }
        },
        toggleiaLibrary: function (_element) {
            var _elements = document.querySelectorAll("._ia_Library");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].style.display = "flex";
                } else {
                    _elements[i].style.display = "none";
                }
            }
        },
        togglecaLibrary: function (_element) {
            var _elements = document.querySelectorAll("._ca_Library");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].style.display = "flex";
                } else {
                    _elements[i].style.display = "none";
                }
            }
        },
        togglemvLibrary: function (_element) {
            var _elements = document.querySelectorAll("._mv_Library");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].style.display = "flex";
                } else {
                    _elements[i].style.display = "none";
                }
            }
        },
        togglelvLibrary: function (_element) {
            var _elements = document.querySelectorAll("._lv_Library");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].style.display = "flex";
                } else {
                    _elements[i].style.display = "none";
                }
            }
        },
        generateDataAnalysis: function (_element) {
            var showPreview = 1;
            if (_element.hasAttribute("data-spreview")) {
                showPreview = _element.getAttribute("data-spreview");
            }
            var type = false;
            if (_element.hasAttribute("data-ttype")) {
                type = _element.getAttribute("data-ttype");
            }
            var path = "";
            var ids = "";
            var template = "";
            if (_element.hasAttribute("data-id")) {
                ids = _element.getAttribute("data-id");
            }
            if (ids.length == 0) {
                alert("Please make selection!");
                return false;
            }
            switch (type) {
            case "improved-sales":
                var templateElement = document.getElementById("_daTemplate");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "improved_sales";
                break;
            case "land-sales":
                var templateElement = document.getElementById("_dalTemplate");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "land_sale";
                break;
            case "leases":
                var templateElement = document.getElementById("_darTemplate");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "leases";
                break;
            case "xtrarents":
                var templateElement = document.getElementById("_adddarTemplate");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "leases";
                break;
            case "impemdomw":
                var templateElement = document.getElementById("_impemdomw");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "rowtemps";
                break;
            case "landemdomw":
                var templateElement = document.getElementById("_landemdomw");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "rowtemps";
                break;
            case "rentemdomw":
                var templateElement = document.getElementById("_rentemdomw");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "rowtemps";
                break;
            }
            if (type !== false) {
                var url = "../templates/" + path + "/" + template + "?id=" + ids + "&showPreview=" + showPreview;
                if (parseInt(showPreview)) {
                    window.open(url, "Ratting", "width=720,height=700,0,status=0");
                } else {
                    window.location = url;
                }
            } else {
                console.log("ERROR WITH TYPE!");
            }
        },
        GetOnephotoTemp: function (_element) {
            var ids = document.getElementById("reportID").value;
            console.log(_element);
            var path = "libtemplates";
            var ids = document.getElementById("reportID").value;
            var template = "imgTempsing.php";
            if (ids.length == 0) {
                alert("Please save your report prior to generating templates.");
                return false;
            }
            var url = "../templates/" + path + "/" + template + "?id=" + ids;
            window.location = url;
            console.log("url" + url);
        },
        GetTwophotoTemp: function (_element) {
            var ids = document.getElementById("reportID").value;
            console.log(_element);
            var path = "libtemplates";
            var ids = document.getElementById("reportID").value;
            var template = "imgTemptwo.php";
            if (ids.length == 0) {
                alert("Please save your report prior to generating templates.");
                return false;
            }
            var url = "../templates/" + path + "/" + template + "?id=" + ids;
            window.location = url;
            console.log("url" + url);
        },
        generateReportExcel: function (_element) {
            var type = false;
            if (_element.hasAttribute("data-ttype")) {
                type = _element.getAttribute("data-ttype");
            }
            var path = "";
            var template = "";
            var ids = "";
			// Added as test code
			var reportid = "";
            var url = [];
            switch (type) {
            case "income_approach":
                var ids = document.getElementById("reportID").value;
                if (ids.length == 0) {
                    alert("Please save your report prior to generating templates.");
                    return false;
                }
                var reportid = document.getElementById("reportID");
                if (rbe_engine.checkElement(reportid)) {
                    url.push("reportid=" + reportid.value);
                }
                var templateElement = document.getElementById("_ia_temp_libExcel");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "ialibrary";
                break;
            case "misc_valuations":
                var ids = document.getElementById("reportID").value;
                if (ids.length == 0) {
                    alert("Please save your report prior to generating templates.");
                    return false;
                }
                var avElement = document.getElementById("_mv_temp_libExcel");
                if (!rbe_engine.checkElement(avElement)) {
                    return false;
                }
                avtable = avElement.options[avElement.selectedIndex].getAttribute("data-tav");
                template = avElement.options[avElement.selectedIndex].getAttribute("data-tpath");
                if (parseInt(avtable)) {
                    var avs = document.getElementById("assessedvalueid").value;
                    if (!rbe_engine.checkElement(avs) || avs.trim() == "") {
                        alert("Please save your report with Assessed Values prior to generating templates.");
                        return false;
                    }
                }
                var reportid = document.getElementById("reportID");
                if (rbe_engine.checkElement(reportid)) {
                    url.push("reportid=" + reportid.value);
                }
//					NEW
                var templateElement = document.getElementById("_mv_temp_libExcel");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "miscvals";
                break;
            case "cost_approach":
                var ids = document.getElementById("reportID").value;
                if (ids.length == 0) {
                    alert("Please save your report prior to generating templates.");
                    return false;
                }
                var avElement = document.getElementById("_ca_temp_libExcel");
                if (!rbe_engine.checkElement(avElement)) {
                    return false;
                }
                avtable = avElement.options[avElement.selectedIndex].getAttribute("data-tav");
                template = avElement.options[avElement.selectedIndex].getAttribute("data-tpath");
                if (parseInt(avtable)) {
                    var avs = document.getElementById("assessedvalueid").value;
                    if (!rbe_engine.checkElement(avs) || avs.trim() == "") {
                        alert("Please save your report with Assessed Values prior to generating templates.");
                        return false;
                    }
                }
                var __element = document.getElementById("property_name");
                if (rbe_engine.checkElement(__element)) {
                    url.push("property_name=" + __element.value);
                }
                var __element = document.getElementById("eff_date_value");
                if (rbe_engine.checkElement(__element)) {
                    url.push("efdatevalue=" + __element.value);
                }
                var __element = document.getElementById("totoffbosfcalc");
                if (rbe_engine.checkElement(__element)) {
                    url.push("offbo=" + __element.value);
                }
                var __element = document.getElementById("glasfcalc");
                if (rbe_engine.checkElement(__element)) {
                    url.push("glasf=" + __element.value);
                }
                var __element = document.getElementById("totalgba");
                if (rbe_engine.checkElement(__element)) {
                    url.push("gba=" + __element.value);
                }
                var __element = document.getElementById("primaryareasf");
                if (rbe_engine.checkElement(__element)) {
                    url.push("primary=" + __element.value);
                }
                var __element = document.getElementById("ind_storage_mezz_sf");
                if (rbe_engine.checkElement(__element)) {
                    url.push("mezzsf=" + __element.value);
                }
                var templateElement = document.getElementById("_ca_temp_libExcel");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "calibrary";
                break;
            case "improved-sales":
                if (_element.hasAttribute("data-id")) {
                    ids = _element.getAttribute("data-id");
                }
                if (ids.length == 0) {
                    alert("Please make selection!");
                    return false;
                }
                var reportid = document.getElementById("reportID");
                if (rbe_engine.checkElement(reportid)) {
                    url.push("reportid=" + reportid.value);
                }
                var templateElement = document.getElementById("_impExcelTemplate");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "impexcel";
                break;
            case "impsalesrow":
                if (_element.hasAttribute("data-id")) {
                    ids = _element.getAttribute("data-id");
                }
                if (ids.length == 0) {
                    alert("Please make selection!");
                    return false;
                }
                var reportid = document.getElementById("reportID");
                if (rbe_engine.checkElement(reportid)) {
                    url.push("reportid=" + reportid.value);
                }
                var templateElement = document.getElementById("_impemdome");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "impexcel";
                break;
            case "land-sales":
                if (_element.hasAttribute("data-id")) {
                    ids = _element.getAttribute("data-id");
                }
                if (ids.length == 0) {
                    alert("Please make selection!");
                    return false;
                }
                var reportid = document.getElementById("reportID");
                if (rbe_engine.checkElement(reportid)) {
                    url.push("reportid=" + reportid.value);
                }
                var templateElement = document.getElementById("_landExcelTemplate");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "landexcel";
                break;
            case "landsalesrow":
                if (_element.hasAttribute("data-id")) {
                    ids = _element.getAttribute("data-id");
                }
                if (ids.length == 0) {
                    alert("Please make selection!");
                    return false;
                }
                var reportid = document.getElementById("reportID");
                if (rbe_engine.checkElement(reportid)) {
                    url.push("reportid=" + reportid.value);
                }
                var templateElement = document.getElementById("_landemdome");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "landexcel";
                break;
            case "leases":
                if (_element.hasAttribute("data-id")) {
                    ids = _element.getAttribute("data-id");
                }
                if (ids.length == 0) {
                    alert("Please make selection!");
                    return false;
                }
                var __element = document.getElementById("reportName");
                if (rbe_engine.checkElement(__element)) {
                    url.push("job=" + __element.value);
                }
                var __element = document.getElementById("eff_date_value");
                if (rbe_engine.checkElement(__element)) {
                    url.push("efdatevalue=" + __element.value);
                }
                var templateElement = document.getElementById("_leaseExcelTemplate");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "leaseexcel";
                break;
            case "xtrarents":
                if (_element.hasAttribute("data-id")) {
                    ids = _element.getAttribute("data-id");
                }
                if (ids.length == 0) {
                    alert("Please make selection!");
                    return false;
                }
                var __element = document.getElementById("reportName");
                if (rbe_engine.checkElement(__element)) {
                    url.push("job=" + __element.value);
                }
                var __element = document.getElementById("eff_date_value");
                if (rbe_engine.checkElement(__element)) {
                    url.push("efdatevalue=" + __element.value);
                }
                var templateElement = document.getElementById("_addleaseExcelTemplate");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "leaseexcel";
                break;
            case "leasserow":
                if (_element.hasAttribute("data-id")) {
                    ids = _element.getAttribute("data-id");
                }
                if (ids.length == 0) {
                    alert("Please make selection!");
                    return false;
                }
                var __element = document.getElementById("reportName");
                if (rbe_engine.checkElement(__element)) {
                    url.push("job=" + __element.value);
                }
                var __element = document.getElementById("eff_date_value");
                if (rbe_engine.checkElement(__element)) {
                    url.push("efdatevalue=" + __element.value);
                }
                var templateElement = document.getElementById("_leaseemdome");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "leaseexcel";
                break;
            }
            if (type !== false) {
                var url = "../templates/" + path + "/" + template + "?id=" + ids + "&" + url.join("&");
                console.log(url);
                window.location = url;
            } else {
                console.log("ERROR WITH TYPE!");
            }
        },
        generateReportWord: function (_element) {
            var showPreview = 1;
            if (_element.hasAttribute("data-spreview")) {
                showPreview = _element.getAttribute("data-spreview");
            }
            var type = false;
            if (_element.hasAttribute("data-ttype")) {
                type = _element.getAttribute("data-ttype");
            }
            var path = "";
            var ids = "";
            var template = "";
            if (_element.hasAttribute("data-id")) {
                ids = _element.getAttribute("data-id");
            }
            if (ids.length == 0) {
                alert("Please make selection!");
                return false;
            }
            switch (type) {
            case "improved-sales":
                var templateElement = document.getElementById("_exportTemplate");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "improved_sales";
                break;
            case "land-sales":
                var templateElement = document.getElementById("_exportlsTemplate");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "land_sale";
                break;
            case "leases":
                var templateElement = document.getElementById("_exportlssTemplate");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "leases";
                break;
            case "xtrarents":
                var templateElement = document.getElementById("_exportaddleaseTemplate");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "leases";
                break;
            case "other_rent":
                var templateElement = document.getElementById("_exportorTemplate");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "leases";
                break;
            case "caprate":
                template = "caprates.php"
                    path = "improved_sales";
                break;
            case "miscrent":
                template = "yardrent.php"
                    path = "leases";
                break;
            }
            if (type !== false) {
                var url = "../templates/" + path + "/" + template + "?id=" + ids + "&showPreview=" + showPreview;
                if (parseInt(showPreview)) {
                    window.open(url, "Ratting", "width=720,height=700,0,status=0");
                } else {
                    window.location = url;
                }
            } else {
                console.log("ERROR WITH TYPE!");
            }
        },
        generateLibraryWord: function (_element) {
            var type = false;
            if (_element.hasAttribute("data-ttype")) {
                type = _element.getAttribute("data-ttype");
            }
            var path = "";
            var ids = document.getElementById("reportID").value;
            var template = "";
            if (ids.length == 0) {
                alert("Please save your report prior to generating templates.");
                return false;
            }
            switch (type) {
            case "income_approach_lib":
                var templateElement = document.getElementById("_ia_temp_libWord");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "ialibrary";
                break;
            case "sales_approach_lib":
                var templateElement = document.getElementById("_sa_temp_libWord");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "salibrary";
                break;
            case "cost_approach_lib":
                var templateElement = document.getElementById("_ca_temp_libWord");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "calibrary";
                break;
            case "general_lib":
                var templateElement = document.getElementById("_general_libWord");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            case "execsum":
                var templateElement = document.getElementById("_exec_summary");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            case "introlet":
                var templateElement = document.getElementById("_intro_templates");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            case "assval":
                var templateElement = document.getElementById("_assessedVal");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            case "scopetemp":
                var templateElement = document.getElementById("_scope_temps");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            case "regiontemp":
                var templateElement = document.getElementById("_region_temps");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            case "asinvp":
                var templateElement = document.getElementById("_trans_letter");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            case "appcert":
                var templateElement = document.getElementById("_app_cert");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            case "glosslib":
                var templateElement = document.getElementById("_gloss_lib");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            case "sitelib":
                var avElement = document.getElementById("_site_desc");
                if (!rbe_engine.checkElement(avElement)) {
                    return false;
                }
                avtable = avElement.options[avElement.selectedIndex].getAttribute("data-tav");
                template = avElement.options[avElement.selectedIndex].getAttribute("data-tpath");
                if (parseInt(avtable)) {
                    var avs = document.getElementById("assessedvalueid").value;
                    if (!rbe_engine.checkElement(avs) || avs.trim() == "") {
                        alert("Please save your report with Assessed Values prior to generating templates.");
                        return false;
                    }
                }
                var templateElement = document.getElementById("_site_desc");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            case "mark_anal":
                var templateElement = document.getElementById("_mark_analysis");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            case "misc_val_lib":
                var templateElement = document.getElementById("_mv_temp_libWord");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "miscvals";
                break;
            case "lval_val_lib":
                var templateElement = document.getElementById("_lv_temp_libWord");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "landvals";
                break;
            case "miscreptemp":
                var avElement = document.getElementById("_misc_reptemps");
                if (!rbe_engine.checkElement(avElement)) {
                    return false;
                }
                avtable = avElement.options[avElement.selectedIndex].getAttribute("data-tav");
                template = avElement.options[avElement.selectedIndex].getAttribute("data-tpath");
                if (parseInt(avtable)) {
                    var avs = document.getElementById("assessedvalueid").value;
                    if (!rbe_engine.checkElement(avs) || avs.trim() == "") {
                        alert("Please save your report with Assessed Values prior to generating templates.");
                        return false;
                    }
                }
                var templateElement = document.getElementById("_misc_reptemps");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "reptemps";
                break;
            case "rowtemp":
                var avElement = document.getElementById("_rowtemps");
                if (!rbe_engine.checkElement(avElement)) {
                    return false;
                }
                avtable = avElement.options[avElement.selectedIndex].getAttribute("data-tav");
                template = avElement.options[avElement.selectedIndex].getAttribute("data-tpath");
                if (parseInt(avtable)) {
                    var avs = document.getElementById("assessedvalueid").value;
                    if (!rbe_engine.checkElement(avs) || avs.trim() == "") {
                        alert("Please save your report with Assessed Values prior to generating templates.");
                        return false;
                    }
                }
                var templateElement = document.getElementById("_rowtemps");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "rowtemps";
                break;
            case "impdesc":
                var templateElement = document.getElementById("_imp_desc");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            case "hbudesc":
                var templateElement = document.getElementById("_hbu_desc");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            case "valmeth":
                var templateElement = document.getElementById("_val_meth");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            case "reconcil":
                var templateElement = document.getElementById("_reconcil");
                if (rbe_engine.checkElement(templateElement)) {
                    template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                }
                path = "libtemplates";
                break;
            }
            if (template === "") {
                alert("Please select a template.");
                return false;
            }
            var subid = document.getElementById("clientIDs").value;
            if (subid.length == 0) {
                alert("You must select a client to continue.");
                return false;
            }
            var appid = document.getElementById("appraiserone").value;
            if (appid == 1) {
                alert("You must select an appraiser to continue.");
                return false;
            }
            appidAdd = "";
			var apptwo = document.getElementById("appraisertwo").value;
            if (apptwo != 1) {
                appidAdd = "&apptwo=" + apptwo;
            }
            var licno = "";
            var licst = "";
            var state = document.getElementById("administrative_area_level_1").value;
            if (state === "WA") {
                licno = "licensenotwo";
                licst = "licensestatetwo";
            } else {
                licno = "licensenoone";
                licst = "licensestateone";
            }
            var url = "../templates/" + path + "/" + template + "?id=" + ids + "&client=" + subid + "&app=" + appid + appidAdd + "&licno=" + licno + "&licst=" + licst;
            window.location = url;
            console.log("url" + url);
        },
        generateReportWordImages: function (_element) {
            var showPreview = 1;
            if (_element.hasAttribute("data-spreview")) {
                showPreview = _element.getAttribute("data-spreview");
            }
            var type = false;
            if (_element.hasAttribute("data-ttype")) {
                type = _element.getAttribute("data-ttype");
            }
            var path = "";
            var ids = "";
            var template = "";
            if (_element.hasAttribute("data-type")) {
                id_element = _element.getAttribute("data-type");
                id_element = document.getElementById(id_element + "IDs");
                if (rbe_engine.checkElement(id_element)) {
                    ids = id_element.value;
                }
            }
            if (ids.length == 0) {
                alert("Please make selection!");
                return false;
            }
            if (ids != "") {
                switch (type) {
                case "improved-sales":
                    var templateElement = document.getElementById("_exportTemplate");
                    if (rbe_engine.checkElement(templateElement)) {
                        template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                    }
                    path = "improved_sales";
                    template = "photos.php";
                    break;
                case "land-sales":
                    var templateElement = document.getElementById("_exportlsTemplate");
                    if (rbe_engine.checkElement(templateElement)) {
                        template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                    }
                    path = "land_sale";
                    template = "photos.php";
                    break;
                case "lease":
                    var templateElement = document.getElementById("_exportlssTemplate");
                    if (rbe_engine.checkElement(templateElement)) {
                        template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                    }
                    path = "leases";
                    template = "photos.php";
                    break;
                case "xtrarents":
                    var templateElement = document.getElementById("_exportlssTemplate");
                    if (rbe_engine.checkElement(templateElement)) {
                        template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
                    }
                    path = "leases";
                    template = "photos.php";
                    break;
                }
                if (type !== false) {
                    var rootpath = window.location.href;
                    var res = rootpath.split("/");
                    var url = window.location.protocol + "//" + window.location.host + "/" + res[3] + "/templates/" + path + "/" + template + "?id=" + ids + "&showPreview=" + showPreview + "&mode=images";
                    console.log("url" + url);
                    if (parseInt(showPreview)) {
                        console.log("preview");
                        window.open(url, "Ratting", "width=720,height=700,0,status=0");
                    } else {
                        console.log("dfsds");
                        window.location = url;
                    }
                } else {
                    console.log("ERROR WITH TYPE!");
                }
            } else {
                alert("Please Select atleast One LandSale");
            }
        },
        generateCover: function (_element) {
            console.log(_element);
            var path = "libtemplates";
            var ids = document.getElementById("reportID").value;
            var template = "coverpage.php";
            if (ids.length == 0) {
                alert("Please save your report prior to generating templates.");
                return false;
            }
            var subid = document.getElementById("clientIDs").value;
            if (subid.length == 0) {
                alert("You must select a client to continue.");
                return false;
            }
            var url = "../templates/" + path + "/" + template + "?id=" + ids + "&client=" + subid;
            window.location = url;
            console.log("url" + url);
        },
        generateCompProf: function (_element) {
            console.log(_element);
            var path = "libtemplates";
            var ids = document.getElementById("reportID").value;
            var template = "compprofile.php";
            if (ids.length == 0) {
                alert("Please save your report prior to generating templates.");
                return false;
            }
            var url = "../templates/" + path + "/" + template + "?id=" + ids;
            window.location = url;
            console.log("url" + url);
        },
        initDeleteEntryDialog: function () {
            var _element = document.getElementById("dialogueDeleteEntry");
            if (!rbe_engine.checkElement(_element)) {
                var _element = document.createElement("div");
                _element.setAttribute("id", "dialogueDeleteEntry");
                document.getElementsByTagName('body')[0].appendChild(_element);
                $("#dialogueDeleteEntry").dialog({
                    autoOpen: false,
                    height: 200,
                    width: 600,
                    modal: true,
                    title: "Please note",
                    ielement: "",
                    controller: this.options.activeObject,
                    buttons: [{
                            text: "Cancel",
                            click: function () {
                                $(this).dialog("close");
                            }
                        }, {
                            text: "Remove",
                            click: function () {
                                $(this).dialog("close");
                                var ielement = $(this).dialog("option", "ielement");
                                var tempController = window[$(this).dialog("option", "controller")];
                                var _rowElement = false;
                                var type = ielement.getAttribute("data-type");
                                var options = tempController.getActionType(ielement);
                                var rows = document.querySelectorAll("#" + type + "_table tbody >tr");
                                for (var i = 0; i < rows.length; i++) {
                                    if (rows[i].hasAttribute("data-selected")) {
                                        _rowElement = rows[i];
                                        var id = _rowElement.id;
                                        var _element = document.getElementById(options.idsInputElement);
                                        if (rbe_engine.checkElement(_element)) {
                                            options.idsArray = _element.value.split(",");
                                            var _index = options.idsArray.indexOf(id);
                                            if (_index != -1) {
                                                options.idsArray.splice(_index, 1);
                                            }
                                            _element.value = options.idsArray.join(",");
                                        }
                                        _rowElement.parentNode.removeChild(_rowElement);
                                        if (tempController.mapController.data.maps[type] != undefined) {
                                            console.log(tempController.mapController.data.maps[type]);
                                            var markerIndex = rbe_engine.getItemIndexForMethod(tempController.mapController.data.maps[type].markers.objects, "reportID", id);
                                            if (markerIndex != -1) {
                                                tempController.mapController.data.maps[type].markers.objects[markerIndex].setMap(null);
                                                tempController.mapController.data.maps[type].markers.objects.splice(markerIndex, 1);
                                            }
                                        }
                                        i -= 1;
                                        rows = document.querySelectorAll("#" + type + "_table tbody >tr");
                                    }
                                }
                                var rows = document.querySelectorAll("#" + type + "_table tbody >tr");
                                for (var i = 0; i < rows.length; i++) {
                                    var cell = rows[i].querySelector("td");
                                    if (cell != null && cell != undefined) {
                                        cell.innerHTML = i;
                                        if (tempController.mapController.data.maps[type] != undefined) {
                                            var marker = rbe_engine.getItemForMethod(tempController.mapController.data.maps[type].markers.objects, "reportID", rows[i].id);
                                            if (marker !== false && marker != null && marker != undefined) {
                                                marker.setMap(null);
                                                marker.label = i.toString();
                                                marker.setMap(tempController.mapController.data.maps[type].map);
                                            }
                                        }
                                    }
                                }
                                var e_elements = document.getElementsByClassName("_generateReportWordBtnImages");
                                for (var i = 0; i < e_elements.length; i++) {
                                    var type = e_elements[i].getAttribute("data-ttype");
                                    if (document.querySelectorAll("#" + type + " ._table tbody tr").length <= 1) {
                                        rbe_engine.addClass(e_elements[i], "disabled");
                                    } else {
                                        rbe_engine.removeClass(e_elements[i], "disabled");
                                    }
                                }
                                var e_elements = document.getElementsByClassName("_generateReportWordBtn");
                                for (var i = 0; i < e_elements.length; i++) {
                                    var type = e_elements[i].getAttribute("data-type");
                                    if (document.querySelectorAll("#" + type + "_table tbody tr").length <= 1) {
                                        rbe_engine.addClass(e_elements[i], "disabled");
                                    } else {
                                        rbe_engine.removeClass(e_elements[i], "disabled");
                                    }
                                }
                            }
                        }
                    ]
                });
            }
        },
        openWindow: function (_element) {
            window.activeObject = this.options.activeObject;
            var options = this.getActionType(_element);
            window.open(options.idsUrl + "?table=" + options.tableName + "&requestData=" + options.requestData + "&hids=" + options.idsInputElement, "Ratting", "width=1500,height=700,0,status=0");
        },
        getActionType: function (_element) {
            return this.baseController.getActionType(_element);
        },
        assignSelectRowsEvents: function (element) {
            var rows = document.querySelectorAll("._table tbody >tr .selectable");
            for (var i = 0; i < rows.length; i++) {
                rows[i].setAttribute("onClick", this.options.activeObject + ".selectTableRow(this);");
            }
            var e_elements = document.getElementsByClassName("_generateReportWordBtnImages");
            for (var i = 0; i < e_elements.length; i++) {
                var type = e_elements[i].getAttribute("data-ttype");
                if (document.querySelectorAll("#" + type + " ._table tbody tr").length <= 1) {
                    rbe_engine.addClass(e_elements[i], "disabled");
                } else {
                    rbe_engine.removeClass(e_elements[i], "disabled");
                }
            }
            var e_elements = document.getElementsByClassName("_generateReportWordBtn");
            for (var i = 0; i < e_elements.length; i++) {
                var type = e_elements[i].getAttribute("data-type");
                if (document.querySelectorAll("#" + type + "_table tbody tr").length <= 1) {
                    rbe_engine.addClass(e_elements[i], "disabled");
                } else {
                    rbe_engine.removeClass(e_elements[i], "disabled");
                }
            }
        },
        selectTableRow: function (element) {
            var id = element.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id;
            var u_element = document.querySelector("#" + id + " .itemUp");
            if (rbe_engine.checkElement(u_element)) {
                u_element.removeAttribute("disabled");
            }
            var d_element = document.querySelector("#" + id + " .itemDown");
            if (rbe_engine.checkElement(d_element)) {
                d_element.removeAttribute("disabled");
            }
            if (element.parentNode.hasAttribute("data-selected")) {
                rbe_engine.removeClass(element.parentNode, "selectedRow");
                element.parentNode.removeAttribute("data-selected")
            } else {
                rbe_engine.addClass(element.parentNode, "selectedRow");
                element.parentNode.setAttribute("data-selected", true)
            }
            for (var i = 0; i < element.parentNode.parentNode.children.length; i++) {
                if (element.parentNode.parentNode.children[i].hasAttribute("data-selected") && i == 1) {
                    u_element.setAttribute("disabled", true);
                    rbe_engine.addClass(u_element, "disabled");
                }
                if (element.parentNode.parentNode.children[i].hasAttribute("data-selected") && i == element.parentNode.parentNode.children.length - 1) {
                    d_element.setAttribute("disabled", true);
                    rbe_engine.addClass(d_element, "disabled");
                }
            }
            if (element.parentNode.parentNode.querySelectorAll("[data-selected=true]").length != 1) {
                var e_element = document.querySelector("#" + id + " ._editAction");
                if (rbe_engine.checkElement(e_element)) {
                    rbe_engine.addClass(e_element, "disabled");
                }
            } else {
                var e_element = document.querySelector("#" + id + " ._editAction");
                if (rbe_engine.checkElement(e_element)) {
                    rbe_engine.removeClass(e_element, "disabled");
                }
            }
            if (element.parentNode.parentNode.querySelectorAll("[data-selected=true]").length == 0) {
                var e_element = document.querySelector("#" + id + " ._removeAction");
                if (rbe_engine.checkElement(e_element)) {
                    rbe_engine.addClass(e_element, "disabled");
                }
            } else {
                var e_element = document.querySelector("#" + id + " ._removeAction");
                if (rbe_engine.checkElement(e_element)) {
                    rbe_engine.removeClass(e_element, "disabled");
                }
            }
            if (element.parentNode.parentNode.querySelectorAll("[data-selected=true]").length == 0) {
                var e_element = document.querySelector("#" + id + " ._clonecompsAction");
                if (rbe_engine.checkElement(e_element)) {
                    rbe_engine.addClass(e_element, "disabled");
                }
            } else {
                var e_element = document.querySelector("#" + id + " ._clonecompsAction");
                if (rbe_engine.checkElement(e_element)) {
                    rbe_engine.removeClass(e_element, "disabled");
                }
            }
			if (element.parentNode.parentNode.querySelectorAll("[data-selected=true]").length == 0) {
                var e_element = document.querySelector("#" + id + " ._copycompsAction");
                if (rbe_engine.checkElement(e_element)) {
                    rbe_engine.addClass(e_element, "disabled");
                }
            } else {
                var e_element = document.querySelector("#" + id + " ._copycompsAction");
                if (rbe_engine.checkElement(e_element)) {
                    rbe_engine.removeClass(e_element, "disabled");
                }
            }
			
        },
        editEntry: function (element) {
            if (element.hasAttribute("disabled")) {
                return false;
            }
            window.activeObject = this.options.activeObject;
            var _rowElement = false;
            var type = element.getAttribute("data-type");
            var options = this.getActionType(element);
            var rows = document.querySelectorAll("#" + type + "_table tbody >tr");
            for (var i = 0; i < rows.length; i++) {
                if (rows[i].hasAttribute("data-selected")) {
                    _rowElement = rows[i];
                    continue;
                }
            }
            var id = _rowElement.id;
            if (id != undefined) {
                window.open(options.idsUrl + "?id=" + id + "&table=" + options.tableName + "&requestData=" + options.requestData + "&hids=" + options.idsInputElement, "Ratting", "width=1500,height=700,0,status=0");
            } else {
                alert("Select" + _rowElement);
            }
        },
        addAssessed: function (_element) {
            var trElement = document.createElement("tr");
            trElement.setAttribute("id", "");
            trElement.innerHTML = "<input type='hidden' name='assessedvalueid[]' value='' />";
            trElement.innerHTML += "<td><input type='text' name='mappage[]' class='form-control' /></td>";
            trElement.innerHTML += "<td><input type='text' name='taxlot[]' class='form-control' /></td>";
            trElement.innerHTML += "<td><input type='text' name='parcelno[]' class='form-control' /></td>";
            trElement.innerHTML += "<td><input type='text' name='assessedglasf[]' class='form-control _sum _fm00t' /></td>";
            trElement.innerHTML += "<td><input type='text' name='marketland[]' class='form-control _ppgc _sum _sumv _cfm00t' /></td>";
            trElement.innerHTML += "<td><input type='text' name='marketimp[]' class='form-control _ppgc _sum _sumv _cfm00t' /></td>";
            trElement.innerHTML += "<td><input type='text' name='markettotal[]' class='form-control _ppgc _sum _sumvr _cfm00t' readonly /></td>";
            trElement.innerHTML += "<td><input type='text' name='measure50[]' class='form-control _ppgc _sum _cfm00t' /></td>";
            trElement.innerHTML += "<td><input type='text' name='annualtaxes[]' class='form-control _ppgc _sum _cfm02t' /></td>";
            trElement.innerHTML += "<td><input type='button' class='_delAssessed' value='Delete' /></td>";
            var r_elements = document.querySelectorAll("#assessed_table tbody tr");
            if (rbe_engine.checkElement(r_elements)) {
                r_elements[0].parentNode.insertBefore(trElement, r_elements[0].parentNode.children[r_elements[0].parentNode.children.length - 2]);
                var r_elements = document.querySelectorAll("#assessed_table tbody tr");
                var _elements = r_elements[r_elements.length - 2].getElementsByClassName("_cfm00t");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                        this.getNumberFormat(_elements[i], _elements[i].value);
                        _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumValues(this);");
                    }
                }
                var _elements = r_elements[r_elements.length - 2].getElementsByClassName("_sumv");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                        this.getNumberFormat(_elements[i], _elements[i].value);
                        _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumValuesVerticaly(this);");
                    }
                }
                var _elements = r_elements[r_elements.length - 2].getElementsByClassName("_fm02t");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                        this.getNumberFormat(_elements[i], _elements[i].value);
                        _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumValues(this);");
                    }
                }
                var _elements = r_elements[r_elements.length - 2].getElementsByClassName("_fm00t");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                        this.getNumberFormat(_elements[i], _elements[i].value);
                        _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumValues(this);");
                    }
                }
                var _elements = r_elements[r_elements.length - 2].getElementsByClassName("_ppgc");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumValues(this);");
                        _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".propagadeCalcualations();");
                    }
                }
                var _elements = r_elements[r_elements.length - 2].getElementsByClassName("_delAssessed");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onClick", _elements[i].getAttribute("onClick") + ";" + this.options.activeObject + ".deleteAssessed(this);");
                    }
                }
            }
        },
        removeEntryPrompt: function (_element) {
            this.initDeleteEntryDialog();
            var __element = document.getElementById("dialogueDeleteEntry");
            if (rbe_engine.checkElement(__element)) {
                $("#dialogueDeleteEntry").dialog("option", "ielement", _element);
                __element.innerHTML = "<p>Are you sure that you want to remove the selected record, this action cannot be undone!</p>";
                $("#dialogueDeleteEntry").dialog("open");
            }
        },
        upItem: function (_element) {
            this.baseController.upItem(_element);
        },
        downItem: function (_element) {
            this.baseController.downItem(_element);
        },
        setSubPropertType: function (_element) {
            var propertyTypeID = _element.options[_element.selectedIndex].value;
            propertyTypeID = parseInt(propertyTypeID);
            var options = [];
            var s_element = document.getElementById("selectSubPropertType");
            if (!rbe_engine.checkElement(s_element)) {
                return false;
            }
            currentValue = 0;
            if (s_element.options.length != 0) {
                var currentValue = s_element.options[s_element.selectedIndex].value;
            }
            s_element.options.length = 0;
            s_element.options = [];
            for (var i = 0; i < this.options.subProperty.length; i++) {
                if (parseInt(this.options.subProperty[i].ptid) == propertyTypeID || parseInt(this.options.subProperty[i].ptid) == 1) {
                    s_element.options[s_element.length] = new Option(this.options.subProperty[i].subtype, this.options.subProperty[i].id);
                    s_element.options[s_element.length - 1].setAttribute("data-tselect", this.options.subProperty[i].subtype);
                }
            }
            for (var i = 0; i < s_element.options.length; i++) {
                if (s_element.options[i].value == currentValue) {
                    s_element.selectedIndex = i;
                }
            }
            return true;
        },
        setSubMarket: function (_element) {
            var subMarketID = _element.options[_element.selectedIndex].value;
            subMarketID = parseInt(subMarketID);
            var options = [];
            var s_element = document.getElementById("selectSubMarketArea");
            if (!rbe_engine.checkElement(s_element)) {
                return false;
            }
            currentValue = 0;
            if (s_element.options.length != 0) {
                var currentValue = s_element.options[s_element.selectedIndex].value;
            }
            s_element.options.length = 0;
            s_element.options = [];
            for (var i = 0; i < this.options.subMarketArea.length; i++) {
                if (parseInt(this.options.subMarketArea[i].gmid) == subMarketID || parseInt(this.options.subMarketArea[i].gmid) == 1) {
                    s_element.options[s_element.length] = new Option(this.options.subMarketArea[i].submarket, this.options.subMarketArea[i].id);
                    s_element.options[s_element.length - 1].setAttribute("data-tselect", this.options.subMarketArea[i].submarket);
                }
            }
            for (var i = 0; i < s_element.options.length; i++) {
                if (s_element.options[i].value == currentValue) {
                    s_element.selectedIndex = i;
                }
            }
            return true;
        },
        cloneReport: function (_element) {
            var object = rbe_engine.createObjectFromForm('_form');
            console.log(object);
            var __element = document.getElementById("type");
            if (!rbe_engine.checkElement(__element)) {
                console.log("no report type drop down found!");
                return false;
            }
            var reportType = parseInt(__element.options[__element.selectedIndex].value);
            var page = __element.options[__element.selectedIndex].getAttribute("data-page");
            var xhr = $.ajax({
                    url: "AppClone.php?id=" + object.id + "&reportType=" + reportType,
                    type: "post",
                    data: {
                        "data": JSON.stringify(object)
                    },
                    beforeSend: function () {},
                    success: function (response) {
                        window.open(page + "?id=" + response);
                        return true;
                    },
                    error: function (jqXHR, textStatus, errorThrown) {}
                });
        },
        propagadeCalcualations: function () {
            var gla_inputsize = $(".gla_inputsize").val();
            var gla_inputsize =  + (gla_inputsize ? gla_inputsize.replace(/[^\d.-]/g, '') : gla_inputsize);
            var gla_inputsize = parseFloat(gla_inputsize);
            var gross_land_sf = $(".gross_land_sf").val();
            var gross_land_sf =  + (gross_land_sf ? gross_land_sf.replace(/[^\d.-]/g, '') : gross_land_sf);
            var unusable_sf = $(".unusable_sf").val();
            var unusable_sf =  + (unusable_sf ? unusable_sf.replace(/[^\d.-]/g, '') : unusable_sf);
            var surplus_sf = $(".surplus_sf").val();
            var surplus_sf =  + (surplus_sf ? surplus_sf.replace(/[^\d.-]/g, '') : surplus_sf);
            var excess_sf = $(".excess_sf").val();
            var excess_sf =  + (excess_sf ? excess_sf.replace(/[^\d.-]/g, '') : excess_sf);
            var net_usable_sf = $(".net_usable_sf").val();
            var net_usable_sf =  + (net_usable_sf ? net_usable_sf.replace(/[^\d.-]/g, '') : net_usable_sf);
            var floor_area_ratio = $(".floor_area_ratio").val();
            var floor_area_ratio =  + (floor_area_ratio ? floor_area_ratio.replace(/[^\d.-]/g, '') : floor_area_ratio);
            var no_units = $(".no_units").val();
            var no_units =  + (no_units ? no_units.replace(/[^\d.-]/g, '') : no_units);
            var floor_1_gba = $(".floor_1_gba").val();
            var floor_1_gba =  + (floor_1_gba ? floor_1_gba.replace(/[^\d.-]/g, '') : floor_1_gba);
            var floor_2_gba = $(".floor_2_gba").val();
            var floor_2_gba =  + (floor_2_gba ? floor_2_gba.replace(/[^\d.-]/g, '') : floor_2_gba);
            var total_basement_gba = $(".total_basement_gba").val();
            var total_basement_gba =  + (total_basement_gba ? total_basement_gba.replace(/[^\d.-]/g, '') : total_basement_gba);
            var floor_1_nra = $(".floor_1_nra").val();
            var floor_1_nra =  + (floor_1_nra ? floor_1_nra.replace(/[^\d.-]/g, '') : floor_1_nra);
            var floor_2_nra = $(".floor_2_nra").val();
            var floor_2_nra =  + (floor_2_nra ? floor_2_nra.replace(/[^\d.-]/g, '') : floor_2_nra);
            var total_basement_nra = $(".total_basement_nra").val();
            var total_basement_nra =  + (total_basement_nra ? total_basement_nra.replace(/[^\d.-]/g, '') : total_basement_nra);
            var parking_stalls = $(".parking_stalls").val();
            var parking_stalls =  + (parking_stalls ? parking_stalls.replace(/[^\d.-]/g, '') : parking_stalls);
            var overall_gba = $(".overall_gba").val();
            var overall_gba =  + (overall_gba ? overall_gba.replace(/[^\d.-]/g, '') : overall_gba);
            var overall_nra = $(".overall_nra").val();
            var overall_nra =  + (overall_nra ? overall_nra.replace(/[^\d.-]/g, '') : overall_nra);
            var shop_inline_sf = $(".shop_inline_sf").val();
            var shop_inline_sf =  + (shop_inline_sf ? shop_inline_sf.replace(/[^\d.-]/g, '') : shop_inline_sf);
            var store_avg_month_gallon = $(".store_avg_month_gallon").val();
            var store_avg_month_gallon =  + (store_avg_month_gallon ? store_avg_month_gallon.replace(/[^\d.-]/g, '') : store_avg_month_gallon);
            var store_month_store_sales = $(".store_month_store_sales").val();
            var store_month_store_sales =  + (store_month_store_sales ? store_month_store_sales.replace(/[^\d.-]/g, '') : store_month_store_sales);
            var store_month_car_wash_sales = $(".store_month_car_wash_sales").val();
            var store_month_car_wash_sales =  + (store_month_car_wash_sales ? store_month_car_wash_sales.replace(/[^\d.-]/g, '') : store_month_car_wash_sales);
            var store_month_mini_sales = $(".store_month_mini_sales").val();
            var store_month_mini_sales =  + (store_month_mini_sales ? store_month_mini_sales.replace(/[^\d.-]/g, '') : store_month_mini_sales);
            var veh_showroom_sf = $(".veh_showroom_sf").val();
            var veh_showroom_sf =  + (veh_showroom_sf ? veh_showroom_sf.replace(/[^\d.-]/g, '') : veh_showroom_sf);
            var ind_int_office_1 = $(".ind_int_office_1").val();
            var ind_int_office_1 =  + (ind_int_office_1 ? ind_int_office_1.replace(/[^\d.-]/g, '') : ind_int_office_1);
            var ind_int_office_2 = $(".ind_int_office_2").val();
            var ind_int_office_2 =  + (ind_int_office_2 ? ind_int_office_2.replace(/[^\d.-]/g, '') : ind_int_office_2);
            var ind_ext_office_1 = $(".ind_ext_office_1").val();
            var ind_ext_office_1 =  + (ind_ext_office_1 ? ind_ext_office_1.replace(/[^\d.-]/g, '') : ind_ext_office_1);
            var ind_ext_office_2 = $(".ind_ext_office_2").val();
            var ind_ext_office_2 =  + (ind_ext_office_2 ? ind_ext_office_2.replace(/[^\d.-]/g, '') : ind_ext_office_2);
            var veh_tunnel = $(".veh_tunnel").val();
            var veh_tunnel =  + (veh_tunnel ? veh_tunnel.replace(/[^\d.-]/g, '') : veh_tunnel);
            var mf_no_single = $(".mf_no_single").val();
            var mf_no_single =  + (mf_no_single ? mf_no_single.replace(/[^\d.-]/g, '') : mf_no_single);
            var mf_no_double = $(".mf_no_double").val();
            var mf_no_double =  + (mf_no_double ? mf_no_double.replace(/[^\d.-]/g, '') : mf_no_double);
            var mf_no_triple = $(".mf_no_triple").val();
            var mf_no_triple =  + (mf_no_triple ? mf_no_triple.replace(/[^\d.-]/g, '') : mf_no_triple);
            var mf_no_rv_spaces = $(".mf_no_rv_spaces").val();
            var mf_no_rv_spaces =  + (mf_no_rv_spaces ? mf_no_rv_spaces.replace(/[^\d.-]/g, '') : mf_no_rv_spaces);
            var mf_sw_avg_rent = $(".mf_sw_avg_rent").val();
            var mf_sw_avg_rent =  + (mf_sw_avg_rent ? mf_sw_avg_rent.replace(/[^\d.-]/g, '') : mf_sw_avg_rent);
            var mf_dw_avg_rent = $(".mf_dw_avg_rent").val();
            var mf_dw_avg_rent =  + (mf_dw_avg_rent ? mf_dw_avg_rent.replace(/[^\d.-]/g, '') : mf_dw_avg_rent);
            var mf_tw_avg_rent = $(".mf_tw_avg_rent").val();
            var mf_tw_avg_rent =  + (mf_tw_avg_rent ? mf_tw_avg_rent.replace(/[^\d.-]/g, '') : mf_tw_avg_rent);
            var mf_rv_avg_rent = $(".mf_rv_avg_rent").val();
            var mf_rv_avg_rent =  + (mf_rv_avg_rent ? mf_rv_avg_rent.replace(/[^\d.-]/g, '') : mf_rv_avg_rent);
            var mf_sw_high_rent = $(".mf_sw_high_rent").val();
            var mf_sw_high_rent =  + (mf_sw_high_rent ? mf_sw_high_rent.replace(/[^\d.-]/g, '') : mf_sw_high_rent);
            var mf_dw_high_rent = $(".mf_dw_high_rent").val();
            var mf_dw_high_rent =  + (mf_dw_high_rent ? mf_dw_high_rent.replace(/[^\d.-]/g, '') : mf_dw_high_rent);
            var mf_tw_high_rent = $(".mf_tw_high_rent").val();
            var mf_tw_high_rent =  + (mf_tw_high_rent ? mf_tw_high_rent.replace(/[^\d.-]/g, '') : mf_tw_high_rent);
            var mf_rv_high_rent = $(".mf_rv_high_rent").val();
            var mf_rv_high_rent =  + (mf_rv_high_rent ? mf_rv_high_rent.replace(/[^\d.-]/g, '') : mf_rv_high_rent);
            var mf_total_spaces = $(".mf_total_spaces").val();
            var mf_total_spaces =  + (mf_total_spaces ? mf_total_spaces.replace(/[^\d.-]/g, '') : mf_total_spaces);
            if (document.getElementById('inputtypeSF').checked) {
                $("#glasfcalc").val(gla_inputsize).trigger('onblur');
                $("#glaacrecalc").val(gla_inputsize / 43560).trigger('onblur');
				$("#netareasf").val(gla_inputsize - unusable_sf).trigger('onblur');
				$("#netareaacre").val((gla_inputsize - unusable_sf) / 43560).trigger('onblur');
				$("#primaryareasf").val((gla_inputsize - unusable_sf) - (surplus_sf + excess_sf)).trigger('onblur');
				$("#primaryareaacre").val(((gla_inputsize - unusable_sf) - (surplus_sf + excess_sf)) / 43560).trigger('onblur');
            } else {
                $("#glasfcalc").val(gla_inputsize * 43560).trigger('onblur');
                $("#glaacrecalc").val(gla_inputsize).trigger('onblur');
				$("#netareasf").val((gla_inputsize * 43560) - unusable_sf).trigger('onblur');
				$("#netareaacre").val(((gla_inputsize * 43560) - unusable_sf) / 43560).trigger('onblur');
				$("#primaryareasf").val(((gla_inputsize * 43560) - unusable_sf) - (surplus_sf + excess_sf)).trigger('onblur');
				$("#primaryareaacre").val((((gla_inputsize * 43560) - unusable_sf) - (surplus_sf + excess_sf)) / 43560).trigger('onblur');
            }
            $("#unusableacre").val(unusable_sf / 43560).trigger('onblur');
            $("#surplusacre").val(surplus_sf / 43560).trigger('onblur');
            $("#excessacre").val(excess_sf / 43560).trigger('onblur');/*
            $("#netareasf").val(gross_land_sf - unusable_sf).trigger('onblur');
            $("#netareaacre").val((gross_land_sf - unusable_sf) / 43560).trigger('onblur');
            $("#primaryareasf").val((gross_land_sf - unusable_sf) - (surplus_sf + excess_sf)).trigger('onblur');
            $("#primaryareaacre").val(((gross_land_sf - unusable_sf) - (surplus_sf + excess_sf)) / 43560).trigger('onblur');*/
            $("#bldgfloorarea").val(net_usable_sf * floor_area_ratio).trigger('onblur');
            $("#totalgba").val(floor_1_gba + floor_2_gba + total_basement_gba).trigger('onblur');
            $("#percentbasegba").val((total_basement_gba / (floor_1_gba + floor_2_gba + total_basement_gba)) * 100).trigger('onblur');
            $("#totalnra").val(floor_1_nra + floor_2_nra + total_basement_nra).trigger('onblur');
            $("#percentbasenra").val((total_basement_nra / (floor_1_nra + floor_2_nra + total_basement_nra)) * 100).trigger('onblur');
            $("#effratiogla").val(((floor_1_nra + floor_2_nra + total_basement_nra) / (floor_1_gba + floor_2_gba + total_basement_gba)) * 100).trigger('onblur');
            $("#parkratnra").val((parking_stalls / (floor_1_nra + floor_2_nra + total_basement_nra)) * 1000).trigger('onblur');
            $("#parkratgba").val((parking_stalls / (floor_1_gba + floor_2_gba + total_basement_gba)) * 1000).trigger('onblur');
            $("#parkratunit").val((parking_stalls / no_units)).trigger('onblur');
            $("#lbrprim").val(((gross_land_sf - unusable_sf) - (surplus_sf + excess_sf)) / (floor_1_gba + floor_2_gba + total_basement_gba)).trigger('onblur');
            $("#scrprim").val((floor_1_gba / ((gross_land_sf - unusable_sf) - (surplus_sf + excess_sf))) * 100).trigger('onblur');
            $("#lbrover").val((gross_land_sf - unusable_sf) / (floor_1_gba + floor_2_gba + total_basement_gba)).trigger('onblur');
            $("#scrover").val((floor_1_gba / (gross_land_sf - unusable_sf)) * 100).trigger('onblur');
            $("#totinlinepct").val((shop_inline_sf / (floor_1_nra + floor_2_nra + total_basement_nra)) * 100).trigger('onblur');
            $("#achorsfcalc").val((floor_1_nra + floor_2_nra + total_basement_nra) - shop_inline_sf).trigger('onblur');
            $("#anchorpctcalc").val((((floor_1_nra + floor_2_nra + total_basement_nra) - shop_inline_sf) / (floor_1_nra + floor_2_nra + total_basement_nra)) * 100).trigger('onblur');
            $("#mosalescalc").val(store_month_store_sales + store_month_car_wash_sales + store_month_mini_sales).trigger('onblur');
            $("#showroompctcalc").val((veh_showroom_sf / (floor_1_gba + floor_2_gba + total_basement_gba)) * 100).trigger('onblur');
            $("#svcareacalc").val((floor_1_gba + floor_2_gba + total_basement_gba) - veh_showroom_sf).trigger('onblur');
            $("#totoffbosfcalc").val(ind_int_office_1 + ind_int_office_2 + ind_ext_office_1 + ind_ext_office_2).trigger('onblur');
            $("#totoffbopctcalc").val(((ind_int_office_1 + ind_int_office_2 + ind_ext_office_1 + ind_ext_office_2) / (floor_1_gba + floor_2_gba + total_basement_gba)) * 100).trigger('onblur');
            $("#maxrent").val(Math.max(mf_sw_avg_rent, mf_dw_avg_rent, mf_tw_avg_rent, mf_rv_avg_rent, mf_sw_high_rent, mf_dw_high_rent, mf_tw_high_rent, mf_rv_high_rent)).trigger('onblur');
            $("#mftotalspots").val(mf_no_single + mf_no_double + mf_no_triple + mf_no_rv_spaces).trigger('onblur');
            $("#mftotavgrent").val(((mf_no_single * mf_sw_avg_rent) + (mf_no_double * mf_dw_avg_rent) + (mf_no_triple * mf_tw_avg_rent) + (mf_no_rv_spaces * mf_rv_avg_rent)) / (mf_no_single + mf_no_double + mf_no_triple + mf_no_rv_spaces)).trigger('onblur');
            var _elements = document.getElementsByClassName("calc");
            for (var i = 0; i < _elements.length; i++) {
                if (_elements[i].value.indexOf("-") == -1) {
                    _elements[i].style.color = "#555";
                } else {
                    _elements[i].style.color = "red";
                }
            }
        },
        showErrorMessage: function (message) {}
    };
    _appraisalsController.setOptions(options);
    return _appraisalsController;
}
