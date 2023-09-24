var _improvedsalesController = function (options) {
    var _improvedsalesController;
    var rbe_engine = new _rbe_engine();
    _improvedsalesController = {
        options: {
            activeObject: "",
            id: "",
            latitude: "",
            longitude: "",
            subMarketArea: "",
            subProperty: "",
            data: "",
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
            this.baseController = new _baseController({
                    activeObject: this.options.activeObject + ".baseController",
                    data: this.options.data,
                    mapType: "improved_sales"
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
            var _elements = document.getElementById("assessed_table").querySelectorAll("tbody tr ._sumv");
            for (var i = 0; i < _elements.length; i++) {
                this.sumValuesVerticaly(_elements[i]);
            }
            var _elements = document.getElementById("mf_table").querySelectorAll("tbody tr ._devres");
            for (var i = 0; i < _elements.length; i++) {
				//console.log(_elements[i]);
                this.devideValues(_elements[i]);
            }
			
			this.sumBedrooms();
			this.sumUnits();
            this.mapController.init();
        },
        assignEvents: function () {
            var _elements = document.getElementsByClassName("_addMFunit");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".addMFunit(this);");
                }
            }
            var _elements = document.getElementsByClassName("_delMFunit");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onClick", _elements[i].getAttribute("onClick") + ";" + this.options.activeObject + ".deleteMFunit(this);");
                }
            }
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
            var _element = document.getElementById("emdomain");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".setListEmDomain(this);");
                this.setListEmDomain(_element);
            }
            var _elements = document.getElementsByClassName("_fm03t");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,3,true);");
                    _elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 3, true);
                }
            }
            var _elements = document.getElementsByClassName("_fm02t");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,2,true);");
                    _elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 2, true);
                }
            }
            var _elements = document.getElementsByClassName("_fm00f");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,0,false);");
                    _elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 0, false);
                }
            }
            var _elements = document.getElementsByClassName("_fm06fp");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,6,true)+' %';");
                    _elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 6, true) + ' %';
                }
            }
            var _elements = document.getElementsByClassName("_fm00t");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,0,true);");
                    _elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 0, true);
                }
            }
            var _elements = document.getElementsByClassName("_fm01t");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,1,true);");
                    _elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 1, true);
                }
            }
            var _elements = document.getElementsByClassName("_cfm00t");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = '$ '+aa_engine.formatNumber(this.value,0,0,true);");
                    _elements[i].value = '$ ' + aa_engine.formatNumber(_elements[i].value, 0, 0, true);
                }
            }
            var _elements = document.getElementsByClassName("_cfm02t");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = '$ '+aa_engine.formatNumber(this.value,0,2,true);");
                    _elements[i].value = '$ ' + aa_engine.formatNumber(_elements[i].value, 0, 2, true);
                }
            }
            var _elements = document.getElementsByClassName("_fm01tp");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,1,true)+' %';");
                    _elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 1, true) + ' %';
                }
            }
            var _elements = document.getElementsByClassName("_fm02tp");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,2,true)+' %';");
                    _elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 2, true) + ' %';
                }
            }
            var _elements = document.getElementsByClassName("_fm01tr");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,1,true)+' to 1';");
                    _elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 1, true) + ' to 1';
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
            var _element = document.getElementById("inputtypeSF");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onBlur") + ";aa_engine.changeFormat('gla_inputsize',0,0,true);");
            }
            var _element = document.getElementById("Acre");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onBlur") + ";aa_engine.changeFormat('gla_inputsize',0,3,true);");
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
            var _element = document.getElementById("property_appraised");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", _element.getAttribute("onClick") + ";" + this.options.activeObject + ".setPropertyAppraised(this);");
                this.setPropertyAppraised(_element);
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
            var _element = document.getElementById("incffe");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".toggleFFE(this);");
                this.toggleFFE(_element);
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
            var _element = document.getElementById("onlyNOI");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".toggleNOI(this);");
                this.toggleNOI(_element);
            }
            var _element = document.getElementById("lpAvail");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".toggleList(this);");
                this.toggleList(_element);
            }
            var _element = document.getElementById("propapp");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onClick", this.options.activeObject + ".togglepropapp(this);");
                this.togglepropapp(_element);
            }
            var _element = document.getElementById("isCanopy");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", this.options.activeObject + ".togglecanopy(this);");
                this.togglecanopy(_element);
            }
            var _element = document.getElementById("pusechange");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", this.options.activeObject + ".togglepuc(this);");
                this.togglepuc(_element);
            }
            var _element = document.getElementById("floodplain");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", this.options.activeObject + ".togglefp(this);");
                this.togglefp(_element);
            }
            var _element = document.getElementById("easement");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", this.options.activeObject + ".toggleease(this);");
                this.toggleease(_element);
            }
            var _element = document.getElementById("manres");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", this.options.activeObject + ".togglemgrres(this);");
                this.togglemgrres(_element);
            }
            var _element = document.getElementById("railds");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", this.options.activeObject + ".togglemrdoor(this);");
                this.togglemrdoor(_element);
            }
            var _element = document.getElementById("mezzsf");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", this.options.activeObject + ".togglemezz(this);");
                this.togglemezz(_element);
            }
			
			var _elements = document.getElementById("mf_table").querySelectorAll("tbody tr ._noofunits");
            for (var i = 0; i < _elements.length; i++) {
				 _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumBedrooms();");
				 _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumUnits();");
            }
			
			var _elements = document.getElementById("mf_table").querySelectorAll("tbody tr ._noofbr");
            for (var i = 0; i < _elements.length; i++) {
				 _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumBedrooms();");
            }
        },
		sumUnits: function(){
			var __element = document.querySelector(".total_no_units");
			var _value = 0;
			var _elements = document.getElementById("mf_table").querySelectorAll("tbody tr ._noofunits");
            for (var i = 0; i < _elements.length; i++) {
				//console.log(_elements[i]);
				var a_element = _elements[i].parentNode.parentNode.querySelector("._noofunits");
				if (rbe_engine.checkElement(__element) && rbe_engine.checkElement(a_element)){
					var a_value =  a_element.value.replace(/\,|\.|\$/gi,"");

					_value+=parseInt(a_value);
					
				}
            }
			__element.value = _value;
		},
		sumBedrooms: function(){
			var __element = document.querySelector(".total_bedroom");
			var _value = 0;
			var _elements = document.getElementById("mf_table").querySelectorAll("tbody tr ._noofunits");
            for (var i = 0; i < _elements.length; i++) {
				//console.log(_elements[i]);
				var a_element = _elements[i].parentNode.parentNode.querySelector("._noofunits");
				var b_element = _elements[i].parentNode.parentNode.querySelector("._noofbr");
				if (rbe_engine.checkElement(__element) && rbe_engine.checkElement(a_element) && rbe_engine.checkElement(b_element)){
					var a_value =  a_element.value.replace(/\,|\.|\$/gi,"");
					var b_value =  b_element.value.replace(/\,|\.|\$/gi,"");

					_value+=parseFloat(a_value * b_value);
					
				}
            }
			__element.value = _value;
			this.getNumberFormat(__element,_value);
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
        togglemezz: function (_element) {
            var _elements = document.querySelectorAll("#propertytype ._stormz");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.options[_element.selectedIndex].value == '2') {
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
                }
            }
            return true;
        },
        togglemrdoor: function (_element) {
            var _elements = document.querySelectorAll("#propertytype ._rails");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.options[_element.selectedIndex].value == '2') {
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
                }
            }
            return true;
        },
        togglemgrres: function (_element) {
            var _elements = document.querySelectorAll("#propertytype ._mgrres");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.options[_element.selectedIndex].value == '2') {
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
                }
            }
            return true;
        },
        togglepuc: function (_element) {
            var _elements = document.querySelectorAll("#transationdata ._pudesc");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.options[_element.selectedIndex].value == '2') {
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
                }
            }
            return true;
        },
        togglefp: function (_element) {
            var _elements = document.querySelectorAll("#landdata ._fppanel");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.options[_element.selectedIndex].value == '2') {
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
                }
            }
            return true;
        },
        toggleease: function (_element) {
            var _elements = document.querySelectorAll("#landdata ._easement");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.options[_element.selectedIndex].value == '2') {
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
                }
            }
            return true;
        },
        togglecanopy: function (_element) {
            var _elements = document.querySelectorAll("#propertytype ._canopyDesc");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.options[_element.selectedIndex].value == '2') {
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
                }
            }
            return true;
        },
        togglepropapp: function (_element) {
            var _elements = document.querySelectorAll("#transationdata ._propapp");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
                }
            }
            return true;
        },
        toggleList: function (_element) {
            var _elements = document.querySelectorAll("#transationdata ._listPrice");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].value = 0;
                    _elements[i].style.display = "block";
                } else {
                    _elements[i].style.display = "none";
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
				var _elements = document.getElementsByClassName("_emdomainsection");
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].style.display = "block";
                }
            } else {
                var _elements = document.getElementsByClassName("_emdomain");
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].style.display = "none";
                }
				var _elements = document.getElementsByClassName("_emdomainsection");
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].style.display = "none";
                }
            }
            return true;
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
        toggleNOI: function (_element) {
            var _elements = document.querySelectorAll("#operatingexpenses ._onlyNOI");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].value = 0;
                    _elements[i].style.display = "none";
                } else {
                    _elements[i].style.display = "block";
                }
            }
            var _elements = document.querySelectorAll("#operatingexpenses .calc.oe_total_noi");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].readOnly = false;
                } else {
                    _elements[i].readOnly = "true";
                }
            }
            var _elements = document.querySelectorAll("#operatingexpenses .calc.oe_pgr");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].value = "$ 0";
                }
            }
            var _elements = document.querySelectorAll("#operatingexpenses .calc.oe_cam_income");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].value = "$ 0";
                }
            }
            var _elements = document.querySelectorAll("#operatingexpenses .calc.oe_misc_income");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].value = "$ 0";
                }
            }
            var _elements = document.querySelectorAll("#operatingexpenses .calc.oe_vacany_pct");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].value = "0.000000 %";
                }
            }
            var _elements = document.querySelectorAll("#operatingexpenses .calc.oe_other_income");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].value = "$ 0";
                }
            }
            var _elements = document.querySelectorAll("#operatingexpenses .calc.oe_expences");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].value = "$ 0";
                }
            }
            var _elements = document.querySelectorAll("#operatingexpenses .calc.oe_pgi");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].value = "$ 0";
                }
            }
            var _elements = document.querySelectorAll("#operatingexpenses .calc.oe_vacancy_credit_loss");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].value = "$ 0";
                }
            }
            var _elements = document.querySelectorAll("#operatingexpenses .calc.oe_egi");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].value = "$ 0";
                }
            }
            var _elements = document.querySelectorAll("#operatingexpenses .calc.oe_total_other_income");
            for (var i = 0; i < _elements.length; i++) {
                if (_element.checked) {
                    _elements[i].value = "$ 0";
                }
            }
            return true;
        },
        toggleFFE: function (_element) {
            var _elements = document.querySelectorAll("._togffe");
            for (var i = 0; i < _elements.length; i++) {
                if (parseInt(_element.options[_element.selectedIndex].value) == 2) {
                    _elements[i].style.display = "block";
                } else {
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
            if (_subProType.options.length > 0) {
                var _showpttab = document.getElementById("proptypeTab");
                if (rbe_engine.checkElement(_showpttab)) {
                    if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 6 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 11 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 12 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 13 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 14 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 15 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 16 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 17 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 18 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 60 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 61 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 62 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 63 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 64 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 65 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 66 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 67 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 68 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 69 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 70 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 71 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 72 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 73 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 74 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 75 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 76 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 77 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 78 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 79 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 80 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 81 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 82 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 83 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 84 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 86 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 87 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 88 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 89 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 90 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 91 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 92 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 93 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 95 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 96 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 97 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 98 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 99 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 100 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 106 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 107 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 113 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 55 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 56 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 35 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 36 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 34 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 49 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 50 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 51 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 54 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 44 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 45 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 46 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 47 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 85) {
                        _showpttab.style.display = "block";
                    } else {
                        _showpttab.style.display = "none";
                    }
                }
                var _industrial = document.querySelectorAll(".PDIndustrial");
                if (rbe_engine.checkElement(_industrial)) {
                    for (var i = 0; i < _industrial.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 60 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 61 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 62 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 63 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 64 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 65 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 66 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 67 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 68 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 69 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 70 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 71 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 72 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 73 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 74 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 75 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 76 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 77 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 78 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 79 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 80 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 81 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 82 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 83 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 84 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 86 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 87 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 88 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 89 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 90 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 91 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 92 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 93 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 106 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 107 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 113) {
                            _industrial[i].style.display = "flex";
                        } else {
                            _industrial[i].style.display = "none";
                        }
                    }
                }
                var _sergas = document.querySelectorAll("._sergas");
                if (rbe_engine.checkElement(_industrial)) {
                    for (var i = 0; i < _sergas.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 55) {
                            _sergas[i].style.display = "block";
                        } else {
                            _sergas[i].style.display = "none";
                        }
                    }
                }
                var _showdep = document.getElementById("deprectionanalysis");
                if (rbe_engine.checkElement(_showdep)) {
                    if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 161 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 160 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 158 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 159) {
                        _showdep.style.display = "flex";
                    } else {
                        _showdep.style.display = "none";
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
                var _mfTab = document.getElementById("unitTab");
                if (rbe_engine.checkElement(_mfTab)) {
                    if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 85 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 95 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 96 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 97 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 98 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 99 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 100) {
                        _mfTab.style.display = "block";
                    } else {
                        _mfTab.style.display = "none";
                    }
                }
                var _unitmat = document.getElementById("unitMix");
                if (rbe_engine.checkElement(_unitmat)) {
                    if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 95 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 96 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 97 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 98 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 99 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 85) {
                        _unitmat.style.display = "block";
                    } else {
                        _unitmat.style.display = "none";
                    }
                }
                var _mobhome = document.getElementById("mobilehomepark");
                if (rbe_engine.checkElement(_mobhome)) {
                    if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 100) {
                        _mobhome.style.display = "block";
                    } else {
                        _mobhome.style.display = "none";
                    }
                }
                var _unamen = document.getElementById("amenunit");
                if (rbe_engine.checkElement(_unamen)) {
                    if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 85) {
                        _unamen.style.display = "none";
                    } else {
                        _unamen.style.display = "block";
                    }
                }
                var _sstor = document.querySelectorAll(".selfstor");
                if (rbe_engine.checkElement(_sstor)) {
                    for (var i = 0; i < _sstor.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 85) {
                            _sstor[i].style.display = "none";
                        } else {
                            _sstor[i].style.display = "flex";
                        }
                    }
                }
                var _sstor = document.querySelectorAll(".selfstorTab");
                if (rbe_engine.checkElement(_sstor)) {
                    for (var i = 0; i < _sstor.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 85 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 95 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 96 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 97 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 98 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 99) {
                            _sstor[i].style.display = "block";
                        } else {
                            _sstor[i].style.display = "none";
                        }
                    }
                }
                var _mfshow = document.querySelectorAll("._mulfam");
                if (rbe_engine.checkElement(_mfshow)) {
                    for (var i = 0; i < _mfshow.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 95 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 96 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 97 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 98 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 99 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 100) {
                            _mfshow[i].style.display = "block";
                        } else {
                            _mfshow[i].style.display = "none";
                        }
                    }
                }
                var _mfhide = document.querySelectorAll("._mulfamhide");
                if (rbe_engine.checkElement(_mfhide)) {
                    for (var i = 0; i < _mfhide.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 95 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 96 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 97 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 98 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 99) {
                            _mfhide[i].style.display = "none";
                        } else {
                            _mfhide[i].style.display = "block";
                        }
                    }
                }
                var _nomobhome = document.querySelectorAll(".nomobhome");
                if (rbe_engine.checkElement(_nomobhome)) {
                    for (var i = 0; i < _nomobhome.length; i++) {
                        if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 100) {
                            _nomobhome[i].style.display = "none";
                        } else {
                            _nomobhome[i].style.display = "flex";
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
                var _showdep = document.getElementById("deprectionanalysis");
                if (rbe_engine.checkElement(_showdep)) {
                    _showdep.style.display = "none";
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
                var _sfres = document.querySelectorAll("._sfres");
                if (rbe_engine.checkElement(_sfres)) {
                    for (var i = 0; i < _sfres.length; i++) {
                        _sfres[i].style.display = "none";
                    }
                }
                var _sbortun = document.querySelectorAll("._nosbtun");
                if (rbe_engine.checkElement(_sbortun)) {
                    for (var i = 0; i < _sbortun.length; i++) {
                        _sbortun[i].style.display = "none";
                    }
                }
                var _mfTab = document.getElementById("unitTab");
                if (rbe_engine.checkElement(_mfTab)) {
                    _mfTab.style.display = "none";
                }
                var _unitmat = document.getElementById("unitMix");
                if (rbe_engine.checkElement(_unitmat)) {
                    _unitmat.style.display = "none";
                }
                var _unmatrix = document.getElementById("Unitmatrix");
                if (rbe_engine.checkElement(_unmatrix)) {
                    _unmatrix.className += " " + "";
                }
                var _mobhome = document.getElementById("mhPark");
                if (rbe_engine.checkElement(_mobhome)) {
                    _mobhome.style.display = "none";
                }
                var _mobpark = document.getElementById("mobilehomepark");
                if (rbe_engine.checkElement(_mobpark)) {
                    _mobpark.className += " " + "";
                }
                var _unamen = document.getElementById("amenunit");
                if (rbe_engine.checkElement(_unamen)) {
                    _unamen.style.display = "block";
                }
                var _sstor = document.querySelectorAll(".selfstor");
                if (rbe_engine.checkElement(_sstor)) {
                    for (var i = 0; i < _sstor.length; i++) {
                        _sstor[i].style.display = "none";
                    }
                }
                var _sstor = document.querySelectorAll(".selfstorTab");
                if (rbe_engine.checkElement(_sstor)) {
                    for (var i = 0; i < _sstor.length; i++) {
                        _sstor[i].style.display = "none";
                    }
                }
                var _mfshow = document.querySelectorAll("._mulfam");
                if (rbe_engine.checkElement(_mfshow)) {
                    for (var i = 0; i < _mfshow.length; i++) {
                        _mfshow[i].style.display = "none";
                    }
                }
                var _mfhide = document.querySelectorAll("._mulfamhide");
                if (rbe_engine.checkElement(_mfhide)) {
                    for (var i = 0; i < _mfhide.length; i++) {
                        _mfhide[i].style.display = "block";
                    }
                }
                var _nomobhome = document.querySelectorAll(".nomobhome");
                if (rbe_engine.checkElement(_nomobhome)) {
                    for (var i = 0; i < _nomobhome.length; i++) {
                        _nomobhome[i].style.display = "block";
                    }
                }
            }
            var _office = document.querySelectorAll(".PDOffice");
            if (rbe_engine.checkElement(_office)) {
                for (var i = 0; i < _office.length; i++) {
                    if (parseInt(_ProType.options[_ProType.selectedIndex].value) == '6') {
                        _office[i].style.display = "block";
                    } else {
                        _office[i].style.display = "none";
                    }
                }
            }
            var _nomultifam = document.querySelectorAll("._nomultifam");
            if (rbe_engine.checkElement(_nomultifam)) {
                for (var i = 0; i < _nomultifam.length; i++) {
                    if (parseInt(_ProType.options[_ProType.selectedIndex].value) == '5') {
                        _nomultifam[i].style.display = "none";
                    } else {
                        _nomultifam[i].style.display = "block";
                    }
                }
            }
            var _onlyNOIMF = document.querySelectorAll("._onlyNOIMF");
            if (rbe_engine.checkElement(_onlyNOIMF)) {
                for (var i = 0; i < _onlyNOIMF.length; i++) {
                    if (parseInt(_ProType.options[_ProType.selectedIndex].value) == '5') {
                        _onlyNOIMF[i].style.display = "block";
                    } else {
                        _onlyNOIMF[i].style.display = "none";
                    }
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
            var currentValue = s_element.options[s_element.selectedIndex].value;
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
                    url: "ImpClone.php?id=" + object.id + "&reportType=" + reportType,
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
        generateReportWord: function (_element) {
            var showPreview = 0;
            var ids = "";
            var template = "";
            var ids = aa_engine.getUrlVars()["id"];
            var templateElement = document.getElementById("_exportlsTemplate");
            if (rbe_engine.checkElement(templateElement)) {
                template = templateElement.options[templateElement.selectedIndex].getAttribute("data-tpath");
            }
            var url = "../templates/improved_sales/" + template + "?id=" + ids + "&showPreview=0";
            window.location = url;
            console.log(url);
        },
        addMFunit: function (_element) {
            var trElement = document.createElement("tr");
            trElement.setAttribute("id", "");
            trElement.innerHTML = "<input type='hidden' name='mfvalueid[]' value='' /><td><input type='text' name='mfnounits[]' class='form-control _noofunits _fm00t' value=''/></td><td><input type='text' list='MFUnitType' name='mfsize[]' class='form-control' value=''/></td><td><input type='text' name='mfnobr[]' class='form-control _ppgc _noofbr _fm00t' value=''/></td><td><input type='text' name='mftotalsf[]' class='form-control _ppgc _dev _fm00t' value=''/></td><td><input type='text' name='mfrent[]' class='form-control _ppgc _devsor _cfm00t' value=''/></td><td><input type='text' name='mfrentsf[]' class='form-control _ppgc _devres _cfm02t' value='' readonly /></td><td><input type='button' class='_delMFunit' value='Delete' /></td>";
            var r_elements = document.querySelectorAll("#mf_table tbody");
            if (rbe_engine.checkElement(r_elements)) {
				r_elements[0].appendChild(trElement);	
                var r_elements = document.querySelectorAll("#mf_table tbody tr");
                var _elements = r_elements[r_elements.length - 1].getElementsByClassName("_cfm00t");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                        this.getNumberFormat(_elements[i], _elements[i].value);
                        //_elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumValues(this);");
                    }
                }
                var _elements = r_elements[r_elements.length - 1].getElementsByClassName("_cfm02t");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                        this.getNumberFormat(_elements[i], _elements[i].value);
                        //_elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumValues(this);");
                    }
                }
                var _elements = r_elements[r_elements.length - 1].getElementsByClassName("_fm00t");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                        this.getNumberFormat(_elements[i], _elements[i].value);
                        //_elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumValues(this);");
                    }
                }
                var _elements = r_elements[r_elements.length - 1].getElementsByClassName("_ppgc");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".propagadeCalcualations();");
                        //_elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumValues(this);");
                    }
                }
                var _elements = r_elements[r_elements.length - 1].getElementsByClassName("_delMFunit");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onClick", _elements[i].getAttribute("onClick") + ";" + this.options.activeObject + ".deleteMFunit(this);");
                    }
                }
				
				var _elements = r_elements[r_elements.length - 1].getElementsByClassName("_devsor");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".devideValues(this);");
                    }
                }
				
				var _elements = r_elements[r_elements.length - 1].getElementsByClassName("_dev");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".devideValues(this);");
                    }
                }
				
				var _elements = r_elements[r_elements.length - 1].getElementsByClassName("_noofunits");
				for (var i = 0; i < _elements.length; i++) {
					 _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumBedrooms();");
					 _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumUnits();");
					 
				}

				var _elements = r_elements[r_elements.length - 1].getElementsByClassName("_noofbr");
				for (var i = 0; i < _elements.length; i++) {
					 _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumBedrooms();");
				}
				
            }
        },
		devideValues: function(_element){
			var __element = _element.parentNode.parentNode.querySelector("._devres");
			var dv_element = _element.parentNode.parentNode.querySelector("._devsor");
			var d_element = _element.parentNode.parentNode.querySelector("._dev");
			if (rbe_engine.checkElement(__element) && rbe_engine.checkElement(d_element) && rbe_engine.checkElement(dv_element)){
				var d_value =  d_element.value.replace(/\,|\.|\$/gi,"");
				var dv_value =  dv_element.value.replace(/\,|\.|\$/gi,"");
         
				if(d_value==0 || dv_value==0){
					__element.value = 0;
				}
				console.log(dv_value+" "+d_value+" "+(dv_value / d_value));
				__element.value = parseFloat(dv_value / d_value);
				this.getNumberFormat(__element,__element.value);
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
            if (format.charAt(5) == "5") {
                result += ' %';
            }
            if (format.charAt(5) == "r") {
                result += ' to 1';
            }
            _element.value = result;
            return result;
        },
        deleteMFunit: function (_element) {
            _element.parentNode.parentNode.parentNode.removeChild(_element.parentNode.parentNode);
            var _element = document.getElementById("mf_table");
            if (rbe_engine.checkElement(_element)) {
                var rows = _element.querySelectorAll("tbody tr");
                var cells = rows[0].querySelectorAll("td ._sum");
                /*for (var i = 0; i < cells.length; i++) {
                    this.sumValues(cells[i]);
                }*/
            }
			this.sumUnits();
			this.sumBedrooms();
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
                                for (var i = 1; i < rows.length; i++) {
                                    if (rows[i].hasAttribute("data-selected")) {
                                        _rowElement = rows[i];
                                        continue;
                                    }
                                }
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
                                var rows = document.querySelectorAll("#" + type + "_table tbody >tr");
                                for (var i = 1; i < rows.length; i++) {
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
                            }
                        }
                    ]
                });
            }
        },
        getActionType: function (_element) {
            return this.baseController.getActionType(_element);
        },
        assignSelectRowsEvents: function (element) {
            var rows = document.querySelectorAll("._table tbody >tr .selectable");
            for (var i = 0; i < rows.length; i++) {
                rows[i].setAttribute("onClick", this.options.activeObject + ".selectTableRow(this);");
            }
        },
        selectTableRow: function (element) {
            rbe_engine.removeClass(element.parentNode.parentNode.children, "selectedRow");
            for (var i = 0; i < element.parentNode.parentNode.children.length; i++) {
                element.parentNode.parentNode.children[i].removeAttribute("data-selected");
            }
            rbe_engine.addClass(element.parentNode, "selectedRow");
            element.parentNode.setAttribute("data-selected", true);
        },
        propagadeCalcualations: function () {
            var gla_inputtype = document.getElementById("inputtypeSF").checked;
            var gla_inputsize = $(".gla_inputsize").val();
            var gla_inputsize =  + (gla_inputsize ? gla_inputsize.replace(/[^\d.-]/g, '') : gla_inputsize);
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
            var primary_sf = $(".primary_sf").val();
            var primary_sf =  + (primary_sf ? primary_sf.replace(/[^\d.-]/g, '') : primary_sf);
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
            var oe_only_noi = document.getElementById("onlyNOI").checked;
            var oe_pgr = $(".oe_pgr").val();
            var oe_pgr =  + (oe_pgr ? oe_pgr.replace(/[^\d.-]/g, '') : oe_pgr);
            var oe_pgi = $(".oe_pgi").val();
            var oe_pgi =  + (oe_pgi ? oe_pgi.replace(/[^\d.-]/g, '') : oe_pgi);
            var oe_vacancy_credit_loss = $(".oe_vacancy_credit_loss").val();
            var oe_vacancy_credit_loss =  + (oe_vacancy_credit_loss ? oe_vacancy_credit_loss.replace(/[^\d.-]/g, '') : oe_vacancy_credit_loss);
            var oe_egi = $(".oe_egi").val();
            var oe_egi =  + (oe_egi ? oe_egi.replace(/[^\d.-]/g, '') : oe_egi);
            var oe_cam_income = $(".oe_cam_income").val();
            var oe_cam_income =  + (oe_cam_income ? oe_cam_income.replace(/[^\d.-]/g, '') : oe_cam_income);
            var oe_misc_income = $(".oe_misc_income").val();
            var oe_misc_income =  + (oe_misc_income ? oe_misc_income.replace(/[^\d.-]/g, '') : oe_misc_income);
            var oe_vacany_pct = $(".oe_vacany_pct").val();
            var oe_vacany_pct =  + (oe_vacany_pct ? oe_vacany_pct.replace(/[^\d.-]/g, '') : oe_vacany_pct);
            var oe_other_income = $(".oe_other_income").val();
            var oe_other_income =  + (oe_other_income ? oe_other_income.replace(/[^\d.-]/g, '') : oe_other_income);
            var oe_expences = $(".oe_expences").val();
            var oe_expences =  + (oe_expences ? oe_expences.replace(/[^\d.-]/g, '') : oe_expences);
            var oe_total_noi = $(".oe_total_noi").val();
            var oe_total_noi =  + (oe_total_noi ? oe_total_noi.replace(/[^\d.-]/g, '') : oe_total_noi);
            var sale_price = $(".sale_price").val();
            var sale_price =  + (sale_price ? sale_price.replace(/[^\d.-]/g, '') : sale_price);
            var list_price = $(".list_price").val();
            var list_price =  + (list_price ? list_price.replace(/[^\d.-]/g, '') : list_price);
            var fin_term_adj = $(".fin_term_adj").val();
            var fin_term_adj =  + (fin_term_adj ? fin_term_adj.replace(/[^\d.-]/g, '') : fin_term_adj);
            var cond_sale_adj = $(".cond_sale_adj").val();
            var cond_sale_adj =  + (cond_sale_adj ? cond_sale_adj.replace(/[^\d.-]/g, '') : cond_sale_adj);
            var excess_surplus_value = $(".excess_surplus_value").val();
            var excess_surplus_value =  + (excess_surplus_value ? excess_surplus_value.replace(/[^\d.-]/g, '') : excess_surplus_value);
            var defer_maint_cost = $(".defer_maint_cost").val();
            var defer_maint_cost =  + (defer_maint_cost ? defer_maint_cost.replace(/[^\d.-]/g, '') : defer_maint_cost);
            var add_ti_cost = $(".add_ti_cost").val();
            var add_ti_cost =  + (add_ti_cost ? add_ti_cost.replace(/[^\d.-]/g, '') : add_ti_cost);
            var broker_cost = $(".broker_cost").val();
            var broker_cost =  + (broker_cost ? broker_cost.replace(/[^\d.-]/g, '') : broker_cost);
            var stabil_cost = $(".stabil_cost").val();
            var stabil_cost =  + (stabil_cost ? stabil_cost.replace(/[^\d.-]/g, '') : stabil_cost);
            var value_ffe = $(".value_ffe").val();
            var value_ffe =  + (value_ffe ? value_ffe.replace(/[^\d.-]/g, '') : value_ffe);
            var underlying_land_value_primary = $(".underlying_land_value_primary").val();
            var underlying_land_value_primary =  + (underlying_land_value_primary ? underlying_land_value_primary.replace(/[^\d.-]/g, '') : underlying_land_value_primary);
            var replace_cost = $(".replace_cost").val();
            var replace_cost =  + (replace_cost ? replace_cost.replace(/[^\d.-]/g, '') : replace_cost);
            var eff_age_years = $(".eff_age_years").val();
            var eff_age_years =  + (eff_age_years ? eff_age_years.replace(/[^\d.-]/g, '') : eff_age_years);
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
            var total_bedroom = $(".total_bedroom").val();
            var total_bedroom =  + (total_bedroom ? total_bedroom.replace(/[^\d.-]/g, '') : total_bedroom);
            var total_no_units = $(".total_no_units").val();
            var total_no_units =  + (total_no_units ? total_no_units.replace(/[^\d.-]/g, '') : total_no_units);
            var no_single_wide = $(".no_single_wide").val();
            var no_single_wide =  + (no_single_wide ? no_single_wide.replace(/[^\d.-]/g, '') : no_single_wide);
            var no_double_wide = $(".no_double_wide").val();
            var no_double_wide =  + (no_double_wide ? no_double_wide.replace(/[^\d.-]/g, '') : no_double_wide);
            var no_triple_wide = $(".no_triple_wide").val();
            var no_triple_wide =  + (no_triple_wide ? no_triple_wide.replace(/[^\d.-]/g, '') : no_triple_wide);
            var no_rv_space = $(".no_rv_space").val();
            var no_rv_space =  + (no_rv_space ? no_rv_space.replace(/[^\d.-]/g, '') : no_rv_space);
            var est_rcn = $(".est_rcn").val();
            var est_rcn =  + (est_rcn ? est_rcn.replace(/[^\d.-]/g, '') : est_rcn);
            var less_alloc_imp_price = $(".less_alloc_imp_price").val();
            var less_alloc_imp_price =  + (less_alloc_imp_price ? less_alloc_imp_price.replace(/[^\d.-]/g, '') : less_alloc_imp_price);
            var physical_depreciation = $(".physical_depreciation").val();
            var physical_depreciation =  + (physical_depreciation ? physical_depreciation.replace(/[^\d.-]/g, '') : physical_depreciation);
            var alloc_imp_value = $(".alloc_imp_value").val();
            var alloc_imp_value =  + (alloc_imp_value ? alloc_imp_value.replace(/[^\d.-]/g, '') : alloc_imp_value);
            var avg_month_rent_unit = $(".avg_month_rent_unit").val();
            var avg_month_rent_unit =  + (avg_month_rent_unit ? avg_month_rent_unit.replace(/[^\d.-]/g, '') : avg_month_rent_unit);
            var avg_unit_size = $(".avg_unit_size").val();
            var avg_unit_size =  + (avg_unit_size ? avg_unit_size.replace(/[^\d.-]/g, '') : avg_unit_size);
            if (document.getElementById('inputtypeSF').checked) {
                $("#glasfcalc").val(gla_inputsize).trigger('onblur');
                $("#glaacrecalc").val(gla_inputsize / 43560).trigger('onblur');
				$("#primaryareasf").val((gla_inputsize - unusable_sf) - (surplus_sf + excess_sf)).trigger('onblur');
                $("#primaryareaacre").val(((gla_inputsize - unusable_sf) - (surplus_sf + excess_sf)) / 43560).trigger('onblur');
				$("#netareasf").val(gla_inputsize - unusable_sf).trigger('onblur');
            	$("#netareaacre").val((gla_inputsize - unusable_sf) / 43560).trigger('onblur');
            } else {
                $("#glasfcalc").val(gla_inputsize * 43560).trigger('onblur');
                $("#glaacrecalc").val(gla_inputsize).trigger('onblur');
				$("#primaryareasf").val(((gla_inputsize * 43560) - unusable_sf) - (surplus_sf + excess_sf)).trigger('onblur');
                $("#primaryareaacre").val((((gla_inputsize * 43560) - unusable_sf) - (surplus_sf + excess_sf)) / 43560).trigger('onblur');
				$("#netareasf").val((gla_inputsize * 43560) - unusable_sf).trigger('onblur');
            	$("#netareaacre").val(((gla_inputsize * 43560) - unusable_sf) / 43560).trigger('onblur');
            }
            $("#unusableacre").val(unusable_sf / 43560).trigger('onblur');
            $("#surplusacre").val(surplus_sf / 43560).trigger('onblur');
            $("#excessacre").val(excess_sf / 43560).trigger('onblur');
            /*$("#netareasf").val(gross_land_sf - unusable_sf).trigger('onblur');
            $("#netareaacre").val((gross_land_sf - unusable_sf) / 43560).trigger('onblur');*/
            /*$("#primaryareasf").val((gross_land_sf - unusable_sf) - (surplus_sf + excess_sf)).trigger('onblur');
            $("#primaryareaacre").val(((gross_land_sf - unusable_sf) - (surplus_sf + excess_sf)) / 43560).trigger('onblur');*/
            $("#totalgba").val(floor_1_gba + floor_2_gba + total_basement_gba).trigger('onblur');
            $("#percentbasegba").val((total_basement_gba / (floor_1_gba + floor_2_gba + total_basement_gba)) * 100).trigger('onblur');
            $("#totalnra").val(floor_1_nra + floor_2_nra + total_basement_nra).trigger('onblur');
            $("#percentbasenra").val((total_basement_nra / (floor_1_nra + floor_2_nra + total_basement_nra)) * 100).trigger('onblur');
            $("#effratiogla").val(((floor_1_nra + floor_2_nra + total_basement_nra) / (floor_1_gba + floor_2_gba + total_basement_gba)) * 100).trigger('onblur');
            $("#ltbusab").val((gross_land_sf - unusable_sf) / (floor_1_gba + floor_2_gba + total_basement_gba)).trigger('onblur');
            $("#lbrover").val(net_usable_sf / (floor_1_gba + floor_2_gba + total_basement_gba)).trigger('onblur');
            $("#lbrprim").val(((gross_land_sf - unusable_sf) - (surplus_sf + excess_sf)) / (floor_1_gba + floor_2_gba + total_basement_gba)).trigger('onblur');
            $("#scrover").val((floor_1_gba / (gross_land_sf - unusable_sf)) * 100).trigger('onblur');
            $("#scrprim").val((floor_1_gba / ((gross_land_sf - unusable_sf) - (surplus_sf + excess_sf))) * 100).trigger('onblur');
            $("#parkratnra").val((parking_stalls / (floor_1_nra + floor_2_nra + total_basement_nra)) * 1000).trigger('onblur');
            $("#parkratgba").val((parking_stalls / (floor_1_gba + floor_2_gba + total_basement_gba)) * 1000).trigger('onblur');
            $("#bldgfar").val((floor_1_gba + floor_2_gba + total_basement_gba) / gross_land_sf).trigger('onblur');
            if (document.getElementById('onlyNOI').checked) {}
            else {
                $("#totalnoi").val(((oe_pgr + oe_cam_income + oe_misc_income) - ((oe_pgr + oe_cam_income + oe_misc_income) * (oe_vacany_pct / 100)) + oe_other_income) - oe_expences).trigger('onblur');
            }
            if (document.getElementById('selectPropertType') != 4) {
                $("#oepgi").val(oe_pgr + oe_cam_income + oe_misc_income).trigger('onblur');
            } else {
                $("#oepgi").val(oe_pgr + oe_misc_income).trigger('onblur');
            }
            $("#vaccredit").val(oe_pgi * (oe_vacany_pct / 100)).trigger('onblur');
            if (document.getElementById('selectPropertType') != 4) {
                $("#oeegi").val(oe_pgi - (oe_vacancy_credit_loss + oe_other_income)).trigger('onblur');
            } else {
                $("#oeegi").val(oe_pgi - oe_vacancy_credit_loss).trigger('onblur');
            }
            $("#tototherinc").val(oe_misc_income + oe_other_income).trigger('onblur');
            $("#oepgrsf").val(oe_pgr / overall_nra).trigger('onblur');
            $("#oecamsf").val(oe_cam_income / overall_nra).trigger('onblur');
            $("#oepgisf").val(oe_pgi / overall_nra).trigger('onblur');
            $("#aupaoepgisf").val(oe_pgi / overall_nra).trigger('onblur');
            $("#oevacsf").val(((oe_pgr + oe_cam_income + oe_misc_income) * (oe_vacany_pct / 100)) / overall_nra).trigger('onblur');
            $("#oeegisf").val(((oe_pgr + oe_cam_income + oe_misc_income) - ((oe_pgr + oe_cam_income + oe_misc_income) * (oe_vacany_pct / 100)) + oe_other_income) / overall_nra).trigger('onblur');
            $("#aupaoeegisf").val(((oe_pgr + oe_cam_income + oe_misc_income) - ((oe_pgr + oe_cam_income + oe_misc_income) * (oe_vacany_pct / 100)) + oe_other_income) / overall_nra).trigger('onblur');
            $("#oeexpsf").val(oe_expences / overall_nra).trigger('onblur');
            $("#aupaoeexpsf").val(oe_expences / overall_nra).trigger('onblur');
            $("#oenoisf").val(oe_total_noi / overall_nra).trigger('onblur');
            $("#aupaoenoisf").val(oe_total_noi / overall_nra).trigger('onblur');
            $("#oeexprat").val((oe_expences / oe_egi) * 100).trigger('onblur');
            $("#aupaoeexprat").val(oe_expences / oe_egi * 100).trigger('onblur');
            $("#csheqsp").val(sale_price + fin_term_adj).trigger('onblur');
            $("#chnglistpr").val(((list_price - (sale_price + fin_term_adj)) / list_price) * (-100)).trigger('onblur');
            $("#exsursf").val(surplus_sf + excess_sf).trigger('onblur');
            $("#effspaa").val((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost).trigger('onblur');
            $("#effspstab").val(((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost).trigger('onblur');
            $("#totffeval").val((((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost) + value_ffe).trigger('onblur');
            $("#allolval").val(Math.round((((gross_land_sf - unusable_sf) - (surplus_sf + excess_sf)) * underlying_land_value_primary) / 100) * 100).trigger('onblur');
            $("#alloimpval").val((((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost) - (Math.round((((gross_land_sf - unusable_sf) - (surplus_sf + excess_sf)) * underlying_land_value_primary) / 100) * 100)).trigger('onblur');
            $("#deptotalgba").val(floor_1_gba + floor_2_gba + total_basement_gba).trigger('onblur');
            $("#estimrcn").val(Math.round((floor_1_gba + floor_2_gba + total_basement_gba) * replace_cost), -4).trigger('onblur');
            $("#lessalloland").val(alloc_imp_value).trigger('onblur');
            $("#depallsource").val(est_rcn - less_alloc_imp_price).trigger('onblur');
            $("#imptotdep").val(((est_rcn - less_alloc_imp_price) / est_rcn) * 100).trigger('onblur');
            $("#phydep").val(eff_age_years * 2).trigger('onblur');
            $("#ifobs").val((((est_rcn - less_alloc_imp_price) / est_rcn) * 100) - physical_depreciation).trigger('onblur');
            $("#totinlinepct").val(shop_inline_sf / (floor_1_nra + floor_2_nra + total_basement_nra)).trigger('onblur');
            $("#achorsfcalc").val((floor_1_nra + floor_2_nra + total_basement_nra) - shop_inline_sf).trigger('onblur');
            $("#anchorpctcalc").val(((floor_1_nra + floor_2_nra + total_basement_nra) - shop_inline_sf) / (floor_1_nra + floor_2_nra + total_basement_nra)).trigger('onblur');
            $("#mosalescalc").val(store_month_store_sales + store_month_car_wash_sales + store_month_mini_sales).trigger('onblur');
            $("#showroompctcalc").val((veh_showroom_sf / (floor_1_gba + floor_2_gba + total_basement_gba)) * 100).trigger('onblur');
            $("#svcareacalc").val((floor_1_gba + floor_2_gba + total_basement_gba) - veh_showroom_sf).trigger('onblur');
            $("#totoffbosfcalc").val(ind_int_office_1 + ind_int_office_2 + ind_ext_office_1 + ind_ext_office_2).trigger('onblur');
            $("#totoffbopctcalc").val(((ind_int_office_1 + ind_int_office_2 + ind_ext_office_1 + ind_ext_office_2) / (floor_1_gba + floor_2_gba + total_basement_gba)) * 100).trigger('onblur');
            $("#brratcalc").val(total_bedroom / total_no_units).trigger('onblur');
            $("#pkratunitcalc").val(parking_stalls / total_no_units).trigger('onblur');
            $("#totalmhspace").val(no_single_wide + no_double_wide + no_triple_wide + no_rv_space).trigger('onblur');
            $("#mhspaceacre").val((no_single_wide + no_double_wide + no_triple_wide + no_rv_space) / (((gross_land_sf - unusable_sf) - (surplus_sf + excess_sf)) / 43560)).trigger('onblur');
            $("#mhexpense_space").val(oe_expences / (no_single_wide + no_double_wide + no_triple_wide + no_rv_space)).trigger('onblur');
            $("#mhpgi_space").val((oe_pgr + oe_cam_income + oe_misc_income) / (no_single_wide + no_double_wide + no_triple_wide + no_rv_space)).trigger('onblur');
            $("#mhvacancy_space").val(((oe_pgr + oe_cam_income + oe_misc_income) * (oe_vacany_pct / 100)) / (no_single_wide + no_double_wide + no_triple_wide + no_rv_space)).trigger('onblur');
            $("#mhegi_space").val(((oe_pgr + oe_cam_income + oe_misc_income) - ((oe_pgr + oe_cam_income + oe_misc_income) * (oe_vacany_pct / 100)) + oe_other_income) / (no_single_wide + no_double_wide + no_triple_wide + no_rv_space)).trigger('onblur');
            $("#mhnoi_space").val(oe_total_noi / (no_single_wide + no_double_wide + no_triple_wide + no_rv_space)).trigger('onblur');
            $("#mhprice_space").val((((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost) / (no_single_wide + no_double_wide + no_triple_wide + no_rv_space)).trigger('onblur');
            $("#avgmorentunitcalc").val(((oe_pgr + oe_cam_income + oe_misc_income) / total_no_units) / 12).trigger('onblur');
            $("#avgmorentsfunitcalc").val(avg_month_rent_unit / avg_unit_size).trigger('onblur');
            $("#densirtunitcalc").val(total_no_units / (gross_land_sf - unusable_sf) - (surplus_sf + excess_sf)).trigger('onblur');
            $("#avgsizeunitcalc").val((floor_1_nra + floor_2_nra + total_basement_nra) / total_no_units).trigger('onblur');
            $("#pgiunitcalc").val((oe_pgr + oe_cam_income + oe_misc_income) / total_no_units).trigger('onblur');
            $("#vacancyunitcalc").val(((oe_pgr + oe_cam_income + oe_misc_income) * (oe_vacany_pct / 100)) / total_no_units).trigger('onblur');
            $("#egiunitcalc").val(((oe_pgr + oe_cam_income + oe_misc_income) - ((oe_pgr + oe_cam_income + oe_misc_income) * (oe_vacany_pct / 100)) + oe_other_income) / total_no_units).trigger('onblur');
            $("#expunitcalc").val(oe_expences / total_no_units).trigger('onblur');
            $("#noiunitcalc").val((((oe_pgr + oe_cam_income + oe_misc_income) - ((oe_pgr + oe_cam_income + oe_misc_income) * (oe_vacany_pct / 100)) + oe_other_income) - oe_expences) / total_no_units).trigger('onblur');
            $("#adjsfgbacalc").val((((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost) / (floor_1_gba + floor_2_gba + total_basement_gba)).trigger('onblur');
            $("#adjsfnracalc").val((((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost) / (floor_1_nra + floor_2_nra + total_basement_nra)).trigger('onblur');
            $("#adjalloimpsfgba").val(((((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost) - (Math.round((((gross_land_sf - unusable_sf) - (surplus_sf + excess_sf)) * underlying_land_value_primary) / 100) * 100)) / (floor_1_gba + floor_2_gba + total_basement_gba)).trigger('onblur');
            $("#adjalloimpsfnra").val(((((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost) - (Math.round((((gross_land_sf - unusable_sf) - (surplus_sf + excess_sf)) * underlying_land_value_primary) / 100) * 100)) / (floor_1_nra + floor_2_nra + total_basement_nra)).trigger('onblur');
            $("#adjstabunitcalc").val((((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost) / total_no_units).trigger('onblur');
            $("#adjstabveh_tunnel").val((((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost) / veh_tunnel).trigger('onblur');
            $("#fuelmultcalc").val((((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost) / store_avg_month_gallon).trigger('onblur');
            $("#monthsalecalc").val((((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost) / (store_month_store_sales + store_month_car_wash_sales + store_month_mini_sales)).trigger('onblur');
            $("#capratecalc").val((oe_total_noi / (((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost)) * 100).trigger('onblur');
            $("#pgimcalc").val((((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost) / (oe_pgr + oe_cam_income + oe_misc_income)).trigger('onblur');
            $("#egimcalc").val((((sale_price + fin_term_adj) + cond_sale_adj - excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost) + stabil_cost) / ((oe_pgr + oe_cam_income + oe_misc_income) - ((oe_pgr + oe_cam_income + oe_misc_income) * (oe_vacany_pct / 100)) + oe_other_income)).trigger('onblur');
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
    _improvedsalesController.setOptions(options);
    return _improvedsalesController;
}
