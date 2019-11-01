<?php

class HoraireUpdate extends Database
{
    public function update(Horaire $objet){
        $pdo = Database::getPDO();
        $req = $pdo->prepare("UPDATE horaires SET start=:start, end=:end WHERE dow = :dow");
        $req->bindValue(':start', $objet->getStart());
        $req->bindValue(':end', $objet->getEnd());
        $req->bindValue(':dow', $objet->getDow());
        $req->execute();
    }
}