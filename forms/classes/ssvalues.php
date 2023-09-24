<?php
class ssvalue
{
	public $sssize;
	public $ssunittype;
	public $ssunitsf;
	public $ssrentmo;
	public $ssrentsf;
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

   public function getSssize()
    {
        return $this->sssize;
    }

    public function setSssize($sssize)
    {
        $this->sssize = $sssize;
    }
    
    public function getSsunittype()
    {
        return $this->ssunittype;
    }

    public function setSsunittype($ssunittype)
    {
        $this->ssunittype = $ssunittype;
    }
    
    public function getSsunitsf()
    {
        return $this->ssunitsf;
    }

    public function setSsunitsf($ssunitsf)
    {
        $this->ssunitsf = $ssunitsf;
    }
    
    public function getSsrentmo()
    {
        return $this->ssrentmo;
    }

    public function setSsrentmo($ssrentmo)
    {
        $this->ssrentmo = $ssrentmo;
    }
    
    public function getSsrentsf()
    {
        return $this->ssrentsf;
    }

    public function setSsrentsf($ssrentsf)
    {
        $this->ssrentsf = $ssrentsf;
    }
    
    function __construct(){}

    function __destruct(){}
}

?>