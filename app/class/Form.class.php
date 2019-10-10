<?php   
    class Form {

        public function option($name){
            return '<option value="'.$name.'">'.$name.'</option>';
        }

        public function label($name, $text){
            return '<label for="'.$name.'">'.$text.'</label>';
        }

        public function input($name){
            return '<input type="'.$name.'" class="form-control" name="'.$name.'" aria-describedby="'.$name.'Help" placeholder="Entrer votre '.$name.'" id="'.$name.'">';
        }

        public function submit(){
            return '<button type="submit" class="btn btn-primary" id="submit-btn">Se connecter</button>';
        }

        public function messageErreur($name){
            return '<small id="'.$name.'Help" class="hide"></small>';
        }
    }