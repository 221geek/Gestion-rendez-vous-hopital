<?php
    class Verifie
    {
        public function verifieMail($mail){
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {
                return true;
            }
            return false;
        }
<<<<<<< HEAD
        
=======
>>>>>>> 6af24c1eb898bed229b736298c58b8624170b8b2
    }