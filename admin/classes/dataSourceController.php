<?php
class dataSourceControler{
    public $db;

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
    

}