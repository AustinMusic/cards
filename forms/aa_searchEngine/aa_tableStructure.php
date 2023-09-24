<?php
class aa_tableStructure{
	public $table;
	public $tableName;
	public $fields;

	public function getTable(){
		if(!isset($this->table)){
			return "";
		}
		
		return $this->table;
	}
	
	public function setTable($table){
		$this->table = $table;
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
	
	public function getFields(){
		if(!isset($this->fields)){
			return array();
		}
		
		return $this->fields;
	}
	
	public function setFields($fields){
		$this->fields = $fields;
	}

		
	public function addField($field){
		$this->fields[] = $field;
	}
	
	function __construct() {}
	function __destruct() {}
}