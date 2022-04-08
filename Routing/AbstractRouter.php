<?php

namespace App\Routing;

use App\Controller\AbstractController;
use App\Controller\ErrorController;

abstract class AbstractRouter
{
    /**
     * @param string|null $action
     * @return mixed
     */
    abstract public static function route(?string $action = null);

    /**
     * @param AbstractController $controller
     * @param string $method
     * @param array $params
     * @return void
     */
    public static function routeParameters(AbstractController $controller, string $method, array $params): void
    {
        $args = [];
        foreach ($params as $param => $type) {
            if(!isset($_GET[$param])) {
                (new ErrorController())->error404($param);
                return;
            }

            $arg = self::secure($_GET[$param]);
            settype($arg, $type);
            $args[] = $arg;
        }

        $controller->$method(...$args);
    }

    /**
     * @param string|null $param
     * @return string|null
     */
    public static function secure(?string $param): ?string
    {
        if(null === $param) {
            return null;
        }

        $param = strip_tags($param);
        $param =  trim($param);
        return strtolower($param);
    }
}