<?php
class userDBController {
    public $db;

    public

    function getRecord( $id ) {

        $sql_fields[] = WFUSERS_TABLE . ".id";
        $sql_fields[] = WFUSERS_TABLE . ".username";
        $sql_fields[] = WFUSERS_TABLE . ".password";
        $sql_fields[] = WFUSERS_TABLE . ".firstname";
        $sql_fields[] = WFUSERS_TABLE . ".lastname";
        $sql_fields[] = WFUSERS_TABLE . ".isLockedOut";
        $sql_fields[] = WFUSERS_TABLE . ".isAdmin";
        $sql_fields[] = WFUSERS_TABLE . ".isPowerUser";
        $sql_fields[] = WFUSERS_TABLE . ".email";

        $tables_sql[] = WFUSERS_TABLE;


        $search_sql[] = WFUSERS_TABLE . ".id=:id";

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
        $orderBy_stmt = "ORDER BY " . WFUSERS_TABLE . ".id DESC";


        $sql = 'SELECT ' . $sql_fields_stmt . ' ' . $tables_sql_stmt . ' ' . $search_sql_stmt . ' ' . $sql_groupby . ' ' . $orderBy_stmt . ' ' . $limit_sql . ' ';
        $stmt = $this->db->prepare( $sql );

        $stmt->bindValue( "id", $id, PDO::PARAM_INT );

        $stmt->execute();

        $rows = $stmt->fetchAll( PDO::FETCH_ASSOC );


        return $rows;
    }

    public

    function userOperation( $user, $user_id ) {
        $actionMode = "INSERT";
        if ( isset( $_GET[ 'id' ] ) ) {
            $actionMode = "UPDATE";
        }

        try {
            $this->db->beginTransaction();

            if(empty($_POST['password'])) {
                $pass = $_POST['origpassword'];
            } else {
                $pass = $_POST['password'];
                $pass = md5($pass);
            }

        $user->setPassword($pass);
        if ( $actionMode == "INSERT" ) {
            $stmt = $this->db->prepare( "INSERT INTO " . WFUSERS_TABLE . " (username, password, isLockedOut, isAdmin, isPowerUser)
    				VALUES  (:username, :password, :isLockedOut, :isAdmin, :isPowerUser, )" );

        } else {
            $stmt = $this->db->prepare( "UPDATE " . WFUSERS_TABLE . " SET username=:username, password=:password, isLockedOut=:isLockedOut, isAdmin=:isAdmin, isPowerUser=:isPowerUser WHERE " . WFUSERS_TABLE . ".id=:id" );

            $stmt->bindValue( ':id', $user->getId(), PDO::PARAM_INT );
        }

        /*Common bindings*/
        $stmt->bindValue( ':username', $user->getUsername(), PDO::PARAM_STR );
        $stmt->bindValue( ':password', $user->getPassword(), PDO::PARAM_STR );
        $stmt->bindValue( ':isLockedOut', $user->getIsLockedOut(), PDO::PARAM_INT );
        $stmt->bindValue( ':isAdmin', $user->getIsAdmin(), PDO::PARAM_INT );
        $stmt->bindValue( ':isPowerUser', $user->getIsPowerUser(), PDO::PARAM_INT );
        $stmt->bindValue( ':email', $user->getEmail(), PDO::PARAM_STR );

        $stmt->execute();

        if ( $actionMode == "INSERT" ) {
            $user->setId( $this->db->lastInsertId() );
        }

        $this->db->commit();

    } catch ( PDOException $e ) {
        print_r( $e );
        $this->db->rollBack(); //cancel db changes if something goes wrong
        return $user;
        die();
    }

    return $user;
}
}
?>