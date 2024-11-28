<?php
/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$id = $_POST['id'];
$is_moderated = isset($_POST['is_moderated']) ? '1' : '0';

$pdo->query("UPDATE reviews SET is_moderated = '$is_moderated' WHERE id = '$id'");

header('Location: /admin/reviews/');