<?php

class AdministrationView extends View
{

    protected function build($data = array()) {

        $content_template = null;

        if (isset($data['section'])) {

            switch ($data['section']) {
                case 'pages':
                    $content_template =  APP_DIR . '/templates/admin/pages.tmpl.php';
                    $data['title'] = 'Pages';
                    break;

                case 'create_page':
                    $content_template =  APP_DIR . '/templates/admin/create_page.tmpl.php';
                    $data['title'] = 'Create new page';
                    break;

                case 'page_created':
                    $content_template =  APP_DIR . '/templates/admin/page_created.tmpl.php';
                    $data['title'] = 'Page was created successfully';
                    break;

                case 'edit_page':
                    $content_template =  APP_DIR . '/templates/admin/edit_page.tmpl.php';
                    $data['title'] = 'Edit page';
                    break;

                case 'page_saved':
                    $content_template =  APP_DIR . '/templates/admin/page_saved.tmpl.php';
                    $data['title'] = 'Page was saved';
                    break;

                case 'delete_page':
                    $content_template =  APP_DIR . '/templates/admin/delete_page.tmpl.php';
                    $data['title'] = 'Delete page';
                    break;

                case 'page_deleted':
                    $content_template =  APP_DIR . '/templates/admin/page_deleted.tmpl.php';
                    $data['title'] = 'Page was deleted successfully';
                    break;

                case 'page_not_found':
                    $content_template =  APP_DIR . '/templates/admin/page_not_found.tmpl.php';
                    $data['title'] = 'Page not found';
                    break;
                // default:
                //     echo "default section";
                //     break;
            }
        }

        include APP_DIR . '/templates/admin/head.tmpl.php';

        if ($content_template) {
            include $content_template;
        }

        include APP_DIR . '/templates/admin/footer.tmpl.php';
    }
}