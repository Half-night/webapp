<?php

class ErrorView extends View
{

    public function build($data = array()) {

        header('HTTP/1.1 404 Not Found');
        
        include APP_DIR . '/templates/common/head.tmpl.php';
        include APP_DIR . '/templates/error404.php';
        include APP_DIR . '/templates/common/footer.tmpl.php';
    }
}