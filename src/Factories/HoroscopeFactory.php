<?php

namespace Factories;

use Models\Horoscope;

/**
 * Class HoroscopeFactory
 *
 * A factory class responsible for creating Horoscope instances from an array of data.
 */
class HoroscopeFactory {
    /**
     *
     * @param array $data An associative array containing 'id', 'title', and 'content' keys.
     * @return Horoscope A new Horoscope object.
     */
    public static function createHoroscope(array $data): Horoscope {
        return new Horoscope($data['id'], $data['title'], $data['content']);
    }
}
