<?php

namespace Factories;

use Models\Horoscope;

class HoroscopeFactory {
    public static function createHoroscope(array $data) {
        return new Horoscope($data['id'], $data['title'], $data['content']);
    }
}
