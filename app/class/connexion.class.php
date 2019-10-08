<?php
    class Connexion
    {
        private $_mail;
        private $_password;

        public function __construct($mail, $password){

            $this->_mail = $mail;
            $this->_password = $password;
        }

        public function connecte($table){
        }
    }