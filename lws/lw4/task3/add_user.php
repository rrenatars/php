<?php
declare(strict_types=1);

require_once "../../../lib/database.php";

function saveUserToDatabase(PDO $connection, array $userParams): int
{
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

/**
 * @param PDO $connection
 * @param int $userId
 * @return array|null
 */

function findUserInDatabase(PDO $connection, int $userId): ?array
{
    // Извлекает пользователя с заданным ID из базы данных
    //  с помощью SELECT.
    // Возвращает ассоциативный массив либо null, если
    //  пользователь не найден
    $query = <<<SQL
       SELECT
           first_name,
           last_name,
           middle_name,
           gender,
           birth_date,
           email,
           phone,
           avatar_path
       FROM
           user
       WHERE
           user_id = $userId
    SQL;

    $statement = $connection -> query($query);
    $row = $statement -> fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        return [];
    } else {
        return $row;
    }
}

// Проверка данных формы
if ($_POST) {
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
        $userId = saveUserToDatabase($connection, $userParams);

        $redirectUrl = "/user.php?user_id=$userId";
        header('Location: ' . $redirectUrl, true, 303);
    } else {
        echo 'Некорректные данные';
    }
}











