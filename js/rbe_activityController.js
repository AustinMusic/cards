/*DIMITRIS 20180215
This object can be used to check / refresh and inclaidate the php session
*/
var _rbe_activityController = function(options){
	var _rbe_activityController;
	var rbe_engine = new _rbe_engine();
	_rbe_activityController = {
		options:{
			activeObject: "",
			cycleTime: 3000, /*the loop time that the interval run*/
			invalidateTime: 0,/*the time that the script will invalidate*/
			refreshTime: 0,/*the time that the script will update session time*/
			ajaxURL: "",
			redirectURL: "",
			dev: false,
			sendParameters:{},
			exitAfterInvalidation: true,
			translations: []
		},
		data:{
			execID: 0,
			currentTime: 0,
			startTime: 0,
			startTotalTime: 0
		},
		setOptions: function(options){
		    for(var attr in options) {
		        if(this.options.hasOwnProperty(attr)){
		        	this.options[attr] = options[attr];
		        }
		    }
		},
		init: function(){
			var _element = document.getElementById("dialogueInactivityLogin");
			if(_element==null || _element==undefined){
				var _element = document.createElement("div"); 
				_element.setAttribute("id","dialogueInactivityLogin"); 
				document.getElementsByTagName('body')[0].appendChild(_element);
				
				$("#dialogueInactivityLogin").dialog({
					 autoOpen:false,
					 height:200,
					 width:600,
					 modal:true,
					 title: this.options.translations["error"],
					 buttons: [
								{
									text: this.options.translations["OK"],
									click: function() {
										window.location = "http://www.aavaluation.com/cards/index.php";
										$(this).dialog("close");
									}
								}
							]
				});
			}
			
			this.data.startTime = rbe_engine.fromFullDateToUnixTimeStamp(rbe_engine.getCurrentDateTime("/"),true);
			this.data.startTotalTime = this.data.startTime;
			this.data.execID = setInterval(this.options.activeObject+".execCheck("+this.options.activeObject+");",this.options.cycleTime);
		},
		execCheck: function(_controller){
			_controller.data.currentTime = rbe_engine.fromFullDateToUnixTimeStamp(rbe_engine.getCurrentDateTime("/"),true);
			console.log("invalidateTime="+this.options.invalidateTime);
			console.log("startTime="+this.data.startTotalTime);
			console.log("endTime="+(this.data.startTotalTime+this.options.invalidateTime));
			console.log("dif="+(_controller.data.currentTime-_controller.data.startTime));
			if(_controller.options.invalidateTime>0){
				if((_controller.data.currentTime-_controller.data.startTime)>_controller.options.invalidateTime  || (_controller.data.currentTime-_controller.data.startTotalTime)>_controller.options.invalidateTime){
					_controller.invalidateSession();
					if(!_controller.options.exitAfterInvalidation){
						_controller.refreshSession();
					}else{
						clearInterval(_controller.data.execID);
					}
					return false;
				}
			
			}
			
			if((_controller.data.currentTime-_controller.data.startTime)>_controller.options.refreshTime){
				_controller.refreshSession();
				return false;
			}
			
			return true;
		},
		refreshSession: function(){
			var xhttp = new XMLHttpRequest();
			this.options.sendParameters.action = "refresh";
			xhttp.open("GET",this.options.ajaxURL+"?"+rbe_engine.createPostVariables(this.options.sendParameters,false),true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
			var _controller = this;
			xhttp.onreadystatechange = function() {
				if(xhttp.readyState==0){
				}else if(xhttp.readyState==1){
				}else if(xhttp.readyState==2){
				}else if(xhttp.readyState==3){
				}else if(xhttp.readyState==4){
				}
				
				if(xhttp.readyState==4){
					if(xhttp.status==200) {
						var _value = xhttp.responseText;
						_controller.data.startTime = rbe_engine.fromFullDateToUnixTimeStamp(rbe_engine.getCurrentDateTime("/"),true);
						return true;
					}else{
						return false;
					}
				}
				
			};

			xhttp.send();
		},
		invalidateSession: function(){
			var xhttp = new XMLHttpRequest();
			this.options.sendParameters.action = "invalidate";
			xhttp.open("GET",this.options.ajaxURL+"?"+rbe_engine.createPostVariables(this.options.sendParameters,false),true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
			var _controller = this;
			xhttp.onreadystatechange = function(){
				if(xhttp.readyState==0){	
				}else if(xhttp.readyState==1){
				}else if(xhttp.readyState==2){
				}else if(xhttp.readyState==3){
				}else if(xhttp.readyState==4){
				}
				if(xhttp.readyState==4){
					if(xhttp.status==200) {
						_controller.showErrorMessage(_controller.options.translations["invalidateText"]);
						return true;
					}else{
						return false;
					}
				}
				
			};

			xhttp.send();
			
		},
		showErrorMessage: function(message){
			var _element = document.getElementById("dialogueInactivityLogin");
			console.log(_element);
			if(_element!=undefined){
				_element.innerHTML = "<p>"+message+"</p>";
				 $("#dialogueInactivityLogin").dialog("open");
			}
		}
	};
	
	_rbe_activityController.setOptions(options);

	return _rbe_activityController;
}

