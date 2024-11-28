<?php
/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$room_id = $_POST['id'];
$slug = $_POST['slug'];
$name = $_POST['name'];
$email = $_POST['email'];
$rating = $_POST['rating'];
$review = $_POST['review'];

$pdo->query("INSERT INTO reviews (name, email, rating, room_id, review) VALUES ('$name', '$email', '$rating', '$room_id', '$review')");

header('Location: /room-details.php?slug=' . $slug);