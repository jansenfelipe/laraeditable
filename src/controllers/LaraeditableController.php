<?php

namespace JansenFelipe\Laraeditable\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;

class LaraeditableController extends Controller {

    /**
     * Atualização Pessoa
     *
     * @return Response
     */
    public function postIndex() {
        var_dump(Input::all());
    }

}
