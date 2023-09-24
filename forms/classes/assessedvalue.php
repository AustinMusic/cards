<?php
class assessedvalue
{
	public $mappage;
	public $taxlot;
	public $parcelno;
	public $assessedglasf;
	public $marketland;
	public $marketimp;
	public $markettotal;
	public $measure50;
	public $annualtaxes;
	public $id;
    
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

   public function getMappage()
    {
        return $this->mappage;
    }

    public function setMappage($mappage)
    {
        $this->mappage = $mappage;
    }
    
    public function getTaxlot()
    {
        return $this->taxlot;
    }

    public function setTaxlot($taxlot)
    {
        $this->taxlot = $taxlot;
    }
    
    public function getParcelno()
    {
        return $this->parcelno;
    }

    public function setParcelno($parcelno)
    {
        $this->parcelno = $parcelno;
    }
    
    public function getAssessedglasf()
    {
        return $this->assessedglasf;
    }

    public function setAssessedglasf($assessedglasf)
    {
        $this->assessedglasf = $assessedglasf;
    }
    
    public function getMarketland()
    {
        return $this->marketland;
    }

    public function setMarketland($marketland)
    {
        $this->marketland = $marketland;
    }
    
    public function getMarketimp()
    {
        return $this->marketimp;
    }

    public function setMarketimp($marketimp)
    {
        $this->marketimp = $marketimp;
    }
    
    public function getMarkettotal()
    {
        return $this->markettotal;
    }

    public function setMarkettotal($markettotal)
    {
        $this->markettotal = $markettotal;
    }
    
    public function getMeasure50()
    {
		if(!isset($this->measure50)){
			return 0;
		}
        return $this->measure50;
    }

    public function setMeasure50($measure50)
    {
        $this->measure50 = $measure50;
    }
    
    public function getAnnualtaxes()
    {
        return $this->annualtaxes;
    }

    public function setAnnualtaxes($annualtaxes)
    {
        $this->annualtaxes = $annualtaxes;
    }


    function __construct(){}

    function __destruct(){}
}

?>