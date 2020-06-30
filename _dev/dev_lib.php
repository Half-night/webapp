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

function string_hint($value) {
    if (!is_string($value)) {

        throw new Exception("String is awaited", 1);
    }
}

function int_hint($value) {
    if (!is_int($value)) {

        throw new Exception("Integer is awaited", 1);
    }
}

function float_hint($value) {
    if (!is_float($value)) {

        throw new Exception("Float is awaited", 1);
    }
}

function bool_hint($value) {
    if (!is_bool($value)) {

        throw new Exception("Boolean is awaited", 1);
    }
}
