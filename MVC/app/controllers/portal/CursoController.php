<?php

namespace app\controllers\portal;

use app\controllers\ContainerController;

class CursoController extends ContainerController {

    public function index() {
        // Implementação do método index
    }

    public function show($request) {
        $this->view([
            'title'=>'Curso',
            'curso' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis delectus quam placeat quae unde eligendi assumenda dolorem! Ipsam, fuga dignissimos laboriosam perferendis ad aliquam consectetur laudantium a, ratione minima reprehenderit.',
        ], 'portal.curso');
    }

    public function create() {
        // Implementação do método create
    }

    public function store() {
        // Implementação do método store
    }

    public function edit($id) {
        // Implementação do método edit
    }

    public function update($id) {
        // Implementação do método update
    }

    public function destroy($id) {
        // Implementação do método destroy
    }
}
