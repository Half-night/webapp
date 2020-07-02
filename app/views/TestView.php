<?php

class TestView extends View
{


    public function build($data = array()) {
        $form_data = ( isset($data) ) ? $data : array();

        include APP_DIR . '/templates/common/head.tmpl.php';
        include APP_DIR . '/templates/test.tmpl.php';
        include APP_DIR . '/templates/common/footer.tmpl.php';
    }
}