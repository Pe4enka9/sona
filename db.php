<?php
$host = "MySQL-8.2"; // database/MySQL-8.2
$dbname = "docker";

return new PDO("mysql:host=$host;dbname=$dbname", "root", ""); // username: docker/root, password: docker/...