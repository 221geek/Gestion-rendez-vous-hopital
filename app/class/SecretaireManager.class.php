<?php
    class SecretaireManager extends Database
    {
        public function add(Secretaire $objet){
            $pdo = Database::getPDO();

            $sql1 = "INSERT INTO users(nom, prenom, mail, pass, id_role) VALUES(:nom, :prenom, :mail, :passw, :id_role)";
            $req = $pdo->prepare($sql1);
            $req->bindValue(':nom', $objet->getNom());
            $req->bindValue(':prenom', $objet->getPrenom());
            $req->bindValue(':mail', $objet->getMail());
            $req->bindValue(':passw', $objet->getPass());
            $req->bindValue(':id_role', $objet->getId_Role());
            $req->execute();

            $objet->setId();
            
            $sql2 = "INSERT INTO secretaires(id, id_services) VALUES(:id, :services)";
            $req2 = $pdo->prepare($sql2);
            $req2->bindValue(':id', $objet->getId());
            $req2->bindValue(':services', $objet->getService());
            $req2->execute();
        }

        public function update(Secretaire $objet){
            $pdo = Database::getPDO();
            $objet->setId();
            
            $req = $pdo->prepare("UPDATE users SET nom = :nom, prenom = :prenom, mail = :mail, pass = :pass, id_role = :id_role WHERE id = :id");

            $req->bindValue(':nom', $objet->getNom());
            $req->bindValue(':prenom', $objet->getPrenom());
            $req->bindValue(':mail', $objet->getMail());
            $req->bindValue(':pass', $objet->getPass());
            $req->bindValue(':id_role', $objet->getId_Role());
            $req->bindValue(':id', $objet->getId());

            $req->execute();

            $req2 = $pdo->prepare("UPDATE secretaires SET id_services = :services WHERE id = :id");

            $req2->bindValue(':id', $objet->getId());
            $req2->bindValue(':services', $objet->getService());

            $req2->execute();
        }
        
        public function delete(Secretaire $objet){
            $pdo = Database::getPDO();
            $objet->setId();
            $req = $pdo->prepare('DELETE FROM secretaires WHERE id= :id');
            $req->bindValue(":id", $objet->getId());
            $req->execute();

            $req2 = $pdo->prepare('DELETE FROM users WHERE id= :id');
            $req2->bindValue(":id", $objet->getId());
            $req2->execute();
        }
    }