<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$id = $_POST['id'];
$name = $_POST['name'];
$pdo->query("UPDATE `services` SET `name`='$name' WHERE id=$id");
header('Location: /admin/index.php');
