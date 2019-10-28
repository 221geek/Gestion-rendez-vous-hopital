<?php
    class MedecinManager extends Database
    {
        public function add(Medecin $objet){
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
            $sql2 = "INSERT INTO medecins(id, id_services, id_specialites) VALUES(:id, :services, :specialites)";
            $req2 = $pdo->prepare($sql2);
            $req2->bindValue(':id', $objet->getId());
            $req2->bindValue(':services', $objet->getService());
            $req2->bindValue(':specialites', $objet->getSpecialite());
            $req2->execute();
        }

        public function update(Medecin $objet){
            $pdo = Database::getPDO();
            $objet->setId();
            
            $req = $pdo->prepare("UPDATE users SET nom = :nom, prenom = :prenom, mail = :mail, pass = :pass, id_role = :id_role WHERE id = :id");

            $req->bindValue(':id', $objet->getId());
            $req->bindValue(':nom', $objet->getNom());
            $req->bindValue(':prenom', $objet->getPrenom());
            $req->bindValue(':mail', $objet->getMail());
            $req->bindValue(':pass', $objet->getPass());
            $req->bindValue(':id_role', $objet->getId_Role());

            $req->execute();

            $req2 = $pdo->prepare("UPDATE medecins SET id_services = :services, id_specialites = :specialite WHERE id = :id");

            $req2->bindValue(':id', $objet->getId());
            $req2->bindValue(':services', $objet->getService());
            $req2->bindValue(':specialite', $objet->getSpecialite());

            $req2->execute();
        }
        
        public function delete(Medecin $objet){
            $pdo = Database::getPDO();
            $objet->setId();
            $req = $pdo->prepare('DELETE FROM medecins WHERE id= :id');
            $req->bindValue(":id", $objet->getId());
            $req->execute();

            $req2 = $pdo->prepare('DELETE FROM users WHERE id= :id');
            $req2->bindValue(":id", $objet->getId());
            $req2->execute();
        }
    }