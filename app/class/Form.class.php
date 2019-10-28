<?php   
    class Form {

        public function label($name, $text){
            return '<label for="'.$name.'">'.$text.'</label>';
        }

        public function option($name){
            return '<option value='.$name.'>'.$name.'</option>';
        }

        public function input($name, $placeholder, $classe){
            return '<input type="'.$name.'" class="'.$classe.'" name="'.$name.'" placeholder='.$placeholder.' id="'.$name.'">';
        }

        public function submit($name, $class){
            return '<button type="submit" class="'.$class.'" id="submit-btn" name="'.$class.'">'.$name.'</button>';
        }

        public function messageErreur($name){
            return '<small id="'.$name.'Help" class="hide"></small>';
        }
    }