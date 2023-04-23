<?php
require_once 'add_user.php';

$userId = (int)$_GET['user_id'];
if (!$userId) {
    echo "Пользователь с ID $userId не найден";
} else {
    $connection = connectDatabase();
    $user = findUserInDatabase($connection, $userId);
    if (!$user) {
        echo "Пользователь с ID $userId не найден";
    }
}
