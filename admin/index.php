<?php
session_start();
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
    <title>Admin</title>
</head>
<body>

<a href="/admin/create.php">Добавить</a>
<table>
    <tr>
        <td>#</td>
        <td>Название</td>
    </tr>
<?php foreach($services as $item):?>
<tr>
    <td><?=$item['id']?></td>
    <td><?=$item['name']?></td>
    <td><a href="/admin/edit.php?id=<?=$item['id']?>">Изменить</a></td>
    <td><a href="/admin/actions/delete.php?id=<?=$item['id']?>">Удалить</a></td>
</tr>
<?php endforeach;?>
</table>
</body>
</html>
