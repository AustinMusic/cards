var _landsalesController = function (options) {
    var _landsalesController;
    var rbe_engine = new _rbe_engine();
    _landsalesController = {
        options: {
            activeObject: "",
            id: "",
            latitude: "",
            longitude: "",
            subMarketArea: "",
            subProperty: "",
            data: ""
        },
        data: {},
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
            this.renderUI();
            this.baseController = new _baseController({
                    activeObject: this.options.activeObject + ".baseController",
                    data: this.options.data
                });
            this.baseController.init();
            this.mapController = new _mapController({
                    activeObject: this.options.activeObject + ".mapController",
                    id: this.options.id,
                    latitude: this.options.latitude,
                    longitude: this.options.longitude,
                });
            this.baseController.mapController = this.mapController;
            this.assignEvents();
            var _elements = document.getElementById("assessed_table").querySelectorAll("tbody tr ._sumv");
            for (var i = 0; i < _elements.length; i++) {
                this.sumValuesVerticaly(_elements[i]);
            }
            this.mapController.init();
            this.renderUI();
        },
        renderUI: function () {
            var _element = document.getElementById("bldgfloorarea");
            if (rbe_engine.checkElement(_element)) {
                var __element = document.getElementById("apsfmfar");
                if (rbe_engine.checkElement(__element)) {
                    if (parseInt(_element.value)) {
                        __element.style.display = "block";
                    } else {
                        __element.style.display = "none";
                    }
                }
            }
        },
        assignEvents: function () {
            var _element = document.getElementById("autocomplete");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("focus", "geolocate();");
            }
            var _elements = document.getElementsByClassName("_generateReportWordBtn");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", _elements[i].getAttribute("onclick") + ";" + this.options.activeObject + ".generateReportWord(this);");
                }
            }
            var _elements = document.getElementsByClassName("_addAssessed");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".addAssessed(this);");
                }
            }
            var _elements = document.getElementsByClassName("_delAssessed");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onClick", _elements[i].getAttribute("onClick") + ";" + this.options.activeObject + ".deleteAssessed(this);");
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
            var _element = document.getElementById("addDoc");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".addLink(this);");
            }
            var _elements = document.getElementsByClassName("remDoc");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onClick", this.options.activeObject + ".remLink(this);");
                }
            }
            var _elements = document.getElementsByClassName("editDoc");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onClick", this.options.activeObject + ".editLink(this);");
                }
            }
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
            var _element = document.getElementById("selectMarketArea");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".setSubMarket(this);");
                this.setSubMarket(_element);
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
                this.togglePT();
            }
            var _element = document.getElementById("selectSubPropertType");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".togglePT();");
                this.togglePT();
            }
            var _element = document.getElementById("change_zoning");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onClick") + ";" + this.options.activeObject + ".setZoneChanging(this);");
                this.setZoneChanging(_element);
            }
            var _element = document.getElementById("bulk_lot_sale_check");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onClick") + ";" + this.options.activeObject + ".setBulkLandType(this);");
                this.setBulkLandType(_element);
            }
            var _element = document.getElementById("raw_land_sale_check");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onClick") + ";" + this.options.activeObject + ".setRawLandType(this);");
                this.setRawLandType(_element);
            }
            var _element = document.getElementById("inc_far");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onClick") + ";" + this.options.activeObject + ".setFar(this);");
                this.setFar(_element);
            }
            var _element = document.getElementById("property_appraised");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onClick") + ";" + this.options.activeObject + ".setPropertyAppraised(this);");
                this.setPropertyAppraised(_element);
            }
            var _element = document.getElementById("dwellrights");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".setDwellrights(this);");
                this.setDwellrights(_element);
            }
            var _element = document.getElementById("emdomain");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".setListEmDomain(this);");
                this.setListEmDomain(_element);
            }
            var _element = document.getElementById("proposed_use_change");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".setProposedUseChanges(this);");
                this.setProposedUseChanges(_element);
            }
            var _element = document.getElementById("list_price_avail");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".setListPriceAvailable(this);");
                this.setListPriceAvailable(_element);
            }
            var _element = document.getElementById("change_zoning");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onClick") + ";" + this.options.activeObject + ".setZoneChanging(this);");
                this.setZoneChanging(_element);
            }
            var _element = document.getElementById("ground_lease");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".toggleTab(this,'groundleaseTab');");
                this.toggleTab(_element, 'groundleaseTab');
            }
            var _element = document.getElementById("proposed_building");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".toggleBldg(this,'buildingTab');");
                this.toggleBldg(_element, 'buildingTab');
            }
            var _element = document.getElementById("land_alloc_sale");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onClick") + ";" + this.options.activeObject + ".toggleLandAllo(this);");
                this.toggleLandAllo(_element);
            }
            var _element = document.getElementById("IncFFe");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".toggleFFE(this);");
                this.toggleFFE(_element);
            }
        },
        addLink: function (_element) {
            aa_engine.addLink(_element);
        },
        remLink: function (_element) {
            aa_engine.remLink(_element);
        },
        editLink: function (_element) {
            aa_engine.editLink(_element);
        },
        toggleFFE: function (_element) {
            var _elements = document.querySelectorAll("._FFeInc");
            for (var i = 0; i < _elements.length; i++) {
                if (parseInt(_element.options[_element.selectedIndex].value) == 2) {
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
                }
            }
            return true;
        },
        toggleLandAllo: function (_element) {
            var _elements = document.querySelectorAll("._landAllSale");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
                }
            }
            return true;
        },
        toggleBldg: function (_element, tab) {
            var __element = document.getElementById(tab);
            if (rbe_engine.checkElement(__element)) {
                if (_element.checked) {
                    __element.style.display = "none";
                } else {
                    __element.style.display = "block";
                }
            }
            var __element = document.getElementById("buildingTab");
            if (rbe_engine.checkElement(__element)) {
                if (_element.checked) {
                    __element.style.display = "block";
                } else {
                    __element.style.display = "none";
                }
            }
            return true;
        },
        toggleTab: function (_element, tab) {
            var __element = document.getElementById(tab);
            if (rbe_engine.checkElement(__element)) {
                if (_element.checked) {
                    __element.style.display = "block";
                } else {
                    __element.style.display = "none";
                }
            }
            var __element = document.getElementById("saleData2");
            if (rbe_engine.checkElement(__element)) {
                if (_element.checked) {
                    __element.style.display = "none";
                } else {
                    __element.style.display = "block";
                }
            }
            return true;
        },
        setListEmDomain: function (_element) {
            if (_element.checked) {
                var _elements = document.getElementsByClassName("_emdomain");
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].style.display = "flex";
                }
            } else {
                var _elements = document.getElementsByClassName("_emdomain");
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].style.display = "none";
                }
            }
            return true;
        },
        setListPriceAvailable: function (_element) {
            if (_element.checked) {
                var _elements = document.getElementsByClassName("list_price_avail");
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].style.display = "block";
                }
            } else {
                var _elements = document.getElementsByClassName("list_price_avail");
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].style.display = "none";
                }
            }
            return true;
        },
        setDwellrights: function (_element) {
            if (parseInt(_element.options[_element.selectedIndex].value) == 2) {
                var _element = document.getElementById("_adjhomesite");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "flex";
                }
            } else {
                var _element = document.getElementById("_adjhomesite");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "none";
                }
            }
            return true;
        },
        setProposedUseChanges: function (_element) {
            if (parseInt(_element.options[_element.selectedIndex].value) == 2) {
                var _element = document.getElementById("proposed_use_change_panel");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "block";
                }
            } else {
                var _element = document.getElementById("proposed_use_change_panel");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "none";
                }
            }
            return true;
        },
        setPropertyAppraised: function (_element) {
            if (_element.checked) {
                var _elements = document.getElementsByClassName("property_appraised");
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].style.display = "block";
                }
            } else {
                var _elements = document.getElementsByClassName("property_appraised");
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].style.display = "none";
                }
            }
            return true;
        },
        setFar: function (_element) {
            if (_element.checked) {
                var _element = document.getElementById("far_panel");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "flex";
                }
                var _element = document.getElementById("apsfmfar");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "block";
                }
            } else {
                var _element = document.getElementById("far_panel");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "none";
                }
                var _element = document.getElementById("apsfmfar");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "none";
                }
            }
            return true;
        },
        setBulkLandType: function (_element) {
            if (_element.checked) {
                var _element = document.getElementById("bulk_lot_sale_tabs");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "block";
                }
                var _element = document.getElementById("raw_lot_sale_tabs");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "none";
                }
            } else {
                var _element = document.getElementById("bulk_lot_sale_tabs");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "none";
                }
                var _element = document.getElementById("raw_lot_sale_tabs");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "block";
                }
            }
            return true;
        },
        setRawLandType: function (_element) {
            if (_element.checked) {
                var _element = document.getElementById("raw_lot_sale_tabs");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "block";
                }
                var _element = document.getElementById("bulk_lot_sale_tabs");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "none";
                }
            } else {
                var _element = document.getElementById("raw_lot_sale_tabs");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "none";
                }
                var _element = document.getElementById("bulk_lot_sale_tabs");
                if (rbe_engine.checkElement(_element)) {
                    _element.style.display = "block";
                }
            }
            return true;
        },
        setZoneChanging: function (_element) {
            if (_element.checked) {
                var elements = document.getElementsByClassName("change_zoning");
                for (var i = 0; i < elements.length; i++) {
                    elements[i].style.display = "block";
                }
            } else {
                var elements = document.getElementsByClassName("change_zoning");
                for (var i = 0; i < elements.length; i++) {
                    elements[i].style.display = "none";
                }
            }
            return true;
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
                }
            }
            for (var i = 0; i < s_element.options.length; i++) {
                if (s_element.options[i].value == currentValue) {
                    s_element.selectedIndex = i;
                }
            }
            return true;
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
            var _resTab = document.getElementById("residentiallandanalysisTab");
            if (rbe_engine.checkElement(_resTab)) {
                if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 7) {
                    _resTab.style.display = "block";
                } else {
                    _resTab.style.display = "none";
                }
            }
            var _adjPad = document.getElementById("ruralutilitiesTab");
            if (rbe_engine.checkElement(_adjPad)) {
                if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 2) {
                    _adjPad.style.display = "block";
                } else {
                    _adjPad.style.display = "none";
                }
            }
            if (_subProType.options.length > 0) {
                var _adjPad = document.getElementById("apSFfpa");
                if (rbe_engine.checkElement(_adjPad)) {
                    if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 204 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 206) {
                        _adjPad.style.display = "block";
                    } else {
                        _adjPad.style.display = "none";
                    }
                }
                var _hideBulk = document.getElementById("hideBulk");
                if (rbe_engine.checkElement(_hideBulk)) {
                    if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 210) {
                        _hideBulk.style.display = "none";
                    } else {
                        _hideBulk.style.display = "block";
                    }
                }
            } else {
                var _adjPad = document.getElementById("apSFfpa");
                if (rbe_engine.checkElement(_adjPad)) {
                    _adjPad.style.display = "none";
                }
            }
            return true;
        },
        setSubMarket: function (_element) {
            var subMarket = this.options.subMarketArea;
            var subMarketID = _element.options[_element.selectedIndex].value;
            subMarketID = parseInt(subMarketID);
            var options = [];
            var s_element = document.getElementById("selectSubMarketArea");
            var currentValue = 0;
            if (s_element.options.length > 0) {
                currentValue = s_element.options[s_element.selectedIndex].value;
            }
            s_element.options.length = 0;
            s_element.options = [];
            for (var i = 0; i < subMarket.length; i++) {
                if (parseInt(subMarket[i].gmid) == subMarketID || parseInt(subMarket[i].gmid) == 1) {
                    s_element.options[s_element.length] = new Option(subMarket[i].submarket, subMarket[i].id);
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
                    url: "LandClone.php?id=" + object.id + "&reportType=" + reportType,
                    type: "post",
                    data: {
                        "data": JSON.stringify(object)
                    },
                    beforeSend: function () {
						
					},
                    success: function (response) {
                        window.open(page + "?id=" + response);
                        return true;
                    },
                    error: function (jqXHR, textStatus, errorThrown) {}
                });
        },
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
        addAssessed: function (_element) {
            var trElement = document.createElement("tr");
            trElement.setAttribute("id", "");
            trElement.innerHTML = "<input type='hidden' name='assessedvalueid[]' value='' />";
			trElement.innerHTML+= "<td><input type='text' name='mappage[]' class='form-control' /></td>";
			trElement.innerHTML+= "<td><input type='text' name='taxlot[]' class='form-control' /></td>";
			trElement.innerHTML+= "<td><input type='text' name='parcelno[]' class='form-control' /></td>";
			trElement.innerHTML+= "<td><input type='text' name='assessedglasf[]' class='form-control _sum _fm00t' /></td>";
			trElement.innerHTML+= "<td><input type='text' name='marketland[]' class='form-control _ppgc _sum _sumv _cfm00t' /></td>";
			trElement.innerHTML+= "<td><input type='text' name='marketimp[]' class='form-control _ppgc _sum _sumv _cfm00t' /></td>";
			trElement.innerHTML+= "<td><input type='text' name='markettotal[]' class='form-control _ppgc _sum _sumvr _cfm00t' readonly/></td>";
			trElement.innerHTML+= "<td><input type='text' name='annualtaxes[]' class='form-control _ppgc _sum _cfm02t' /></td>";
			trElement.innerHTML+= "<td><input type='button' class='_delAssessed' value='Delete' /></td>";
			
            //<td><input type='text' name='measure50[]' class='form-control _ppgc _cfm00t' /></td>
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
				
                var _elements = r_elements[r_elements.length - 2].getElementsByClassName("_cfm00t2");
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
        generateReportWord: function (_element) {
            var showPreview = 0;
            var ids = "";
            var template = "";
            var ids = aa_engine.getUrlVars()["id"];
            var templateElement = document.getElementById("_exportlsTemplate");
            if (rbe_engine.checkElement(templateElement)) {
                template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
            }
            var url = "../templates/land_sale/" + template + "?id=" + ids + "&showPreview=0";
            window.location = url;
            console.log(url);
        },
        propagadeCalcualations: function () {
            var gla_inputtype = document.getElementById("inputtypeSF").checked;
            var gla_inputsize = $(".gla_inputsize").val();
            var gla_inputsize =  + (gla_inputsize ? gla_inputsize.replace(/[^\d.-]/g, '') : gla_inputsize);
            var gross_land_sf = $(".gross_land_sf").val();
            var gross_land_sf =  + (gross_land_sf ? gross_land_sf.replace(/[^\d.-]/g, '') : gross_land_sf);
            var unusable_sf = $(".unusable_sf").val();
            var unusable_sf =  + (unusable_sf ? unusable_sf.replace(/[^\d.-]/g, '') : unusable_sf);
            var net_usable_sf = $(".net_usable_sf").val();
            var net_usable_sf =  + (net_usable_sf ? net_usable_sf.replace(/[^\d.-]/g, '') : net_usable_sf);
            var floor_area_ratio = $(".floor_area_ratio").val();
            var floor_area_ratio =  + (floor_area_ratio ? floor_area_ratio.replace(/[^\d.-]/g, '') : floor_area_ratio);
            var gl_total_project = $(".gl_total_project").val();
            var gl_total_project =  + (gl_total_project ? gl_total_project.replace(/[^\d.-]/g, '') : gl_total_project);
            var gl_leased_land_sf = $(".gl_leased_land_sf").val();
            var gl_leased_land_sf =  + (gl_leased_land_sf ? gl_leased_land_sf.replace(/[^\d.-]/g, '') : gl_leased_land_sf);
            var gl_rent_begin = $(".gl_rent_begin").val();
            var gl_rent_begin =  + (gl_rent_begin ? gl_rent_begin.replace(/[^\d.-]/g, '') : gl_rent_begin);
            var gl_rate_return = $(".gl_rate_return").val();
            var gl_rate_return =  + (gl_rate_return ? gl_rate_return.replace(/[^\d.-]/g, '') : gl_rate_return);
            var gl_fee_simple_equiv = $(".gl_fee_simple_equiv").val();
            var gl_fee_simple_equiv =  + (gl_fee_simple_equiv ? gl_fee_simple_equiv.replace(/[^\d.-]/g, '') : gl_fee_simple_equiv);
            var gl_building_footprint = $(".gl_building_footprint").val();
            var gl_building_footprint =  + (gl_building_footprint ? gl_building_footprint.replace(/[^\d.-]/g, '') : gl_building_footprint);
            var floor_1_gba = $(".floor_1_gba").val();
            var floor_1_gba =  + (floor_1_gba ? floor_1_gba.replace(/[^\d.-]/g, '') : floor_1_gba);
            var floor_2_gba = $(".floor_2_gba").val();
            var floor_2_gba =  + (floor_2_gba ? floor_2_gba.replace(/[^\d.-]/g, '') : floor_2_gba);
            var total_basement_gba = $(".total_basement_gba").val();
            var total_basement_gba =  + (total_basement_gba ? total_basement_gba.replace(/[^\d.-]/g, '') : total_basement_gba);
            var overall_gba = $(".overall_gba").val();
            var overall_gba =  + (overall_gba ? overall_gba.replace(/[^\d.-]/g, '') : overall_gba);
            var eff_sale_price_stab = $(".eff_sale_price_stab").val();
            var eff_sale_price_stab =  + (eff_sale_price_stab ? eff_sale_price_stab.replace(/[^\d.-]/g, '') : eff_sale_price_stab);
            var gross_saleprice = $(".gross_saleprice").val();
            var gross_saleprice =  + (gross_saleprice ? gross_saleprice.replace(/[^\d.-]/g, '') : gross_saleprice);
            var sale_price = $(".sale_price").val();
            var sale_price =  + (sale_price ? sale_price.replace(/[^\d.-]/g, '') : sale_price);
            var less_alloc_imp_price = $(".less_alloc_imp_price").val();
            var less_alloc_imp_price =  + (less_alloc_imp_price ? less_alloc_imp_price.replace(/[^\d.-]/g, '') : less_alloc_imp_price);
            var alloc_land_value = $(".alloc_land_value").val();
            var alloc_land_value =  + (alloc_land_value ? alloc_land_value.replace(/[^\d.-]/g, '') : alloc_land_value);
            var cash_equiv_price = $(".cash_equiv_price").val();
            var cash_equiv_price =  + (cash_equiv_price ? cash_equiv_price.replace(/[^\d.-]/g, '') : cash_equiv_price);
            var list_price = $(".list_price").val();
            var list_price =  + (list_price ? list_price.replace(/[^\d.-]/g, '') : list_price);
            var list_price = $(".list_price").val();
            var list_price =  + (list_price ? list_price.replace(/[^\d.-]/g, '') : list_price);
            var fin_term_adj = $(".fin_term_adj").val();
            var fin_term_adj =  + (fin_term_adj ? fin_term_adj.replace(/[^\d.-]/g, '') : fin_term_adj);
            var cond_sale_adj = $(".cond_sale_adj").val();
            var cond_sale_adj =  + (cond_sale_adj ? cond_sale_adj.replace(/[^\d.-]/g, '') : cond_sale_adj);
            var demo_cost = $(".demo_cost").val();
            var demo_cost =  + (demo_cost ? demo_cost.replace(/[^\d.-]/g, '') : demo_cost);
            var onsite_extra_cost = $(".onsite_extra_cost").val();
            var onsite_extra_cost =  + (onsite_extra_cost ? onsite_extra_cost.replace(/[^\d.-]/g, '') : onsite_extra_cost);
            var offsite_develop = $(".offsite_develop").val();
            var offsite_develop =  + (offsite_develop ? offsite_develop.replace(/[^\d.-]/g, '') : offsite_develop);
            var broker_cost = $(".broker_cost").val();
            var broker_cost =  + (broker_cost ? broker_cost.replace(/[^\d.-]/g, '') : broker_cost);
            var no_lots = $(".no_lots").val();
            var no_lots =  + (no_lots ? no_lots.replace(/[^\d.-]/g, '') : no_lots);
            var nohomesite = $(".nohomesite").val();
            var nohomesite =  + (nohomesite ? nohomesite.replace(/[^\d.-]/g, '') : nohomesite);
            var value_entitle = $(".value_entitle").val();
            var value_entitle =  + (value_entitle ? value_entitle.replace(/[^\d.-]/g, '') : value_entitle);
            var adj_price_finished_wo = $(".adj_price_finished_wo").val();
            var adj_price_finished_wo =  + (adj_price_finished_wo ? adj_price_finished_wo.replace(/[^\d.-]/g, '') : adj_price_finished_wo);
            var adj_price_finish_with = $(".adj_price_finish_with").val();
            var adj_price_finish_with =  + (adj_price_finish_with ? adj_price_finish_with.replace(/[^\d.-]/g, '') : adj_price_finish_with);
            var finish_lot_size_sf = $(".finish_lot_size_sf").val();
            var finish_lot_size_sf =  + (finish_lot_size_sf ? finish_lot_size_sf.replace(/[^\d.-]/g, '') : finish_lot_size_sf);
            if (document.getElementById('inputtypeSF').checked) {
                $("#glasfcalc").val(gla_inputsize).trigger('onblur');
                $("#glaacrecalc").val(gla_inputsize / 43560).trigger('onblur');
				$("#netareasf").val(gla_inputsize - unusable_sf).trigger('onblur');
				$("#netareaacre").val((gla_inputsize - unusable_sf) / 43560).trigger('onblur');
            } else {
                $("#glasfcalc").val(gla_inputsize * 43560).trigger('onblur');
                $("#glaacrecalc").val(gla_inputsize).trigger('onblur');
				$("#netareasf").val((gla_inputsize * 43560) - unusable_sf).trigger('onblur');
				$("#netareaacre").val(((gla_inputsize * 43560) - unusable_sf) / 43560).trigger('onblur');
            }
            $("#unusableacre").val(unusable_sf / 43560).trigger('onblur');/*
            $("#netareasf").val(gross_land_sf - unusable_sf).trigger('onblur');
            $("#netareaacre").val(net_usable_sf / 43560).trigger('onblur');*/
            $("#bldgfloorarea").val(net_usable_sf * floor_area_ratio).trigger('onblur');
            $("#gllandareasf").val(gross_land_sf - unusable_sf).trigger('onblur');
            $("#glrentlandsf").val(gl_rent_begin / gl_leased_land_sf).trigger('onblur');
            $("#glrentbldgsf").val(gl_rent_begin / floor_1_gba).trigger('onblur');
            $("#glfeesimple").val(gl_rent_begin / (gl_rate_return / 100)).trigger('onblur');
            $("#glfeeequiv").val((gl_rent_begin / (gl_rate_return / 100)) / gl_leased_land_sf).trigger('onblur');
            $("#glbldgfootResult").val(floor_1_gba).trigger('onblur');
            $("#totalgba").val(floor_1_gba + floor_2_gba + total_basement_gba).trigger('onblur');
            $("#glfootprint").val(floor_1_gba).trigger('onblur');
            $("#ltbusab").val(net_usable_sf / overall_gba).trigger('onblur');
            $("#scrover").val((floor_1_gba / net_usable_sf) * 100).trigger('onblur');
            $("#alloclandpriceResult").val(sale_price - less_alloc_imp_price).trigger('onblur');
            if (document.getElementById('ground_lease').checked) {
                $("#feeequivsolResult").val(gl_rent_begin / (gl_rate_return / 100)).trigger('onblur');
                $("#feeequivfield2").val(gl_rent_begin / (gl_rate_return / 100)).trigger('onblur');
                $("#cashequivResult").val((gl_rent_begin / (gl_rate_return / 100)) + fin_term_adj).trigger('onblur');
                $("#effsalepriceResult").val((gl_rent_begin / (gl_rate_return / 100)) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost).trigger('onblur');
                $("#changelistResult").val(((list_price - ((gl_rent_begin / (gl_rate_return / 100)) + fin_term_adj)) / list_price) * (-100)).trigger('onblur');
                $("#adjSPAcreGLA").val(((gl_rent_begin / (gl_rate_return / 100)) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / (gross_land_sf / 43560)).trigger('onblur');
                $("#adjBulkSP").val(((gl_rent_begin / (gl_rate_return / 100)) + fin_term_adj) + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost).trigger('onblur');
                $("#adjBulkSPunit").val((((gl_rent_begin / (gl_rate_return / 100)) + fin_term_adj) + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / no_lots).trigger('onblur');
                $("#adjBulkSPavgUnit").val(((((gl_rent_begin / (gl_rate_return / 100)) + fin_term_adj) + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / no_lots) / finish_lot_size_sf).trigger('onblur');
                $("#adjSPAcreGLA").val(((gl_rent_begin / (gl_rate_return / 100)) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / (gross_land_sf / 43560)).trigger('onblur');
                $("#adjSPAcreNet").val(((gl_rent_begin / (gl_rate_return / 100)) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / (net_usable_sf / 43560)).trigger('onblur');
                $("#adjSPSFGLA").val(((gl_rent_begin / (gl_rate_return / 100)) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / gross_land_sf).trigger('onblur');
                $("#adjSPSFNet").val(((gl_rent_begin / (gl_rate_return / 100)) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / net_usable_sf).trigger('onblur');
                $("#adjSPBldgPad").val(((gl_rent_begin / (gl_rate_return / 100)) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / gl_building_footprint).trigger('onblur');
                $("#adjSPMaxFAR").val((((gl_rent_begin / (gl_rate_return / 100)) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / net_usable_sf) / floor_area_ratio).trigger('onblur');
            } else {
                $("#feeequivsolResult").val(sale_price - less_alloc_imp_price).trigger('onblur');
                $("#feeequivfield2").val(sale_price - less_alloc_imp_price).trigger('onblur');
                $("#cashequivResult").val((sale_price - less_alloc_imp_price) + fin_term_adj).trigger('onblur');
                $("#effsalepriceResult").val((sale_price - less_alloc_imp_price) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost).trigger('onblur');
                $("#changelistResult").val(((list_price - ((sale_price - less_alloc_imp_price) + fin_term_adj)) / list_price) * (-100)).trigger('onblur');
                $("#adjSPAcreGLA").val(((sale_price - less_alloc_imp_price) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / (gross_land_sf / 43560)).trigger('onblur');
                $("#adjBulkSP").val(((sale_price - less_alloc_imp_price) + fin_term_adj) + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost).trigger('onblur');
                $("#adjBulkSPunit").val((((sale_price - less_alloc_imp_price) + fin_term_adj) + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / no_lots).trigger('onblur');
                $("#adjBulkSPavgUnit").val(((((sale_price - less_alloc_imp_price) + fin_term_adj) + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / no_lots) / finish_lot_size_sf).trigger('onblur');
                $("#adjSPAcreGLA").val(((sale_price - less_alloc_imp_price) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / (gross_land_sf / 43560)).trigger('onblur');
                $("#adjSPAcreNet").val(((sale_price - less_alloc_imp_price) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / (net_usable_sf / 43560)).trigger('onblur');
                $("#adjSPSFGLA").val(((sale_price - less_alloc_imp_price) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / gross_land_sf).trigger('onblur');
                $("#adjSPSFNet").val(((sale_price - less_alloc_imp_price) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / net_usable_sf).trigger('onblur');
                $("#adjSPBldgPad").val(((sale_price - less_alloc_imp_price) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / gl_building_footprint).trigger('onblur');
                $("#adjSPMaxFAR").val((((sale_price - less_alloc_imp_price) + fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost) / net_usable_sf) / floor_area_ratio).trigger('onblur');
            }
            $("#glfeesimpInput").val(alloc_land_value + (gl_rent_begin / (gl_rate_return / 100))).trigger('onblur');
            $("#unadjsaleprice").val(sale_price - less_alloc_imp_price).trigger('onblur');
            $("#netdevlandResult").val(net_usable_sf).trigger('onblur');
            $("#unitdensityResult").val(no_lots / ((gross_land_sf - unusable_sf) / 43560)).trigger('onblur');
            $("#bulkentitleResult").val(cond_sale_adj).trigger('onblur');
            $("#entitleperlotResult").val(cond_sale_adj / no_lots).trigger('onblur');
            $("#adjpricefinishedwoResult").val(alloc_land_value + gl_fee_simple_equiv + fin_term_adj).trigger('onblur');
            $("#adjpricelotwoResult").val(adj_price_finished_wo / no_lots).trigger('onblur');
            $("#adjpricenetacrewoResult").val(adj_price_finished_wo / (net_usable_sf / 43560)).trigger('onblur');
            $("#adjpricenetsfwoResult").val(adj_price_finished_wo / net_usable_sf).trigger('onblur');
            $("#adjpricewithResult").val(adj_price_finished_wo + value_entitle).trigger('onblur');
            $("#adjpriceperunitwithResult").val(adj_price_finish_with / no_lots).trigger('onblur');
            $("#adjpricenetacrewithResult").val(adj_price_finish_with / (net_usable_sf / 43560)).trigger('onblur');
            $("#adjpricenetsfwithResult").val(adj_price_finish_with / net_usable_sf).trigger('onblur');
			$("#adjhomesite").val(eff_sale_price_stab / nohomesite).trigger('onblur');
            var _elements = document.getElementsByClassName("calc");
            for (var i = 0; i < _elements.length; i++) {
                if (_elements[i].value.indexOf("-") == -1) {
                    _elements[i].style.color = "#555";
                } else {
                    _elements[i].style.color = "red";
                }
            }
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
        showErrorMessage: function (message) {}
    };
    _landsalesController.setOptions(options);
    return _landsalesController;
}
