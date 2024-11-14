<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$name = $_POST['name'];
$pdo->query("INSERT INTO `services`(`name`) VALUES ('$name')");
header('Location: /admin/index.php');