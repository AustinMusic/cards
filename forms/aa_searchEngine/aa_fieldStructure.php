<?php
class aa_fieldStructure{
	public $field;
	public $fieldName;
	public $dataType;
	public $dataFormat;
	public $dataSource;
	public $visibility;	
		
	public function getVisibility(){
		if(!isset($this->visibility)){
			return 1;
		}
		
		return $this->visibility;
	}
	
	public function setVisibility($visibility){
		$this->visibility = $visibility;
	}
	
	public function getDataFormat(){
		if(!isset($this->dataFormat)){
			return new aa_fieldDataFormat();
		}
		
		return $this->dataFormat;
	}
	
	public function setDataFormat($dataFormat){
		$this->dataFormat = $dataFormat;
	}
	
	public function getField(){
		if(!isset($this->field)){
			return "";
		}
		
		return $this->field;
	}
	
	public function setField($field){
		$this->field = $field;
	}
	
	public function getFieldName(){
		if(!isset($this->fieldName)){
			return "";
		}
		
		return $this->fieldName;
	}
	
	public function setFieldName($fieldName){
		$this->fieldName = $fieldName;
	}
	
	public function getDataType(){
		if(!isset($this->dataType)){
			return "";
		}
		
		return $this->dataType;
	}
	
	public function setDataType($dataType){
		$this->dataType = $dataType;
	}
	
	public function getDataSource(){
		if(!isset($this->dataSource)){
			return new aa_fieldDataSourceStructure();
		}
		
		return $this->dataSource;
	}
	
	public function setDataSource($dataSource){
		$this->dataSource = $dataSource;
	}

	
	function __construct() {}
	function __destruct() {}
}

?>