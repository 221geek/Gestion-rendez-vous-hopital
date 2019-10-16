<?php   
    class Form {

        public function label($name, $text){
            return '<label for="'.$name.'">'.$text.'</label>';
        }

        public function input($name, $placeholder){
            return '<input type="'.$name.'" class="form-control" name="'.$name.'" aria-describedby="'.$name.'Help" placeholder='.$placeholder.' id="'.$name.'">';
        }

        public function submit($name){
            return '<button type="submit" class="btn btn-primary" id="submit-btn" name="submit">'.$name.'</button>';
        }

        public function messageErreur($name){
            return '<small id="'.$name.'Help" class="hide"></small>';
        }
    }