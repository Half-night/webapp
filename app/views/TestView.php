<?php

class TestView extends View
{


    public function build($data = array()) {
        
        $content_template = (isset($data['template'])) ? $data['template'] : 'default';

        if (isset($data['form_data'])) {

            $form_data = $data['form_data'];
            d($form_data);
        }
        include APP_DIR . '/templates/common/head.tmpl.php';

        include APP_DIR . '/templates/' . $content_template . '.tmpl.php';
        include APP_DIR . '/templates/common/footer.tmpl.php';
    }
}