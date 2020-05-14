<?php


class Controller
{
    protected $view;
    protected $model;

    function view($viewName, $data = [])
    {
        $this->view = new View($viewName, $data);
        return $this->view;
    }

    function model($modelName, $data = [])
    {
        if (file_exists(MODEL . $modelName . '.php')) {
            include MODEL . $modelName . '.php';
            $this->model = new $modelName;
        }
    }
}