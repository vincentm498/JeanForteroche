<?php

namespace Blog;

class Session extends Connect
{

    public function __construct()
    {
        session_start();
    }

    public function setFlash($message, $color = "white")
    {
        $_SESSION['flash'] = [
            "color"     => $color,
            "message"   => $message
        ];
    }

    public function showFlash()
    {
        if (!empty($_SESSION['flash'])) { ?>
            <script>
                alert('coucou');
            </script>
        <?php
        }
    }
}
