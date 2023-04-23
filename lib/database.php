<?php
const jsonParams = 'params.json';

/**
 * @return array{dsn:string,username:string,password:string}
 */
function getConnectionParams(): array
{
    $json = file_get_contents(jsonParams);
    $users = json_decode($json, true);
    foreach ($users as $fields) {
        $params = $fields;
    }
    return $params;
}

function connectDatabase(): PDO
{
    $params = getConnectionParams();
    $dsn = $params['dsn'];
    $user = $params['user'];
    $password = $params['password'];
    return new PDO($dsn, $user, $password);
}