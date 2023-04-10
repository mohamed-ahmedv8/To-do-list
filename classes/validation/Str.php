<?php

use toDo\Classes\Validation\Validator;

require_once 'validatior.php';
class Str implements Validator
{
    public function check($key, $value)
    {
        if (is_numeric($value)) {
            return "$key must be string";
        } else {
            return false;
        }
    }
}
