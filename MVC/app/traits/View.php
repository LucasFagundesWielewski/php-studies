<?php

namespace app\traits;

use core\Twig;

trait View {

    private function twig() {
        $twig = new Twig;
        $twig->load(); // Carregar o ambiente Twig
        $twig->loadExtension(); // Carregar extensões do Twig
        $twig->loadFunctions(); // Carregar funções personalizadas do Twig
        return $twig->load(); // Retornar o ambiente Twig
    }

    public function view($data, $view) {
        $template = $this->twig()->load(str_replace(".", "/", $view) . ".html");
        return $template->display($data); 
    }
}
