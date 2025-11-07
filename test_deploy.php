<?php
require_once __DIR__ . '/app/models/Model.php';
// testeado en terminal (php test_deploy.php)

try {
    $model = new Model(); // ejecuta _deploy
    echo "Deployed";

} catch (PDOException $e) {
    echo "Error";
}