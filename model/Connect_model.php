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
