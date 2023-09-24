<?php
class aa_fieldDataSourceStructure{
	public $tableName;
	public $functionName;
	public $connectionField;
	public $value;
	public $text;
	public $searchMethod;
	public $searchOperator;
	public $searchValue;

	public function getSearchValue(){
		if(!isset($this->searchValue)){
			return "";
		}
		
		return $this->searchValue;
	}
	
	public function setSearchValue($searchValue){
		$this->searchValue = $searchValue;
	}
	
	public function getSearchOperator(){
		if(!isset($this->searchOperator)){
			return "";
		}
		
		return $this->searchOperator;
	}
	
	public function setSearchOperator($searchOperator){
		$this->searchOperator = $searchOperator;
	}
	
	public function getSearchMethod(){
		if(!isset($this->searchMethod)){
			return "";
		}
		
		return $this->searchMethod;
	}
	
	public function setSearchMethod($searchMethod){
		$this->searchMethod = $searchMethod;
	}
	public function getTableName(){
		if(!isset($this->tableName)){
			return "";
		}
		return $this->tableName;
	}
	
	public function setTableName($tableName){
		$this->tableName = $tableName;
	}
	
	public function getFunctionName(){
		if(!isset($this->functionName)){
			return "";
		}
		return $this->functionName;
	}
	
	public function setFunctionName($functionName){
		$this->functionName = $functionName;
	}
	
	public function getConnectionField(){
		if(!isset($this->connectionField)){
			return "";
		}
		return $this->connectionField;
	}
	
	public function setConnectionField($connectionField){
		$this->connectionField = $connectionField;
	}
	
	public function getValue(){
		if(!isset($this->value)){
			return "";
		}
		return $this->value;
	}
	
	public function setValue($value){
		$this->value = $value;
	}
	
	public function getText(){
		if(!isset($this->text)){
			return "";
		}
		return $this->text;
	}
	
	public function setText($text){
		$this->text = $text;
	}
	
	function __construct() {}
	function __destruct() {}
}

?>