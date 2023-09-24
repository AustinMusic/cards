<?php
class unitmixDBController{
    public $db;
    
    public function getTableRecord($id){

        $sql_fields[] = UNITMIX_TABLE.".id";
        $sql_fields[] = "FORMAT(".UNITMIX_TABLE.".no_units, 0) as no_units";        
        $sql_fields[] = UNITMIX_TABLE.".no_these_units";
        $sql_fields[] = UNITMIX_TABLE.".pct_total_units";
        $sql_fields[] = "CONCAT(FORMAT(".UNITMIX_TABLE.".unit_size,0),' SF') as unit_size";
        $sql_fields[] = UNITMIX_TABLE.".no_bedrooms";
        $sql_fields[] = UNITMIX_TABLE.".no_bathrooms";
        $sql_fields[] = UNITMIX_TABLE.".unit_desc";

        
        $tables_sql[] = UNITMIX_TABLE;
         
        $search_sql[] = UNITMIX_TABLE.".id=:id";
        
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
        $orderBy_stmt = "ORDER BY ".UNITMIX_TABLE.".id DESC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }
    
    public function getRecord($id){
        
        
        $sql_fields[] = UNITMIX_TABLE.".id";
        $sql_fields[] = UNITMIX_TABLE.".no_units";        
        $sql_fields[] = UNITMIX_TABLE.".no_these_units";
        $sql_fields[] = UNITMIX_TABLE.".pct_total_units";
        $sql_fields[] = UNITMIX_TABLE.".unit_size";
        $sql_fields[] = UNITMIX_TABLE.".no_bedrooms";
        $sql_fields[] = UNITMIX_TABLE.".no_bathrooms";
        $sql_fields[] = UNITMIX_TABLE.".unit_desc";    
        
            
        $tables_sql[] = UNITMIX_TABLE;
        
        $search_sql[] = UNITMIX_TABLE.".id=:id";

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
        $orderBy_stmt = "ORDER BY ".UNITMIX_TABLE.".id DESC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }
    
    public function unitmxOperation($unitmix,$user_id){
        $actionMode = "INSERT";
        if(isset($_GET['id'])){
            $actionMode = "UPDATE";
		}
        try{
            $this->db->beginTransaction();
            
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".UNITMIX_TABLE." (no_units, no_these_units, pct_total_units, unit_size, no_bedrooms, no_bathrooms, unit_desc)
    				VALUES  (:no_units, :no_these_units, :pct_total_units, :unit_size, :no_bedrooms, :no_bathrooms, :unit_desc)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".UNITMIX_TABLE." SET no_units=:no_units, no_these_units=:no_these_units, pct_total_units=:pct_total_units, unit_size=:unit_size, no_bedrooms=:no_bedrooms, no_bathrooms=:no_bathrooms,
                    unit_desc=:unit_desc
    				WHERE ".UNITMIX_TABLE.".id=:id");
				$stmt->bindValue(':id',$unitmix->getId(),PDO::PARAM_INT);
            }
        
            /*Common bindings*/
            $stmt->bindValue(':no_units',$unitmix->getNo_units(),PDO::PARAM_INT);
            $stmt->bindValue(':no_these_units',$unitmix->getNo_these_units(),PDO::PARAM_INT);
            $stmt->bindValue(':pct_total_units',$unitmix->getPct_total_units(),PDO::PARAM_STR);
            $stmt->bindValue(':unit_size',$unitmix->getUnit_size(),PDO::PARAM_STR);
            $stmt->bindValue(':no_bedrooms',$unitmix->getNo_bedrooms(),PDO::PARAM_STR);
            $stmt->bindValue(':no_bathrooms',$unitmix->getNo_bathrooms(),PDO::PARAM_STR);
            $stmt->bindValue(':unit_desc',$unitmix->getUnit_desc(),PDO::PARAM_STR);
            
        
            $stmt->execute();
        
            if($actionMode=="INSERT"){
                $unitmix->setId($this->db->lastInsertId());
            }        

            $this->db->commit();
        }catch (PDOException $e) {
            print_r($e);
            $this->db->rollBack(); //cancel db changes if something goes wrong
           // return $unitmix;
            die();
        }
        
        return $unitmix;
    }
}
?>