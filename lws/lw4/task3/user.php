<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информация о пользователе</title>
    <link href="static/css/user.css" rel="stylesheet">
</head>
<body>
    <?php require_once 'show_user.php'; ?>
    <?php if ($user): ?>
        <div class="data">
            <h1>Информация о пользователе</h1>
            <p>Имя: <?= htmlentities($user[firstName]) ?></p>
            <p>Фамилия: <?= htmlentities($user[lastName]) ?></p>
            <?php if ($user[middleName]): ?>
                <p>Отчество: <?= htmlentities($user[middleName]) ?></p>
            <?php endif; ?>
            <p>Пол: <?= htmlentities($user[gender]) ?></p>
            <p>Дата рождения: <?= htmlentities($user[birthDate]) ?></p>
            <p>Email: <?= htmlentities($user[email]) ?></p>
            <?php if ($user[phone]): ?>
                <p>Телефон: <?= htmlentities($user[phone]) ?></p>
            <?php endif; ?>
            <?php if ($user[avatarPath]): ?>
                <p>Путь к аватарке: <?= htmlentities($user[avatarPath]) ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</body>
</html>