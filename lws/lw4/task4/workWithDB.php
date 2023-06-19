<?php
declare(strict_types=1);

require_once "../../../lib/database.php";

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

/**
 * @param PDO $connection
 * @param int $userId
 * @return array|null
 */

function findUserInDatabase(PDO $connection, int $userId): array
{
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

    if (!$row)
    {
        return [];
    } else
    {
        return $row;
    }
}