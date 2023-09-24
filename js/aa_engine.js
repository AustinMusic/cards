var _aa_engine = function () {
    var aa_engine;
    var rbe_engine = new _rbe_engine();
    aa_engine = {
		formatNumber: function (number, digits, decimalPlaces, withCommas) {
			
			number = number.toString();
			var simpleNumber = '';
            var mathSymbol = "";
            var cIndex = number.indexOf("-");
            if (cIndex !== -1) {
                mathSymbol = number.charAt(cIndex);
            }
            for (var i = 0; i < number.length; ++i) {
                if ("0123456789.".indexOf(number.charAt(i)) >= 0)
                    simpleNumber += number.charAt(i);
            }
            number = parseFloat(simpleNumber);
			
			if (isNaN(number)){
				 number = 0;
			}
            if (withCommas == null){
                withCommas = false;
			}
            if (digits == 0){
                digits = 1;
			}
			/*var integerPart = Math.round(number);
			/*if(decimalPlaces > 0){*/
				integerPart = Math.floor(number);
			//}
            //var integerPart = (decimalPlaces > 0 ? Math.floor(number) : Math.round(number));
			//console.log(integerPart);
			var decPart = 0;
			if (decimalPlaces > 0) {
				integerPart = number.toFixed(decimalPlaces);
				var numParts = integerPart.toString().split(".");
				decPart = numParts[1];
				integerPart = numParts[0];
			}
			//console.log(integerPart);
            var string = "";
            for (var i = 0; i < digits || integerPart > 0; ++i) {
                if (withCommas && string.match(/^\d\d\d/)) {
                    string = "," + string;
                }
                string = (integerPart % 10) + string;
                integerPart = Math.floor(integerPart / 10);
            }
			/*console.log(string+" "+integerPart);*/
			//console.log(string);
			if (decimalPlaces > 0) {
				string+="."+decPart;
			}
			//console.log(string);
			return mathSymbol+string;
		},
        formatNumber_stable: function (number, digits, decimalPlaces, withCommas) {//
            number = number.toString();
			//console.log(number);
            var simpleNumber = '';
            var mathSymbol = "";
            var cIndex = number.indexOf("-");
            if (cIndex !== -1) {
                mathSymbol = number.charAt(cIndex);
            }
            for (var i = 0; i < number.length; ++i) {
                if ("0123456789.".indexOf(number.charAt(i)) >= 0)
                    simpleNumber += number.charAt(i);
            }
            number = parseFloat(simpleNumber);
			//console.log(number);
            if (isNaN(number))
                number = 0;
            if (withCommas == null)
                withCommas = false;
            if (digits == 0)
                digits = 1;
            var integerPart = (decimalPlaces > 0 ? Math.floor(number) : Math.round(number));
            var string = "";
            for (var i = 0; i < digits || integerPart > 0; ++i) {
                if (withCommas && string.match(/^\d\d\d/)) {
                    string = "," + string;
                }
                string = (integerPart % 10) + string;
                integerPart = Math.floor(integerPart / 10);
            }
			
			//console.log(string);
            if (decimalPlaces > 0) {
                number -= Math.floor(number);
                number *= Math.pow(10, decimalPlaces);
				//console.log(number);
				var decPart = aa_engine.formatNumber(number, decimalPlaces, 0);
				//console.log(decPart);
				//console.log(string+" "+integerPart+" "+decPart);
				/*if(parseInt(decPart)==10){
					string = parseInt(string)+1;
					string = string.toString();
					if(withCommas){
						string+=",";
					}
					for(var d=0;d<decimalPlaces;d++){
						string+="0";
					}
				}else{
					string = string+"." + decPart;
				}*/
				/*if(parseInt(decPart)>=10){*/
					string = string+"." + decPart;
					/*string = parseInt(string)+parseInt(decPart.substr(0,1))+".";
					var decRest = decPart.substr(1);
					for(var d=0;d<decimalPlaces;d++){
						if(d<decRest.length){
							string+=decRest.substr(d,1);
						}else{
							string+="0";
						}
					}
				}else{
					string += "." + decPart;
				}*/
                
            }
            string = mathSymbol + string;
            return string;
        },
        changeFormat: function (_elementID, digits, decimalPlaces, withCommas) {
            var _element = document.getElementById(_elementID);
            if (rbe_engine.checkElement(_element)) {
                _element.setAttribute("onBlur", "this.value = aa_engine.formatNumber(this.value," + digits + "," + decimalPlaces + "," + withCommas + ");");
                _element.onblur();
                return true;
            }
            console.log("No element with id " + _elementID);
            return false;
        },
        addLink: function (_element) {
            var u_element = document.getElementById("docUrl_1");
            if (!rbe_engine.checkElement(u_element)) {
                return false;
            }
            var t_element = document.getElementById("docTitle_1");
            if (!rbe_engine.checkElement(t_element)) {
                return false;
            }
            if (u_element.value == "") {
                alert("Please type a url!");
                return false;
            }
            if (t_element.value == "") {
                alert("Please type a title!");
                return false;
            }
            var _elements = document.getElementsByClassName("doc_href");
            var _index = 0;
            if (u_element.getAttribute("data-index") != undefined && u_element.getAttribute("data-index") != null) {
                _index = parseInt(u_element.getAttribute("data-index"));
            }
            if (_index != 0) {
                var __element = document.getElementById("doc_href_" + _index);
                if (rbe_engine.checkElement(__element)) {
                    var __element = __element.querySelector(".doc_href");
                    if (__element != null && __element != undefined) {
                        __element.setAttribute("href", u_element.value);
                        __element.innerHTML = t_element.value;
                    }
                }
            } else {
                node = document.createElement("span");
                node.setAttribute("id", "doc_href_" + (_elements.length + 1));
                node.setAttribute("class", "col-xs-12 padding-5");
                node.innerHTML = "<a class='doc_href' href='" + u_element.value + "' target='_blank'>" + t_element.value + "</a>&nbsp;<img src='../img/lfremove.gif' alt='remove' class='remDoc' style='cursor:pointer;'><img src='../img/lfedit.gif' alt='edit' class='editDoc' style='cursor:pointer;'>";
                node.querySelector(".remDoc").setAttribute("onClick", aa_engine + ".remLink(this);");
                node.querySelector(".editDoc").setAttribute("onClick", aa_engine + ".editLink(this);");
                var v_element = document.getElementById("docHref");
                v_element.appendChild(node);
            }
            var __element = document.getElementById("docData");
            if (rbe_engine.checkElement(__element)) {
                var data = __element.value;
                if (data != "") {
                    data = JSON.parse(data);
                } else {
                    data = [];
                }
                if (_index != 0) {
                    data[_index - 1] = {
                        boxurl: u_element.value,
                        file_label: t_element.value
                    };
                } else {
                    data.push({
                        boxurl: u_element.value,
                        file_label: t_element.value
                    });
                }
                __element.value = JSON.stringify(data);
            }
            u_element.value = "";
            t_element.value = "";
            u_element.setAttribute("data-index", 0);
        },
        remLink: function (_element) {
            var data = "";
            var __element = document.getElementById("docData");
            if (rbe_engine.checkElement(__element)) {
                data = __element.value;
                if (data == "") {
                    return false;
                }
                data = JSON.parse(data);
            }
            var _elements = document.getElementsByClassName("doc_href");
            if (rbe_engine.checkElement(_elements)) {
                if (_elements.length > -1) {
                    var __elements = document.querySelectorAll("#docHref .doc_href");
                    if (rbe_engine.checkElement(__elements)) {
                        for (var j = 0; j < __elements.length; j++) {
                            if (__elements[j].parentNode == _element.parentNode) {
                                data.splice(j, 1);
                                __element.value = JSON.stringify(data);
                                break;
                            }
                        }
                    }
                    var id = _element.parentNode.getAttribute("id");
                    id = id.split("_");
                    id = id[2];
                    var __element = document.getElementById("docUrl_" + id);
                    if (rbe_engine.checkElement(__element)) {
                        __element.parentNode.parentNode.removeChild(__element.parentNode);
                    }
                    _element.parentNode.parentNode.removeChild(_element.parentNode);
                }
            }
        },
        editLink: function (_element) {
            var __element = _element.parentNode.querySelector(".doc_href");
            if (rbe_engine.checkElement(__element)) {
                var u_element = document.getElementById("docUrl_1");
                if (!rbe_engine.checkElement(u_element)) {
                    return false;
                }
                var t_element = document.getElementById("docTitle_1");
                if (!rbe_engine.checkElement(t_element)) {
                    return false;
                }
                var id = _element.parentNode.getAttribute("id");
                var _index = id.split("_");
                _index = _index[2];
                u_element.setAttribute("data-index", _index);
                u_element.value = __element.getAttribute("href");
                t_element.value = __element.innerHTML;
            }
        },
        getUrlVars: function () {
            var vars = [],
            hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            for (var i = 0; i < hashes.length; i++) {
                hash = hashes[i].split('=');
                hash[1] = unescape(hash[1]);
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
        }
    };
    return aa_engine;
}
