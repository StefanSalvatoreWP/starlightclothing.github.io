<?php
    require_once("serverinfo.php");

    class Database{
        private $db;
        private $dbstate;
        private $errMsg;

        public function __construct(){
            try{
                $this->db = new PDO("mysql:host=" . SERVER_NAME .";dbname=" . DBNAME,USERNAME,PASSWORD);
                $this->db->exec("set names utf8");
                $this->dbstate = 1;
                $this->errMsg = "Connection established";
            }
            catch(PDOExceptiton $e){
                $this->errMsg = $e->getMessage();
                $this->dbstate = 0;
            }
        }

        public function getDbConnection(){
            return $this->db;
        }

        public function getState(){
            return $this->dbstate;
        }

        public function getErrorMsg(){
            return $this->errMsg;
        }

        public function __destruct(){
            $this->db = null;
        }
    }
?>