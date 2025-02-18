<?php

use Services\HoroscopeService;
use PHPUnit\Framework\TestCase;

/**
 * Class HoroscopeServiceTest
 *
 * Unit tests for the HoroscopeService class.
 */

class HoroscopeServiceTest extends TestCase {
    public HoroscopeService $service;

    public function setUp(): void {
        $this->service = new HoroscopeService();
    }
    /**
     * Tests processHoroscopes with valid JSON data.
     * Ensures that a valid horoscope entry is correctly processed.
     */
    public function testProcessHoroscopesValidData() {
        $jsonData = '[{"id":"123","title":"Your Weekly Aries horoscope revealed","content":"Test"}]';

        $result = $this->service->processHoroscopes($jsonData);

        $this->assertCount(1, $result);
        $this->assertEquals("Your Weekly Aries horoscope revealed", $result[0]['title']);
    }
    /**
     * Tests processHoroscopes with invalid JSON data.
     * Ensures that an error response is returned.
     */
    public function testProcessHoroscopesInvalidJson() {
        $result = $this->service->processHoroscopes("Invalid JSON");

        $this->assertArrayHasKey("error", $result);
        $this->assertEquals("Invalid JSON data.", $result["error"]);
    }
    /**
     * Tests the sorting logic when an unknown zodiac sign is present.
     * Ensures that known zodiac signs are sorted correctly, and unknown signs come last.
     */
    public function testSortingWithUnknownSign() {
        $jsonData = '[{"id":"1","title":"Your Weekly Unknown horoscope revealed","content":"Test"},
                      {"id":"2","title":"Your Weekly Aries horoscope revealed","content":"Test"}]';

        $result = $this->service->processHoroscopes($jsonData);

        $this->assertEquals("Your Weekly Aries horoscope revealed", $result[0]['title']);
        $this->assertEquals("Your Weekly Unknown horoscope revealed", $result[1]['title']);
    }
}