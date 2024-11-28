<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit();
}
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php'; // Подключение к базе данных
$id = $_GET['id']; // Получение айди услуги методом get, где name инпута = id
// (записали полученные данные в переменную $id)

// Начало запроса
$service = $pdo->query("SELECT * FROM `services` WHERE id=$id")->fetch(); // Запрос на выборку из БД (SQL запрос)
// $pdo - объект класса PDO. Если проще, то просто объект, с помощью которого мы обращаемся к нашей БД
// -> - вызов метода для объекта
// query() - метод, который отправляет и выполняет запрос написанный внутри
// fetch() - преобразование данных только первой записи в нормальный вид

// Разбор SQL запроса
// "SELECT * FROM `services` WHERE id=$id" - запрос на выборку записи в БД,
// где
// `services` - название таблицы,
// WHERE - это обязательно. Означает условие выборки, т.е. какую запись нужно выбрать (в данном случае с id равному нашей переменной $id (см. выше))
// id=$id - это значит, что мы ищем услугу, у которой id равен нашей переменной $id (см. выше)
// Конец разбора SQL запроса

// Конец запроса
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
<form action="/admin/services/actions/update.php" method="post">
<!--Конец формы-->

<!--    Ниже инпут, мы получаем его значение по имени, которое указываем в name (название может быть любым, но не должно повторяться)-->
<!--    type="hidden" - означает, что поле будет скрыто от глаз пользователя, но существовать будет-->
<!--    value="--><?php //=$service['id']?><!--" - подставляем данные полученной услуги (в данном случае её айди),-->
<!--    где-->
<!--    $service - переменная, в которой хранится вся информация о нашей услуге-->
<!--    ['id'] - обращение к определенному столбцу (в данном случае айди)-->
    <input type="hidden" name="id" value="<?=$service['id']?>">
<!--    Конец инпута-->

<!--    Тут тоже самое только с названием нашей услуги-->
    <input type="text" name="name" value="<?=$service['name']?>">
<!--    Конец инпута-->

    <input type="submit" value="Изменить">
</form>
</body>
</html>