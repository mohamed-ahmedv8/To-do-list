<?php

namespace toDo\Classes;

class Request
{
    public function get($key = null)
    {
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }
    public function post($key = null)
    {
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }
    public function hasPost($key)
    {
        return isset($key);
    }
    public function clean($key)
    {
        return trim((htmlspecialchars($key)));
    }
    public function methodCheck()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    public function header($file)
    {
        header("location:$file");
        exit;
    }
}
