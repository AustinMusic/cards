var _issuesController = function(options){
	var _issuesController;
	var rbe_engine = new _rbe_engine();
	_issuesController = {
		options:{
			activeObject: "",
			id: "",
			issuesData: ""
		},
		data:{
		},
		setOptions: function(options){
		    for(var attr in options) {
		        if(this.options.hasOwnProperty(attr)){
		        	this.options[attr] = options[attr];
		        }
		    }
		},
		init: function(){
			this.assignEvents();
		},
		assignEvents: function(){
		    
		},
        
		showErrorMessage: function(message){
			
		}
	};
	
	_issuesController.setOptions(options);

	return _issuesController;
}

