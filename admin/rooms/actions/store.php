<?php
/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require $_SERVER['DOCUMENT_ROOT'] . '/slug.php';

$name = $_POST['name'];
$slug = empty($_POST['slug']) ? createSlug($name) : $_POST['slug'];
$price = $_POST['price'];
$size = $_POST['size'];
$max_people = $_POST['max_people'];
$description = $_POST['description'];

$stmt = $pdo->query("INSERT INTO rooms (name, slug, price, size, max_people, description)
VALUES ('$name', '$slug', '$price', '$size', '$max_people', '$description')");
$roomId = $pdo->lastInsertId();

foreach ($_POST['services'] as $service) {
    $stmt = $pdo->query("INSERT INTO room_service (room_id, service_id) VALUES ('$roomId', '$service')");
}

header('Location: /admin/rooms/');