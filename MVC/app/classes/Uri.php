<?php

namespace app\classes;

class Uri {
    public static function uri() {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }
}
