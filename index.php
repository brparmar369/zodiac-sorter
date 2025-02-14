<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/src/Models/Horoscope.php';
require_once __DIR__ . '/src/Factories/HoroscopeFactory.php';
require_once __DIR__ . '/src/Services/HoroscopeService.php';

use Services\HoroscopeService;

$jsonData = file_get_contents(DATA_FILE);

if (!$jsonData) {
    die("Error: Unable to read horoscope data.");
}

$sorter = new HoroscopeService();
$sortedZodiacs = $sorter->processHoroscopes($jsonData);


header('Content-Type: application/json');
echo json_encode($sortedZodiacs, JSON_PRETTY_PRINT);