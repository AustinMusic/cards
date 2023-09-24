<?php
class clientDBController{
    public $db;
    
    public function getTableRecord($id){

        $sql_fields[] = CLIENTS_TABLE.".id";        
		$sql_fields[] = CLIENTS_TABLE.".compname";
        $sql_fields[] = CLIENTS_TABLE.".firstname";
        $sql_fields[] = CLIENTS_TABLE.".lastname";
        $sql_fields[] = CLIENTS_TABLE.".cellphone";
        $sql_fields[] = CLIENTS_TABLE.".email";
        $sql_fields[] = CLIENTS_TABLE.".website";
        
        $tables_sql[] = CLIENTS_TABLE;
                 
        $search_sql[] = CLIENTS_TABLE.".id=:id";
        
        $sql_fields_stmt = "";
        if(count($sql_fields)>0){
            $sql_fields_stmt.= " ".implode(",",$sql_fields)." ";
        }
        
        $tables_sql_stmt =" FROM ".implode(" ",$tables_sql);
        
        $search_sql_stmt = "";
        if(count($search_sql)>0){
            $search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql);
        }
        
        $limit_sql = "";
        $sql_groupby = "";
        $orderBy_stmt = "ORDER BY ".CLIENTS_TABLE.".id DESC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }
    
    public function getRecord($id){
        
        
        $sql_fields[] = CLIENTS_TABLE.".id";
        $sql_fields[] = CLIENTS_TABLE.".compname";
        $sql_fields[] = CLIENTS_TABLE.".compacro";
        $sql_fields[] = CLIENTS_TABLE.".address";
        $sql_fields[] = CLIENTS_TABLE.".city";
        $sql_fields[] = CLIENTS_TABLE.".county";
        $sql_fields[] = CLIENTS_TABLE.".state";
        $sql_fields[] = CLIENTS_TABLE.".zipcode";
        $sql_fields[] = CLIENTS_TABLE.".businessno";
        $sql_fields[] = CLIENTS_TABLE.".website";
        $sql_fields[] = CLIENTS_TABLE.".mailcode";
        $sql_fields[] = CLIENTS_TABLE.".contacttype";
        $sql_fields[] = CLIENTS_TABLE.".salutation";
        $sql_fields[] = CLIENTS_TABLE.".firstname";
        $sql_fields[] = CLIENTS_TABLE.".midname";
        $sql_fields[] = CLIENTS_TABLE.".lastname";
        $sql_fields[] = CLIENTS_TABLE.".clienttitle";
        $sql_fields[] = CLIENTS_TABLE.".cellphone";
        $sql_fields[] = CLIENTS_TABLE.".faxno";
        $sql_fields[] = CLIENTS_TABLE.".email";
        $sql_fields[] = CLIENTS_TABLE.".designation";
        $sql_fields[] = CLIENTS_TABLE.".department";
        $sql_fields[] = CLIENTS_TABLE.".notes";
        
        
        
        $tables_sql[] = CLIENTS_TABLE;
        
        
        $search_sql[] = CLIENTS_TABLE.".id=:id";
        
        $sql_fields_stmt = "";
        if(count($sql_fields)>0){
            $sql_fields_stmt.= " ".implode(",",$sql_fields)." ";
        }
        
        $tables_sql_stmt =" FROM ".implode(" ",$tables_sql);
        
        $search_sql_stmt = "";
        if(count($search_sql)>0){
            $search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql);
        }
        
        $limit_sql = "";
        $sql_groupby = "";
        $orderBy_stmt = "ORDER BY ".CLIENTS_TABLE.".id DESC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        return $rows;
    }
    
    public function clientOperation($client,$user_id){
        $actionMode = "INSERT";
        if(isset($_GET['id'])){
            $actionMode = "UPDATE";
        }
        
        try{
            $this->db->beginTransaction();
        
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".CLIENTS_TABLE." (compname, compacro, address, city, county, state, zipcode, businessno, website, mailcode, contacttype, salutation, firstname, midname, lastname, clienttitle, cellphone, faxno, email, designation, department, notes)
    				VALUES  (:compname, :compacro, :address, :city, :county, :state, :zipcode, :businessno, :website, :mailcode, :contacttype, :salutation, :firstname, :midname, :lastname, :clienttitle, :cellphone, :faxno, :email, :designation, :department, :notes)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".CLIENTS_TABLE." SET compname=:compname, compacro=:compacro, address=:address, city=:city, county=:county, state=:state, zipcode=:zipcode, businessno=:businessno, website=:website, mailcode=:mailcode, contacttype=:contacttype, salutation=:salutation, firstname=:firstname, midname=:midname, lastname=:lastname, clienttitle=:clienttitle, cellphone=:cellphone, faxno=:faxno, email=:email, designation=:designation, department=:department, notes=:notes WHERE ".CLIENTS_TABLE.".id=:id");
        
                $stmt->bindValue(':id',$client->getId(),PDO::PARAM_INT);
            }
        
            /*Common bindings*/
            $stmt->bindValue(':compname',$client->getCompname(),PDO::PARAM_STR);
            $stmt->bindValue(':compacro',$client->getCompacro(),PDO::PARAM_STR);
            $stmt->bindValue(':address',$client->getAddress(),PDO::PARAM_STR);
            $stmt->bindValue(':city',$client->getCity(),PDO::PARAM_STR);
            $stmt->bindValue(':county',$client->getCounty(),PDO::PARAM_STR);
            $stmt->bindValue(':state',$client->getState(),PDO::PARAM_STR);
            $stmt->bindValue(':zipcode',$client->getZipcode(),PDO::PARAM_STR);
            $stmt->bindValue(':businessno',$client->getBusinessno(),PDO::PARAM_STR);
            $stmt->bindValue(':website',$client->getWebsite(),PDO::PARAM_STR);
            $stmt->bindValue(':mailcode',$client->getMailcode(),PDO::PARAM_STR);
            $stmt->bindValue(':contacttype',$client->getContacttype(),PDO::PARAM_STR);
            $stmt->bindValue(':salutation',$client->getSalutation(),PDO::PARAM_STR);
            $stmt->bindValue(':firstname',$client->getFirstname(),PDO::PARAM_STR);
            $stmt->bindValue(':midname',$client->getMidname(),PDO::PARAM_STR);
            $stmt->bindValue(':lastname',$client->getLastname(),PDO::PARAM_STR);
            $stmt->bindValue(':clienttitle',$client->getClienttitle(),PDO::PARAM_STR);
            $stmt->bindValue(':cellphone',$client->getCellphone(),PDO::PARAM_STR);
            $stmt->bindValue(':faxno',$client->getFaxno(),PDO::PARAM_STR);
            $stmt->bindValue(':email',$client->getEmail(),PDO::PARAM_STR);
            $stmt->bindValue(':designation',$client->getDesignation(),PDO::PARAM_STR);
            $stmt->bindValue(':department',$client->getDepartment(),PDO::PARAM_STR);
            $stmt->bindValue(':notes',$client->getNotes(),PDO::PARAM_STR);
        
            $stmt->execute();
        
            if($actionMode=="INSERT"){
                $client->setId($this->db->lastInsertId());
            }
        
            $this->db->commit();
            
        }catch (PDOException $e) {
            print_r($e);
            $this->db->rollBack(); //cancel db changes if something goes wrong
            return $client;
            die();
        }
        
        return $client;
    }
}
?>