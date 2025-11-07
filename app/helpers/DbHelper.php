<?php

class DbHelper
{
    public static function tryCreateDB()
    {
        try {
            $pdo = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASSWORD);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
        } catch (PDOException $e) {
            die("Error creando la base de datos: " . $e->getMessage());
        }
    }

    public static function deployIfEmpty(PDO $db, $sqlFilePath)
    {
        $query = $db->query("SHOW TABLES");
        $tables = $query->fetchAll();

        if (count($tables) === 0) {
            if (!file_exists($sqlFilePath)) {
                die("Archivo SQL no encontrado: " . $sqlFilePath);
            }

            $sql = file_get_contents($sqlFilePath);
            $db->exec($sql);
        }
    }
}
