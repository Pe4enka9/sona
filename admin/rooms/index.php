<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit();
}
/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$rooms = $pdo->query("SELECT
rooms.*,
GROUP_CONCAT(services.name SEPARATOR ', ') AS services_name
FROM room_service
JOIN rooms ON room_service.room_id = rooms.id
JOIN services ON room_service.service_id = services.id
GROUP BY rooms.id")->fetchAll(PDO::FETCH_ASSOC);
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

<style>
    table, th, td {
        padding: 5px;
        border: 1px solid #000;
        border-collapse: collapse;
    }
</style>

<body>

<a href="/admin/">Назад</a>
<a href="/admin/rooms/create.php">Добавить</a>

<table>
    <tr>
        <th>#</th>
        <th>Название</th>
        <th>Slug</th>
        <th>Цена</th>
        <th>Размер</th>
        <th>Макс. кол-во</th>
        <th>Описание</th>
        <th>Услуги</th>
    </tr>
    <?php foreach ($rooms as $room): ?>
        <tr>
            <td><?= $room['id'] ?></td>
            <td><?= $room['name'] ?></td>
            <td><?= $room['slug'] ?></td>
            <td><?= $room['price'] ?></td>
            <td><?= $room['size'] ?></td>
            <td><?= $room['max_people'] ?></td>
            <td><?= $room['description'] ?></td>
            <td><?= $room['services_name'] ?></td>
            <td><a href="/admin/rooms/edit.php?id=<?= $room['id'] ?>">Изменить</a></td>
            <td><a href="/admin/rooms/actions/delete.php?id=<?= $room['id'] ?>">Удалить</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>