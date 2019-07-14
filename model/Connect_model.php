<?php

function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=jeanforteroche;charset=utf8', 'root', '');
        return $db;
    }