<?php
namespace App\Infra\Controllers;

abstract class Controller {

    public function jsonResponse($response, $code = 200) {
        http_response_code($code);
        echo json_encode($response);
    }

}