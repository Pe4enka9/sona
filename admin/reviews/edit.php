<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit();
}

/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$id = $_GET['id'];

$review = $pdo->query("SELECT * FROM reviews WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
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
<a href="/admin/reviews/index.php">Назад</a>

<form action="/admin/reviews/actions/update.php" method="post">
    <input type="hidden" name="id" value="<?= $review['id'] ?>">

    <input type="checkbox" name="is_moderated" id="is_moderated" <?= $review['is_moderated'] ? 'checked' : '' ?>>
    <label for="is_moderated">Модерировано</label>
    <input type="submit" value="Изменить">
</form>
</body>
</html>