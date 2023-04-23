<?php
require_once "../../../lib/database.php";

function saveUserToDatabase(PDO $connection, array $userParams): int
{
    // Добавляет пользователя в таблицу 'user' с помощью INSERT.
    // Возвращает целочисленный ID добавленного пользователя.
    $firstName = $connection->quote($userParams['first_name']);
    $lastName = $connection->quote($userParams['last_name']);
    $middleName = $connection->quote($userParams['middle_name']);
    $gender = $connection->quote($userParams['gender']);
    $birthDate = $connection->quote($userParams['birth_date']);
    $email = $connection->quote($userParams['email']);
    $phone = $connection->quote($userParams['phone']);
    $avatarPath = $connection->quote($userParams['avatar_path']);
    $query = <<<SQL
        INSERT INTO 
            user (
                first_name, 
                last_name, 
                middle_name, 
                gender, 
                birth_date, 
                email, 
                phone, 
                avatar_path
            ) 
        VALUES (
            $firstName, 
            $lastName, 
            $middleName, 
            $gender, 
            $birthDate, 
            $email,
            $phone,
            $avatarPath
        )
    SQL;
    $connection -> exec($query);
    return (int)$connection -> lastInsertId();
}

// Проверка данных формы
if (isset($_POST['last_name']) && isset($_POST['first_name']) && isset($_POST['gender']) && isset($_POST['birth_date']) && isset($_POST ['email'])) {
    $userParams = [
        'last_name' => $_POST['last_name'],
        'first_name' => $_POST['first_name'],
        'middle_name' => $_POST['middle_name'],
        'gender' => $_POST['gender'],
        'birth_date' => $_POST['birth_date'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'avatar_path' => $_POST['avatar_path']
    ];
    $connection = connectDatabase();
    saveUserToDatabase($connection, $userParams);
    echo 'Вы успешно зарегистрировались';
} else {
    echo 'Некорректные данные';
}
?>


