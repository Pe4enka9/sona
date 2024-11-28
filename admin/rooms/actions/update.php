<?php
/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require $_SERVER['DOCUMENT_ROOT'] . '/slug.php';

$id = $_POST['id'];
$name = $_POST['name'];
$slug = empty($_POST['slug']) ? createSlug($name) : $_POST['slug'];
$price = $_POST['price'];
$size = $_POST['size'];
$max_people = $_POST['max_people'];
$description = $_POST['description'];

$pdo->query("UPDATE rooms SET
name = '$name',
slug = '$slug',
price = '$price',
size = '$size',
max_people = '$max_people',
description = '$description'
WHERE id = '$id'");

$pdo->query("DELETE FROM room_service WHERE room_id = '$id'");

foreach ($_POST['services'] as $service) {
    $pdo->query("INSERT INTO room_service (room_id, service_id) VALUES ('$id', '$service')");
}

header('Location: /admin/rooms/');