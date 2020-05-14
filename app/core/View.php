<?php

class View
{
    protected $viewFile;
    protected $viewData;
    protected $flashMessages;

    function __construct($viewFile, $viewData)
    {
        $this->viewFile = $viewFile;
        $this->viewData = $viewData;
    }

    function render()
    {
        if (file_exists(VIEW . $this->viewFile . '.php')) {
            $this->flashMessages = FlashMessage::render();
            include VIEW . $this->viewFile . '.php';
        }
    }
}