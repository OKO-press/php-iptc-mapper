<?php

declare(strict_types=1);

namespace OKO\IptcMapper\Tests;

use PHPUnit\Framework\TestCase;
use Exception;

use OKO\IptcMapper\ImageInfo;
use OKO\IptcMapper\Mapper;
use OKO\IptcMapper\Tests\ImageInfoTest;

final class MapperTest extends TestCase 
{
    public function testExtraction(): void
    {
        $mapper = new Mapper(ImageInfoTest::TEST_FILE);

        $title = $mapper->title;

        var_dump($title);

        $this->assertEquals("Warszawa, 12.05.2021. Protest Extinction Rebellion", $title);
    }
}
