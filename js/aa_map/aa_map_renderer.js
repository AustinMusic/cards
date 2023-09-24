var _aa_mapRenderer = function(options){
	var aa_mapRenderer;
	var rbe_engine = new _rbe_engine();
	var aa_engine = new _aa_engine();
	aa_mapRenderer = {
		options : {
			template:false,
		},
		setOptions: function(options){
		    for(var _attr in options) {
		        if(this.options.hasOwnProperty(_attr)){
		        	this.options[_attr] = options[_attr];
		        }
		    }
		},
		renderTextInput: function(){
			var container = document.getElementById(this.options.template.layout.tag);
			if(rbe_engine.checkElement(container)){
				var hasCustomTpl = false;
				var tplElement = document.getElementById(this.options.template.tag);
				if(rbe_engine.checkElement(tplElement)){
					hasCustomTpl = true;
				}
				
				var html = this.options.template.template;
				if(hasCustomTpl){
					html = tplElement.innerHTML;
				}

				html = html.replace(/title_proxy/gi,this.options.template.dataSource["title"]);
				
				if(hasCustomTpl){
					tplElement.innerHTML = html;
					var _element = tplElement.querySelector("input[type='text']");
					if(rbe_engine.checkElement(_element)){
						for(var _attr in this.options.template.attributes) {
							if(_element.hasAttribute(_attr)){
								var _attribute = _element.getAttribute(_attr);
								_element.setAttribute(_attr,_attribute+" "+this.options.template.attributes[_attr]);
							}else{
								_element.setAttribute(_attr,this.options.template.attributes[_attr]);
							}
						}
					}
					container.appendChild(tplElement);
				}else{
					var t_element = document.createElement("div");
					t_element.innerHTML = html;
					var _element = t_element.querySelector("input[type='text']");
					if(rbe_engine.checkElement(_element)){
						for(var _attr in this.options.template.attributes) {
							if(_element.hasAttribute(_attr)){
								var _attribute = _element.getAttribute(_attr);
								_element.setAttribute(_attr,_attribute+" "+this.options.template.attributes[_attr]);
							}else{
								_element.setAttribute(_attr,this.options.template.attributes[_attr]);
							}
						}
					}

					container.appendChild(t_element.children[0]);
				}
			}
		},
		renderTextArea: function(){
			var container = document.getElementById(this.options.template.layout.tag);
			if(rbe_engine.checkElement(container)){
				var hasCustomTpl = false;
				var tplElement = document.getElementById(this.options.template.tag);
				if(rbe_engine.checkElement(tplElement)){
					hasCustomTpl = true;
				}
				
				var html = this.options.template.template;
				if(hasCustomTpl){
					html = tplElement.innerHTML;
				}

				html = html.replace(/title_proxy/gi,this.options.template.dataSource["title"]);
							
				if(hasCustomTpl){
					tplElement.innerHTML = html;
					var _element = tplElement.querySelector("textarea");
					if(rbe_engine.checkElement(_element)){
						for(var _attr in this.options.template.attributes) {
							if(_element.hasAttribute(_attr)){
								var _attribute = _element.getAttribute(_attr);
								_element.setAttribute(_attr,_attribute+" "+this.options.template.attributes[_attr]);
							}else{
								_element.setAttribute(_attr,this.options.template.attributes[_attr]);
							}
						}
					}
					container.appendChild(tplElement);
				}else{
					var t_element = document.createElement("div");
					t_element.innerHTML = html;
					var _element = t_element.querySelector("textarea");
					if(rbe_engine.checkElement(_element)){
						for(var _attr in this.options.template.attributes) {
							if(_element.hasAttribute(_attr)){
								var _attribute = _element.getAttribute(_attr);
								_element.setAttribute(_attr,_attribute+" "+this.options.template.attributes[_attr]);
							}else{
								_element.setAttribute(_attr,this.options.template.attributes[_attr]);
							}
						}
					}
					container.appendChild(t_element.children[0]);
				}
			}
		},
		renderHiddenInput: function(method){
			var container = document.getElementById(this.options.template.layout.tag);
			if(rbe_engine.checkElement(container)){
				var hasCustomTpl = false;
				var tplElement = document.getElementById(this.options.template.tag);
				if(rbe_engine.checkElement(tplElement)){
					hasCustomTpl = true;
				}
				
				var html = this.options.template.template;
				if(hasCustomTpl){
					html = tplElement.innerHTML;
				}

				html = html.replace(/_typeValue/gi,this.options.template.dataSource[method.value]);
				
				if(hasCustomTpl){
					tplElement.innerHTML = html;
					container.appendChild(tplElement);
				}else{
					var t_element = document.createElement("div");
					t_element.innerHTML = html;
					container.appendChild(t_element.children[0]);
				}
			}
		},
		renderCheckBoxGroup: function(method){
			var container = document.getElementById(this.options.template.layout.tag);
			if(rbe_engine.checkElement(container)){
				var hasCustomTpl = false;
				var tplElement = document.getElementById(this.options.template.tag);
				if(rbe_engine.checkElement(tplElement)){
					hasCustomTpl = true;
				}

				var _element = document.createElement("div");
				_element.setAttribute("class","_mapFilter");
				_element.setAttribute("style","clear:both;");
				_element.setAttribute("filter-type","group");

				var __element = document.createElement("div");
				__element.setAttribute("style","clear:both;");
				__element.innerHTML = "<b>"+this.options.template.translations["title"]+"</b>";
				_element.appendChild(__element);

				for(var i=0;i<this.options.template.dataSource.length;i++){
					var html = this.options.template.template;
					if(hasCustomTpl){
						html = tplElement.innerHTML;
					}
					
					html = html.replace(/_typeValue/gi,this.options.template.dataSource[i][method.title]);
					html = html.replace(/_typeid/gi,this.options.template.dataSource[i][method.value]);
					
					var __element = document.createElement("div");
					__element.innerHTML = html;
					_element.appendChild(__element.children[0]);
				}
				container.appendChild(_element);
			}else{
				console.log("No container for "+this.options.template.tag+" selections")
			}
		},
		renderBoundInputs: function(){
			var container = document.getElementById(this.options.template.layout.tag);
			if(rbe_engine.checkElement(container)){
				var hasCustomTpl = false;
				var tplElement = document.getElementById(this.options.template.tag);
				if(rbe_engine.checkElement(tplElement)){
					hasCustomTpl = true;
				}
				
				var html = "";
				if(hasCustomTpl){
					html = tplElement.innerHTML;
				}else{
					if(this.options.template!==false){
						html = this.options.template.template;
					}
				}
					
				html = html.replace(/title_proxy/gi,this.options.template.dataSource["title"]);
				html = html.replace(/minValue_proxy/gi,this.options.template.dataSource["min"]);
				html = html.replace(/maxValue_proxy/gi,this.options.template.dataSource["max"]);
				
				if(hasCustomTpl){
					tplElement.innerHTML = html;
					var _elements = tplElement.querySelectorAll("input[type='text']");
					for(var j=0;j<_elements.length;j++){
						if(rbe_engine.checkElement(_elements[j])){
							for(var _attr in this.options.template.attributes) {
								if(_elements[j].hasAttribute(_attr)){
									var _attribute = _elements[j].getAttribute(_attr);
									_elements[j].setAttribute(_attr,_attribute+" "+this.options.template.attributes[_attr]);
								}else{
									_elements[j].setAttribute(_attr,this.options.template.attributes[_attr]);
								}
							}
						}
					}
					container.appendChild(tplElement);
				}else{
					var t_element = document.createElement("div");
					t_element.innerHTML = html;
					var _elements = t_element.querySelectorAll("input[type='text']");
					for(var j=0;j<_elements.length;j++){
						if(rbe_engine.checkElement(_elements[j])){
							for(var _attr in this.options.template.attributes) {
								if(_elements[j].hasAttribute(_attr)){
									var _attribute = _elements[j].getAttribute(_attr);
									_elements[j].setAttribute(_attr,_attribute+" "+this.options.template.attributes[_attr]);
								}else{
									_elements[j].setAttribute(_attr,this.options.template.attributes[_attr]);
								}
							}
						}
					}
					container.appendChild(t_element.children[0]);
				}
			}
		},
		renderSelect: function(){
			if(this.options.template.layout.tag.charAt(0)=="#"){
				var container = document.querySelector(this.options.template.layout.tag);
			}else{
				var container = document.getElementById(this.options.template.layout.tag);
			}
			if(rbe_engine.checkElement(container)){
				var hasCustomTpl = false;
				var tplElement = document.getElementById(this.options.template.tag);
				if(rbe_engine.checkElement(tplElement)){
					hasCustomTpl = true;
				}
				
				var html = this.options.template.template;
				if(hasCustomTpl){
					html = tplElement.innerHTML;
				}
				
				html = html.replace(/title_proxy/gi,this.options.template.dataSource["title"]);
				if(hasCustomTpl){
					tplElement.innerHTML = html;
					container.appendChild(tplElement);
				}else{
					var t_element = document.createElement("div");
					t_element.innerHTML = html;
					var _element = t_element.getElementsByTagName("select")[0];
					
					if(rbe_engine.checkElement(_element)){
						_element.options[_element.options.length] = new Option(this.options.template.dataSource["Select"],0);
						for(var o=0;o<this.options.template.dataSource.options.length;o++){
							_element.options[_element.options.length] = new Option(this.options.template.dataSource.options[o].definition,this.options.template.dataSource.options[o].id);
							if(this.options.template.defaultValue!="" && this.options.template.defaultValue==this.options.template.dataSource.options[o].id){
								_element.selectedIndex = _element.options.length-1;
							}
							if(this.options.template.dataSource.options[o].visibility!=undefined && this.options.template.dataSource.options[o].visibility!=null){
								if(this.options.template.dataSource.options[o].visibility!=1){
									_element.options[_element.options.length-1].style.display = "none";
								}
							}
						}
					}
					if(this.options.template.defaultIndex!=undefined && this.options.template.defaultValue==""){
						_element.selectedIndex = this.options.template.defaultIndex;
					}
					for(var _attr in this.options.template.attributes) {
						_element.setAttribute(_attr,this.options.template.attributes[_attr]);
					}
					container.appendChild(t_element.children[0]);
				}
			}
		},
		renderCheckBox: function(){
			var container = document.getElementById(this.options.template.layout.tag);
			if(rbe_engine.checkElement(container)){
				var hasCustomTpl = false;
				var tplElement = document.getElementById(this.options.template.tag);
				if(rbe_engine.checkElement(tplElement)){
					hasCustomTpl = true;
				}
				
				var html = this.options.template.template;
				if(hasCustomTpl){
					html = tplElement.innerHTML;
				}
				
				html = html.replace(/title_proxy/gi,this.options.template.dataSource["title"]);
				
				if(hasCustomTpl){
					tplElement.innerHTML = html;
					var _element = tplElement.querySelector("input[type='checkbox']");
					if(rbe_engine.checkElement(_element)){
						for(var _attr in this.options.template.attributes) {
							if(_element.hasAttribute(_attr)){
								var _attribute = _element.getAttribute(_attr);
								_element.setAttribute(_attr,_attribute+" "+this.options.template.attributes[_attr]);
							}else{
								_element.setAttribute(_attr,this.options.template.attributes[_attr]);
							}
						}
					}
					container.appendChild(tplElement);
				}else{
					var t_element = document.createElement("div");
					t_element.innerHTML = html;
					var _element = t_element.querySelector("input[type='checkbox']");
					if(rbe_engine.checkElement(_element)){
						for(var _attr in this.options.template.attributes) {
							if(_element.hasAttribute(_attr)){
								var _attribute = _element.getAttribute(_attr);
								_element.setAttribute(_attr,_attribute+" "+this.options.template.attributes[_attr]);
							}else{
								_element.setAttribute(_attr,this.options.template.attributes[_attr]);
							}
						}
					}
					container.appendChild(t_element.children[0]);
				}
			}
		},
		renderButton: function(){
			var container = document.getElementById(this.options.template.layout.tag);
			if(!rbe_engine.checkElement(container)){
				console.log("No container "+this.options.template.layout.tag+" found! Exiting");
				return false;
			}
			var hasCustomTpl = false;
			var tplElement = document.getElementById(this.options.template.tag);
			if(rbe_engine.checkElement(tplElement)){
				hasCustomTpl = true;
			}
			
			var html = this.options.template.template;
			if(hasCustomTpl){
				html = tplElement.innerHTML;
			}
			
			html = html.replace(/title_proxy/gi,this.options.template.dataSource["title"]);
			
			if(hasCustomTpl){
				tplElement.innerHTML = html;
				var _element = tplElement.querySelector("input[type='"+this.options.template.type+"']");
				if(rbe_engine.checkElement(_element)){
					for(var _attr in this.options.template.attributes) {
						if(_element.hasAttribute(_attr)){
							var _attribute = _element.getAttribute(_attr);
							_element.setAttribute(_attr,_attribute+" "+this.options.template.attributes[_attr]);
						}else{
							_element.setAttribute(_attr,this.options.template.attributes[_attr]);
						}
					}
				}
				container.appendChild(tplElement);
			}else{
				var t_element = document.createElement("div");
				t_element.innerHTML = html;
				var _element = t_element.querySelector("input[type='"+this.options.template.type+"']");
				if(rbe_engine.checkElement(_element)){
					for(var _attr in this.options.template.attributes) {
						if(_element.hasAttribute(_attr)){
							var _attribute = _element.getAttribute(_attr);
							_element.setAttribute(_attr,_attribute+" "+this.options.template.attributes[_attr]);
						}else{
							_element.setAttribute(_attr,this.options.template.attributes[_attr]);
						}
					}
				}
				container.appendChild(t_element.children[0]);
			}
		}
	}
	
	aa_mapRenderer.setOptions(options);
	
	return aa_mapRenderer;
};