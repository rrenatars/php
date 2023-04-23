<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Form.</title>
    </head>
    <body>
        <h1>Форма ввода данных</h1>
        <form action="user.php" method="POST">
            <p>Фамилия: <input type="text" name="last_name" required="required" ></p>
            <p>Имя: <input type="text" name="first_name" required="required"></p>
            <p>Отчество: <input type="text" name="middle_name"></p>
            <p>Выберите свой пол:
                Мужчина <input type = "radio" name = "gender" value = "male" checked> <br>
                Женщина <input type = "radio" name = "gender" value = "female"> <br>
            </p>
            <label for="date">Дата рождения: </label>
            <input type="date" id="date" name="birth_date" required="required">
            <p>Email: <input type="email" name="email" required="required"></p>
            <p>Номер телефона: <input type="tel" name="phone"></p>
            <p>Ваш аватар: <input type="file" name="avatar_path"></p>
            <input type="submit" value="Отправить">
        </form>
    </body>
</html>