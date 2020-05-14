<?php


class muser extends Database
{
    function isAuthenticated($login, $password)
    {
        $result = false;
        $data = [
            'username' => $login,
            'password' => $password,
        ];
        $query = self::query('SELECT userId FROM cms.users WHERE username=:username AND password=:password', $data);
        if (!empty($query[0]['userId'])) {
            $result = true;
        }
        return $result;
    }

    function isUserInDb($login)
    {
        $result = false;
        $query = self::query('SELECT userId FROM cms.users WHERE username=:username', ['username' => $login]);
        if (!empty($query[0]['userId'])) {
            $result = true;
        }
        return $result;
    }

    function register($login, $password)
    {
        $query = 'INSERT INTO cms.users (`username`, `password`) VALUES (:username, :password);';
        $data = [
            'username' => $login,
            'password' => $password,
        ];
        self::query($query, $data);
    }

    function getUserId()
    {
        $result = null;
        if (isset($_SESSION['login']) && $_SESSION['login']) {
            $query = self::query('SELECT userId FROM cms.users WHERE username=:username', ['username' => $_SESSION['login']]);
            if (!empty($query[0]['userId'])) {
                $result = $query[0]['userId'];
            }
        }
        return $result;
    }
}