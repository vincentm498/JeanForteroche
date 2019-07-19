<?php

namespace Blog\Model;

class Connect_model
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=jeanforteroche;charset=utf8', 'root', '');
        return $db;
    }
}

if (!$db) {
    echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
    echo "Errno de débogage : " . mysqli_connect_errno() . PHP_EOL;
    echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
    exit;
}
