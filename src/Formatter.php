<?php

declare(strict_types=1);

namespace OKO\IptcMapper;

/**
 * Formatting functions for meta data.
 * 
 * @version 1.0.0
 * @author Konrad Fedorczyk <konrad.fedorczyk@oko.press>
 * @package OKO\IptcMapper
 */
abstract class Formatter
{
    public static function arrayExtract($data)
    {
        return isset($data[0]) ? $data[0] : null;
    }

    public static function passThrough($data)
    {
        return $data;
    }

    public static function date($data)
    {
        if (isset($data[0])) {
            $dt = \DateTime::createFromFormat("Ymd", $data[0]);
            return $dt->format('Y-m-d');
        } else {
            return null;
        }
    }

    public static function time($data)
    {
        if (isset($data[0])) {
            $dt = \DateTime::createFromFormat("His", $data[0]);
            return $dt->format('H:i:s');
        } else {
            return null;
        }
    }
}
