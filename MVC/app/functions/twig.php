<?php

class Exemplo {
    private $functions = [];

    public function adicionarFuncao() {
        $this->functions[] = $this->functionsToView('user', function() {
            return 'dados user';
        });
    }

    private function functionsToView($name, $function) {
        // Aqui você pode implementar a lógica necessária para processar a função
        return [
            'name' => $name,
            'function' => $function
        ];
    }
}
