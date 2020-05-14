<?php


class Application
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    function __construct()
    {
        $this->parseUrl();
        if (file_exists(CONTROLLER . $this->controller . '.php')) {
            $this->controller = new $this->controller;
            if (method_exists($this->controller, $this->method)) {
                call_user_func_array([$this->controller, $this->method], $this->params);
            }
        }

    }

    protected function parseUrl()
    {
       $request = trim($_SERVER['REQUEST_URI'], DIRECTORY_SEPARATOR);
       if (!empty($request)) {
           $url = explode(DIRECTORY_SEPARATOR, $request);
           $this->controller = (isset($url[0])) ? $url[0] : 'home';
           $this->method = (isset($url[1])) ? $url[1] : 'index';
           unset($url[0], $url[1]);
           $this->params = (!empty($url)) ? array_values($url) : [];
       }
    }
}