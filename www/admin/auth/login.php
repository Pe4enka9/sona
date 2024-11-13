<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT']. "/db.php";

session_start();

$login = $_POST["login"];
$password = $_POST["password"];


$adminQuery = $pdo
    ->prepare("SELECT * FROM admin WHERE login = :login");

$adminQuery->execute(['login' => $login]);

$admin = $adminQuery->fetch(PDO::FETCH_ASSOC);

if (!$admin ||$admin['password'] !== $password) {
    header('Location: /login.php');
    exit();
}

$_SESSION['user'] = $admin['id'];
header('Location: /admin/index.php');