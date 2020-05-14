<?php


class Database
{
    private static function connect()
    {
        $dsn = 'mysql:dbname=cms;host=localhost';
        $user = 'root';
        $password = '';
        $db = new PDO($dsn, $user, $password);
        return $db;
    }

    static function query($query, $params = [])
    {
        $sth = self::connect()->prepare($query);
        if ($params) {
            foreach ($params as $key => $value) {
                $sth->bindValue(':' . $key, $value);
            }
        }
        $sth->execute();
        if ((strpos($query, 'SELECT') !== false)) {
            $result = $sth->fetchAll();
            return $result;
        }
    }

}