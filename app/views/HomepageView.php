<?php

class HomepageView extends View
{


    public function build($data = array()) {
        
        include APP_DIR . '/templates/common/head.tmpl.php';
        include APP_DIR . '/templates/homepage.tmpl.php';
        include APP_DIR . '/templates/common/footer.tmpl.php';
    }
}