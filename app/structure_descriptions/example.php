<?php

return array(

    array(
        'name' => 'id',
        'type' => 'int',
        'max_length' => 6,
        'mysql_description' => 'INT(6) NOT NULL auto_increment PRIMARY KEY',
    ),

    array(
        'name' => 'url',
        'type' => 'varchar',
        'min_length' => 2,
        'max_length' => 250,
        'mysql_description' => 'VARCHAR(250) NOT NULL',
    ),

    array(
        'name' => 'title',
        'type' => 'varchar',
        'min_length' => 1,
        'max_length' => 150,
        'mysql_description' => 'VARCHAR(150) NOT NULL',
    ),

    array(
        'name' => 'content',
        'type' => 'text',
        'max_length' => 5000,
        'mysql_description' => 'TEXT NOT NULL',
    ),
);