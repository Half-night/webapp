<?php

class DataStructure extends Data
{

    public $errors = null;
    private $description = null;

    public function __construct(DataStructureDescription $description) {

        $this->description = $description;
    }

    public function getDescription() {

        return $this->description;
    }

    public function validateField($field_name) {

        string_hint($field_name);
        
        if ( !$field_description = $this->description->get($field_name) ) {

            $this->errors[$field_name]['unacceptable'] = 'The "' . $field_name . '" field is not described in the structure "'
            . $this->description->getName() . '"';
            return false;
        } 

        if ( is_null($field = $this->get($field_name)) OR empty($field) ) {

            $this->errors[$field_name]['not_set'] = 'The "' . $field_name . '" field is not set';

            if ( $field_description->getRequired() ) {

                $this->errors[$field_name]['required'] = 'The value of the "' . $field_name . '" field is required';
            }
            return false;
        }

        $errors = array();

        if ( !in_array( $field_description->getType(),
            FieldDescription::${ str_replace('double', 'float', gettype($field)) .'_types' } ) ) {

            $errors['invalid_type'] = 'The value of the "' . $field_name . '" field is of invalid type';

        } else {

            if ( $min_length = $field_description->getMinLength() AND strlen((string) $this->get($field_name)) <  $min_length ) {

                $errors['too_short'] = 'The value of the "' . $field_name . '" field is too short';
            }

            if ( $max_length = $field_description->getMaxLength() AND strlen((string) $this->get($field_name)) >  $max_length ) {

                $errors['too_long'] = 'The value of the "' . $field_name . '" field is too long';
            }

            if ( $pattern = $field_description->getPattern() AND !preg_match($pattern, $this->get($field_name)) ) {

                $errors['pattern_matching'] = 'The value of the "' . $field_name . '" field doesn\'t match the pattern';
            }
        }


        if (count($errors) > 0) {

            $this->errors[$field_name] = $errors;
            return false;
        } else {

            return true;
        }
    }

    public function sanitizeField($field_name) {

        string_hint($field_name);

        if ( !$field_description = $this->description->get($field_name) OR !$field = $this->get($field_name) ) {

            return false;
        }
        

        if ( in_array( $field_description->getType(), FieldDescription::$float_types ) ) {

            return $this->set($field_name, (float) $field);
        } elseif ( in_array( $field_description->getType(), FieldDescription::$integer_types ) ) {

            return $this->set($field_name, (int) $field);
        } elseif ( in_array( $field_description->getType(), FieldDescription::$string_types ) ) {

            return $this->set($field_name, (string) $field);
        } elseif ( in_array( $field_description->getType(), FieldDescription::$boolean_types ) ) {

            return $this->set($field_name, (boolean) $field);
        }
    }

    public function load(array $data) {

        foreach ($data as $name => $value) {

            if ( $this->description->get($name) ) {

                $this->set($name, $value);
            } else {

                $errors[$name] = 'The "' . $name . '" field is not described in the structure "'
                 . $this->description->getName() . '"';
                $this->errors = $errors;

            }
        }
    }

    // Testing

    public function loadDescribed(array $data) {

        $fields = $this->description->getAll();

        foreach ($fields as $field) {

            if ( isset($data[$field->getName()]) ) {

                $this->set($field->getName(), $data[$field->getName()]);
            }
        }
    }
}