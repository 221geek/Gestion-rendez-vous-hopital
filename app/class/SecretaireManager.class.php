<?php
    class SecretaireManager extends Database
    {

        public function add(Secretaire $objet){
            
            $pdo = Database::getPDO();

            $req = $pdo->prepare("INSERT INTO users(nom, prenom, mail, pass, id_role) VALUES(:nom, :prenom, :mail, :passw, :id_role)");
            
            $req->bindValue(':nom', $objet->getNom());
            $req->bindValue(':prenom', $objet->getPrenom());
            $req->bindValue(':mail', $objet->getMail());
            $req->bindValue(':passw', $objet->getPass());
            $req->bindValue(':id_role', $objet->getId_Role());

            $req->execute();

            $req = $pdo->prepare("INSERT INTO secretaires(id_services) VALUES(:services)");

            $req->bindValue(':services', $objet->getService());

            $req->execute();
        }
        public function modifier(){
            #requete pour modifier
        }
        public function supprimer(){
            #requete pour supprimer
        }
    }