<?php

namespace OKO\IptcMapper;

use OKO\IptcMapper\ImageInfo;

interface MetaInterface 
{
    public function __construct(ImageInfo $imageInfo);
    public function getRawData();
    public function __get(string $name);
    public function __isset(string $name);
}
