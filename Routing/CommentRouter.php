<?php

namespace App\Routing;

use App\Controller\AbstractController;
use App\Controller\CommentController;
use App\Controller\ErrorController;
use App\Model\Manager\CommentManager;

class CommentRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        $errorController = new ErrorController();
        $controller = new CommentController();

        if(null === $action) {
            $errorController->error404($action);
        }

        switch ($action) {
            case 'index':
                $controller->index();
                break;
            case 'add-comment':
                self::routeParameters($controller, 'addComment', ['id' => 'int']);
                break;
            case 'list-comment':
                $controller->listComment();
                break;
            case 'delete-comment':
                self::routeParameters($controller, 'deleteComment', ['id' => 'int']);
                break;
            default:
                $errorController->error404($action);
        }
    }
}