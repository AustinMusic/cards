/*DIMITRIS 20180215
This are generic methods that can be used anywhere currently they are used by rbe_activityController
*/
var _rbe_engine = function () {
	var rbe_engine;
	rbe_engine = {
		addClass: function(_elements,_className){
			var constructorName = "";
			var constructorNames = new Array();
			constructorNames.push("htmlcollection");
			constructorNames.push("nodelist");									 
			if(_elements.constructor.name!=undefined){
				constructorName = _elements.constructor.name;
			}
			if(typeof _elements.getAttribute === 'undefined' || _elements instanceof Array || constructorName.toLowerCase()=="htmlcollection" || constructorName.toLowerCase()=="nodelist"){
				for(var p=0;p<_elements.length;p++){
					this.addClass(_elements[p],_className);
				}
			}else{
				var _element = _elements;
				if(_element==undefined){
					return false;
				}
				if(_element==null){
					return false;
				}
				if(!_element){
					return false;
				}
				if(_element.getAttribute("class")!=null){
					var classes = _element.getAttribute("class").trim().split(" ");
					if(classes.indexOf(_className)==-1){
						classes.push(_className);
					}
					classes = classes.join(" ");
					_element.setAttribute("class",classes);
				}else{
					_element.setAttribute("class",_className);
				}
			}
		},
		removeClass: function(_elements,_className){
			var constructorName = "";
			var constructorNames = new Array();
			constructorNames.push("htmlcollection");
			constructorNames.push("nodelist");
			if(_elements.constructor.name!=undefined){
				constructorName = _elements.constructor.name;
			}

			if(typeof _elements.getAttribute === 'undefined' || _elements instanceof Array || constructorName.toLowerCase()=="htmlcollection" || constructorName.toLowerCase()=="nodelist"){
				var p = 0;
				while(this.hasClass(_elements[p],_className)){
					this.removeClassElement(_elements[p],_className);
				}

				if(_elements.length!=0){
					for(var p=0;p<_elements.length;p++){
						this.removeClassElement(_elements[p],_className);
					}
				}
			}else{
				var _element = _elements;
				this.removeClassElement(_element,_className);
			}
			
		},
		removeClassElement: function(__element,_className){
			if(__element==undefined){
				return false;
			}
			if(typeof __element.getAttribute === 'undefined'){
				return false;
			}

			if(__element.getAttribute("class")!=null){
				var classes = __element.getAttribute("class").trim().split(" ");
				var cindex = classes.indexOf(_className);
				if(cindex!=-1){
					classes.splice(cindex,1);
				}
				_class = classes.join(" ");
				__element.setAttribute("class",_class);
			}
		},
		hasClass: function(_element,_className){
			if(_element==undefined){
				return false;
			}
			if(_element.nodeType==3){
				return false;
			}
			if(_element.getAttribute("class")!=null){
				var classes = _element.getAttribute("class").trim().split(" ");
				if(classes.indexOf(_className)!=-1){
					return true;
				}
			}

			return false;
		},
		getItemIndexForMethod:function(items,method,value) {
			for(var i=0;i<items.length;i++) {
				var item = items[i];
				if(typeof method==='string'){
					if(item[ method ]!=undefined){
						if(item[ method ]==value){
							return i;
						}
					}
				}else{
					for(var j=0;j<method.length;j++) {
						if(typeof item[method[j]]==='object'){
							item = item[method[j]];
						}else{
							if(item[method[j]]==value){
								return i;
							}
						}
					}
				}
			}
			return -1;
		},
		getItemForMethod: function(_items,method,value,defaultObject){
			for(var i=0;i<_items.length;i++){
				var _item = _items[i];
				if(typeof method==='string'){
					if(_item[method]!=undefined){
						if(_item[method]==value){
							return _items[i];
						}
					}
				}else{
					for(var j=0;j<method.length;j++){
						if(typeof _item[method[j]]==='object'){
							_item = _item[method[j]];
						}else{
							if(_item[method[j]]==value){
								return _items[i];
							}
						}
					}
				}
			}
			return defaultObject;
		},
		getItemsForMethod: function(_items,method,values,operand){
			var result = [];
			
			for(var i=0;i<_items.length;i++){
				var _item = _items[i];
				if(typeof method==='string'){
					if(_item[method]!=undefined){
						if(operand=="!="){
							if(values.indexOf(_item[method])==-1){
								result.push(_items[i]);
							}
						}else{
							if(values.indexOf(_item[method])!==-1){
								result.push(_items[i]);
							}
						}
					}
				}else{
					for(var j=0;j<method.length;j++){
						if(method[j] instanceof Array){
							var resCount = 0;
							for(var m=0;m<method[j].length;m++){
								//console.log(method[j][m]);
								//console.log(_item[method[j][m]]);
								//console.log(values[m]);
								if(_item[method[j][m]]!=undefined){
									if(operand[m]=="!="){
										if(values instanceof Array){
											if(values[m]!=undefined){
												if(values[m].indexOf(_item[method[j][m]])==-1){
													resCount++;
												}
											}
										}else{
											if(values.indexOf(_item[method[j][m]])==-1){
												resCount++;
											}
										}
									}else{
										if(values instanceof Array){
											if(values[m]!=undefined){
												if(values[m].indexOf(_item[method[j][m]])!==-1){
													resCount++;
												}
											}
										}else{
											if(values.indexOf(_item[method[j][m]])!==-1){
												resCount++;
											}
										}
										
									}
								}
							}
							//console.log(resCount);
							//console.log(method[j].length);
							if(resCount==method[j].length){//method[j].length
								result.push(_items[i]);
							}
						}else{
							if(typeof _item[method[j]]==='object'){
								_item = _item[method[j]];
							}else{
								if(operand=="!="){
									if(values.indexOf(_item[method[j]])==-1){
										result.push(_items[i]);
									}
								}else{
									if(values.indexOf(_item[method[j]])!==-1){
										result.push(_items[i]);
									}
								}
							}
						}
						
					}
				}
			}

			if(result.length!=0){
				return result;
			}
			return false;
		},
		getCurrentDateTime: function(delimeter){
			var _date = new Date();
			if(delimeter==false){
				delimeter = "/";
			}
			return _date.getMonth()+delimeter+_date.getDate()+delimeter+_date.getFullYear()+" "+_date.getHours()+":"+_date.getMinutes()+":"+_date.getSeconds()+":"+_date.getMilliseconds();
		},
		fromFullDateToUnixTimeStamp:function(_date,_subtractMonth){
			var parts = [];
			parts[0] = _date;
			if (_date.indexOf(" ") != -1) {
				parts = _date.split(" ");
			}
			var delimeter = "";
			if(_date.indexOf("/")!==-1){
				delimeter = "/";
			}else{
				if(_date.indexOf("-")!==-1){
					delimeter = "-";
				}
			}
			var dateParts = parts[0].split(delimeter);
			var month = dateParts[0];
			if(_subtractMonth){
				month = dateParts[0] - 1;
			}
 
			var miliseconds = 0;
			if (parts[1] != undefined) {
				var timeParts = parts[1].split(":");
				if (timeParts[3] != undefined) {
					miliseconds = parseInt(timeParts[3]);
				}
				var _date = new Date(parseInt(dateParts[2]), month, parseInt(dateParts[0]), parseInt(timeParts[0]), parseInt(timeParts[1]), parseInt(timeParts[2]), miliseconds);
			} else {
				var _date = new Date(parseInt(dateParts[2]), month, parseInt(dateParts[0]), 0, 0, 0, miliseconds);
			}
			var _refDate = new Date();
			var cjan = new Date(_refDate.getFullYear(), 0, 1);
			var cjul = new Date(_refDate.getFullYear(), 6, 1);
			var applyDST = false;
			if ((_refDate.getMonth() > 2 || (_refDate.getMonth() == 2 && _refDate.getDate() >= 26)) && (_refDate.getMonth() < 10 || (_refDate.getMonth() == 9 && _refDate.getDate() <= 29))) {
				applyDST = true;
			}
			var jan = new Date(dateParts[2], 0, 1);
			var jul = new Date(dateParts[2], 6, 1);
			var currentOffset = _date.getTimezoneOffset();
			var tOffset = -120 * 60;
			if (_subtractMonth) {
				if (((parseInt(dateParts[1]) > 2) || (parseInt(dateParts[1]) == 2 && parseInt(dateParts[0]) >= 25)) && (parseInt(dateParts[1]) < 10 || (parseInt(dateParts[1]) == 9 && parseInt(dateParts[0]) <= 28))) {
					applyDST = true;
				}
			} else {
				if (((parseInt(dateParts[1]) > 3) || (parseInt(dateParts[1]) == 3 && parseInt(dateParts[0]) >= 25)) && (parseInt(dateParts[1]) < 11 || (parseInt(dateParts[1]) == 10 && parseInt(dateParts[0]) <= 28))) {
					applyDST = true;
				}
			}
			if (currentOffset != jan.getTimezoneOffset()) {
				if (applyDST) {
					if (currentOffset < 0) {
						tOffset = tOffset - (60 * 60);
					} else {
						tOffset = tOffset - (60 * 60);
					}
				}
			} else if (currentOffset != jul.getTimezoneOffset()) {}
			else {
				if (applyDST) {
					if (currentOffset < 0) {
						tOffset = tOffset + (60 * 60);
					} else {
						tOffset = tOffset - (60 * 60);
					}
				}
			}
			currentOffset = -1 * (currentOffset * 60);
			_dateMS = parseInt((_date.getTime() / 1000) + tOffset + currentOffset);
			return _dateMS;
		},
		createPostVariables: function(object,boundary){
			var postURL = new Array();
			if(boundary!=false){
				for(var attr in object) {
					if(object[attr].type=="string"){
						postURL.push("\r\nContent-Disposition: form-data; name='"+attr+"'\r\n\r\n"+object[attr].value+"\r\n");
					}else if(object[attr].type=="file"){
						postURL.push("\r\nContent-Disposition: form-data; name='"+attr+"'; filename='"+object[attr].value.name+"'\r\nContent-Type: "+object[attr].value.type+"\r\n\r\n"+object[attr].data+"\r\n");
					}else{
						console.log("Not Implemented!");
					}
				}
				postURL = "--"+boundary+postURL.join("--"+boundary)+"--"+boundary+"\r\n";
			}else{
				for(var attr in object) {
					postURL.push(attr+"="+encodeURIComponent(object[attr]));
			    }
				boundary = "&";
				postURL = postURL.join(boundary);
			}

			return postURL;
		
		},
		getElementFromNodeTree: function (expression,init,getAll){
			var expressions = expression.split(" ");
			if(expressions.length>0){
				_expression = expressions[0].trim();
				if(_expression.charAt(0)=="#"){
					_expression = expressions[0].substr(1,expressions[0].length-1);
					
					if(init.body!=undefined){
						element = init.getElementById(_expression);
					}else{
						element = this.walkNodeTree(_expression,init);
					}
					expressions.splice(0,1);
					if(expressions.length!=0 && element!=null){
						return this.getElementFromNodeTree(expressions.join(" "),element,getAll);
					}else{
						return element;
					}
				}else if(_expression.charAt(0)=="."){
					_expression = expressions[0].substr(1,expressions[0].length-1);
					var elements = init.getElementsByClassName(_expression);
					expressions.splice(0,1);
					if(expressions.length!=0){
						var values = new Array();
						for(var j=0;j< elements.length;j++){
							var _elements = this.getElementFromNodeTree(expressions.join(" "),elements[j],getAll);
							if(_elements!=undefined){
								if(_elements.length!=undefined){
									for(var k=0;k<_elements.length;k++){
										values.push(_elements[k]);
									}
								}else{
									values.push(_elements);
								}
							}
						}
						if(getAll){
							return values;
						}
						return values[0];
					}else{
						if(getAll){
							return elements;
						}
						return elements[0];
					}
				}else{
					_elementTypes = new Array();
					if(_expression.indexOf("[type=")!=-1){
						_expression = _expression.split("[");
						_elementTypes = _expression[1];
						_elementTypes = _elementTypes.split("]");
						_elementTypes = _elementTypes[0];
						_elementTypes = _elementTypes.split("=");
						_expression = _expression[0];
					}else if(_expression.indexOf("[name=")!=-1){
						_expression = _expression.split("[");
						_elementTypes = _expression[1];
						_elementTypes = _elementTypes.split("]");
						_elementTypes = _elementTypes[0];
						_elementTypes = _elementTypes.split("=");
						_expression = _elementTypes[1];
						
						var _elements =  document.getElementsByName(_expression);
					}
					var elements = init.getElementsByTagName(_expression);
					expressions.splice(0,1);
					if(expressions.length!=0){
						for(var j=0;j< elements.length;j++){
							if(_elementTypes.length==0){
								return this.getElementFromNodeTree(expressions.join(" "),elements[j],getAll);
							}else{
								var _elements = this.getElementFromNodeTree(expressions.join(" "),elements[j],getAll);
								var result = new Array();
								
								for(var j=0;j<_elements.length;j++){
									if(_elements[j][_elementTypes[0]]==_elementTypes[1].replace(/'/gi,"")){
										result.push(_elements[j]);
									}
								}
								
								return result;
							}
						}
					}else{
						if(getAll){
							if(_elementTypes.length==0){
								return elements;
							}else{
								var result = new Array();
								for(var j=0;j<elements.length;j++){
									if(elements[j][_elementTypes[0]]==_elementTypes[1].replace(/'/gi,"")){
										result.push(elements[j]);
									}
								}
								return result;
							}
						}
						
						if(_elementTypes.length==0){
							return elements[0];
						}else{
							if(elements[0][_elementTypes[0]]==_elementTypes[1].replace(/'/gi,"")){
								return elements[0];
							}
						}
					}
				}
			}

		},
		walkNodeTree: function(expression,init){
			var retVal = undefined;
			var nodeChildren = init.children;
			for(var p=0;p<nodeChildren.length;p++){
				if(nodeChildren[p].id==_expression){
					return nodeChildren[p];
				}else{
					if(nodeChildren[p].children.length!=0){
						retVal = this.walkNodeTree(_expression,nodeChildren[p]);
						if(retVal!=undefined){
							return retVal;
						}
					}
				}
				
			}
			return retVal;
		},
		createObjectFromForm: function(form){
			var object = {};
			var submitForm = document.getElementById(form);
			if(submitForm!=undefined){
				var formElements = submitForm.querySelectorAll("._formUpdate");
				if(formElements!=undefined){
					for(var f=0;f<formElements.length;f++){
						var nodeName = formElements[f].nodeName.toLowerCase();
						var inputType = undefined;
						if(formElements[f].hasAttribute("type")){
							inputType = formElements[f].getAttribute("type").toLowerCase();
						}
						
						var value = "";
						switch(nodeName){
							case "input":
								switch(inputType){
									case "text":
										value = formElements[f].value;
									break;
									case "hidden":
										value = formElements[f].value;
									break;
									case "date":
										value = formElements[f].value;
									break;
									case "checkbox":
										value = 0;
										if(formElements[f].checked){
											value = 1;
										}
									break;
									case "radio":
										var _items = submitForm.querySelectorAll("[name="+formElements[f].name+"]");
										value = "";
										for(var r=0;r<_items.length;r++){
											if(_items[r].checked){
												value = _items[r].value;
											}
										}
									break;
								}
							break;
							case "select":
								if(formElements[f].multiple){
									value = [];
									for(var s=0;s<formElements[f].options.length;s++){
										if(formElements[f].options[s].selected){
											value.push(formElements[f].options[s].value);
										}
									}
								}else{
									if(formElements[f].options[formElements[f].selectedIndex]!=undefined){
										value = formElements[f].options[formElements[f].selectedIndex].value;
									}
								}
							break;
							case "textarea":
								value = formElements[f].value;
								if(value==""){
									value = formElements[f].innerHTML;
								}
							break;
						}
						object[formElements[f].getAttribute("name")] = value;
					}
				}
			}

			return object;
		},
		checkElement: function(_element){
			if(_element==undefined){
				return false;					   
			}
			if(_element==null){
				return false;							
			}
			
			return true;								
		},
		getParameters: function(){
			var _params = location.search.substr(1).split("&");
			var params = {};
			for(var j=0;j<_params.length;j++){
				var param = _params[j].split("=");
				params[param[0]] = param[1];
			}
			
			return params;
		},
		sortItemsForMethod: function(items,method,mode,type){
			for(var i=0;i<items.length;i++){
				for(var j=0;j<items.length-i-1;j++){
					var swap = false;
					if(method instanceof Array){
						var ivlaue = items[j][method[0]];
						for(var m=1;m<method.length;m++){
							ivlaue = ivlaue[method[m]];
						}
						var jvlaue = items[j+1][method[0]];
						for(var m=1;m<method.length;m++){
							jvlaue = jvlaue[method[m]];
						}
					}else{
						var ivlaue = items[j][method];
						var jvlaue = items[j+1][method];
					}
					if(type=="decimal"){
						if(this.convertToDecimal(jvlaue,".")<this.convertToDecimal(ivlaue,".")){
							swap = true;
						}
					}
					if(swap){
						temp = items[j];
						items[j] = items[j+1];
						items[j+1] = temp;
					}
				}
			}
			
			if(mode=="DESC"){
				items = items.reverse();
			}

			return items;
		},
		convertToDecimal: function(value,symbol){
			if(symbol=="."){
				value = parseFloat(value.replace(",",symbol)); 
			}
			if(symbol==","){
				value = value.replace(".",symbol); 
			}
			
			return value;
		},
		setOptionForValue: function(s_element,value){
			for(var s=0;s<s_element.options.length;s++){
				if(s_element.options[s].value==value){
					s_element.selectedIndex = s;
					return true;
				}
			}
			
			return false;
		},
	};
	return rbe_engine;
}
