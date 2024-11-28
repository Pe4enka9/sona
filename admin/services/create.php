<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="/admin/services/index.php">Назад</a>
<!--Ниже форма, action - это то, куда будет ссылаться форма для выполнения каких-либо действий (в данном случае добавление записи)-->
<!--method="post" - это метод, которым мы отправляем данные (всего их два: post и get)-->
<form action="/admin/services/actions/store.php" method="post">
<!--Конец формы-->

<!--    Ниже инпут, мы получаем его значение по имени, которое указываем в name (название может быть любым, но не должно повторяться)-->
    <input type="text" name="name">
<!--    Конец инпута-->

    <input type="submit" value="Добавить">
</form>
</body>
</html>