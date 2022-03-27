<?php
session_start();

require_once './Model/DB.php';
require_once './Model/Manager/Traits/ManagerTrait.php';
require_once './Controller/Traits/RenderViewTrait.php';

require_once './Model/Entity/User.php';
require_once './Model/Entity/Article.php';
require_once './Model/Entity/Comment.php';
require_once './Model/Entity/Role.php';

require_once './Model/Manager/ArticleManager.php';
require_once './Model/Manager/UserManager.php';
require_once './Model/Manager/CommentManager.php';

require_once './Controller/HomeController.php';
require_once './Controller/ArticleController.php';
require_once './Controller/CommentController.php';

use Controller\CommentController;
use Controller\HomeController;
use Controller\ArticleController;

if(isset($_GET['controller'])) {
    switch($_GET['controller']) {

        case 'articles':
            $controller = new ArticleController();
            $commentController = new CommentController();

            if(isset($_GET['action'])) {
                switch($_GET['action']) {
                    case 'new' :
                        $controller->addArticle($_POST);
                        break;
                    case 'update' :
                        $controller->updateArticle($_POST);
                        break;
                    case 'delete' :
                        $controller->deleteArticle($_POST);
                        break;
                    case 'newComment' :
                        $commentController->addComment($_POST);
                        break;
                    case 'updateComment' :
                        $commentController->updateComment($_POST);
                        break;
                    case 'deleteComment' :
                        $commentController->deleteComment($_POST);
                        break;
                    default:
                        break;
                }
            }
            if (isset($_GET['id'])) {
                $controller->article($_GET["id"]);
            }

            if (isset($_GET['controller2'])) {
                switch ($_GET['controller2']) {
                    case 'comments' :
                        $commentController->commentsArticle($_GET['id']);
                        break;
                    default:
                        break;
                }
            }
            else {
                $controller->articles();
            }
            break;

        default:
            break;
    }
}
else {
    $controller = new HomeController();
    $controller->homePage();
}