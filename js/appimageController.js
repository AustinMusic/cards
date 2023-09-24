var _imageController = function (options) {
	var _imageController;
	var rbe_engine = new _rbe_engine();
	_imageController = {
		options: {
			activeObject: "",
			id: ""
		},
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
			this.initDeleteImageDialog();
		},
		assignEvents: function () {
			var _elements = document.getElementsByClassName("_photo");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].setAttribute("onChange", this.options.activeObject + ".readURL(this);");
				}
			}
		var _elements = document.getElementsByClassName("imgPlc");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].addEventListener("mouseover", window[this.options.activeObject].previewPanelShow);
					_elements[i].addEventListener("mouseout", window[this.options.activeObject].previewPanelHide);
				}
			}
				var _elements = document.getElementsByClassName("preview-sp1-panel");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].addEventListener("mouseover", window[this.options.activeObject].previewPanelTriggerHide);
					_elements[i].addEventListener("mouseout", window[this.options.activeObject].previewPanelTriggerShow);
				}
			}
			var _elements = document.getElementsByClassName("img-edit");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].addEventListener("click", function () {
						var btn = this.getAttribute("data-rel-photo-btn");
						var cnt = this.getAttribute("data-container");
						var __element = document.querySelector("#" + cnt + " label[for='" + btn + "']");
						if (rbe_engine.checkElement(__element)) {
							__element.click();
						}
					});
				}
			}
			var _elements = document.getElementsByClassName("img-del");
			if (rbe_engine.checkElement(_elements)) {
				for (var i = 0; i < _elements.length; i++) {
					_elements[i].addEventListener("click", function (evt) {
						evt.view.imageController.initDeleteImageDialog();
						var __element = document.getElementById("dialogueDeleteImage");
						if (rbe_engine.checkElement(__element)) {
							__element.innerHTML = "<p>Are you sure that you want to delete the selected image, this action cannot be undone!</p>";
							$("#dialogueDeleteImage").dialog("option", "event", this);
							$("#dialogueDeleteImage").dialog("open");
						}
					});
				}
			}
		},
		initDeleteImageDialog: function () {
			var _element = document.getElementById("dialogueDeleteImage");
			if (!rbe_engine.checkElement(_element)) {
				var _element = document.createElement("div");
				_element.setAttribute("id", "dialogueDeleteImage");
				document.getElementsByTagName('body')[0].appendChild(_element);
				$("#dialogueDeleteImage").dialog({
					autoOpen: false,
					height: 200,
					width: 600,
					modal: true,
					title: "Please note",
					event: "",
					controller: this,
					buttons: [{
							text: "Cancel",
							click: function () {
								$(this).dialog("close");
							}
						}, {
							text: "Delete",
							click: function () {
								$(this).dialog("close");
								var _melement = ($(this).dialog("option", "event"));
								var __element = _melement.parentNode.parentNode.querySelector("#preview-sp1");
								var imageName = "";
								var _dataType = "";
								var id = "";
								if (rbe_engine.checkElement(__element)) {
									imageName = __element.getAttribute("src");
									imageName = imageName.split("/");
									imageName = imageName[imageName.length - 1];
									_dataType = __element.getAttribute("data-type");
									if(__element.getAttribute("data-id")){
										id = __element.getAttribute("data-id");
									}
								}
	
								$.ajax({
									url: "../forms/ajax_deleteappImage.php",
									type: "post",
									dataType: "json",
									data: {
										reportID: $(this).dialog("option", "controller").options.id,
										imageName: imageName,
										dataType: _dataType,
										id:id
									},
									beforeSend: function () {},
									success: function (retJson) {
										if (retJson[0].code == "001" || retJson[0].code == "002") {
											if (rbe_engine.hasClass(_melement.parentNode.parentNode.parentNode,"remove")) {
												_melement.parentNode.parentNode.parentNode.parentNode.removeChild(_melement.parentNode.parentNode.parentNode);
											}else{
												var __element = _melement.parentNode.parentNode.querySelector("#preview-sp1");
												if (rbe_engine.checkElement(__element)) {
													__element.parentNode.parentNode.innerHTML = '<img id="preview-sp1" src="../app_images/no-photo.jpg" width="100%" style="cursor:pointer;"/>';
												}
												var btn = _melement.getAttribute("data-rel-photo-btn");
												var cnt = _melement.getAttribute("data-container");
												var lnk = _melement.getAttribute("data-link");
												var c_element = document.getElementById(cnt);
												if (rbe_engine.checkElement(c_element)) {
													__element = c_element.querySelector("#" + btn);
													if (rbe_engine.checkElement(__element)) {
														__element.value = "";
													}
												}
												var l_element = document.getElementById(cnt);
												if (rbe_engine.checkElement(l_element)) {
													__element = l_element.querySelector("#" + lnk);
													if (rbe_engine.checkElement(__element)) {
														__element.value = "";
													}
												}
											}
										}
										__element = document.getElementById("dialogueDeleteImage");
										if (rbe_engine.checkElement(__element)) {
											__element.innerHTML = "<p>" + retJson.data + "</p>";
										}
									},
									error: function (jqXHR, textStatus, errorThrown) {
										alert("An error occured.");
									}
								});
							}
						}
					]
				});
			}
		},
		previewPanelShow: function (evt) {
			var _ielement = evt.target;
			if (!rbe_engine.checkElement(_ielement)) {
				return false;
			}
			while (!rbe_engine.hasClass(_ielement, "imgPlc")) {
				_ielement = _ielement.parentNode;
				if(_ielement.tagName.toLowerCase()=="html"){
					return false;
				}
			}
			
			var __element = _ielement.querySelector(".preview-sp1-panel");
			if (__element != null && __element != undefined) {
				__element.style.display = "block";
				var __element = _ielement.querySelector("#preview-sp1");
				if (rbe_engine.checkElement(__element)) {
					var url = __element.getAttribute("src");
					url = url.split("/");
					if (url[url.length - 1] != "no-photo.jpg" && evt.view.imageController.options.id != "") {
						__element = _ielement.querySelector(".img-del");
						if (rbe_engine.checkElement(__element)) {
							__element.style.display = "block";
						}
					} else {
						__element = _ielement.querySelector(".img-del");
						if (rbe_engine.checkElement(__element)) {
							__element.style.display = "none";
						}
					}
				}
			}
		},
		previewPanelHide: function (evt) {
			var _ielement = evt.target;
			while (!rbe_engine.hasClass(_ielement, "imgPlc")) {
				_ielement = _ielement.parentNode;
				if(_ielement.tagName.toLowerCase()=="html"){
					return false;
				}
			}
/*			var __element = _ielement.querySelector(".preview-sp1-panel");
			if (rbe_engine.checkElement(__element)) {
				__element.style.display = "none";
			}*/

		},
		previewPanelTriggerHide: function (evt) {
			var __element = this.parentNode.querySelector("#preview-sp1");
			if (rbe_engine.checkElement(__element)) {
				__element.removeEventListener("mouseout", evt.view.imageController.previewPanelHide);
				__element.removeEventListener("mouseover", evt.view.imageController.previewPanelShow);
				evt.view.imageController.previewPanelShow(evt);
			}
		},
		previewPanelTriggerShow: function (evt) {
			var __element = this.parentNode.parentNode;
			if (rbe_engine.checkElement(__element)) {
				__element.addEventListener("mouseover", evt.view.imageController.previewPanelShow);
				__element.addEventListener("mouseout", evt.view.imageController.previewPanelHide);
				evt.view.imageController.previewPanelHide(evt);
			}
		},
		readURL: function (input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {}
				reader.onloadend = function (e) {
					var arr = (new Uint8Array(e.target.result)).subarray(0, 4);
					var header = "";
					for (var i = 0; i < arr.length; i++) {
						header += arr[i].toString(16);
					}
					var type = undefined;
					switch (header) {
					case "89504e47":
						type = "image/png";
						break;
					case "47494638":
						type = "image/gif";
						break;
					case "ffd8ffe0":
					case "ffd8ffe1":
					case "ffd8ffe2":
					case "ffd8ffe3":
					case "ffd8ffe8":
						type = "image/jpeg";
						break;
					}
					if (type != undefined) {
						var ireader = new FileReader();
						ireader.onload = function (e) {
							input.parentNode.querySelector("#preview-sp1").setAttribute("src", e.target.result);
							var _element = input.parentNode.querySelector("#preview-sp1").parentNode;
							_element.setAttribute("href", e.target.result);
						}
						ireader.readAsDataURL(input.files[0]);
					} else {
						alert("No allowed file type, please select and acceptable image type");
					}
				}
				reader.readAsArrayBuffer(input.files[0]);
			}
		},
		showErrorMessage: function (message) {}
	};
	_imageController.setOptions(options);
	return _imageController;
}
