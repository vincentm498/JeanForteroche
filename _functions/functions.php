<?php

/**
 * Permet de sécuriser une chaine de caractères
 * @param $string
 * @return $string
 */
function str_secur($string)
{
    return trim(htmlspecialchars($string));
}
