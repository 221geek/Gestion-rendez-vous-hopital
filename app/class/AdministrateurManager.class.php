<?php
    class AdministrateurManager extends Database
    {
        public function add(Administrateur $objet){
            $pdo = Database::getPDO();

            $sql1 = "INSERT INTO users(nom, prenom, mail, pass, id_role) VALUES(:nom, :prenom, :mail, :passw, :id_role)";
            $req = $pdo->prepare($sql1);
            $req->bindValue(':nom', $objet->getNom());
            $req->bindValue(':prenom', $objet->getPrenom());
            $req->bindValue(':mail', $objet->getMail());
            $req->bindValue(':passw', $objet->getPass());
            $req->bindValue(':id_role', $objet->getId_Role());
            $req->execute();
        }

        public function update(Administrateur $objet){
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
        }
        
        public function delete(Administrateur $objet){
            $pdo = Database::getPDO();
            $objet->setId();
            $req = $pdo->prepare('DELETE FROM users WHERE id= :id');
            $req->bindValue(":id", $objet->getId());
            $req->execute();
        }
    }