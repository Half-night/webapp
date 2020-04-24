<?php

class AdministrationController extends Controller
{

    public function __construct() {

        parent::__construct();

        if ($this->auth->isAdmin() !== true) {

            throw new Exception("You are NOT Administrator!");
        }
    }

    public function indexAction() {

        $view = $this->createView(AdministrationView::class);
        $view->render();
    }

    public function pagesAction() {

        $model = new CustomPageModel();

        if (isset($_GET['do']) AND $_GET['do'] === 'create') {

            // Create page

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if ($model->checkCreate($_POST) AND $model->create($_POST['url'], $_POST['title'], $_POST['description'], $_POST['content'])) {

                    $data['section'] = 'page_created';

                } else {

                    $data['errors'] = $model->getErrors(); 
                    $data['section'] = 'create_page';
                }

            } else {

                $data['section'] = 'create_page';
            }

            /*

            // TODO: Fix logic, use $_SERVER['REQUEST_METHOD']
            if (isset($_POST['url'])
                AND isset($_POST['title'])
                AND isset($_POST['description'])
                AND isset($_POST['content'])) {

                if ($model->create($_POST['url'], $_POST['title'], $_POST['description'], $_POST['content'])) {

                    $data['section'] = 'page_created';

                } else {

                    $data['section'] = 'create_page';
                }

            } else {

                $data['section'] = 'create_page';
            }

            */

        } elseif (isset($_GET['do']) AND $_GET['do'] === 'edit') {

            // Edit page

            // TODO: Fix logic, use $_SERVER['REQUEST_METHOD']

            if (isset($_GET['id']) AND $_GET['id'] != '') {

                $id = (int) $_GET['id'];

                if ($data['page'] = $model->getById($id)) {

                    if (isset($_POST['confirm']) AND $_POST['confirm'] === 'confirm') {


                        if (isset($_POST['url']) 
                            AND isset($_POST['title']) 
                            AND isset($_POST['description']) 
                            AND isset($_POST['content'])) {

                            if ($model->update($id, $_POST['url'], $_POST['title'], $_POST['description'], $_POST['content'])) {
                                
                                $data['section'] = 'page_saved';
                            }  
                        }

                    } else {

                        $data['section'] = 'edit_page';
                    }
                } else {

                    $data['section'] = 'page_not_found';
                }
            }


        } elseif (isset($_GET['do']) AND $_GET['do'] === 'delete') {

            // Delete page

            // TODO: Fix logic, use $_SERVER['REQUEST_METHOD']
            
            if (isset($_GET['id']) AND $_GET['id'] != '') {

                $id = (int) $_GET['id'];

                if ($data['page'] = $model->getById($id)) {

                    if (isset($_POST['confirm']) AND $_POST['confirm'] === 'confirm') {

                        if ($model->delete($id)) {

                            $data['section'] = 'page_deleted';
                        }

                    } else {

                        $data['section'] = 'delete_page';
                    }

                } else {

                    $data['section'] = 'page_not_found';
                }
            }

        } else {

            // Show list of pages

            $data['section'] = 'pages';
            $data['pages'] = $model->getList();
        }


        $view = $this->createView(AdministrationView::class, $data);
        $view->render();
    }
}