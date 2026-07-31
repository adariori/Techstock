<?php
header('Content-Type: application/json');
echo json_encode([
    'php_version' => PHP_VERSION,
    'loaded_extensions' => get_loaded_extensions(),
    'pdo_drivers' => class_exists('PDO') ? PDO::getAvailableDrivers() : 'PDO class missing',
], JSON_PRETTY_PRINT);
