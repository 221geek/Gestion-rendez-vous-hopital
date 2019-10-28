<?php
    class Month
    {
        private $_month;
        private $_year;

        public function __construct(?int $month = null, ?int $year = null)
        {
            $this->_month = $month;
            $this->_year = $year;
        }

        public function toString (): string{
            $this->months[$this->_month-1] . ' ' . $this->_year;
        }
    }