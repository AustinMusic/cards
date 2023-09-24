<?php
class issuesDBController {
    public $db;

    public
    function getRecord( $id ) {


        $sql_fields[] = ISSUES_TABLE . ".id";
        $sql_fields[] = ISSUES_TABLE . ".type";
        $sql_fields[] = ISSUES_TABLE . ".priority";
        $sql_fields[] = ISSUES_TABLE . ".status";
        $sql_fields[] = ISSUES_TABLE . ".issuesURL";
        $sql_fields[] = ISSUES_TABLE . ".short";
        $sql_fields[] = ISSUES_TABLE . ".description";
        $sql_fields[] = ISSUES_TABLE . ".reproduction";
        $sql_fields[] = ISSUES_TABLE . ".updates";
        $sql_fields[] = "DATE_FORMAT(".ISSUES_TABLE.".DateCreated,'%M %e, %Y') as DateCreated";
        $sql_fields[] = "DATE_FORMAT(".ISSUES_TABLE.".DateModified,'%M %e, %Y') as DateModified";
        $sql_fields[] = "CONCAT(".WFUSERS_TABLE.".firstname,' ',".WFUSERS_TABLE.".lastname) as CreatedBy";
        $sql_fields[] = "CONCAT(".WFUSERS_M_TABLE.".firstname,' ',".WFUSERS_M_TABLE.".lastname) as ModifiedBy";

        $tables_sql[] = ISSUES_TABLE;       
        $tables_sql[] = ' LEFT OUTER JOIN '.WFUSERS_TABLE.' ON '.ISSUES_TABLE.'.CreatedBy='.WFUSERS_TABLE.'.id';
        $tables_sql[] = ' LEFT OUTER JOIN '.WFUSERS_TABLE.' '.WFUSERS_M_TABLE.' ON '.ISSUES_TABLE.'.ModifiedBy='.WFUSERS_M_TABLE.'.id';


        $search_sql[] = ISSUES_TABLE . ".id=:id";

        $sql_fields_stmt = "";
        if ( count( $sql_fields ) > 0 ) {
            $sql_fields_stmt .= " " . implode( ",", $sql_fields ) . " ";
        }

        $tables_sql_stmt = " FROM " . implode( " ", $tables_sql );

        $search_sql_stmt = "";
        if ( count( $search_sql ) > 0 ) {
            $search_sql_stmt .= " WHERE " . implode( " AND ", $search_sql );
        }

        $limit_sql = "";
        $sql_groupby = "";
        $orderBy_stmt = "ORDER BY " . ISSUES_TABLE . ".id DESC";


        $sql = 'SELECT ' . $sql_fields_stmt . ' ' . $tables_sql_stmt . ' ' . $search_sql_stmt . ' ' . $sql_groupby . ' ' . $orderBy_stmt . ' ' . $limit_sql . ' ';
        $stmt = $this->db->prepare( $sql );

        $stmt->bindValue( "id", $id, PDO::PARAM_INT );

        $stmt->execute();

        $rows = $stmt->fetchAll( PDO::FETCH_ASSOC );


        return $rows;
    }

    public
    function issuesOperation( $issues, $user_id ) {
        $actionMode = "INSERT";
        if ( isset( $_GET[ 'id' ] ) ) {
            $actionMode = "UPDATE";
        }

        try {
            $this->db->beginTransaction();

            if ( $actionMode == "INSERT" ) {
                $stmt = $this->db->prepare( "INSERT INTO " . ISSUES_TABLE . " (type, priority, status, issuesURL, CreatedBy, short, description, reproduction, updates)
    				VALUES  (:type, :priority, :status, :issuesURL, :CreatedBy, :short, :description, :reproduction, :updates)" );

                $stmt->bindValue( ':CreatedBy', $user_id, PDO::PARAM_INT );
            } else {
                $stmt = $this->db->prepare( "UPDATE " . ISSUES_TABLE . " SET type=:type, priority=:priority, status=:status, issuesURL=:issuesURL, ModifiedBy=:ModifiedBy, DateModified=:DateModified, short=:short, description=:description, reproduction=:reproduction, updates=:updates WHERE " . ISSUES_TABLE . ".id=:id" );

                $stmt->bindValue( ':id', $issues->getId(), PDO::PARAM_INT );
                $stmt->bindValue( ':ModifiedBy', $user_id, PDO::PARAM_INT );
                $stmt->bindValue(':DateModified',$issues->getDateModified(),PDO::PARAM_STR);
            }

            /*Common bindings*/
            $stmt->bindValue( ':type', $issues->getType(), PDO::PARAM_INT );
            $stmt->bindValue( ':priority', $issues->getPriority(), PDO::PARAM_INT );
            $stmt->bindValue( ':status', $issues->getStatus(), PDO::PARAM_INT );
            $stmt->bindValue( ':issuesURL', $issues->getIssuesURL(), PDO::PARAM_STR );
            $stmt->bindValue( ':short', $issues->getShort(), PDO::PARAM_STR );
            $stmt->bindValue( ':description', $issues->getDescription(), PDO::PARAM_STR );
            $stmt->bindValue( ':reproduction', $issues->getReproduction(), PDO::PARAM_STR );
            $stmt->bindValue( ':updates', $issues->getUpdates(), PDO::PARAM_STR );

            $stmt->execute();

            if ( $actionMode == "INSERT" ) {
                $issues->setId( $this->db->lastInsertId() );
            }
            $directory = "../bugs/".$issues->getId();
            if (!is_dir($directory)){
                mkdir($directory, 0755, true);
            }

            $images = array();
            foreach ($_FILES['images']['name'] as $key => $val ) {
                $upload_dir = "../bugs/" . $issues->getId() . "/";
                $upload_image = $upload_dir.$_FILES['images']['name'][$key];
                $file_name = $_FILES['images']['name'][$key];
                if (move_uploaded_file($_FILES['images']['tmp_name'][$key],$upload_image)) {
                    $images[] = $upload_image;
                    $FK_ReportID = $issues->getId();
                    // insert uploaded images details into MySQL database.
                    $stmt = $this->db->prepare("INSERT INTO images (file_name, FK_ReportID) VALUES('" . $file_name . "', '" . $FK_ReportID . "')");
                    $stmt->execute(); 
                }
            }

            $this->db->commit();

        } catch ( PDOException $e ) {
            print_r( $e );
            $this->db->rollBack(); //cancel db changes if something goes wrong
            return $issues;
            die();
        }

        return $issues;
    }
}
?>