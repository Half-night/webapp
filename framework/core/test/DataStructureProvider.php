<?php

class DataStructureProvider
{

    private $description_provider = null;

    public function __construct($descriptions_dir) {

        $this->description_provider = new DataStructureDescriptionProvider($descriptions_dir);
    }

    public function get($structure_name) {

        if (!is_null($this->description_provider)) {

            $description = $this->description_provider->getDescription($structure_name);
            return  new DataStructure($description);
        } else {

            return null;
        }
        
    }
}