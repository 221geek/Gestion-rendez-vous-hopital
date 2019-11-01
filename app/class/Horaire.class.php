<?php
    class Horaire extends Database
    {
        private $_dow;
        private $_day;
        private $_start;
        private $_end;


        public function setDow($dow){
            $this->_dow = $dow;
        }
        public function setDay($day){
            $this->_day = $day;
        }
        public function setStart($start){
            $this->_start = $start;
        }
        public function setEnd($end){
            $this->_end = $end;
        }

        public function getDow(){
            return $this->_dow;
        }
        public function getDay(){
            return $this->_day;
        }
        public function getStart(){
            return $this->_start;
        }
        public function getEnd(){
            return $this->_end;
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