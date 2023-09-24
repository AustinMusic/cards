<?php

class unitmix
{
    public $id;
    public $no_units;
    public $no_these_units;
    public $pct_total_units;
    public $unit_size;
    public $no_bedrooms;
    public $no_bathrooms;
    public $unit_desc;
    
    public function getId()
    {
        if(!isset($this->id)){
            return 0;
        }
        return intval($this->id);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNo_units()
    {
        if(!isset($this->no_units)){
            return 0;
        }
            return intval($this->no_units);
    }

    public function setNo_units($no_units)
    {
        $this->no_units = $no_units;
    }

    public function getNo_these_units()
    {
        if(!isset($this->no_these_units)){
            return 0;
        }
        return intval($this->no_these_units);
    }

    public function setNo_these_units($no_these_units)
    {
        $this->no_these_units = $no_these_units;
    }

    public function getPct_total_units()
    {
        if(!isset($this->pct_total_units)){
            return 0;
        }
        return floatval($this->pct_total_units);
    }

    public function setPct_total_units($pct_total_units)
    {
        $this->pct_total_units = $pct_total_units;
    }

    public function getUnit_size()
    {
        if(!isset($this->unit_size)){
            return 0;
        }
        return intval($this->unit_size);
    }

    public function setUnit_size($unit_size)
    {
        $this->unit_size = $unit_size;
    }

    public function getNo_bedrooms()
    {
        if(!isset($this->no_bedrooms)){
            return 0;
        }
        return intval($this->no_bedrooms);
    }

    public function setNo_bedrooms($no_bedrooms)
    {
        $this->no_bedrooms = $no_bedrooms;
    }

    public function getNo_bathrooms()
    {
        if(!isset($this->no_bathrooms)){
            return 0.0;
        }
        return floatval($this->no_bathrooms);
    }

    public function setNo_bathrooms($no_bathrooms)
    {
        $this->no_bathrooms = $no_bathrooms;
    }

    public function getUnit_desc()
    {
        return $this->unit_desc;
    }

    public function setUnit_desc($unit_desc)
    {
        $this->unit_desc = $unit_desc;
    }

    function __construct(){}

    function __destruct(){}
}

?>