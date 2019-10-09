<?php
    class Form
    {
        public function label($name, $text){
            return '<label for="'.$name.'">'.$text.'</label>';
        }

        public function input($name){
            return '<input type="'.$name.'" class="form-control" name="'.$name.'" aria-describedby="'.$name.'Help" placeholder="Entrer votre mot de passe" id="'.$name.'">';
        }

        public function submit(){
            return '<button type="button" class="btn btn-primary" id="submit-btn" onclick="traitementJS()">Se connecter</button>';
        }

        public function messageErreur($name){
            return '<small id="'.$name.'Help" class="hide"></small>';
        }
    }