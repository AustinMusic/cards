var _baseController = function (options) {
	var _baseController;
	var rbe_engine = new _rbe_engine();
	_baseController = {
		options: {
			activeObject: "",
			id: "",
			data: "",
			mapType: "",
			openerController:"",
			onReturnExecutionMethod: "",
			dataName: "",
		},
		mapController: "",
		data: {},
		setOptions: function (options) {
			for (var attr in options) {
				if (this.options.hasOwnProperty(attr)) {
					this.options[attr] = options[attr];
				}
			}
		},
		init: function () {
			this.renderUI();
			this.assignEvents();
		},
		renderUI: function () {
			if (window.opener != null) {
				var params = rbe_engine.getParameters();
				console.log(params);
				var table = params.table;
				var id = params.id;
				if(table==undefined){
					return false;
				}
				var requestData = params.requestData
				if(requestData==undefined){
					return false;
				}
				var hids = params.hids
				if(hids==undefined){
					return false;
				}
				var isInsert = true;
				if(id!=undefined){
					isInsert = false;
				}

				if(this.options.openerController==""){
					this.options.openerController = "appraisalsController";
				}
					
				_element = window.opener.document.getElementById(table); 
				if (rbe_engine.checkElement(_element) && (this.options.data!="")) {
					var parent = _element.querySelector("tbody");
					var jsonData = this.options.data[0];
					
					var row = document.createElement("tr");
					row.setAttribute("id", jsonData.id);
					
					var html = "";
					var rows = _element.querySelectorAll("tbody tr");
					if(isInsert){
						row.innerHTML = rows[0].innerHTML;
					}else{
						var trow = rbe_engine.getItemForMethod(rows,"id",jsonData.id,false);
						if(trow!=false){
							row = trow;
						}
					}
					if(rbe_engine.checkElement(rows[0])){
						row.setAttribute("data-coords", JSON.stringify({lat:jsonData.lat,lng:jsonData.lng}));
					}

					var _elements = row.querySelectorAll("td");
					for(var i=0;i<_elements.length;i++){
						var dataProperty = _elements[i].getAttribute("data-property");
						var dataType = _elements[i].getAttribute("data-type");
						var dataMethod = _elements[i].getAttribute("data-method");
						var dataBind = _elements[i].getAttribute("data-bind");
						console.log(_elements[i]);
						if(rbe_engine.checkElement(dataType)){
							switch(dataType){
								case "sequence":
									if(isInsert){
										_elements[i].innerHTML = rows.length;
									}
								break;
								case "thumb":
									var t_element =  _elements[i].querySelector("a");
									dataProperty = t_element.getAttribute("data-property");
									if(rbe_engine.checkElement(dataProperty)){
										t_element.href = "/cards/comp_images/"+jsonData[dataProperty];
									}
									var i_element =  t_element.querySelector("img");
									dataProperty = i_element.getAttribute("data-property");
									if(rbe_engine.checkElement(dataProperty)){
										i_element.src = "/cards/comp_images/"+jsonData[dataProperty];
									}
								break;
								case "linkbutton":
									if(jsonData[dataProperty]==""){
										var t_element =  _elements[i].querySelector("a");
										if(rbe_engine.checkElement(t_element)){
											t_element.parentNode.removeChild(t_element);
										}
										var t_element =  _elements[i].querySelector("span");
										if(!rbe_engine.checkElement(t_element)){
											_elements[i].innerHTML = "<span>No Document Available</span>";
										}
									}else{
										var t_element =  _elements[i].querySelector("a");
										if(!rbe_engine.checkElement(t_element)){
											if(dataMethod!=undefined && dataBind!=undefined){
												_elements[i].innerHTML = "<a class='btn btn-success dl-report' role='button'>Download</a>";
												var t_element =  _elements[i].querySelector("a");
												if(rbe_engine.checkElement(t_element)){
													t_element.setAttribute(dataBind,this.options.openerController.option.activeObject+"."+ dataMethod+"(this)");
												}
											}
										}
										
										var t_element =  _elements[i].querySelector("span");
										if(rbe_engine.checkElement(t_element)){
											t_element.parentNode.removeChild(t_element);
										}
									}
								break;
								
							}
						}else{
							if(rbe_engine.checkElement(dataProperty)){
								if(dataProperty.indexOf(",")!=-1){
									dataProperties = dataProperty.split(",");
									var dhtml = [];
									for(var j=0;j<dataProperties.length;j++){
										dhtml.push(jsonData[dataProperties[j]]);
									}
									_elements[i].innerHTML = dhtml.join("<br/>");
								}else{
									_elements[i].innerHTML = jsonData[dataProperty];
								}
							}
						}
					}

					if(isInsert){
						parent.appendChild(row);
					}
					var __element = window.opener.document.getElementById(hids);
					if (rbe_engine.checkElement(__element)) {
						if (__element.value != "") {
							var ids = [];
							if (__element.value.indexOf(",") != -1) {
								ids = __element.value.split(",");
								if(!ids.includes(jsonData.id.toString())){
									ids.push(jsonData.id);
								}
								__element.value = ids.join(",");
							} else {
								ids.push(__element.value);
								if(!ids.includes(jsonData.id.toString())){
									ids.push(jsonData.id);
								}
								__element.value = ids.join(",");
							}
						} else {
							__element.value = jsonData.id;
						}
					}


					window.opener[this.options.openerController].assignSelectRowsEvents();
					if(window.opener.addMarker!=undefined){
						window.opener.addMarker(JSON.stringify({
							index: rows.length,
							lat: jsonData.lat,
							lng: jsonData.lng,
							mapType: this.options.mapType,
							id: jsonData.id
						}));
					}else{
						if(window.opener[window.opener.activeObject].mapController.addMarker!=undefined){
							window.opener[window.opener.activeObject].mapController.addMarker(JSON.stringify({
								index: rows.length,
								lat: jsonData.lat,
								lng: jsonData.lng,
								mapType: this.options.mapType,
								id: jsonData.id
							}));
						}
					}
					if(this.options.onReturnExecutionMethod!=""){
						if(window.opener[window.opener.activeObject][this.options.onReturnExecutionMethod]!=undefined){
							window.opener[window.opener.activeObject][this.options.onReturnExecutionMethod].apply(window.opener[window.opener.activeObject], []);
						}
					}
					if(this.options.dataName!=""){
						window.opener[window.opener.activeObject].data[this.options.dataName] = this.options.data;
					}
					window.close();
				}
			}
		},
		assignEvents: function(){
			var _element = document.getElementById("submitForm");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onClick",this.options.activeObject+".showLoader(this);");
			}
		},
		upItem: function (_element) {
			var rbe_engine = new _rbe_engine();
			var _rowElement = false;
			var type = _element.getAttribute("data-type");
			var options = this.getActionType(_element);
			var rows = document.querySelectorAll("#" + type + "_table tbody >tr");
			for (var i = 0; i < rows.length; i++) {
				if (rows[i].hasAttribute("data-selected")) {
					_rowElement = rows[i];
					continue;
				}
			}
			if (_rowElement != false) {
				if (_rowElement != _rowElement.parentNode.firstElementChild) {
					var currentHTML = _rowElement.innerHTML;
					var currentid = _rowElement.id;
					var upElement = _rowElement.previousSibling;
					if (upElement.nodeType == 3) {
						upElement = upElement.previousSibling;
					}
					if(upElement.style.display=="none"){
						return false;
					}
					var currentSequenceNumbber = _rowElement.querySelectorAll("td")[0].innerHTML;
					var upSequenceNumbber = upElement.querySelectorAll("td")[0].innerHTML;
					_rowElement.innerHTML = upElement.innerHTML;
					_rowElement.id = upElement.id;
					_rowElement.removeAttribute("data-selected");
					_rowElement.style.backgroundColor = "#ffffff";
					_rowElement.style.background = "none";
					_rowElement.querySelectorAll("td")[0].innerHTML = currentSequenceNumbber;
					rbe_engine.removeClass(_rowElement,"selectedRow");
					_rowElement.removeAttribute("style");
					upElement.innerHTML = currentHTML;
					upElement.id = currentid;
					upElement.setAttribute("data-selected", true);
					upElement.style.backgroundColor = "#d6d6d6";
					upElement.querySelectorAll("td")[0].innerHTML = upSequenceNumbber;
					if (this.mapController.data.maps[type] != undefined) {
						var marker = rbe_engine.getItemForMethod(this.mapController.data.maps[type].markers.objects, "reportID", currentid);
						if (marker !== false) {
							marker.setMap(null);
							marker.label = upSequenceNumbber;
							marker.setMap(this.mapController.data.maps[type].map);
						}
						marker = rbe_engine.getItemForMethod(this.mapController.data.maps[type].markers.objects, "reportID", _rowElement.id);
						if (marker !== false) {
							marker.setMap(null);
							marker.label = currentSequenceNumbber;
							marker.setMap(this.mapController.data.maps[type].map);
						}
					}
					var _element = document.getElementById(options.idsInputElement);
					if (rbe_engine.checkElement(_element)) {
						var itemIDs = _element.value.split(",");
						tempid = itemIDs[upSequenceNumbber - 1];
						itemIDs[upSequenceNumbber - 1] = currentid;
						itemIDs[currentSequenceNumbber - 1] = tempid;
						_element.value = itemIDs.join(",");
					}
				}
			}
		},
		downItem: function (_element) {
			var rbe_engine = new _rbe_engine();
			var _rowElement = false;
			var type = _element.getAttribute("data-type");
			var options = this.getActionType(_element);
			var rows = document.querySelectorAll("#" + type + "_table tbody >tr");
			for (var i = 0; i < rows.length; i++) {
				if (rows[i].hasAttribute("data-selected")) {
					_rowElement = rows[i];
					continue;
				}
			}
			if (_rowElement != false) {
				if (_rowElement != _rowElement.parentNode.lastElementChild) {
					var currentHTML = _rowElement.innerHTML;
					var currentid = _rowElement.id;
					var downElement = _rowElement.nextSibling;
					if (downElement.nodeType == 3) {
						downElement = downElement.nextSibling;
					}
					var currentSequenceNumber = _rowElement.querySelectorAll("td")[0].innerHTML;
					var downSequenceNumber = downElement.querySelectorAll("td")[0].innerHTML;
					_rowElement.innerHTML = downElement.innerHTML;
					_rowElement.id = downElement.id;
					_rowElement.removeAttribute("data-selected");
					_rowElement.style.backgroundColor = "#ffffff";
					_rowElement.style.background = "none";
					_rowElement.querySelectorAll("td")[0].innerHTML = currentSequenceNumber;
					rbe_engine.removeClass(_rowElement,"selectedRow");
					_rowElement.removeAttribute("style");
					downElement.innerHTML = currentHTML;
					downElement.id = currentid;
					downElement.setAttribute("data-selected", true);
					downElement.style.backgroundColor = "#d6d6d6";
					downElement.querySelectorAll("td")[0].innerHTML = downSequenceNumber;
					if (this.mapController.data.maps[type] != undefined) {
						var marker = rbe_engine.getItemForMethod(this.mapController.data.maps[type].markers.objects, "reportID", currentid);
						if (marker !== false) {
							marker.setMap(null);
							marker.label = downSequenceNumber;
							marker.setMap(this.mapController.data.maps[type].map);
						}
						marker = rbe_engine.getItemForMethod(this.mapController.data.maps[type].markers.objects, "reportID", _rowElement.id);
						if (marker !== false) {
							marker.setMap(null);
							marker.label = currentSequenceNumber;
							marker.setMap(this.mapController.data.maps[type].map);
						}
					}
					var _element = document.getElementById(options.idsInputElement);
					if (rbe_engine.checkElement(_element)) {
						var itemIDs = _element.value.split(",");
						tempid = itemIDs[downSequenceNumber - 1];
						itemIDs[downSequenceNumber - 1] = currentid;
						itemIDs[currentSequenceNumber - 1] = tempid;
						_element.value = itemIDs.join(",");
					}
				}
			}
		},
		getActionType: function (_element) {
			var type = _element.getAttribute("data-type");
			var tableName = type + "_table";
			var idsInputElement = type + "IDs";
			var idsArray = [];
			var idsUrl = type + ".php";
			var requestData = type + "Data";
			var btnLabel = "";
			switch (type) {
			case "client":
				btnLabel = "Client";
				break;
			case "appraiser":
				btnLabel = "Appraiser";
				break;
			case "improved_sales":
				idsUrl = "improved.php";
				requestData = "improvedData";
				btnLabel = "Sale";
				break;
			case "impselect":
				idsInputElement = "improved_salesIDs";
				requestData = "improvedData";
				btnLabel = "Sale";
				break;
			case "land_sales":
				idsUrl = "land.php";
				btnLabel = "Land Sale";
				break;
			case "landselect":
				idsInputElement = "land_salesIDs";
				requestData = "landData";
				btnLabel = "Land Sale";
				break;
			case "leases":
				idsInputElement = "leaseIDs";
				idsUrl = "rent.php";
				btnLabel = "Lease";
				break;
			case "leaseselect":
				idsInputElement = "leaseIDs";
				requestData = "leaseData";
				btnLabel = "Land Sale";
				break;
			case "addleaseselect":
				idsInputElement = "xtrarentsIDs";
				requestData = "xtrarentsData";
				btnLabel = "Leases";
				break;
			case "caprate":
				btnLabel = "Cap Rate";
				break;
			case "capselect":
				idsInputElement = "caprateIDs";
				requestData = "caprateData";
				btnLabel = "Cap Rate";
				break;
			case "rent":
				idsInputElement = "leaseIDs";
				tableName = "leases_table";
				btnLabel = "Create New Lease";
				break;
			case "addrent":
				idsInputElement = "xtrarentsIDs";
				tableName = "xtrarents_table";
				btnLabel = "Create New Lease";
				break;
			case "miscrent":
				btnLabel = "Misc. Rent";
				break;
			case "miscrentselect":
				idsInputElement = "miscrentIDs";
				requestData = "miscrentData";
				btnLabel = "Misc. Rent";
				break;
			case "units":
				idsUrl = "unitmix.php";
				btnLabel = "Unit Mix";
				break;
			}
			return {
				tableName: tableName,
				idsInputElement: idsInputElement,
				idsArray: idsArray,
				idsUrl: idsUrl,
				btnLabel: btnLabel,
				requestData: requestData
			};
		},
		showLoader: function(){
			/*var div = document.createElement("div");
			div.setAttribute("style", "position:absolute; top:0; left:0; z-index:9999; width:100%; height:100%; background-color:#c2c2c2; opacity:40;");
			div.innerHTML = "<img src='/cards/img/loading.gif' style='display:block;'/>";
			
			document.getElementsByTagName("body")[0].appendChild(div);*/
		},
		showErrorMessage: function (message) {}
	};
	_baseController.setOptions(options);
	return _baseController;
}
