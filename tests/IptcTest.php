<?php

declare(strict_types=1);

namespace OKO\IptcMapper\Tests;

use PHPUnit\Framework\TestCase;
use Exception;

use OKO\IptcMapper\ImageInfo;
use OKO\IptcMapper\Iptc;
use OKO\IptcMapper\Tests\ImageInfoTest;

final class IptcTest extends TestCase 
{
    private $imageInfo;

    protected function setUp(): void
    {
        $this->imageInfo = new ImageInfo(ImageInfoTest::TEST_FILE);
    }

    protected function tearDown(): void
    {
        $this->imageInfo = NULL;
    }

    public function testExtraction(): void
    {
        $itpcMap = new Iptc($this->imageInfo);

        $rawData = $itpcMap->getRawData();

        var_dump($rawData);
         
        $this->assertEquals(true, is_array($rawData));
    }
}
