<?php
class aa_fieldDataFormat{
	public $prefix;
	public $comma;
	public $decimals;
	public $suffix;

	public function getPrefix(){
		if(!isset($this->prefix)){
			return "";
		}
		
		return $this->prefix;
	}
	
	public function setPrefix($prefix){
		$this->prefix = $prefix;
	}
	
	public function getComma(){
		if(!isset($this->comma)){
			return "";
		}
		
		return $this->comma;
	}
	
	public function setComma($comma){
		$this->comma = $comma;
	}
	
	public function getDecimals(){
		if(!isset($this->decimals)){
			return "";
		}
		
		return $this->decimals;
	}
	
	public function setDecimals($decimals){
		$this->decimals = $decimals;
	}
	
	public function getSuffix(){
		if(!isset($this->suffix)){
			return "";
		}
		
		return $this->suffix;
	}
	
	public function setSuffix($suffix){
		$this->suffix = $suffix;
	}

	
	function __construct() {}
	function __destruct() {}
}

?>