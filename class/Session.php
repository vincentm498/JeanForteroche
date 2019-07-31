<?php

namespace Blog;

class Session extends Connect
{

    public function __construct()
    {
        session_start();
    }

    public function setFlash($message)
    {
        $_SESSION['flash'] = [
            "message"   => $message
        ];
    }

    public function showFlash()
    {
        if (!empty($_SESSION['flash'])) { ?>
            <script>
                Materialize.toast();
            </script>
        <?php
        }
    }
}
