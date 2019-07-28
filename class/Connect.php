<?php

//namespace Blog\Model;

class Connect
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=jeanforteroche;charset=utf8', 'root', '');
        // $db = new \PDO('mysql:host=localhost;dbname=jeanforteroche;charset=utf8', 'root', '');
        return $db;
    }
}
