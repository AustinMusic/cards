<?php
class appraiserDBController{
    public $db;
    
    public function getTableRecord($id){

        $sql_fields[] = APPRAISER_TABLE.".id";        
		$sql_fields[] = APPRAISER_TABLE.".compname";
        $sql_fields[] = "IF(".APPRAISER_TABLE.".apptitle=3,'',".WFDICTIONARY_TABLE.".definition) AS apptitle";
        $sql_fields[] = APPRAISER_TABLE.".firstname";
        $sql_fields[] = APPRAISER_TABLE.".lastname";
        $sql_fields[] = APPRAISER_TABLE.".designation";
        $sql_fields[] = APPRAISER_TABLE.".emailaddress";
        $sql_fields[] = APPRAISER_TABLE.".phoneone";
        $sql_fields[] = "IF(".APPRAISER_TABLE.".qualifications = '','',CONCAT('../app_images/',".APPRAISER_TABLE.".id,'/',".APPRAISER_TABLE.".qualifications)) as qualifications";
                
        $tables_sql[] = APPRAISER_TABLE;
        
        $tables_sql[] = ' LEFT JOIN '.WFDICTIONARY_TABLE.' ON '.APPRAISER_TABLE.'.apptitle='.WFDICTIONARY_TABLE.'.id';
                 
        $search_sql[] = APPRAISER_TABLE.".id=:id";
        
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
        $orderBy_stmt = "ORDER BY ".APPRAISER_TABLE.".id DESC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }
    
    public function getRecord($id){
        
        
        $sql_fields[] = APPRAISER_TABLE.".id";
		$sql_fields[] = APPRAISER_TABLE.".username";
        $sql_fields[] = APPRAISER_TABLE.".password";
        $sql_fields[] = APPRAISER_TABLE.".isLockedOut";
        $sql_fields[] = APPRAISER_TABLE.".isAdmin";
        $sql_fields[] = APPRAISER_TABLE.".isPowerUser";
        $sql_fields[] = APPRAISER_TABLE.".isReadOnly";
        $sql_fields[] = APPRAISER_TABLE.".IsAppraiser";
        $sql_fields[] = APPRAISER_TABLE.".IsAppAsst";
        $sql_fields[] = APPRAISER_TABLE.".salutation";
        $sql_fields[] = APPRAISER_TABLE.".apptitle";
        $sql_fields[] = APPRAISER_TABLE.".firstname";
        $sql_fields[] = APPRAISER_TABLE.".midname";
        $sql_fields[] = APPRAISER_TABLE.".lastname";
        $sql_fields[] = APPRAISER_TABLE.".designation";
        $sql_fields[] = APPRAISER_TABLE.".phoneone";        
        $sql_fields[] = APPRAISER_TABLE.".phonetwo";
        $sql_fields[] = APPRAISER_TABLE.".emailaddress";
        $sql_fields[] = APPRAISER_TABLE.".licensenoone";
        $sql_fields[] = APPRAISER_TABLE.".licenseexpone";
        $sql_fields[] = APPRAISER_TABLE.".licensestateone";
        $sql_fields[] = APPRAISER_TABLE.".licenseimageone"; 
        $sql_fields[] = "if(".APPRAISER_TABLE.".licenseimageone = '', 'no-photo.jpg', concat(".APPRAISER_TABLE.".id,'/',".APPRAISER_TABLE.".licenseimageone)) as lic1";
        $sql_fields[] = APPRAISER_TABLE.".licensenotwo";
        $sql_fields[] = APPRAISER_TABLE.".licensestatetwo";
        $sql_fields[] = APPRAISER_TABLE.".licenseexptwo";
        $sql_fields[] = APPRAISER_TABLE.".licenseimagetwo";
        $sql_fields[] = "if(".APPRAISER_TABLE.".licenseimagetwo = '', 'no-photo.jpg', concat(".APPRAISER_TABLE.".id,'/',".APPRAISER_TABLE.".licenseimagetwo)) as lic2";
        $sql_fields[] = APPRAISER_TABLE.".qualifications";
        $sql_fields[] = "if(".APPRAISER_TABLE.".qualifications = '','', CONCAT(".APPRAISER_TABLE.".id,'/',".APPRAISER_TABLE.".qualifications)) as qualdoc";
        $sql_fields[] = APPRAISER_TABLE.".digsignature";
        $sql_fields[] = "if(".APPRAISER_TABLE.".digsignature = '','no-photo.jpg', CONCAT(".APPRAISER_TABLE.".id,'/',".APPRAISER_TABLE.".digsignature)) as dig1";
        
        
        
        $tables_sql[] = APPRAISER_TABLE;
        
        
        $search_sql[] = APPRAISER_TABLE.".id=:id";
        
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
        $orderBy_stmt = "ORDER BY ".APPRAISER_TABLE.".id DESC";
        
        
        $sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue("id",$id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        return $rows;
    }
    
    public function appraiserOperation($appraiser){
        $actionMode = "INSERT";
        if(isset($_GET['id'])){
            $actionMode = "UPDATE";
        }
        
        try{
            $this->db->beginTransaction();

            if(empty($_POST['password'])) {
                $pass = $_POST['origpassword'];
            } else {
                $pass = $_POST['password'];                
                $pass = md5($pass);
            }
			$appraiser->setPassword($pass);
        
            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("INSERT INTO ".APPRAISER_TABLE." (username, password, isLockedOut, isAdmin, isPowerUser, isReadOnly, IsAppraiser, IsAppAsst, salutation, apptitle, firstname, midname, lastname, designation, phoneone, phonetwo, emailaddress, licensenoone, licenseexpone, licensestateone, licensenotwo, licensestatetwo, licenseexptwo) VALUES  (:username, :password, :isLockedOut, :isAdmin, :isPowerUser, :isReadOnly, :IsAppraiser, :IsAppAsst, :salutation, :apptitle, :firstname, :midname, :lastname, :designation, :phoneone, :phonetwo, :emailaddress, :licensenoone, :licenseexpone, :licensestateone, :licensenotwo, :licensestatetwo, :licenseexptwo)");
            }else{
                $stmt = $this->db->prepare("UPDATE ".APPRAISER_TABLE." SET username=:username, password=:password, isLockedOut=:isLockedOut, isAdmin=:isAdmin, isPowerUser=:isPowerUser, isReadOnly=:isReadOnly, IsAppraiser=:IsAppraiser, IsAppAsst=:IsAppAsst, salutation=:salutation, apptitle=:apptitle, firstname=:firstname, midname=:midname, lastname=:lastname, designation=:designation, phoneone=:phoneone, phonetwo=:phonetwo, emailaddress=:emailaddress, licensenoone=:licensenoone, licenseexpone=:licenseexpone, licensestateone=:licensestateone, licensenotwo=:licensenotwo, licensestatetwo=:licensestatetwo, licenseexptwo=:licenseexptwo WHERE ".APPRAISER_TABLE.".id=:id");
        
                $stmt->bindValue(':id',$appraiser->getId(),PDO::PARAM_INT);
            }
        
            /*Common bindings*/
			$stmt->bindValue( ':username', $appraiser->getUsername(), PDO::PARAM_STR );
			$stmt->bindValue( ':password', $appraiser->getPassword(), PDO::PARAM_STR );
			$stmt->bindValue( ':isLockedOut', $appraiser->getIsLockedOut(), PDO::PARAM_INT );
			$stmt->bindValue( ':isAdmin', $appraiser->getIsAdmin(), PDO::PARAM_INT );
			$stmt->bindValue( ':isPowerUser', $appraiser->getIsPowerUser(), PDO::PARAM_INT );
			$stmt->bindValue( ':isReadOnly', $appraiser->getIsReadOnly(), PDO::PARAM_INT );
			$stmt->bindValue( ':IsAppraiser', $appraiser->getIsAppraiser(), PDO::PARAM_INT );
			$stmt->bindValue( ':IsAppAsst', $appraiser->getIsAppAsst(), PDO::PARAM_INT );
            $stmt->bindValue(':salutation',$appraiser->getSalutation(),PDO::PARAM_INT);
            $stmt->bindValue(':apptitle',$appraiser->getApptitle(),PDO::PARAM_INT);
            $stmt->bindValue(':firstname',$appraiser->getFirstname(),PDO::PARAM_STR);
            $stmt->bindValue(':midname',$appraiser->getMidname(),PDO::PARAM_STR);
            $stmt->bindValue(':lastname',$appraiser->getLastname(),PDO::PARAM_STR);
            $stmt->bindValue(':designation',$appraiser->getDesignation(),PDO::PARAM_STR);
            $stmt->bindValue(':phoneone',$appraiser->getPhoneone(),PDO::PARAM_STR);
            $stmt->bindValue(':phonetwo',$appraiser->getPhonetwo(),PDO::PARAM_STR);
            $stmt->bindValue(':emailaddress',$appraiser->getEmailaddress(),PDO::PARAM_STR);
            $stmt->bindValue(':licensenoone',$appraiser->getLicensenoone(),PDO::PARAM_STR);
            $stmt->bindValue(':licenseexpone',$appraiser->getLicenseexpone(),PDO::PARAM_STR);
            $stmt->bindValue(':licensestateone',$appraiser->getLicensestateone(),PDO::PARAM_STR);
            $stmt->bindValue(':licensenotwo',$appraiser->getLicensenotwo(),PDO::PARAM_STR);
            $stmt->bindValue(':licensestatetwo',$appraiser->getLicensestatetwo(),PDO::PARAM_STR);
            $stmt->bindValue(':licenseexptwo',$appraiser->getLicenseexptwo(),PDO::PARAM_STR);
        
            $stmt->execute();
        
            if($actionMode=="INSERT"){
                $appraiser->setId($this->db->lastInsertId());
            }

            $directory = "../app_images/".$appraiser->getId();
            if (!is_dir($directory)){
                mkdir($directory, 0755, true);
            }
            $mediaUtilities = new rbe_mediaUtilities();
            if((!file_exists($_FILES['digsignature']['tmp_name']) || !is_uploaded_file($_FILES['digsignature']['tmp_name']))) {
                $dig1 = $_POST['digsig'];
            } else {
                $file = explode(".", $_FILES["digsignature"]["name"]);
                $file_loc = $_FILES['digsignature']['tmp_name'];
                $file_size = $_FILES['digsignature']['size'];
                $file_type = $_FILES['digsignature']['type'];
                $folder = "../app_images/" . $appraiser->getId() . "/";
                //$new_file_name = round(microtime(true)) . '.' . end($file);
				$new_file_name = 'dsignature.'. end($file);
                $dig1=str_replace(' ','-',$new_file_name);
                move_uploaded_file($file_loc,$folder.$dig1);
                $mediaUtilities->imageTransformations($dig1,$folder,"",800,600,100,"","resize",true);
            }
            $appraiser->setDigsignature($dig1);
            
            $mediaUtilities = new rbe_mediaUtilities();
            if((!file_exists($_FILES['licenseimageone']['tmp_name']) || !is_uploaded_file($_FILES['licenseimageone']['tmp_name']))) {
                $lic1 = $_POST['licone'];
            } else {
                $file = explode(".", $_FILES["licenseimageone"]["name"]);
                $file_loc = $_FILES['licenseimageone']['tmp_name'];
                $file_size = $_FILES['licenseimageone']['size'];
                $file_type = $_FILES['licenseimageone']['type'];
                $folder = "../app_images/" . $appraiser->getId() . "/";
                //$new_file_name = round(microtime(true)) . '.' . end($file);
				$new_file_name = 'licenseimageone.'. end($file);
                $lic1=str_replace(' ','-',$new_file_name);
                move_uploaded_file($file_loc,$folder.$lic1);
                $mediaUtilities->imageTransformations($lic1,$folder,"",800,600,100,"","resize",true);
            }
            $appraiser->setLicenseimageone($lic1);
            
            if((!file_exists($_FILES['licenseimagetwo']['tmp_name']) || !is_uploaded_file($_FILES['licenseimagetwo']['tmp_name']))) {
                $lic2 = $_POST['lictwo'];
            } else {
                $file = explode(".", $_FILES["licenseimagetwo"]["name"]);
                $file_loc = $_FILES['licenseimagetwo']['tmp_name'];
                $file_size = $_FILES['licenseimagetwo']['size'];
                $file_type = $_FILES['licenseimagetwo']['type'];
                $folder = "../app_images/" . $appraiser->getId() . "/";
                //$new_file_name = round(microtime(true)) . '.' . end($file);
				$new_file_name = 'licenseimagetwo.'. end($file);
                $lic2=str_replace(' ','-',$new_file_name);
                move_uploaded_file($file_loc,$folder.$lic2);
                $mediaUtilities->imageTransformations($lic2,$folder,"",800,600,100,"","resize",true);
            }            
            $appraiser->setLicenseimagetwo($lic2);
            
            if((!file_exists($_FILES['qualifications']['tmp_name']) || !is_uploaded_file($_FILES['qualifications']['tmp_name']))){
				$quals = ($_POST['quals']);
			} else {
				$file = explode(".", $_FILES['qualifications']['name']);
				$file_loc = $_FILES['qualifications']['tmp_name'];
				$file_size = $_FILES['qualifications']['size'];
				$file_type = $_FILES['qualifications']['type'];
				$folder = "../app_images/" . $appraiser->getId() . "/";
				//$new_file_name = strtolower($file);
				$new_file_name = 'qualifications.'. end($file);
				$quals = str_replace(' ','-',$new_file_name );
				move_uploaded_file($file_loc,$folder.$quals );
			}
            $appraiser->setQualifications($quals);

//            if($actionMode=="INSERT"){
                $stmt = $this->db->prepare("UPDATE ".APPRAISER_TABLE." SET licenseimageone=:licenseimageone, licenseimagetwo=:licenseimagetwo, qualifications=:qualifications, digsignature=:digsignature WHERE ".APPRAISER_TABLE.".id=:id");
                
/*                } else {
                
                $stmt = $this->db->prepare("UPDATE ".APPRAISER_TABLE." SET licenseimageone=:licenseimageone, licenseimagetwo=:licenseimagetwo, qualifications=:qualifications, digsignature=:digsignature WHERE ".APPRAISER_TABLE.".id=:id");
            }*/
            
            $stmt->bindValue(':id',$appraiser->getId(),PDO::PARAM_INT);
            $stmt->bindValue(':licenseimageone',$appraiser->getLicenseimageone(),PDO::PARAM_STR);             
            $stmt->bindValue(':licenseimagetwo',$appraiser->getLicenseimagetwo(),PDO::PARAM_STR);
            $stmt->bindValue(':digsignature',$appraiser->getDigsignature(),PDO::PARAM_STR);
            $stmt->bindValue(':qualifications',$appraiser->getQualifications(),PDO::PARAM_STR);
			$stmt->execute();
		
            $this->db->commit();
            
        }catch (PDOException $e) {
            print_r($e);
			die();
            $this->db->rollBack(); //cancel db changes if something goes wrong
            return $appraiser;
            die();
        }
        
        return $appraiser;
    }
}
?>