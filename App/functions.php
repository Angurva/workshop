<?php declare (strict_types = 1);
/*
* functions utils
*/


function sanitizeString(string $var):string
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}