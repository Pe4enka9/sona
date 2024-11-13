<?php
session_start();
/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$services = $pdo->query("SELECT * FROM services")->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
<a href="">Добавить</a>
<table>
    <tr>
        <td>#</td>
        <td>Название</td>
    </tr>
<?php foreach($services as $item):?>
<tr>
    <td><?= $name['name']?></td>
    <td><h1><?=$item['name']?></h1></td>
    <td><a href="">Изменить</a></td>
    <td><a href="">Удалить</a></td>
</tr>
<?php endforeach;?>
</table>
</body>
</html>
