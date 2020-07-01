<?php

return array(

    array(
        'name' => 'id',
        'type' => 'int',
        'max_length' => 10,
        'mysql_description' => 'INT(10) NOT NULL auto_increment PRIMARY KEY',
    ),

    array(
        'name' => 'brand',
        'type' => 'char',
        'min_length' => 2,
        'max_length' => 80,
        'required' => true,
        'pattern' => '#^[a-zA-Z0-9 \_\-\.\']{1,80}$#',
        'mysql_description' => 'CHAR(80) NOT NULL',
    ),

    array(
        'name' => 'model',
        'type' => 'char',
        'min_length' => 2,
        'max_length' => 80,
        'required' => true,
        'pattern' => '#^[a-zA-Z0-9 \_\-\.\']{1,80}$#',
        'mysql_description' => 'CHAR(80) NOT NULL',
    ),

    array(
        'name' => 'description',
        'type' => 'text',
        'min_length' => 0,
        'max_length' => 5000,
        'mysql_description' => 'TEXT',
    ),

    array(
        'name' => 'color',
        'type' => 'char',
        'max_length' => 20,
        'pattern' => '#^[a-zA-Z]{0,20}$#',
        'mysql_description' => 'CHAR(20)',
    ),

    array(
        'name' => 'price',
        'type' => 'char',
        'max_length' => 13,
        'pattern' => '#^[0-9]{1,10}\.[0-9]{2}$#',
        'mysql_description' => 'CHAR(20)',
    ),
);