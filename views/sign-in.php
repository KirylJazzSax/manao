<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/auth.css">
    <title>Document</title>
</head>
<body>
    <h4>Авторизация</h4>
    <div id="errors"></div>
    <form id="auth">
        Ваш Логин<input type="text" id="login" name="login" required>
        Ваш Пароль<input type="password" id="password" name="password" required>
    </form>
    <button id="auth-button">Авторизация</button>
    <script src="js/auth.js"></script>
</body>
</html>