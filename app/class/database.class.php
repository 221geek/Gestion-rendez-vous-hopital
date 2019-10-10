<?php
    class Database
    {
        private $_db_name;
        private $_db_user;
        private $_db_pass;
        private $_db_host;
        private $_pdo;

        public function __construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'localhost'){
            $this->_db_name = $db_name;
            $this->_db_user = $db_user;
            $this->_db_pass = $db_pass;
            $this->_db_host = $db_host;
        }

        private function getPDO(){
            if ($this->_pdo === null) {
                $pdo = new PDO('mysql:dbname=rendezVous;host=localhost', 'root', 'root');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->_pdo = $pdo;
            }
            return $this->pdo;
        }

        public function query($statement, $class_name){
            $req = $this->getPDO()->query($statement);
            $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
            return $datas;
        }

        public function prepare($statement, $attrbutes, $class_name, $one = false){
            $req = $this->getPDO()->prepare($statement);
            $req->execute($attrbutes);
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

            if ($one) {
                $datas = $req->fetch();
            }
            else{
                $datas = $req->fetchAll();
            }
            return $datas;
        }
    }