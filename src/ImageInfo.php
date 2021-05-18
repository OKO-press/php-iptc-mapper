<?php

declare(strict_types=1);

namespace OKO\IptcMapper;

use Exception;

/**
 * Image info.
 * 
 * @version 1.0.0
 * @author Konrad Fedorczyk <konrad.fedorczyk@oko.press>
 * @package OKO\IptcMapper
 */
class ImageInfo
{
    /** @var array $imageInfo */
    private $imageInfo;

    /**
     * Load file & extract info.
     * 
     * @param string $path Path to file.
     * @throws Exception
     */
    public function __construct(string $path)
    {
        $this->imageInfo = $this->loadFile($path);
    }

    /**
     * Get all data.
     */
    public function getAllData()
    {
        return $this->imageInfo;
    }

    /**
     * Get single key from data.
     */
    public function __get(string $name)
    {
        return $this->imageInfo[$name]; 
    }

    /**
     * Check if single key exists.
     */
    public function __isset($name): bool
    {
        return isset($this->imageInfo[$name]);
    }

    /**
     * Load file & extract info.
     * 
     * @param string $path
     * @return array 
     * @throws Exception
     */
    private function loadFile(string $path): array
    {
        if (!file_exists($path)) {
            throw new Exception("File does not exist.");
        }

        /** @var array $imageInfo */
        $imageInfo = [];

        getimagesize($path, $imageInfo);

        if (is_array($imageInfo)) {
            return $imageInfo;
        } else {
            throw new Exception("Unable to parse image file.");
        }
    }
}
