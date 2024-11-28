<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit();
}
/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$reviews = $pdo->query("SELECT
reviews.*,
rooms.name AS room_name
FROM reviews
JOIN rooms ON reviews.room_id = rooms.id");
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

<table>
    <tr>
        <th>#</th>
        <th>Имя</th>
        <th>Почта</th>
        <th>Оценка</th>
        <th>Отзыв</th>
        <th>Название номера</th>
        <th>Модерировано</th>
        <th>Дата создания</th>
    </tr>
    <?php foreach ($reviews as $review): ?>
        <tr>
            <td><?= $review['id'] ?></td>
            <td><?= $review['name'] ?></td>
            <td><?= $review['email'] ?></td>
            <td><?= $review['rating'] ?></td>
            <td><?= $review['review'] ?></td>
            <td><?= $review['room_name'] ?></td>
            <td><?= $review['is_moderated'] ? 'Да' : 'Нет' ?></td>
            <td><?= $review['created_at'] ?></td>
            <td><a href="/admin/reviews/edit.php?id=<?= $review['id'] ?>">Изменить</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>