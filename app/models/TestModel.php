<?php

class TestModel extends Model
{

    private $storage = null;
    private $structure_provider = null;

    public function __construct() {

        DataStructureProvider::setDirectory(APP_DIR . '/structure_descriptions');
        //$this->structure_provider = new DataStructureProvider(APP_DIR . '/structure_descriptions');
        
        $db_config = Config::get('mysql');

        $this->storage = new MysqlDataStructureStorage(
            $db_config['host'],
            $db_config['user'],
            $db_config['password'],
            $db_config['db_name']
        );

    }

    public function get() {

        //$example = $this->structure_provider->get('example');
        //$example->load(array('url' => 'hey_there', 'title' => 'This is my very best page!', 'content' => '<h1>Hellom world!</h1>'));

        //return $example;

        //$this->storage->connect();
        //d($this->storage->insert($example));
        //$this->storage->disconnect();


        $product = DataStructureProvider::get('test');

        $this->storage->connect();
        $result = $this->storage->get($product->getDescription());
        $this->storage->disconnect();

        return $result;

    }

    public function add() {

        //$product = $this->structure_provider->get('test');
        $product = DataStructureProvider::get('test');

        $product->loadDescribed($_POST);

        $product->validateField('brand');
        $product->validateField('model');
        $product->validateField('description');
        $product->validateField('color');
        $product->validateField('price');

        if($product->errors) {

            
            foreach ($product->getAll() as $name => $value) {

                $product_responce[$name]['value'] = $value;

                if (isset($product->errors[$name])) {

                    $product_responce[$name]['errors'] = $product->errors[$name];
                }
            }


            // Another structure of the array

            /*
            foreach ($product->getAll() as $name => $value) {

                $product_responce['values'][$name] = $value;

                if (isset($product->errors[$name])) {

                    $product_responce['errors'][$name] = $product->errors[$name];
                }
            }
            */

            //$data['form_data'] = $product->getAll();
            //$this->errors = $product->errors;

            return $product_responce;
        } else {

            $this->storage->connect();
            $result = $this->storage->insert($product);
            $this->storage->disconnect();

            if ($result === true) {

                return true;
            } else {

                return false;
            }
        }
    }

    public function update() {

    }

    public function delete() {


    }
}