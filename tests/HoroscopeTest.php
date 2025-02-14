<?php

use Models\Horoscope;
use PHPUnit\Framework\TestCase;

class HoroscopeTest extends TestCase {
    public function testCreateHoroscope() {
        $horoscope = new Horoscope("123", "Weekly Aries Horoscope", "Aries content");

        $this->assertEquals("123", $horoscope->getId());
        $this->assertEquals("Weekly Aries Horoscope", $horoscope->getTitle());
        $this->assertEquals("Aries content", $horoscope->getContent());
    }
}
