<?php

use Services\HoroscopeService;
use PHPUnit\Framework\TestCase;

class HoroscopeServiceTest extends TestCase {
    public HoroscopeService $service;

    public function setUp(): void {
        $this->service = new HoroscopeService();
    }

    public function testProcessHoroscopesValidData() {
        $jsonData = '[{"id":"123","title":"Your Weekly Aries horoscope revealed","content":"Test"}]';

        $result = $this->service->processHoroscopes($jsonData);

        $this->assertCount(1, $result);
        $this->assertEquals("Your Weekly Aries horoscope revealed", $result[0]['title']);
    }

    public function testProcessHoroscopesInvalidJson() {
        $result = $this->service->processHoroscopes("Invalid JSON");

        $this->assertArrayHasKey("error", $result);
        $this->assertEquals("Invalid JSON data.", $result["error"]);
    }

    public function testSortingWithUnknownSign() {
        $jsonData = '[{"id":"1","title":"Your Weekly Unknown horoscope revealed","content":"Test"},
                      {"id":"2","title":"Your Weekly Aries horoscope revealed","content":"Test"}]';

        $result = $this->service->processHoroscopes($jsonData);

        $this->assertEquals("Your Weekly Aries horoscope revealed", $result[0]['title']);
        $this->assertEquals("Your Weekly Unknown horoscope revealed", $result[1]['title']);
    }
}
