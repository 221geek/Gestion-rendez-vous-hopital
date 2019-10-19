<?php

    class Controller{

        public function index(){
            afficher("seConnecter");
        }
        public function admin(){
            afficher("admin");
        }
        public function secretaire(){
            afficher("secretaire");
        }
        public function error(){
            afficher("erreur");
        }
        public function test(){
            afficher("test");
        }
    }