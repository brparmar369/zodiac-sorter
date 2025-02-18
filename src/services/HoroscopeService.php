<?php

namespace Services;

use Factories\HoroscopeFactory;
use Models\Horoscope;

/**
 * Class HoroscopeService
 *
 * This service processes and sorts horoscope data based on the zodiac sign order.
 */

class HoroscopeService {
    /**
    * @var array List of zodiac signs in a predefined order.
    */
    private array $zodiacOrder;

    public function __construct() {
        $this->zodiacOrder = require __DIR__ . '/../../config/zodiac.php';
    }
    /**
     * Processes and sorts horoscopes based on zodiac sign order.
     *
     * @param string $jsonData JSON string containing horoscope data.
     * @return array Sorted horoscope data in array format, or an error message if invalid JSON.
     */

    public function processHoroscopes(string $jsonData): array {
        $data = json_decode($jsonData, true);

        if (!$data || !is_array($data)) {
            return ["error" => "Invalid JSON data."];
        }

        $horoscopes = [];


        foreach ($data as $item) {
            $horoscopes[] = HoroscopeFactory::createHoroscope($item);
        }


        usort($horoscopes, function (Horoscope $a, Horoscope $b) {
            return $this->getZodiacIndex($a->getTitle()) <=> $this->getZodiacIndex($b->getTitle());
        });


        return array_map(fn($h) => $h->toArray(), $horoscopes);
    }
    /**
     * Retrieves the index of a zodiac sign based on its title.
     *
     * @param string $title The title containing the zodiac sign.
     * @return int The index of the zodiac sign in the predefined order, or the last index if not found.
     */
    private function getZodiacIndex(string $title): int {
        foreach ($this->zodiacOrder as $index => $sign) {
            if (stripos($title, $sign) !== false) {
                return $index;
            }
        }
        return count($this->zodiacOrder); 
    }
}
