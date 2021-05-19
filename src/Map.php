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
                "formatter"     => "arrayExtract",
            ],
            "description" => [
                "key"           => "2#120",
                "formatter"     => "arrayExtract",
            ],
            "keywords" => [
                "key"           => "2#025",
                "formatter"     => "passThrough",
            ],
            "creator" => [
                "key"           => "2#080",
                "formatter"     => "arrayExtract",
            ],
            "city" => [
                "key"           => "2#090",
                "formatter"     => "arrayExtract",
            ],
            "voivodeship" => [
                "key"           => "2#095",
                "formatter"     => "arrayExtract", 
            ],
            "country_code" => [
                "key"           => "2#100",
                "formatter"     => "arrayExtract", 
            ],
            "country" => [
                "key"           => "2#101",
                "formatter"     => "arrayExtract", 
            ],
            "event" => [
                "key"           => "2#105",
                "formatter"     => "arrayExtract", 
            ],
            "copyright_note" => [
                "key"           => "2#116",
                "formatter"     => "arrayExtract", 
            ],
            "date_created" => [
                "key"           => "2#062",
                "formatter"     => "date",
            ],
            "time_created" => [
                "key"           => "2#063",
                "formatter"     => "time",
            ],
        ];
    }
}
