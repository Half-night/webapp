<?php

class CustomPageView extends View
{


    public function render() {

        $data = $this->data;

        include APP_DIR . '/templates/common/head.tmpl.php';
        include APP_DIR . '/templates/page.tmpl.php';
        include APP_DIR . '/templates/common/footer.tmpl.php';
    }
}