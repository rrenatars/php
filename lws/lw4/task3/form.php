<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Form.</title>
        <link href="static/css/form.css" rel="stylesheet">
    </head>
    <body>
        <div class="data">
            <h1>Форма ввода данных</h1>
            <form action="form_processing.php" method="POST">
                <label >Фамилия: <input class="data__input" type="text" name="last_name" required="required" ></label>
                <label>Имя: <input class="data__input" type="text" name="first_name" required="required"></label>
                <label>Отчество: <input class="data__input" type="text" name="middle_name"></label>
                <label>Выберите свой пол:<br>
                    <input class="data__input" type="radio" name = "gender" value = "Мужской" checked>Мужчина <br>
                    <input class="data__input" type="radio" name = "gender" value = "Женский">Женщина <br>
                </label>
                <label for="date">Дата рождения: </label>
                <label><input class="data__input" type="date" id="date" name="birth_date" required="required"></label>
                <label>Email: <input class="data__input" type="email" name="email" required="required"></label>
                <label>Номер телефона: <input class="data__input" type="tel" name="phone"></label>
                <label>Ваш аватар: <input class="data__input" type="file" name="avatar_path"></label>
                <br>
                <label><input class="data__input" type="submit" value="Отправить"></label>
            </form>
        </div>
    </body>
</html>