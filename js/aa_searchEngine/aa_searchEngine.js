var _aa_searchEngine = function (options) {
	var aa_searchEngine;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	aa_searchEngine = {
		options: {
			activeObject: "",
			baseURL: "",
//			baseURL: "localhost/cards/",
			ajaxURL: "forms/ajax_forms.php",
			ajaxDataSourceURL: "../forms/ajax_datasource.php",
			translations: {},
			tableData: [],
			templates: {},
			reportTypeID: [],
			data: [],
			gridType: "",
			templates: {},
			selectionsElement: "",
			addButton: "addSelectedLinesBtn",
			mainContainer: "filterlist",
			wopener: {
				container: "",
				cellMethods: [],
				idsInput: "",
				cellClasses: [] 
			},
			defaultSchemes: [],
			gridRowTPL: "",
			map: "",
			filterMatch: {},
			isAdmin: false,
			autoExecSearch: false,
			renderMap:false
		},
		aa_engine: aa_engine,
		mapController: "",
		data: {
			conditionIndex: 0,
			ajaxQuee: [],
			dataSources: {},
			selectedData: [],
			selectedIds: [],
			conditionSchemeIndex: false,
			schemeID: false,
			presetGroupIndex: [],
			searchSyncData: [],
			selectedReportID: 0,
		},
		execMethodAfterAjax: "",
		setOptions: function (options) {
			for (var _attr in options) {
				if (this.options.hasOwnProperty(_attr)) {
					this.options[_attr] = options[_attr];
				}
			}
		},
		init: function () {
			this.getSelectedData();
			this.renderLayout();
			this.renderSchemesDropDown();
			this.initializeDialog();
			this.maskFilters();
			this.assignEvents();
			if(this.options.autoExecSearch){
				var filters = this.buildFilters();
				this.data.ajaxQuee.push(JSON.stringify(filters));
				if (this.data.ajaxQuee.length == 1) {
					this.execAjax(filters);
				}
			}
			if(this.options.renderMap){
				this.mapController = new _mapController( {
					activeObject: this.options.activeObject+".mapController",
				} );
			}
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
			var _element = document.getElementById("dialogueDeleteReport");
			if (_element == null || _element == undefined) {
				var _element = document.createElement("div");
				_element.setAttribute("id", "dialogueDeleteReport");
				document.getElementsByTagName('body')[0].appendChild(_element);
				$("#dialogueDeleteReport").dialog({
					autoOpen: false,
					height: 200,
					width: 600,
					modal: true,
					controller: this.options.activeObject,
					title: this.options.translations["error"],
					buttons: [{
							text: "Cancel",
							click: function () {
								var tempController = window[$("#dialogueDeleteReport").dialog("option", "controller")];
								tempController.data.selectedReportID = 0;
								$(this).dialog("close");
							}
						}, {
							text: "Delete",
							click: function () {
								var tempController = window[$("#dialogueDeleteReport").dialog("option", "controller")];
								console.log(tempController);
								$.ajax({
									url: tempController.options.baseURL + "forms/ajax_deleteRecord.php",
									type: "post",
									dataType: "json",
									data: {
										reportID: tempController.data.selectedReportID
									},
									beforeSend: function () {},
									success: function (retJson) {
										var _element = document.getElementById("searchbox");
										if (rbe_engine.checkElement(_element)) {
											var url = (tempController.options.baseURL + "reports.php?search=" + _element.value);
											window.location = url;
										}
									},
									error: function (jqXHR, textStatus, errorThrown) {
										tempController.showErrorMessage("An error occured.");
									}
								});
								$(this).dialog("close");
							}
						}
					]
				});
			}
		},
		getSelectedData: function () {
			if (this.options.wopener.idsInput!= "") {
				var _element = window.opener.document.getElementById(this.options.wopener.idsInput);
				if (rbe_engine.checkElement(_element)) {
					var ids = _element.value;
					if (ids != "") {
						if (ids.indexOf(",") != -1) {
							this.data.selectedIds = ids.split(",");
						} else {
							this.data.selectedIds.push(ids);
						}
					} else {
						this.data.selectedIds = [];
					}
				}
			}
		},
		maskFilters: function () {},
		hideMask: function (_element) {
			_element.style.display = "none";
			var _elements = _element.parentNode.querySelectorAll("._searchFilter");
			for (var i = 0; i < _elements.length; i++) {
				_elements[i].style.display = "block";
			}
		},
		showMask: function (_element) {
			_element.style.display = "none";
			var nodeName = _element.nodeName.toLowerCase();
			var inputType = undefined;
			if (_element.type != null) {
				inputType = _element.type.toLowerCase();
			}
			var _elements = _element.parentNode.querySelectorAll(".maskfilter");
			for (var i = 0; i < _elements.length; i++) {
				switch (nodeName) {
				case "input":
					switch (inputType) {
					case "text":
						var _id = _element.id;
						if (_elements[i].id == "mask" + _id) {
							_elements[i].innerHTML = _element.value
						}
						break;
					case "hidden":
						_elements[i].innerHTML = _element.value
							break;
					case "checkbox":
						break;
					case "radio":
						break;
					}
					break;
				case "select":
					switch (inputType) {
					case "select-one":
						_elements[i].innerHTML = _element.options[_element.selectedIndex].text;
						break;
					case "select-multiple":
						var values = [];
						for (var o = 0; o < _element.options.length; o++) {
							if (_element.options[o].selected) {
								values.push(_element.options[o].text);
							}
						}
						_elements[i].innerHTML = values.join(",");
						break;
					}
					break;
				case "textarea":
					var values = _element.value.split("\n");
					_elements[i].innerHTML = values.join(",");
					break;
				}
				_elements[i].style.display = "block";
			}
		},
		renderLayout: function () {
			var _element = document.getElementById(this.options.mainContainer);
			if (rbe_engine.checkElement(_element)) {
				var __element = document.createElement("div");
				__element.setAttribute("id", "searchFilters");
				_element.appendChild(__element);
				var _element = document.getElementById("searchFilters");
				if (rbe_engine.checkElement(_element)) {// && this.options.tableData.length>0
					var __element = document.createElement("div");
					__element.setAttribute("id", "conditionGroup_" + this.data.conditionIndex);
					__element.setAttribute("class", "conditionBlock");
					__element.setAttribute("data-group-index", this.data.conditionIndex);
					_element.appendChild(__element);
					this.renderConditionRow(0, 0);
					aa_se_tpl_groupButton = new _aa_se_tpl_button({
							controller: "aa_se_tpl_groupButton",
							translations: {
								"title": "Add Condition Group"
							},
							dataSource: {
								"title": "Add Condition Group"
							},
							elementID: "addCondition_" + this.data.conditionIndex,
							containerClass: "newCondition",
							method: "addGroupCondition",
							attributes: {
								"data-condition-group": this.data.conditionIndex,
								"class": "btn_se groupCondition"
							},
							seObject: this,
							layout: {
								tag: "conditionGroup_" + this.data.conditionIndex
							}
						});
					aa_se_tpl_groupButton.render();
					var options = [];
					options.push({
						definition: "OR",
						id: "or"
					});
					options.push({
						definition: "AND",
						id: "and"
					});
					var dataSource = {
						"Select": "Select",
						"title": "Condition Group",
						options: options
					};
					aa_se_tpl_groupCondition = new _aa_se_tpl_select({
							controller: "aa_se_tpl_groupCondition",
							translations: {
								"title": "Condition",
								"Select": "Select"
							},
							attributes: {
								"data-filter": "conditionGroup",
								"data-condition-index": this.data.conditionIndex,
								"data-ignore-filter": 1,
								"style": "display:none;"
							},
							dataSource: dataSource,
							elementID: "selectGroupCondition_" + this.data.conditionIndex,
							containerClass: "newGroupCondition",
							defaultIndex: 2,
							method: "",
							seObject: this,
							tag: "fieldCondition",
							layout: {
								tag: "conditionGroup_" + this.data.conditionIndex
							}
						});
					aa_se_tpl_groupCondition.render();
					var __element = document.createElement("div");
					__element.setAttribute("id", "searchPanel");
					_element.appendChild(__element);
					aa_se_tpl_searchButton = new _aa_se_tpl_button({
							controller: "aa_se_tpl_searchButton",
							translations: {
								"title": "Search"
							},
							dataSource: {
								"title": "Search"
							},
							attributes: {
								"class": "btn_se"
							},
							elementID: "search",
							containerClass: "searchFilters",
							method: "search",
							seObject: this,
							layout: {
								tag: "searchPanel"
							}
						});
					aa_se_tpl_searchButton.render();
					var _element = document.getElementById("conditionGroup_0");
					if (rbe_engine.checkElement(_element)) {
						_element.style.display = "none";
						this.execReportTypeSelection(this.options.reportTypeID);
					}
				}
			}
		},
		renderSchemesDropDown: function () {
			if (this.options.defaultSchemes.length > 0) {
				var _element = document.querySelector("#" + this.options.mainContainer + " .custom-bar");
				var dataSource = {
					"Select": "Select",
					"title": "Select Search Scheme",
					options: []
				};
				for (var i = 0; i < this.options.defaultSchemes.length; i++) {
					dataSource.options.push({
						definition: this.options.defaultSchemes[i].schemeName,
						id: this.options.defaultSchemes[i].schemeValue
					});
				}
				aa_se_tpl_selectScheme = new _aa_se_tpl_select({
						controller: "aa_se_tpl_selectScheme",
						translations: {
							"title": "Select Field",
							"Select": "Select"
						},
						attributes: {},
						dataSource: dataSource,
						elementID: "selectScheme",
						containerClass: "",
						method: "selectScheme",
						tag: "",
						seObject: this,
						layout: {
							tag: "#" + this.options.mainContainer + " .custom-bar"
						}
					});
				aa_se_tpl_selectScheme.render();
			}
		},
		selectScheme: function (_element) {
			if (this.data.presetGroupIndex.length > 0) {
				for (var i = 0; i < this.data.presetGroupIndex.length; i++) {
					var __element = document.getElementById("addCondition_0");
					if (rbe_engine.checkElement(__element)) {
						__element.onclick();
					}
				}
				this.data.presetGroupIndex.length = 0;
				this.data.presetGroupIndex = [];
			}
			var __element = document.getElementById("addCondition_0");
			if (rbe_engine.checkElement(__element)) {
				__element.onclick();
			}
			__element.onclick();
			for (var i = 0; i < this.options.defaultSchemes.length; i++) {
				console.log(_element.options[_element.selectedIndex].value + " " + this.options.defaultSchemes[i].schemeValue);
				if (_element.options[_element.selectedIndex].value == this.options.defaultSchemes[i].schemeValue) {
					this.data.schemeID = _element.options[_element.selectedIndex].value;
					var __element = document.getElementById("conditionGroup_1");
					this.data.conditionSchemeIndex = 0;
					this.data.presetGroupIndex.push({
						schemeID: this.data.schemeID,
						conditionGroupIndex: 1
					})
					this.renderDefaultScheme(__element, 0);
					return true;
				}
			}
		},
		renderDefaultSchemes: function (searchIndex) {
			if (this.options.defaultSchemes.length > 0) {
				var searchScheme = rbe_engine.getItemForMethod(this.options.defaultSchemes, "schemeValue", this.data.schemeID);
				if (searchScheme !== false) {
					var searchScheme = searchScheme['conditions'][this.data.conditionSchemeIndex]["conditions"][searchIndex];
					if (searchScheme != undefined) {
						var _element = document.getElementById("conditionGroup_" + (this.data.conditionSchemeIndex + 1));
						this.renderDefaultScheme(_element, searchIndex);
					}
				}
			}
		},
		renderDefaultScheme: function (_element, searchIndex) {
			var searchScheme = rbe_engine.getItemForMethod(this.options.defaultSchemes, "schemeValue", this.data.schemeID);
			if (searchScheme !== false) {
				var searchScheme = searchScheme['conditions'][this.data.conditionSchemeIndex]["conditions"][searchIndex];
				var conditionGroupIndex = _element.getAttribute("data-group-index");
				var __element = document.getElementById("conditionGroup_" + conditionGroupIndex);
				if (rbe_engine.checkElement(__element)) {
					var _element = document.getElementById("selectTable_" + conditionGroupIndex + "_" + searchIndex);
					if (rbe_engine.checkElement(_element)) {
						for (var o = 0; o < _element.options.length; o++) {
							if (_element.options[o].value == searchScheme['table']['value']) {
								_element.selectedIndex = o;
							}
						}
						_element.onchange();
					}
					var _element = document.getElementById("selectField_" + conditionGroupIndex + "_" + searchIndex);
					if (rbe_engine.checkElement(_element)) {
						for (var o = 0; o < _element.options.length; o++) {
							if (_element.options[o].value == searchScheme['field']['value']) {
								_element.selectedIndex = o;
							}
						}
						if (searchScheme['value1']['data-field-data-type'] == "dropdown") {
							this.execMethodAfterAjax = "renderDefaultSchemeAfterAjax";
							_element.onchange();
						} else {
							_element.onchange();
							this.renderDefaultSchemeAfterAjax(searchIndex, conditionGroupIndex);
						}
					}
				}
			}
		},
		renderDefaultSchemeAfterAjax: function (searchIndex, conditionGroupIndex) {
			var _searchScheme = rbe_engine.getItemForMethod(this.options.defaultSchemes, "schemeValue", this.data.schemeID);
			if (_searchScheme !== false) {
				this.execMethodAfterAjax = false;
				var searchScheme = _searchScheme['conditions'][this.data.conditionSchemeIndex]["conditions"][searchIndex];
				if (searchScheme['operator'] !== false) {
					var _element = document.getElementById("selectOperator_" + conditionGroupIndex + "_" + searchIndex);
					if (rbe_engine.checkElement(_element)) {
						for (var o = 0; o < _element.options.length; o++) {
							if (_element.options[o].value.toLowerCase() == searchScheme['operator']['value'].toLowerCase()) {
								_element.selectedIndex = o;
							}
						}
						_element.onchange();
					}
				}
				if (searchScheme['value1']['value']instanceof Array) {
					var _element = document.getElementById("searchCriteria_" + conditionGroupIndex + "_" + searchIndex);
					if (rbe_engine.checkElement(_element)) {
						if (searchScheme['value1']['data-field-data-type'] == "varchar") {
							_element.value = searchScheme['value1']['value'].join("\n");
						}
					}
					var _element = document.getElementById("selectOption_" + conditionGroupIndex + "_" + searchIndex);
					if (rbe_engine.checkElement(_element)) {
						if (searchScheme['value1']['data-field-data-type'] == "dropdown") {
							_element.options[0].selected = false;
							for (var o = 0; o < _element.options.length; o++) {
								if (searchScheme['value1']['value'].indexOf(_element.options[o].value) != -1) {
									_element.options[o].selected = true;
								}
							}
						}
					}
				} else {
					var _element = document.getElementById("selectOption_" + conditionGroupIndex + "_" + searchIndex);
					if (rbe_engine.checkElement(_element)) {
						for (var o = 0; o < _element.options.length; o++) {
							if (_element.options[o].value == searchScheme['value1']['value']) {
								_element.selectedIndex = o;
							}
						}
					}
					var _element = document.getElementById("searchCriteria_" + conditionGroupIndex + "_" + searchIndex);
					if (rbe_engine.checkElement(_element)) {
						_element.value = searchScheme['value1']['value'];
						if (_element.getAttribute("onblur") != undefined) {
							_element.onblur();
						}
					}
					var _element = document.getElementById("searchCriteria_" + conditionGroupIndex + "_" + searchIndex + "_to");
					if (rbe_engine.checkElement(_element)) {
						_element.value = searchScheme['value2']['value'];
						if (_element.getAttribute("onblur") != undefined) {
							_element.onblur();
						}
					}
				}
				if (searchScheme['condition'] !== false) {
					var _element = document.getElementById("selectFieldCondition_" + conditionGroupIndex + "_" + searchIndex);
					if (rbe_engine.checkElement(_element)) {
						for (var o = 0; o < _element.options.length; o++) {
							if (_element.options[o].value == searchScheme['condition']['value']) {
								_element.selectedIndex = o;
							}
						}
						_element.onchange();
					}
					var _element = document.getElementById("addRowCondition_" + conditionGroupIndex + "_" + searchIndex);
					if (rbe_engine.checkElement(_element)) {
						_element.onclick();
					}
					var searchScheme = rbe_engine.getItemForMethod(this.options.defaultSchemes, "schemeValue", this.data.schemeID);
					if (searchScheme['conditions'][this.data.conditionSchemeIndex]["conditions"].length > 0) {
						searchIndex++;
						this.renderDefaultSchemes(searchIndex);
					}
				} else {
					var _element = document.getElementById("selectGroupCondition_" + conditionGroupIndex);
					if (rbe_engine.checkElement(_element)) {
						if (_searchScheme['conditions'][this.data.conditionSchemeIndex]['join'] != false) {
							for (var o = 0; o < _element.options.length; o++) {
								if (_element.options[o].value == _searchScheme['conditions'][this.data.conditionSchemeIndex]['join']) {
									_element.selectedIndex = o;
								}
							}
						}
					}
					var _element = document.getElementById("addCondition_" + conditionGroupIndex);
					if (rbe_engine.checkElement(_element)) {
						_element.onclick();
					}
					this.data.conditionSchemeIndex++;
					searchIndex = 0;
					if (_searchScheme["conditions"][this.data.conditionSchemeIndex] == undefined) {
						return true;
					}
					var searchScheme = _searchScheme["conditions"][this.data.conditionSchemeIndex]['conditions'][searchIndex];
					if (searchScheme != undefined) {
						this.data.presetGroupIndex.push({
							schemeID: this.data.schemeID,
							conditionGroupIndex: (this.data.conditionSchemeIndex + 1)
						});
						this.renderDefaultSchemes(searchIndex);
					}
				}
			}
			return false;
		},
		execReportTypeSelection: function (reportTypeID) {
			var _element = document.getElementById("selectTable_0_0");
			for (var o = 0; o < _element.options.length; o++) {
				if (_element.options[o].value == "report") {
					_element.selectedIndex = o;
				}
			}
			_element.onchange();
			var _element = document.getElementById("selectField_0_0");
			if (rbe_engine.checkElement(_element)) {
				for (var o = 0; o < _element.options.length; o++) {
					if (_element.options[o].value == "FK_ReportTypeID") {
						_element.selectedIndex = o;
					}
				}
				_element.onchange();
				this.execMethodAfterAjax = "renderInitReportTypeAfterAjax";
			}
		},
		renderInitReportTypeAfterAjax: function (searchIndex, conditionGroupIndex) {
			var _element = document.getElementById("selectOperator_" + conditionGroupIndex + "_" + searchIndex);
			_element.selectedIndex = 1;
			_element.onchange();
			var _element = document.querySelector("#criteriaRow_" + conditionGroupIndex + "_" + searchIndex + " #selectOption_" + conditionGroupIndex + "_" + searchIndex);
			_element.options[0].selected = false;
			for (var o = 0; o < _element.options.length; o++) {
				if (this.options.reportTypeID.indexOf(parseInt(_element.options[o].value)) != -1) {
					_element.options[o].selected = true;
				}
			}
			var _element = document.getElementById("selectFieldCondition_" + conditionGroupIndex + "_" + searchIndex);
			for (var o = 0; o < _element.options.length; o++) {
				if (_element.options[o].value == "and") {
					_element.selectedIndex = o;
				}
			}
			_element.onchange();
			var _element = document.getElementById("addRowCondition_" + conditionGroupIndex + "_" + searchIndex);
			_element.onclick();
			this.execNonDeletedReport();
			this.execNewGroupConditionRow(0);
			this.execMethodAfterAjax = false;
		},
		execNonDeletedReport: function () {
			var _element = document.getElementById("selectTable_0_1");
			for (var o = 0; o < _element.options.length; o++) {
				if (_element.options[o].value == "report") {
					_element.selectedIndex = o;
				}
			}
			_element.onchange();
			var _element = document.getElementById("selectField_0_1");
			for (var o = 0; o < _element.options.length; o++) {
				if (_element.options[o].value == "isDeleted") {
					_element.selectedIndex = o;
				}
			}
			_element.onchange();
			var _element = document.querySelector("#criteriaRow_0_1 #searchCriteria_0_1");
			_element.value = 0;
		},
		execNewGroupConditionRow: function (conditionGroupIndex) {
			var _element = document.getElementById("addCondition_" + conditionGroupIndex);
			_element.onclick();
		},
		renderUserSelectionComponents: function (_element) {},
		renderReporTypeConditionRow: function (searchIndex, conditionGroupIndex) {
			var __element = document.getElementById("conditionGroup_" + conditionGroupIndex);
			if (rbe_engine.checkElement(__element)) {
				var ___element = document.createElement("div");
				___element.setAttribute("id", "searchRow_" + conditionGroupIndex + "_" + searchIndex);
				___element.setAttribute("data-search-index", searchIndex);
				___element.setAttribute("class", "searchRow");
				if (searchIndex == 0) {
					__element.appendChild(___element);
				} else {
					var ____element = document.getElementById("_addCondition_" + conditionGroupIndex);
					if (rbe_engine.checkElement(____element)) {
						__element.insertBefore(___element, ____element);
					}
				}
				aa_se_tpl_textInput = new _aa_se_tpl_input({
						controller: "aa_se_tpl_textInput",
						translations: {
							"title": "Search Criteria"
						},
						attributes: {
							"data-filter": "FK_ReportTypeID",
							"data-filter-name": "field",
							"data-field-data-type": "int",
							"data-search-index": searchIndex,
							"data-condition-index": conditionGroupIndex,
							value: 4
						},
						dataSource: {
							"title": "Search Criteria"
						},
						elementID: "searchCriteria_" + conditionGroupIndex + "_" + searchIndex,
						containerClass: "level2Filter",
						method: "",
						tag: "searchCriteria",
						seObject: this,
						layout: {
							tag: "searchRow_" + conditionGroupIndex + "_" + searchIndex
						}
					});
				aa_se_tpl_textInput.render();
				var options = [];
				options.push({
					definition: "OR",
					id: "or"
				});
				options.push({
					definition: "AND",
					id: "and"
				});
				var dataSource = {
					"Select": "Select",
					"title": "Condition",
					options: options
				};
				aa_se_tpl_fieldCondition = new _aa_se_tpl_select({
						controller: "aa_se_tpl_fieldCondition",
						translations: {
							"title": "Condition",
							"Select": "Select"
						},
						attributes: {
							"data-filter": "condition",
							"data-search-index": searchIndex,
							"data-condition-index": conditionGroupIndex
						},
						dataSource: dataSource,
						elementID: "selectFieldCondition_" + searchIndex,
						containerClass: "level2Filter",
						method: "setFieldCondition",
						seObject: this,
						tag: "fieldCondition",
						layout: {
							tag: "searchRow_" + conditionGroupIndex + "_" + searchIndex
						}
					});
				aa_se_tpl_fieldCondition.render();
			}
		},
		renderReporNoDeletedConditionRow: function (searchIndex, conditionGroupIndex) {
			var __element = document.getElementById("conditionGroup_" + conditionGroupIndex);
			if (rbe_engine.checkElement(__element)) {
				var ___element = document.createElement("div");
				___element.setAttribute("id", "searchRow_" + this.data.conditionIndex + "_" + searchIndex);
				___element.setAttribute("data-search-index", searchIndex);
				___element.setAttribute("class", "searchRow");
				if (searchIndex == 0) {
					__element.appendChild(___element);
				} else {
					var ____element = document.getElementById("_addCondition_" + conditionGroupIndex);
					if (rbe_engine.checkElement(____element)) {
						__element.insertBefore(___element, ____element);
					}
				}
				aa_se_tpl_textInput = new _aa_se_tpl_input({
						controller: "aa_se_tpl_textInput",
						translations: {
							"title": "Search Criteria"
						},
						attributes: {
							"data-filter": "IsDeleted",
							"data-filter-name": "field",
							"data-field-data-type": "int",
							"data-search-index": searchIndex,
							"data-condition-index": conditionGroupIndex,
							value: 0
						},
						dataSource: {
							"title": "Search Criteria"
						},
						elementID: "searchCriteria_" + conditionGroupIndex + "_" + searchIndex,
						containerClass: "level2Filter",
						method: "",
						tag: "searchCriteria",
						seObject: this,
						layout: {
							tag: "searchRow_" + conditionGroupIndex + "_" + searchIndex
						}
					});
				aa_se_tpl_textInput.render();
			}
		},
		renderConditionRow: function (searchIndex, conditionGroupIndex) {
			var __element = document.getElementById("conditionGroup_" + conditionGroupIndex);
			if (rbe_engine.checkElement(__element)) {
				var ___element = document.getElementById("searchRow_" + conditionGroupIndex + "_" + searchIndex);
				var _searchIndex = searchIndex
					if (rbe_engine.checkElement(___element)) {
						var _elements = document.querySelectorAll("#conditionGroup_" + conditionGroupIndex + " .searchRow");
						searchIndex = parseInt(_elements[_elements.length - 1].getAttribute("data-search-index")) + 1;
					}
					var ___element = document.createElement("div");
				___element.setAttribute("id", "searchRow_" + conditionGroupIndex + "_" + searchIndex);
				___element.setAttribute("data-search-index", searchIndex);
				___element.setAttribute("class", "searchRow");
				if (searchIndex == 0) {
					__element.appendChild(___element);
				} else {
					var ____element = document.getElementById("searchRow_" + conditionGroupIndex + "_" + (_searchIndex - 1));
					if (!rbe_engine.checkElement(____element)) {
						____element = document.getElementById("_addCondition_" + conditionGroupIndex);
					} else {
						____element = ____element.nextSibling;
					}
					if (rbe_engine.checkElement(____element)) {
						__element.insertBefore(___element, ____element);
					}
				}
				var style = "";
				if (searchIndex == 0) {
					style = "visibility:hidden;";
				}
				aa_se_tpl_removeConditionButton = new _aa_se_tpl_button({
						controller: "aa_se_tpl_removeConditionButton",
						translations: {
							"title": "Remove Condition"
						},
						dataSource: {
							"title": "Remove Condition"
						},
						elementID: "removeRowCondition_" + conditionGroupIndex + "_" + searchIndex,
						containerClass: "level2Filter acb",
						method: "removeRowCondition",
						type: "image",
						image: this.options.baseURL + "../img/minus-4-16.gif",
						attributes: {
							"data-condition": conditionGroupIndex,
							"class": "acb",
							style: style
						},
						seObject: this,
						tag: "rowCondition",
						layout: {
							tag: "searchRow_" + conditionGroupIndex + "_" + searchIndex
						}
					});
				aa_se_tpl_removeConditionButton.render();
				var dataSource = {
					"Select": "Select",
					"title": "Select Table",
					options: []
				};
				for (var _attr in this.options.tableData) {
					dataSource.options.push({
						definition: this.options.tableData[_attr].tableName,
						id: _attr
					});
				}
				aa_se_tpl_select = new _aa_se_tpl_select({
						controller: "aa_se_tpl_select",
						translations: {
							"title": "Select Table",
							"Select": "Select"
						},
						attributes: {
							"data-filter": "table",
							"data-filter-field": "table",
							"data-search-index": searchIndex,
							"data-condition-index": conditionGroupIndex
						},
						dataSource: dataSource,
						elementID: "selectTable_" + conditionGroupIndex + "_" + searchIndex,
						containerClass: "newCondition",
						method: "showTableFields",
						seObject: this,
						layout: {
							tag: "searchRow_" + conditionGroupIndex + "_" + searchIndex
						}
					});
				aa_se_tpl_select.render();
			}
		},
		assignEvents: function () {
			var _element = document.getElementById("addSelectedLinesBtn");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onClick", this.options.activeObject + ".addSelectedLines(this);");
			}
			
			var _element = document.querySelector(".toggleSform");
			if (rbe_engine.checkElement(_element)) {
				_element.setAttribute("onClick", this.options.activeObject + ".toggleSearchForm(this);");
			}
			
		},
		toggleSearchForm: function(_element){
			if(_element.getAttribute("data-status")=="1"){
				_element.value="Show";
				_element.setAttribute("data-status",0);
				var s_element = document.getElementById("searchFilters");
				if (rbe_engine.checkElement(s_element)) {
					s_element.style.display = "none";
				}
				return true;
			}
			
			_element.value="Hide";
			_element.setAttribute("data-status",1);
			var s_element = document.getElementById("searchFilters");
			if (rbe_engine.checkElement(s_element)) {
				s_element.style.display = "block";
			}
			return true;
		},
		search: function (_element) {
			var __element = document.getElementById("gridlist");
			if (rbe_engine.checkElement(__element)) {
				__element.style.display = "none";
			}
			var _element = document.getElementById("addSelectedLinesBtn");
			if (rbe_engine.checkElement(_element)) {
				_element.style.display = "none";
			}
			var filters = this.buildFilters();
			this.data.ajaxQuee.push(JSON.stringify(filters));
			if (this.data.ajaxQuee.length == 1) {
				this.execAjax(filters);
			}
			var _element = document.getElementById("filterlistSearch");
			if (rbe_engine.checkElement(_element)) {
				_element.style.display = "none";
			}
			if (this.options.map != "") {
				this.cleanMapSearch();
				this.synchronizeMapSearch();
			}
			if(this.options.renderMap){
				var _element = document.querySelector(".toggleSform");
				if (rbe_engine.checkElement(_element)) {
					this.toggleSearchForm(_element);
				}
			}
		},
		freeSearch: function (filters) {
			this.data.ajaxQuee.push(JSON.stringify(filters));
			if (this.data.ajaxQuee.length == 1) {
				this.execAjax(filters);
			}
		},
		normalizeIndexes: function () {
			var _elements = document.getElementsByClassName("conditionBlock");
			for (var i = 0; i < _elements.length; i++) {
				var newConditionGroupIndex = i;
				_elements[i].id = "conditionGroup_" + newConditionGroupIndex;
				_elements[i].setAttribute("data-group-index", newConditionGroupIndex);
				if (newConditionGroupIndex >= 1 && newConditionGroupIndex < 2) {
					_elements[i].setAttribute("style", "display:block;");
				}
				var __elements = _elements[i].querySelectorAll(".searchRow");
				for (var j = 0; j < __elements.length; j++) {
					__elements[j].setAttribute("data-search-index", j);
					var ___elements = __elements[j].querySelectorAll(".level2Filter");
					for (var k = 0; k < ___elements.length; k++) {
						___elements[k].setAttribute("data-search-index", j);
					}
					var ___elements = __elements[j].querySelectorAll(".filters");
					for (var k = 0; k < ___elements.length; k++) {
						___elements[k].setAttribute("data-search-index", j);
					}
					var ___elements = __elements[j].querySelectorAll("._searchFilter");
					for (var k = 0; k < ___elements.length; k++) {
						___elements[k].setAttribute("data-search-index", j);
						___elements[k].setAttribute("data-condition-index", newConditionGroupIndex);
					}
					var ___elements = __elements[j].querySelectorAll(".groupCondition");
					for (var k = 0; k < ___elements.length; k++) {
						___elements[k].setAttribute("data-search-index", j);
					}
				}
			}
		},
		removeGroupCondition: function (_element) {
			var conditionIndex = parseInt(_element.getAttribute("data-condition-group"));
			var __element = document.getElementById("conditionGroup_" + (conditionIndex + 1));
			if (rbe_engine.checkElement(__element)) {
				_element.parentNode.parentNode.parentNode.removeChild(__element);
			}
			this.data.conditionIndex--;
			if (conditionIndex == this.data.conditionIndex) {
				_element.value = "Add Condition Group";
				_element.setAttribute("onClick", this.options.activeObject + ".addGroupCondition(this);");
			}
			this.normalizeIndexes();
		},
		addGroupCondition: function (_element) {
			var _element = document.getElementById("addCondition_" + this.data.conditionIndex);
			if (rbe_engine.checkElement(_element)) {
				_element.value = "Remove Condition Group";
				_element.setAttribute("onClick", this.options.activeObject + ".removeGroupCondition(this);");
			}
			this.data.conditionIndex++;
			var style = "";
			if (this.data.conditionIndex >= 1) {
				style = "display:none;";
			}
			var _element = document.getElementById("searchFilters");
			if (rbe_engine.checkElement(_element)) {
				var __element = document.createElement("div");
				__element.setAttribute("id", "conditionGroup_" + this.data.conditionIndex);
				__element.setAttribute("class", "conditionBlock");
				__element.setAttribute("data-group-index", this.data.conditionIndex);
				if (this.data.conditionIndex >= 2) {
					__element.setAttribute("style", "display:none;");
				}
				if (this.data.conditionIndex == 0) {
					_element.appendChild(__element);
				} else {
					var ____element = document.getElementById("searchPanel");
					if (rbe_engine.checkElement(____element)) {
						_element.insertBefore(__element, ____element);
					}
				}
				if (this.data.conditionIndex < 1) {
					aa_se_tpl_groupButton = new _aa_se_tpl_button({
							controller: "aa_se_tpl_groupButton",
							translations: {
								"title": "Remove Condition Group"
							},
							dataSource: {
								"title": "Remove Condition Group"
							},
							elementID: "addCondition_" + this.data.conditionIndex,
							method: "removeGroupCondition",
							attributes: {
								"data-condition-group": this.data.conditionIndex,
								"class": "btn_se groupCondition",
								"style": style
							},
							seObject: this,
							layout: {
								tag: "condition_" + this.data.conditionIndex
							}
						});
					aa_se_tpl_groupButton.render();
				}
				this.renderConditionRow(0, this.data.conditionIndex);
				aa_se_tpl_groupButton = new _aa_se_tpl_button({
						controller: "aa_se_tpl_groupButton",
						translations: {
							"title": "Add Condition Group"
						},
						dataSource: {
							"title": "Add Condition Group"
						},
						elementID: "addCondition_" + this.data.conditionIndex,
						containerClass: "newCondition",
						method: "addGroupCondition",
						attributes: {
							"data-condition-group": this.data.conditionIndex,
							"class": "btn_se groupCondition",
							"style": style
						},
						seObject: this,
						layout: {
							tag: "conditionGroup_" + this.data.conditionIndex
						}
					});
				aa_se_tpl_groupButton.render();
				var options = [];
				options.push({
					definition: "OR",
					id: "or"
				});
				options.push({
					definition: "AND",
					id: "and"
				});
				var dataSource = {
					"Select": "Select",
					"title": "Condition Group",
					options: options
				};
				aa_se_tpl_groupCondition = new _aa_se_tpl_select({
						controller: "aa_se_tpl_groupCondition",
						translations: {
							"title": "Condition",
							"Select": "Select"
						},
						attributes: {
							"data-filter": "conditionGroup",
							"data-condition-index": this.data.conditionIndex,
							"data-ignore-filter": 1,
							"style": "display:none;"
						},
						dataSource: dataSource,
						elementID: "selectGroupCondition_" + this.data.conditionIndex,
						containerClass: "newGroupCondition",
						method: "",
						seObject: this,
						tag: "fieldCondition",
						layout: {
							tag: "conditionGroup_" + this.data.conditionIndex
						}
					});
				aa_se_tpl_groupCondition.render();
			}
		},
		addCondition: function (_element) {},
		showTableFields: function (_element) {
			var table = _element.options[_element.selectedIndex].value;
			if (this.options.tableData[table] != undefined) {
				var dataSource = {
					"Select": "Select",
					"title": "Select Field",
					options: []
				};
				console.log(this.options.tableData[table]);
				for (var i = 0; i < this.options.tableData[table].fields.length; i++) {
					dataSource.options.push({
						definition: this.options.tableData[table].fields[i].fieldName,
						id: this.options.tableData[table].fields[i].field,
						visibility: parseInt(this.options.tableData[table].fields[i].visibility)
					});
				}
				var searchIndex = _element.parentNode.parentNode.getAttribute("data-search-index");
				var conditionGroupIndex = _element.parentNode.parentNode.parentNode.getAttribute("data-group-index");
				var _elements = _element.parentNode.parentNode.getElementsByClassName("level2Filter");
				for (var i = 0; i < _elements.length; i++) {
					if (!rbe_engine.hasClass(_elements[i], "acb")) {
						_elements[i].parentNode.removeChild(_elements[i]);
						i--;
					}
				}
				aa_se_tpl_selectField = new _aa_se_tpl_select({
						controller: "aa_se_tpl_selectField",
						translations: {
							"title": "Select Field",
							"Select": "Select"
						},
						attributes: {
							"data-table": table,
							"data-filter": "fieldName",
							"data-search-index": searchIndex,
							"data-condition-index": conditionGroupIndex
						},
						dataSource: dataSource,
						elementID: "selectField_" + conditionGroupIndex + "_" + searchIndex,
						containerClass: "level2Filter",
						method: "setTableField",
						tag: "fieldSearch",
						seObject: this,
						layout: {
							tag: "searchRow_" + conditionGroupIndex + "_" + searchIndex
						}
					});
				aa_se_tpl_selectField.render();
			}
		},
		setTableField: function (_element) {
			var table = _element.getAttribute("data-table");
			var field = _element.options[_element.selectedIndex].value;
			var fieldData = rbe_engine.getItemForMethod(this.options.tableData[table].fields, "field", field);
			var _elements = _element.parentNode.parentNode.getElementsByClassName("level2Filter");
			for (var i = 0; i < _elements.length; i++) {
				if (_element.parentNode != _elements[i] && !rbe_engine.hasClass(_elements[i], "acb")) {
					_elements[i].parentNode.removeChild(_elements[i]);
					i--;
				}
			}
			var searchIndex = _element.parentNode.parentNode.getAttribute("data-search-index");
			var conditionGroupIndex = _element.parentNode.parentNode.parentNode.getAttribute("data-group-index");
			if (fieldData !== false && fieldData != undefined) {
				var __element = document.getElementById("searchRow_" + conditionGroupIndex + "_" + searchIndex);
				if (rbe_engine.checkElement(__element)) {
					if (fieldData.dataType.toLowerCase() == "int" || fieldData.dataType.toLowerCase() == "decimal" || fieldData.dataType.toLowerCase() == "date") {
						var options = [];
						options.push({
							definition: ">=",
							id: ">="
						});
						options.push({
							definition: "Between",
							id: "between"
						});
						var dataSource = {
							"Select": "Equals",
							"title": "Select Operator",
							options: options
						};
						aa_se_tpl_selectOperator = new _aa_se_tpl_select({
								controller: "aa_se_tpl_selectOperator",
								translations: {
									"title": "Select Operator",
									"Select": "Equals"
								},
								attributes: {
									"data-filter": "operator",
									"data-filter-field": field,
									"data-search-index": searchIndex,
									"data-condition-index": conditionGroupIndex,
									"data-field-data-type": "int"
								},
								dataSource: dataSource,
								elementID: "selectOperator_" + conditionGroupIndex + "_" + searchIndex,
								containerClass: "level2Filter",
								method: "setFieldOperator",
								tag: "OpearorSearch",
								seObject: this,
								layout: {
									tag: "searchRow_" + conditionGroupIndex + "_" + searchIndex
								}
							});
						aa_se_tpl_selectOperator.render();
					} else if (fieldData.dataType.toLowerCase() == "dropdown") {
						var options = [];
						options.push({
							definition: "Choose Any",
							id: "IN"
						});
						var dataSource = {
							"Select": "IS",
							"title": "Select Operator",
							options: options
						};
						aa_se_tpl_selectOperator = new _aa_se_tpl_select({
								controller: "aa_se_tpl_selectOperator",
								translations: {
									"title": "Select Operator",
									"Select": "IS"
								},
								attributes: {
									"data-filter": "operator",
									"data-filter-field": field,
									"data-search-index": searchIndex,
									"data-condition-index": conditionGroupIndex,
									"data-field-data-type": "int"
								},
								dataSource: dataSource,
								elementID: "selectOperator_" + conditionGroupIndex + "_" + searchIndex,
								containerClass: "level2Filter",
								method: "setFieldOperator",
								tag: "OpearorSearch",
								seObject: this,
								layout: {
									tag: "searchRow_" + conditionGroupIndex + "_" + searchIndex
								}
							});
						aa_se_tpl_selectOperator.render();
					} else if (fieldData.dataType.toLowerCase() == "checkbox") {}
					else if (fieldData.dataType.toLowerCase() == "varchar" || fieldData.dataType.toLowerCase() == "dropdownvarchar") {
						var options = [];
						options.push({
							definition: "Contains",
							id: "VIN"
						});
						var dataSource = {
							"Select": "Equals",
							"title": "Select Operator",
							options: options
						};
						aa_se_tpl_selectOperator = new _aa_se_tpl_select({
								controller: "aa_se_tpl_selectOperator",
								translations: {
									"title": "Select Operator",
									"Select": "Equals"
								},
								attributes: {
									"data-filter": "operator",
									"data-filter-field": field,
									"data-search-index": searchIndex,
									"data-condition-index": conditionGroupIndex,
									"data-field-data-type": "varchar"
								},
								dataSource: dataSource,
								elementID: "selectOperator_" + conditionGroupIndex + "_" + searchIndex,
								containerClass: "level2Filter",
								method: "setFieldOperator",
								tag: "OpearorSearch",
								seObject: this,
								layout: {
									tag: "searchRow_" + conditionGroupIndex + "_" + searchIndex
								}
							});
						aa_se_tpl_selectOperator.render();
					}
					var ___element = document.createElement("div");
					___element.setAttribute("id", "criteriaRow_" + conditionGroupIndex + "_" + searchIndex);
					___element.setAttribute("class", "level2Filter");
					___element.setAttribute("style", "float:left; margin-left:10px;");
					__element.appendChild(___element);
					if (fieldData.dataSource != null) {
						this.execDataSourceAjax(fieldData, field, searchIndex, conditionGroupIndex);
					} else {
						if (fieldData.dataType.toLowerCase() == "checkbox") {
							aa_se_tpl_checkbox = new _aa_se_tpl_checkbox({
									controller: "aa_se_tpl_checkbox",
									translations: {
										"title": "Search Criteria"
									},
									attributes: {
										"data-filter": field,
										"data-filter-name": "field",
										"data-field-data-type": fieldData.dataType.toLowerCase(),
										"data-search-index": searchIndex,
										"data-condition-index": conditionGroupIndex,
										"data-format-params": JSON.stringify(fieldData.dataFormat),
									},
									dataSource: {
										"title": "Search Criteria"
									},
									elementID: "searchCriteria_" + conditionGroupIndex + "_" + searchIndex,
									containerClass: "level2Filter",
									method: "setAutoDataFormat",
									tag: "searchCriteria",
									seObject: this,
									layout: {
										tag: "criteriaRow_" + conditionGroupIndex + "_" + searchIndex
									}
								});
							aa_se_tpl_checkbox.render();
						} else {
							aa_se_tpl_textInput = new _aa_se_tpl_input({
									controller: "aa_se_tpl_textInput",
									translations: {
										"title": "Search Criteria"
									},
									attributes: {
										"data-filter": field,
										"data-filter-name": "field",
										"data-field-data-type": fieldData.dataType.toLowerCase(),
										"data-search-index": searchIndex,
										"data-condition-index": conditionGroupIndex,
										"data-format-params": JSON.stringify(fieldData.dataFormat),
									},
									dataSource: {
										"title": "Search Criteria"
									},
									elementID: "searchCriteria_" + conditionGroupIndex + "_" + searchIndex,
									containerClass: "level2Filter",
									method: "setAutoDataFormat",
									tag: "searchCriteria",
									seObject: this,
									layout: {
										tag: "criteriaRow_" + conditionGroupIndex + "_" + searchIndex
									}
								});
							aa_se_tpl_textInput.render();
						}
						var options = [];
						options.push({
							definition: "OR",
							id: "or"
						});
						options.push({
							definition: "AND",
							id: "and"
						});
						var dataSource = {
							"Select": "Select",
							"title": "Condition",
							options: options
						};
						aa_se_tpl_fieldCondition = new _aa_se_tpl_select({
								controller: "aa_se_tpl_fieldCondition",
								translations: {
									"title": "Condition",
									"Select": "Select"
								},
								attributes: {
									"data-filter": "condition",
									"data-search-index": searchIndex,
									"data-condition-index": conditionGroupIndex
								},
								dataSource: dataSource,
								elementID: "selectFieldCondition_" + conditionGroupIndex + "_" + searchIndex,
								containerClass: "level2Filter",
								method: "setFieldCondition",
								seObject: this,
								tag: "fieldCondition",
								layout: {
									tag: "searchRow_" + conditionGroupIndex + "_" + searchIndex
								}
							});
						aa_se_tpl_fieldCondition.render();
						if (this.options.map != "") {
							this.checkMapSearchSync("searchRow_" + conditionGroupIndex + "_" + searchIndex);
						}
					}
				}
			}
		},
		setFieldCondition: function (_element) {
			var container = _element.parentNode.parentNode;
			var searchIndex = parseInt(_element.parentNode.parentNode.getAttribute("data-search-index"));
			var conditionGroupIndex = _element.parentNode.parentNode.parentNode.getAttribute("data-group-index");
			var __element = container.querySelector("#_addRowCondition_" + conditionGroupIndex + "_" + searchIndex);
			if (_element.selectedIndex == 0) {
				if (rbe_engine.checkElement(__element)) {
					container.removeChild(__element);
				}
			} else {
				if (!rbe_engine.checkElement(__element)) {
					var _elements = container.parentNode.getElementsByClassName("searchRow");
					aa_se_tpl_addConditionButton = new _aa_se_tpl_button({
							controller: "aa_se_tpl_addConditionButton",
							translations: {
								"title": "Add Condition"
							},
							dataSource: {
								"title": "Add Condition"
							},
							elementID: "addRowCondition_" + conditionGroupIndex + "_" + searchIndex,
							containerClass: "level2Filter",
							method: "addRowCondition",
							type: "image",
							image: this.options.baseURL + "../img/plus-4-16.gif",
							attributes: {
								"data-condition": conditionGroupIndex,
								"class": "",
							},
							seObject: this,
							tag: "rowCondition",
							layout: {
								tag: container.id
							}
						});
					aa_se_tpl_addConditionButton.render();
				}
			}
		},
		addRowCondition: function (_element) {
			var _index = _element.parentNode.parentNode.getAttribute("data-search-index");
			var conditionGroupIndex = _element.parentNode.parentNode.parentNode.getAttribute("data-group-index");
			_index++;
			this.renderConditionRow(_index, conditionGroupIndex);
		},
		removeRowCondition: function (_element) {
			var container = _element.parentNode.parentNode;
			var topContainer = container.parentNode;
			var _searchIndex = parseInt(container.getAttribute("data-search-index"));
			var _groupIndex = topContainer.getAttribute("data-group-index");
			topContainer.removeChild(container);
			var __element = document.getElementById("addRowCondition_" + _groupIndex + "_" + (_searchIndex - 1));
			if (rbe_engine.checkElement(__element)) {
				__element.style.display = "block";
			}
		},
		setFieldOperator: function (_element) {
			var searchIndex = _element.parentNode.parentNode.getAttribute("data-search-index");
			var opearator = _element.options[_element.selectedIndex].value;
			var container = _element.parentNode.parentNode;
			var field = _element.getAttribute("data-filter-field");
			var conditionGroupIndex = _element.parentNode.parentNode.parentNode.getAttribute("data-group-index");
			var __element = document.getElementById("selectField_" + conditionGroupIndex + "_" + searchIndex);
			if (!rbe_engine.checkElement(__element)) {
				return false;
			}
			var table = __element.getAttribute("data-table");
			var fieldData = rbe_engine.getItemForMethod(this.options.tableData[table].fields, "field", field);
			var searchCriteriaElement = container.querySelector("#searchCriteria_" + conditionGroupIndex + "_" + searchIndex);
			if (fieldData !== false && fieldData != undefined && rbe_engine.checkElement(searchCriteriaElement)) {
				container = searchCriteriaElement.parentNode.parentNode;
				var value = searchCriteriaElement.value;
				container.removeChild(searchCriteriaElement.parentNode);
				if (opearator == "between") {
					aa_se_tpl_textBoundsInput = new _aa_se_tpl_inputBounds({
							controller: "aa_se_tpl_textBoundsInput",
							translations: {
								"title": "Search Criteria"
							},
							attributes: {
								"data-filter": field,
								"data-search-index": searchIndex,
								"data-condition-index": conditionGroupIndex,
								"data-field-data-type": fieldData.dataType.toLowerCase(),
								"data-format-params": JSON.stringify(fieldData.dataFormat),
							},
							dataSource: {
								"title": "Search Criteria"
							},
							elementID: "searchCriteria_" + conditionGroupIndex + "_" + searchIndex,
							containerClass: "level2Filter",
							method: "setAutoDataFormat",
							tag: "searchCriteria",
							seObject: this,
							layout: {
								tag: "criteriaRow_" + conditionGroupIndex + "_" + searchIndex
							}
						});
					aa_se_tpl_textBoundsInput.render();
				} else if (opearator.toLowerCase() == "vnot in" || opearator.toLowerCase() == "vin") {
					aa_se_tpl_textarea = new _aa_se_tpl_textarea({
							controller: "aa_se_tpl_textarea",
							translations: {
								"title": "Search Criteria"
							},
							attributes: {
								"data-filter": field,
								"data-search-index": searchIndex,
								"data-condition-index": conditionGroupIndex,
								"data-field-data-type": fieldData.dataType.toLowerCase(),
								"data-format-params": JSON.stringify(fieldData.dataFormat),
							},
							dataSource: {
								"title": "Search Criteria"
							},
							elementID: "searchCriteria_" + conditionGroupIndex + "_" + searchIndex,
							containerClass: "level2Filter",
							method: "setAutoDataFormat",
							tag: "searchCriteria",
							seObject: this,
							layout: {
								tag: "criteriaRow_" + conditionGroupIndex + "_" + searchIndex
							}
						});
					aa_se_tpl_textarea.render();
				} else {
					aa_se_tpl_textInput = new _aa_se_tpl_input({
							controller: "aa_se_tpl_textInput",
							translations: {
								"title": "Search Criteria"
							},
							attributes: {
								"data-filter": field,
								"data-search-index": searchIndex,
								"data-condition-index": conditionGroupIndex,
								"data-field-data-type": fieldData.dataType.toLowerCase(),
								"data-format-params": JSON.stringify(fieldData.dataFormat),
							},
							dataSource: {
								"title": "Search Criteria"
							},
							elementID: "searchCriteria_" + conditionGroupIndex + "_" + searchIndex,
							containerClass: "level2Filter",
							method: "setAutoDataFormat",
							tag: "searchCriteria",
							seObject: this,
							layout: {
								tag: "criteriaRow_" + conditionGroupIndex + "_" + searchIndex
							}
						});
					aa_se_tpl_textInput.render();
				}
			}
			var selectOptionElement = container.querySelector("#selectOption_" + conditionGroupIndex + "_" + searchIndex);
			if (rbe_engine.checkElement(selectOptionElement)) {
				container = selectOptionElement.parentNode.parentNode;
				var options = selectOptionElement.options;
				var _options = [];
				for (var o = 1; o < options.length; o++) {
					_options.push({
						definition: options[o].text,
						id: options[o].value
					});
				}
				var dataSource = {
					"Select": "Select",
					"title": "Select Operator",
					options: _options
				};
				var selectedIndex = selectOptionElement.selectedIndex;
				container.removeChild(selectOptionElement.parentNode);
				if (opearator.toLowerCase() == "not in" || opearator.toLowerCase() == "in") {
					aa_se_tpl_multiselect = new _aa_se_tpl_mselect({
							controller: "aa_se_tpl_selectOptions",
							translations: {
								"title": "Select",
								"Select": "Select"
							},
							attributes: {
								"data-filter": field,
								"data-filter-name": "field",
								"data-field-data-type": "int",
								"data-search-index": searchIndex,
								"data-condition-index": conditionGroupIndex
							},
							dataSource: dataSource,
							elementID: "selectOption_" + conditionGroupIndex + "_" + searchIndex,
							containerClass: "level2Filter",
							method: "",
							seObject: this,
							tag: "searchCriteria",
							layout: {
								tag: "criteriaRow_" + conditionGroupIndex + "_" + searchIndex
							}
						});
					aa_se_tpl_multiselect.render();
				} else {
					aa_se_tpl_select = new _aa_se_tpl_select({
							controller: "aa_se_tpl_selectOptions",
							translations: {
								"title": "Select",
								"Select": "Select"
							},
							attributes: {
								"data-filter": field,
								"data-filter-name": "field",
								"data-field-data-type": "int",
								"data-search-index": searchIndex,
								"data-condition-index": conditionGroupIndex
							},
							dataSource: dataSource,
							elementID: "selectOption_" + conditionGroupIndex + "_" + searchIndex,
							containerClass: "level2Filter",
							method: "",
							seObject: this,
							tag: "searchCriteria",
							layout: {
								tag: "criteriaRow_" + conditionGroupIndex + "_" + searchIndex
							}
						});
					aa_se_tpl_select.render();
				}
				var selectOptionElement = container.querySelector("#selectOption_" + conditionGroupIndex + "_" + searchIndex);
				selectOptionElement.selectedIndex = selectedIndex;
			}
		},
		buildFilters: function () {
			this.normalizeIndexes();
			var _elements = document.querySelectorAll("#searchFilters ._searchFilter");
			var filters = {};
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					var nodeName = _elements[i].nodeName.toLowerCase();
					var conditionIndex = parseInt(_elements[i].getAttribute("data-condition-index"));
					if (!isNaN(conditionIndex)) {
						if (filters[conditionIndex] == undefined) {
							filters[conditionIndex] = {};
						}
						var searchIndex = parseInt(_elements[i].getAttribute("data-search-index"))
							if (filters[conditionIndex]["criteria"] == undefined) {
								filters[conditionIndex]["criteria"] = {};
							}
							if (filters[conditionIndex]["condition"] == undefined) {
								filters[conditionIndex]["condition"] = "";
							}
							if (!_elements[i].hasAttribute("data-ignore-filter")) {
								if (filters[conditionIndex]["criteria"][searchIndex] == undefined) {
									filters[conditionIndex]["criteria"][searchIndex] = {};
								}
								var inputType = undefined;
								if (_elements[i].type != null) {
									inputType = _elements[i].type.toLowerCase();
								}
								var prop = _elements[i].getAttribute("data-filter");
								if (filters[conditionIndex]["criteria"][searchIndex][prop] == undefined) {
									if (_elements[i].getAttribute("filter-type") == "group") {
										filters[conditionIndex]["criteria"][searchIndex][prop] = [];
									}
								}
								var dataFormat = false;
								if (_elements[i].hasAttribute("data-format")) {
									dataFormat = _elements[i].getAttribute("data-format");
								}
								if (_elements[i].hasAttribute("data-field-data-type")) {
									filters[conditionIndex]["criteria"][searchIndex]["data-type"] = _elements[i].getAttribute("data-field-data-type");
								}
								switch (nodeName) {
								case "input":
									switch (inputType) {
										case "text":
											if (filters[conditionIndex]["criteria"][searchIndex][prop] != undefined) {
												var _value = filters[conditionIndex]["criteria"][searchIndex][prop];
												_value = _value.replace("$", "").replace("%", "").replace(/,/gi, "").replace("SF", "").trim();
												filters[conditionIndex]["criteria"][searchIndex][prop] = [];
												filters[conditionIndex]["criteria"][searchIndex][prop].push(_value);
												filters[conditionIndex]["criteria"][searchIndex][prop].push(_elements[i].value.replace("$", "").replace("%", "").replace(/,/gi, "").replace("SF", "").trim());
											} else {
												filters[conditionIndex]["criteria"][searchIndex][prop] = _elements[i].value.replace("$", "").replace("%", "").replace(/,/gi, "").replace("SF", "").trim();
											}
											if (dataFormat !== false) {
												filters[prop] = this[dataFormat].apply(null, [filters[conditionIndex]["criteria"][searchIndex][prop]]);
											}
											break;
										case "hidden":
											filters[conditionIndex][searchIndex]["criteria"][prop] = _elements[i].value;
											break;
										case "checkbox":
											if (_elements[i].checked) {
												if (_elements[i].getAttribute("filter-type") == "group") {
													filters[conditionIndex]["criteria"][searchIndex][prop].push(_elements[i].getAttribute("data-id"));
												} else {
													filters[conditionIndex]["criteria"][searchIndex][prop] = 1;
												}
											} else {
												if (_elements[i].getAttribute("filter-type") == "group") {}
												else {
													filters[conditionIndex]["criteria"][searchIndex][prop] = 0;
												}
											}
											filters[conditionIndex]["criteria"][searchIndex]['operator'] = "0";
											break;
										case "radio":
											break;
									}
									break;
								case "select":
									switch (inputType) {
									case "select-one":
										filters[conditionIndex]["criteria"][searchIndex][prop] = _elements[i].options[_elements[i].selectedIndex].value;
										break;
									case "select-multiple":
										filters[conditionIndex]["criteria"][searchIndex][prop] = [];
										for (var o = 0; o < _elements[i].options.length; o++) {
											if (_elements[i].options[o].selected) {
												filters[conditionIndex]["criteria"][searchIndex][prop].push(_elements[i].options[o].value);
											}
										}
										break;
									}
									break;
								case "textarea":
									filters[conditionIndex]["criteria"][searchIndex][prop] = _elements[i].value.split("\n");
									break;
								}
							} else {
								filters[conditionIndex]["condition"] = _elements[i].options[_elements[i].selectedIndex].value;
							}
					}
				}
			}
			for (var _attr in filters) {
				if (filters[_attr]["criteria"]['0']['table'] == "0") {
					delete filters[_attr];
				}
			}
			return filters;
		},
		execDataSourceAjax: function (fieldData, field, searchIndex, conditionGroupIndex) {
			var _dataSource = fieldData.dataSource;
			if (this.data.dataSources[fieldData.dataSource.functionName] != undefined) {
				var options = [];
				for (var o = 0; o < this.data.dataSources[fieldData.dataSource.functionName].length; o++) {
					options.push({
						definition: this.data.dataSources[fieldData.dataSource.functionName][o][_dataSource.text],
						id: this.data.dataSources[fieldData.dataSource.functionName][o][_dataSource.value]
					});
				}
				var dataSource = {
					"Select": "Select",
					"title": "Select",
					options: options
				};
				aa_se_tpl_selectOptions = new _aa_se_tpl_select({
						controller: "aa_se_tpl_selectOptions",
						translations: {
							"title": "Select",
							"Select": "Select"
						},
						attributes: {
							"data-filter": field,
							"data-filter-name": "field",
							"data-field-data-type": "int",
							"data-search-index": searchIndex,
							"data-condition-index": conditionGroupIndex
						},
						dataSource: dataSource,
						elementID: "selectOption_" + conditionGroupIndex + "_" + searchIndex,
						containerClass: "level2Filter",
						method: "",
						seObject: this,
						tag: "searchCriteria",
						layout: {
							tag: "criteriaRow_" + conditionGroupIndex + "_" + searchIndex
						}
					});
				aa_se_tpl_selectOptions.render();
				var options = [];
				options.push({
					definition: "OR",
					id: "or"
				});
				options.push({
					definition: "AND",
					id: "and"
				});
				var dataSource = {
					"Select": "Select",
					"title": "Condition",
					options: options
				};
				aa_se_tpl_fieldCondition = new _aa_se_tpl_select({
						controller: "aa_se_tpl_fieldCondition",
						translations: {
							"title": "Condition",
							"Select": "Select"
						},
						attributes: {
							"data-filter": "condition",
							"data-search-index": searchIndex,
							"data-condition-index": conditionGroupIndex
						},
						dataSource: dataSource,
						elementID: "selectFieldCondition_" + conditionGroupIndex + "_" + searchIndex,
						containerClass: "level2Filter",
						method: "setFieldCondition",
						seObject: this,
						tag: "fieldCondition",
						layout: {
							tag: "searchRow_" + conditionGroupIndex + "_" + searchIndex
						}
					});
				aa_se_tpl_fieldCondition.render();
				if (this.options.map != "") {
					this.checkMapSearchSync("searchRow_" + conditionGroupIndex + "_" + searchIndex);
				}
				if (this.execMethodAfterAjax != false) {
					this[this.execMethodAfterAjax](searchIndex, conditionGroupIndex);
				}
			} else {
				var _controller = this;
				this.data.xhr = $.ajax({
						url: this.options.baseURL + this.options.ajaxDataSourceURL,
						type: "post",
						dataType: "json",
						data: {
							"func": fieldData.dataSource.functionName,
							"filter": {
								"method": fieldData.dataSource.searchMethod,
								"operator": fieldData.dataSource.searchOperator,
								"value": fieldData.dataSource.searchValue,
							}
						},
						beforeSend: function () {
							$('img#mapLoader').css('display', 'block');
						},
						success: function (retJson) {
							if (retJson.status == 'ok') {
								if (retJson.data.length == 0) {
									$('img#mapLoader').css('display', 'none');
									_controller.showErrorMessage("No results found");
									return false;
								}
							}
							if (retJson.status == 'ok') {
								$('img#mapLoader').css('display', 'none');
							} else {
								$('img#mapLoader').css('display', 'none');
							}
							_controller.data.dataSources[fieldData.dataSource.functionName] = retJson.data;
							var options = [];
							for (var o = 0; o < retJson.data.length; o++) {
								options.push({
									definition: retJson.data[o][_dataSource.text],
									id: retJson.data[o][_dataSource.value]
								});
							}
							var dataSource = {
								"Select": "Select",
								"title": "Select",
								options: options
							};
							aa_se_tpl_selectOptions = new _aa_se_tpl_select({
									controller: "aa_se_tpl_selectOptions",
									translations: {
										"title": "Select",
										"Select": "Select"
									},
									attributes: {
										"data-filter": field,
										"data-filter-name": "field",
										"data-field-data-type": "int",
										"data-search-index": searchIndex,
										"data-condition-index": conditionGroupIndex
									},
									dataSource: dataSource,
									elementID: "selectOption_" + conditionGroupIndex + "_" + searchIndex,
									containerClass: "level2Filter",
									seObject: _controller,
									method: "",
									tag: "searchCriteria",
									layout: {
										tag: "criteriaRow_" + conditionGroupIndex + "_" + searchIndex
									}
								});
							aa_se_tpl_selectOptions.render();
							var options = [];
							options.push({
								definition: "OR",
								id: "or"
							});
							options.push({
								definition: "AND",
								id: "and"
							});
							var dataSource = {
								"Select": "Select",
								"title": "Condition",
								options: options
							};
							aa_se_tpl_fieldCondition = new _aa_se_tpl_select({
									controller: "aa_se_tpl_fieldCondition",
									translations: {
										"title": "Condition",
										"Select": "Select"
									},
									attributes: {
										"data-filter": "condition",
										"data-search-index": searchIndex,
										"data-condition-index": conditionGroupIndex
									},
									dataSource: dataSource,
									elementID: "selectFieldCondition_" + conditionGroupIndex + "_" + searchIndex,
									containerClass: "level2Filter",
									method: "setFieldCondition",
									seObject: _controller,
									tag: "fieldCondition",
									layout: {
										tag: "searchRow_" + conditionGroupIndex + "_" + searchIndex
									}
								});
							aa_se_tpl_fieldCondition.render();
							if (_controller.options.map != "") {
								_controller.checkMapSearchSync("searchRow_" + conditionGroupIndex + "_" + searchIndex);
							}
							if (_controller.execMethodAfterAjax != false) {
								_controller[_controller.execMethodAfterAjax](searchIndex, conditionGroupIndex);
							}
						},
						error: function (jqXHR, textStatus, errorThrown) {
							_controller.showErrorMessage("An error occured.");
							$('img#mapLoader').css('display', 'none');
						}
					});
			}
		},
		execAjax: function (filters) {
			var _controller = this;
			console.log(JSON.stringify(filters));
			this.data.xhr = $.ajax({
					url: this.options.baseURL + this.options.ajaxURL,
					type: "post",
					dataType: "json",
					data: {
						sq: JSON.stringify(filters)
					},
					beforeSend: function () {
						$('img#mapLoader').css('display', 'block');
					},
					success: function (retJson) {
						if (retJson.status == 'ok') {
							if (retJson.data.length == 0) {
								_controller.data.ajaxQuee.splice(0, 1);
								$('img#mapLoader').css('display', 'none');
								_controller.showErrorMessage("No results found");
								return false;
							}
						}
						if (retJson.status == 'ok') {
							_controller.options.data = retJson.data;
							if (_controller.options.gridRowTPL != "") {
								_controller.buildTable();
							}
							if (_controller.options.map != "") {
								_controller.options.map.clearMarker(false, false);
								_controller.options.map.data.markers = retJson.data;
								_controller.addMarkers();
							}
							$('img#mapLoader').css('display', 'none');
						} else {
							$('img#mapLoader').css('display', 'none');
						}
						_controller.data.ajaxQuee.splice(0, 1);
						if (_controller.data.ajaxQuee.length > 0) {
							_controller.execAjax(JSON.parse(_controller.data.ajaxQuee[0]));
						} else {}
					},
					error: function (jqXHR, textStatus, errorThrown) {
						_controller.showErrorMessage("An error occured.");
						_controller.data.ajaxQuee.length = 0;
						_controller.data.ajaxQuee = [];
						$('img#mapLoader').css('display', 'none');
					}
				});
		},
		addMarkers: function () {
			this.options.map.buildMarkers();
			var _element = document.getElementById("toggleGrid");
			if (rbe_engine.checkElement(_element)) {
				if (_element.getAttribute("type") == "g") {
					var __element = document.getElementById("gridlist");
					if (rbe_engine.checkElement(__element)) {
						__element.style.display = "block";
						this.options.map.buildTable();
					}
				} else {
					setTimeout(this.options.map.options.activeObject + ".buildTable();", 3000);
					this.options.map.fitMapOnMarkers();
				}
			}
		},
		execMapFilters: function(filters){
			var p_element = document.getElementById("searchFilters");
			this.data.conditionIndex+=1;
			if (rbe_engine.checkElement(p_element)) {
				var __element = document.createElement("div");
				__element.setAttribute("id", "conditionGroup_" + this.data.conditionIndex);
				__element.setAttribute("class", "conditionBlock");
				__element.setAttribute("data-group-index", this.data.conditionIndex);
				p_element.appendChild(__element);
				this.renderConditionRow(0, 2);
				aa_se_tpl_groupButton = new _aa_se_tpl_button({
						controller: "aa_se_tpl_groupButton",
						translations: {
							"title": "Add Condition Group"
						},
						dataSource: {
							"title": "Add Condition Group"
						},
						elementID: "addCondition_" + this.data.conditionIndex,
						containerClass: "newCondition",
						method: "addGroupCondition",
						attributes: {
							"data-condition-group": this.data.conditionIndex,
							"class": "btn_se groupCondition"
						},
						seObject: this,
						layout: {
							tag: "conditionGroup_" + this.data.conditionIndex
						}
					});
				aa_se_tpl_groupButton.render();
				var options = [];
				options.push({
					definition: "OR",
					id: "or"
				});
				options.push({
					definition: "AND",
					id: "and"
				});
				var dataSource = {
					"Select": "Select",
					"title": "Condition Group",
					options: options
				};
				aa_se_tpl_groupCondition = new _aa_se_tpl_select({
						controller: "aa_se_tpl_groupCondition",
						translations: {
							"title": "Condition",
							"Select": "Select"
						},
						attributes: {
							"data-filter": "conditionGroup",
							"data-condition-index": this.data.conditionIndex,
							"data-ignore-filter": 1,
							"style": "display:none;"
						},
						dataSource: dataSource,
						elementID: "selectGroupCondition_" + this.data.conditionIndex,
						containerClass: "newGroupCondition",
						defaultIndex: 2,
						method: "",
						seObject: this,
						tag: "fieldCondition",
						layout: {
							tag: "conditionGroup_" + this.data.conditionIndex
						}
					});
				aa_se_tpl_groupCondition.render();

				var _element = document.getElementById("conditionGroup_2");
				if (rbe_engine.checkElement(_element)) {
					//_element.style.display = "none";
					//this.execReportTypeSelection(this.options.reportTypeID);
				}
			}
			console.log(filters);
		},
		buildTable: function () {
			var rows = [];
			var template = this.options.gridRowTPL;
			if (template == "") {
				return false;
			}
			var hasCustomTpl = false;
			var tplElement = document.getElementById(template);
			if (rbe_engine.checkElement(tplElement)) {
				hasCustomTpl = true;
			}
			var __element = document.getElementById("gridlist");
			if (rbe_engine.checkElement(__element)) {
				__element.style.display = "block";
			}
			var table = $('#gridlist #comps').DataTable();
			table.destroy();
			var coords = [];
			for (var i = 0; i < this.options.data.length; i++) {
				var jdata = this.options.data[i];
				var cell = this.options.templates[template];
				if (hasCustomTpl) {
					cell = tplElement.innerHTML;
					cell = cell.replace("<!--", "");
					cell = cell.replace("!-->", "");
					cell = cell.replace(/\r\n/gi, "");
					cell = cell.replace(/\t/gi, "");
				}
				cell = cell.replace(/emailaddress_proxy/gi, jdata.emailaddress);
				
				cell = cell.replace(/reportID_proxy/gi, jdata.id);
				cell = cell.replace(/propertyname_proxy/gi, jdata.property_name);
				cell = cell.replace(/address_proxy/gi, jdata.address);
				cell = cell.replace(/city_proxy/gi, jdata.city);
				cell = cell.replace(/submarket_proxy/gi, jdata.submarket);
				cell = cell.replace(/client_name_proxy/gi, jdata.client_name);
				cell = cell.replace(/zip_code_proxy/gi, jdata.zip_code);
				cell = cell.replace(/property_type_proxy/gi, jdata.property_type);
				cell = cell.replace(/subtype_proxy/gi, jdata.subtype);
				cell = cell.replace(/photo1_proxy/gi, jdata.photo1);
				cell = cell.replace(/thumb_proxy/gi, jdata.thumbnail);
				cell = cell.replace(/zoning_code_proxy/gi, jdata.zoning_code);
				cell = cell.replace(/overall_gba_proxy/gi, jdata.overall_gba);
				cell = cell.replace(/record_date_proxy/gi, jdata.record_date);
				cell = cell.replace(/eff_sale_price_stab_proxy/gi, jdata.eff_sale_price_stab);
				cell = cell.replace(/adj_price_sf_nra_proxy/gi, jdata.adj_price_sf_nra);
				cell = cell.replace(/alloc_imp_value_sf_nra_proxy/gi, jdata.alloc_imp_value_sf_nra);
				cell = cell.replace(/adj_price_unit_proxy/gi, jdata.adj_price_unit);
				cell = cell.replace(/cap_rate_proxy/gi, jdata.cap_rate);
				cell = cell.replace(/year_built_proxy/gi, jdata.year_built);
				cell = cell.replace(/last_renovation_proxy/gi, jdata.last_renovation);
				cell = cell.replace(/const_descr_proxy/gi, jdata.const_descr);
				cell = cell.replace(/sale_status_proxy/gi, jdata.sale_status);
				cell = cell.replace(/parking_ratio_proxy/gi, jdata.parking_ratio);
				cell = cell.replace(/no_stories_proxy/gi, jdata.no_stories);
				cell = cell.replace(/ind_pct_office_proxy/gi, jdata.ind_pct_office);
				cell = cell.replace(/site_cover_primary_proxy/gi, jdata.site_cover_primary);
				cell = cell.replace(/net_usable_sf_proxy/gi, jdata.net_usable_sf);
				cell = cell.replace(/net_usable_acre_proxy/gi, jdata.net_usable_acre);
				cell = cell.replace(/adj_price_sf_net_proxy/gi, jdata.adj_price_sf_net);
				cell = cell.replace(/adj_price_acre_net_proxy/gi, jdata.adj_price_acre_net);
				cell = cell.replace(/adj_price_sf_far_proxy/gi, jdata.adj_price_sf_far);
				cell = cell.replace(/unit_density_net_acre_proxy/gi, jdata.unit_density_net_acre);
				cell = cell.replace(/finish_lot_size_sf_proxy/gi, jdata.finish_lot_size_sf);
				cell = cell.replace(/bulk_price_lot_proxy/gi, jdata.bulk_price_lot);
				cell = cell.replace(/lease_start_date_proxy/gi, jdata.lease_start_date);
				cell = cell.replace(/lease_start_date_proxy/gi, jdata.lease_end_date);
				cell = cell.replace(/lessee_name_proxy/gi, jdata.lessee_name);
				cell = cell.replace(/tenant_area_sf_proxy/gi, jdata.tenant_area_sf);
				cell = cell.replace(/lease_expense_term_proxy/gi, jdata.lease_expense_term);
				cell = cell.replace(/eff_rent_sf_yr_proxy/gi, jdata.eff_rent_sf_yr);
				cell = cell.replace(/eff_rent_sf_mo_shell_proxy/gi, jdata.eff_rent_sf_mo_shell);
				cell = cell.replace(/eff_rent_sf_mo_office_proxy/gi, jdata.eff_rent_sf_mo_office);
				cell = cell.replace(/eff_rent_sf_mo_blend_proxy/gi, jdata.eff_rent_sf_mo_blend);
				cell = cell.replace(/reportname_proxy/gi, jdata.reportname);
				cell = cell.replace(/DateCreated_proxy/gi, jdata.DateCreated);
				cell = cell.replace(/city_proxy/gi, jdata.city);
				cell = cell.replace(/propertytype_proxy/gi, jdata.propertytype);
				cell = cell.replace(/exp_term_adj_proxy/gi, jdata.exp_term_adj);
				cell = cell.replace(/propertysubtype_proxy/gi, jdata.subtype);
				cell = cell.replace(/submarkid_proxy/gi, jdata.submarket);
				cell = cell.replace(/gross_land_sf_proxy/gi, jdata.gross_land_sf);
				cell = cell.replace(/reportTypeID_proxy/gi, jdata.FK_ReportTypeID);
				cell = cell.replace(/reportType_proxy/gi, jdata.reporttype);
				cell = cell.replace(/yard_rent_proxy/gi, jdata.yard_rent);
				cell = cell.replace(/desc_yard_space_proxy/gi, jdata.desc_yard_space);
				cell = cell.replace(/definition_proxy/gi, jdata.definition);
				cell = cell.replace(/yard_sf_proxy/gi, jdata.yard_sf);
				cell = cell.replace(/lease_start_proxy/gi, jdata.lease_start);
				cell = cell.replace(/term_proxy/gi, jdata.term);
				cell = cell.replace(/ortypes_proxy/gi, jdata.ortypes);
				cell = cell.replace(/other_rent_sf_mo_proxy/gi, jdata.other_rent_sf_mo);
				cell = cell.replace(/or_tenant_proxy/gi, jdata.or_tenant);
				cell = cell.replace(/or_survey_proxy/gi, jdata.or_survey);
				cell = cell.replace(/orterms_proxy/gi, jdata.orterms);
				
				cell = cell.replace(/id_proxy/gi, jdata.id);
				cell = cell.replace(/compname_proxy/gi, jdata.compname);
				cell = cell.replace(/address_proxy/gi, jdata.address);
				cell = cell.replace(/city_proxy/gi, jdata.city);
				cell = cell.replace(/state_proxy/gi, jdata.state);
				cell = cell.replace(/firstname_proxy/gi, jdata.firstname);
				cell = cell.replace(/lastname_proxy/gi, jdata.lastname);
				cell = cell.replace(/email_proxy/gi, jdata.email);
				cell = cell.replace(/cellphone_proxy/gi, jdata.cellphone);
				cell = cell.replace(/website_proxy/gi, jdata.website);
				cell = cell.replace(/apptitle_proxy/gi, jdata.apptitle);
				cell = cell.replace(/designation_proxy/gi, jdata.designation);
				cell = cell.replace(/phoneone_proxy/gi, jdata.phoneone);
				
				if (this.mapController != "") {
					coords.push({lat:jdata.lat,lng:jdata.lng,id:jdata.id})
				}
				var _element = document.createElement("tr");
				_element.innerHTML = cell;
				rows.push(_element);
			}
			if (this.mapController != "") {
				this.mapController.options.coords = coords;
				this.mapController.options.addEmptyMarker = false;
				this.mapController.options.infoWindowData = this.options.data;
				this.mapController.options.showNumbersForMarkers = false;
				this.mapController.options.useInfoWindowForMarkers = true;
				this.mapController.options.parentController = this.options.activeObject;
				this.mapController.init();
				
				var m_element = document.getElementById("map-canvas");
				if (rbe_engine.checkElement(m_element)) {
					m_element.style.width = "100%";
					m_element.style.height = "400px";
				}
	
			}
			console.log(rows);
			$.fn.dataTable.moment('M/D/YYYY');
			table = $('#gridlist #comps').DataTable({
					"pageLength": 10,
					"_controller": this,
					"fixedHeader": true
				});
			table._controller = this;
			table.on('draw', function () {
				var _controller = table._controller;
				var telement = document.getElementById("comps");
				if (rbe_engine.checkElement(telement)) {
					var checks = document.querySelectorAll("tbody >tr >td input[type='checkbox']");
					for (var i = 0; i < checks.length; i++) {
						checks[i].setAttribute("onClick", _controller.options.activeObject + ".setCheckSelection(this);");
						var _id = checks[i].getAttribute("data-id");
						if (_controller.data.selectedIds.length > 0) {
							if (_controller.data.selectedIds.indexOf(_id) != -1) {
								_index = rbe_engine.getItemIndexForMethod(_controller.options.data, "id", _id);
								z_index = rbe_engine.getItemIndexForMethod(_controller.data.selectedData, "id", _id);
								if (_index != -1 && z_index == -1) {
									checks[i].checked = true;
									_controller.data.selectedData.push(_controller.options.data[_index]);
								}
							}
						}
					}
				}
				var _element = document.getElementById("addSelectedLinesBtn");
				if (rbe_engine.checkElement(_element)) {
					_element.style.display = "block";
				}
				var telement = document.getElementById("comps");
				if (rbe_engine.checkElement(telement)) {
					var checks = document.querySelectorAll("tbody >tr >td input[type='checkbox']");
					for (var i = 0; i < checks.length; i++) {
						checks[i].setAttribute("onClick", _controller.options.activeObject + ".setCheckSelection(this);");
					}
				}
				if (_controller.options.gridType == "reports") {
					var _elements = document.getElementsByClassName("_deleteRecord");
					if (rbe_engine.checkElement(_elements)) {
						for (var i = 0; i < _elements.length; i++) {
							_elements[i].setAttribute("onclick", _controller.options.activeObject + ".deleteRecord(this);");
						}
					}
					var _elements = document.getElementsByClassName("_getReport");
					if (rbe_engine.checkElement(_elements)) {
						for (var i = 0; i < _elements.length; i++) {
							_elements[i].setAttribute("onclick", "openReport(this);");
						}
					}
				}
			});
			table.clear().draw();
			table.rows.add(rows).draw();
		},
		handleMapEvent: function(_element,mapControllerEvent){
			var _id = _element.getAttribute("data-id");
			//console.log(_id);
			var __element = document.querySelector("#comps [data-id='"+_id+"']");
			if(__element!=undefined){
				__element.checked = _element.checked;
				this.setCheckSelection(__element);
			}else{
				this.setCheckSelection(_element);
			}

			//console.log(this.data.selectedData);
			//console.log(mapControllerEvent);
		},
		deleteRecord: function (_element) {
			var reportID = _element.parentNode.getAttribute("data-reportID");
			if (rbe_engine.checkElement(reportID)) {
				var _element = document.getElementById("dialogueDeleteReport");
				if (_element != undefined) {
					this.data.selectedReportID = reportID;
					console.log(this.data.selectedReportID);
					_element.innerHTML = "<p>Are you sure that you want to delete report with id " + reportID + "?</p>";
					$("#dialogueDeleteReport").dialog("open");
				}
				return false;
			}
		},
		setCheckSelection: function (_element) {
			var _id = _element.getAttribute("data-id");
			var index = rbe_engine.getItemIndexForMethod(this.data.selectedData, "id", _id);
			if (_element.checked) {
				if (index == -1) {
					_index = rbe_engine.getItemIndexForMethod(this.options.data, "id", _id);
					if (_index != -1) {
						this.data.selectedData.push(this.options.data[_index]);
					}
					_index = this.data.selectedIds.indexOf(_id);
					if (_index == -1 && _id != "") {
						this.data.selectedIds.push(_id);
					}
				}
			} else {
				if (index != -1) {
					this.data.selectedData.splice(index, 1);
				}
				index = this.data.selectedIds.indexOf(_id);
				if (index != -1) {
					this.data.selectedIds.splice(index, 1);
				}
			}
		},
		addSelectedLines: function (_element) {
			if (this.options.wopener.container != "") {
				var __element = window.opener.document.getElementById(this.options.wopener.container);
				if (!rbe_engine.checkElement(__element)) {
					console.log("window opener container is missing!");
					return false;
				}
				var _parent = __element.querySelector("tbody");
				var rows = __element.querySelectorAll("tbody >tr");
				if (rows != null) {
					for (var i = 0; i < rows.length; i++) {
						var id = rows[i].getAttribute("id");
						if (this.data.selectedIds.indexOf(id) == -1) {
							_parent.removeChild(rows[i]);
						}
					}
				}
				var t_element = document.getElementById("comps");
				if (rbe_engine.checkElement(t_element)) {
					var markers = [];
					for (var i = 0; i < this.data.selectedData.length; i++) {
						var jsonData = this.data.selectedData[i];
						var trow = rbe_engine.getElementFromNodeTree("tbody #" + jsonData.id, __element, false);
						if (!rbe_engine.checkElement(trow)) {
							var row = document.createElement("tr");
							row.setAttribute("id", jsonData.id);
							row.setAttribute("data-coords", JSON.stringify({
									"lat": jsonData.lat,
									"lng": jsonData.lng
								}));
							var html = "";
							for (var m = 0; m < this.options.wopener.cellMethods.length; m++) {
								var cssClass = "selectable";
								if (this.options.wopener.cellClasses != undefined) {
									cssClass = this.options.wopener.cellClasses[m];
								}
								if (typeof this.options.wopener.cellMethods[m] == "string") {
									if (this.options.wopener.cellMethods[m] == "photo1") {
										html += "<td><a style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='/cards/comp_images/" + jsonData[this.options.wopener.cellMethods[m]] + "'>";
										m++;
										html += "<img src='/cards/comp_images/" + jsonData[this.options.wopener.cellMethods[m]] + "' height='32' style='height:32px;'/></a>";
										html += "</td>";
									} else if (this.options.wopener.cellMethods[m] == "indexCounter") {
										var rows = __element.querySelectorAll("tbody >tr");
										html += "<td class='" + cssClass + "'>" + (rows.length + 1) + "</td>";
										if(window.opener.addMarker!=undefined){
											window.opener.addMarker(JSON.stringify({
												index: (rows.length + 1),
												lat: jsonData.lat,
												lng: jsonData.lng,
												mapType: this.options.gridType,
												id: jsonData.id
											}));
										}else{
											if(window.opener[window.opener.activeObject].mapController.addMarker!=undefined){
												window.opener[window.opener.activeObject].mapController.addMarker(JSON.stringify({
													index: (rows.length + 1),
													lat: jsonData.lat,
													lng: jsonData.lng,
													mapType: this.options.gridType,
													id: jsonData.id
												}));
											}
										}
										
									} else {
										html += "<td class='" + cssClass + "'>" + jsonData[this.options.wopener.cellMethods[m]] + "</td>";
									}
								} else {
									if (this.options.wopener.cellMethods[m][0] == "photo1") {
										html += "<td data-type='thumb' ><a style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='/cards/comp_images/" + jsonData[this.options.wopener.cellMethods[m][0]] + "'>";
										html += "<img src='/cards/comp_images/" + jsonData[this.options.wopener.cellMethods[m][1]] + "' height='32' style='height:32px;'/></a></td>";
									} else {
										var cmethods = [];
										for (var n = 0; n < this.options.wopener.cellMethods[m].length; n++) {
											cmethods.push(jsonData[this.options.wopener.cellMethods[m][n]]);
										}
										html += "<td class='" + cssClass + "'>" + cmethods.join("<br/>") + "</td>";
									}
								}
							}
							row.innerHTML = html;
							_parent.appendChild(row);
						} else {
							if (this.data.selectedIds.indexOf(jsonData.id.toString()) == -1) {
								console.log(trow);
								_parent.removeChild(trow);
								if(window.opener.removeMarker!=undefined){
									window.opener.removeMarker(JSON.stringify({
										index: 0,
										lat: jsonData.lat,
										lng: jsonData.lng,
										mapType: this.options.gridType,
										id: jsonData.id
									}));
								}else{
									console.log(window.opener[window.opener.activeObject].mapController.removeMarker);
									if(window.opener[window.opener.activeObject].mapController.removeMarker!=undefined){
										window.opener[window.opener.activeObject].mapController.removeMarker(JSON.stringify({
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
					var __element = window.opener.document.getElementById(this.options.wopener.idsInput);
					if (!rbe_engine.checkElement(__element)) {
						console.log("window opener ids input is missing!");
						return false;
					}
					console.log(window.opener);
					__element.value = this.data.selectedIds.join(",");
					if (window.opener.activeObject != undefined) {
						window.opener[window.opener.activeObject].assignSelectRowsEvents();
					} else {
						window.opener.assignSelectRowsEvents();
					}
					window.close();
				}
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
		},
		setAutoDataFormat: function (_element) {
			var formatParams = _element.getAttribute("data-format-params");
			formatParams = JSON.parse(formatParams);
			if (formatParams.prefix == null && formatParams.suffix == null && formatParams.decimals == null && formatParams.comma == null) {
				return false;
			}
			var value = "";
			console.log(formatParams);
			if (formatParams.prefix != null) {
				value += formatParams.prefix + " ";
			}
			value += this.formatNumber(_element.value, 0, parseInt(formatParams.decimals), parseInt(formatParams.comma));
			if (formatParams.suffix != null) {
				value += " " + formatParams.suffix;
			}
			_element.value = value;
		},
		formatNumber: function (number, digits, decimalPlaces, withCommas) {
			number = number.toString();
			var simpleNumber = '';
			for (var i = 0; i < number.length; ++i) {
				if ("0123456789.".indexOf(number.charAt(i)) >= 0) {
					simpleNumber += number.charAt(i);
				}
			}
			number = parseFloat(simpleNumber);
			if (isNaN(number)) {
				number = 0;
			}
			if (withCommas == null) {
				withCommas = false;
			}
			if (digits == 0) {
				digits = 1;
			}
			var integerPart = (decimalPlaces > 0 ? Math.floor(number) : Math.round(number));
			var string = "";
			for (var i = 0; i < digits || integerPart > 0; ++i) {
				if (withCommas && string.match(/^\d\d\d/)) {
					string = "," + string;
				}
				string = (integerPart % 10) + string;
				integerPart = Math.floor(integerPart / 10);
			}
			if (decimalPlaces > 0) {
				number -= Math.floor(number);
				number *= Math.pow(10, decimalPlaces);
				string += "." + this.formatNumber(number, decimalPlaces, 0);
			}
			return string;
		},
		cleanMapSearch: function () {
			var z_elements = document.querySelectorAll("#filterlist #mapFilters ._mapFilter");
			for (var z = 0; z < z_elements.length; z++) {
				var nodeName = z_elements[z].nodeName.toLowerCase();
				var inputType = undefined;
				if (z_elements[z].type != null) {
					inputType = z_elements[z].type.toLowerCase();
				}
				switch (nodeName) {
				case "input":
					switch (inputType) {
					case "text":
						z_elements[z].value = "";
						break;
					case "hidden":
						break;
					case "checkbox":
						z_elements[z].checked = false;
						break;
					case "radio":
						break;
					}
					break;
				case "select":
					switch (inputType) {
					case "select-one":
						z_elements[z].selectedIndex = 0;
						break;
					case "select-multiple":
						break;
					}
					break;
				case "textarea":
					break;
				}
			}
		},
		synchronizeMapSearch: function () {
			for (var attr in this.options.filterMatch) {
				var z_elements = document.querySelectorAll("#searchFilters [data-filter='" + attr + "']");
				for (var z = 0; z < z_elements.length; z++) {
					var nodeName = z_elements[z].nodeName.toLowerCase();
					var inputType = undefined;
					if (z_elements[z].type != null) {
						inputType = z_elements[z].type.toLowerCase();
					}
					switch (nodeName) {
					case "input":
						switch (inputType) {
						case "text":
							var selectedValue = [z_elements[z].value];
							if (this.options.filterMatch[attr] != undefined) {
								if (this.options.filterMatch[attr]instanceof Array) {
									var id = z_elements[z].id;
									var idParts = id.split("_");
									if (idParts[idParts.length - 1] == "to") {
										this.setMapOption(this.options.filterMatch[attr][1], selectedValue, z_elements[z].id);
									} else {
										this.setMapOption(this.options.filterMatch[attr][0], selectedValue, z_elements[z].id);
									}
								} else {
									this.setMapOption(this.options.filterMatch[attr], selectedValue, z_elements[z].id);
								}
							}
							break;
						case "hidden":
							break;
						case "checkbox":
							break;
						case "radio":
							break;
						}
						break;
					case "select":
						switch (inputType) {
						case "select-one":
							var selectedValue = [z_elements[z].options[z_elements[z].selectedIndex].value];
							if (this.options.filterMatch[attr] != undefined) {
								this.setMapOption(this.options.filterMatch[attr], selectedValue, z_elements[z].id);
							}
							break;
						case "select-multiple":
							var id = z_elements[z].id;
							var idParts = id.split("_");
							var conditionGroupIndex = idParts[1];
							var conditionIndex = idParts[2];
							var s_element = document.getElementById("selectOperator_" + conditionGroupIndex + "_" + conditionIndex);
							var operator = "";
							if (rbe_engine.checkElement(s_element)) {
								operator = s_element.options[s_element.selectedIndex].value;
							}
							var selectedValue = [];
							for (var o = 0; o < z_elements[z].options.length; o++) {
								if (operator != "NOT IN") {
									if (z_elements[z].options[o].selected) {
										selectedValue.push(z_elements[z].options[o].value);
									}
								} else {
									if (!z_elements[z].options[o].selected) {
										selectedValue.push(z_elements[z].options[o].value);
									}
								}
							}
							this.setMapOption(this.options.filterMatch[attr], selectedValue, z_elements[z].id);
							break;
						}
						break;
					case "textarea":
						break;
					}
				}
			}
		},
		checkMapSearchSync: function (_elementID) {
			console.log("i smell deprecation here!");
			return false;
			var parts = _elementID.split("_");
			var _element = document.getElementById(_elementID);
			if (rbe_engine.checkElement(_element)) {
				__element = _element.querySelector("#selectField_" + parts[1] + "_" + parts[2]);
				if (rbe_engine.checkElement(__element)) {
					var selectedValue = __element.options[__element.selectedIndex].value;
					console.log(this.options.filterMatch[selectedValue]);
					var searchSyncData = rbe_engine.getItemForMethod(this.data.searchSyncData, "id", parts[1] + "_" + parts[2], false);
					if (searchSyncData !== false) {
						this.removeMapOption(searchSyncData.actionValue, searchSyncData.value);
						var searchSyncIndex = rbe_engine.getItemIndexForMethod(this.data.searchSyncData, "id", parts[1] + "_" + parts[2]);
						console.log(searchSyncIndex)
						if (searchSyncIndex != -1) {
							this.data.searchSyncData.splice(searchSyncIndex, 1);
						}
					} else {
						if (this.options.filterMatch[selectedValue] != undefined) {
							var z_element = _element.querySelector("[data-filter='" + selectedValue + "']");
							if (rbe_engine.checkElement(z_element)) {
								var nodeName = z_element.nodeName.toLowerCase();
								var inputType = undefined;
								if (z_element.type != null) {
									inputType = z_element.type.toLowerCase();
								}
								switch (nodeName) {
								case "input":
									switch (inputType) {
									case "text":
										break;
									case "hidden":
										break;
									case "checkbox":
										break;
									case "radio":
										break;
									}
									break;
								case "select":
									switch (inputType) {
									case "select-one":
										z_element.setAttribute("onChange", z_element.getAttribute("onChange") + ";" + this.options.activeObject + ".setMapOption(this,'" + this.options.filterMatch[selectedValue] + "','" + selectedValue + "','" + z_element.id + "');");
										break;
									case "select-multiple":
										z_element.setAttribute("onChange", z_element.getAttribute("onChange") + ";" + this.options.activeObject + ".setMapOption(this,'" + this.options.filterMatch[selectedValue] + "','" + selectedValue + "','" + z_element.id + "');");
										break;
									}
									break;
								case "textarea":
									break;
								}
							}
							this.data.searchSyncData.push({
								id: parts[1] + "_" + parts[2],
								field: selectedValue,
								actionValue: this.options.filterMatch[selectedValue],
								value: ""
							});
						}
					}
				}
				console.log(searchSyncData);
			}
			console.log(_element);
		},
		removeMapOption: function (filterMatch, value) {
			var _elements = document.querySelectorAll("#mapFilters input[data-filter='" + filterMatch + "']");
			if (_elements.length > 0) {
				var nodeName = _elements[0].nodeName.toLowerCase();
				var inputType = undefined;
				if (_elements[0].type != null) {
					inputType = _elements[0].type.toLowerCase();
				}
				switch (nodeName) {
				case "input":
					switch (inputType) {
					case "text":
						break;
					case "hidden":
						break;
					case "checkbox":
						for (var i = 0; i < _elements.length; i++) {
							if (_elements[i].getAttribute("data-id") == value) {
								_elements[i].checked = false;
								if (filterMatch == "ptid") {
									aa_map_tpl_subPropertyType.setSubPropertyTypes(_elements[i], true, value);
								} else if (filterMatch == "gmid") {
									aa_map_tpl_subMarket.setSubMarket(_elements[i], true, value);
								}
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
						break;
					case "select-multiple":
						break;
					}
					break;
				case "textarea":
					break;
				}
			}
		},
		setMapOption: function (filterMatch, value, _elementID) {
			var parts = _elementID.split("_");
			var _elements = document.querySelectorAll("#mapFilters input[data-filter='" + filterMatch + "']");
			if (_elements.length > 0) {
				var nodeName = _elements[0].nodeName.toLowerCase();
				var inputType = undefined;
				if (_elements[0].type != null) {
					inputType = _elements[0].type.toLowerCase();
				}
				switch (nodeName) {
				case "input":
					switch (inputType) {
					case "text":
						for (var v = 0; v < value.length; v++) {
							if (_elements[0].getAttribute("data-filter") == filterMatch) {
								_elements[0].value = value[v];
							}
						}
						break;
					case "hidden":
						break;
					case "checkbox":
						for (var i = 0; i < _elements.length; i++) {
							for (var v = 0; v < value.length; v++) {
								if (_elements[i].getAttribute("data-id") == value[v]) {
									_elements[i].checked = true;
									if (filterMatch == "ptid") {
										aa_map_tpl_subPropertyType.setSubPropertyTypes(_elements[i], true, value[v]);
									} else if (filterMatch == "gmid") {
										aa_map_tpl_subMarket.setSubMarket(_elements[i], true, value[v]);
									}
								}
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
						break;
					case "select-multiple":
						break;
					}
					break;
				case "textarea":
					break;
				}
			}
		}
	}
	aa_searchEngine.setOptions(options);
	return aa_searchEngine;
};
