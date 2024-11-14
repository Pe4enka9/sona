<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'].'/db.php';
$id = $_GET['id'];
$service = $pdo->query("SELECT * FROM `services` WHERE id=$id")->fetch();
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
<a href="/admin/index.php">Назад</a>
<form action="/admin/actions/update.php" method="post">
    <input type="hidden" name="id" value="<?=$service['id']?>">
    <input type="text" name="name" value="<?=$service['name']?>">
    <input type="submit" value="Изменить">
</form>
</body>
</html>