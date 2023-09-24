<?php
class dataSourceControler{
    public $db;

    public function getStatusDataSource(){
        $qry = "select id, status from WFStatus order by id ASC";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }
    
    
    public function getPriorityDataSource(){
        $qry = "select id, priority from WFPriority order by id ASC";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }
    
    public function getUsersDataSource(){
        $qry = "select id, firstname, lastname from appraisers where isLockedOut = 0 order by id ASC";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }
    
    public function getAppDataSource(){
        $qry = "select id, firstname, lastname, isLockedOut, IsAppraiser, IsAppAsst from appraisers order by id ASC";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }
    
    public function getFormerUsersDataSource(){
        $qry = "select id, firstname, lastname from appraisers where id > 1 order by id ASC";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }
    
    public function getTemplateDataSource($category,$tformat){
        $qry = "select id, templatename, templatepath from templates where tformat = ".$tformat." and category = '".$category."' order by templatename";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }

    public function getPropertyTypeDataSource($reportType,$rid,$propertyTypeIds){
        $qry = "select id, propertytype FROM propertytype WHERE rid".$reportType." = ".$rid." OR id IN (".implode(",",$propertyTypeIds).") order by propertytype";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }

    public function getSubtypeDataSource($rid,$operator=false){
        if(!$operator){
            $operator = "=";
        }
        $qry = "select id, subtype, ptid from subtype where id = 1 OR rid ".$operator." ".$rid." order by id ASC";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getGenMarketDataSource(){
        $qry = "select id, genmarket, state from genmarket order by id ASC";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }
    
    public function getSubmarketDataSource(){
        $qry = "select id, submarket, gmid from submarket order by id ASC";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }

    public function getWFDictionaryDataSource($category,$id=false,$order=false){
        if($order==false){
            $order = "ASC";
        }
        if(!$id){
            $qry = "select id, definition from WFDictionary where category = '".$category."'order by id ".$order;
        }else{
            $qry = "select id, definition from WFDictionary where category = '".$category."' or id = ".$id." order by id ".$order;
        }
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }

    public function getEditDDDataSource($category,$id=false,$order=false){
        if($order==false){
            $order = "ASC";
        }
        if(!$id){
            $qry = "select id, definition from editdrops where category = '".$category."'order by id ".$order;
        }else{
            $qry = "select id, definition from editdrops where category = '".$category."' or id = ".$id." order by id ".$order;
        }
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }
   
    public function getSubmarketAreaDataSource(){
        $qry = "select id, submarket,gmid  from submarket order by id ASC";
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }
    
	public function getAppraiserDataSource(){
        $qry = "select id, firstname,lastname,inactive  from appraisers order by id ASC";//where inactive = 0 
        $stmt = $this->db->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
    }
}