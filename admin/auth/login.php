<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . "/db.php";  // Подключение к базе данных

session_start(); // Начало сессии

$login = $_POST["login"]; // Получение логина методом post, где name инпута = login
// (записали полученные данные в переменную $login)

$password = $_POST["password"]; // Получение пароля методом post, где name инпута = password
// (записали полученные данные в переменную $password)

$admin = $pdo->query("SELECT * FROM admin WHERE login = $login")->fetch(PDO::FETCH_ASSOC);

if (!$admin || $admin['password'] !== $password) {
    header('Location: /admin/login.php');
    exit();
}

$_SESSION['user'] = $admin['id'];
header('Location: /admin/index.php');