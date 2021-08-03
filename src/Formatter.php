<?php

declare(strict_types=1);

namespace OKO\IptcMapper;

/**
 * Formatting functions for meta data.
 * 
 * @version 1.0.1
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
            // Remove possible time zone.
            $expr = "/([0-9]+)(\+[0-9]{0,4})?$/";
            preg_match($expr, $data[0], $matches);
            
            if (isset($matches[1])) {
                $dt = \DateTime::createFromFormat("His", $matches[1]);
                return $dt->format('H:i:s');
            }
        }

        return null;
    }
}
