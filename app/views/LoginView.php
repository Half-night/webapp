<?php

class LoginView extends View
{

    public function render() {

        $data = $this->data;
        
        include APP_DIR . '/templates/common/head.tmpl.php';
        include APP_DIR . '/templates/login.tmpl.php';
        include APP_DIR . '/templates/common/footer.tmpl.php';
    }
}