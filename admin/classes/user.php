<?php
class user
{
    public $id;
    public $firstname;
    public $lastname;
    public $username;
    public $password;
    public $isLockedOut;
    public $isAdmin;
    public $isPowerUser;
    public $email;
    
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

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
    
    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
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
    
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    function __construct(){}

    function __destruct(){}

    }
?>