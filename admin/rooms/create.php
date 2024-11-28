<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit();
}

/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$services = $pdo->query("SELECT * FROM services")->fetchAll(PDO::FETCH_ASSOC);
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

<form action="/admin/rooms/actions/store.php" method="post">
    <input type="text" name="name" placeholder="Название">
    <input type="text" name="slug" placeholder="Slug">
    <input type="number" name="price" placeholder="Цена">
    <input type="number" name="size" placeholder="Размеры">
    <input type="number" name="max_people" placeholder="Макс. человек">
    <select name="services[]" multiple>
        <?php foreach ($services as $service): ?>
            <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <textarea name="description" id="editor" placeholder="Описание"></textarea>
    <input type="submit" value="Добавить">
</form>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
</body>
</html>