<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Form.</title>
        <link href="static/css/main.css" rel="stylesheet">
    </head>
    <body>
        <h1>Форма ввода данных</h1>
        <form action="user.php" method="POST">
            <label>Фамилия: <input type="text" name="last_name" required="required" ></label>
            <label>Имя: <input type="text" name="first_name" required="required"></label>
            <label>Отчество: <input type="text" name="middle_name"></label>
            <label>Выберите свой пол:
                Мужчина <input type = "radio" name = "gender" value = "male" checked> <br>
                Женщина <input type = "radio" name = "gender" value = "female"> <br>
            </label>
            <label for="date">Дата рождения: </label>
            <input type="date" id="date" name="birth_date" required="required">
            <label>Email: <input type="email" name="email" required="required"></label>
            <label>Номер телефона: <input type="tel" name="phone"></label>
            <label>Ваш аватар: <input type="file" name="avatar_path"></label>
            <br>
            <input type="submit" value="Отправить">
        </form>
    </body>
</html>