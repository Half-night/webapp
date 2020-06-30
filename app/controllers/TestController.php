<?php

class TestController extends Controller
{

    public function __construct() {

    }

    public function indexAction() {

        echo "This is test Controller" . PHP_EOL;

        $description_provider = new DataStructureDescriptionProvider(APP_DIR . '/structure_descriptions');

        //d($description_provider->getDescription('example'));

        $example = new DataStructure($description_provider->getDescription('example'));
        d($example);
    }
}