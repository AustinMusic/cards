<?php
class appraiser
{
    public $id;
    public $username;
    public $password;
    public $isLockedOut;
    public $isAdmin;
    public $isPowerUser;
    public $IsAppraiser;
    public $isReadOnly;
    public $isAppAsst;
    public $salutation;
    public $apptitle;
    public $firstname;
    public $midname;
    public $lastname;
    public $designation;
    public $phoneone;
    public $phonetwo;
    public $emailaddress;
    public $licensenoone;
    public $licenseexpone;
    public $licensestateone;
    public $licenseimageone;
    public $lic1;
    public $licensenotwo;
    public $licensestatetwo;
    public $licenseexptwo;
    public $licenseimagetwo;
    public $lic2;
    public $qualifications;
    public $qualdoc;
    public $digsignature;
    public $dig1;
    
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
	
	public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getIsLockedOut()
    {
        if(!isset($this->isLockedOut)){
            return 0;
        }
        return intval($this->isLockedOut);
    }

    public function setIsLockedOut($isLockedOut)
    {
        $this->isLockedOut = $isLockedOut;
    }

    public function getIsAdmin()
    {
        if(!isset($this->isAdmin)){
            return 0;
        }
        return intval($this->isAdmin);
    }

    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }
    public function getIsPowerUser()
    {
        if(!isset($this->isPowerUser)){
            return 0;
        }
        return intval($this->isPowerUser);
    }

    public function setIsPowerUser($isPowerUser)
    {
        $this->isPowerUser = $isPowerUser;
    }

    public function getIsAppraiser()
    {
        if(!isset($this->IsAppraiser)){
            return 0;
        }
        return intval($this->IsAppraiser);
    }

    public function setIsAppraiser($IsAppraiser)
    {
        $this->IsAppraiser = $IsAppraiser;
    }

    public function getIsReadOnly()
    {
        if(!isset($this->IsReadOnly)){
            return 0;
        }
        return intval($this->IsReadOnly);
    }

    public function setIsReadOnly($IsReadOnly)
    {
        $this->IsReadOnly = $IsReadOnly;
    }
	
    public function getIsAppAsst()
    {
        if(!isset($this->IsAppAsst)){
            return 0;
        }
        return intval($this->IsAppAsst);
    }

    public function setIsAppAsst($IsAppAsst)
    {
        $this->IsAppAsst = $IsAppAsst;
    }

    public function getSalutation()
    {
        return $this->salutation;
    }

    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
    }

    public function getApptitle()
    {
        return $this->apptitle;
    }

    public function setApptitle($apptitle)
    {
        $this->apptitle = $apptitle;
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

    public function getDesignation()
    {
        return $this->designation;
    }

    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

    public function getPhoneone()
    {
        return $this->phoneone;
    }

    public function setPhoneone($phoneone)
    {
        $this->phoneone = $phoneone;
    }

    public function getPhonetwo()
    {
        return $this->phonetwo;
    }

    public function setPhonetwo($phonetwo)
    {
        $this->phonetwo = $phonetwo;
    }

    public function getEmailaddress()
    {
        return $this->emailaddress;
    }

    public function setEmailaddress($emailaddress)
    {
        $this->emailaddress = $emailaddress;
    }

    public function getLicensenoone()
    {
        return $this->licensenoone;
    }

    public function setLicensenoone($licensenoone)
    {
        $this->licensenoone = $licensenoone;
    }

    public function getLicenseexpone()
    {
        return $this->licenseexpone;
    }

    public function setLicenseexpone($licenseexpone)
    {
        $this->licenseexpone = $licenseexpone;
    }

    public function getLicensestateone()
    {
        return $this->licensestateone;
    }

    public function setLicensestateone($licensestateone)
    {
        $this->licensestateone = $licensestateone;
    }

    public function getLicensenotwo()
    {
        return $this->licensenotwo;
    }

    public function setLicensenotwo($licensenotwo)
    {
        $this->licensenotwo = $licensenotwo;
    }

    public function getLicensestatetwo()
    {
        return $this->licensestatetwo;
    }

    public function setLicensestatetwo($licensestatetwo)
    {
        $this->licensestatetwo = $licensestatetwo;
    }

    public function getLicenseexptwo()
    {
        return $this->licenseexptwo;
    }

    public function setLicenseexptwo($licenseexptwo)
    {
        $this->licenseexptwo = $licenseexptwo;
    }

    public function getQualifications()
    {
        return $this->qualifications;
    }

    public function setQualifications($qualifications)
    {
        $this->qualifications = $qualifications;
    }

    public function getLicenseimageone()
    {
        return $this->licenseimageone;
    }

    public function setLicenseimageone($licenseimageone)
    {
        $this->licenseimageone = $licenseimageone;
    }

    public function getLic1()
    {
        return $this->lic1;
    }

    public function setLic1($lic1)
    {
        $this->lic1 = $lic1;
    }

    public function getLicenseimagetwo()
    {
        return $this->licenseimagetwo;
    }

    public function setLicenseimagetwo($licenseimagetwo)
    {
        $this->licenseimagetwo = $licenseimagetwo;
    }

    public function getLic2()
    {
        return $this->lic2;
    }

    public function setLic2($lic2)
    {
        $this->lic2 = $lic2;
    }

    public function getQualdoc()
    {
        return $this->qualdoc;
    }

    public function setQualdoc($qualdoc)
    {
        $this->qualdoc = $qualdoc;
    }

    public function getDigsignature()
    {
        return $this->digsignature;
    }

    public function setDigsignature($digsignature)
    {
        $this->digsignature = $digsignature;
    }

    public function getDig1()
    {
        return $this->dig1;
    }

    public function setDig1($dig1)
    {
        $this->dig1 = $dig1;
    }
    
    function __construct(){}

    function __destruct(){}

    }
?>