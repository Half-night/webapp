<?php

class AdministrationView extends View
{

    protected function build($data = array()) {

        include APP_DIR . '/templates/admin/default.tmpl.php';
    }
}