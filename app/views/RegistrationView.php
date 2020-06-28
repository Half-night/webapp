<?php

class RegistrationView extends View
{

    public function build($data = array()) {

        include APP_DIR . '/templates/common/head.tmpl.php';
        include APP_DIR . '/templates/registration.tmpl.php';
        include APP_DIR . '/templates/common/footer.tmpl.php';
    }
}