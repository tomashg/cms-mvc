<?php


class FlashMessage
{
    static function render()
    {
        if (!isset($_SESSION['messages'])) {
            return null;
        }
        $messages = $_SESSION['messages'];
        unset($_SESSION['messages']);
        return $messages;
    }

    static function add($type, $message)
    {
        if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = [];
        }
        $_SESSION['messages'][] = [
            'type' => $type,
            'msg' => $message,
        ];
    }
}