<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Password Strength</title>
</head>
    <body>
        <?php
        if (!isset($_GET['password']))
        {
            exit;
        }

        $password = $_GET['password'];
        if (preg_match('/^[a-zA-Z0-9]+$/', $password))
        {
            $len = strlen($password);
            $safety = 0;
            $safety += 4 * $len;
            $digitCount = count(array_filter(str_split($password), 'is_numeric'));
            $safety += 4 * $digitCount;
            $upperCount = 0;
            for ($i = 0; $i < $len; $i++)
            {
                $upperCount += (ctype_upper($password[$i])) ? 1 : 0;
            }
            $safety += ($upperCount > 0) ? ($len - $upperCount) * 2 : 0;
            $lowerCount = 0;
            for ($i = 0; $i < $len; $i++)
            {
                $lowerCount += (ctype_lower($password[$i])) ? 1 : 0;
            }
            $safety += ($lowerCount > 0) ? ($len - $lowerCount) * 2 : 0;
            $safety -= ($digitCount == 0 | $digitCount == $len) ? $len : 0;
            foreach (count_chars($password, 1) as $i => $val) {
                $safety -= ($val > 1) ? $val : 0;
            }
            echo "Надёжность пароля: $safety <br>";
        } else {
            echo "Ваш пароль содержит недопустимые символы";
        }

        ?>
    </body>
</html>