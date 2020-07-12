<?php

class TestModel extends Model
{

    private $storage = null;
    //private $structure_provider = null;

    public function __construct() {

        DataStructureProvider::setDirectory(APP_DIR . '/structure_descriptions');
        
        $db_config = Config::get('mysql');

        $this->storage = new MysqlDataStructureStorage(
            $db_config['host'],
            $db_config['user'],
            $db_config['password'],
            $db_config['db_name']
        );

    }

    public function get() {

        $product = DataStructureProvider::get('test');

        $this->storage->connect();
        $result = $this->storage->get($product->getDescription());
        $this->storage->disconnect();

        return $result;

    }

    public function getById($id) {

        $product = DataStructureProvider::get('test');

        $this->storage->connect();
        $result = $this->storage->getById($product->getDescription(), $id);
        $this->storage->disconnect();

        return $result;

    }

    public function add() {

        $product = DataStructureProvider::get('test');

        $product->loadDescribed($_POST);

        $product->validateField('brand');
        $product->validateField('model');
        $product->validateField('description');
        $product->validateField('color');
        $product->validateField('price');

        if($product->errors) {
 
            $this->errors['validation_errors'] = $product->errors;

            return $product->getAll();

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

    public function update($id) {

        $product = DataStructureProvider::get('test');
        
        $product->load(array('id' => $id));
        $product->loadDescribed($_POST);

        $product->validateField('brand');
        $product->validateField('model');
        $product->validateField('description');
        $product->validateField('color');
        $product->validateField('price');

        if($product->errors) {
 
            $this->errors['validation_errors'] = $product->errors;

            return $product->getAll();

        } else {

            $this->storage->connect();
            $result = $this->storage->update($product);
            $this->storage->disconnect();

            if ($result === true) {

                return true;
            } else {

                return false;
            }
        }

    }

    public function delete() {


    }
}