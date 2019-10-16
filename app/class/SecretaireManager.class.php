<?php
    class SecretaireManager extends Database
    {

<<<<<<< HEAD
        public function add(Secretaire $sec){
=======
        public function add(Secretaire $objet){
>>>>>>> 1160059ec06d57d029ab899cd3ca12fd0259f404
            
            $pdo = Database::getPDO();

            $req = $pdo->prepare("INSERT INTO users(nom, prenom, mail, pass, id_role) VALUES(:nom, :prenom, :mail, :passw, :id_role)");
            
<<<<<<< HEAD
            $req->bindValue(':nom', $sec->getNom());
            $req->bindValue(':prenom', $sec->getPrenom());
            $req->bindValue(':mail', $sec->getMail());
            $req->bindValue(':passw', $sec->getPass());
            $req->bindValue(':id_role', $sec->getId_Role());
=======
            $req->bindValue(':nom', $objet->getNom());
            $req->bindValue(':prenom', $objet->getPrenom());
            $req->bindValue(':mail', $objet->getMail());
            $req->bindValue(':passw', $objet->getPass());
            $req->bindValue(':id_role', $objet->getId_Role());

            $req->execute();

            $req = $pdo->prepare("INSERT INTO secretaires(id_services) VALUES(:services)");

            $req->bindValue(':services', $objet->getService());
>>>>>>> 1160059ec06d57d029ab899cd3ca12fd0259f404

            $req->execute();
        }
        public function modifier(){
<<<<<<< HEAD
            #requete pour modifier 
=======
            #requete pour modifier
>>>>>>> 1160059ec06d57d029ab899cd3ca12fd0259f404
        }
        public function supprimer(){
            #requete pour supprimer
        }
    }