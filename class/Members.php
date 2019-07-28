<?php

//namespace Blog\Model;

require_once("class/Connect.php");

class Members extends Connect
{
    // Ajoute un membre
    public function addMember($pseudo, $pass_hache, $email)
    {
        $db = $this->dbConnect();
        $member = $db->prepare('INSERT INTO members(pseudo, pass, email, date_inscription, id_groupe) VALUES(?, ?, ?, NOW(), 2)');
        $member->execute(array($pseudo, $pass_hache, $email));

        return $member->fetch();
    }
    // Recupération des membres inscrits
    public function getMemberInscription($pseudo, $email)
    {
        $db = $this->dbConnect();
        $members = $db->prepare('SELECT * FROM members WHERE pseudo=? or email=? ');
        $members->execute(array($pseudo, $email));
        return $members->fetchAll();
    }
}
