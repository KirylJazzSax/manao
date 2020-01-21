<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/register.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <title>Регистрация</title>
</head>
<body>
<h4>Это регистрация</h4>
<div id="response"></div>
<form id="register">
    Ваше имя <input type="text" name="name" id="name">
    Ваш логин <input type="text" name="login" id="login">
    Ваш email <input type="email" name="email" id="email">
    Ваш пароль <input type="password" name="password" id="password">
    Повторите пароль <input type="password" name="repeat_password" id="repeat_password">
</form>
<button id="register_button">Регистрируемся?</button>
<div id="validation-result"></div>

<script src="js/register.js"></script>
</body>
</html>