<?php

class DataStructureDescriptionProvider
{

    private $directory = '.';
    
    public function __construct($dir = null) {
        
        if ( !is_null($dir) AND is_dir($dir) ) {

            $this->directory = $dir;
        }
    }

    public function getDescription($name) {

        string_hint($name);
        
        if (file_exists($this->directory . '/' . $name . '.php')) {

            $fields = include $this->directory . '/' . $name . '.php';

            if (is_array($fields) AND count($fields) > 0) {

                foreach ($fields as $key => $field) {

                    $fields[$key] = new FieldDescription($field);
                }

                $structure = new DataStructureDescription($name);
                $structure->loadFields($fields);

                return $structure;

            } else {

                return false;
            }

        } else {

            return false;
        }
    }
}