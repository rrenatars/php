<?php
define('jsonUsers', 'users.json');

function findSameUser(array $users): bool
{
    foreach ($users as $fields) {
        foreach ($fields as $key => $value) {
            if (($key == 'email' && $value == $_POST['email']) || ($key == 'phone' && $value == $_POST['phone'])) {
                return true;
            }
        }
    }
    return false;
}

// Проверка данных формы
if (isset($_POST['last_name']) && isset($_POST['first_name']) && isset($_POST['gender']) && isset($_POST['birth_date']) && isset($_POST ['email'])) {
    $user = [
        'last_name' => $_POST['last_name'],
        'first_name' => $_POST['first_name'],
        'middle_name' => $_POST['middle_name'],
        'gender' => $_POST['gender'],
        'birth_date' => $_POST['birth_date'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'avatar_path' => $_POST['avatar_path']
    ];
    // Сохраняем пользовательские данные в файл JSON
    $json = file_get_contents(jsonUsers);
    $users = json_decode($json, true);
    $usersArr[] = $user;
    if (!file_get_contents(jsonUsers)) {
        file_put_contents(jsonUsers, json_encode($usersArr, JSON_UNESCAPED_UNICODE));
        echo 'Вы успешно зарегистрировались';
    } else {
        if (!findSameUser($users)) {
            file_put_contents(jsonUsers, json_encode($usersArr, JSON_UNESCAPED_UNICODE));
            echo 'Вы успешно зарегистрировались';
        } else {
            echo 'Данный пользователь уже зарегистрирован';
        }
    }
} else {
    echo 'Некорректные данные';
}
?>



