<?php

abstract class View
{

    protected $data = array();
    protected $theme = 'default';
    
    public function __construct($data = array()) {
        
        $this->data = $data;
    }


    abstract protected function build($data = array());

    public function render() {

        $data = $this->processData($this->data);

        $this->build($data);
    }

    private function processData($data) {

        $data['title'] = (isset($data['title'])) ? $data['title'] : '';
        $data['description'] = (isset($data['description'])) ? $data['description'] : '';
        $data['keywords'] = (isset($data['keywords'])) ? $data['keywords'] : '';
        $data['robots'] = (isset($data['robots'])) ? $data['robots'] : 'noindex, nofollow';
        $data['theme'] = (isset($data['theme'])) ? $data['theme'] : 'default';

        return $data;
    }

    public function setData(array $data = array()) {

        if (is_array($data)) {

            foreach ($data as $key => $value) {

                $this->data[$key] = $value;
            }

            return true;
            
        } else {

            return false;
        }
    }
}