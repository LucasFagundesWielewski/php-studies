<?php

namespace core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;
use Twig\Extension\TextExtension;

class Twig {

    private $twig;
    private $functions = []; // Adicionei esta propriedade para armazenar as funções

    public function load() {
        $loader = new FilesystemLoader('../app/views');
        $this->twig = new Environment($loader, [
            'debug' => true,
            'auto_reload' => true,
        ]);

        $userFunction = new TwigFunction('user', function() {
            return "dados user";
        });
        $this->twig->addFunction($userFunction);

        return $this->twig;
    }

    public function loadExtension() {
        return $this->twig->getExtension('TextExtension'); // Removi as aspas
    }

    public function loadViews() {
        return new FilesystemLoader('../app/views');
    }

    public function functionsToView($name, \Closure $callback) {
        $this->functions[] = new TwigFunction($name, $callback); // Armazenar as funções
    }

    public function loadFunctions() {
        require '../app/functions/twig.php';

        foreach ($this->functions as $function) { // Loop pelas funções armazenadas
            $this->twig->addFunction($function);
        }
    }

}
