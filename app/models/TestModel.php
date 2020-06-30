<?php

class TestModel extends Model
{

    private $storage = null;
    private $description_provider = null;

    public function __construct() {

        $this->description_provider = new DataStructureDescriptionProvider(APP_DIR . '/structure_descriptions');
        
        $db_config = Config::get('mysql');

        $this->storage = new MysqlDataStructureStorage(
            $db_config['host'],
            $db_config['user'],
            $db_config['password'],
            $db_config['db_name']
        );

    }

    public function get() {

        $example_description = $this->description_provider->getDescription('example');
        $example = new DataStructure($example_description);
        $example->load(array('url' => 'hey_there', 'title' => 'This is my very best page!', 'content' => '<h1>Hellom world!</h1>'));

        //$this->storage->connect();
        //d($this->storage->insert($example));
        //$this->storage->disconnect();

    }

    public function add() {

    }

    public function update() {

    }

    public function delete() {


    }
}