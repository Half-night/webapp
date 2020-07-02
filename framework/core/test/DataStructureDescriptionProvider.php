<?php

class DataStructureDescriptionProvider
{

    private static $directory = '.';
    

    /*
    public function __construct($dir = null) {
        
        if ( !is_null($dir) AND is_dir($dir) ) {

            $this->directory = $dir;
        }
    }
    */

    public static function setDirectory($dir = null) {

        if ( !is_null($dir) AND is_dir($dir) ) {

            self::$directory = $dir;
        }
    }

    public static function getDescription($name) {

        string_hint($name);
        
        if (file_exists(self::$directory . '/' . $name . '.php')) {

            $fields = include self::$directory . '/' . $name . '.php';

            if (is_array($fields) AND count($fields) > 0) {

                foreach ($fields as $key => $field) {

                    $fields[$key] = new FieldDescription($field);
                }

                $structure_decription = new DataStructureDescription($name);
                $structure_decription->loadFields($fields);

                return $structure_decription;

            } else {

                return false;
            }

        } else {

            return false;
        }
    }
}