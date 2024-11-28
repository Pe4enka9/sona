<?php
/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require $_SERVER['DOCUMENT_ROOT'] . '/slug.php';

$stmt = $pdo->prepare("INSERT INTO rooms (name, slug, price, size, max_people, description)
VALUES (:name, :slug, :price, :size, :max_people, :description)");
$stmt->execute([
    'name' => $_POST['name'],
    'slug' => empty($_POST['slug']) ? createSlug($_POST['name']) : $_POST['slug'],
    'price' => $_POST['price'],
    'size' => $_POST['size'],
    'max_people' => $_POST['max_people'],
    'description' => $_POST['description']
]);
$roomId = $pdo->lastInsertId();

foreach ($_POST['services'] as $service) {
    $stmt = $pdo->prepare("INSERT INTO room_service (room_id, service_id) VALUES (:room_id, :service_id)");
    $stmt->execute([
        'room_id' => $roomId,
        'service_id' => $service
    ]);
}

header('Location: /admin/rooms/');