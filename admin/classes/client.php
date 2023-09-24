<?php
class client
{
    public $id;
    public $compname;
    public $compacro;
    public $address;
    public $city;
    public $county;
    public $state;
    public $zipcode;
    public $businessno;
    public $website;
    public $mailcode;
    public $contacttype;
    public $salutation;
    public $firstname;
    public $midname;
    public $lastname;
    public $clienttitle;
    public $cellphone;
    public $faxno;
    public $email;
    public $designation;
    public $department;
    public $notes;
    
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

    public function getCompname()
    {
        return $this->compname;
    }

    public function setCompname($compname)
    {
        $this->compname = $compname;
    }

    public function getCompacro()
    {
        return $this->compacro;
    }

    public function setCompacro($compacro)
    {
        $this->compacro = $compacro;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }
    
    public function getCounty()
    {
        return $this->county;
    }

    public function setCounty($county)
    {
        $this->county = $county;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    public function getBusinessno()
    {
        return $this->businessno;
    }

    public function setBusinessno($businessno)
    {
        $this->businessno = $businessno;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function setWebsite($website)
    {
        $this->website = $website;
    }

    public function getMailcode()
    {
        return $this->mailcode;
    }

    public function setMailcode($mailcode)
    {
        $this->mailcode = $mailcode;
    }

    public function getContacttype()
    {
        return $this->contacttype;
    }

    public function setContacttype($contacttype)
    {
        $this->contacttype = $contacttype;
    }

    public function getSalutation()
    {
        return $this->salutation;
    }

    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getMidname()
    {
        return $this->midname;
    }

    public function setMidname($midname)
    {
        $this->midname = $midname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getClienttitle()
    {
        return $this->clienttitle;
    }

    public function setClienttitle($clienttitle)
    {
        $this->clienttitle = $clienttitle;
    }

    public function getCellphone()
    {
        return $this->cellphone;
    }

    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;
    }

    public function getFaxno()
    {
        return $this->faxno;
    }

    public function setFaxno($faxno)
    {
        $this->faxno = $faxno;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDesignation()
    {
        return $this->designation;
    }

    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function setDepartment($department)
    {
        $this->department = $department;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function setNotes($notes)
    {
        $this->notes = $notes;
    }
    
    function __construct(){}

    function __destruct(){}

    }
?>