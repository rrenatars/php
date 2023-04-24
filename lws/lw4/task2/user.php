<?php
require_once "../../../lib/database.php";

const firstName = 'first_name';
const lastName = 'last_name';
const middleName = 'middle_name';
const gender = 'gender';
const birthDate = 'birth_date';
const email = 'email';
const phone = 'phone';
const avatarPath = 'avatar_path';

function saveUserToDatabase(PDO $connection, array $userParams): int
{
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
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    SQL;
    $statement = $connection->prepare($query);
    $statement->execute([
        $userParams[firstName],
        $userParams[lastName],
        $userParams[middleName],
        $userParams[gender],
        $userParams[birthDate],
        $userParams[email],
        $userParams[phone],
        $userParams[avatarPath]
    ]);
    return (int)$connection->lastInsertId();
}

// Проверка данных формы
if (isset($_POST[lastName]) && isset($_POST[firstName]) && isset($_POST[gender]) && isset($_POST[birthDate]) && isset($_POST [email]))
{
    $userParams = [
        'last_name' => $_POST[lastName],
        'first_name' => $_POST[firstName],
        'middle_name' => $_POST[middleName],
        'gender' => $_POST[gender],
        'birth_date' => $_POST[birthDate],
        'email' => $_POST[email],
        'phone' => $_POST[phone],
        'avatar_path' => $_POST[avatarPath]
    ];
    $connection = connectDatabase();
    saveUserToDatabase($connection, $userParams);
    echo 'Вы успешно зарегистрировались';
} else {
    echo 'Некорректные данные';
}
?>


