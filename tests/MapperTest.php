<?php

declare(strict_types=1);

namespace OKO\IptcMapper\Tests;

use PHPUnit\Framework\TestCase;
use Exception;

use OKO\IptcMapper\Mapper;
use OKO\IptcMapper\Map;
use OKO\IptcMapper\Tests\ImageInfoTest;

final class MapperTest extends TestCase 
{
    public function testTitle(): void
    {
        $mapper = new Mapper(ImageInfoTest::TEST_FILE);

        $title = $mapper->title;

        $this->assertEquals("Warszawa, 12.05.2021. Protest Extinction Rebellion", $title);
    }

    public function testDescription(): void
    {
        $mapper = new Mapper(ImageInfoTest::TEST_FILE);

        $description = $mapper->description;

        $this->assertEquals("Warszawa, 12.05.2021. Protest Extinction Rebellion przeciw niszczeniu środowiska przez koncerny odzieżowe", $description);
    }

    public function testAllFields(): void
    {
        $map = Map::iptcMap();
        $mapper = new Mapper(ImageInfoTest::TEST_FILE);

        foreach ($map as $k => $v) {
            var_dump($k . ': ' . print_r($mapper->{$k}, true));
        }

        $this->assertEquals(true, is_array($map));
    }

    public function testBogusDate(): void 
    {
        $map = Map::iptcMap();
        $mapper = new Mapper(ImageInfoTest::TEST_FILE_BOGUS_DATE);
        var_dump($mapper->time_created);
        $this->assertEquals(true, is_string($mapper->time_created));
    }
}
