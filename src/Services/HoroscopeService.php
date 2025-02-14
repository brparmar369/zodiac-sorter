<?php

namespace Services;

use Factories\HoroscopeFactory;
use Models\Horoscope;

class HoroscopeService {
    public array $zodiacOrder;

    public function __construct() {
        $this->zodiacOrder = require __DIR__ . '/../../config/zodiac.php';
    }

    public function processHoroscopes(string $jsonData) {
        $data = json_decode($jsonData, true);

        if (!$data || !is_array($data)) {
            return ["error" => "Invalid JSON data."];
        }

        $horoscopes = [];


        foreach ($data as $item) {
            $horoscopes[] = HoroscopeFactory::createHoroscope($item);
            
        }


        usort($horoscopes, function ($atitle, $btitle) {
            return $this->getZodiacIndex($atitle->getTitle()) <=> $this->getZodiacIndex($btitle->getTitle());
        });


        return array_map(fn($harray) => $harray->toArray(), $horoscopes);
    }

    public function getZodiacIndex(string $title) {
        foreach ($this->zodiacOrder as $index => $sign) {
            if (stripos($title, $sign) !== false) {
                return $index;
            }
        }
        return count($this->zodiacOrder); 
    }
}
