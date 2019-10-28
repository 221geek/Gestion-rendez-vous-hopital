<?php

    class Secretaire extends Database
    {
        private $_id;
        private $_nom;
        private $_prenom;
        private $_mail;
        private $_pass;
        private $_service;
        private $_id_role = 2;

        /* GUETTERS */
        public function getId(){
            return $this->_id;
        }        
        public function getNom(){
            return $this->_nom;
        }
        public function getPrenom(){
            return $this->_prenom;
        }
        public function getMail(){
            return $this->_mail;
        }
        public function getPass(){
            return $this->_pass;
        }
        public function getService(){
            return $this->_service;
        }
        public function getId_Role(){
            return $this->_id_role;
        }

        /* SETTERS */
        public function setId(){
            $bd = Database::getPDO();
            $req = $bd->prepare("SELECT id FROM users WHERE mail = :mail");
            $req->bindValue(":mail", $this->getMail());
            $req->execute();
            $id = $req->fetch();
            $this->_id = $id->{'id'};
        }
        public function setNom($nom){
            $this->_nom = $nom;
        }
        public function setPrenom($prenom){
            $this->_prenom = $prenom;
        }
        public function setMail($mail){
            $this->_mail = $mail;
        }
        public function setPass($pass){
            $this->_pass = $pass;
        }
        public function setService($service){
            $this->_service = $service;
        }

        public function hydrate(array $donnees){
            foreach ($donnees as $key => $value) {
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }
    }