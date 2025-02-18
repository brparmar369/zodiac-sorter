<?php

use Models\Horoscope;
use PHPUnit\Framework\TestCase;
/**
 * Class HoroscopeTest
 *
 * Unit tests for the Horoscope class.
 */
class HoroscopeTest extends TestCase {
    /**
     * Tests the creation of a Horoscope object and ensures that 
     * its properties are correctly assigned and retrieved.
     */
    public function testCreateHoroscope() {
        $horoscope = new Horoscope("123", "Weekly Aries Horoscope", "Aries content");

        $this->assertEquals("123", $horoscope->getId());
        $this->assertEquals("Weekly Aries Horoscope", $horoscope->getTitle());
        $this->assertEquals("Aries content", $horoscope->getContent());
    }
}