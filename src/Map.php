<?php

declare(strict_types=1);

namespace OKO\IptcMapper;

abstract class Map
{
    public static function iptcMap()
    {
        return [
            "title" => [
                "key"           => "2#005",
                "formatter"     => null
            ],
            "description" => [
                "key"           => "2#120",
                "formatter"     => null
            ],
            "keywords" => [
                "key"           => "2#025",
                "formatter"     => null
            ],
            "creator" => [
                "key"           => "2#080",
                "formatter"     => null
            ],
            "city" => [
                "key"           => "2#090",
                "formatter"     => null
            ]
        ];
    }
}
