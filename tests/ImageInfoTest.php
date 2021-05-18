<?php

declare(strict_types=1);

namespace OKO\IptcMapper\Tests;

use PHPUnit\Framework\TestCase;
use Exception;

use OKO\IptcMapper\ImageInfo;

final class ImageInfoTest extends TestCase 
{
    const TEST_FILE = __DIR__ . "/test-files/20210512_AKU_protest-XR_001.jpg";

    public function testNonExistentFile(): void
    {
        $this->expectException(Exception::class);
        $imageInfo = new ImageInfo('non_existent.jpg');
    }

    public function testExistentFile(): void
    {
        $imageInfo = new ImageInfo(self::TEST_FILE);

        $this->assertEquals(true, is_array($imageInfo->getAllData()));
    }
}
