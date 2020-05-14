<?php


class user extends Controller
{
    function login()
    {
        $this->view('user/login');
        $this->view->render();

        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            $login = trim($_POST['login']);
            $password = trim($_POST['password']);
            $this->model('muser');
            $isAuthenticated = $this->model->isAuthenticated($login, $password);
            if ($isAuthenticated) {
                $_SESSION['login'] = $login;
                header('Location: /');
                exit;
            }
        }
    }

    function logout()
    {
        session_destroy();
        header('Location: /');
        exit;
    }

    function register()
    {
        $this->view('user/register');
        $this->view->render();
        
        if (!empty($_POST['submit'])) {
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                $login = trim($_POST['login']);
                $password = trim($_POST['password']);
                $this->model('muser');
                if (!$this->model->isUserInDb($login)) {
                    $this->model->register($login, $password);
                    header('Location: /');
                    exit;
                } else {
                    FlashMessage::add('danger', 'This username is already taken');
                }
            } else {
                FlashMessage::add('danger', 'Username and password are required');
            }
        }
    }
}