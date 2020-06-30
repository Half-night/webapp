<?php

return array(

    array(
        'name' => 'id',
        'type' => 'int',
        'max_length' => 8,
        'pattern' => '#^[0-9]{1,8}$#',
        'required' => true,
        'mysql_description' => 'int(8) NOT NULL auto_increment PRIMARY KEY'),

    array(
        'name' => 'login',
        'type' => 'varchar',
        'min_length' => 5,
        'max_length' => 50,
        'pattern' => '#^[a-zA-Z0-9\.\,\+\-\=\_\n\r\t \#\@\$]{5,50}$#',
        'required' => true,
        'mysql_description' => 'varchar(50) NOT NULL UNIQUE'),

    array(
        'name' => 'name',
        'type' => 'varchar',
        'min_length' => 2,
        'max_length' => 100,
        'required' => true,
        'mysql_description' => 'varchar(100)'),

    array(
        'name' => 'password',
        'type' => 'varchar',
        'min_length' => 8,
        'max_length' => 100,
        'required' => true,
        'mysql_description' => 'varchar(100) NOT NULL'),

    array(
        'name' => 'reg_date',
        'type' => 'datetime',
        'min_length' => 8,
        'max_length' => 100,
        'required' => true,
        'pattern' => '#^([0-9]{2,4})-([0-1][0-9])-([0-3][0-9])(?:( [0-2][0-9]):([0-5][0-9]):([0-5][0-9]))?$#',
        'mysql_description' => 'DATETIME NOT NULL Default NOW()'),
);