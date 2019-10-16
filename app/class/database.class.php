<?php
    class Database
    {
        private static $pdoInstance = null;

        public static function getPDO(): PDO{
            if (self::$pdoInstance == null) {
                self::$pdoInstance = new PDO('mysql:host=127.0.0.1;dbname=dalal_jamm;charset=utf8', 'miko', 'BC malick92', [

                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION
                ]);
            }
            
            return self::$pdoInstance;
        }
    }