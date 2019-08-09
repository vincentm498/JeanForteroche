<?php

namespace JeanForteroche\model;

class Session extends Connect
{

    public function setFlash($message, $color = "white")
    {
        $_SESSION['flash'] = [
            "color"     => $color,
            "message"   => $message

        ];
    }
}
