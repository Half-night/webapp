<?php

class FieldDescription extends Data
{

    public static $name_pattern = '#^[a-z_A-Z\-0-9]+$#';

    public static $types = array('int', 'float', 'double', 'string', 'char', 'varchar', 'text', 'date', 'time', 'datetime', 'timestamp', 'boolean');

    public static $integer_types = array('int');
    public static $float_types = array('float', 'double');
    public static $string_types = array('char', 'varchar', 'text', 'date', 'time', 'datetime', 'timestamp');
    public static $boolean_types = array('boolean');

    public function __construct($description = null) {

        if ($description !== null) {

            $this->load($description);
        }
    }

    public function setName($data) {

        string_hint($data);

        if (preg_match(self::$name_pattern, $data)) {

            return $this->set('name', $data);
        } else {

            throw new Exception("Invalid field name");
        }
    }

    public function getName() {

        return $this->get('name');
    }

    public function setType($data) {

        string_hint($data);

        if ($this->getName()) {

            if (in_array($data, self::$types)) {

                return $this->set('type', $data);
            } else {

                return false;
            }

        } else {

            return false;
        }
    }

    public function getType() {
        return $this->get('type');
    }

    public function setMinLength($data) {

        int_hint($data);

        if ($this->getName()) {

            return $this->set('min_length', $data);
        } else {

            return false;
        }
    }

    public function getMinLength() {
        return $this->get('min_length');
    }

    public function setMaxLength($data) {

        int_hint($data);

        if ($this->getName()) {

            return $this->set('max_length', $data);
        } else {

            return false;
        }
    }

    public function getMaxLength() {
        return $this->get('max_length');
    }

    public function setPattern($data) {

        string_hint($data);

        if ($this->getName()) {

            return $this->set('pattern', $data);
        } else {

            return false;
        }
    }

    public function getPattern() {
        return $this->get('pattern');
    }

    public function setRequired($data) {

        bool_hint($data);

        if ($this->getName()) {

            return $this->set('required', $data);
        } else {

            return false;
        }
    }

    public function getRequired() {
        return $this->get('required');
    }


    // Temporary solution
    public function setMysqlDescription($data) {

        string_hint($data);

        if ($this->getName()) {

            return $this->set('mysql_description', $data);
        } else {

            return false;
        }
    }

    // Temporary solution
    public function getMysqlDescription() {
        return $this->get('mysql_description');
    }

    public function load(array $description) {

        if (count($description) > 0) {

            if (isset($description['name'])) {
                $this->setName($description['name']);
            }

            if (isset($description['type'])) {
                $this->setType($description['type']);
            }

            if (isset($description['min_length'])) {
                $this->setMinLength($description['min_length']);
            }

            if (isset($description['max_length'])) {
                $this->setMaxLength($description['max_length']);
            }

            if (isset($description['pattern'])) {
                $this->setPattern($description['pattern']);
            }

            if (isset($description['required'])) {
                $this->setRequired($description['required']);
            }

            if (isset($description['mysql_description'])) {
                $this->setMysqlDescription($description['mysql_description']);
            }
            
            return true;

        } else {

            return false;
        }
    }
}