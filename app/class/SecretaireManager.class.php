<?php
    class SecretaireManager extends Database
    {

        public function add(Secretaire $sec){
            
            $pdo = Database::getPDO();

            $req = $pdo->prepare("INSERT INTO users(nom, prenom, mail, pass, id_role) VALUES(:nom, :prenom, :mail, :passw, :id_role)");
            
            $req->bindValue(':nom', $sec->getNom());
            $req->bindValue(':prenom', $sec->getPrenom());
            $req->bindValue(':mail', $sec->getMail());
            $req->bindValue(':passw', $sec->getPass());
            $req->bindValue(':id_role', $sec->getId_Role());

            $req->execute();
        }
        public function modifier(){
            #requete pour modifier 
        }
        public function supprimer(){
            #requete pour supprimer
        }
    }