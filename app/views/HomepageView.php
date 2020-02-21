<?php

class HomepageView extends View
{


    public function render() {

        $data = $this->data;

        include APP_DIR . '/templates/common.tmpl.php';
    }
}