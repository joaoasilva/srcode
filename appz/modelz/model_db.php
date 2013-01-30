<?php
/**
 * 
 * @author  João Silva
 * @copyright (c) 2013 by João Silva. Under GPL license http://www.gnu.org/licenses/gpl.html
 * 
 * This is were PHP talks with MYSQL
 * 
 * @todo  UNDER CONSTRUCTION!!!
 * 
 */

/** 
 * @package Modelz
 */
class Database {
    
    private $database   = 'cv';
    private $connection = null;

    /**
     * Method to connect to MySQL
     */
    public function connect() {
        $db_access = new DBAccess();
        /**
         * @return JUST RETURN MySQL link identifier
         */
        $this->connection = $db_access->_MySQLConnect();

        if (!$this->connection) {
            try {
                throw new Exception();
            }catch (Exception $e) {
                echo $e . '</br>' . mysql_error() . '</br>' . mysql_errno();
            }
        }
        if (!mysql_select_db($this->database)) {
             try {
                throw new Exception();
            }catch (Exception $e) {
                echo $e . '</br>' . mysql_error() . '</br>' . mysql_errno();
            }
        }
    }

    /**
     * Method to disconnect from MySQL
     */
    public function disconnect() {
        mysql_close($this->connection);
    }

    /**
     * Method to query MySQL and return first result
     * @param string $sql 
     * @return string
     */
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

    /**
     * Method to query MySQL and return all the results
     * @param string $sql 
     * @return array
     */
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

    /**
     * Method to query MySQL
     * @param string $sql 
     * @return mixed
     */
    private function query($sql) {
        return mysql_query($sql, $this->connection);
    }
}