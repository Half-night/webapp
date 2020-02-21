<?php

function d($var) {

    echo "<hr>\n";
    echo "<pre>\n";
    var_dump($var);
    echo "</pre>\n";
}

function dd($var) {

    echo "<hr>\n";
    echo "<pre>\n";
    var_dump($var);
    echo "</pre>\n";
    die();

}
