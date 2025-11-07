<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'soundsnack');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

/* La URL base Normalmente quedaría como
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
pero si estoy ejecutando desde a linea de comandos u otros entornos que no tienen las variables de $_SERVER
tengo que tener otras consideraciones, usamos valores por defecto (despues de los "??") */
$serverName = $_SERVER['SERVER_NAME'] ?? 'localhost';
$serverPort = $_SERVER['SERVER_PORT'] ?? '80';
$scriptDir  = dirname($_SERVER['PHP_SELF']) ?: '';

define('BASE_URL', '//' . $serverName . ($serverPort != 80 ? ':' . $serverPort : '') . $scriptDir . '/');