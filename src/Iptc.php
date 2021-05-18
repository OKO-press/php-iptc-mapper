<?php

declare(strict_types=1);

namespace OKO\IptcMapper;

use OKO\IptcMapper\ImageInfo;
use OKO\IptcMapper\MetaInterface;

use Exception;

/**
 * Iptc extract.
 * 
 * @version 1.0.0
 * @author Konrad Fedorczyk <konrad.fedorczyk@oko.press>
 * @package OKO\IptcMapper
 */
class Iptc implements MetaInterface
{
    /** @var array $iptcData */
    private $iptcData = [];

    /**
     * Constructor.
     */
    public function __construct(ImageInfo $imageInfo)
    {
        if (!isset($imageInfo->APP13)) {
            throw new Exception('There is no APP13 key in image info.');
        }

        $this->iptcData = $this->extract($imageInfo->APP13);
    }

    /**
     * Get all data.
     */
    public function getRawData()
    {
        return $this->iptcData;
    }

    /**
     * Get single key from data.
     */
    public function __get(string $name)
    {
        return $this->iptcData[$name];
    }

    /**
     * Check if single key exists.
     */
    public function __isset(string $name): bool
    {
        return isset($this->iptcData[$name]);
    }

    /**
     * Extract iptc from ImageInfo object.
     * 
     * @param $data
     */
    private function extract($data)
    {
        $itpc = iptcparse($data);

        if ($itpc === false) {
            throw new Exception('Unable to parse APP13 data.');
        }

        return $itpc;
    }
}
