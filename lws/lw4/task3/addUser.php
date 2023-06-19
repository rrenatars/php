<?php
declare(strict_types=1);

require_once "workWithDB.php";

const firstName = 'first_name';
const lastName = 'last_name';
const middleName = 'middle_name';
const gender = 'gender';
const birthDate = 'birth_date';
const email = 'email';
const phone = 'phone';
const avatarPath = 'avatar_path';

if ($_POST)
{
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
        $userId = saveUserToDatabase($connection, $userParams);

        $redirectUrl = "/user.php?user_id=$userId";
        header('Location: ' . $redirectUrl, true, 303);
    } else
    {
        echo 'Некорректные данные';
    }
}











