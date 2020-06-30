<?php

class DataStructureDescription extends Data
{

    public static $collection = array();
    
    private $name = null;

    public function __construct($name) {

        string_hint($name);

        $this->name = $name;
        self::$collection[$name] = $this;
    }

    public function getName() {
        return $this->name;
    }

    public function addField(FieldDescription $field) {

        if ($this->set($field->getName(), $field)) {

            return true;
        } else {

            return false;
        }
    }

    public function loadFields(array $fields) {

        if (count($fields) > 0) {

            foreach ($fields as $field) {

                $this->addField($field);
            }
            
            return true;

        } else {

            return false;
        }
    }
}