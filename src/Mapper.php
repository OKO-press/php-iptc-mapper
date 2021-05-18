<?php

declare(strict_types=1);

namespace OKO\IptcMapper;

use OKO\IptcMapper\ImageInfo;
use OKO\IptcMapper\Iptc;

use Exception;

/**
 * Create IPTC map.
 * 
 * @version 1.0.0
 * @author Konrad Fedorczyk <konrad.fedorczyk@oko.press>
 * @package OKO\IptcMapper
 */
class Mapper
{
    const MAP = [
        "title" => [
            "key"           => "2#005",
            "formatter"     => null
        ],
    ];

    private $imageInfo;

    private $meta;

    private $rawIptc;

    public function __construct(string $path)
    {
        $this->imageInfo    = new ImageInfo($path);
        $this->rawIptc      = new Iptc($this->imageInfo);

        $this->createMap();
    }

    /**
     * Get single key from data.
     */
    public function __get(string $name)
    {
        return $this->meta[$name];
    }

    /**
     * Check if single key exists.
     */
    public function __isset(string $name): bool
    {
        return isset($this->meta[$name]);
    }

    /**
     * Get all data.
     */
    public function getRawData()
    {
        return $this->meta;
    }

    /**
     * Create map from raw data.
     */
    private function createMap()
    {
        foreach (self::MAP as $k => $v) {
            if (isset($this->rawIptc->{$v["key"]})) {
                $this->meta[$k] = $this->rawIptc->{$v["key"]}[0]; 
            } else {
                $this->meta[$k] = null;  
            }
        }
    }
}
