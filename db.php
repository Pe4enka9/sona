<?php
$host = "MySQL-8.2"; // database
$dbname = "docker";

return new PDO("mysql:host=$host;dbname=$dbname", "root", ""); // username: docker, password: docker