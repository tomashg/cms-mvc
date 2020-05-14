<?php


class Home extends Controller
{
    function index()
    {
        $this->view('home/index');
        $this->view->render();
    }

    function test()
    {
        echo 'test';
    }
}