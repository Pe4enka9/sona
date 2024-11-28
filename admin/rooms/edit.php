<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit();
}

/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$services = $pdo->query("SELECT * FROM services")->fetchAll(PDO::FETCH_ASSOC);

$id = $_GET['id'];
$room = $pdo->query("SELECT
rooms.*,
GROUP_CONCAT(services.id SEPARATOR ', ') AS services_name
FROM room_service
JOIN rooms ON room_service.room_id = rooms.id
JOIN services ON room_service.service_id = services.id
WHERE rooms.id = $id
GROUP BY rooms.id")->fetch(PDO::FETCH_ASSOC);
$roomServices = explode(', ', $room['services_name']);
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
<a href="/admin/rooms/index.php">Назад</a>

<form action="/admin/rooms/actions/update.php" method="post">
    <input type="hidden" name="id" value="<?= $room['id'] ?>">
    <input type="text" name="name" placeholder="Название" value="<?= $room['name'] ?>">
    <input type="text" name="slug" placeholder="Slug" value="<?= $room['slug'] ?>">
    <input type="number" name="price" placeholder="Цена" value="<?= $room['price'] ?>">
    <input type="number" name="size" placeholder="Размеры" value="<?= $room['size'] ?>">
    <input type="number" name="max_people" placeholder="Макс. человек" value="<?= $room['max_people'] ?>">
    <select name="services[]" multiple>
        <?php foreach ($services as $service): ?>
            <option value="<?= $service['id'] ?>" <?= in_array($service['id'], $roomServices) ? 'selected' : '' ?>><?= $service['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <textarea name="description" id="editor" placeholder="Описание"><?= $room['description'] ?></textarea>
    <input type="submit" value="Изменить">
</form>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
</body>
</html>