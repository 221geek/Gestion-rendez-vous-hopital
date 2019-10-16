<?php

    class Controller{

        public function index(){
            afficher("seConnecter");
        }
        public function admin(){
            afficher("admin");
        }
        public function error(){
            afficher("erreur");
        }
        public function test(){
            afficher("test");
        }
    }