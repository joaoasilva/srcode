<?php
//
// Copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
//

class Database {

    //UNDER CONSTRUCTION!!!
    
    private $database   = 'cv';
    private $connection = null;

    public function connect() {
        $db_access = new DBAccess();
        $this->connection = $db_access->_MySQLConnect(); //JUST RETURN MySQL link identifier

        if (!$this->connection) {
            throw new Exception(mysql_error(), mysql_errno());
        }
        if (!mysql_select_db($this->database)) {
            throw new Exception(mysql_error(), mysql_errno());
        }
    }

    public function disconnect() {
        mysql_close($this->connection);
    }

    public function querySingle($sql) {
        $result = $this->query($sql);
        if (!$result) {
            return false;
        }
        if (is_bool($result)){
            return $result;
        }
        $row = mysql_fetch_array($result, MYSQL_NUM);
        mysql_free_result($result);
        return $row[0];
    }

    public function queryMultiple($sql) {
        $result = $this->query($sql);
        if (!$result) {
            return false;
        }
        $arrResults = array();

        if ($result !== true) {
            while ($row = mysql_fetch_assoc($result)) {
                $arrResults[] = $row;
            }
            mysql_free_result($result);
        } else {
            $arrResults = true;
        }
        return $arrResults;
    }

    private function query($sql) {
        return mysql_query($sql, $this->connection);
    }
}