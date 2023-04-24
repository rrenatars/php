<?php
require_once __DIR__ . '/form_processing.php';

$userId = (int)$_GET['user_id'];
if (!$userId)
{
    echo "ID пользователя не указан";
} else {
    $connection = connectDatabase();
    $user = findUserInDatabase($connection, $userId);
    if (!$user)
    {
        echo "Пользователь с ID $userId не найден";
    }
}

require_once __DIR__ . '/user.php';