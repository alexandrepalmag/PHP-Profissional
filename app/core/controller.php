<?php

function controller($matchedUri, $params)
{

    //list($controller, $method) = explode('@', array_values($matchedUri)[0]); OU
    [$controller, $method] = explode('@', array_values($matchedUri)[0]);
    $controllerWithNamespace = CONTROLLER_PATH . $controller;

    if (!class_exists($controllerWithNamespace)) {

        throw new Exception("Controller {$controller} does not exist!!!");
    }

    $controllerInstance = new $controllerWithNamespace;

    if (!method_exists($controllerInstance, $method)) {

        throw new Exception("Method {$method} does not exist in controller {$controller}");
    }

    $controllerInstance->$method($params);
}
