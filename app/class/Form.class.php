<?php   
    class Form {

<<<<<<< HEAD
<<<<<<< HEAD
=======
        public function option($name){
            return '<option value="'.$name.'">'.$name.'</option>';
        }

>>>>>>> 6af24c1eb898bed229b736298c58b8624170b8b2
=======
>>>>>>> 1160059ec06d57d029ab899cd3ca12fd0259f404
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