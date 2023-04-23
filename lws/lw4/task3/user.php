<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информация о пользователе</title>
    <link href="static/css/user.css" rel="stylesheet">
</head>
<body>
    <?php include 'show_user.php'; ?>
    <?php if ($user): ?>
        <div class="data">
            <h1>Информация о пользователе</h1>
            <p>Имя: <?php echo $user['first_name']; ?></p>
            <p>Фамилия: <?php echo $user['last_name']; ?></p>
            <?php if ($user['middle_name']): ?>
                <p>Отчество: <?php echo $user['middle_name']; ?></p>
            <?php endif; ?>
            <p>Пол: <?php echo $user['gender']; ?></p>
            <p>Дата рождения: <?php echo $user['birth_date']?></p>
            <p>Email: <?php echo $user['email']; ?></p>
            <?php if ($user['phone']): ?>
                <p>Телефон: <?php echo $user['phone']; ?></p>
            <?php endif; ?>
            <?php if ($user['avatar_path']): ?>
                <p>Путь к аватарке: <?php echo $user['avatar_path']; ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</body>
</html>