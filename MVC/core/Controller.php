<?php

namespace core;

use app\exceptions\ControllerNotExistException;
use app\classes\Uri;

class Controller {

    private $uri;
    private $controller;
    private $namespace;
    private $folders = [
        'app\controllers\portal',
        'app\controllers\admin'
    ];

    public function __construct() {
        $this->uri = Uri::uri();
    }

    public function load() {
        if ($this->isHome()) {
            return $this->controllerHome();
        }

        return $this->controllerNotHome();
    }

    private function isHome() {
        return ($this->uri === "");
    }

    private function controllerHome() {
        if ($this->controllerExists('HomeController')) {
            throw new \Exception('Error: Controller não existe');
        }

        return $this->instantiateController();
    }

    private function controllerNotHome() {
        $controller = $this->getControllerNotHome();

        if (!$this->controllerExists($controller)) {
            throw new ControllerNotExistException('Esse controller não existe');
        }
        return $this->instantiateController();
    }

    private function getControllerNotHome() {

        if(substr_count($this->uri,'/') > 1) {
            list($controller) = array_values(array_filter(explode('/', $this->uri)));
            return ucfirst($controller) . 'Controller';
        }
        return ucfirst(ltrim($this->uri, '/')) . 'Controller';
    }

    private function controllerExists($controller) {
        $controllerExist = false;

        foreach ($this->folders as $folder) {
            if (class_exists($folder . '\\' . $controller)) {
                $controllerExist = true;
                $this->namespace = $folder;
                $this->controller = $controller;
                break;
            }
        }

        return $controllerExist;
    }

    private function instantiateController() {
        $controller = $this->namespace . '\\' . $this->controller;
        return new $controller;
    }
}
