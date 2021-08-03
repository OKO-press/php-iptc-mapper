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
    private $imageInfoLong;
    private $imageInfoBogusDate;

    protected function setUp(): void
    {
        $this->imageInfo = new ImageInfo(ImageInfoTest::TEST_FILE);
        $this->imageInfoLong = new ImageInfo(ImageInfoTest::TEST_FILE_LONG);
        $this->imageInfoBogusDate = new ImageInfo(ImageInfoTest::TEST_FILE_BOGUS_DATE);
    }

    protected function tearDown(): void
    {
        $this->imageInfo = NULL;
        $this->imageInfoLong = NULL;
        $this->imageInfoBogusDate = NULL;
    }

    public function testExtraction(): void
    {
        $itpcMap = new Iptc($this->imageInfo);

        $rawData = $itpcMap->getRawData();

        var_dump($rawData);
         
        $this->assertEquals(true, is_array($rawData));
    }

    public function testLongExtraction(): void
    {
        $itpcMap = new Iptc($this->imageInfoLong);

        $rawData = $itpcMap->getRawData();

        var_dump($rawData);
         
        $this->assertEquals(64, strlen($rawData['2#005'][0]));
    }

    public function testExtractionBogusDate(): void
    {
        $itpcMap = new Iptc($this->imageInfoBogusDate);

        $rawData = $itpcMap->getRawData();

        var_dump($rawData);
         
        $this->assertEquals(true, is_array($rawData));
    }
}
