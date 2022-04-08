<?php

namespace App\Routing;

use App\Controller\ArticleController;
use App\Controller\CommentController;
use App\Controller\ErrorController;
use App\Model\Manager\CommentManager;

class ArticleRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        $errorController = new ErrorController();
        $controller = new ArticleController();

        if(null === $action) {
            $errorController->error404($action);
        }

        switch ($action) {
            case 'index':
                $controller->index();
                break;
            case 'add-article':
                $controller->addArticle();
                break;
            case 'list-article':
                $controller->listArticle();
                break;
            case 'edit-article':
                self::routeParameters($controller, 'editArticle', ['id' => 'int']);
                break;
            case 'delete-article':
                self::routeParameters($controller, 'deleteArticle', ['id' => 'int']);
                break;
            default:
                $errorController->error404($action);
        }
    }
}