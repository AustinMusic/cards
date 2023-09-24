var _leasesController = function (options) {
	var _leasesController;
	var rbe_engine = new _rbe_engine();
	_leasesController = {
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
			this.renderUI();
			this.baseController = new _baseController({
					activeObject: this.options.activeObject + ".baseController",
					data: this.options.data
				});
			this.baseController.init();
			this.assignEvents();
            var _elements = document.getElementById("mf_table").querySelectorAll("tbody tr ._devres");
            for (var i = 0; i < _elements.length; i++) {
				//console.log(_elements[i]);
                this.devideValues(_elements[i]);
            }
            var _elements = document.getElementById("ss_table").querySelectorAll("tbody tr ._devres");
            for (var i = 0; i < _elements.length; i++) {
				//console.log(_elements[i]);
                this.devideValues(_elements[i]);
            }
			
//			this.sumBedrooms();
//			this.sumUnits();
			this.mapController = new _mapController({
					activeObject: this.options.activeObject + ".mapController",
					id: this.options.id,
					latitude: this.options.latitude,
					longitude: this.options.longitude,
				});
			this.mapController.init();
		},
		renderUI: function () {},
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
            var _elements = document.getElementsByClassName("_addssunit");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onclick", this.options.activeObject + ".addssunit(this);");
                }
            }
            var _elements = document.getElementsByClassName("_delssunit");
            if (rbe_engine.checkElement(_elements)) {
                for (var i = 0; i < _elements.length; i++) {
                    _elements[i].setAttribute("onClick", _elements[i].getAttribute("onClick") + ";" + this.options.activeObject + ".deletessunit(this);");
                }
            }
            var _element = document.getElementById("emdomain");
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onChange", _element.getAttribute("onChange") + ";" + this.options.activeObject + ".setListEmDomain(this);");
                this.setListEmDomain(_element);
            }
			var _element = document.getElementById("autocomplete");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("focus", "geolocate();");
			}
			var _element = document.getElementById("selectNoUT");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onChange", this.options.activeObject + ".toggleUnits(this);");
				this.toggleUnits(_element);
			}
			var _element = document.getElementById("NoMFUTypes");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onChange", this.options.activeObject + ".toggleMFUnits(this);");
				this.toggleMFUnits(_element);
			}
			var _element = document.getElementById("showMFAbsorb");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onClick", this.options.activeObject + ".toggleMFAbs(this);");
				this.toggleMFAbs(_element);
			}
			var _element = document.getElementById("propapp");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onClick", this.options.activeObject + ".togglepropapp(this);");
				this.togglepropapp(_element);
			}
			var _element = document.getElementById("confless");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onClick", this.options.activeObject + ".toggleconfless(this);");
				this.toggleconfless(_element);
			}
			var _element = document.getElementById("projsite");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onClick", this.options.activeObject + ".toggleprojsite(this);");
				this.toggleprojsite(_element);
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
			var _element = document.getElementById("showYard");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onClick", this.options.activeObject + ".toggleyardLease(this);");
				this.toggleyardLease(_element);
			}
			var _element = document.getElementById("showOtherRent");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onClick", this.options.activeObject + ".toggleotherrents(this);");
				this.toggleotherrents(_element);
			}
			var _element = document.getElementById("showAbsorb");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onClick", this.options.activeObject + ".toggleAbsorb(this);");
				this.toggleAbsorb(_element);
			}
			var _element = document.getElementById("showLBRent");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onClick", this.options.activeObject + ".toggleLBRent(this);");
				this.toggleLBRent(_element);
			}
			var _element = document.getElementById("getLeaseOption");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onChange", this.options.activeObject + ".togglelo(this);");
				this.togglelo(_element);
			}
			var _elements = document.getElementsByClassName("_generateReportWordBtn");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].setAttribute("onclick", _elements[i].getAttribute("onclick") + ";" + this.options.activeObject + ".generateReportWord(this);");
				}
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
			var _elements = document.getElementsByClassName("_fm02f");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,2,false);");
					_elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 2, false);
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
			var _elements = document.getElementsByClassName("_cfm03t");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = '$ '+aa_engine.formatNumber(this.value,0,3,true);");
					_elements[i].value = '$ ' + aa_engine.formatNumber(_elements[i].value, 0, 3, true);
				}
			}
			var _elements = document.getElementsByClassName("_fm02tp");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,2,true)+' %';");
					_elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 2, true) + ' %';
				}
			}
			var _elements = document.getElementsByClassName("_fm01tp");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,1,true)+' %';");
					_elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 1, true) + ' %';
				}
			}
			var _elements = document.getElementsByClassName("_fm01tr");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";this.value = aa_engine.formatNumber(this.value,0,1,true)+' to 1';");
					_elements[i].value = aa_engine.formatNumber(_elements[i].value, 0, 1, true) + ' to 1';
				}
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
		toggleUnits: function (_element) {
			var noRows = parseInt(_element.value);
			var _elements = document.getElementsByClassName("msut");
			for (var i = 1; i < _elements.length; i++) {
				if (i < noRows) {
					_elements[i].style.display = "flex";
				} else {
					_elements[i].style.display = "none";
				}
			}
			return true;
		},
 /*       sumUnits: function(){
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
		},*/
		toggleMFUnits: function (_element) {
			var noRows = parseInt(_element.value);
			var _elements = document.getElementsByClassName("mfunittype");
			for (var i = 1; i < _elements.length; i++) {
				if (i < noRows) {
					_elements[i].style.display = "flex";
				} else {
					_elements[i].style.display = "none";
				}
			}
			return true;
		},
		toggleMFAbs: function (_element) {
			var _elements = document.querySelectorAll("#UnitAbsorb");
			for (var i = 0; i < _elements.length; i++) {
				if (_element.checked) {
					_elements[i].style.display = "block";
				} else {
					_elements[i].style.display = "none";
				}
			}
			return true;
		},
		togglepropapp: function (_element) {
			var _elements = document.querySelectorAll("#transaction ._propapp");
			for (var i = 0; i < _elements.length; i++) {
				if (_element.checked) {
					_elements[i].style.display = "block";
				} else {
					_elements[i].style.display = "none";
				}
			}
			return true;
		},
		toggleconfless: function (_element) {
			var _elements = document.querySelectorAll("#transaction ._confless");
			for (var i = 0; i < _elements.length; i++) {
				if (_element.checked) {
					_elements[i].style.display = "block";
				} else {
					_elements[i].style.display = "none";
				}
			}
			return true;
		},
		toggleprojsite: function (_element) {
			var _elements = document.querySelectorAll("#generalprojectdata ._projSite");
			for (var i = 0; i < _elements.length; i++) {
				if (_element.checked) {
					_elements[i].style.display = "block";
				} else {
					_elements[i].style.display = "none";
				}
			}
			return true;
		},
		toggleyardLease: function (_element) {
			var _elements = document.querySelectorAll("#yardLeaseTab");
			for (var i = 0; i < _elements.length; i++) {
				if (_element.checked) {
					_elements[i].style.display = "block";
				} else {
					_elements[i].style.display = "none";
				}
			}
			return true;
		},
		toggleotherrents: function (_element) {
			var _elements = document.querySelectorAll("#otherRentsTab");
			for (var i = 0; i < _elements.length; i++) {
				if (_element.checked) {
					_elements[i].style.display = "block";
				} else {
					_elements[i].style.display = "none";
				}
			}
			return true;
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
                    }
                }
                var _elements = r_elements[r_elements.length - 1].getElementsByClassName("_cfm02t");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                        this.getNumberFormat(_elements[i], _elements[i].value);
                    }
                }
                var _elements = r_elements[r_elements.length - 1].getElementsByClassName("_fm00t");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onBlur", _elements[i].getAttribute("onBlur") + ";" + this.options.activeObject + ".getNumberFormat(this,this.value);");
                        this.getNumberFormat(_elements[i], _elements[i].value);
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
            }
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
        addssunit: function (_element) {
            var trElement = document.createElement("tr");
            trElement.setAttribute("id", "");
            trElement.innerHTML = "<input type='hidden' name='ssvalueid[]' value='' /><td><input list='MSSize' name='sssize[]' class='form-control' value=''/></td><td><input type='text' list='MsUnitType' name='ssunittype[]' class='form-control' value=''/></td></td><td><input type='text' name='ssunitsf[]' class='form-control _ppgc _dev _fm00t' value=''/></td><td><input type='text' name='ssrentmo[]' class='form-control _ppgc _devsor _cfm02t' value=''/></td><td><input type='text' name='ssrentsf[]' class='form-control _ppgc _devres _cfm02t' value='' readonly /></td><td><input type='button' class='_delssunit' value='Delete' /></td>";
            var r_elements = document.querySelectorAll("#ss_table tbody");
            if (rbe_engine.checkElement(r_elements)) {
				r_elements[0].appendChild(trElement);	
                var r_elements = document.querySelectorAll("#ss_table tbody tr");
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
                var _elements = r_elements[r_elements.length - 1].getElementsByClassName("_delssunit");
                if (rbe_engine.checkElement(_elements)) {
                    for (var i = 0; i < _elements.length; i++) {
                        _elements[i].setAttribute("onClick", _elements[i].getAttribute("onClick") + ";" + this.options.activeObject + ".deletessunit(this);");
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
				
/*				var _elements = r_elements[r_elements.length - 1].getElementsByClassName("_noofunits");
				for (var i = 0; i < _elements.length; i++) {
					 _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumBedrooms();");
					 _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumUnits();");
					 
				}

				var _elements = r_elements[r_elements.length - 1].getElementsByClassName("_noofbr");
				for (var i = 0; i < _elements.length; i++) {
					 _elements[i].setAttribute("onKeyUp", _elements[i].getAttribute("onKeyUp") + ";" + this.options.activeObject + ".sumBedrooms();");
				}*/
				
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
//			this.sumUnits();
//			this.sumBedrooms();
        },
        deletessunit: function (_element) {
            _element.parentNode.parentNode.parentNode.removeChild(_element.parentNode.parentNode);
            var _element = document.getElementById("ss_table");
            if (rbe_engine.checkElement(_element)) {
                var rows = _element.querySelectorAll("tbody tr");
                var cells = rows[0].querySelectorAll("td ._sum");
                /*for (var i = 0; i < cells.length; i++) {
                    this.sumValues(cells[i]);
                }*/
            }
//			this.sumUnits();
//			this.sumBedrooms();
        },
		toggleAbsorb: function (_element) {
			var _elements = document.querySelectorAll("#projAbsorbTab");
			for (var i = 0; i < _elements.length; i++) {
				if (_element.checked) {
					_elements[i].style.display = "block";
				} else {
					_elements[i].style.display = "none";
				}
			}
			return true;
		},
		toggleLBRent: function (_element) {
			var _elements = document.querySelectorAll("#LandBldgTab");
			for (var i = 0; i < _elements.length; i++) {
				if (_element.checked) {
					_elements[i].style.display = "block";
				} else {
					_elements[i].style.display = "none";
				}
			}
			return true;
		},
		togglelo: function (_OptionLease) {
			var _elements = document.querySelectorAll("#transaction ._leaseOption");
			for (var i = 0; i < _elements.length; i++) {
				if (_OptionLease.options[_OptionLease.selectedIndex].value == '2') {
					_elements[i].style.display = "block";
				} else {
					_elements[i].style.display = "none";
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
			var _element = document.getElementById("effRentsfyear");
			if (rbe_engine.checkElement(_element)) {
				if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 4) {
					_element.readOnly = true;
				} else {
					_element.readOnly = false;
				}
			}
			var _element = document.getElementById("initRentsfyear");
			if (rbe_engine.checkElement(_element)) {
				if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 4) {
					_element.readOnly = true;
				} else {
					_element.readOnly = false;
				}
			}
			var _element = document.querySelectorAll("#spaceleaseeconomics .indOnlyHide");
			for (var i = 0; i < _element.length; i++) {
				if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 4) {
					_element[i].style.display = "none"
				} else {
					_element[i].style.display = "flex";
				}
			}
			var _element = document.querySelectorAll("#spaceleaseeconomics .indOnlyshow");
			for (var i = 0; i < _element.length; i++) {
				if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 4) {
					_element[i].style.display = "flex"
				} else {
					_element[i].style.display = "none";
				}
			}
			var _element = document.querySelectorAll("#spaceleaseeconomics .IndMFhide");
			for (var i = 0; i < _element.length; i++) {
				if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 1 || parseInt(_ProType.options[_ProType.selectedIndex].value) == 4 || parseInt(_ProType.options[_ProType.selectedIndex].value) == 5) {
					_element[i].style.display = "none";
				} else {
					_element[i].style.display = "flex";
				}
			}
			var _element = document.querySelectorAll("#spaceleaseeconomics .PercRent");
			for (var i = 0; i < _element.length; i++) {
				if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 1 || parseInt(_ProType.options[_ProType.selectedIndex].value) == 4 || parseInt(_ProType.options[_ProType.selectedIndex].value) == 5 || parseInt(_ProType.options[_ProType.selectedIndex].value) == 6) {
					_element[i].style.display = "none";
				} else {
					_element[i].style.display = "flex";
				}
			}
			var _element = document.querySelectorAll("._hideMFProp");
			for (var i = 0; i < _element.length; i++) {
				if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 5 || parseInt(_ProType.options[_ProType.selectedIndex].value) == 1) {
					_element[i].style.display = "none";
				} else {
					_element[i].style.display = "flex";
				}
			}
			var _element = document.querySelectorAll(".showFloor");
			for (var i = 0; i < _element.length; i++) {
				if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 6) {
					_element[i].style.display = "flex";
				} else {
					_element[i].style.display = "none";
				}
			}
			var _element = document.getElementById("MFCheck");
			if (rbe_engine.checkElement(_element)) {
				if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 5) {
					_element.style.display = "none";
				} else {
					_element.style.display = "block";
				}
			}
			var _element = document.getElementById("multFamTab");
			if (rbe_engine.checkElement(_element)) {
				if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 5) {
					_element.style.display = "block";
				} else {
					_element.style.display = "none";
				}
			}
			var _element = document.getElementById("initRentsfyear");
			if (rbe_engine.checkElement(_element)) {
				if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 4) {
					_element.className += _element.className ? '_cfm03t' : '_cfm02t';
				}
			}
			var _element = document.getElementById("effRentsfyear");
			if (rbe_engine.checkElement(_element)) {
				if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 4) {
					_element.className += _element.className ? '_cfm03t' : '_cfm02t';
				}
			}

			var _element = document.querySelectorAll(".flexpctHide");
			for (var i = 0; i < _element.length; i++) {
				if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 4 || parseInt(_ProType.options[_ProType.selectedIndex].value) == 6 || parseInt(_ProType.options[_ProType.selectedIndex].value) == 1) {
					_element[i].style.display = "block";
				} else {
					_element[i].style.display = "none";
				}
			}
			if (_subProType.options.length > 0) {
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
				var _element = document.querySelectorAll("._officedata");
				for (var i = 0; i < _element.length; i++) {
					if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 6) {
						_element[i].style.display = "flex";
					} else {
						_element[i].style.display = "none";
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
				var _element = document.querySelectorAll("#projectabsorptiondata ._shopAbsorb");
				for (var i = 0; i < _element.length; i++) {
					if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 12 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 13 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 14 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 15 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 16 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 17 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 18) {
						_element[i].style.display = "flex";
					} else {
						_element[i].style.display = "none";
					}
				}
				var _element = document.querySelectorAll("._showInline");
				for (var i = 0; i < _element.length; i++) {
					if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 11 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 12 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 13 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 14 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 15 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 16 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 17 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 18) {
						_element[i].style.display = "flex";
					} else {
						_element[i].style.display = "none";
					}
				}
				var _element = document.querySelectorAll("#spaceleaseeconomics ._EffRentST");
				for (var i = 0; i < _element.length; i++) {
					if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 44 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 45 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 46 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 47) {
						_element[i].style.display = "flex";
					} else {
						_element[i].style.display = "none";
					}
				}
				var _element = document.querySelectorAll(".showRest");
				for (var i = 0; i < _element.length; i++) {
					if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 35 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 36) {
						_element[i].style.display = "block";
					} else {
						_element[i].style.display = "none";
					}
				}
				var _element = document.querySelectorAll(".IndOffhide");
				for (var i = 0; i < _element.length; i++) {
					if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 4 || parseInt(_ProType.options[_ProType.selectedIndex].value) == 6 || parseInt(_ProType.options[_ProType.selectedIndex].value) == 1 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 44 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 45 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 46 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 47 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 48 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 49 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 50 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 51 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 52 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 53 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 54 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 55 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 56 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 57 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 58) {
						_element[i].style.display = "none";
					} else {
						_element[i].style.display = "flex";
					}
				}
				var _element = document.querySelectorAll(".showRoomhide");
				for (var i = 0; i < _element.length; i++) {
					if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 44 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 45 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 46 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 47 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 48 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 49 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 50 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 51 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 52 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 53 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 54 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 55 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 56 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 57 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 58) {
						_element[i].style.display = "flex";
					} else {
						_element[i].style.display = "none";
					}
				}
				var _element = document.querySelectorAll(".moreVehshow");
				for (var i = 0; i < _element.length; i++) {
					if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 44 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 45 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 46 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 47 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 49 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 50 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 51 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 54) {
						_element[i].style.display = "flex";
					} else {
						_element[i].style.display = "none";
					}
				}
				var _element = document.querySelectorAll(".showOffice");
				for (var i = 0; i < _element.length; i++) {
					if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 4 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 106 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 107 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 113) {
						_element[i].style.display = "flex";
					} else {
						_element[i].style.display = "none";
					}
				}
				var _element = document.querySelectorAll(".hideSS");
				for (var i = 0; i < _element.length; i++) {
					if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 85) {
						_element[i].style.display = "none";
					} else {
						_element[i].style.display = "block";
					}
				}
				var _element = document.getElementById("MinStoreTab");
				if (rbe_engine.checkElement(_element)) {
					if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 85) {
						_element.style.display = "block";
					} else {
						_element.style.display = "none";
					}
				}
				var _element = document.getElementById("unittypes");
				if (rbe_engine.checkElement(_element)) {
					if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 95 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 96 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 97 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 98 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 99) {
						_element.style.display = "block";
					} else {
						_element.style.display = "none";
					}
				}
				var _element = document.querySelectorAll("._mobhome");
				for (var i = 0; i < _element.length; i++) {
					if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 100) {
						_element[i].style.display = "none";
					} else {
						_element[i].style.display = "flex";
					}
				}
				var _element = document.querySelectorAll("._mobhomeShow");
				for (var i = 0; i < _element.length; i++) {
					if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 100) {
						_element[i].style.display = "flex";
					} else {
						_element[i].style.display = "none";
					}
				}
				var _element = document.getElementById("mobilehome");
				if (rbe_engine.checkElement(_element)) {
					if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 100) {
						_element.style.display = "block";
					} else {
						_element.style.display = "none";
					}
				}
				var _element = document.getElementById("vehRelateTab");
				if (rbe_engine.checkElement(_element)) {
					if (parseInt(_subProType.options[_subProType.selectedIndex].value) == 44 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 45 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 46 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 47) {
						_element.style.display = "block";
					} else {
						_element.style.display = "none";
					}
				}
				var _element = document.getElementById("hideMFandMini");
				if (rbe_engine.checkElement(_element)) {
					if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 5 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 85) {
						_element.style.display = "none";
					} else {
						_element.style.display = "block";
					}
				}
				var _element = document.getElementById("demSpaceTab");
				if (rbe_engine.checkElement(_element)) {
					if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 5 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 85 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 100) {
						_element.style.display = "none";
					} else {
						_element.style.display = "block";
					}
				}
				var _element = document.getElementById("spLeaseEcoTab");
				if (rbe_engine.checkElement(_element)) {
					if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 5 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 85) {
						_element.style.display = "none";
					} else {
						_element.style.display = "block";
					}
				}
				var _element = document.getElementById("GenDataTab");
				if (rbe_engine.checkElement(_element)) {
					if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 5 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 85) {
						_element.style.display = "none";
					} else {
						_element.style.display = "block";
					}
				}
				var _element = document.getElementById("PropDataTab");
				if (rbe_engine.checkElement(_element)) {
					if (parseInt(_ProType.options[_ProType.selectedIndex].value) == 5 || parseInt(_subProType.options[_subProType.selectedIndex].value) == 85) {
						_element.style.display = "none";
					} else {
						_element.style.display = "block";
					}
				}
			} else {
				var _showpttab = document.getElementById("proptypeTab");
				if (rbe_engine.checkElement(_showpttab)) {
					_showpttab.style.display = "none";
				}
				var _element = document.querySelectorAll("#projectabsorptiondata ._shopAbsorb");
				for (var i = 0; i < _element.length; i++) {
					_element[i].style.display = "none";
				}
				var _element = document.querySelectorAll("._officedata");
				for (var i = 0; i < _element.length; i++) {
					_element[i].style.display = "none";
				}
                var _shopping = document.querySelectorAll(".PDShopping");
                if (rbe_engine.checkElement(_shopping)) {
                    for (var i = 0; i < _shopping.length; i++) {
                        _shopping[i].style.display = "none";
                    }
                }				
				var _element = document.querySelectorAll("._showInline");
				for (var i = 0; i < _element.length; i++) {
					_element[i].style.display = "none";
				}				
				var _element = document.querySelectorAll(".showFloor");
				for (var i = 0; i < _element.length; i++) {
					_element[i].style.display = "none";
				}
				
                var _industrial = document.querySelectorAll(".PDIndustrial");
                if (rbe_engine.checkElement(_industrial)) {
                    for (var i = 0; i < _industrial.length; i++) {
                        _industrial[i].style.display = "none";
                    }
                }		
				var _element = document.querySelectorAll("#spaceleaseeconomics ._EffRentST");
				for (var i = 0; i < _element.length; i++) {
					_element[i].style.display = "none";
				}
				var _element = document.querySelectorAll(".showRest");
				for (var i = 0; i < _element.length; i++) {
					_element[i].style.display = "none";
				}
				var _element = document.querySelectorAll(".IndOffhide");
				for (var i = 0; i < _element.length; i++) {
					_element[i].style.display = "flex";
				}
				var _element = document.querySelectorAll(".showRoomhide");
				for (var i = 0; i < _element.length; i++) {
					_element[i].style.display = "none";
				}
				var _element = document.querySelectorAll(".moreVehshow");
				for (var i = 0; i < _element.length; i++) {
					_element[i].style.display = "none";
				}
				var _element = document.querySelectorAll(".showOffice");
				for (var i = 0; i < _element.length; i++) {
					_element[i].style.display = "none";
				}
				var _element = document.querySelectorAll(".hideSS");
				for (var i = 0; i < _element.length; i++) {
					_element[i].style.display = "block";
				}
				var _element = document.getElementById("MinStoreTab");
				if (rbe_engine.checkElement(_element)) {
					_element.style.display = "none";
				}
				var _element = document.getElementById("unittypes");
				if (rbe_engine.checkElement(_element)) {
					_element.style.display = "none";
				}
				var _element = document.querySelectorAll("._mobhome");
				for (var i = 0; i < _element.length; i++) {
					_element[i].style.display = "block";
				}
				var _element = document.querySelectorAll("._mobhomeShow");
				for (var i = 0; i < _element.length; i++) {
					_element[i].style.display = "none";
				}
				var _element = document.getElementById("mobilehome");
				if (rbe_engine.checkElement(_element)) {
					_element.style.display = "none";
				}
				var _element = document.getElementById("demSpaceTab");
				if (rbe_engine.checkElement(_element)) {
					_element.style.display = "block";
				}
				var _element = document.getElementById("vehRelateTab");
				if (rbe_engine.checkElement(_element)) {
					_element.style.display = "none";
				}
				var _element = document.getElementById("hideMFandMini");
				if (rbe_engine.checkElement(_element)) {
					_element.style.display = "block";
				}
				var _element = document.getElementById("spLeaseEcoTab");
				if (rbe_engine.checkElement(_element)) {
					_element.style.display = "block";
				}
				var _element = document.getElementById("GenDataTab");
				if (rbe_engine.checkElement(_element)) {
					_element.style.display = "block";
				}
				var _element = document.getElementById("PropDataTab");
				if (rbe_engine.checkElement(_element)) {
					_element.style.display = "block";
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
					url: "RentClone.php?id=" + object.id + "&reportType=" + reportType,
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
			var url = "../templates/leases/" + template + "?id=" + ids + "&showPreview=0";
			window.location = url;
			console.log(url);
		},
		propagadeCalcualations: function () {
			var ms_total_sf_1 = $(".ms_total_sf_1").val();
			var ms_total_sf_1 =  + (ms_total_sf_1 ? ms_total_sf_1.replace(/[^\d.-]/g, '') : ms_total_sf_1);
			var ms_rent_1 = $(".ms_rent_1").val();
			var ms_rent_1 =  + (ms_rent_1 ? ms_rent_1.replace(/[^\d.-]/g, '') : ms_rent_1);
			var ms_total_sf_2 = $(".ms_total_sf_2").val();
			var ms_total_sf_2 =  + (ms_total_sf_2 ? ms_total_sf_2.replace(/[^\d.-]/g, '') : ms_total_sf_2);
			var ms_rent_2 = $(".ms_rent_2").val();
			var ms_rent_2 =  + (ms_rent_2 ? ms_rent_2.replace(/[^\d.-]/g, '') : ms_rent_2);
			var ms_total_sf_3 = $(".ms_total_sf_3").val();
			var ms_total_sf_3 =  + (ms_total_sf_3 ? ms_total_sf_3.replace(/[^\d.-]/g, '') : ms_total_sf_3);
			var ms_rent_3 = $(".ms_rent_3").val();
			var ms_rent_3 =  + (ms_rent_3 ? ms_rent_3.replace(/[^\d.-]/g, '') : ms_rent_3);
			var ms_total_sf_4 = $(".ms_total_sf_4").val();
			var ms_total_sf_4 =  + (ms_total_sf_4 ? ms_total_sf_4.replace(/[^\d.-]/g, '') : ms_total_sf_4);
			var ms_rent_4 = $(".ms_rent_4").val();
			var ms_rent_4 =  + (ms_rent_4 ? ms_rent_4.replace(/[^\d.-]/g, '') : ms_rent_4);
			var ms_total_sf_5 = $(".ms_total_sf_5").val();
			var ms_total_sf_5 =  + (ms_total_sf_5 ? ms_total_sf_5.replace(/[^\d.-]/g, '') : ms_total_sf_5);
			var ms_rent_5 = $(".ms_rent_5").val();
			var ms_rent_5 =  + (ms_rent_5 ? ms_rent_5.replace(/[^\d.-]/g, '') : ms_rent_5);
			var ms_total_sf_6 = $(".ms_total_sf_6").val();
			var ms_total_sf_6 =  + (ms_total_sf_6 ? ms_total_sf_6.replace(/[^\d.-]/g, '') : ms_total_sf_6);
			var ms_rent_6 = $(".ms_rent_6").val();
			var ms_rent_6 =  + (ms_rent_6 ? ms_rent_6.replace(/[^\d.-]/g, '') : ms_rent_6);
			var ms_total_sf_7 = $(".ms_total_sf_7").val();
			var ms_total_sf_7 =  + (ms_total_sf_7 ? ms_total_sf_7.replace(/[^\d.-]/g, '') : ms_total_sf_7);
			var ms_rent_7 = $(".ms_rent_7").val();
			var ms_rent_7 =  + (ms_rent_7 ? ms_rent_7.replace(/[^\d.-]/g, '') : ms_rent_7);
			var ms_total_sf_8 = $(".ms_total_sf_8").val();
			var ms_total_sf_8 =  + (ms_total_sf_8 ? ms_total_sf_8.replace(/[^\d.-]/g, '') : ms_total_sf_8);
			var ms_rent_8 = $(".ms_rent_8").val();
			var ms_rent_8 =  + (ms_rent_8 ? ms_rent_8.replace(/[^\d.-]/g, '') : ms_rent_8);
			var ms_total_sf_9 = $(".ms_total_sf_9").val();
			var ms_total_sf_9 =  + (ms_total_sf_9 ? ms_total_sf_9.replace(/[^\d.-]/g, '') : ms_total_sf_9);
			var ms_rent_9 = $(".ms_rent_9").val();
			var ms_rent_9 =  + (ms_rent_9 ? ms_rent_9.replace(/[^\d.-]/g, '') : ms_rent_9);
			var ms_total_sf_10 = $(".ms_total_sf_10").val();
			var ms_total_sf_10 =  + (ms_total_sf_10 ? ms_total_sf_10.replace(/[^\d.-]/g, '') : ms_total_sf_10);
			var ms_rent_10 = $(".ms_rent_10").val();
			var ms_rent_10 =  + (ms_rent_10 ? ms_rent_10.replace(/[^\d.-]/g, '') : ms_rent_10);
			var ms_total_sf_11 = $(".ms_total_sf_11").val();
			var ms_total_sf_11 =  + (ms_total_sf_11 ? ms_total_sf_11.replace(/[^\d.-]/g, '') : ms_total_sf_11);
			var ms_rent_11 = $(".ms_rent_11").val();
			var ms_rent_11 =  + (ms_rent_11 ? ms_rent_11.replace(/[^\d.-]/g, '') : ms_rent_11);
			var ms_total_sf_12 = $(".ms_total_sf_12").val();
			var ms_total_sf_12 =  + (ms_total_sf_12 ? ms_total_sf_12.replace(/[^\d.-]/g, '') : ms_total_sf_12);
			var ms_rent_12 = $(".ms_rent_12").val();
			var ms_rent_12 =  + (ms_rent_12 ? ms_rent_12.replace(/[^\d.-]/g, '') : ms_rent_12);
			var ms_total_sf_13 = $(".ms_total_sf_13").val();
			var ms_total_sf_13 =  + (ms_total_sf_13 ? ms_total_sf_13.replace(/[^\d.-]/g, '') : ms_total_sf_13);
			var ms_rent_13 = $(".ms_rent_13").val();
			var ms_rent_13 =  + (ms_rent_13 ? ms_rent_13.replace(/[^\d.-]/g, '') : ms_rent_13);
			var ms_total_sf_14 = $(".ms_total_sf_14").val();
			var ms_total_sf_14 =  + (ms_total_sf_14 ? ms_total_sf_14.replace(/[^\d.-]/g, '') : ms_total_sf_14);
			var ms_rent_14 = $(".ms_rent_14").val();
			var ms_rent_14 =  + (ms_rent_14 ? ms_rent_14.replace(/[^\d.-]/g, '') : ms_rent_14);
			var ms_total_sf_15 = $(".ms_total_sf_15").val();
			var ms_total_sf_15 =  + (ms_total_sf_15 ? ms_total_sf_15.replace(/[^\d.-]/g, '') : ms_total_sf_15);
			var ms_rent_15 = $(".ms_rent_15").val();
			var ms_rent_15 =  + (ms_rent_15 ? ms_rent_15.replace(/[^\d.-]/g, '') : ms_rent_15);
			var ms_total_sf_16 = $(".ms_total_sf_16").val();
			var ms_total_sf_16 =  + (ms_total_sf_16 ? ms_total_sf_16.replace(/[^\d.-]/g, '') : ms_total_sf_16);
			var ms_rent_16 = $(".ms_rent_16").val();
			var ms_rent_16 =  + (ms_rent_16 ? ms_rent_16.replace(/[^\d.-]/g, '') : ms_rent_16);
			var ms_total_sf_17 = $(".ms_total_sf_17").val();
			var ms_total_sf_17 =  + (ms_total_sf_17 ? ms_total_sf_17.replace(/[^\d.-]/g, '') : ms_total_sf_17);
			var ms_rent_17 = $(".ms_rent_17").val();
			var ms_rent_17 =  + (ms_rent_17 ? ms_rent_17.replace(/[^\d.-]/g, '') : ms_rent_17);
			var ms_total_sf_18 = $(".ms_total_sf_18").val();
			var ms_total_sf_18 =  + (ms_total_sf_18 ? ms_total_sf_18.replace(/[^\d.-]/g, '') : ms_total_sf_18);
			var ms_rent_18 = $(".ms_rent_18").val();
			var ms_rent_18 =  + (ms_rent_18 ? ms_rent_18.replace(/[^\d.-]/g, '') : ms_rent_18);
			var ms_total_sf_19 = $(".ms_total_sf_19").val();
			var ms_total_sf_19 =  + (ms_total_sf_19 ? ms_total_sf_19.replace(/[^\d.-]/g, '') : ms_total_sf_19);
			var ms_rent_19 = $(".ms_rent_19").val();
			var ms_rent_19 =  + (ms_rent_19 ? ms_rent_19.replace(/[^\d.-]/g, '') : ms_rent_19);
			var ms_total_sf_20 = $(".ms_total_sf_20").val();
			var ms_total_sf_20 =  + (ms_total_sf_20 ? ms_total_sf_20.replace(/[^\d.-]/g, '') : ms_total_sf_20);
			var ms_rent_20 = $(".ms_rent_20").val();
			var ms_rent_20 =  + (ms_rent_20 ? ms_rent_20.replace(/[^\d.-]/g, '') : ms_rent_20);
			var ms_total_units = $(".ms_total_units").val();
			var ms_total_units =  + (ms_total_units ? ms_total_units.replace(/[^\d.-]/g, '') : ms_total_units);
			var ms_no_vacant_unit = $(".ms_no_vacant_unit").val();
			var ms_no_vacant_unit =  + (ms_no_vacant_unit ? ms_no_vacant_unit.replace(/[^\d.-]/g, '') : ms_no_vacant_unit);
			var mf_one_sf = $(".mf_one_sf").val();
			var mf_one_sf =  + (mf_one_sf ? mf_one_sf.replace(/[^\d.-]/g, '') : mf_one_sf);
			var mf_one_rent = $(".mf_one_rent").val();
			var mf_one_rent =  + (mf_one_rent ? mf_one_rent.replace(/[^\d.-]/g, '') : mf_one_rent);
			var mf_two_sf = $(".mf_two_sf").val();
			var mf_two_sf =  + (mf_two_sf ? mf_two_sf.replace(/[^\d.-]/g, '') : mf_two_sf);
			var mf_two_rent = $(".mf_two_rent").val();
			var mf_two_rent =  + (mf_two_rent ? mf_two_rent.replace(/[^\d.-]/g, '') : mf_two_rent);
			var mf_three_sf = $(".mf_three_sf").val();
			var mf_three_sf =  + (mf_three_sf ? mf_three_sf.replace(/[^\d.-]/g, '') : mf_three_sf);
			var mf_three_rent = $(".mf_three_rent").val();
			var mf_three_rent =  + (mf_three_rent ? mf_three_rent.replace(/[^\d.-]/g, '') : mf_three_rent);
			var mf_four_sf = $(".mf_four_sf").val();
			var mf_four_sf =  + (mf_four_sf ? mf_four_sf.replace(/[^\d.-]/g, '') : mf_four_sf);
			var mf_four_rent = $(".mf_four_rent").val();
			var mf_four_rent =  + (mf_four_rent ? mf_four_rent.replace(/[^\d.-]/g, '') : mf_four_rent);
			var mf_five_sf = $(".mf_five_sf").val();
			var mf_five_sf =  + (mf_five_sf ? mf_five_sf.replace(/[^\d.-]/g, '') : mf_five_sf);
			var mf_five_rent = $(".mf_five_rent").val();
			var mf_five_rent =  + (mf_five_rent ? mf_five_rent.replace(/[^\d.-]/g, '') : mf_five_rent);
			var mf_six_sf = $(".mf_six_sf").val();
			var mf_six_sf =  + (mf_six_sf ? mf_six_sf.replace(/[^\d.-]/g, '') : mf_six_sf);
			var mf_six_rent = $(".mf_six_rent").val();
			var mf_six_rent =  + (mf_six_rent ? mf_six_rent.replace(/[^\d.-]/g, '') : mf_six_rent);
			var mf_seven_sf = $(".mf_seven_sf").val();
			var mf_seven_sf =  + (mf_seven_sf ? mf_seven_sf.replace(/[^\d.-]/g, '') : mf_seven_sf);
			var mf_seven_rent = $(".mf_seven_rent").val();
			var mf_seven_rent =  + (mf_seven_rent ? mf_seven_rent.replace(/[^\d.-]/g, '') : mf_seven_rent);
			var mf_eight_sf = $(".mf_eight_sf").val();
			var mf_eight_sf =  + (mf_eight_sf ? mf_eight_sf.replace(/[^\d.-]/g, '') : mf_eight_sf);
			var mf_eight_rent = $(".mf_eight_rent").val();
			var mf_eight_rent =  + (mf_eight_rent ? mf_eight_rent.replace(/[^\d.-]/g, '') : mf_eight_rent);
			var mf_nine_sf = $(".mf_nine_sf").val();
			var mf_nine_sf =  + (mf_nine_sf ? mf_nine_sf.replace(/[^\d.-]/g, '') : mf_nine_sf);
			var mf_nine_rent = $(".mf_nine_rent").val();
			var mf_nine_rent =  + (mf_nine_rent ? mf_nine_rent.replace(/[^\d.-]/g, '') : mf_nine_rent);
			var mf_ten_sf = $(".mf_ten_sf").val();
			var mf_ten_sf =  + (mf_ten_sf ? mf_ten_sf.replace(/[^\d.-]/g, '') : mf_ten_sf);
			var mf_ten_rent = $(".mf_ten_rent").val();
			var mf_ten_rent =  + (mf_ten_rent ? mf_ten_rent.replace(/[^\d.-]/g, '') : mf_ten_rent);
			var mf_no_unit = $(".mf_no_unit").val();
			var mf_no_unit =  + (mf_no_unit ? mf_no_unit.replace(/[^\d.-]/g, '') : mf_no_unit);
			var mf_vacant_unit = $(".mf_vacant_unit").val();
			var mf_vacant_unit =  + (mf_vacant_unit ? mf_vacant_unit.replace(/[^\d.-]/g, '') : mf_vacant_unit);
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
			var mf_prelease_unit = $(".mf_prelease_unit").val();
			var mf_prelease_unit =  + (mf_prelease_unit ? mf_prelease_unit.replace(/[^\d.-]/g, '') : mf_prelease_unit);
			var mf_total_unit_absorb = $(".mf_total_unit_absorb").val();
			var mf_total_unit_absorb =  + (mf_total_unit_absorb ? mf_total_unit_absorb.replace(/[^\d.-]/g, '') : mf_total_unit_absorb);
			var mf_mos_absorbtion = $(".mf_mos_absorbtion").val();
			var mf_mos_absorbtion =  + (mf_mos_absorbtion ? mf_mos_absorbtion.replace(/[^\d.-]/g, '') : mf_mos_absorbtion);
			var overall_gba = $(".overall_gba").val();
			var overall_gba =  + (overall_gba ? overall_gba.replace(/[^\d.-]/g, '') : overall_gba);
			var overall_nra = $(".overall_nra").val();
			var overall_nra =  + (overall_nra ? overall_nra.replace(/[^\d.-]/g, '') : overall_nra);
			var vacancy_sf_nra = $(".vacancy_sf_nra").val();
			var vacancy_sf_nra =  + (vacancy_sf_nra ? vacancy_sf_nra.replace(/[^\d.-]/g, '') : vacancy_sf_nra);
			var gross_land_sf = $(".gross_land_sf").val();
			var gross_land_sf =  + (gross_land_sf ? gross_land_sf.replace(/[^\d.-]/g, '') : gross_land_sf);
			var inline_space_sf = $(".inline_space_sf").val();
			var inline_space_sf =  + (inline_space_sf ? inline_space_sf.replace(/[^\d.-]/g, '') : inline_space_sf);
			var parking_stalls = $(".parking_stalls").val();
			var parking_stalls =  + (parking_stalls ? parking_stalls.replace(/[^\d.-]/g, '') : parking_stalls);
			var tenant_area_sf = $(".tenant_area_sf").val();
			var tenant_area_sf =  + (tenant_area_sf ? tenant_area_sf.replace(/[^\d.-]/g, '') : tenant_area_sf);
			var office_bo_sf = $(".office_bo_sf").val();
			var office_bo_sf =  + (office_bo_sf ? office_bo_sf.replace(/[^\d.-]/g, '') : office_bo_sf);
			var flex_off_sf = $(".flex_off_sf").val();
			var flex_off_sf =  + (flex_off_sf ? flex_off_sf.replace(/[^\d.-]/g, '') : flex_off_sf);
			var veh_showroom_sf = $(".veh_showroom_sf").val();
			var veh_showroom_sf =  + (veh_showroom_sf ? veh_showroom_sf.replace(/[^\d.-]/g, '') : veh_showroom_sf);
			var veh_service_sf = $(".veh_service_sf").val();
			var veh_service_sf =  + (veh_service_sf ? veh_service_sf.replace(/[^\d.-]/g, '') : veh_service_sf);
			var veh_tunnel = $(".veh_tunnel").val();
			var veh_tunnel =  + (veh_tunnel ? veh_tunnel.replace(/[^\d.-]/g, '') : veh_tunnel);
			var init_rent_sf_mo_shell = $(".init_rent_sf_mo_shell").val();
			var init_rent_sf_mo_shell =  + (init_rent_sf_mo_shell ? init_rent_sf_mo_shell.replace(/[^\d.-]/g, '') : init_rent_sf_mo_shell);
			var init_rent_sf_mo_office = $(".init_rent_sf_mo_office").val();
			var init_rent_sf_mo_office =  + (init_rent_sf_mo_office ? init_rent_sf_mo_office.replace(/[^\d.-]/g, '') : init_rent_sf_mo_office);
			var init_rent_sf_yr = $(".init_rent_sf_yr").val();
			var init_rent_sf_yr =  + (init_rent_sf_yr ? init_rent_sf_yr.replace(/[^\d.-]/g, '') : init_rent_sf_yr);
			var eff_rent_sf_mo_shell = $(".eff_rent_sf_mo_shell").val();
			var eff_rent_sf_mo_shell =  + (eff_rent_sf_mo_shell ? eff_rent_sf_mo_shell.replace(/[^\d.-]/g, '') : eff_rent_sf_mo_shell);
			var eff_rent_sf_mo_office = $(".eff_rent_sf_mo_office").val();
			var eff_rent_sf_mo_office =  + (eff_rent_sf_mo_office ? eff_rent_sf_mo_office.replace(/[^\d.-]/g, '') : eff_rent_sf_mo_office);
			var eff_rent_sf_mo_blend = $(".eff_rent_sf_mo_blend").val();
			var eff_rent_sf_mo_blend =  + (eff_rent_sf_mo_blend ? eff_rent_sf_mo_blend.replace(/[^\d.-]/g, '') : eff_rent_sf_mo_blend);
			var eff_rent_sf_yr = $(".eff_rent_sf_yr").val();
			var eff_rent_sf_yr =  + (eff_rent_sf_yr ? eff_rent_sf_yr.replace(/[^\d.-]/g, '') : eff_rent_sf_yr);
			var init_annual_rent = $(".init_annual_rent").val();
			var init_annual_rent =  + (init_annual_rent ? init_annual_rent.replace(/[^\d.-]/g, '') : init_annual_rent);
			var eff_annual_rent = $(".eff_annual_rent").val();
			var eff_annual_rent =  + (eff_annual_rent ? eff_annual_rent.replace(/[^\d.-]/g, '') : eff_annual_rent);
			var pre_lease_sf = $(".pre_lease_sf").val();
			var pre_lease_sf =  + (pre_lease_sf ? pre_lease_sf.replace(/[^\d.-]/g, '') : pre_lease_sf);
			var total_absorb_sf = $(".total_absorb_sf").val();
			var total_absorb_sf =  + (total_absorb_sf ? total_absorb_sf.replace(/[^\d.-]/g, '') : total_absorb_sf);
			var no_mos_absorb = $(".no_mos_absorb").val();
			var no_mos_absorb =  + (no_mos_absorb ? no_mos_absorb.replace(/[^\d.-]/g, '') : no_mos_absorb);
			var est_land_value_sf = $(".est_land_value_sf").val();
			var est_land_value_sf =  + (est_land_value_sf ? est_land_value_sf.replace(/[^\d.-]/g, '') : est_land_value_sf);
			var rate_return_land = $(".rate_return_land").val();
			var rate_return_land =  + (rate_return_land ? rate_return_land.replace(/[^\d.-]/g, '') : rate_return_land);
			var est_land_value = $(".est_land_value").val();
			var est_land_value =  + (est_land_value ? est_land_value.replace(/[^\d.-]/g, '') : est_land_value);
			var ind_ann_land_rent = $(".ind_ann_land_rent").val();
			var ind_ann_land_rent =  + (ind_ann_land_rent ? ind_ann_land_rent.replace(/[^\d.-]/g, '') : ind_ann_land_rent);
			$("#msrentsf1").val(ms_rent_1 / ms_total_sf_1).trigger('onblur');
			$("#msrentsf2").val(ms_rent_2 / ms_total_sf_2).trigger('onblur');
			$("#msrentsf3").val(ms_rent_3 / ms_total_sf_3).trigger('onblur');
			$("#msrentsf4").val(ms_rent_4 / ms_total_sf_4).trigger('onblur');
			$("#msrentsf5").val(ms_rent_5 / ms_total_sf_5).trigger('onblur');
			$("#msrentsf6").val(ms_rent_6 / ms_total_sf_6).trigger('onblur');
			$("#msrentsf7").val(ms_rent_7 / ms_total_sf_7).trigger('onblur');
			$("#msrentsf8").val(ms_rent_8 / ms_total_sf_8).trigger('onblur');
			$("#msrentsf9").val(ms_rent_9 / ms_total_sf_9).trigger('onblur');
			$("#msrentsf10").val(ms_rent_10 / ms_total_sf_10).trigger('onblur');
			$("#msrentsf11").val(ms_rent_11 / ms_total_sf_11).trigger('onblur');
			$("#msrentsf12").val(ms_rent_12 / ms_total_sf_12).trigger('onblur');
			$("#msrentsf13").val(ms_rent_13 / ms_total_sf_13).trigger('onblur');
			$("#msrentsf14").val(ms_rent_14 / ms_total_sf_14).trigger('onblur');
			$("#msrentsf15").val(ms_rent_15 / ms_total_sf_15).trigger('onblur');
			$("#msrentsf16").val(ms_rent_16 / ms_total_sf_16).trigger('onblur');
			$("#msrentsf17").val(ms_rent_17 / ms_total_sf_17).trigger('onblur');
			$("#msrentsf18").val(ms_rent_18 / ms_total_sf_18).trigger('onblur');
			$("#msrentsf19").val(ms_rent_19 / ms_total_sf_19).trigger('onblur');
			$("#msrentsf20").val(ms_rent_20 / ms_total_sf_20).trigger('onblur');
			$("#msvacpct").val((ms_no_vacant_unit / ms_total_units) * 100).trigger('onblur');
			$("#mfrentsf1").val(mf_one_rent / mf_one_sf).trigger('onblur');
			$("#mfrentsf2").val(mf_two_rent / mf_two_sf).trigger('onblur');
			$("#mfrentsf3").val(mf_three_rent / mf_three_sf).trigger('onblur');
			$("#mfrentsf4").val(mf_four_rent / mf_four_sf).trigger('onblur');
			$("#mfrentsf5").val(mf_five_rent / mf_five_sf).trigger('onblur');
			$("#mfrentsf6").val(mf_six_rent / mf_six_sf).trigger('onblur');
			$("#mfrentsf7").val(mf_seven_rent / mf_seven_sf).trigger('onblur');
			$("#mfrentsf8").val(mf_eight_rent / mf_eight_sf).trigger('onblur');
			$("#mfrentsf9").val(mf_nine_rent / mf_nine_sf).trigger('onblur');
			$("#mfrentsf10").val(mf_ten_rent / mf_ten_sf).trigger('onblur');
			var _element = document.getElementById('selectSubPropertType');
			if (_element.options[_element.selectedIndex].value == '100') {
				$("#mfvacpct").val((mf_vacant_unit / mf_total_spaces) * 100).trigger('onblur');
			} else {
				$("#mfvacpct").val((mf_vacant_unit / mf_no_unit) * 100).trigger('onblur');
			}
			$("#maxrent").val(Math.max(mf_sw_avg_rent, mf_dw_avg_rent, mf_tw_avg_rent, mf_rv_avg_rent, mf_sw_high_rent, mf_dw_high_rent, mf_tw_high_rent, mf_rv_high_rent)).trigger('onblur');
			$("#mftotalspots").val(mf_no_single + mf_no_double + mf_no_triple + mf_no_rv_spaces).trigger('onblur');
			$("#mftotavgrent").val(((mf_no_single * mf_sw_avg_rent) + (mf_no_double * mf_dw_avg_rent) + (mf_no_triple * mf_tw_avg_rent) + (mf_no_rv_spaces * mf_rv_avg_rent)) / (mf_no_single + mf_no_double + mf_no_triple + mf_no_rv_spaces)).trigger('onblur');
			$("#mfplpctunit").val((mf_prelease_unit / (mf_no_unit + (mf_no_single + mf_no_double + mf_no_triple + mf_no_rv_spaces))) * 100).trigger('onblur');
			$("#mfpctabsorb").val((mf_total_unit_absorb / (mf_no_unit + (mf_no_single + mf_no_double + mf_no_triple + mf_no_rv_spaces))) * 100).trigger('onblur');
			$("#mfabsorbpermo").val(mf_total_unit_absorb / mf_mos_absorbtion).trigger('onblur');
			$("#projvacancypct").val((vacancy_sf_nra / overall_nra) * 100).trigger('onblur');
			$("#inlinevacancypct").val((vacancy_sf_nra / inline_space_sf) * 100).trigger('onblur');
			$("#glaacres").val(gross_land_sf / 43560).trigger('onblur');
			$("#parkratio").val((parking_stalls / overall_nra) * 1000).trigger('onblur');
			$("#ltbratio").val(gross_land_sf / overall_gba).trigger('onblur');
			$("#officebopct").val((office_bo_sf / tenant_area_sf) * 100).trigger('onblur');
			$("#flexpct").val((flex_off_sf / tenant_area_sf) * 100).trigger('onblur');
			$("#showroompct").val((veh_showroom_sf / overall_gba) * 100).trigger('onblur');
			if (init_rent_sf_mo_shell == 0) {
				$("#initrentblendsfmo").val(init_rent_sf_yr / 12).trigger('onblur');
			} else {
				$("#initrentblendsfmo").val(((tenant_area_sf * init_rent_sf_mo_shell) + (office_bo_sf * init_rent_sf_mo_office)) / tenant_area_sf).trigger('onblur');
			}
			if (eff_rent_sf_mo_shell == 0) {
				$("#effrentblendsfmo").val(eff_rent_sf_yr / 12).trigger('onblur');
			} else {
				$("#effrentblendsfmo").val(((tenant_area_sf * eff_rent_sf_mo_shell) + (office_bo_sf * eff_rent_sf_mo_office)) / tenant_area_sf).trigger('onblur');
			}
			var _element = document.getElementById("selectPropertType");
			if (_element.options[_element.selectedIndex].value == '4') {
				$("#initRentsfyear").val((((tenant_area_sf * init_rent_sf_mo_shell) + (office_bo_sf * init_rent_sf_mo_office)) / tenant_area_sf) * 12).trigger('onblur');
				$("#initannrent").val(((((tenant_area_sf * init_rent_sf_mo_shell) + (office_bo_sf * init_rent_sf_mo_office)) / tenant_area_sf) * 12) * tenant_area_sf).trigger('onblur');
				$("#effannrent").val(((((tenant_area_sf * eff_rent_sf_mo_shell) + (office_bo_sf * eff_rent_sf_mo_office)) / tenant_area_sf) * 12) * tenant_area_sf).trigger('onblur');
				$("#indbldgrent").val(((((((tenant_area_sf * eff_rent_sf_mo_shell) + (office_bo_sf * eff_rent_sf_mo_office)) / tenant_area_sf) * 12) * tenant_area_sf) - (((gross_land_sf * est_land_value_sf) * (rate_return_land / 100))))).trigger('onblur');
				$("#indbldgrentsf").val((((((((tenant_area_sf * eff_rent_sf_mo_shell) + (office_bo_sf * eff_rent_sf_mo_office)) / tenant_area_sf) * 12) * tenant_area_sf) - (((gross_land_sf * est_land_value_sf) * (rate_return_land / 100))))) / overall_nra).trigger('onblur');
				$("#effRentsfyear").val(eff_rent_sf_mo_blend * 12).trigger('onblur');
			} else {
				$("#initannrent").val(init_rent_sf_yr * tenant_area_sf).trigger('onblur');
				$("#effannrent").val(eff_rent_sf_yr * tenant_area_sf).trigger('onblur');
				$("#indbldgrent").val(((eff_rent_sf_yr * tenant_area_sf) - (((gross_land_sf * est_land_value_sf) * (rate_return_land / 100))))).trigger('onblur');
				$("#indbldgrentsf").val((((eff_rent_sf_yr * tenant_area_sf) - (((gross_land_sf * est_land_value_sf) * (rate_return_land / 100))))) / overall_nra).trigger('onblur');
			}
			$("#initmonrent").val(init_annual_rent / 12).trigger('onblur');
			$("#effmonrent").val(eff_annual_rent / 12).trigger('onblur');
			$("#effannrenttunnel").val((eff_rent_sf_yr * tenant_area_sf) / veh_tunnel).trigger('onblur');
			$("#preleasenra").val((pre_lease_sf / overall_nra)*100).trigger('onblur');
			$("#preleaseinline").val(pre_lease_sf / inline_space_sf).trigger('onblur');
			$("#leasepctnra").val((total_absorb_sf / overall_nra) * 100).trigger('onblur');
			$("#leasepctinline").val(total_absorb_sf / inline_space_sf).trigger('onblur');
			$("#absorbpermo").val(total_absorb_sf / no_mos_absorb).trigger('onblur');
			$("#projsf").val(gross_land_sf).trigger('onblur');
			$("#estlandvalue").val(gross_land_sf * est_land_value_sf).trigger('onblur');
			$("#indannlandrent").val(((gross_land_sf * est_land_value_sf) * (rate_return_land / 100))).trigger('onblur');
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
	_leasesController.setOptions(options);
	return _leasesController;
}
