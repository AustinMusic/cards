<?php
class issues
{
    public $id;
    public $type;
    public $status;
    public $priority;
    public $issuesURL;
    public $short;
    public $description;
    public $reproduction;
    public $updates;
    public $CreatedBy;
    public $ModifiedBy;
    public $DateCreated;
    public $DateModified;
    
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

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
    
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
    
    public function getPriority()
    {
        return $this->priority;
    }

    public function setPriority($priority)
    {
        $this->priority = $priority;
    }
    
    public function getIssuesURL()
    {
        return $this->issuesURL;
    }

    public function setIssuesURL($issuesURL)
    {
        $this->issuesURL = $issuesURL;
    }
    
    public function getShort()
    {
        return $this->short;
    }

    public function setShort($short)
    {
        $this->short = $short;
    }
    
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function getReproduction()
    {
        return $this->reproduction;
    }

    public function setReproduction($reproduction)
    {
        $this->reproduction = $reproduction;
    }
    
    public function getUpdates()
    {
        return $this->updates;
    }

    public function setUpdates($updates)
    {
        $this->updates = $updates;
    }
    
    public function getCreatedBy()
    {
        return $this->CreatedBy;
    }

    public function setCreatedBy($CreatedBy)
    {
        $this->CreatedBy = $CreatedBy;
    }
    
    public function getModifiedBy()
    {
        return $this->ModifiedBy;
    }

    public function setModifiedBy($ModifiedBy)
    {
        $this->ModifiedBy = $ModifiedBy;
    }
    
    public function getDateCreated()
    {
        return $this->DateCreated;
    }

    public function setDateCreated($DateCreated)
    {
        $this->DateCreated = $DateCreated;
    }
    
    public function getDateModified()
    {
        return $this->DateModified;
    }

    public function setDateModified($DateModified)
    {
        $this->DateModified = $DateModified;
    }

    function __construct(){}

    function __destruct(){}

    }
?>