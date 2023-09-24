<?php
class mfvalue
{
	public $mfnounits;
    public $mfsize;
	public $mftotalsf;
	public $mfrent;
	public $mfrentsf;
	public $id;
	public $mfnobr;
    
	public function getMfnobr ()
    {
        if(!isset($this->id)){
            return 0;
        }
        return $this->mfnobr;
    }

    public function setMfnobr($mfnobr)
    {
        $this->mfnobr = $mfnobr;
    }
    
	
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
    
    public function getMfnounits()
    {
        return $this->mfnounits;
    }

    public function setMfnounits($mfnounits)
    {
        $this->mfnounits = $mfnounits;
    }

   public function getMfsize()
    {
        return $this->mfsize;
    }

    public function setMfsize($mfsize)
    {
        $this->mfsize = $mfsize;
    }
    
    public function getMftotalsf()
    {
        return $this->mftotalsf;
    }

    public function setMftotalsf($mftotalsf)
    {
        $this->mftotalsf = $mftotalsf;
    }
    
    public function getMfrent()
    {
        return $this->mfrent;
    }

    public function setMfrent($mfrent)
    {
        $this->mfrent = $mfrent;
    }
    
    public function getMfrentsf()
    {
        return $this->mfrentsf;
    }

    public function setMfrentsf($mfrentsf)
    {
        $this->mfrentsf = $mfrentsf;
    }
    
    function __construct(){}

    function __destruct(){}
}

?>